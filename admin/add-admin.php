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
    <?php include('partials/menu.php') ;ob_start();?>
<!-- main section starts -->
    <section>
        <div class="container py-5">
            <h2 class="mb-3">Ajouter Admin</h2>

            <form action="" method="post">
                <table class="table">
                    <tr>
                        <td>
                            <label for="fullName">Nom et prénom</label> 
                        </td>
                        <td>
                            <input required type="text" class="form-control" id="fullName" name="full_name" placeholder="Nom et prénom">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="userName">Nom d'utilisateur</label>
                        </td>
                        <td>
                            <input required type="text" class="form-control" id="userName" name="user_name" placeholder="Nom d'utilisateur">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pwd">Mot de passe</label>
                        </td>
                        <td>
                            <input required type="password" class="form-control" id="pwd" name="password" placeholder="Mot de passe">
                        </td>
                    </tr>
                </table>
                <input required type="submit" value="Enregistrer" class="btn btn-success ms-2" name="submit">
            </form>
            <?php
                if(isset($_POST['submit'])){
                    // echo 'Button Clicked';
                    //1. Get the data from the form
                    $fullname = $_POST['full_name'];
                    $username = $_POST['user_name'];
                    $password = md5($_POST['password']);//PassWord Encryption with md5();
                    //2. Sql query to save data
                    $sql = "Insert into tbl_admin set
                        full_name = '$fullname',
                        username = '$username',
                        password = '$password'
                    ";
                    //3. Execute query & save it.
                    $res = mysqli_query($conn, $sql) or die(mysqli_error());

                    //4. Check wether (Query is Executed) data is inserted or not and display approgriate message
                    if ($res == true) { 
                        //Data Inserted
                        //Creat a session variable to display messsage 
                        $_SESSION['operation'] ="<div class='alert alert-success alert-dismissible'>
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                    Admin ajouté avec succès
                                                </div>";
                        //Redirect page
                        header('location:'.SITEURL ."admin/manage-admin.php");
                    }else {
                        //Data not Inserted
                        //Creat a session variable to display messsage 
                        $_SESSION['operation'] ="<div class='alert alert-danger alert-dismissible'>
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                    Échec de l'ajout d'un Admin
                                                </div>";
                        //Redirect page
                        header('location:'.SITEURL ."admin/manage-admin.php");
                    }
                }
            ?>
        </div>
    </section>
    <!-- main section ends -->
    <?php include('partials/footer.php'); ob_end_flush()?>
    <script src="../bootstrap/all.min.js"></script>
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.5.2/jquery-migrate.min.js" integrity="sha512-BzvgYEoHXuphX+g7B/laemJGYFdrq4fTKEo+B3PurSxstMZtwu28FHkPKXu6dSBCzbUWqz/rMv755nUwhjQypw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>
