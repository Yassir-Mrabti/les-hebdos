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
    <!-- main section starts -->
    <?php include('partials/menu.php'); ob_start() ?>
    <section class="main_section">
        <div class="container pt-5">
            <h2>Modifier Utilisateur</h2>
        </div>
        <?php 
            $id = $_GET['id'];

            $sql = "select * from tbl_user where id =$id";

            $res = mysqli_query($conn, $sql);

            if ($res == True){
                $count = mysqli_num_rows($res);
                if ($count == 1){
                    $row = mysqli_fetch_assoc($res);

                    $fullname = $row['full_name'];
                    $username = $row['username'];
                    $is_admin = $row['is_admin'];

                }else {
                    header('location:'. SITEURL. 'admin/manage-user.php');
                }
            }
        ?>
        <div class="container pt-3">
            <form action="" method="post">
                <table class="table mb-4">
                    <tr>
                        <td>
                            <label for="fullName">Nom complet</label>
                        </td>
                        <td>
                            <input required type="text" class="form-control" id="fullName" name="full_name" value="<?php echo $fullname ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="userName">Nom d'utilisateur</label>
                        </td>
                        <td>
                            <input required type="text" class="form-control" id="userName" name="user_name" value="<?php echo $username ?>">
                            <input required type="hidden" name="id" value="<?php echo $id ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="featured" class="me-3">Admin</label>
                        </td>
                        <td>
                            <input required <?php if ($is_admin == 1) echo 'checked' ?> type="radio" name="is_admin" value="1"> Oui
                            <input required <?php if ($is_admin == 0) echo 'checked' ?> type="radio" name="is_admin" value="0"> Non
                        </td>
                    </tr>
                </table>
                <input required type="submit" value="Enregistrer" class="btn btn-success mb-5 ms-2" name="submit">
            </form>
        </div>
        <?php
            if (isset($_POST['submit'])){
                $id = $_POST['id'];
                $fullname = $_POST['full_name'];
                $username = $_POST['user_name'];
                $is_admin = $_POST['is_admin'];

                $sql = "update tbl_user set
                full_name ='$fullname', 
                username ='$username', 
                is_admin = '$is_admin'
                where id =$id";
                $res = mysqli_query($conn, $sql);
                
                if ($res == true) {
                    $_SESSION['operation'] ="<div class='alert alert-success alert-dismissible'>
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                    Mise à jour réussie de l'Utilisateur
                                            </div>";
                    //Redirect page
                    header('location:'.SITEURL ."admin/manage-user.php");
                }else {
                    $_SESSION['operation'] ="<div class='alert alert-danger alert-dismissible'>
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                    Échec de la mise à jour de l'Utilisateur
                                            </div>";
                                            
                    header('location:'.SITEURL ."admin/manage-user.php");
                }
            }

            
        ?>
    </section>
    <?php include('partials/footer.php'); ob_end_flush()?>
    <!-- main section ends -->
    <script src="../bootstrap/all.min.js"></script>
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.5.2/jquery-migrate.min.js" integrity="sha512-BzvgYEoHXuphX+g7B/laemJGYFdrq4fTKEo+B3PurSxstMZtwu28FHkPKXu6dSBCzbUWqz/rMv755nUwhjQypw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>
