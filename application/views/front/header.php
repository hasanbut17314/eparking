<!DOCTYPE html>
<html lang="en">
  <head>
    <title>E-Parking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/front/css/open-iconic-bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/front/css/animate.css')?>">
    
    <link rel="stylesheet" href="<?= base_url('assets/front/css/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/front/css/owl.theme.default.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/front/css/magnific-popup.css')?>">

    <link rel="stylesheet" href="<?= base_url('assets/front/css/aos.css')?>">

    <link rel="stylesheet" href="<?= base_url('assets/front/css/ionicons.min.css')?>">

    <link rel="stylesheet" href="<?= base_url('assets/front/css/bootstrap-datepicker.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/front/css/jquery.timepicker.css')?>">

    
    <link rel="stylesheet" href="<?= base_url('assets/front/css/flaticon.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/front/css/icomoon.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/front/css/style.css')?>">
    <style>
       .dropbtn {

 

padding: 16px;

font-size: 16px;

border: none;

}



.dropdown {

position: relative;

display: inline-block;

}

.hero-wrap.hero-wrap-2.js-fullheight{
background-position: 50% 87%;
}


.dropdown-content {

display: none;

position: absolute;

background-color: #f1f1f1;

min-width: 160px;

box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

z-index: 1;

}



.dropdown-content a {

color: black;

padding: 12px 16px;

text-decoration: none;

display: block;

}



.dropdown-content a:hover {background-color: #ddd;}



.dropdown:hover .dropdown-content {display: block;}
    </style>
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?= base_url('/')?>">E<span>Parking</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="<?= base_url('/')?>" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="<?= base_url('front/about')?>" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="<?= base_url('front/contact_us')?>" class="nav-link">Contact</a></li>
            <?php if(!empty($this->session->userdata('email'))){ ?>

            <div class="dropdown">

                <button class="dropbtn" style="background: none;color: #fff;"><?= $this->session->userdata('name')?></button>

                <div class="dropdown-content">

                <a href="<?= base_url('front/profile')?>">Profile</a>
                  <a href="<?= base_url('front/profiles')?>">Mybookings </a>

                  <a href="logout">Logout</a>

                  

                </div>

              </div>

            <?php } else {?>

            <li class="nav-item"><a onclick="routeChanger()" class="nav-link">Login/Register</a></li>

            <?php } ?>
            
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <script>

    function routeChanger(){

      window.location = "<?= base_url('front/login') ?>";
    }
    </script>