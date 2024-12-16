<!DOCTYPE html>
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
</head>
<body>
<?php include("partials-front/menu.php")?>
    <section class="sec-one">
        <div class="container text-center text-white pt-5">
            <h1 class="text-center  mt-3 pt-5 title-style">Categories.</h1>
        </div>
    </section>

    <section>
        <div class="container p-0 m-auto mt-4">
            <?php
                $username = $_SESSION['user'];
                $sql_check = "SELECT * FROM tbl_user WHERE username = '$username' AND is_admin = 1";
                $res_check = mysqli_query($conn, $sql_check);
                $count_check = mysqli_num_rows($res_check);
                if ($res_check) {
                    if ($count_check > 0) {
                        ?>
                        <a href="admin/manage-category.php" class="btn btn-lg bg-dark text-white mb-4">Gérer les catégories</a>
            <?php }}?>
            <div class="row mb-5">
            <?php 
                $rows_pre_page = 9;
                $page = isset($_GET['page-nr']) ? $_GET['page-nr'] : 1;
                $start = ($page - 1) * $rows_pre_page;
                $sql = "SELECT * from tbl_category WHERE active ='Oui' LIMIT $start, $rows_pre_page";
                //Execute query
                
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res) ;//Function to get all the rows in db
                if ($count >0 ){
                    $counter = 0;
                    while ($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        $counter++;
                        ?>
                        <div class="col-sm-4" style="cursor: pointer;" onclick="window.location.href='les-hebdos.php?category_id=<?=$id?>'">
                            <div class="card border-0 all-4-u">
                                <div class="gap-3">
                                    <img src="<?=SITEURL?>imgs/category/<?=$image_name?>" alt="<?=$image_name?>" style="width: 350px; height: 224px;">
                                </div>
                                <div class="card-text me-0 d-flex justify-content-center">
                                    <p class="m-0 mt-3 pb-2"><?=$title?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                            if($count == 3 and $counter == 3 ) {
                            break;
                            }
                            if ($counter == 9){
                                break;
                            }
                            if ($counter % 3 == 0 ){
                                echo '<hr class="my-5">';
                            }
                        ?>
            <?php }}?>
            </div>
            <div class="border-test mb-4"></div>

            <div class="d-flex justify-content-between align-items-center mb-10">
                <?php 
                $rows_pre_page = 9;
                $page = isset($_GET['page-nr']) ? $_GET['page-nr'] : 1;
                $start = ($page - 1) * $rows_pre_page;
                // Re-run the query to count total rows (without pagination)
                $count_sql = "SELECT COUNT(*) as total FROM tbl_category WHERE active='Oui'";
            
                $count_res = mysqli_query($conn, $count_sql);
                $total_rows = mysqli_fetch_assoc($count_res)['total'];
                $pages = ceil($total_rows / $rows_pre_page);
                ?>

                <div>
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link border-0 text-dark" href="?page-nr=1">
                                <i class="fa-solid fa-arrow-left-long"></i>&nbsp;&nbsp; Previous
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <ul class="pagination">
                        <?php for($i = 1; $i <= $pages; $i++): ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                <a class="page-link myBtn rounded" href="?page-nr=<?=$i?>"><?=$i?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div>

                <div>
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link border-0 text-dark" href="?page-nr=<?=$pages?>">
                                Next &nbsp;&nbsp;<i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>    
        </div>
    </section>
    <?php include("partials-front/footer.php")?>
</body>
    <script src="bootstrap/all.min.js"></script>
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.5.2/jquery-migrate.min.js" integrity="sha512-BzvgYEoHXuphX+g7B/laemJGYFdrq4fTKEo+B3PurSxstMZtwu28FHkPKXu6dSBCzbUWqz/rMv755nUwhjQypw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="js/main.js"></script>
</html>
    
