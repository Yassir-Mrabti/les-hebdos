<?php include('config/constants.php');
include('login-check.php');
ob_start(); 
?>
    <!-- navbar and menu -->
<header>
    <nav class="navbar expend-sm-navbar navbar-white bg-white for-padding shadow-sm">
        <div>
            <a href="index.php" class="navbar-brand">
                <img src="imgs/brand_logo_dark.svg" alt="Logo Hebdo" style="width: 100px;">
            </a>
        </div>
        <div class="d-flex justify-content-end align-items-center img-icon gap-3">
            <a href="les-hebdos.php" class="border-0 lien-font">Les Hebdos.</a>
            <a type="button" class="border-0 openNav-search"><img src="imgs/search.svg" alt="Icône de recherche"></a>
            <a type="button" class="border-0 openNav-menu"><img src="imgs/menu.svg" alt="Icône de menu"></a>
        </div>
        <div class="overlay" id="myNav">
            <div class="container">
                <div class="d-flex justify-content-between beginning-menu">
                    <div class="img-logo pt-2">
                        <a href="index.php"><img src="imgs/logo_hedbo.svg" alt="Logo"></a>
                    </div>
                    <div class="beginning-menu">
                        <a href="#" class="closebtn closeNav">&times;</a>
                    </div>  
                </div>

                <div class="overlay-content d-flex flex-column justify-content-start py-3 gap-2 menu-links">
                    <a href="index.php">Accueil</a>
                    <a href="reason_why.php">Pourquoi L'Hebdo</a>
                    <a href="categories.php">Catégories</a>
                    <a href="charte.php">Charte éditoriale</a>
                    <a href="form.php">Contactez-nous</a>
                    <a href="logout.php">Déconnexion</a>
                </div>

                <div class="d-flex justify-content-between align-items-center gap-3 pt-3">
                    <div class="myPoint"></div>
                    <div class="container line"></div>
                </div>

                <div class="menu-footer mt-3">
                    <p class="m-0"><a href="mailto:contact@lhebdo.ma" class="contact-hedbo">contact@lhebdo.ma</a></p>
                    <p class="m-0">+212 656 656 656</p>
                </div>
            </div>
        </div>

        <div class="overlay" id="navSearch">
            <div class="container myContent-overlay">
                <div class="d-flex justify-content-end">
                    <a href="#" class="closebtn closeNav beginning-menu">&times;</a>
                </div>
                <div class="mySearch">
                    <form class="container rech">
                        <input type="search" placeholder="Recherche" class="form-control search">
                    </form>
                    <div class="container d-flex justify-content-end taper">
                        <p class="m-0 pt-2">Tapez et appuyez sur Entrée</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>


