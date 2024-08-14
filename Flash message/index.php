<?php
session_start(); 
include('includes/header.php'); //The displayed content will include this file
?>  
<?php include('includes/navbar.php'); ?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if(isset($_SESSION['status'])) //Confirm whether $_SESSION['status'] has a value
                {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert"> <!--Display Flash message-->
                            <strong>Hey!</strong><?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    unset($_SESSION['status']);
                }

                ?>
                
                <div class="card" style="width: 70rem; max-height: 500px;">
                    <div class="card-header text-center">
                        <h2 class="fw-bold h2">Flash Message | Insert Data into database in PHP
                            <div class="text-end">
                                <a href="create.php" class="btn btn-info">Add Data</a> <!--Button connected to create.php-->
                            </div>
                        </h2>
                    </div>
                    <div class="card-body" style="overflow-y: auto;">
                        <table class="table table-bordered"> 
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $con = mysqli_connect('localhost', 'root','','phpcrud');
                                    $query = "SELECT * FROM users";
                                    $query_run = mysqli_query($con, $query);
                                    if(mysqli_num_rows($query_run) > 0) //Returns whether the number of rows in the query results is greater than 0
                                    {
                                        foreach($query_run as $row) //Use a foreach loop to iterate through each row of data in $query_run
                                        {
                                            ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['phoneno'] ?></td>
                                            <td>
                                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="badge btn-success" style="text-decoration: none;">Edit</a> <!--Button connects to edit.php page-->
                                                <form action="code.php" method="POST">
                                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="delete_id">
                                                    <button type="submit" name="delete_btn" class="badge btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                    }
                                    else{
                                        echo "No data found";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
include('includes/footer.php'); ?>
<?php include('includes/scripts.php'); 
?>
