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

                <div class="content-header-left col-md-12 col-12 mb-2">

                    <div class="row breadcrumbs-top">

                        <div class="col-10">

                            <h2 class="content-header-title "><?=$title?></h2>

                            

                        </div>

                        <div class="col-2">

                            <a style="float: right;padding: 6px;" href="<?=BASE_URL?>sub_admin/addPaeking" class="btn btn-outline-primary waves-effect"><i class="fa fa-plus" style="font-size:20px"></i></a> 

                        </div>

                    </div>

                </div>

            </div>

            <div class="content-body">

                <!-- users list start -->

                <section class="app-user-list">

                    <!-- list and filter start -->

                    <div class="card dt">

                        

                        <div class="card-datatable table-responsive pt-0">

                            <table id="dataTable" class="user-list-table table">

                                <thead class="table-light">

                                    <tr>

                                        

                                        <th>Id</th>
                                        <th>User Name</th>
                                        <th>Rating</th>
                                        <th>Comments</th>
                                        
                                        
                                        

                                      

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                    if (count($feedbacklist) > 0) {

                                        $co = 1;

                                        foreach ($feedbacklist as $key => $val) {
                                          
                                           $getUserInfs = getUserInfs($val->user_id);
                                           $getParkingInfos = getParkingInfos($val->parking_id);
                                           // echo '<pre>';print_r($result);exit;
                                    ?>

                                        <tr id="<?php echo $val->id; ?>">
                                        <td><?=$val->id?></td>
                                       
                                        <td><?=$getUserInfs->name?></td>
                                        <td><?=$val->rating?></td>
                                        <td><?=$val->comments?></td>
                                        
                                      

                                      

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





    <script type="text/javascript">

        $(document).ready(function () {

            $('#dataTable').DataTable();

        });</script>

<script type="text/javascript">

$(".remove").click(function(){

    var id = $(this).parents("tr").attr("id");


    if(confirm('Are you sure to remove this record ?'))

    {
        var base_url = "<?php echo base_url(); ?>";
        $.ajax({

           url: base_url + "sub_admin/deleteLocation",
           type: "POST",
           data:{ getbranchname:id},


           error: function() {

              alert('Something is wrong');

           },

           success: function(data) {

            if(data == 1){
                location.reload(); 
            }else{
                alert("You can't delete this record. Operator is exist..!");
            }
            

           }

        });

    }

});


</script>