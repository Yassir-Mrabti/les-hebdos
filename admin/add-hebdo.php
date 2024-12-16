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
    <?php 
    include('partials/menu.php'); 
    // Start the output buffer
    ob_start(); 
    ?>
    <section>
        <div class="container px-5 pt-3">
            <h2 class="mb-3">Ajouter Hebdo</h2>
            <form action="add-hebdo.php" method="post" enctype="multipart/form-data">
                <div class="myContainer">
                <table class="table">
                        <tr>
                            <td>
                                <label for="title" class="form-label me-5">Titre</label>
                            </td>
                            <td>
                                <input required type="text" class="form-control" id="title" name="title" placeholder="Titre de l'hebdo">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="desc" class="form-label">Description</label>
                            </td>
                            <td>
                                <textarea class="form-control" id="desc" name="desc" rows="5" placeholder="Description de l'hebdo"></textarea>
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
                                <label for="category" class="form-label me-5">Catégorie</label>
                            </td>
                            <td>
                                <select name="category" class="form-select">
                                <?php 
                                    $sql= "Select * From tbl_category where active='Oui'";
                                    $res = mysqli_query($conn, $sql);
                                    $count = mysqli_num_rows($res);
                                    if ($count > 0){
                                    while ($rows = mysqli_fetch_assoc($res)){
                                    $id = $rows['id'];
                                    $title = $rows['title'];
                                    ?>
                                        <option value="<?=$id?>" name="category"><?=$title;?></option> 
                                    <?php
                                    }}else {
                                    ?>
                                        <option value="0">Aucune catégorie disponible</option> 
                                    <?php }?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="featured" class="form-label me-3">En vedette</label>
                            </td>
                            <td>
                                <input required type="radio" id="featured" name="featured" value="Oui"> Oui
                                <input required type="radio" id="featured" name="featured" value="Non" checked> Non
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="active" class="form-label">Active</label>
                            </td>
                            <td>
                                <input required type="radio" id="active" name="active" value="Oui"> Oui
                                <input required type="radio" id="active" name="active" value="Non" checked> Non
                            </td>
                        </tr>
                    </table>
                    <input required type="submit" value="Enregistrer" class="btn btn-success mb-3" name="submit">
                </div>
            </form>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $title = $_POST['title'];
                    $desc = $_POST['desc'];
                    $category = $_POST['category'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];

                    if (isset($_FILES['image'])){
                        $image_name = $_FILES['image']['name'];
                        if ($image_name <> ""){
                            $tmp=explode('.',$image_name);
                            $ext = end($tmp);
                            //Rename the image
                            $image_name = "Hebdo_name_".rand(0000,9999).'.'.$ext;
                            $source_path = $_FILES['image']['tmp_name'];
                            
                            $destination_path = "../imgs/hebdo/".$image_name;
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
                    } else {
                        $image_name = ""; // default value (blank)
                    }
                    $title = mysqli_real_escape_string($conn, $title);
                    $desc = mysqli_real_escape_string($conn, $desc);
                    $image_name = mysqli_real_escape_string($conn, $image_name);
                    $featured = mysqli_real_escape_string($conn, $featured);
                    $active = mysqli_real_escape_string($conn, $active);
                    $id = (int) $id; 
                    $publish_date = NULL;
                    if ($active === 'Yes') {
                        $publish_date = date('Y-m-d');  // Set to current date if active is 'Yes'
                    }
                    $sql_insert = "Insert into tbl_hebdo set
                            title = '$title',
                            description = '$desc',
                            image_name = '$image_name',
                            publish_date = '$publish_date',
                            category_id = '$category',
                            featured = '$featured',
                            active = '$active'";
                    $res_insert = mysqli_query($conn, $sql_insert);
                    if (!$res_insert) {
                        die("Error: " . mysqli_error($conn));
                    }

                    if ($res_insert == true) {
                        $_SESSION['operation'] = "<div class='alert alert-success alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        Hebdo ajouté avec succès
                        </div>";
                        header('location:'.SITEURL.'admin/manage-hebdo.php');
                        exit;
                    }else {
                        $_SESSION['operation'] = "<div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        Hebdo n'a pas été ajouté
                        </div>";
                        header('location:'.SITEURL.'admin/manage-hebdo.php');
                    }
                }
            ?>
        </div>
    </section>

    <?php 
    include('partials/footer.php'); 
    ob_end_flush(); // Flush the output buffer and turn off output buffering
    ?>
    <script src="../bootstrap/all.min.js"></script>
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.5.2/jquery-migrate.min.js" integrity="sha512-BzvgYEoHXuphX+g7B/laemJGYFdrq4fTKEo+B3PurSxstMZtwu28FHkPKXu6dSBCzbUWqz/rMv755nUwhjQypw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>

