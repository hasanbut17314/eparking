<style>

     .hero-wrap.hero-wrap-2 .slider-text{

            height: 390px !important

    }

    .hero-wrap.hero-wrap-2 .overlay{

         height: 390px !important

    }

    .hero-wrap.hero-wrap-2{

        height: 390px !important

    }

    .accountbtn:hover{

        background:#fff !important;

        border:1px solid #00aa56 !important;

        color: #00aa56;

    }

    .createaccount:hover{

        color: #000 !important;

    }

   @media only screen and (max-width: 768px) {

        .login_back_image{

               display: none !important;

        }

    }

</style>

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../assets/front/images/bg_3.jpg');" data-stellar-background-ratio="0.5">

      <div class="overlay"></div>

      <div class="container">

        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">

          <div class="col-md-9 ftco-animate pb-5">

          	<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url('front');?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Login <i class="ion-ios-arrow-forward"></i></span></p>

            <h1 class="mb-3 bread">Login</h1>

          </div>

        </div>

      </div>

    </section>

  <!--================Login Box Area =================-->

  <section class="login_box_area section_gap">

    <div class="container">

      <div class="row">

        <!--<div class="col-lg-6 login_back_image">-->

        <!--  <div class="login_box_img">-->

        <!--    <img class="img-fluid" src="<?php echo base_url('assets/front/images/login.jpg')?>" alt="">-->

           

        <!--  </div>-->

        <!--</div>-->

  


        <div class="col-lg-12">

          <div class="login_form_inner" style="    border: 1px solid lightgray;">

            <h3>Log in to enter</h3>

            <?php  

                          if($this->session->flashdata('message')){

                             echo '<div class="alert" style="    padding: 0;    color: red;">';

                              echo 'Email Or Password Incorrect.';

                            echo '</div>';

                        }

                          else{

                        

                          }

                      ?>

                        <form class="row login_form" action="<?= base_url('front/saveRegisterData')?>" method="post" enctype="multipart/form-data" id="contactForm" onsubmit="return validatePasswords();">

                        <div class="col-md-12 form-group">

                       <select class="form-control" id="options" name="options" required style="border-top: unset;border-left: unset;border-right: unset;">
                        <option value="1">Driver</option>
                        <option value="2">Parking Owner</option>
                       </select>

                        </div>

              <div class="normal_driver">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name" required="">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name" required="">
                        </div>

                        <div class="col-md-12 form-group">

                        <input type="email" class="form-control" id="nemail" name="nemail" placeholder="Enter Email" required="">

                        </div>

                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter phone number" required="">
                        </div>

                        <div class="col-md-12 form-group">

                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required="">

                        </div>

                        <div class="col-md-12 form-group">

                        <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Enter confirm Password" required="">

                        </div>

                        <div class="col-md-12 form-group">
                            <input type="date" class="form-control" id="datebirth" name="datebirth" placeholder="Enter Date of birth" required="">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required="">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required="">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="post_code" name="post_code" placeholder="Enter Post code" required="">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="file" class="form-control" id="carimage" name="carimage" placeholder="Enter Post code" >
                        </div>

                        <div class="col-md-12 form-group vatnumber" style="display:none">
                            <input type="text" class="form-control" id="vatnum" name="vatnum" placeholder="Enter vat number" >
                        </div>
                </div>

                <!-- <div class="parking_owner" style="display:none">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Username" required="">
                        </div>

                        <div class="col-md-12 form-group">

                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required="">

                        </div>

                        <div class="col-md-12 form-group">

                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required="">

                        </div>

                        <div class="col-md-12 form-group">

                        <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Enter confirm Password" required="">

                        </div>
                </div> -->






<div class="col-md-12 form-group">

  <button type="submit" value="submit" class="primary-btn accountbtn"style="    background: linear-gradient(90deg, #00aa56 0%, #00aa56 100%);    margin-bottom: 20px;border-radius: 8px;">Submit</button>
  <a class="createaccount" href="<?= base_url('front/login')?>" style="color: #00aa56 ;    font-size: 13px;">Login Here?</a>
 
</div>

</form>
        

          </div>

        </div>

      </div>

    </div>

  </section>

  <!--================End Login Box Area =================-->



<style type="text/css">

  .section_gap {

    padding: 100px 0;

}

.login_box_area .login_box_img {

    margin-right: -30px;

    position: relative;

}

.login_box_area .login_box_img:before {

    position: absolute;

    left: 0;

    top: 0;

    height: 100%;

    width: 100%;

    content: "";

    background: #000;

    opacity: .5;

}

.login_box_area .login_box_img img {

    width: 100%;

}

.login_box_area .login_box_img .hover {

    position: absolute;

    top: 50%;

    left: 0px;

    text-align: center;

    width: 100%;

    transform: translateY(-50%);

}

.login_box_area .login_box_img .hover h4 {

    font-size: 24px;

    color: #fff;

    margin-bottom: 15px;

}

.login_box_area .login_box_img .hover p {

    max-width: 380px;

    margin: 0px auto 25px;

    color: #fff;

}

.login_box_area .login_box_img .hover .primary-btn {

    border-radius: 0px;

    line-height: 38px;

    text-transform: uppercase;

}

.primary-btn {

    position: relative;

    overflow: hidden;

    color: #fff;

    padding: 0 30px;

    line-height: 50px;

    border-radius: 50px;

    display: inline-block;

    text-transform: uppercase;

    font-weight: 500;

    cursor: pointer;

    -webkit-transition: all 0.3s ease 0s;

    -moz-transition: all 0.3s ease 0s;

    -o-transition: all 0.3s ease 0s;

    transition: all 0.3s ease 0s;

        background: linear-gradient(90deg, #ffba00 0%, #ff6c00 100%);

}

.login_form_inner {

    box-shadow: 0px 10px 30px 0px #00aa5614;

    height: 100%;

    text-align: center;

    padding-top: 115px;

}

.login_form_inner h3 {

    color: #222222;

    text-transform: uppercase;

    font-size: 18px;

    margin-bottom: 30px;

}

.login_form_inner .login_form {

    max-width: 385px;

    margin: auto;

}

.login_form .form-group input {

    height: 54px;

    border: none;

    border-bottom: 1px solid #cccccc;

    border-radius: 0px;

    outline: none;

    box-shadow: none;

}

.login_form .form-group .primary-btn {

    display: block;

    border-radius: 0px;

    line-height: 38px;

    width: 100%;

    text-transform: uppercase;

    border: none;

}

.primary-btn {

    position: relative;

    overflow: hidden;

    color: #fff;

    padding: 0 30px;

    line-height: 50px;

    border-radius: 50px;

    display: inline-block;

    text-transform: uppercase;

    font-weight: 500;

    cursor: pointer;

    -webkit-transition: all 0.3s ease 0s;

    -moz-transition: all 0.3s ease 0s;

    -o-transition: all 0.3s ease 0s;

    transition: all 0.3s ease 0s;

        background: linear-gradient(90deg, #ffba00 0%, #ff6c00 100%);

}



</style>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
function validatePasswords() {
    var password = document.getElementById("password").value;
    var repassword = document.getElementById("repassword").value;
    if (password !== repassword) {
        alert("Passwords do not match.");
        return false;
    }
    return true;
}


$(document).on("change","#options",function(){
  var options = $(this).val();
  if(options == 2){
    $(".vatnumber").show();
   // $(".parking_owner").hide();
  }else{
    $(".vatnumber").hide();
   // $(".parking_owner").show();
  }
});
</script>