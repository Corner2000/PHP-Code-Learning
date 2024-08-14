<?php
session_start(); 
include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if(isset($_SESSION['status']))
                {
                    echo $_SESSION['status'];
                    unset($_SESSION['status']);
                }

                ?>
                
                <div class="card" style="width: 50rem">
                    <div class="card-header text-center">
                        <h2 class="fw-bold h2">Update Data into database in PHP</h2>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['id'])) //Collect id values ​​passed via URL parameters
                            {
                                $con = mysqli_connect('localhost', 'root','','phpcrud');
                                $id = $_GET['id'];
                                $query = "SELECT * FROM users WHERE id='$id'";
                                $query_run = mysqli_query($con, $query);
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control"> <!--Pre-display the value of the query result in the input box-->
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                                <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Contact No</label>
                                                <input type="text" name="contactno" value="<?php echo $row['phoneno'] ?>" class="form-control">
                                            </div>
                                            <button type="submit" name="update_btn" class="btn btn-primary">Update</button>
                                        </form>
                                        <?php
                                    }
                                }
                            }
                            else{
                                echo "something went wrong";
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php') ?>
