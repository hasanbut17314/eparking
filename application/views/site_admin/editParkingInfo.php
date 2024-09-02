<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/wizard/bs-stepper.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/vertical-menu.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/plugins/forms/form-validation.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/plugins/forms/form-wizard.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/bootstrap.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/wizard/bs-stepper.min.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/vertical-menu.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/plugins/forms/form-validation.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/plugins/forms/form-wizard.css')?>">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- BEGIN: Content-->

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
<style type="text/css">
    fieldset {
        padding-block-start: 0.35em;
        padding-inline-start: 0.75em;
        padding-inline-end: 0.75em;
        padding-block-end: 0.625em;
        border: 2px solid rgb(192, 192, 192);
    }

    legend {
        float: unset;
        width: unset;
        padding: 0;
        margin-bottom: unset;
        font-size: unset;
        line-height: inherit;
        font-weight: bold;
    }
</style>
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="card dt">
        <form role="form" action="<?php echo base_url() . 'Site_admin/edit_ParkingInfos/' . $parkinginfo->id; ?>" method="post" enctype="multipart/form-data">


            <span style="font-size: 15px;font-weight: bold;">Add Parking</span>
            <div class="col-md-12" style="margin-top: 10px;">
                <div class="col-md-12" style="">
                    <div class="col-md-12" style="width: 100%;">

                        <div class="row">

                            <div class="col-xl-6 col-md-6 col-6 field_error" style="float:left">
                                <div class="mb-1">
                                    <label class="form-label" for="accountname">Parking Type</label>

                                    <select class="form-control" name="parking_type">



                                        <?php foreach ($parking_type_master as $key => $value) { ?>


                                            <option value="<?php echo $value->id ?>" <?= ($value->id == $parkinginfo->parking_type) ? ' selected' : ''; ?>><?php echo $value->parking_type_name; ?></option>

                                        <?php  } ?>

                                    </select>

                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 col-6 field_error" style="float:left">

                                <div class="mb-1">

                                    <label class="form-label">Parking Image<span class="required_sign">*</span></label>

                                    <input type="file" class="form-control" name="parking_image" placeholder="Enter Parking name" />

                                </div>

                            </div>
                            <div class="col-xl-6 col-md-6 col-6 field_error" style="float:left">

                                <div class="mb-1">

                                    <label class="form-label">Parking Name<span class="required_sign">*</span></label>

                                    <input type="text" class="form-control" name="name" value="<?= $parkinginfo->name ?>" required="" placeholder="Enter Parking name" />

                                </div>

                            </div>

                            <div class="col-xl-6 col-md-6 col-6 field_error" style="float:left">

                                <div class="mb-1">

                                    <label class="form-label">Parking location<span class="required_sign">*</span></label>

                                    <input type="text" class="form-control" value="<?= $parkinginfo->parking_location ?>" name="parking_location" required="" placeholder="Enter Parking location" />

                                </div>

                            </div>

                            <div class="col-xl-6 col-md-6 col-6 field_error" style="float:left">

                                <div class="mb-1">

                                    <label class="form-label">Postcode<span class="required_sign">*</span></label>

                                    <input type="text" class="form-control" value="<?= $parkinginfo->pincode ?>" name="pincode" required="" placeholder="Enter Postcode" />

                                </div>

                            </div>

                            <div class="col-xl-6 col-md-6 col-6 field_error" style="float:left">

                                <div class="mb-1">

                                    <label class="form-label">Num of parking slots<span class="required_sign">*</span></label>

                                    <input type="text" class="form-control" value="<?= $parkinginfo->parking_slot ?>" name="parking_slot" required="" placeholder="Enter Num of parking slots" />

                                </div>

                            </div>




                            <div class="col-xl-6 col-md-6 col-6 field_error" style="float:left">

                                <div class="mb-1">
                                    <?php
                                    $timeOption = ['1' => '8:00am', '2' => '9:00am', '3' => '10:00am', '4' => '11:00am', '5' => '12:00pm', '6' => '1:00pm', '7' => '2:00pm', '8' => '3:00pm', '9' => '4:00pm', '10' => '5:00pm', '11' => '6:00pm', '12' => '7:00pm', '13' => '8:00pm', '14' => '9:00pm', '15' => '10:00pm', '16' => '11:00pm'];
                                    ?>
                                    <label class="form-label">Parking Start Time<span class="required_sign">*</span></label>

                                    <select class="form-control" name="parking_start_time">



                                        <?php foreach ($timeOption as $key => $value) { ?>
                                            <option value="<?php echo $key ?>" <?= ($key == $parkinginfo->parking_start_time) ? ' selected' : ''; ?>><?php echo $value; ?></option>



                                        <?php  } ?>


                                    </select>

                                </div>

                            </div>


                            <div class="col-xl-6 col-md-6 col-6 field_error" style="float:left">

                                <div class="mb-1">
                                    <?php
                                    $timeOption = ['1' => '8:00am', '2' => '9:00am', '3' => '10:00am', '4' => '11:00am', '5' => '12:00pm', '6' => '1:00pm', '7' => '2:00pm', '8' => '3:00pm', '9' => '4:00pm', '10' => '5:00pm', '11' => '6:00pm', '12' => '7:00pm', '13' => '8:00pm', '14' => '9:00pm', '15' => '10:00pm', '16' => '11:00pm'];
                                    ?>
                                    <label class="form-label">Parking End Time<span class="required_sign">*</span></label>

                                    <select class="form-control" name="parking_end_time">



                                        <?php foreach ($timeOption as $key => $value) { ?>
                                            <option value="<?php echo $key ?>" <?= ($key == $parkinginfo->parking_end_time) ? ' selected' : ''; ?>><?php echo $value; ?></option>



                                        <?php  } ?>


                                    </select>

                                </div>

                            </div>




                            <div class="col-xl-12 col-md-12 col-12 field_error" style="float:left">

                                <div class="mb-1">

                                    <label class="form-label">Parking Date<span class="required_sign"></span></label>
                                </div>

                            </div>
                            <?php
                            $monday = '';
                            if ($parkinginfo->monday == "on") {
                                $monday = 'checked';
                            }
                            ?>
                            <div class="col-xl-2 col-md-2 col-2 field_error" style="float:left">

                                <div class="mb-1">

                                    <label class="form-label">Monday<span class="required_sign">*</span></label>

                                    <input type="checkbox" class="form-group" <?= $monday ?> name="monday" placeholder="Enter Parking name" />

                                </div>

                            </div>
                            <?php
                            $tuesday = '';
                            if ($parkinginfo->tuesday  == "on") {
                                $tuesday = 'checked';
                            }
                            ?>
                            <div class="col-xl-2 col-md-2 col-2 field_error" style="float:left">

                                <div class="mb-1">

                                    <label class="form-label">Tuesday<span class="required_sign">*</span></label>

                                    <input type="checkbox" class="form-group" <?= $tuesday ?> name="tuesday" placeholder="Enter Parking name" />

                                </div>

                            </div>
                            <?php
                            $wednesday = '';
                            if ($parkinginfo->wednesday == "on") {
                                $wednesday = 'checked';
                            }
                            ?>
                            <div class="col-xl-2 col-md-2 col-2 field_error" style="float:left">

                                <div class="mb-1">

                                    <label class="form-label">Wednesday<span class="required_sign">*</span></label>

                                    <input type="checkbox" class="form-group" <?= $wednesday ?> name="wednesday" placeholder="Enter Parking name" />

                                </div>

                            </div>
                            <?php
                            $thursday = '';
                            if ($parkinginfo->thursday == "on") {
                                $thursday = 'checked';
                            }
                            ?>
                            <div class="col-xl-2 col-md-2 col-2 field_error" style="float:left">

                                <div class="mb-1">

                                    <label class="form-label">Thursday<span class="required_sign">*</span></label>

                                    <input type="checkbox" class="form-group" <?= $thursday ?> name="thursday" placeholder="Enter Parking name" />

                                </div>

                            </div>
                            <?php
                            $friday = '';
                            if ($parkinginfo->friday == "on") {
                                $friday = 'checked';
                            }
                            ?>
                            <div class="col-xl-2 col-md-2 col-2 field_error" style="float:left">

                                <div class="mb-1">

                                    <label class="form-label">Friday<span class="required_sign">*</span></label>

                                    <input type="checkbox" class="form-group" <?= $friday ?> name="friday" placeholder="Enter Parking name" />

                                </div>

                            </div>
                            <?php
                            $saturday = '';
                            if ($parkinginfo->saturday == "on") {
                                $saturday = 'checked';
                            }
                            ?>
                            <div class="col-xl-2 col-md-2 col-2 field_error" style="float:left">

                                <div class="mb-1">

                                    <label class="form-label">Saturday<span class="required_sign">*</span></label>

                                    <input type="checkbox" class="form-group" <?= $saturday ?> name="saturday" placeholder="Enter Parking name" />

                                </div>

                            </div>
                            <?php
                            $sunday = '';
                            if ($parkinginfo->sunday == "on") {
                                $sunday = 'checked';
                            }
                            ?>
                            <div class="col-xl-12 col-md-12 col-12 field_error" style="float:left">

                                <div class="mb-1">

                                    <label class="form-label">Sunday<span class="required_sign">*</span></label>

                                    <input type="checkbox" class="form-group" <?= $sunday ?> name="sunday" placeholder="Enter Parking name" />

                                </div>

                            </div>



                            <div class="col-xl-6 col-md-6 col-6 field_error" style="float:left">

                                <div class="mb-1">

                                    <label class="form-label">Set price per hour<span class="required_sign">*</span></label>

                                    <input type="text" class="form-control" value="<?= $parkinginfo->price ?>" name="price" required="" placeholder="Enter Parking price" />

                                </div>

                            </div>

                            <div class="col-xl-6 col-md-6 col-6 field_error" style="float:left">

                                <div class="mb-1">

                                    <label class="form-label">VAT<span class="required_sign">*</span></label>

                                    <input type="text" class="form-control" value="<?= $parkinginfo->vat ?>" name="vat" placeholder="Enter VAT" />

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