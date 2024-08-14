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
                        <h2 class="fw-bold h2">Insert Data into database in PHP</h2>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contact No</label>
                                <input type="text" name="contactno" class="form-control">
                            </div>
                            <button type="submit" name="insert_btn" class="btn btn-primary">Insert</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php') ?>
