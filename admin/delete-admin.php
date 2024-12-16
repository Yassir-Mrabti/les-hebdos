<?php
    include('../config/constants.php');

    $id =  $_GET['id'];

    $sql = "Delete from tbl_admin where id =$id";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['operation'] ="<div class='alert alert-success alert-dismissible'>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                        Admin supprimé avec succès
                                </div>";
        //Redirect page
        header('location:'.SITEURL ."admin/manage-admin.php");
    }else {
        $_SESSION['operation'] ="<div class='alert alert-danger alert-dismissible'>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                        Échec de la suppression d'Admin'
                                </div>";
                                
        header('location:'.SITEURL ."admin/manage-admin.php");
    }
?>