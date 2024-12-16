<?php
//Authorizaton - Access control
   
    if(!isset($_SESSION['admin']) ){
        $_SESSION['operation'] ="<div class='container mt-2 alert alert-danger alert-dismissible'>
                                                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                                    Accès refusé
                                                            </div>";  
                                    header('location:'.SITEURL); exit;
    }

?>