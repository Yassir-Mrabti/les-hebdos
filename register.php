<?php 
include('config/constants.php');
// include('partials-front/login-check.php');
ob_start(); 
?>
<!DOCTYPE phpl>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/all.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/main.css">
    <title>Les Hebdos</title>
    <style>
        .control-signin {
            width: 300px !important;
            height: 50px !important;
        }
        .w-40{
            width: 400px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .title{
            font-family: 'Elephant';
            font-size: 40px ;
        }

        .btn-bg {
            background-color: #007bff !important; 
            color: white !important;
        }
        .forgetten{
            text-decoration: underline !important;
        }
                
        .borderRadios {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
    </style>
</head>
<body>
    <section>
        <div class="container mt-3">
            <?php 
                if(isset($_SESSION['operation'])){
                    echo $_SESSION['operation'];
                    unset($_SESSION['operation']);
                } 
                if (isset($_SESSION['no-login-message'])) {
                    echo  $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
        </div>
        <div class="d-flex container d-flex justify-content-center mt-5 too-register">
            <div class="bg-light my-5 px-5 py-3 shadow h-500 borderRadios">
                <div class="" id="signin">
                    <form method="post">
                        <div class="text-center mt-4 pb-3">
                            <h3 class="text-uppercase mt-4">Votre Compte</h3>
                        </div>
                        <div class="pb-4 d-flex justify-content-center">
                            <input type="text" name="username" class="form-control control-signin" placeholder="Nom d'utilisateur">
                        </div>
                        <div class="d-flex pb-4 justify-content-center">
                            <input type="password" name="password" class="form-control control-signin" placeholder="Mot de passe">
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="submit" class="btn btnInput px-3 py-2" name="submit" value="Connexion">
                        </div>
                    </form>
                    <?php
                       if (isset($_POST['submit'])) {
                            $username = $_POST['username'];
                            $password = md5($_POST['password']);  // Hashing the password

                            // Prepare the SQL query
                            $sql = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";

                            // Execute the query and check if it was successful
                            $res = mysqli_query($conn, $sql);

                            if ($res) {
                                // Count the number of rows returned
                                $count = mysqli_num_rows($res);

                                if ($count == 1) {
                                    $_SESSION['operation'] = "<div class='container alert alert-success mt-3 alert-dismissible' id='myDiv'>
                                                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                                    Connexion réussie
                                                            </div>";
                                    
                                    // Fetch the row as an associative array
                                    $row = mysqli_fetch_assoc($res);
                                    $is_admin = $row['is_admin'];  // Access the 'is_admin' column
                                    $_SESSION['is_admin'] = $is_admin;
                                    $_SESSION['user'] = $username;

                                    // Redirect to the homepage
                                    header('location:' . SITEURL);
                                } else {
                                    // If no matching user is found
                                    $_SESSION['operation'] = "<div class='container mt-2 alert alert-danger alert-dismissible'>
                                                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                                    Le nom d'utilisateur ou le mot de passe ne correspond pas.
                                                            </div>";  
                                    header('location:' . SITEURL . "register.php");
                                }
                            } else {
                                // If the query fails, show an error message (for debugging)
                                echo "Query failed: " . mysqli_error($conn);
                            }
                        }
                    ?>
                </div>
                <div class="d-none">
    
                </div>
                <div class="d-none" id='signup'>
                    <form method="post">
                        <div class="text-center mt-4 pb-3">
                            <h3 class="text-uppercase">Créez votre Compte</h3>
                        </div>
                        <div class="pb-4 d-flex justify-content-center">
                            <input type="text" name="full_name" class="form-control control-signin" placeholder="Nom et prénom">
                        </div>
                        <div class="pb-4 d-flex justify-content-center">
                            <input type="text" name="user_name" class="form-control control-signin" placeholder="Nom d'utilisateur">
                        </div>
    
                        <div class="d-flex pb-4 justify-content-center">
                            <input type="password" name="pass_word" class="form-control control-signin" placeholder="Mot de passe">
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="submit" class="btn btnInput px-3 py-2" name="submitSignup" value="S'inscrire">
                        </div>
                    </form>
                    <?php
                        if (isset($_POST['submitSignup'])) {
                            // Fetch and sanitize form data
                            $fullname = $_POST['full_name'];
                            $new_username = $_POST['user_name'];
                            $new_password = md5($_POST['pass_word']); // Consider using password_hash() for better security

                            // Check if the username already exists
                            $check_user_query = "SELECT * FROM tbl_user WHERE username = '$new_username' LIMIT 1";
                            $result = mysqli_query($conn, $check_user_query);

                            if (mysqli_num_rows($result) == 1) {
                                // Username already exists
                                $_SESSION['operation'] = "<div class='container mt-5 alert alert-danger alert-dismissible'>
                                                            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                            Ce nom d'utilisateur est déjà pris. Veuillez en choisir un autre.
                                                        </div>";
                                header('location:' . SITEURL . "register.php");
                            } else {
                                // Username does not exist, proceed with the insertion
                                $sql_insert = "Insert into tbl_user set
                                        full_name = '$fullname',
                                        username = '$new_username',
                                        password = '$new_password'
                                    ";
                                // $sql_insert = "INSERT INTO tbl_user (fullname, username, password) VALUES ('$fullname', '$new_username', '$new_password')";
                                $res_insert = mysqli_query($conn, $sql_insert);

                                // Check whether the query was executed successfully
                                if ($res_insert == true) {
                                    $_SESSION['operation'] = "<div class='container mt-5 alert alert-success alert-dismissible'>
                                                                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                                L'utilisateur a été ajouté avec succès.
                                                            </div>";
                                    header('location:' . SITEURL . "register.php");
                                } else {
                                    $_SESSION['operation'] = "<div class='container mt-5 alert alert-danger alert-dismissible'>
                                                                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                                Échec de l'ajout d'un utilisateur.
                                                            </div>";
                                    header('location:' . SITEURL . "register.php");
                                }
                            }
                        }
                    ?>

                </div>
            </div>
            <div class="d-flex flex-column justify-content-center bg-login my-5 shadow h-500 w-40" id="here">
                <div class="d-flex flex-column text-white text-center justify-content-center">
                    <strong class="text-white title" id="welcometext">Bienvenue</strong>
                    <small class="text-white" id="logintext">pour rester connecté avec nous,<br> veuillez vous connecter avec vos informations personnelles</small>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <input type="button" class="btn btnInput px-3 py-2" id="signinBtn" value="S'inscrire" onclick="changeToSignup()">
                    <input type="button" class="btn btnInput btn-bg px-3 py-2 ms-2" id="signupBtn" value="Je me connecte" onclick="changeToSignin()" style="display:none;">
                </div>
            </div>
        </div>
    </section>


</body>
    <script src="bootstrap/all.min.js"></script>
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.5.2/jquery-migrate.min.js" integrity="sha512-BzvgYEoHXuphX+g7B/laemJGYFdrq4fTKEo+B3PurSxstMZtwu28FHkPKXu6dSBCzbUWqz/rMv755nUwhjQypw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="js/main.js"></script>
</html>

<?php ob_end_flush();?>