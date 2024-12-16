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
    <?php include('partials/menu.php');ob_start() ?>
<section class="main_section">
    <div class="container py-5">
        <h2 class="mb-3">Modifier le mot de passe</h2>
        <form action="" method="post">
            <table class="table">
                <tr>
                    <td>
                        <label for="current_password" class="me-2">Mot de passe actuel</label>
                    </td>
                    <td>
                        <input required type="password" class="form-control" id="old" name="current_password" placeholder="Mot de passe actuel">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="new_password" class="me-4">Nouveau mot de passe</label>
                    </td>
                    <td>
                        <input required type="password" class="form-control" id="new" name="new_password" placeholder="Nouveau mot de passe">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pass_word">Confirmer le mot de passe</label>
                    </td>
                    <td>
                        <input required type="password" class="form-control" id="pwd" name="pass_word" placeholder="Confirmer le mot de passe">
                    </td>
                </tr>
            </table>
                <input required type="hidden" name="id" value="<?php echo $id = $_GET['id']; ?>">
                <input required type="submit" value="Enregistrer" class="btn btn-success ms-2" name="submit">
        </form>
        <?php
            if (isset($_POST['submit'])){
                $id = $_POST['id'];
                $current_password = md5($_POST['current_password']);
                $new_password = md5($_POST['new_password']);
                $confirmation = md5($_POST['pass_word']);
                if ($new_password == $confirmation){
                    $sql = "SELECT * FROM tbl_admin WHERE id = '$id' AND password = '$current_password'";
        
                    $res = mysqli_query($conn, $sql);
                    if ($res == true){
                        $count = mysqli_num_rows($res);
                        
                        if ($count == 1){
                            echo 'user exist';
                            $sql1= "Update tbl_admin set password='$new_password' where id=$id and password='$current_password'";
                            $res1 = mysqli_query($conn, $sql1); 
                            if ($res1 == true){
                                $_SESSION['operation'] ="<div class='alert alert-success alert-dismissible'>
                                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                Changement de mot de passe réussi
                                </div>";
                                header('location:'.SITEURL ."admin/manage-admin.php");
                            }else {
                                $_SESSION['operation'] ="<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                Échec du changement de mot de passe
                                </div>";

                                header('location:'.SITEURL ."admin/manage-admin.php");
                            }
                        }else{
                            $_SESSION['operation'] ="<div class='alert alert-danger alert-dismissible'>
                                                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                        L'administrateur n'existe pas
                                                </div>";
                            
                            header('location:'.SITEURL ."admin/manage-admin.php");
                            
                        }
                    }
                }else {
                    $_SESSION['operation'] ="<div class='alert alert-danger alert-dismissible'>
                                                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                        Le mot de passe ne correspond pas
                                                </div>";
                            
                            header('location:'.SITEURL ."admin/manage-admin.php");
                }
            }

        ?>
    </div>
</section>
    <?php include('partials/footer.php'); ob_end_flush() ?>
    <!-- main section ends -->
    <script src="../bootstrap/all.min.js"></script>
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.5.2/jquery-migrate.min.js" integrity="sha512-BzvgYEoHXuphX+g7B/laemJGYFdrq4fTKEo+B3PurSxstMZtwu28FHkPKXu6dSBCzbUWqz/rMv755nUwhjQypw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>