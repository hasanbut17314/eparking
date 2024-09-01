<!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-view-account">
                    <div class="row">
                        <!-- User Sidebar -->
                        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                            <!-- User Card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-avatar-section">
                                        <div class="d-flex align-items-center flex-column">
                                            <?php
                                            if ($user_details->image != '') 
                                            {
                                                $image_url = BASE_URL."uploads/".$user_details->image;
                                            }
                                            else
                                            {
                                                $image_url = BASE_URL."assets/app-assets/images/portrait/small/avatar-s-2.jpg";
                                            }
                                            ?>
                                            <img class="img-fluid rounded mt-3 mb-2" src="<?=$image_url?>" height="110" width="110" alt="User avatar" />
                                            <div class="user-info text-center">
                                                <h4><?=$user_details->name?></h4>
                                                <!-- <span class="badge bg-light-secondary">Super Admin</span> -->
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                                    <div class="info-container">
                                        <ul class="list-unstyled">
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Name :</span>
                                                <span><?=$user_details->name?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Mobile Number :</span>
                                                <span><?=$user_details->phonenumber?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Email :</span>
                                                <span><?=$user_details->email?></span>
                                            </li>
                                           
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">VAT num :</span>
                                                <span><?=$user_details->vatnum?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Date of birth :</span>
                                                <span><?=$user_details->datebirth?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Address :</span>
                                                <span><?=$user_details->address?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">City :</span>
                                                <span><?=$user_details->city?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Post code :</span>
                                                <span><?=$user_details->post_code?></span>
                                            </li>
                                        </ul>
                                        <div class="d-flex justify-content-center pt-2">
                                            <a href="javascript:;" class="btn btn-primary me-1" data-bs-target="#editUser" data-bs-toggle="modal">
                                                Edit
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /User Card -->
                        </div>
                        <!--/ User Sidebar -->

                        <!-- User Content -->
                        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                            <!-- User Pills -->
                            <ul class="nav nav-pills mb-2">
                               <!--  <li class="nav-item">
                                    <a class="nav-link active" href="<?=BASE_URL?>profile">
                                        <i data-feather="user" class="font-medium-3 me-50"></i>
                                        <span class="fw-bold">Account</span></a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a class="nav-link active" href="<?=BASE_URL?>">
                                        <i data-feather="lock" class="font-medium-3 me-50"></i>
                                        <span class="fw-bold">Security</span>
                                    </a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i data-feather="bookmark" class="font-medium-3 me-50"></i>
                                        <span class="fw-bold">Billing & Plans</span>
                                    </a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i data-feather="bell" class="font-medium-3 me-50"></i><span class="fw-bold">Notifications</span>
                                    </a>
                                </li> -->
                               <!--  <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i data-feather="link" class="font-medium-3 me-50"></i><span class="fw-bold">Connections</span>
                                    </a>
                                </li> -->
                            </ul>
                            <!--/ User Pills -->
                        </div>
                        <!--/ User Content -->
                    </div>
                </section>
                <!-- Edit User Modal -->
                <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body pb-5 px-sm-5 pt-50">
                                <div class="text-center mb-2">
                                    <h1 class="mb-1">Edit Profile Information</h1>
                                    <p>Updating profile details will receive a privacy audit.</p>
                                </div>
                                <form id="editUserForm" class="row gy-1 pt-75" action="<?=BASE_URL?>profile/profile_update" method="POST" enctype="multipart/form-data">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label">Name </label>
                                        <input type="text" name="name" class="form-control" placeholder="John" value="<?=$user_details->name?>" data-msg="Please enter name" />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" >Mobile Number </label>
                                        <input type="text" name="phonenumber" class="form-control" placeholder="953752633" value="<?=$user_details->phonenumber?>" />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label">Email </label>
                                        <input type="text"name="email" class="form-control" value="<?=$user_details->email?>" placeholder="john@doe.com"/>
                                    </div>
                                    <!--<div class="col-12 col-md-6">-->
                                    <!--    <label class="form-label">Password </label>-->
                                    <!--    <input type="text" name="password" class="form-control"  placeholder="password" />-->
                                    <!--</div>-->
                                    <div class="col-12 col-md-6">
                                        <label class="form-label">VAT Number </label>
                                        <input type="text" name="vatnum" class="form-control" value="<?=$user_details->vatnum?>" placeholder="GST number" />
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="modalEditUserEmail">Address</label>
                                        <textarea class="form-control" name="address"><?=$user_details->address?></textarea>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserEmail">City</label>
                                        <textarea class="form-control" name="city"><?=$user_details->city?></textarea>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserEmail">Post Code</label>
                                        <textarea class="form-control" name="post_code"><?=$user_details->post_code?></textarea>
                                    </div>
                                     
                                    <input type="hidden" name="mode" value="update">
                                    <div class="col-12 col-md-12">
                                        <button type="submit" class="btn btn-primary me-1">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Edit User Modal -->
            </div>
        </div>
    </div>
    <!-- END: Content-->