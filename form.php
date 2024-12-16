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
    <section class="section-one">
        <div class="container text-center pt-5">
            <h1 class="text-center  mt-3 pt-5 title-style">Contactez - nous</h1>
        </div>
    </section>
    <section>
        <div class="container my-5 section-two">
            <form class="myContact" method="post" action="">
                <div class=" d-flex flex-column justify-content-center align-items-center">
                    <p>Lorem Ipsum is simply dummy text of the</p><p>printing and typesetting industry.</p>
                </div>
                <div class="pt-4  d-flex flex-column justify-content-between align-items-center">
                    <input type="email" name="email" class="form-control h-sixty fomr-w" placeholder="E-mail">
                </div>
    
                <div class="d-flex flex-column justify-content-between align-items-center for-margin">
                    <input type="text" name="nom" class="form-control h-sixty fomr-w" placeholder="Votre nom">
                </div>
    
                <div class="d-flex flex-column justify-content-between align-items-center for-margin">
                    <textarea class="form-control fomr-w" name="message" placeholder="Votre message" rows="5" ></textarea>
                </div>
    
                <div class="d-flex flex-column justify-content-between align-items-center for-margin">
                    <input type="submit" class="btn btnInput" name="submit" value="Envoyer">
                </div>
            </form>
            <?php
                if (isset($_POST['submit'])) {
                    $email = trim($_POST['email']);
                    $nom = trim($_POST['nom']);
                    $msg = trim($_POST['message']);

                    $sql = "INSERT INTO tbl_contact SET
                        adresse_email = '$email',
                        nom = '$nom',
                        message = '$msg'
                    ";
                    $res = mysqli_query($conn, $sql);

                    if ($res) {
                        $to      = $email;
                        $subject = 'Merci de nous avoir contactés';
                        $message = "Bonjour $nom,\n\n";
                        $message .= "Merci de nous avoir contactés. Nous avons bien reçu votre message et nous allons l'examiner. Nous essaierons de vous répondre dans les plus brefs délais.\n\n";
                        $message .= "Cordialement,\n";
                        $message .= "Propriétaire d'Hebdo\n";

                        $headers = 'From: yassire.mrabti@gmail.com' . "\r\n" .
                                    "Reply-To: $email" . "\r\n" .
                                    'X-Mailer: PHP/' . phpversion();

                        mail($to, $subject, $message, $headers);
                        if (mail($to, $subject, $message, $headers)) {
                            echo "Email sent successfully!";
                        } else {
                            echo "Failed to send email.";
                        }                        
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
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

    