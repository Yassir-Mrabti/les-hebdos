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
    <?php include('partials/menu.php');ob_start();?>
    <section class="main_section">
        <div class="container pt-3">
            <h2>Modifier hebdo</h2>
        </div>
        <?php 
            if (isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "select * from tbl_hebdo where id ='$id'";
    
                $res = mysqli_query($conn, $sql);
                
                $count = mysqli_num_rows($res);
                if ($count == 1){
                    $row = mysqli_fetch_assoc($res);
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $current_image = $row['image_name'] ;
                    $featured = $row['featured'];
                    $active = $row['active'];
                }else {
                    header('location:'.SITEURL.'admin/manage-hebdo.php');
                }
            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container">
                <table class="table">
                    <tr>
                        <td>
                            <label for="title" class="form-label me-5">Titre</label>
                        </td>
                        <td>
                            <input required type="text" class="form-control" id="title" name="title" value="<?=$title?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="description" class="form-label me-5">Description</label>
                        </td>
                        <td>
                            <textarea id="description" name="description" rows="5" class="form-control"><?=$description?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="image" class="form-label">Image actuelle</label>
                        </td>
                        <td>
                            <?php
                                if ($current_image <> ""){
                                    echo "<img src='".SITEURL."/imgs/hebdo/".$current_image."' style='max-width: 100px;' name='image'>";
                                }else {
                                    echo "<div class='text-danger'>Image non ajoutée</div>";
                                }
                                ?> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="image" class="form-label">Sélectionner une nouvelle image</label>
                        </td>
                        <td>
                            <input required type="file" class="form-control" id="image" name="image" placeholder="Aucune image choisie">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="featured" class="me-3">En vedette</label>
                        </td>
                        <td>
                            <input required <?php if ($featured == "Oui") echo 'checked' ?> type="radio" name="featured" value="Oui"> Oui
                            <input required <?php if ($featured == "Non") echo 'checked' ?> type="radio" name="featured" value="Non"> Non
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="active">Active</label>
                        </td>
                        <td>
                            <input required <?php if ($active == "Oui") echo 'checked' ?> type="radio" name="active" value="Oui"> Oui
                            <input required <?php if ($active == "Non") echo 'checked' ?> type="radio" name="active" value="Non"> Non
                        </td>
                    </tr>
                </table>
                <input required type="submit" value="Enregistrer" class="btn btn-success ms-2 mb-3" name="submit">
            </div>
        </form>
    
        <?php
            if (isset($_POST['submit'])){
                $id = $id;
                $title = $_POST['title'];
                $description = $_POST['description'];
                $current_image= $current_image;
                $featured = $_POST['featured'];
                $active = $_POST['active'];
                $publish_date = NULL;
                if ($active === 'Oui') {
                    $publish_date = date('Y-m-d');  // Set to current date if active is 'Oui'
                }
                
                $image_name = $_FILES['image']['name'];
                // Get the extension of our image
                if ($image_name <> ""){
                    // $extention = end(explode('.',$image_name));
                    $tmp = explode('.', $image_name);
                    $extention = end($tmp);
                    //Rename the image
                    $image_name = "Hebdo_name_".rand(0000,9999).'.'.$extention;
                    $source_path = $_FILES['image']['tmp_name'];    
                    $destination_path = "../imgs/hebdo/".$image_name;
                    // $image_name
                    //Finally we will upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);
                    if ($upload == false){
                        $_SESSION['operation'] ="<div class='alert alert-danger alert-dismissible'>
                                                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                Failed to Upload image
                                            </div>";
                        //Redirect page
                        header('location:'.SITEURL ."admin/manage-hebdo.php");
                        die(); // Break
                    }
                    if ($current_image == ""){
                        $image_name = $image_name;
                    }else{
                        $remove_path = "../imgs/hebdo/$current_image";
                        $remove = unlink($remove_path);
                        if ($remove == false){
                            $_SESSION['operation'] ="<div class='alert alert-danger alert-dismissible'>
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                    Failed to Remove the current image
                                                </div>";
                            header('location:'.SITEURL ."admin/manage-hebdo.php"); exit;
                        }   
                    }
                
                }else {
                    $image_name = $current_image;
                }
                
                
                $title = mysqli_real_escape_string($conn, $title);
                $description = mysqli_real_escape_string($conn, $description);
                $image_name = mysqli_real_escape_string($conn, $image_name);
                $featured = mysqli_real_escape_string($conn, $featured);
                $active = mysqli_real_escape_string($conn, $active);
                $id = (int) $id; // Ensure ID is an integer
            
                $sql_update = "UPDATE tbl_hebdo SET 
                                title = '$title',  
                                description = '$description', 
                                image_name = '$image_name',
                                publish_date = '$publish_date',
                                featured = '$featured', 
                                active = '$active',
                                category_id = '$category_id'
                                WHERE id = $id"; // Note: No quotes around $id if it's an integer
                        
                $res_update = mysqli_query($conn, $sql_update);
    
                if (!$res_update) {
                    die("Error: " . mysqli_error($conn));
                }
                if ($res_update == true) {
                    $_SESSION['operation'] ="<div class='alert alert-success alert-dismissible'>
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                    Hebdo mise à jour avec succès
                                            </div>";
                    header('location:'.SITEURL."admin/manage-hebdo.php");exit;
                }else {
                    $_SESSION['operation'] ="<div class='alert alert-danger alert-dismissible'>
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                    Échec de la mise à jour de l'hebdo
                                            </div>";
                                            
                    header('location:'.SITEURL."admin/manage-hebdo.php");exit;
                }
            }
        ?>
    </section>
    <?php include('partials/footer.php') ; ob_end_flush();?>
    <script src="../bootstrap/all.min.js"></script>
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.5.2/jquery-migrate.min.js" integrity="sha512-BzvgYEoHXuphX+g7B/laemJGYFdrq4fTKEo+B3PurSxstMZtwu28FHkPKXu6dSBCzbUWqz/rMv755nUwhjQypw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>