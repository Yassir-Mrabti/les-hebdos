<!DOCTYPE html>
<html lang="fr">
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
    <?php include('partials/menu.php') ?>
<!-- début de la section principale -->
    <section>
        <div class="container py-4">
            <h2 class="manage-title">Géstion des Utilisateurs</h2>
            <?php 
                if(isset($_SESSION['operation'])){
                    echo $_SESSION['operation'];
                    unset($_SESSION['operation']);
                }   
            ?>
            <div class="mb-3 d-flex justify-content-end">
                <a href="add-user.php" class="btn btn-lg btn-outline-primary">Ajouter</a>
            </div>

            <table class="table table-bordered">
                <tr class="table-light">
                    <th>N°</th>
                    <th>Nom et prénom</th>
                    <th>Nom d'utilisateur</th>
                    <th>Admin</th>
                    <th>Actions</th>
                </tr>

                <?php 
                    //Requête pour obtenir tous les administrateurs
                    $sql = 'Select * from tbl_user';
                    //Exécuter la requête
                    $res = mysqli_query($conn, $sql);
                    //Vérification 
                    $sn = 1;
                    if ($res == true){
                        $count = mysqli_num_rows($res); //Fonction pour obtenir toutes les lignes de la base de données
                        if ($count > 0){
                            while ($rows = mysqli_fetch_assoc($res)){
                                $id = $rows['id'];
                                $nom_complet = $rows['full_name'];
                                $nom_utilisateur = $rows['username'];
                                if ($rows['is_admin'] == 1){
                                    $is_admin = 'Vrai';
                                }else {
                                    $is_admin = 'Faux';
                                }
                            ?>
                            <tr>
                                <td class="table-light pt-4"><?php echo $sn++ ?></td>
                                <td class="pt-4"><?php echo $nom_complet ?></td>
                                <td class="pt-4"><?php echo $nom_utilisateur ?></td>
                                <td class="pt-4"><?php echo $is_admin ?></td>
                                <td class="py-3">
                                    <a href="<?php echo SITEURL;?>admin/update-password-user.php?id=<?php echo $id ?>" class="btn btn-outline-primary">Changer le mot de passe</a>
                                    <a href="<?php echo SITEURL;?>admin/update-user.php?id=<?php echo $id ?>" class="btn btn-outline-success">Modifier</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-user.php?id=<?php echo $id ?>" class="btn btn-outline-danger">Supprimer</a>
                                </td>
                            </tr>
                            <?php }
                        }
                    }
                ?>
            </table>
        </div>
    </section>
    <!-- fin de la section principale -->
    <?php include('partials/footer.php') ?>
    <script src="../bootstrap/all.min.js"></script>
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.5.2/jquery-migrate.min.js" integrity="sha512-BzvgYEoHXuphX+g7B/laemJGYFdrq4fTKEo+B3PurSxstMZtwu28FHkPKXu6dSBCzbUWqz/rMv755nUwhjQypw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>
