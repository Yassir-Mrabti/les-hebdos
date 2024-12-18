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
    <?php include('partials/menu.php');
    ob_start();
    ?>
    <section>
        <div class="container">
            <div class="container pt-4">
                <h2 class="">Ajouter une catégorie</h2>
            </div>
            <?php 
                    if(isset($_SESSION['operation'])){
                        echo $_SESSION['operation'];
                        unset($_SESSION['operation']);
                    }   
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="myContainer my-3">
                    <table class="table">
                        <tr>
                            <td>
                                <label for="title" class="form-label me-5">Titre</label>
                            </td>
                            <td>
                                <input required type="text" class="form-control" id="title" name="title" placeholder="Titre de catégorie">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="image" class="form-label">Sélectionner une image</label>
                            </td>
                            <td>
                                <input type="file" class="form-control" id="image" name="image">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="featured" class="form-label me-3">En vedette</label>
                            </td>
                            <td>
                                <input required type="radio" id="featured" name="featured" value="Oui"> Oui
                                <input required type="radio" id="featured" name="featured" value="No" checked> Non
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="active" class="form-label">Active</label>
                            </td>
                            <td>
                                <input required type="radio" id="active" name="active" value="Oui"> Oui
                                <input required type="radio" id="active" name="active" value="No" checked> Non
                            </td>
                        </tr>
                    </table>
                    <input required type="submit" value="Enregistrer" class="btn btn-success ms-2" name="submit">
                </div>
            </form>
            <?php 
                if (isset($_POST['submit'])){
                    $title = $_POST['title'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];
                    
                    // print_r($_FILES['image']);
                    // die();
                    if (isset($_FILES['image']['name'])){
                        //To upload imgae we need image name , source path and destination path
                        $image_name = $_FILES['image']['name'];
                        // Get the extension of our image
                        if ($image_name <> ""){
                            $tmp=explode('.',$image_name);
                            $ext = end($tmp);
                            //Rename the image
                            $image_name = "Hebdo_Category_".rand(000,999).'.'.$ext;
                            $source_path = $_FILES['image']['tmp_name'];
                            
                            $destination_path = "../imgs/category/".$image_name;
                            // $image_name
                            //Finally we will upload the image
                            $upload = move_uploaded_file($source_path, $destination_path);
                            
                            if ($upload == false){
                                $_SESSION['operation'] ="<div class='alert alert-danger alert-dismissible'>
                                                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                        Échec du téléchargement de l'image
                                                    </div>";
                                //Redirect page
                                header('location:'.SITEURL ."admin/add-category.php");
                                die(); // Break
                            }
                        }
                    }else {
                        //Don't upload the image and set the image_name value is blank
                        $image_name= ''; 
                    }

                    $sql = "Insert into tbl_category set
                        title = '$title',
                        image_name = '$image_name',
                        featured = '$featured',
                        active = '$active'
                    ";

                    $res = mysqli_query($conn, $sql);

                    if ($res == true) { 
                        //Data Inserted
                        //Creat a session variable to display messsage 
                        $_SESSION['operation'] ="<div class='alert alert-success alert-dismissible'>
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                    Catégorie a été ajoutée avec succès
                                                </div>";
                        //Redirect page
                        header('location:'.SITEURL ."admin/manage-category.php");
                        exit;
                    }else {
                        //Data not Inserted
                        //Creat a session variable to display messsage 
                        $_SESSION['operation'] ="<div class='alert alert-danger alert-dismissible'>
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                    Échec de l'ajout d'une catégorie
                                                </div>";
                        header('location:'.SITEURL ."admin/manage-category.php");
                        exit;
                    }
                }
            ?>
        </div>
    </section>
    <?php include('partials/footer.php');
    ob_end_flush();
    ?>
    <script src="../bootstrap/all.min.js"></script>
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.5.2/jquery-migrate.min.js" integrity="sha512-BzvgYEoHXuphX+g7B/laemJGYFdrq4fTKEo+B3PurSxstMZtwu28FHkPKXu6dSBCzbUWqz/rMv755nUwhjQypw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>

