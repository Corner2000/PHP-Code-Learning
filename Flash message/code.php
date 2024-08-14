<?php
session_start();

$con = mysqli_connect('localhost', 'root','','phpcrud'); //Connect to database

// delete data from database
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM users WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data deleted successfully";
        header('location: index.php');
    }
    else
    {
        $_SESSION['status'] = "Data did not deleted";
        header('location: index.php');
    }
}

// insert data into database
if(isset($_POST['insert_btn'])) //Check if insert_btn exists
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];

    $query = "INSERT INTO users (name,email,phoneno) VALUES ('$name', '$email', '$contactno')"; //Form data is inserted into the users table in the database
    $query_run = mysqli_query($con, $query); //After executing the query, the returned results are stored in $query_run, will be true, otherwise false

    if($query_run)
    {
        $_SESSION['status'] = "Data inserted Successfully";
        header('location: index.php'); //Redirect to index.php page
    }
    else
    {
        echo "Something went wrong";
    }
}

// update data into database
if(isset($_POST['update_btn']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];

    $query = "UPDATE users SET name='$name',email='$email',phoneno='$contactno' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Updated Successfully";
        header('location: index.php');
    }
    else {
        $_SESSION['status'] = "Something went wrong";
        header('location: index.php');
    }
}
?>