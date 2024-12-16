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
<?php include("partials-front/menu.php");
$id = $_GET['id']
?>
    <section class="sec-one">
        <?php
            $sql = "select * from tbl_hebdo where id=$id";
            $res = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_assoc($res)){
                $title = $row['title'];
                $description = $row['description'];
                $publish_date = $row['publish_date'];
                $image_name = $row['image_name'];
            }
            $paragraphs = explode("\n",$description);
        ?>
        <div class="container text-center text-white pt-5">
            <h1 class="text-center mt-3 pt-5 title-style"><?=$title?></h1>
            <p class="text-center"><?=$publish_date?></p>
        </div>
    </section>

    <section class="sec-two">
        <div class="container">
            <img src="<?=SITEURL?>imgs/hebdo/<?=$image_name?>" style="width:100%; height:auto" class="rounded" alt="<?=$title?>">
        </div>
        <div class="container container-section">
            <!-- <h2>Lorem Ipsum</h2> -->
            <?php
            foreach ($paragraphs as $paragraph) {
                echo "<p class='ph-text'>" . htmlspecialchars($paragraph) . "</p>";
            }
            ?>
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
