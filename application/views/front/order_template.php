<link rel="stylesheet" href="<?php echo base_url('assets/custom/order.css')?>">





<?php 
if(!empty($orderData)){
foreach ($orderData as $key => $value) { 

   $carInfo = getParkingInfos($value->parking_id);

   ?>

   



<div class="order_block">

   <div class="order_block_subsection" style="padding:30px;margin-top: 25px;">

    

      <div class="order_block2">

         <div class="row" style="margin-top: 10px;margin-bottom: 10px;">

            <div class="col-md-8" style="text-align: left;font-size: 16px;line-height: 24px;">

             <div>

                   Booking Status: <span class="dt_font_family">

                  
                                       <?php if($value->payment_status == 0){ ?>
                                 <button class="btn btn-warning" style="font-weight: bold;padding: 4px 3px !important;padding-top: 3px !important;border-radius: 14px;color:#fff;">Pending</button>
                                 
                                          <?php } else{ ?>
                                             <button class="btn btn-success" style="background-color: #00aa56 !important;font-weight: bold;padding: 4px 3px !important;padding-top: 3px !important;border-radius: 14px;">Completed</button>
                                             <?php } ?>
                   </span><br>

                 

               

                 

                </div>

            </div>

            <div class="col-md-4" style="text-align: right;font-size: 16px;line-height: 24px;">

               <div style="font-size: 15px;">

                  Order Id: <span class="dt_font_family"><?= $value->booking_id?></span><br>

             

               </div>

          

            </div>

         </div>

      </div>

  

      <button class="btn btn-success addressprofileedit item_more_info" id="specific_item_infomore_0" data-key="0" style="margin-left: 40%; display: none;" data-id="0">Show More</button>    

      <div class="order_art_section_list_0" style="">

         <div class="order_block3" id="ordersection0">

            <div class="row">

               <div class="col-md-2" style="text-align: left;font-size: 16px;line-height: 24px;">

                  <div>

                     <img class="order_image downloadimage" src="<?= base_url('uploads/'.$carInfo->parking_image)?>" style="width: 170px;">

                                                    

                  </div>

               </div>

               <div class="col-md-10" style="text-align: justify;font-size: 16px;line-height: 24px;">

                  <div>

                     <div class="settotal">

                        <span class="orderprotitle">

                           <div class="row">

                              <div class="col-md-6">

                                 <p><b><?= $carInfo->name?>                                               </b></p>
                                 <p><span><b>Duration :</b> <?= $value->parking_date.' '.$value->parking_start_time?></span></p>

                               

                              </div>

                              <div class="col-md-6">

                               <p><span><b>Amount :</b> £<?= round($value->amount)?> </span></p>
                               <div>

                                    <button class="addFeedBack btn btn-success" data-id="<?= $value->id?>">Feedback</button>

                                </div>
                                 <div>

                                 </div>

                              </div>

                           </div>

                        </span>

                    

                     </div>

                   

                  </div>

               </div>

            </div>

         </div>

         

  

      </div>

    

   </div>

</div>

<hr style="margin-top: 3rem;margin-bottom: 0;">

<?php } } else {?>
   <h5>Not Order Found..!</h5>
   <?php } ?>







<style>

.ordertooltip{position:relative;display:inline-block;color:#5b8ed6;margin-top:10px;margin-right:40px;font-size:14px!important}

.ordertooltip .tooltiptext{visibility:hidden;width:100px;background-color:lightgray;color:#fff;text-align:center;border-radius:6px;padding:1px 0;position:absolute;z-index:1;top:100%;left:60%;margin-left:-60px;height:110px;overflow:auto}

.ordertooltip .tooltiptext::after{content:"";position:absolute;bottom:100%;left:50%;margin-left:-5px;border-width:15px;border-style:solid}

.ordertooltip:hover .tooltiptext{visibility:visible}

.dt-marginleft{margin-left:10px}

.order-search-box-div{float:right;margin-top:-50px}

.order-search{font-size:15px}

.containers{position:relative;padding-left:23px;cursor:pointer;font-size:16px;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;margin:0 0 8px}

.containers input{position:absolute;opacity:0;cursor:pointer;height:0;width:0}

.checkmark{position:absolute;top:4px;left:0;height:20px;width:20px;background-color:#fff}

.containers:hover input ~ .checkmark{background-color:#ccc}

.containers input:checked ~ .checkmark{background-color:green}

.checkmark:after{content:"";position:absolute;display:none}

.containers input:checked ~ .checkmark:after{display:block}

.containers .checkmark:after{left:8px;top:4px;width:5px;height:10px;border:solid #fff;border-width:0 3px 3px 0;-webkit-transform:rotate(45deg);-ms-transform:rotate(45deg);transform:rotate(45deg)}



</style>                  