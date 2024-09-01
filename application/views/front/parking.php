<style type="text/css">



.icon-brief {



/*display: flex;*/



flex-direction: row;



justify-content: center;



align-content: center;



}



.icon-brief img {



margin-right: 6px;



}



.pricebtnsection, .soldbuttton{

padding: 8px;

padding-bottom: 20px;

display: flex;

}



.filterData{

text-align: right;

margin-bottom: 40px;

}



.icon-brief .car-brief {



font-family: roboto,sans-serif;



font-size: 12px;



font-weight: 400;



font-stretch: normal;



font-style: normal;



line-height: 1.58;



letter-spacing: normal;



text-align: left;



color: #656565;



}



/*.radiusbutton{*/



/*    background: #00aa56 !important;*/



/*    color:#fff;*/



/*}*/



.radiusbutton{



background: #fff !important;



color:#000;

border-radius: 11px;

border: 1px solid #00aa56;

float: right;



}



.soldbuttton{







}

.car-wrap{

box-shadow: 0px 22px 34px -1px rgb(0 0 0 / 6%);

}

.car-wrap .text{

   padding: 20px 22px 20px;

}



.radiusbutton:hover{



background: #00aa56 !important;



color: #fff !important;



border: 1px solid #00aa56;



}

.rounded{

border-radius: 16px !important;

}



.desc-block{



margin: 0;



padding: 0;



}



.price-label{



       font-family: Roboto,sans-serif;



font-size: 16px;



font-weight: 600;



padding-top: 10px;



display: block;



line-height: 13px;



text-align: center;



}



.kmspan{



       font-family: roboto,sans-serif;



color: #fff;

background: #000;

border-radius: 10px;

font-size: 13px;

font-weight: bold;

padding: 5px;

margin: 0;

padding-left: 10px;

padding-right: 10px;

padding-bottom: 0px;

padding-top: 0px;



line-height: 22px;



text-align: center;



}



.caraccess{



       margin: 0 0 22px;



}



.extraPricing {



font-family: roboto,sans-serif;



font-size: 12px;



font-weight: 400;



font-stretch: normal;



font-style: normal;



line-height: 1.15;



letter-spacing: normal;



text-align: left;



color: #656565;



}



.pricebtnsection, .soldbuttton{



margin-top: 0px;



}



.hero-wrap.hero-wrap-2 .slider-text{



       height: 390px !important



}



.hero-wrap.hero-wrap-2 .overlay{



    height: 390px !important



}



.hero-wrap.hero-wrap-2{



   height: 390px !important



}







@media only screen and (max-width: 768px) {



.btn.btn-primary{



   background: #00aa56 !important;



border: 1px solid #00aa56 !important;



}
.car_title_name a{
margin-top: 20px;
}



.customblock{



   width: 33%;



}



.car_title_name{



   margin-bottom: 16px !important;



       text-align: center;



display: block;



}



.bookBtn{



   margin-left: 25px !important;

   float: right;



}



}    







</style>



<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../assets/front/images/bg_3.jpg');background-position: 50% 87%;" data-stellar-background-ratio="0.5">



 <div class="overlay"></div>



 <div class="container">





   <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">



     <div class="col-md-9 ftco-animate pb-5">



         <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Parking <i class="ion-ios-arrow-forward"></i></span></p>



       <h1 class="mb-3 bread">Choose Your Parking</h1>



     </div>



   </div>



 </div>



</section>

