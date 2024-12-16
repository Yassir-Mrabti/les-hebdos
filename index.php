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
        <!-- beginning of first section-->
    <?php 
                if(isset($_SESSION['operation'])){
                    echo $_SESSION['operation'];
                    unset($_SESSION['operation']);
                }   
            ?>
    <section>
        <div class="container container-height">
            <div class="row">
                <div class="col-sm-6 py-5 test">
                    <h1 class="pb-3">Evénement,<br>des médias.</h1>
                    <p class="text-style">Chaque dimanche, L’hebdo <br>dans votre boite mail.</p>
                </div>        
                <div class="col-sm-6">
                    <img src="imgs/homePageImg.png" alt="Home page image" class="homePageImg">
                </div>        
            </div>
        </div>
    </section>
    <!-- beginning of Second section-->
    <section>
        <div class="second_section d-flex justify-content-between">
            <div class="container p-0">
                <div class="row p-0">
                    <div class="col-5 pt-5 p-0 hidden">
                        <img src="imgs/hebdo_phone.png" class="phone_img">
                    </div>
                    <div class="col-7 p-0 d-flex flex-column justify-content-center hidden align-items-center">
                        <div class="dimensions">
                            <p class="text-para">L'hebdo, l'actualité explixée en <br>5 minutes par jour.</p>
                        </div>
                        <div class="flex flex-column follow-input">
                            <form class="d-flex py-5 justify-content-center align-items-center control-dimen">
                                <input type="email" class="form-control for-height-bg follow" placeholder="Votre adresse email professionnelle">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn submitBtn br-radius">S'abonner</button>
                                </div> 
                            </form>
                            <small class="small-text">L’Hebdo s’engage à ne pas partager votre mail à des fins promotionnelles.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- beginning of Final section-->
    <section >
        <div class="container-fluid third-section">
            <div class="container text-center pt-5 ">
                <h2><span class="title-p1">Ils soutinnent</span> <span class="title-p2">L</span><span class="hebdo">’</span><span class="title-p2">Hebdo</span><span class="hebdo">.</span></h2>
                <p class="td-s-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <div class="container multiple-items ">
                <div >
                    <div class="container test-t text-center pt-3">
                        <div class="d-flex flex-column justify-content-center">
                            <span class="my-3"><img src="imgs/icon_slick.svg" alt="Icon slide"></span>
                            <p class="slide-para m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Auctor neque sed imperdiet nibh lectus feugiat nunc sem.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="text-center d-flex flex-column pt-3">
                        <img src="imgs/slide_img.png" alt="Jane Cooper" class="circle pt-3">
                        <h4 class="pt-3">Jane Cooper</h4>
                        <p class="slide-text">CEO at ABC Corporation</p>
                    </div>
                </div>
    
                <div >
                    <div class="container test-t text-center pt-3">
                        <div class="d-flex flex-column justify-content-center">
                            <span class="my-3"><img src="imgs/icon_slick.svg" alt="Icon slide"></span>
                            <p class="slide-para m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Auctor neque sed imperdiet nibh lectus feugiat nunc sem.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="text-center d-flex flex-column pt-3">
                        <img src="imgs/slide_img.png" alt="Jane Cooper" class="circle pt-3">
                        <h4 class="pt-3">Jane Cooper</h4>
                        <p class="slide-text">CEO at ABC Corporation</p>
                    </div>
                </div>
    
                <div >
                    <div class="container test-t text-center pt-3">
                        <div class="d-flex flex-column justify-content-center">
                            <span class="my-3"><img src="imgs/icon_slick.svg" alt="Icon slide"></span>
                            <p class="slide-para m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Auctor neque sed imperdiet nibh lectus feugiat nunc sem.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="text-center d-flex flex-column pt-3">
                        <img src="imgs/slide_img.png" alt="Jane Cooper" class="circle pt-3">
                        <h4 class="pt-3">Jane Cooper</h4>
                        <p class="slide-text">CEO at ABC Corporation</p>
                    </div>
                </div>
    
                <div >
                    <div class="container test-t text-center pt-3">
                        <div class="d-flex flex-column justify-content-center">
                            <span class="my-3"><img src="imgs/icon_slick.svg" alt="Icon slide"></span>
                            <p class="slide-para m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Auctor neque sed imperdiet nibh lectus feugiat nunc sem.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="text-center d-flex flex-column pt-3">
                        <img src="imgs/slide_img.png" alt="Jane Cooper" class="circle pt-3">
                        <h4 class="pt-3">Jane Cooper</h4>
                        <p class="slide-text">CEO at ABC Corporation</p>
                    </div>
                </div>
                
                <div >
                    <div class="container test-t text-center pt-3">
                        <div class="d-flex flex-column justify-content-center">
                            <span class="my-3"><img src="imgs/icon_slick.svg" alt="Icon slide"></span>
                            <p class="slide-para m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Auctor neque sed imperdiet nibh lectus feugiat nunc sem.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="text-center d-flex flex-column pt-3">
                        <img src="imgs/slide_img.png" alt="Jane Cooper" class="circle pt-3">
                        <h4 class="pt-3">Jane Cooper</h4>
                        <p class="slide-text">CEO at ABC Corporation</p>
                    </div>
                </div>
    
                
            </div>
        </div>
    </section>
    <!-- beginning of the Footer-->
    <?php include("partials-front/footer.php")?>
</body>
    <script src="bootstrap/all.min.js"></script>
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.5.2/jquery-migrate.min.js" integrity="sha512-BzvgYEoHXuphX+g7B/laemJGYFdrq4fTKEo+B3PurSxstMZtwu28FHkPKXu6dSBCzbUWqz/rMv755nUwhjQypw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="js/main.js"></script>
</html>