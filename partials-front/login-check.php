<?php
//Authorizaton - Access control
    if (!isset($_SESSION['user'])){ // if the user is not set

        $_SESSION['no-login-message'] = "<div class='alert alert-danger alert-dismissible'>
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                    Veuillez vous connecter pour accéder au panneau des utilisateurs.
                                            </div>";
        header('location:'.SITEURL ."register.php");
    }
?>