<section class="ftco-section bg-light">
   <div class="container">
      <div class="row">
         <div class="col-md-3 ml-auto">
            <div class="filterData request-form " style="
               background: transparent;
               box-shadow: none;
               margin-left: auto;
               margin-bottom: 30px;
               padding: 0;
               ">
               <!-- <select class="form-control common_radius" name="filter" id="filter">
                  <option value="asc">Price: low - High</option>
                  
                  <option value="desc">Price: High - Low</option>
                  
                  </select> -->
            </div>
         </div>
      </div>
      <div class="row" id="priceFilterData">

      <?php 
         foreach ($getAllparking as $key => $value) { ?>
            
            <input type="hidden" id="parkingtime<?= $value->id?>" value="<?= $parking_time;?>">
            <input type="hidden" id="parkingdate<?= $value->id?>" value="<?= $parking_date;?>">
            <input type="hidden" id="parkingprice<?= $value->id?>" value="<?= $value->price;?>">
         <div class="col-md-3">
            <div class="car-wrap rounded ftco-animate fadeInUp ftco-animated">
               <div class="img rounded d-flex align-items-end" style="background-image: url(..//uploads/<?php echo $value->parking_image?>);    margin: 0 auto;    height: 140px;">
               </div>
               <h2 class="mb-0 car_title_name" style="margin-top: -4px;"><a href="javascript:void(0)" style="color: #000;
                  font-size: 16px;
                  font-weight: bold;
                  text-align: center;display: block;margin-top: 10px;"><?= $value->name?></a></h2>
              <div class="text" style="display: flex;justify-content: space-between;">
   <div class="">
      <div class="icon-brief"><img src="https://www.revv.co.in/imgs/car-card/automatic.svg"><span class="car-brief"><?= $parking_date?></span></div>
      <div class="icon-brief"><img src="https://www.revv.co.in/imgs/car-card/petrol.svg"><span class="car-brief"><?= $parking_time?></span></div>
      
   </div>
   <div>
      <div class="chooseprice priceblock2" data-id="2" data-price="300" data-km="5799.84" style="display: grid;">
         <!-- <p class="desc-block price-label" style="background-color: unset;float: right;color: #00aa56;font-size: 20px;margin-bottom: 10px">₹ 5800</p> -->
        
         <span class="desc-block kmspan" style="margin-left: 2px;float: right;">£<?= $value->price?>  </span>
      </div>
   </div>
</div>

               <div class="pricebtnsection">
               
                 
                  <?php 
                     if($value->slot == 1) {
                  ?>
                   <div class="col-md-6" style="float: left;">
                   <button label="Book" backgroundcolor="#0EBABA" labelcolor="#ffffff" class="btn  bookBtn radiusbutton" style="font-weight: normal;   background: red !important;color:#fff;border: 1px solid red;" data-id="<?= $key;?>" disabled>Sold Out</button>
                  </div>
                  <?php } else {?>
                     <div class="col-md-6" style="float: left;">
                     <button label="Book" backgroundcolor="#0EBABA" labelcolor="#ffffff" class="btn  bookBtn radiusbutton" style="font-weight: normal;width: 88px;height: 36px;font-weight: 600;font-size: 18px;line-height: 0px;" data-id="<?= $value->id?>">Book</button>
                  </div>
                     <?php } ?>
                 

               </div>
               <!-- <p class="d-flex mb-0 d-block" style="margin-top: 20px;"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a></p> -->
            </div>
         </div>
         <?php  } ?>
        
       
       
      </div>
   </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
   	$(document).on("click", ".bookBtn", function(){
         var email_id = "<?php echo $this->session->userdata('email')?>";
         if(email_id == ''){
            var redirectUrl = "<?= base_url('front/login')?>";
                window.location.href = redirectUrl;
                return false;
         }else{
            var data_id = $(this).attr('data-id');
            var parkingtime = $("#parkingtime"+data_id).val();
            var parkingdate = $("#parkingdate"+data_id).val();
            var parkingprice = $("#parkingprice"+data_id).val();
            
            $.ajax({
            type: 'POST',
            url: "ajaxsaveData",
            async: false,
            data: {
                "data_id": data_id,
                "parkingtime": parkingtime,
                "parkingdate": parkingdate,
                "parkingprice": parkingprice,
            },
            success: function (response) {
                var redirectUrl = "<?= base_url('front/checkout')?>?orderId="+response;
                window.location.href = redirectUrl;
                return false;
            }
         });
      }
      });
</script>