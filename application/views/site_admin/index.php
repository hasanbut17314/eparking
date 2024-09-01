<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/bootstrap.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/wizard/bs-stepper.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/vertical-menu.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/plugins/forms/form-validation.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/plugins/forms/form-wizard.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title "><?=$title?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="app-user-list">
                    <!-- list and filter start -->
                    <div class="card dt">
                        <div class="card-body border-bottom">
                            <!--  <button style="float: right;padding: 6px;"  class="addbranch btn btn-outline-primary waves-effect"><i class="fa fa-plus" style="font-size:20px"></i></button>  -->
                            <a href="<?php echo base_url('site_admin/addBranch')?>" style="float: right;padding: 6px;" class="btn btn-outline-primary waves-effect"><i class="fa fa-plus" style="font-size:20px"></i></a>
                           <!-- <button type="button" class="btn btn-outline-primary addbranch">
                                              Add Branch
                                            </button> -->
                        </div>
                        <div class="card-datatable table-responsive pt-0">
                            <table id="dataTable" class="user-list-table table">
                                <thead class="table-light">
                                    <tr>
                                        <th></th>
                                        <th>Branch Code</th>
                                        <th>Branch Name</th>
                                        <th>Mobile No</th>
                                        <th>Location</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($branchdata) > 0) {
                                        $co = 1;
                                        foreach ($branchdata as $key => $val) {
                                    ?>
                                    <tr>
                                        <td><?=$co?></td>
                                        <td><?=$val->branchcode?></td>
                                        <td><?=$val->branchname?></td>
                                        <td><?=$val->mobileno?></td>
                                        <td><?=$val->location?></td>
                                        <td><?=$val->address?>
                                        </td>
                                        <!--<td>-->
                                        <!--  <a style="    padding: 4px;" href="<?=BASE_URL?>site_admin/editBranchData/<?=$val->id?>" class="btn btn-primary btn-sm"><i class="fa fa-edit" style="font-size:20px"></i></a>-->
                                        <!--    <button style="padding: 4px;"  class="btn btn-primary btn-sm editbranchdata" data-id="<?php echo $val->id?>"><i class="fa fa-edit" style="font-size:20px"></i></button> -->
                                        <!--    <a style="padding: 4px;" href="<?=BASE_URL?>site_admin/deleteBranchData/<?=$val->id?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" style="font-size:20px"></i></a>-->
                                            <!-- <button type="button" class="btn btn-outline-danger waves-effect" data-toggle="modal" data-target="#deletemodel" data-id="<?php echo $val->id; ?>" >Delete</button> -->
                                        <!--</td>-->
                                    </tr>
                                    <?php $co++; } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- list and filter end -->
                </section>
                <!-- users list ends -->
            </div>
        </div>
    </div>
     

    <!-- Modal -->
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:90%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Create Branch</h4>
                    <button type="button" class="close closebranch" data-dismiss="modal" aria-label="Close" style="    padding: 0.2rem 0.62rem;
    box-shadow: 0 5px 20px 0 rgb(34 41 47 / 10%);
    border-radius: 0.357rem;
    background: #fff;
    opacity: 1;
    transition: all 0.23s ease 0.1s;
    position: relative;
    transform: translate(8px, -2px);
    margin: -2.8rem -1.4rem -0.8rem auto;
    cursor: pointer;
    border: 0;
    float: right;
    font-size: 2rem;
    font-weight: 400;
    line-height: 1;
    color: #5e5873;
    text-shadow: 0 1px 0 #fff;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                                  <!-- Horizontal Wizard -->
                <section class="horizontal-wizard">
                    <div class="bs-stepper horizontal-wizard-example">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#account-details">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">1</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Branch Details</span>
                                        <span class="bs-stepper-subtitle">Setup Branch Details</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#personal-info">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">2</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Statutory Details</span>
                                        <span class="bs-stepper-subtitle">Add Statutory Details</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#address-step">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">3</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Address Details</span>
                                        <span class="bs-stepper-subtitle">Add Address Details</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#social-links">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">4</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Bank Detail</span>
                                        <span class="bs-stepper-subtitle">Add Bank Detail</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                        
                            <div id="account-details" class="content">
                                <div class="content-header">
                                    <h5 class="mb-0">Branch Details</h5>
                                    <small class="text-muted">Enter Your Branch Details.</small>
                                </div>
                                 <form method="post" id="branchdetailsform" enctype="multipart/form-data">
                                    <input type="hidden" name="branchcode" class="branchcode" value="0">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="branchname">Branch Name</label>
                                            <input type="text" name="branchname" id="branchname" class="form-control" placeholder="Enter branch name" required="" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="mobileno">Mobile No</label>
                                            <input type="number" name="mobileno" id="mobileno" required="" class="form-control" placeholder="Enter mobile no" aria-label="john.doe" />
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group form-password-toggle col-md-6">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" required="" placeholder="Enter password" />
                                        </div>
                                        <div class="form-group form-password-toggle col-md-6">
                                            <label class="form-label" for="location">Location</label>
                                            <input type="text" name="location" id="confirm-password" class="form-control" placeholder="Enter location" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-password-toggle col-md-6">
                                            <label class="form-label" for="branchlogo">Branch Logo:</label>
                                            <input type="file" name="branchlogo" id="branchlogo" class="form-control"  />
                                        </div>
                                        <div class="form-group form-password-toggle col-md-6">
                                            <label class="form-label" for="finacialyear">Financial Year:</label>
                                            <input type="text" name="finacialyear" id="finacialyear" class="form-control" placeholder="Enter financial year" />
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between" style="    margin-top: 15px;">
                                    <button class="btn btn-outline-secondary btn-prev" disabled>
                                        <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next brnachdetails">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="personal-info" class="content">
                                <div class="content-header">
                                    <h5 class="mb-0">Statutory Detail</h5>
                                    <small>Enter Your Statutory Detail.</small>
                                </div>
                                 <form method="post" id="statitorydetailsform" enctype="multipart/form-data">
                                    <input type="hidden" name="branchcode" class="branchcode" value="0">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="pannumber">Pan Number</label>
                                            <input type="text" name="pannumber" id="pannumber" class="form-control" placeholder="Enter pan number" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="gstnumber">GST Number</label>
                                            <input type="text" name="gstnumber" id="gstnumber" class="form-control" placeholder="Enter gst number" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="adharnumber">Aadhar Number</label>
                                            <input type="text" name="adharnumber" id="adharnumber" class="form-control" placeholder="Enter aadhar number" />
                                        </div>
                                        
                                    </div>
                               </form>
                                <div class="d-flex justify-content-between" style="margin-top: 15px;">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next statitorydetails">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="address-step" class="content">
                                <div class="content-header">
                                    <h5 class="mb-0">Address</h5>
                                    <small>Enter Your Address.</small>
                                </div>
                                <form method="post" id="addressdetailsform" enctype="multipart/form-data">
                                    <input type="hidden" name="branchcode" class="branchcode" value="0">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="address">Address</label>
                                            <input type="text" id="address" name="address" class="form-control" placeholder="Enter address" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="city">City</label>
                                            <input type="text" name="city" id="city" class="form-control" placeholder="Enter city" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="pincode1">Pincode</label>
                                            <input type="number" id="pincode1" name="pincode1" class="form-control" placeholder="Enter pincode" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="phoneno">Phone Number</label>
                                            <input type="number" id="phoneno" name="phoneno" class="form-control" placeholder="Enter phone no" />
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="fax">Fax</label>
                                            <input type="number" id="fax" name="fax" class="form-control" placeholder="Enter fax" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="branchemail">Email</label>
                                            <input type="email" id="branchemail" class="form-control" placeholder="Enter email" />
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="website">Website</label>
                                            <input type="text" id="website" name="website" class="form-control" placeholder="Enter website" />
                                        </div>
                                        
                                    </div>
                               </form>
                                <div class="d-flex justify-content-between" style="margin-top: 15px;">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next addressdetails">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="social-links" class="content">
                                <div class="content-header">
                                    <h5 class="mb-0">Bank Details</h5>
                                    <small>Enter Your Bank Details.</small>
                                </div>
                                <form method="post" id="bankdetailsform" enctype="multipart/form-data">
                                    <input type="hidden" name="branchcode" class="branchcode" value="0">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="bankname">Bank Name</label>
                                            <input type="text" id="bankname" name="bankname" class="form-control" placeholder="Enter bank name" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="bacnkbranchname">Branch Name</label>
                                            <input type="text" id="bacnkbranchname" name="bacnkbranchname" class="form-control" placeholder="Enter branch name" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="bankaddress">Address+</label>
                                            <input type="text" id="bankaddress" name="bankaddress" class="form-control" placeholder="Enter address" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="bankifscode">IFSC Code</label>
                                            <input type="text" id="bankifscode" name="bankifscode" class="form-control" placeholder="Enter IFSC code" />
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="accounumber">Account Number</label>
                                            <input type="number" id="accounumber" name="accounumber" class="form-control" placeholder="Enter Account no" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="ibanno">IBAN Number</label>
                                            <input type="number" id="ibanno" name="ibanno" class="form-control" placeholder="Enter IBAN code" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="sqiftcode">Swift Code</label>
                                            <input type="number" id="sqiftcode" name="sqiftcode" class="form-control" placeholder="Enter Swift no" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="upicode">UPI Code</label>
                                            <input type="number" id="upicode" name="upicode" class="form-control" placeholder="Enter UPI code" />
                                        </div>
                                    </div>
                                 </form>
                                <div class="d-flex justify-content-between" style="margin-top:15px">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-success btn-submit" id="bankdetails">Submit</button>
                                </div>
                            </div>
                   
                        </div>

                    </div>
                </section>
                <!-- /Horizontal Wizard -->
                </div>
               <!--  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
                </div> -->
            </div>
        </div>
    </div>

















       <div class="modal fade text-left" id="inlineForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Inline Login Form</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <label>Email: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Email Address" class="form-control" />
                        </div>

                        <label>Password: </label>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

     <!-- delete model -->
    <div class="modal fade" id="deletemodel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Sub Admin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                    $attributes = array('class' => 'form','id' => 'delete_model','enctype'=>'multipart/form-data',"role"=>"form","method"=>"post");
                    echo form_open(BASE_URL.'site_admin/delete', $attributes);
                ?>
                    <div class="modal-body">
                        <h5>Are you sure ?.this sub admin delete after not recover data..?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                        <input type="hidden" name="id" value="" />
                    </div>
               </form>
            </div>
        </div>
    </div>

 

    <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/forms/wizard/bs-stepper.min.js')?>"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script> -->
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/forms/select/select2.full.min.js')?>" defer></script>
    <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js')?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/scripts/forms/form-wizard.js?v='.rand(00,99))?>"></script>
    <!-- <script type="text/javascript" src="<?=JS?>jquery-1.7.1.min.js"></script> -->
    <script type="text/javascript">
        // delete js
        $(document).ready(function() {
            $('#deletemodel').on('show.bs.modal', function (e) {
                if (e.namespace === 'bs.modal') {
                    var opener=e.relatedTarget;
                    var id         =$(opener).attr('data-id');
                    $('#delete_model').find('[name="id"]').val(id);
                }
            });
        });
    </script>

    <!-- END: Content-->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

        $(document).on("click",".addbranch",function(){
            $("#inlineForm").modal('show');
        });

                    $(document).on("click",".closebranch",function(){
            $("#inlineForm").modal('hide');
        });

        

        $(document).on("click" , ".brnachdetails" , function(e){
             e.preventDefault();
           // alert();
        //    e.preventDefault();
            var shop = '<?=$shop?>';
            var data =  $('#branchdetailsform').serializeArray();
            jQuery.ajax({
                type: 'POST',
                url: 'https://digisysindiatech.com/storecrm/site_admin/savebranch',
                data: data,
              success: function(data) {
                $(".branchcode").val(data);
               // window.location.replace("<?=BASE_URL?>second_page.php?code=<?=$code?>&hmac=<?=$hmac?>&host=<?=$host?>&shop=<?=$shop?>");
              }                
            });       
        });

        $(document).on("click" , ".statitorydetails" , function(e){
             e.preventDefault();
           // alert();
        //    e.preventDefault();
            var shop = '<?=$shop?>';
            var data =  $('#statitorydetailsform').serializeArray();
            jQuery.ajax({
                type: 'POST',
                url: 'https://digisysindiatech.com/storecrm/site_admin/savestatitory',
                data: data,
              success: function(data) {
                $(".branchcode").val(data);
               // window.location.replace("<?=BASE_URL?>second_page.php?code=<?=$code?>&hmac=<?=$hmac?>&host=<?=$host?>&shop=<?=$shop?>");
              }                
            });       
        });


        $(document).on("click" , ".addressdetails" , function(e){
             e.preventDefault();
           // alert();
        //    e.preventDefault();
            var shop = '<?=$shop?>';
            var data =  $('#addressdetailsform').serializeArray();
            jQuery.ajax({
                type: 'POST',
                url: 'https://digisysindiatech.com/storecrm/site_admin/saveaddress',
                data: data,
              success: function(data) {
                $(".branchcode").val(data);
               // window.location.replace("<?=BASE_URL?>second_page.php?code=<?=$code?>&hmac=<?=$hmac?>&host=<?=$host?>&shop=<?=$shop?>");
              }                
            });       
        });


        $(document).on("click" , ".bankdetails" , function(e){
             e.preventDefault();
           // alert();
        //    e.preventDefault();
            var shop = '<?=$shop?>';
            var data =  $('#bankdetailsform').serializeArray();
            jQuery.ajax({
                type: 'POST',
                url: 'https://digisysindiatech.com/storecrm/site_admin/savebankdetails',
                data: data,
              success: function(data) {
                $(".branchcode").val(data);
               // window.location.replace("<?=BASE_URL?>second_page.php?code=<?=$code?>&hmac=<?=$hmac?>&host=<?=$host?>&shop=<?=$shop?>");
              }                
            });       
        });


        $(document).on("click",".editbranchdata",function(){
            var data_id = $(this).attr('data-id');
             jQuery.ajax({
                type: 'POST',
                url: 'https://digisysindiatech.com/storecrm/site_admin/edit_branch_data',
                data: {data_id:data_id},
              success: function(data) {
                //$(".branchcode").val(data);
                 $("#editbranchdata").modal('show');
                $(".append_branch_block").html(data);
               // window.location.replace("<?=BASE_URL?>second_page.php?code=<?=$code?>&hmac=<?=$hmac?>&host=<?=$host?>&shop=<?=$shop?>");
              }                
            });    
        });
    </script>
