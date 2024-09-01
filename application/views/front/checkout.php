<link rel="stylesheet" href="<?php echo base_url('assets/custom/checkout.css')?>">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">

.table tbody tr td{

    vertical-align:  unset !important;

    border-bottom:  unset !important;

    padding: 0 !important;

}

.ftco-navbar-light {
background: transparent !important;
position: absolute !important;
left: 0;
right: 0;
z-index: 3;
}

.table {

    min-width: 0 !important;

}
.cus-m{
  margin-bottom: 10px;
margin-top: 10px;
}

.protopayment{
  border:1px solid #1089ff !important
}

.form-check {

display: block;

min-height: 1.5rem;

padding-left: 1.5em;

margin-bottom: .125rem;

}

.form-check-input:checked[type=radio] {

background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%23fff'/%3e%3c/svg%3e");

}

.form-check-input:checked {

background-color: #0d6efd;

border-color: #0d6efd;

}

.form-check-input[type=radio] {

border-radius: 50%;

}

.map_direction{
font-size: 18px;
margin-bottom: 5px;
}

.form-check .form-check-input {

float: left;

margin-left: -1.5em;

}

.form-check-input {

width: 1em;

height: 1em;

margin-top: .25em;

vertical-align: top;

background-color: #fff;

background-repeat: no-repeat;

background-position: center;

background-size: contain;

border: 1px solid rgba(0,0,0,.25);

-webkit-appearance: none;

-moz-appearance: none;

appearance: none;

-webkit-print-color-adjust: exact;

color-adjust: exact;

}

label {

display: inline-block;

}

