<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/wizard/bs-stepper.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/vertical-menu.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/plugins/forms/form-validation.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/plugins/forms/form-wizard.css')?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
   fieldset{
   padding-block-start: 0.35em;
   padding-inline-start: 0.75em;
   padding-inline-end: 0.75em;
   padding-block-end: 0.625em;
   border: 2px solid rgb(192, 192, 192);
   }
   legend{
   float: unset;
   width: unset;
   padding: 0;
   margin-bottom: unset;
   font-size: unset;
   line-height: inherit;
   font-weight: bold;
   }
</style>

<!-- BEGIN: Vendor CSS-->

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/vendors.min.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/charts/apexcharts.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/extensions/toastr.min.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">

<!-- END: Vendor CSS-->



<!-- BEGIN: Theme CSS-->

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/bootstrap.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/bootstrap-extended.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/colors.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/components.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/themes/dark-layout.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/themes/bordered-layout.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/themes/semi-dark-layout.css')?>">

<!-- BEGIN: Page CSS-->

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/vertical-menu.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/plugins/charts/chart-apex.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/plugins/extensions/ext-component-toastr.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/pages/app-invoice-list.css')?>">

<!-- END: Page CSS-->
<div class="app-content content ">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="card dt">
      <form class="form" action="<?php echo 'saveParkingType'?>" enctype="multipart/form-data" method="post">
            <span style="font-size: 15px;font-weight: bold;">Add Parking Type</span>
        <div class="col-md-12" style="margin-top: 10px;">
            <div class="col-md-6" style="float: left;">
                <div class="col-md-12" style="width: 97%;">
                    
                       <div class="row">
                          <div class="col-xl-12 col-md-12 col-12 field_error">
                             <div class="mb-1">
                                <label class="form-label" for="accountname">Parking Type</label>
                                            <input type="text" name="parking_type_name" id="parking_type_name" class="form-control" placeholder="Enter parking type" required="" />
                             </div>
                          </div>
                           
                     </div>
                      
                   
                 </div>

                   

                   

                   
                     
                     

            </div>
          
        </div>
         

      

 <div class="col-xl-4 col-md-6 col-12 field_error">
                  <button type="submit" style="padding: 8px;font-size: 12px;" class="btn btn-primary waves-effect waves-float waves-light">Save</button>
               </div>
      </form>
   </div>
</div>
<div id="saving_container" style="display: none;">
    <div id="saving" style="background-color: rgb(0, 0, 0); position: fixed; width: 100%; height: 100%; top: 0px; left: 0px; z-index: 100000; opacity: 0.8;"></div>
    <img id="saving_animation" src="https://app.inkseekers.com/assets/img/storing_animation.gif" alt="saving" style="z-index:100001; margin-left:-32px; margin-top:-32px; position:fixed; left:50%; top:50%;background: #fff;padding: 10px;border-radius: 10px;width: 100px;">
    <div id="saving_text" style="text-align:center; width:100%; position:fixed; left:0px; top:50%; margin-top:40px; color:#fff; z-index:100001"></div>
</div>
