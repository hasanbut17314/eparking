<style type="text/css">
    .left-option {

        display: flex;

        height: 100%;

    }

    .navbar-brand>img {
        height: auto !important;
    }

    .custome_account_option .option-veriastion {

        width: 20%;

        color: #000000 !important;

        background-color: #f6f6f7 !important;

    }

    .option-veriastion {

        margin-right: 11px;

    }

    .custome_account_option .option-btn.active-tab {

        color: #ffffff !important;

        background-color: #00aa56 !important;

        border-color: #3b3b3b !important;

    }

    .custome_account_option .option-btn {

        border-radius: unset;

        margin-bottom: 1px !important;

        width: auto;

        height: 40px;

        color: #868a8d !important;

        font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;

        font-weight: 600;

    }

    .option-btn.active-tab {

        border: 1px solid #e33f3a;

    }

    .option-btn {

        width: 109px;

        height: 109px;

        padding: 5px;

        text-align: center;

        background-color: #ffffff;

        border-radius: 10px;

        display: flex;

        flex-direction: column;

        align-items: center;

        justify-content: center;

        margin-bottom: 20px;

        cursor: pointer;

    }

    .accountlabelname {

        font-size: 14px !important;

    }

    .accountlabelname {

        margin-top: 0px !important;

    }

    .profile-details {

        width: 100%;

        font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;

    }

    .profile_block,
    .append_order_details,
    .address_block {

        color: #3d4246 !important;

    }

    .profile_block_subsection,
    .order_block_subsection {

        padding: 15px;

        border: 1px solid eee !important;

        border-radius: 5px;

        background: #fff;

    }

    .profile-option,
    .order-option,
    .delivery-upload-option,
    .save-upload-option {

        background-color: #f6f6f7 !important;

        color: #000000 !important;

    }

    .hoveraccountblock .option-btn:hover {

        color: #ffffff !important;

        background-color: #00aa56 !important;

        border-color: #3b3b3b !important;

    }

    .addressblock {

        text-align: left;

        font-size: 16px;

        color: #3d4246 !important;

        padding: 20px;

        line-height: 0px;

    }

    .addressprofileedit {

        font-size: 15px !important;

        border: 1px solid #00aa56;

        padding: 10px;

        border-radius: 5px;

        color: #fff;

        background: #00aa56;

        padding-left: 25px;

        padding-right: 25px;

        margin-left: 20px;

        font-weight: bold;

    }

    label {

        display: inline-block;

        margin-bottom: 5px;

        font-weight: 700;

    }

    .hero-wrap.hero-wrap-2 .slider-text {

        height: 390px !important
    }

    .hero-wrap.hero-wrap-2 .overlay {

        height: 390px !important
    }

    .hero-wrap.hero-wrap-2 {

        height: 390px !important
    }
</style>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../assets/front/images/bg_3.jpg');" data-stellar-background-ratio="0.5">

    <div class="overlay"></div>

    <div class="container">

        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">

            <div class="col-md-9 ftco-animate pb-5">

                <p class="breadcrumbs"><span class="mr-2"><a href="/eparking">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Profile <i class="ion-ios-arrow-forward"></i></span></p>

                <h1 class="mb-3 bread">Profile</h1>

            </div>

        </div>

    </div>

</section>



<section style="padding:50px 30px 50px 30px">

    <div class="">



        <div class="custome_account_option">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12">

                        <span class="profirstname" style="    padding: 20px 0px;

    text-align: center;

    display: block;

    font-size: 30px !important;

    color: black;

    font-weight: 600;">Hello <?= $customer->name ?></span>

                    </div>

                    <div class="col-md-12 col-lg-12 firststepss">

                        <div class="left-option">

                            <input type="hidden" id="hiddenaddressid" value="">

                            <div class="option-veriastion hoveraccountblock">

                                <div class="profile-option option-btn active-tab">

                                    <span class="accountlabelname">Profile</span>

                                </div>

                                <div class="order-option option-btn">

                                    <span class="accountlabelname">My Orders</span>

                                </div>
                                <div class="save-upload-option option-btn">

                                    <a href="<?php echo base_url('front/logout') ?>" style="color: #868a8d !important;"><span class="accountlabelname">Logout</span></a>

                                </div>



                            </div>

                            <div class="profile-details">

                                <!-- default option -->

                                <!-- text option -->

                                <div class="profile_block" style="padding: 0px 15px;">

                                    <div class="profile_block_subsection">

                                        <div class="addressblock">

                                            <label>UserName:</label>

                                            <span class="profirstnames"><?= $customer->name ?></span>

                                        </div>

                                        <div class="addressblock">

                                            <label>Email:</label>

                                            <span class="proemail"><?= $customer->email ?></span>

                                        </div>


                                        <div class="addressblock">

                                            <label>Contact No:</label>

                                            <span class="prophone"><?= $customer->phonenumber ?></span>

                                        </div>

                                        <div class="addressblock">

                                            <label>Address:</label>

                                            <span class="prophone"><?= $customer->address ?></span>

                                        </div>



                                        <div>

                                            <button class="addressprofileedit">Edit</button>

                                        </div>

                                    </div>





                                </div>



                                <div class="append_order_details" style="display:none;background: #fff;padding: 20px;">

                                </div>



                                <!-- custom address block -->

                                <div class="address_block" style="padding: 15px;display: none;">

                                    <div class="row customer_address">

                                    </div>

                                </div>



                                <!-- end custom address block -->

                                <!-- show save image art data -->

                                <div class="save_artblock" style="padding: 15px;display: none;">

                                    <div class="row save_artimagedata">

                                    </div>

                                </div>

                                <!-- end save image art data -->

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



    </div>