.custom_address{

   border: 1px solid white;

display: block;

font-size: 14px;

padding: 12px;

margin: 10px;

font-weight: bold;

background: white;

border-radius: 20px;

text-align: justify;

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

.form-control {

height: 43px !important;

}

.booking_label_section{
text-align: center;
font-size: 17px;
font-weight: bold;
padding: 16px;

margin-bottom: 20px;
}

.booking_label_section span{
border: 1px solid lightgray;
padding: 14px;
border-radius: 25px;
background: lightgray;
}

.booking_section{
padding-top: 21px !important;
}


</style>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../assets/front/images/bg_3.jpg');" data-stellar-background-ratio="0.5">

  <div class="overlay"></div>

  <div class="container">

    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">

      <div class="col-md-9 ftco-animate pb-5">

        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Checkout <i class="ion-ios-arrow-forward"></i></span></p>

        <h1 class="mb-3 bread">Checkout</h1>

      </div>

    </div>

  </div>

</section>



<input type="hidden" id="orderid" value="<?= $orderData->booking_id;?>">

<input type="hidden" id="updateid" value="<?= $orderData->id;?>">

<div class="container" style="    padding-bottom: 40px;">

<h2 class="mb-3" style="    text-align: center;padding-top: 20px;">Checkout</h2>

<div class="row">









<div class="site-section" style="width:100%">

  <div class="">

    <!-- <div class="row mb-5">

      <div class="col-md-12">

        <div class="bg-light rounded p-3">

          <p class="mb-0">Returning customer? <a href="#" class="d-inline-block">Click here</a> to login</p>

        </div>

      </div>

    </div> -->

   

      <div class="col-md-6 mb-5 mb-md-0" style="float:left">

        <h2 class="h3 mb-3 text-black">IMPORTANT POINTS TO REMEMBER</h2>

      <div class="p-3 p-lg-5 border">

          

          <p style="    margin-bottom: 0;"><strong>Real-time Availability</strong></p>

          <span style="    margin-bottom: 15px;display: block;">Show real-time parking space availability.</span>

           <p style="    margin-bottom: 0;"><strong>Safety and Security Features</strong></p>

          <span style="    margin-bottom: 15px;display: block;">Provide secure parking facilities with surveillance cameras.</span>

           <p style="    margin-bottom: 0;"><strong>Advanced Reservations</strong></p>

          <span style="    margin-bottom: 15px;display: block;">Allow users to reserve parking spots in advance.</span>

           <p style="    margin-bottom: 0;"><strong>Customer Support</strong></p>

          <span style="    margin-bottom: 15px;display: block;">Provide 24/7 customer support through chat, phone, or email.</span>

         

          </div>

          </div>

      

      <div class="col-md-6" style="float:left">



       



        <div class="row mb-5">

          <div class="col-md-12">

            <h2 class="h3 mb-3 text-black">Your Order</h2>
            
            <div class="p-3 p-lg-5 border booking_section" style="height: 100%;">
            <div class="booking_label_section">
              <span>Booking details</span>
            </div>
                <b><span class="fontLg" style="    text-align: center;display: block;"><?= $getParkingArrInfo->name; ?></span></b>

                <img class="card-img-top" src="<?= base_url('uploads/'.$getParkingArrInfo->parking_image)?>" style="width: 200px;text-align: center;display: block;margin-left: 25%;">

             
            <style>
              .setting_block{
                display: block;
padding: 10px;
margin-top: 15px;
margin-bottom: 15px;

float: left;
background: lightgray;
border-radius: 19px;
              }
              .setting_sub_block{
                float: left;
padding: 15px;
              }
              .setting_block .dateSpan{
                text-align: right;
              font-weight: bold;
              }

              .price_section{
                color: #00aa56;
                margin-top: 20px;

font-family: bold;
font-size: 22px;
              }
              .kms_section{
                margin-top: 7px;
display: block;
              }
              .tableFairbreakup tbody{
                width: 100% !important;
display: block;
              }
              .tableFairbreakup tbody tr .custom_blod{
                font-weight: bold;
              }
              body{
                color:#212529;
              }
            </style>
              
              <div class="col-12 col-sm-12 col-md-12 col-md-12 col-xl-12 setting_block" style="text-align: center;">
                <div class="col-md-12 setting_sub_block" style="padding-left: 0px;padding-right: 0px;padding-bottom: 0;">
                <div style="margin-bottom: 10px;">
                  <img src="<?php echo base_url('assets/1.png')?>" width="40">  
                <span class="dateSpan" style="text-align: right;"><?= $orderData->parking_date.' '. $orderData->parking_start_time  ?></span></div>
               <div class="form-group" style="margin-top:18px">

                <button class="btn btn-primary btn-lg btn-block protopayment" style="background-color:#00aa56 !important;border:1px solid #00aa56 !important">Reserve  <i class="fa fa-inr"></i> £<?= $orderData->amount?></button>

              </div>



            </div>

          </div>

        </div>



      </div>

    </div>

    <!-- </form> -->

  </div>

</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).on("change", ".pickupaddress", function(){

  var data_id = $(this).attr('data-id');

  if(data_id == 1){

     $('.self_address').hide();

     $('.custom_address').show();

     $('.deliveryaddresss').hide();

     var total_car_price = $('.hidden_price').val();

     $ $('.total_car_price').text(Math.round(total_price));

     $('.total_delivery_charge').hide();

  }else{

     $('.self_address').show();

     $('.custom_address').hide();

     $('.deliveryaddresss').show();

     var total_price = 500;

     var total_car_price = $('.hidden_price').val();

     var total_price = parseFloat(total_price) + parseFloat(total_car_price);

     $('.total_car_price').text(Math.round(total_price));

     $('.total_delivery_charge').show();

  }

});



$(document).on("click", ".protopaymentsss", function(){

  var orderid = $("#orderid").val();

  var updateid = $("#updateid").val();

  var pickupaddress = $('input[name="optradio"]:checked').val();

  var deliveryaddress =  '';

  if(pickupaddress == "option2"){

     deliveryaddress = $(".deliveryaddresss").val();

  }

  var url_data = "updateOrderData";

  $.ajax({

    type: 'POST',

    url: url_data,

    async: false,

    data: {

        "orderid": orderid,

        "updateid": updateid,

        "pickupaddress": pickupaddress,

        "deliveryaddress": deliveryaddress,

    },

    success: function (response) {
      alert(response);
      var baseURL = "<?php echo base_url()?>";
   //   window.location.href = baseURL+"/front/razorpayCheckout?oI="+response;
    // $('#paymentconfirm').modal('show');

    // var res = JSON.parse(response);

    // $(".ORDER_ID").val(res.ORDER_ID);

    // $(".TXN_AMOUNT").val(res.TXN_AMOUNT);

    // $(".CUST_ID").val(res.CUST_ID);

    // $(".EMAIL").val(res.EMAIL);

    // $(".MID").val(res.MID);

    // $(".CHANNEL_ID").val(res.CHANNEL_ID);

    // $(".WEBSITE").val(res.WEBSITE);

    // $(".CALLBACK_URL").val(res.CALLBACK_URL);

    // $(".INDUSTRY_TYPE_ID").val(res.INDUSTRY_TYPE_ID);

    // $(".CHECKSUMHASH").val(res.paytmChecksum);

    // $(".book_carname").text(res.car_name);

    // $(".book_stdate").text(res.stdate);

    // $(".book_endate").text(res.etdate);

    // $(".book_km").text(res.totalkm);

    // $(".book_total").text(res.total);

    }

  });

});



