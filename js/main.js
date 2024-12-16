$(document).ready(function(){
    $('.multiple-items').slick({
        infinite:true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        // centerMode:true,
        dots:true,
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }]
    });

    $('.openNav-search').click(function(){
        $('#navSearch').show()
    })

    $('.openNav-menu').click(function(){
        $('#myNav').show()
    })

    $('.closeNav').click(function(){
        $('#navSearch').hide()
        $('#myNav').hide()
    })

    // $('#myDiv').delay(1000).hide(500); 
});

function changeToSignup() {
  document.getElementById("welcometext").innerHTML = "Créer un nouveau compte";
  document.getElementById("logintext").innerHTML = "Entrez vos coordonnées,<br> et commencez votre voyage avec nous";
  document.getElementById("signinBtn").style.display = "none";
  document.getElementById("signupBtn").style.display = "block";
  document.getElementById("signin").classList.add("d-none");
  document.getElementById("signup").classList.remove("d-none");
  document.getElementById("here").classList.remove("bg-login");
  document.getElementById("here").classList.add("bg-sign");
}

function changeToSignin() {
  document.getElementById("welcometext").innerHTML = "Bienvenue";
  document.getElementById("logintext").innerHTML = "pour rester connecté avec nous,<br> veuillez vous connecter avec vos informations personnelles";
  document.getElementById("signupBtn").style.display = "none";
  document.getElementById("signinBtn").style.display = "block";
  document.getElementById("signup").classList.add("d-none");
  document.getElementById("signin").classList.remove("d-none");
  document.getElementById("here").classList.add("bg-login");
  document.getElementById("here").classList.remove("bg-sign");
}

function submitForm() {
  document.getElementById('dateForm').submit();
}