</section>


<!-- Modal -->
<div class="modal fade" id="editAddress" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Address</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <div class="row" style="padding: 15px;">

                    <form role="form" action="<?php echo base_url() . 'front/updateAddress/' . $customer->id; ?>" method="post" enctype="multipart/form-data" style="width: 100%;">
                        <div class="form-group">

                            <label for="exampleInputEmail1">Name</label>

                            <input type="text" class="form-control" name="cus_name" required value="<?= $customer->name ?>" placeholder="Enter a user name">

                        </div>
                        <!-- <div class="form-group">

                    <label for="exampleInputEmail1">Conatct No</label>

                    <input type="number" class="form-control" name="phone" value="<?= $customer->phone ?>" required  placeholder="Enter a contactno">

                </div> -->
                        <div class="form-group">

                            <label for="exampleInputEmail1">Email</label>

                            <input type="email" class="form-control" name="email" value="<?= $customer->email ?>" required placeholder="Enter a email">

                        </div>

                        <div class="form-group">

                            <label for="exampleInputEmail1">Mobile No</label>

                            <input type="number" class="form-control" name="phonenumber" value="<?= $customer->phonenumber ?>" required placeholder="Enter a phonenumber">

                        </div>

                        <div class="form-group">

                            <label for="exampleInputEmail1">Address</label>

                            <input type="text" class="form-control" name="address" value="<?= $customer->address ?>" required placeholder="Enter a address">

                        </div>

                        <button type="submit" class="btn btn-success" style="float:center">Update Profile</button>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="editFeedback" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Feedback</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <div class="row" style="padding: 15px;">

                    <form role="form" action="<?php echo base_url() . 'front/updateFeedback'; ?>" method="post" enctype="multipart/form-data" style="width: 100%;">
                        <div class="col-xl-12 col-md-12 col-12 field_error" style="float:left">
                            <input type="hidden" class="form-control main_id" name="main_id">
                            <div class="mb-1">

                                <label for="exampleInputEmail1">Name</label>

                                <input type="text" class="form-control" name="cus_name" required placeholder="Enter a user name">
                            </div>

                        </div>

                        <div class="col-xl-12 col-md-12 col-12 field_error" style="float:left">

                            <div class="mb-1">

                                <label for="exampleInputEmail1">Rating:</label>

                                <select id="rating" name="rating" required class="form-control">
                                    <option value="">Select</option>
                                    <option value="1">1 - Poor</option>
                                    <option value="2">2 - Fair</option>
                                    <option value="3">3 - Good</option>
                                    <option value="4">4 - Very Good</option>
                                    <option value="5">5 - Excellent</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-xl-12 col-md-12 col-12 field_error" style="float:left">

                            <div class="mb-1">

                                <label for="comments">Comments:</label>
                                <textarea id="comments" name="comments" class="form-control" rows="4" required></textarea>
                            </div>

                        </div>



                        <button type="submit" class="btn btn-success" style="float:center">Submit Feedback</button>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).on("click", ".accountdetails", function() {

        $('.custome_account_option').show();

        $('.save_artblock').hide();

        $('.profile_block').show();

        $('.option-btn').removeClass('active-tab');

        $('.profile-option').addClass('active-tab');



    });

    $(document).on("click", ".addressprofileedit", function() {

        $("#editAddress").modal('show');


    });


    $(document).on("click", ".addFeedBack", function() {
        var data_id = $(this).attr('data-id');
        $(".main_id").val(data_id);
        $("#editFeedback").modal('show');


    });


    $(document).on("click", ".profile-option", function() {

        $('.profile_block').show();

        $('.append_order_details').hide();

        $('.address_block').hide();

        $('.save_artblock').hide();



    });

    //order section

    $(document).on("click", ".order-option", function() {

        $('.profile_block').hide();

        $('.save_artblock').hide();

        $('.address_block').hide();

        var url = "getOrderDetails";

        $.ajax({

            method: 'POST',

            url: url,

            data: {
                id: 1


            },

            success: function(response) {

                $("#saving_container").hide();

                $('.append_order_details').show();

                $('.append_order_details').html(response);



            }

        });

    });

    //end 



    //delivery address section

    $(document).on("click", ".delivery-upload-option", function() {

        $('.profile_block').hide();

        $('.append_order_details').hide();

        $('.save_artblock').hide();

        $('.address_block').show();



    });

    //end section



    //save upload art section

    $(document).on("click", ".save-upload-option", function() {

        var pro_name = $('.prd-name').text();

        $("#saving_container").show();

        $('.profile_block').hide();

        $('.append_order_details').hide();

        $('.address_block').hide();

        $('.save_artblock').show();



    });



    //end section
</script>