//  $(document).on("click", ".conpayment", function(){

//     $('#paymentconfirm').submit();

//  });

</script>

























</div>

</div>

<div class="modal fade" id="paymentconfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog modal-dialog-centered" role="document">

<div class="modal-content">

  <div class="modal-header border-bottom-0" style="display: block;text-align: center;">

    <span class="modal-title" id="exampleModalLabel" style="font-weight: bold;font-size: 20px;">Payment Conformation</span>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding:0 !important;margin: 0 !important;">

      <span aria-hidden="true">&times;</span>

    </button>

  </div>

  <form role="form" action="<?php echo PAYTM_TXN_URL; ?>" method="post">

    <input type="hidden" name="ORDER_ID" class="ORDER_ID" value="">

    <input type="hidden" name="TXN_AMOUNT" class="TXN_AMOUNT" value="">

    <input type="hidden" name="CUST_ID" class="CUST_ID" value="">

    <input type="hidden" name="EMAIL" class="EMAIL" value="">

    <input type="hidden" name="MID" class="MID" value="">

    <input type="hidden" name="CHANNEL_ID" class="CHANNEL_ID" value="">

    <input type="hidden" name="WEBSITE" class="WEBSITE" value="">

    <input type="hidden" name="CALLBACK_URL" class="CALLBACK_URL" value="">

    <input type="hidden" name="INDUSTRY_TYPE_ID" class="INDUSTRY_TYPE_ID" value="">

    <input type="hidden" name="CHECKSUMHASH" class="CHECKSUMHASH" value="">



    <div class="modal-body">

      <div class="form-group">

        <label for="username"><b>Car Name: </b><span class="book_carname"></span></label>

      </div>

      <div class="form-group">

        <label for="password"><b>Start Date: </b><span class="book_stdate"></span></label>

      </div>

      <div class="form-group">

        <label for="password"><b>End Date: </b><span class="book_endate"></span></label>

      </div>

      <div class="form-group">

        <label for="password"><b>Total kilometre: </b><span class="book_km"></span></label>

      </div>

      <div class="form-group">

        <label for="password"><b>Total Pay: </b><i class="fa fa-inr"></i> <span class="book_total"></span></label>

      </div>

      <div class="form-group">

        <label for="password"><b>Booking Amount: </b><i class="fa fa-inr"></i> <span class="">500 (Remaining payable amount at pickup time.)</span></label>

      </div>

              <div class="form-group">

       <input id="checkbox" type="checkbox" required=""  style="    height: 1.5em;

width: 1.5em;

vertical-align: middle;

" />

       <label for="checkbox"> I agree to these <a href="#">Terms and Conditions</a>.</label>

     </div>

    </div>



    <div class="modal-footer border-top-0 d-flex justify-content-center">

      <button type="submit" class="btn btn-success conpayment">Confirm Payment</button>

    </div>

  </form>

</div>

</div>

</div>



<!-- Modal -->
<div class="modal fade" id="checkouterror" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">Error</h4>
      <button type="button" class="close closepopup" data-dismiss="modal">&times;</button>
     
    </div>
    <div class="modal-body">
      <p>Failed to process this booking. Please try again later.</p>
      <input type="hidden" id="orderurl">
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default closepopup" data-dismiss="modal" style="background: #00AA56; font-weight: bold;">Close</button>
    </div>
  </div>
  
</div>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">




$(document).on("click", ".protopayment", function(){

  var orderid = $("#orderid").val();


  //alert(cart_total);

  var url_data = "updateOrderData";

  $.ajax({

    type: 'POST',

    url: url_data,

    async: false,

    data: {

        "orderid": orderid,
    },

    success: function (response) {

       var baseURL = "<?php echo base_url()?>";
       window.location.href = baseURL+"/front/thankyou";

    }

  });

});


</script>