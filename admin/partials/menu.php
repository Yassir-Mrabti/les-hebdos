<?php 
    include('../config/constants.php');
    include('login-check.php');
?>
    <style>
        body{
            font-family: 'Futura Bk BT';
            margin: 0;
            padding: 0;
        }
        .manage-title {
            font-family: 'Elephant' !important;
            margin: 0;
            padding: 0;
        }
        .test-col{
            padding: 30px 20px 15px !important; /* Equal padding on top/bottom and left/right */
        }
        .test-img {
            padding: 15px 20px !important;
        }
    </style>
    <!-- menu section starts -->
    <header>
        <nav class="navbar expend-sm-navbar navbar-white bg-white for-padding shadow-sm">
            <div>
                <a href="index.php" class="navbar-brand">
                    <img src="../imgs/brand_logo_dark.svg" alt="Hebdo logo" style="width: 100px;">
                </a>
            </div>
            <div class="d-flex justify-content-end align-items-center img-icon gap-3">
                <a href="manage-hebdo.php" class="border-0 lien-font">Les Hebdos.</a>
                <a type="button" class="border-0 openNav-menu"><img src="../imgs/menu.svg" alt="Menu Icon"></a>
            </div>
            <div class="overlay" id="myNav">
                <div class="container">
                    <div class="d-flex justify-content-between">
                        <div class="img-logo pt-3">
                            <a href="index.php"><img src="../imgs/logo_hedbo.svg" alt=""></a>
                        </div>
                        <div>
                            <a href="#" class="closebtn closeNav">&times;</a>
                        </div>  
                    </div>

                    <div class="overlay-content d-flex flex-column justify-content-start py-5 gap-2">
                        <a href="index.php">Accueil</a>
                        <a href="manage-admin.php">Admin</a>
                        <a href="manage-user.php">Utilisateur</a>
                        <a href="manage-category.php">Catégorie</a>
                        <a href="#">Contact</a>
                        <a href="logout.php">Déconnexion</a>
                    </div>

                    <div class="d-flex justify-content-between align-items-center gap-3 pt-4">
                        <div class="myPoint"></div>
                        <div class="container line"></div>
                    </div>
                </div>
            </div>
        </nav>       
    </header>