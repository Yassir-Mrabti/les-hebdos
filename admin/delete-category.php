<?php
    include('../config/constants.php');
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        // $image_name = $_GET['image_name'];
        $sql1 = "select * from tbl_category where id ='$id'";

        $res1 = mysqli_query($conn, $sql1);
        
        $count = mysqli_num_rows($res1);
        if ($count == 1){
            $row = mysqli_fetch_assoc($res1);
            $image_name = $row['image_name'] ? $row['image_name'] : ' ' ;
        }else {
            header('location:'. SITEURL. 'admin/manage-category.php');
            exit;
        }
    }

    if ($image_name != ""){
        $path = "../imgs/category/".$image_name;
        
        echo $path;
        //Remove the Image
        $remove = unlink($path);

        if ($remove== false){
            $_SESSION['operation'] ="<div class='alert alert-danger alert-dismissible'>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                        Échec de la suppression de l'image
                                </div>";
                                
        }
    }

    $sql = "Delete from tbl_category where id ='$id'";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['operation'] ="<div class='alert alert-success alert-dismissible'>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                        Catégorie supprimée avec succès
                                </div>";
        //Redirect page
        header('location:'.SITEURL ."admin/manage-category.php");
        exit;
    }else {
        echo $path;
        $_SESSION['operation'] ="<div class='alert alert-danger alert-dismissible'>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                        Échec de la suppression de la catégorie
                                </div>";
                                
        header('location:'.SITEURL ."admin/manage-category.php");
        exit;
    }
?>