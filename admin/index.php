<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/all.min.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/main.css">
    <title>Hebdos Back Office</title>
</head>
<body>
    <?php include('partials/menu.php') ?>
<!-- main section starts -->
    <section>
        <div class="container py-5 mt-2">
            <h3>DASHBOARD</h3>
            <?php 
                if(isset($_SESSION['operation'])){
                    echo $_SESSION['operation'];
                    unset($_SESSION['operation']);
                }   
            ?>
            <div class="row mt-3">
                <div class="d-flex justify-content-between gap-3">
                    <div class="col-sm-2 my-2 bg-success rounded text-light py-5 px-2 text-center" onClick="window.location.href='manage-admin.php'" style="cursor: pointer;">
                        <?php 
                            $requet = "Select * from tbl_admin";
                            $result = mysqli_query($conn,$requet);
                            $count = mysqli_num_rows($result);
                        ?>
                        <h3 class="text-muted"><?=$count?></h3>
                        <p class="m-0">Administrateurs</p>
                    </div>
                    <div class="col-sm-2 my-2 bg-danger rounded text-light py-5 px-2 text-center" onClick="window.location.href='manage-user.php'" style="cursor: pointer;">
                        <?php 
                            $requet = "Select * from tbl_user";
                            $result = mysqli_query($conn,$requet);
                            $count = mysqli_num_rows($result);
                        ?>
                        <h3 class="text-muted"><?=$count?></h3>
                        <p class="m-0">Utilisateurs</p>
                    </div>
                    <div class="col-sm-2 my-2 bg-primary rounded text-light py-5 px-2 text-center" onClick="window.location.href='manage-category.php'" style="cursor: pointer;">
                        <?php 
                            $requet = "Select * from tbl_category";
                            $result = mysqli_query($conn,$requet);
                            $count = mysqli_num_rows($result);
                        ?>
                        <h3 class="text-muted"><?=$count?></h3>
                        <p class="m-0">Catégories</p>
                    </div>
                    <div class="col-sm-2 my-2 bg-warning rounded text-light p-5 text-center" onClick="window.location.href='manage-hebdo.php'" style="cursor: pointer;">
                        <?php 
                            $requet = "Select * from tbl_hebdo";
                            $result = mysqli_query($conn,$requet);
                            $count = mysqli_num_rows($result);
                        ?>
                        <h3 class="text-muted"><?=$count?></h3>
                        <p class="m-0">Hebdos</p>
                    </div>
                    <div class="col-sm-2 my-2 bg-secondary rounded text-light p-5 text-center" onClick="window.location.href='#'" style="cursor: pointer;">
                        <?php 
                            $requet = "Select * from tbl_contact";
                            $result = mysqli_query($conn,$requet);
                            $count = mysqli_num_rows($result);
                        ?>
                        <h3 class="text-muted"><?=$count?></h3>
                        <p class="m-0">Contact</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- main section ends -->
    <?php include('partials/footer.php') ?>
    <script src="../bootstrap/all.min.js"></script>
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.5.2/jquery-migrate.min.js" integrity="sha512-BzvgYEoHXuphX+g7B/laemJGYFdrq4fTKEo+B3PurSxstMZtwu28FHkPKXu6dSBCzbUWqz/rMv755nUwhjQypw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>
