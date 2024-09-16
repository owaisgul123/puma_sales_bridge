<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Dealer Profile |
        <?php echo $_SESSION['user_name']; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="BYCO" name="description" />
    <meta content="P2P" name="author" />
    <!-- App favicon -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.43.0/apexcharts.min.css"
        integrity="sha512-nnNXPeQKvNOEUd+TrFbofWwHT0ezcZiFU5E/Lv2+JlZCQwQ/ACM33FxPoQ6ZEFNnERrTho8lF0MCEH9DBZ/wWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <?php include 'css_script.php'; ?>







</head>
<style>
#map {
    height: 400px;
    width: 100%;
}

#profile_img {
    height: 200px;
    object-fit: fill;
}

.select2-container--default .select2-selection--multiple .select2-selection__rendered {
    width: 200px;
}

@media only screen and (max-width: 450px) {
    #profile_img {
        height: 150px;
        object-fit: cover;
    }
}

.user-profile-img .overlay-content {
    background-color: transparent;
}

.nav-pills .nav-link {
    border: 1px solid #005ac6;
}
</style>

<body>

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php
        $pre = $_SESSION['privilege'];
        // $disabledAttribute = ($pre != 'Admin') ? 'd-none' : '';

        // $disabledAttribute = (strpos($pre, 'TM') === 0) ? 'disabled' : '';
        
        ?>

        <?php include 'header.php'; ?>
        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'sidebar.php'; ?>

        <!-- Left Sidebar End -->

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mt-3" style="display: flex;justify-content:center;">
                                        <h5 class="mb-5" id="user">P2P</h5>

                                    </div>
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active test-dark" data-bs-toggle="tab" href="#overview"
                                                role="tab">
                                                <span>Facilities </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#products" role="tab">
                                                <span>Products</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#tanks_panel" role="tab">
                                                <span>Tanks</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#dispenser_tab" role="tab">
                                                <span>Dispenser</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#nozel" role="tab">
                                                <span>Nozel</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#users_tab" role="tab">
                                                <span>Users</span>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Tab content -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="overview" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <button id="add" class="btn btn-primary mb-3  add_button"> Add</button>
                                        <br>

                                        <table id="myTable2" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.No</th>
                                                    <th class="text-center">Facility</th>
                                                    <th class="text-center">Created At</th>


                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="dispenser_tab" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">

                                        <button id="add_dispenser" class="btn btn-primary mb-3 add_button"> Add</button>
                                        <br>

                                        <table id="dispenser_table" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.No</th>
                                                    <th class="text-center">Despensor</th>
                                                    <th class="text-center">Description</th>
                                                    <th class="text-center">Created At</th>
                                                    <?php if ($pre == 'Admin') { ?>
                                                    <th class="text-center">Delete</th>

                                                    <?php } ?>


                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>



                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="nozel" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">

                                        <button id="addnozel" class="btn btn-primary mb-3 add_button"> Add</button>
                                        <br>

                                        <table id="myTable3" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.No</th>
                                                    <th class="text-center">Nozel</th>
                                                    <th class="text-center">Product</th>
                                                    <th class="text-center">Tank</th>
                                                    <th class="text-center">Dispenser</th>
                                                    <th class="text-center">Last Reading</th>
                                                    <th class="text-center">Created At</th>
                                                    <?php if ($pre == 'Admin') { ?>
                                                    <th class="text-center">Edit Last Recon</th>
                                                    <th class="text-center">Delete</th>

                                                    <?php } ?>

                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>



                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="products" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mx-n3 px-3" data-simplebar style="max-height: 580px;">

                                            <button id="add_products" class="btn btn-primary mb-3 add_button">
                                                Add</button>
                                            <br>

                                            <div class="mt-4">
                                                <div class="table-responsive">
                                                    <table class="table table-nowrap table-hover mb-1"
                                                        id="products_table">
                                                        <thead class="bg-light">
                                                            <tr>
                                                                <th class="text-center">Date</th>
                                                                <th class="text-center">Name</th>
                                                                <th class="text-center">From</th>
                                                                <th class="text-center">To</th>
                                                                <th class="text-center">Indent Price</th>
                                                                <th class="text-center">Nozel Price</th>
                                                                <th class="text-center">Update Time</th>
                                                                <?php if ($pre == 'Admin') { ?>
                                                                <th class="text-center">Edit</th>
                                                                <th class="text-center">Log</th>
                                                                <?php } ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- end card body -->
                                </div>
                            </div>



                            <div class="tab-pane" id="tanks_panel" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <button id="add_tanks" class="btn btn-primary mb-3 add_button"> Add</button>
                                        <br>

                                        <table id="tanks_table" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.No</th>
                                                    <th class="text-center">Tank #</th>
                                                    <th class="text-center">Product</th>
                                                    <!-- <th class="text-center">Min Limit</th> -->
                                                    <th class="text-center">Capacity</th>
                                                    <th class="text-center">Current Dip</th>
                                                    <?php if ($pre == 'Admin') { ?>
                                                    <th class="text-center">Dip</th>
                                                    <th class="text-center">Dip Backlog</th>
                                                    <th class="text-center">Delete</th>
                                                    <?php } ?>



                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>


                            </div>








                            <div class="tab-pane" id="users_tab" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mx-n3 px-3" data-simplebar style="max-height: 580px;">

                                            <button id="add_users" class="btn btn-primary mb-3 add_button"> Add</button>
                                            <br>

                                            <div class="mt-4">
                                                <div class="table-responsive">
                                                    <table class="table table-nowrap table-hover mb-1" id="users_table">
                                                        <thead class="bg-light">
                                                            <tr>
                                                                <th class="text-center">Date</th>
                                                                <th class="text-center">Name</th>
                                                                <th class="text-center">Email</th>
                                                                <th class="text-center">Password</th>
                                                                <th class="text-center">Phone</th>
                                                                <!-- <th class="text-center">Active/In-Active</th> -->
                                                                <?php if ($pre == 'Admin') { ?>
                                                                <th class="text-center">Edit</th>

                                                                <?php } ?>
                                                                <!-- <th class="text-center">Delete</th> -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- end card body -->
                                </div>
                            </div>




                        </div>

                    </div>


                    <!-- end row -->







                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


        </div>

        <div id="complaints_modals" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Add Complaints</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="complaint_form" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Complaint#</label>

                                    <input type="text" class="form-control" name='comp_no' id="comp_no">

                                </div>
                                <div class="col-md-4">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Name</label>

                                    <input type="text" class="form-control" name='comp_name' id="comp_name">

                                </div>
                                <div class="col-md-4">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Email</label>

                                    <input type="email" class="form-control" name='comp_email' id="comp_email">

                                </div>
                                <div class="col-md-4">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Phone</label>

                                    <input type="text" class="form-control" name='comp_phone' id="comp_phone">

                                </div>
                                <div class="col-md-4">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Priority</label>

                                    <select class="form-select" id="comp_priority" name="comp_priority">
                                        <option value="Low">Low</option>
                                        <option value="High">High</option>
                                        <option value="Very High">Very High</option>

                                    </select>

                                </div>
                                <div class="col-md-4">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Subject</label>

                                    <input type="text" class="form-control" name='comp_subject' id="comp_subject">

                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Message</label>

                                    <textarea class="form-control" id="comp_message" name="comp_message" rows="4"
                                        cols="50" required></textarea>

                                </div>

                                <div class="col-12" style="text-align: right;">
                                    <input type="hidden" name="user_id" id="user_id"
                                        value="<?php echo $_SESSION['user_id']; ?>">
                                    <input type="hidden" name="dealer_id" value="<?php echo $_GET['id'] ?>">
                                    <input type="hidden" name="row_id">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Close</button>
                                    <input class="btn btn-primary waves-effect waves-light" type="submit"
                                        name="complaint_btn" id="complaint_btn" value="Save">
                                </div>
                            </div>
                        </form>

                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div id="users_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Add Users</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="users_from" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Username</label>

                                    <input type="text" class="form-control" name='usernames' id="usernames" required>

                                </div>
                                <div class="col-md-4">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Email</label>

                                    <input type="email" class="form-control" name='user_email' id="user_email" required>

                                </div>



                                <div class="col-md-4">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Password</label>

                                    <input type="text" class="form-control" name='user_password' id="user_password"
                                        required>

                                </div>
                                <div class="col-md-4">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Phone</label>

                                    <input type="number" class="form-control" name='user_phone' id="user_phone"
                                        required>

                                </div>


                                <div class="col-12" style="text-align: right;">
                                    <input type="hidden" name="user_id" id="user_id"
                                        value="<?php echo $_SESSION['user_id']; ?>">
                                    <input type="hidden" name="dealer_id" value="<?php echo $_GET['id'] ?>">
                                    <input type="hidden" name="row_id" id='dealer_user_id'>
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Close</button>
                                    <input class="btn btn-primary waves-effect waves-light" type="submit"
                                        name="users_btn" id="users_btn" value="Save">
                                </div>
                            </div>
                        </form>

                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div id="recon_update_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Update Nozel Last Recon Reading</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="nozel_last_recon_update" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="example-text-input" class="col-md-12 col-form-label">Nozel</label>

                                    <input type="text" class="form-control" name='nozel_name' id="nozel_name" required readonly>

                                </div>

                                <div class="col-md-6">
                                    <label for="example-text-input" class="col-md-12 col-form-label">Current Reading</label>

                                    <input type="text" class="form-control" name='nozel_last_recon' id="nozel_last_recon" required readonly>

                                </div>
                               

                                <div class="col-md-6">
                                    <label for="example-text-input" class="col-md-12 col-form-label">New Reading</label>

                                    <input type="text" class="form-control" name='nozel_new_reading' id="nozel_new_reading" required >
                                    <input type="hidden" name="recon_id" id="recon_id" >
                                    <input type="hidden" name="nozel_id" id="nozel_id" >
                                    <input type="hidden" name="last_task_id" id="last_task_id" >
                                    <input type="hidden" name="recon_product_id" id="recon_product_id" >

                                </div>
                                <div class="col-md-6">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Description</label>

                                    <textarea class="form-control" id="recon_description" name="recon_description" rows="4"
                                        cols="50" required></textarea>

                                </div>

                               


                                <div class="col-12" style="text-align: right;">
                                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                    <input type="hidden" name="dealer_id" value="<?php echo $_GET['id'] ?>">
                                    <input type="hidden" name="row_id" id='dealer_user_id'>
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Close</button>
                                    <input class="btn btn-primary waves-effect waves-light" type="submit"
                                        name="recon_btn" id="recon_btn" value="Save">
                                </div>
                            </div>
                        </form>

                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div id="survey_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Survey Response</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container-fluid">
                            <div class="row" id="survey-container">

                            </div>

                        </div>


                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div id="sales_performance" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Sales Performance</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-nowrap table-hover mb-1" id="sale_table">
                                        <thead class="bg-light">
                                            <tr>
                                                <th class="text-center">S.No</th>
                                                <th class="text-center">Product</th>
                                                <th class="text-center">Monthly Target</th>
                                                <th class="text-center">Target Achived</th>
                                                <th class="text-center">Difference</th>
                                                <th class="text-center">Reason</th>
                                                <th class="text-center">Time</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>


                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <div id="wet_stock_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Sales Performance</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-nowrap table-hover mb-1" id="wet_stock">
                                        <thead class="bg-light">
                                            <tr>
                                                <th class="text-center">S.No</th>
                                                <th class="text-center">Product</th>
                                                <th class="text-center">Tank #</th>
                                                <th class="text-center">Old Dip</th>
                                                <th class="text-center">New Dip</th>
                                                <th class="text-center">Time</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>


                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div id="despensing_unit_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
            aria-hidden="true" data-bs-scroll="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Sales Performance</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-nowrap table-hover mb-1" id="despensing_unit_table">
                                        <thead class="bg-light">
                                            <tr>
                                                <th class="text-center">S.No</th>
                                                <th class="text-center">Product</th>
                                                <th class="text-center">Nozel #</th>
                                                <th class="text-center">Old Dip</th>
                                                <th class="text-center">New Dip</th>
                                                <th class="text-center">Time</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>


                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div id="stock_variations_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
            aria-hidden="true" data-bs-scroll="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Stock Variations</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12" style="overflow:auto">
                                    <table class="table table-nowrap table-hover mb-1" id="stock_variations_table">
                                        <thead class="bg-light">
                                            <tr>
                                                <th class="text-center">S.No</th>
                                                <th class="text-center">Product</th>
                                                <th class="text-center">Opening Stock</th>
                                                <th class="text-center">Purchase During Inspection period</th>
                                                <th class="text-center">Total Product Available for Sale</th>
                                                <th class="text-center">Sales as per meter reading</th>
                                                <th class="text-center">Book Stock</th>
                                                <th class="text-center">Current Physical Stock</th>
                                                <th class="text-center">Gain/Loss</th>
                                                <th class="text-center">Time</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>


                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div id="ledger_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Update Ledger</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="insert_form_ledgers" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Ledger</label>
                                        <div class="col-md-10">
                                            <input type="text" id="ledger_amount" class="form-control"
                                                name='ledger_amount' required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input"
                                            class="col-md-2 col-form-label">Description</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" id="ledger_description"
                                                name="ledger_description" rows="4" cols="50" required></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12" style="text-align: right;">
                                    <input type="hidden" name="ledger_old_value" id='ledger_old_value'>

                                    <input type="hidden" name="user_id" id="user_id"
                                        value="<?php echo $_SESSION['user_id']; ?>">
                                    <input type="hidden" name="dealer_id" value="<?php echo $_GET['id'] ?>">
                                    <input type="hidden" name="row_id">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Close</button>
                                    <input class="btn btn-primary waves-effect waves-light" type="submit"
                                        name="insert_l" id="insert_l" value="Save">
                                </div>
                            </div>
                        </form>

                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <div id="add_facility" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Add Facility</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="insert_form" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Facility</label>
                                        <div class="col-md-10">
                                            <input type="text" id="facility" class="form-control" name='name'>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12" style="text-align: right;">
                                    <input type="hidden" name="user_id" id="user_id"
                                        value="<?php echo $_SESSION['user_id']; ?>">
                                    <input type="hidden" name="dealer_id" value="<?php echo $_GET['id'] ?>">
                                    <input type="hidden" name="row_id">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Close</button>
                                    <input class="btn btn-primary waves-effect waves-light" type="submit" name="insert"
                                        id="insert" value="Save changes">
                                </div>
                            </div>
                        </form>

                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>


        <div id="add_nozel" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Add Nozels</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="insert_form1" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                        <div class="col-md-10">
                                            <input type="text" id="name" class="form-control" name='name' required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Last
                                            Reading</label>
                                        <div class="col-md-10">
                                            <input type="number" id="last_reading" class="form-control"
                                                name='last_reading' value="0" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Product</label>
                                        <div class="col-md-10">
                                            <select name="nozzels_products" class="form-select" id="nozzels_products"
                                                onchange="product_tankss()" required>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Tanks</label>
                                        <div class="col-md-10">
                                            <select name="product_tank" class="form-select" id="product_tank" required>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input"
                                            class="col-md-2 col-form-label">Dispenser</label>
                                        <div class="col-md-10">
                                            <select name="product_dispenser" class="form-select" id="product_dispenser"
                                                required>

                                            </select>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-12" style="text-align: right;">
                                    <input type="hidden" name="user_id" id="user_id"
                                        value="<?php echo $_SESSION['user_id']; ?>">
                                    <input type="hidden" name="dealer_id" value="<?php echo $_GET['id'] ?>">
                                    <input type="hidden" name="row_id">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Close</button>
                                    <input class="btn btn-primary waves-effect waves-light" type="submit" name="insert1"
                                        id="insert1" value="Save changes">
                                </div>
                            </div>
                        </form>

                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div id="dispenser_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Add Dispenser</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="dispenser_form" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Name</label>

                                        <input type="text" id="dispenser_name" class="form-control"
                                            name='dispenser_name'>

                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input"
                                            class="col-md-2 col-form-label">Description</label>

                                        <textarea class="form-control" name="dispenser_description"
                                            id="dispenser_description" cols="30" rows="5"></textarea>

                                    </div>


                                </div>

                                <div class="col-12" style="text-align: right;">
                                    <input type="hidden" name="user_id" id="user_id"
                                        value="<?php echo $_SESSION['user_id']; ?>">
                                    <input type="hidden" name="dealer_id" value="<?php echo $_GET['id'] ?>">
                                    <input type="hidden" name="row_id">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Close</button>
                                    <input class="btn btn-primary waves-effect waves-light" type="submit"
                                        name="dispenser_btn" id="dispenser_btn" value="Save changes">
                                </div>
                            </div>
                        </form>

                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>


        <div id="add_tanks_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Add Tanks</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="tank_form" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-4">
                                    <label for="">Tank #</label>

                                    <input type="text" class="form-control" name="lorry_no" id="lorry_no">
                                </div>

                                <div class="col-4">
                                    <label for=""> Product</label>
                                    <select name="products" class="form-select" id="dealer_products">

                                    </select>
                                </div>

                                <div class="col-4 d-none">
                                    <label for="">Min Limit</label>
                                    <input type="number" class="form-control" name="min_limit" value="0">
                                </div>
                                <div class="col-4">
                                    <label for="">Capacity</label>
                                    <input type="number" class="form-control" name="max_limit">
                                </div>

                            </div>

                            <div class="col-12 mt-5" style="text-align: right;">
                                <input type="hidden" name="user_id" id="user_id"
                                    value="<?php echo $_SESSION['user_id']; ?>">
                                <input type="hidden" name="dealer_id" value="<?php echo $_GET['id'] ?>">
                                <input type="hidden" name="row_id">
                                <button type="button" class="btn btn-secondary waves-effect"
                                    data-bs-dismiss="modal">Close</button>
                                <input class="btn btn-primary waves-effect waves-light" type="submit"
                                    name="tank_form_btn" id="tank_form_btn" value="Save changes">
                            </div>
                        </form>
                    </div>

                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        <div id="add_nozel_tanks" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Add Tanks</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="nozel_tank_form" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-6">
                                    <label for=""> Tank</label>
                                    <select class="form-select" id="tanks_select" name="tank_id">


                                    </select>
                                </div>

                                <div class="col-6">
                                    <label for=""> Nozel</label><br>
                                    <select class="form-control multi_select" id="nozel_select" name="nozzels_id[]"
                                        multiple placeholder="This is a placeholder">

                                    </select>
                                </div>

                            </div>
                            <div class="col-12" style="text-align: right;">
                                <input type="hidden" name="user_id" id="user_id"
                                    value="<?php echo $_SESSION['user_id']; ?>">
                                <input type="hidden" name="dealer_id" value="<?php echo $_GET['id'] ?>">
                                <input type="hidden" name="row_id">
                                <button type="button" class="btn btn-secondary waves-effect"
                                    data-bs-dismiss="modal">Close</button>
                                <input class="btn btn-primary waves-effect waves-light" type="submit"
                                    name="nozel_tank_btn" id="nozel_tank_btn" value="Save">
                            </div>
                        </form>
                    </div>


                </div>

            </div>

        </div>

        <div id="tank_dip_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Tank Dip</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="tank_dip_form" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Dip</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id='dip_input' name='dip_input'
                                                required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Datetime</label>
                                        <div class="col-md-10">
                                            <input type="datetime-local" class="form-control" id='date_time'
                                                name='date_time' required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input"
                                            class="col-md-2 col-form-label">Description</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" id="dip_description" name="dip_description"
                                                rows="4" cols="50" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12" style="text-align: right;">
                                    <input type="hidden" name="user_id" id="user_id"
                                        value="<?php echo $_SESSION['user_id']; ?>">
                                    <input type="hidden" name="dealer_id" value="<?php echo $_GET['id'] ?>">
                                    <input type="hidden" name="tank_id" id='tank_id' value="">
                                    <input type="hidden" name="old_dip" id='old_dip' value="">
                                    <input type="hidden" name="row_id">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Close</button>
                                    <input class="btn btn-primary waves-effect waves-light" type="submit" name="dip_btn"
                                        id="dip_btn" value="Save">
                                </div>
                            </div>
                        </form>

                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div id="products_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Products</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="productts_form" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                        <div class="col-md-10">
                                            <!-- <input type="text" class="form-control" id='products_name'
                                                name='products_name' required> -->
                                            <select name="products_name" class="form-select" id="products_name"
                                                required>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">From</label>
                                        <div class="col-md-10">
                                            <input type="datetime-local" class="form-control" id='from_date'
                                                name='from_date' required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">To</label>
                                        <div class="col-md-10">
                                            <input type="datetime-local" class="form-control" id='to_date'
                                                name='to_date' required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Indent
                                            Price</label>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control" id='indent_price_pro' step="any"
                                                name='indent_price' required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Nozel
                                            Price</label>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control" id='nozel_price_pro' step="any"
                                                name='nozel_price' required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input"
                                            class="col-md-2 col-form-label">Description</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" id="products_description"
                                                name="products_description" rows="4" cols="50" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12" style="text-align: right;">
                                    <input type="hidden" name="user_id" id="user_id"
                                        value="<?php echo $_SESSION['user_id']; ?>">
                                    <input type="hidden" name="dealer_id" value="<?php echo $_GET['id'] ?>">
                                    <input type="hidden" name="row_id" id="row_id">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Close</button>
                                    <input class="btn btn-primary waves-effect waves-light" type="submit"
                                        name="products_btn" id="products_btn" value="Save">
                                </div>
                            </div>
                        </form>

                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div id="target_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Set Targets</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="targeted_from" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Month</label>
                                        <div class="col-md-10">
                                            <input type="month" class="form-control" id='month_name' name='month_name'
                                                required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Target
                                            Amount</label>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control" id='targeted_amount'
                                                name='targeted_amount' required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Product</label>
                                        <div class="col-md-10">
                                            <select name="targeted_product" class="form-select" id="targeted_product">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input"
                                            class="col-md-2 col-form-label">Description</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" id="products_description"
                                                name="products_description" rows="4" cols="50" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12" style="text-align: right;">
                                    <input type="hidden" name="user_id" id="user_id"
                                        value="<?php echo $_SESSION['user_id']; ?>">
                                    <input type="hidden" name="dealer_id" value="<?php echo $_GET['id'] ?>">
                                    <input type="hidden" name="row_id" id="row_id">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Close</button>
                                    <input class="btn btn-primary waves-effect waves-light" type="submit"
                                        name="target_btn" id="target_btn" value="Save">
                                </div>
                            </div>
                        </form>

                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div id="dip_backlog_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Backlog</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="timeline">
                                        <div class="timeline-container">
                                            <div class="timeline-end">
                                                <p>Start</p>
                                            </div>
                                            <div class="timeline-continue" id='order_logs'>




                                            </div>
                                            <div class="timeline-start">
                                                <p>End</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <div id="ledger_backlog_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
            aria-hidden="true" data-bs-scroll="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Backlog</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="timeline">
                                        <div class="timeline-container">
                                            <div class="timeline-end">
                                                <p>Start</p>
                                            </div>
                                            <div class="timeline-continue" id='ledger_logs'>




                                            </div>
                                            <div class="timeline-start">
                                                <p>End</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div id="products_price_backlog_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
            aria-hidden="true" data-bs-scroll="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Product Backlog</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-hover mb-1" id="product_price_backlog">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th class="text-center">id</th>
                                                    <th class="text-center">Product Name</th>
                                                    <th class="text-center">From</th>
                                                    <th class="text-center">To</th>
                                                    <th class="text-center">Indent Price</th>
                                                    <th class="text-center">Nozel Price</th>
                                                    <th class="text-center">Created At</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>






    <!-- /.modal-content -->



    <div id="sub_orders_main" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                    <h5 class="modal-title" id="myModalLabel">
                        <h5 id="labelc">Order Detail</h5>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-nowrap table-hover mb-1" id="suborders_tables">
                                        <thead class="bg-light">
                                            <tr>
                                                <th class="text-center">S.No</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Site Name</th>
                                                <!-- <th class="text-center">Customer</th>
                                        <th class="text-center">SAP Code</th> -->
                                                <th class="text-center">Product Type</th>
                                                <th class="text-center">Rate</th>
                                                <th class="text-center">Qty</th>
                                                <th class="text-center">Delivered</th>
                                                <th class="text-center">Depot</th>
                                                <!-- <th class="text-center">Delivery Type</th> -->
                                                <th class="text-center">Order Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>





    <?php include 'footer.php'; ?>


    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->


    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- chat offcanvas -->

    <!-- JAVASCRIPT -->

    <?php include 'script_tags.php'; ?>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.43.0/apexcharts.min.js"
    integrity="sha512-vv0F8Er+ByFK3l86WDjP5Zc0h8uxNWPzF+l4wGK0/BlHWxDiFHbYr/91dn8G0OO8tTnN40L4s2Whom+X2NxPog=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNyJWb04pByaU1CTmimoWNl3b86VV6qZ8&callback=initMap"></script>

<script>
var table;
var lat, lng;
var geofence;
var marker;
var coordinates;
let map;
var circle;

// ================================================================ modal intitailize start

$(document).on('click', '#update_ledgers', function() {

    // var id = $(this).attr("id");
    $('#ledger_modal').modal('show');
})
$(document).on('click', '#add', function() {

    // var id = $(this).attr("id");
    $('#add_facility').modal('show');
});

$(document).on('click', '#addnozel', function() {

    // var id = $(this).attr("id");
    $('#add_nozel').modal('show');
});

$(document).on('click', '#add_dispenser', function() {

    // var id = $(this).attr("id");
    $('#dispenser_modal').modal('show');
});

$(document).on('click', '#add_tanks', function() {

    // var id = $(this).attr("id");
    $('#add_tanks_modal').modal('show');
});

$(document).on('click', '#nozel_tanks_panel_add', function() {

    // var id = $(this).attr("id");
    $('#add_nozel_tanks').modal('show');
});
$(document).on('click', '#add_complaints', function() {

    // var id = $(this).attr("id");
    $('#complaints_modals').modal('show');
});
$(document).on('click', '#add_users', function() {

    // var id = $(this).attr("id");
    $('#users_modal').modal('show');
});

$(document).on('click', '#add_products', function() {

    // var id = $(this).attr("id");
    $('#products_modal').modal('show');
});

$(document).on('click', '#add_targets', function() {

    // var id = $(this).attr("id");
    $('#target_modal').modal('show');
});

//=============================================================modal intitailize start

//  ============================================================tabel instailize start




table2 = $('#myTable2').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});
table3 = $('#myTable3').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});

table4 = $('#tanks_table').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});

table = $('#myTable').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});

nozel_tanks_table = $('#nozel_tanks_panel_table').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});
complaint_table = $('#complaint_table').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});

users_table = $('#users_table').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});
products_table = $('#products_table').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});

product_price_backlog = $('#product_price_backlog').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});
suborders_tables = $('#suborders_tables').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});

lubes_table = $('#lubes_table').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});

targeted_table = $('#targeted_table').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});

sale_table = $('#sale_table').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});

wet_stock = $('#wet_stock').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});

despensing_unit_table = $('#despensing_unit_table').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});

stock_variations_table = $('#stock_variations_table').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});

dispenser_table = $('#dispenser_table').DataTable({
    dom: 'Bfrtip',


    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

});


//========================================================== tabel intailize end

var decryptedId = "";
$(document).ready(function() {
    var encryptedIdFromUrl = '<?php echo $_GET['id']; ?>'; // Replace with the actual encrypted ID
    var key = 'Hamza Ansari';
    var iv = CryptoJS.lib.WordArray.random(16);

    // Decrypt the ID
    decryptedId = decryptId(encryptedIdFromUrl, key, iv);
    // alert(decryptedId)

    setTimeout(function() {
        // Code to be executed after the delay
        $('input[name="dealer_id"]').val(decryptedId);
        console.log('This code executes after a 2-second delay');
    }, 2000);

    var prel_role = "<?php echo $_SESSION['privilege'] ?>";
    if (prel_role != 'Admin') {
        $('.add_button').addClass('d-none');
    } else {
        $('.add_button').removeClass('d-none');

    }

    fetchtable();
    // order_details();
    // orderlist();
    facilities();
    nozels();
    tanks_view();
    nozels_tanks_form();
    multiselect();
    tank_select();
    // dealers_complaints();
    dealers_products();
    dealers_users();
    // dealers_visits();
    // get_dealer_target();
    d_dispenser();
    // get_response_answers(1);
    all_products();
    // get_ledger_backlog()
    $('.multi_select').select2({
        dropdownParent: $('#add_nozel_tanks')
    });
    ////=================================================== graph 

    var options = {
        series: [{
            name: 'Inflation',
            data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
        }],
        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
                borderRadius: 10,
                dataLabels: {
                    position: 'top', // top, center, bottom
                },
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function(val) {
                return val + "%";
            },
            offsetY: -20,
            style: {
                fontSize: '12px',
                colors: ["#304758"]
            }
        },

        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                "Dec"
            ],
            position: 'top',
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            },
            crosshairs: {
                fill: {
                    type: 'gradient',
                    gradient: {
                        colorFrom: '#D8E3F0',
                        colorTo: '#BED1E6',
                        stops: [0, 100],
                        opacityFrom: 0.4,
                        opacityTo: 0.5,
                    }
                }
            },
            tooltip: {
                enabled: true,
            }
        },
        yaxis: {
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false,
            },
            labels: {
                show: false,
                formatter: function(val) {
                    return val + "%";
                }
            }

        },
        title: {
            text: 'Monthly Inflation in Argentina, 2002',
            floating: true,
            offsetY: 330,
            align: 'center',
            style: {
                color: '#444'
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

});

///================================================================ get functions start 
function product_tankss() {
    var product = $('#nozzels_products').val();
    // alert(product)

    $.ajax({
        url: '<?php echo $api_url; ?>get/get_dealers_product_tank.php?key=03201232927&dealer_id=' +
            decryptedId + '&product=' +
            product + '',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log(data)
            $('#product_tank').empty();
            // Iterate through the data and append options to the select element
            $('#product_tank').append($('<option>', {
                value: '',
                text: 'Select Tank '
            }));
            $.each(data, function(index, item) {

                $('#product_tank').append($('<option>', {
                    value: item.id,
                    text: item.lorry_no
                }));
            });

            // Refresh the Select2 element to display the newly added options
            // $('#depots').trigger('change.select2');
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
}


function multiselect() {
    $.ajax({
        url: '<?php echo $api_url; ?>get/get_dealers_tanks.php?key=03201232927&dealer_id=' + decryptedId +
            '&key=03201232927',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Iterate through the data and append options to the select element
            $('#tanks_select').append($('<option>', {
                value: '',
                text: 'Select Tank '
            }));
            $.each(data, function(index, item) {

                $('#tanks_select').append($('<option>', {
                    value: item.id,
                    text: item.lorry_no
                }));
            });

            // Refresh the Select2 element to display the newly added options
            // $('#depots').trigger('change.select2');
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
}

function tank_select() {
    $.ajax({
        url: '<?php echo $api_url; ?>get/get_dealers_nozels.php?key=03201232927&dealer_id=' + decryptedId +
            '&key=03201232927',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Iterate through the data and append options to the select element
            $('#nozel_select').append($('<option>', {
                value: '',
                text: 'Select Nozel '
            }));
            $.each(data, function(index, item) {

                $('#nozel_select').append($('<option>', {
                    value: item.id,
                    text: item.name
                }));
            });

            // Refresh the Select2 element to display the newly added options
            // $('#depots').trigger('change.select2');
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
}




function initMap() {

    gmarkers = [];
    map = new google.maps.Map(document.getElementById("map-canvas"), {
        center: {
            lat: parseFloat(30.3753),
            lng: parseFloat(69.3451)
        },
        zoom: 16,
        mapTypeId: "roadmap",

    });


    // google.maps.event.addListener(drawingManager, 'polygoncomplete', polygon);
}

function fetchtable() {

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    fetch("<?php echo $api_url; ?>get/dealer_profile.php?id=" + decryptedId + "&key=03201232927", requestOptions)
        .then(response => response.json())
        .then(response => {
            // var cordinates = response[0]['cordinates'];
            // var index = cordinates.indexOf(',');
            //  lat = cordinates.substring(0, index);
            //  long = cordinates.substring(index + 1); 
            //  console.log(lat+"lat");
            //  console.log(long+"long");
            console.log(response);

            coordinates = response[0]['co-ordinates'];
            [lat, lng] = coordinates.split(', ');
            console.log("Latitude (lat):", lat);
            console.log("Longitude (lng):", lng);
            $('#user').text(response[0]['name'])
            $('#position').text(response[0]['housekeeping']);
            $('#date').text(response[0]['created_at']);
            $('#location').text(response[0]['location']);
            $('#phone_no').text(response[0]['contact']);
            $('#email').text(response[0]['email']);
            $('#indent_price').text(response[0]['indent_price']);
            $('#nozel_price').text(response[0]['Nozel_price']);
            $('#ledger').text(response[0]['acount']);
            $('#ledger_old_value').val(response[0]['acount']);
            $('#ledger_amount').val(response[0]['acount']);



            var banner = response[0]['banner'];
            var logo = response[0]['logo'];
            var base_url = '<?php echo $api_url; ?>';

            if (banner != '') {
                banner = base_url + 'uploads/' + banner;

                $("#profile_img").attr("src", banner);

            } else {

            }

            if (logo != '') {
                logo = base_url + 'uploads/' + logo;
                $("#profile_logo").attr("src", logo);

            } else {

            }
            const newCenter = {
                lat: parseFloat(lat),
                lng: parseFloat(lng)
            }; // New center coordinates
            map.setCenter(newCenter);

            var circle = new google.maps.Circle({
                center: {
                    lat: parseFloat(lat),
                    lng: parseFloat(lng)
                },
                radius: 100, // in meters
                map: map,
                fillColor: '#FF0000',
                fillOpacity: 0.2,
                strokeColor: '#FF0000',
                strokeOpacity: 0.4,
                strokeWeight: 2
            });

            // Create a marker
            var marker = new google.maps.Marker({
                position: {
                    lat: parseFloat(lat),
                    lng: parseFloat(lng)
                },
                map: map,
            });
            var infoWindow = new google.maps.InfoWindow({
                content: response[0]['name']
            });

            // // Open the info window on the marker by default
            infoWindow.open(map, marker);

        })
        .catch(error => console.log('error', error));


}

function order_details() {
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    fetch("<?php echo $api_url; ?>get/dealers_order_count.php?id=" + decryptedId + "&key=03201232927",
            requestOptions)
        .then(response => response.json())
        .then(response => {
            console.log(response);
            $('#total_orders').text(response[0]['total']);
        })
        .catch(error => console.log('error', error));


}

function orderlist() {

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    fetch("<?php echo $api_url; ?>get/dealers_syb_orders.php?id=" + decryptedId + "&key=03201232927",
            requestOptions)
        .then(response => response.json())
        .then(response => {
            console.log(response)

            table.clear().draw();
            $.each(response, function(index, data) {
                var status = data.status;
                console.log(status)
                var status_value = '';

                if (status == 0) {
                    status_value =
                        '<span id=' + data.id +
                        ' class="badge rounded-pill cursor-pointer bg-primary approved_check" data-key="t-new">Pending</span>';
                } else if (status == 1) {
                    status_value =
                        '<span id=' + data.id +
                        ' class="badge rounded-pill cursor-pointer bg-info" data-key="t-new">Approved</span>';
                } else if (status == 2) {
                    status_value =
                        '<span id=' + data.id +
                        ' class="badge rounded-pill cursor-pointer bg-success" data-key="t-new">Complete</span>';
                } else if (status == 3) {
                    status_value =
                        '<span id=' + data.id +
                        ' class="badge rounded-pill cursor-pointer bg-danger" data-key="t-new">Cancel</span>';
                } else if (status == 4) {
                    status_value =
                        '<span id=' + data.id +
                        ' class="badge rounded-pill cursor-pointer bg-warning" data-key="t-new">Special Approval</span>';
                } else if (status == 5) {
                    status_value =
                        '<span id=' + data.id +
                        ' class="badge rounded-pill cursor-pointer bg-dark approved_check" data-key="t-new">ASM Approved</span>';
                }



                table.row.add([
                    index + 1,
                    data.created_at,
                    data.name,
                    // data.name,
                    data.type,
                    data.consignee_name,
                    data.total_amount,
                    data.legder_balance,
                    status_value,
                    '<button type="button" id="view_order" name="view_order" onclick="view_order(' +
                    data.id +
                    ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-eye font-size-16 align-middle"></i></button>',
                    // '<button type="button" id="delete" name="delete" onclick="deleteData(' +
                    // data.id +
                    // ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>'
                ]).draw(false);
            });

        })
        .catch(error => console.log('error', error));


}

function dealers_complaints() {

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    fetch("<?php echo $api_url; ?>get/get_dealers_complaints.php?id=" + decryptedId + "&key=03201232927",
            requestOptions)
        .then(response => response.json())
        .then(response => {
            console.log(response)

            complaint_table.clear().draw();
            $.each(response, function(index, data) {



                complaint_table.row.add([

                    index + 1,
                    data.created_at,
                    data.name,
                    data.email,
                    data.phone,
                    data.priority,
                    data.subject,
                    data.message,
                    data.status_value
                ]).draw(false);


            });

        })
        .catch(error => console.log('error', error));


}


function dealers_visits() {
    // alert('Hamza')

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    fetch("<?php echo $api_url; ?>get/get_dealers_inspections.php?id=" + decryptedId + "&key=03201232927",
            requestOptions)
        .then(response => response.json())
        .then(response => {

            lubes_table.clear().draw();
            $.each(response, function(index, data) {
                console.log('Visit')
                console.log(response)



                lubes_table.row.add([

                    index + 1,
                    data.time,
                    data.name,
                    data.current_status,
                    '<button type="button"  onclick="displaySurvey(' +
                    data
                    .id + ',' + data.id + ',' + data.dealer_id +
                    ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button>',
                    '<button type="button" onclick="get_tas_sales_data(' + data.id + ',' + data
                    .dealer_id +
                    ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button>',
                    '<button type="button" onclick="displaySurvey(' +
                    data
                    .id + ',' + data.id + ',' + data.dealer_id +
                    ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button>',
                    '<button type="button"  onclick="get_task_wet_stock(' + data.id + ',' + data
                    .dealer_id +
                    ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button>',
                    '<button type="button"  onclick="get_task_despensing_unit(' + data.id + ',' +
                    data.dealer_id +
                    ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button>',
                    '<button type="button"  onclick="get_task_stock_variations(' + data.id + ',' +
                    data.dealer_id +
                    ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button>',
                ]).draw(false);


            });

        })
        .catch(error => console.log('error', error));


}

function tanks_view() {
    var prel_role = "<?php echo $_SESSION['privilege'] ?>";
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    fetch("<?php echo $api_url; ?>get/get_dealers_tanks.php?key=03201232927&dealer_id=" + decryptedId + "",
            requestOptions)
        .then(response => response.json())
        .then(response => {
            console.log(response)

            table4.clear().draw();
            if (response.length > 0) {


                $.each(response, function(index, data) {

                    table4.row.add([

                        index + 1,
                        data.lorry_no,
                        data.name,
                        // data.min_limit,
                        data.max_limit,
                        data.current_dip,
                        (prel_role == 'Admin' ?
                            '<td> <button type="button" id="tank_dip" name="tank_dip" onclick="add_dip(' +
                            data
                            .id + ',' + data.current_dip +
                            ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-plus-square font-size-16 align-middle"></i></button></td>' :
                            ''),
                        (prel_role == 'Admin' ?
                            '<td> <button type="button" id="tank_dip" name="tank_dip" onclick="get_dip_backlog(' +
                            data
                            .id + ',' + data.current_dip +
                            ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button></td>' :
                            ''),
                        (prel_role == 'Admin' ?
                            '<td><button type="button" id="delete" name="delete" onclick="deleteDatatank(' +
                            data.id +
                            ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button></td>' :
                            '')


                    ]).draw(false);

                    $('#atgs').append('<div class="border-bottom loyal-customers-box pt-2">' +
                        ' <div class="d-flex align-items-center">' +
                        '<i class="fas fa-truck-moving font-size-14 text-dark ms-1"></i>' +
                        '<div class="flex-grow-1 ms-3 overflow-hidden">' +
                        '<h5 class="font-size-15 mb-1 text-truncate">' + data.lorry_no + '</h5>' +
                        '<p>' + data.update_time + '</p>' +
                        '</div>' +
                        '<div class="flex-shrink-0">' +
                        '<h5 class="font-size-14 mb-0 text-truncate w-xs bg-light p-2 rounded text-center"> ' +
                        data.current_dip +
                        '</h5>' +
                        '</div>' +
                        '</div>' +
                        '</div>')




                });
            } else {
                $('#atgs').append('<div class="border-bottom loyal-customers-box pt-2">' +
                    ' <div class="d-flex align-items-center">' +
                    '<i class="fas fa-truck-moving font-size-14 text-dark ms-1"></i>' +
                    '<div class="flex-grow-1 ms-3 overflow-hidden">' +
                    '<h5 class="font-size-15 mb-1 text-truncate">No ATGS Found</h5>' +
                    '</div>' +
                    '<div class="flex-shrink-0">' +
                    '<h5 class="font-size-14 mb-0 text-truncate w-xs bg-light p-2 rounded text-center"> ---</h5>' +
                    '</div>' +
                    '</div>' +
                    '</div>')
            }

        })
        .catch(error => console.log('error', error));




}

function dealers_products() {
    var prel_role = "<?php echo $_SESSION['privilege'] ?>";
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("<?php echo $api_url; ?>get/dealers_products.php?key=03201232927&dealer_id=" + decryptedId + "",
            requestOptions)
        .then(response => response.json())
        .then(result => {
            var selectElement = $("#dealer_products");
            var nozzels_products = $("#nozzels_products");

            selectElement.append($('<option>', {
                value: '',
                text: 'Select Product'
            }));

            var targeted_product = $("#targeted_product");

            targeted_product.append($('<option>', {
                value: '',
                text: 'Select Product'
            }));

            nozzels_products.append($('<option>', {
                value: '',
                text: 'Select Product'
            }));
            $.each(result, function(index, data) {

                console.log(data.name)
                selectElement.append($('<option>', {
                    value: data.id,
                    text: data.name
                }));
                nozzels_products.append($('<option>', {
                    value: data.id,
                    text: data.name
                }));
                targeted_product.append($('<option>', {
                    value: data.id,
                    text: data.name
                }));

                products_table.row.add([

                    index + 1,
                    data.name,
                    data.from,
                    data.to,
                    data.indent_price,
                    data.nozel_price,
                    data.update_time,
                    (prel_role == 'Admin' ?
                        '<td><button type="button" id="edit" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" name="edit" onclick="editData(' +
                        data.id +
                        ')" class="btn btn-soft-warning waves-effect waves-light"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button></td>' :
                        ''),
                    '<button type="button" id="tank_dip" name="tank_dip" onclick="get_product_price_backlog(' +
                    data
                    .id +
                    ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button>',


                ]).draw(false);

                $('#currents_products').append('<div class="border-bottom loyal-customers-box pt-2">' +
                    ' <div class="d-flex align-items-center">' +
                    '<i class="fas fa-gas-pump font-size-14 text-dark ms-1"></i>' +
                    '<div class="flex-grow-1 ms-3 overflow-hidden">' +
                    '<h5 class="font-size-15 mb-1 text-truncate">' + data.name + '</h5>' +
                    '<p>Duration : ' + data.from + ' - ' + data.to + '</p>' +
                    '<p>Indent Price : ' + data.indent_price + '</p>' +
                    '<p>Nozel Price : ' + data.nozel_price + '</p>' +
                    '</div>' +
                    '<div class="flex-shrink-0">' +
                    '<h5 class="font-size-14 mb-0 text-truncate w-xs bg-light p-3 rounded text-center"> ' +
                    data.update_time +
                    '</h5>' +
                    '</div>' +
                    '</div>' +
                    '</div>')
            });
        })
        .catch(error => console.log('error', error));
}

function all_products() {
    // alert('Hamza')
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("<?php echo $api_url; ?>get/get_all_products.php?key=03201232927",
            requestOptions)
        .then(response => response.json())
        .then(result => {
            var products_name = $("#products_name");

            products_name.append($('<option>', {
                value: '',
                text: 'Select Product'
            }));

            $.each(result, function(index, data) {
                console.log('all products')
                console.log(data.name)
                products_name.append($('<option>', {
                    value: data.name,
                    text: data.name
                }));


            });
        })
        .catch(error => console.log('error', error));
}

function dealers_users() {
    var prel_role = "<?php echo $_SESSION['privilege'] ?>";

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("<?php echo $api_url; ?>get/dealer_users.php?key=03201232927&dealer_id=" + decryptedId + "",
            requestOptions)
        .then(response => response.json())
        .then(result => {

            $.each(result, function(index, data) {

                console.log(data.name)

                users_table.row.add([

                    index + 1,
                    data.name,
                    data.email,
                    data.password,
                    data.contact,
                    // data.contact,
                    (prel_role == 'Admin' ?
                        '<td><button type="button" id="tank_dip" name="tank_dip" onclick="edit_dealers_users(' +
                        data
                        .id +
                        ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-edit font-size-16 align-middle"></i></button>' :
                        '')
                    // '<button type="button" id="tank_dip" name="tank_dip" onclick="delete_dealer_(' +
                    // data
                    // .id +
                    // ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-trash-alt font-size-16 align-middle"></i></button>',


                ]).draw(false);


            });
        })
        .catch(error => console.log('error', error));
}

function get_dealer_target() {
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("<?php echo $api_url; ?>get/get_dealers_product_target.php?key=03201232927&dealer_id=" + decryptedId + "",
            requestOptions)
        .then(response => response.json())
        .then(result => {

            $.each(result, function(index, data) {

                console.log(data.name)

                targeted_table.row.add([

                    index + 1,
                    data.name,
                    data.date_month,
                    data.target_amount,
                    data.description


                ]).draw(false);


            });
        })
        .catch(error => console.log('error', error));
}



function facilities() {

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    fetch("<?php echo $api_url; ?>get/facilities_get.php?key=03201232927&dealer_id=" + decryptedId + "",
            requestOptions)
        .then(response => response.json())
        .then(response => {
            console.log(response)

            table2.clear().draw();
            $.each(response, function(index, data) {

                table2.row.add([

                    index + 1,
                    data.name,
                    data.created_at


                ]).draw(false);


            });

        })
        .catch(error => console.log('error', error));


}

$('#insert').click(function() {

    $('#row_id').val("");
    // alert("running")

});

function d_dispenser() {
    var prel_role = "<?php echo $_SESSION['privilege'] ?>";

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    fetch("<?php echo $api_url; ?>get/get_dealers_dispenser.php?key=03201232927&dealer_id=" + decryptedId + "",
            requestOptions)
        .then(response => response.json())
        .then(response => {
            console.log(response)
            $('#product_dispenser').append($('<option>', {
                value: '',
                text: 'Select Dispenser '
            }));
            dispenser_table.clear().draw();
            $.each(response, function(index, data) {

                dispenser_table.row.add([

                    index + 1,
                    data.name,
                    data.description,
                    data.created_at,
                    (prel_role == 'Admin' ?
                        '<td><button type="button" id="delete" name="delete" onclick="deleteDatadispensor(' +
                        data.id +
                        ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button></td>' :
                        '')


                ]).draw(false);
                $('#product_dispenser').append($('<option>', {
                    value: data.id,
                    text: data.name
                }));


            });

        })
        .catch(error => console.log('error', error));


}

function nozels() {
    var prel_role = "<?php echo $_SESSION['privilege'] ?>";

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    fetch("<?php echo $api_url; ?>get/get_dealers_nozels.php?key=03201232927&dealer_id=" + decryptedId + "",
            requestOptions)
        .then(response => response.json())
        .then(response => {
            console.log(response)

            table3.clear().draw();
            $.each(response, function(index, data) {

                table3.row.add([

                    index + 1,
                    data.name,
                    data.product_name,
                    data.tank_name,
                    data.dispenser_name,
                    data.new_reading,
                    data.created_at,
                    (prel_role == 'Admin' ?'<td><button type="button" id="tank_dip" name="tank_dip" onclick="edit_dealers_last_recon(' +data.id +',' +data.recon_data_id +',' +data.new_reading +',' +data.dealer_id +',\'' + data.name +'\',' +data.task_id +',' +data.products +')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-edit font-size-16 align-middle"></i></button>' : ''),
                    (prel_role == 'Admin' ?
                        '<td><button type="button" id="delete" name="delete" onclick="deleteDatanozzels(' +
                        data.id +
                        ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button></td>' :
                        '')


                ]).draw(false);


            });

        })
        .catch(error => console.log('error', error));


}

function nozels_tanks_form() {

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    fetch("<?php echo $api_url; ?>get/get_dealers_tank_nozzels.php?key=03201232927&dealer_id=" + decryptedId + "",
            requestOptions)
        .then(response => response.json())
        .then(response => {
            console.log(response)

            nozel_tanks_table.clear().draw();
            $.each(response, function(index, data) {

                nozel_tanks_table.row.add([

                    index + 1,
                    data.name,
                    data.lorry_no,
                    data.created_at


                ]).draw(false);


            });

        })
        .catch(error => console.log('error', error));


}

// $('#insert').click(function() {

//     $('#row_id').val("");
//     // alert("running")

// });


/// ============================================================== get functions end 

// ================================================================= post Functions 

$('#nozel_last_recon_update').on("submit", function(event) {
    event.preventDefault();
    // alert("Name")
    var data = new FormData(this);

    $.ajax({
        url: "<?php echo $api_url; ?>update/update_nozels_last_recon.php",
        cache: false,
        contentType: false,
        processData: false,
        method: "POST",
        data: data,
        beforeSend: function() {
            $('#recon_btn').val("Updating");
            document.getElementById("recon_btn").disabled = true;

        },
        success: function(data) {
            console.log(data)

            if (data != 1) {
                Swal.fire(
                    'Server Error!',
                    'Record Not Created',
                    'error'
                )
                $('#recon_btn').val("Save");
                document.getElementById("recon_btn").disabled = false;
            } else {


                setTimeout(function() {
                    Swal.fire(
                        'Success!',
                        'Record Created Successfully',
                        'success'
                    )
                   
                    location.reload();

                }, 2000);

            }

        },
        error: function(xhr, status, error) {
            // Handle API errors
            console.log('Error:', error);
            console.log('Status:', status);
            console.log('Response:', xhr.responseText);
        }
    });

});
$('#insert_form_ledgers').on("submit", function(event) {
    event.preventDefault();
    // alert("Name")
    var data = new FormData(this);

    $.ajax({
        url: "<?php echo $api_url; ?>update/update_dealers_ledger.php",
        cache: false,
        contentType: false,
        processData: false,
        method: "POST",
        data: data,
        beforeSend: function() {
            $('#insert_l').val("Saving");
            document.getElementById("insert").disabled = true;

        },
        success: function(data) {
            console.log(data)

            if (data != 1) {
                Swal.fire(
                    'Server Error!',
                    'Record Not Created',
                    'error'
                )
                $('#insert_l').val("Save");
                document.getElementById("insert_l").disabled = false;
            } else {


                setTimeout(function() {
                    Swal.fire(
                        'Success!',
                        'Record Created Successfully',
                        'success'
                    )
                    $('#insert_form_ledgers')[0].reset();
                    $('#add_facility').modal('hide');
                    facilities();
                    $('#insert_l').val("Save");
                    document.getElementById("insert_l").disabled = false;
                    location.reload();

                }, 2000);

            }

        },
        error: function(xhr, status, error) {
            // Handle API errors
            console.log('Error:', error);
            console.log('Status:', status);
            console.log('Response:', xhr.responseText);
        }
    });

});
$('#insert_form').on("submit", function(event) {
    event.preventDefault();
    // alert("Name")
    var data = new FormData(this);

    $.ajax({
        url: "<?php echo $api_url; ?>create/dealer_facitlities.php",
        cache: false,
        contentType: false,
        processData: false,
        method: "POST",
        data: data,
        beforeSend: function() {
            $('#insert').val("Saving");
            document.getElementById("insert").disabled = true;

        },
        success: function(data) {
            console.log(data)

            if (data != 1) {
                Swal.fire(
                    'Server Error!',
                    'Record Not Created',
                    'error'
                )
                $('#insert').val("Save");
                document.getElementById("insert").disabled = false;
            } else {


                setTimeout(function() {
                    Swal.fire(
                        'Success!',
                        'Record Created Successfully',
                        'success'
                    )
                    $('#insert_form')[0].reset();
                    $('#add_facility').modal('hide');
                    facilities();
                    $('#insert').val("Save");
                    document.getElementById("insert").disabled = false;
                    location.reload();

                }, 2000);

            }

        }
    });

});
$('#users_from').on("submit", function(event) {
    event.preventDefault();
    // alert("Name")
    var data = new FormData(this);

    $.ajax({
        url: "<?php echo $api_url; ?>create/dealers_users.php",
        cache: false,
        contentType: false,
        processData: false,
        method: "POST",
        data: data,
        beforeSend: function() {
            $('#users_btn').val("Saving");
            document.getElementById("users_btn").disabled = true;

        },
        success: function(data) {
            console.log(data)

            if (data != 1) {
                Swal.fire(
                    'Server Error!',
                    'Record Not Created',
                    'error'
                )
                $('#users_btn').val("Save");
                document.getElementById("users_btn").disabled = false;
            } else {


                setTimeout(function() {
                    Swal.fire(
                        'Success!',
                        'Record Created Successfully',
                        'success'
                    )
                    $('#users_from')[0].reset();
                    $('#users_modal').modal('hide');
                    facilities();
                    $('#users_btn').val("Save");
                    document.getElementById("users_btn").disabled = false;
                    location.reload();


                }, 2000);

            }

        },
        error: function(xhr, status, error) {
            // Handle API errors
            console.log('Error:', error);
            console.log('Status:', status);
            console.log('Response:', xhr.responseText);
        }

    });

});

$('#dispenser_form').on("submit", function(event) {
    event.preventDefault();
    // alert("Name")
    var data = new FormData(this);

    $.ajax({
        url: "<?php echo $api_url; ?>create/create_dispenser.php",
        cache: false,
        contentType: false,
        processData: false,
        method: "POST",
        data: data,
        beforeSend: function() {
            $('#dispenser_btn').val("Saving");
            document.getElementById("dispenser_btn").disabled = true;

        },
        success: function(data) {
            console.log(data)

            if (data != 1) {
                Swal.fire(
                    'Server Error!',
                    'Record Not Created',
                    'error'
                )
                $('#dispenser_btn').val("Save");
                document.getElementById("dispenser_btn").disabled = false;
            } else {


                setTimeout(function() {
                    Swal.fire(
                        'Success!',
                        'Record Created Successfully',
                        'success'
                    )
                    $('#insert_form1')[0].reset();
                    $('#add_nozel').modal('hide');
                    facilities();
                    $('#dispenser_btn').val("Save");
                    document.getElementById("dispenser_btn").disabled = false;
                    location.reload();


                }, 2000);

            }

        }
    });

});

$('#insert_form1').on("submit", function(event) {
    event.preventDefault();
    // alert("Name")
    var data = new FormData(this);

    $.ajax({
        url: "<?php echo $api_url; ?>create/nozzels.php",
        cache: false,
        contentType: false,
        processData: false,
        method: "POST",
        data: data,
        beforeSend: function() {
            $('#insert1').val("Saving");
            document.getElementById("insert1").disabled = true;

        },
        success: function(data) {
            console.log(data)

            if (data != 1) {
                Swal.fire(
                    'Server Error!',
                    'Record Not Created',
                    'error'
                )
                $('#insert1').val("Save");
                document.getElementById("insert1").disabled = false;
            } else {


                setTimeout(function() {
                    Swal.fire(
                        'Success!',
                        'Record Created Successfully',
                        'success'
                    )
                    $('#insert_form1')[0].reset();
                    $('#add_nozel').modal('hide');
                    facilities();
                    $('#insert1').val("Save");
                    document.getElementById("insert1").disabled = false;
                    location.reload();


                }, 2000);

            }

        }
    });

});



$('#tank_form').on("submit", function(event) {
    event.preventDefault();
    // alert("Name")
    var data = new FormData(this);

    $.ajax({
        url: "<?php echo $api_url; ?>create/create_dealers_tanks.php",
        cache: false,
        contentType: false,
        processData: false,
        method: "POST",
        data: data,
        beforeSend: function() {
            $('#tank_form_btn').val("Saving");
            document.getElementById("tank_form_btn").disabled = true;

        },
        success: function(data) {
            console.log(data)

            if (data != 1) {
                Swal.fire(
                    'Server Error!',
                    'Record Not Created',
                    'error'
                )
                $('#tank_form_btn').val("Save");
                document.getElementById("tank_form_btn").disabled = false;
            } else {


                setTimeout(function() {
                    Swal.fire(
                        'Success!',
                        'Record Created Successfully',
                        'success'
                    )
                    $('#tank_form')[0].reset();

                    facilities();
                    $('#tank_form_btn').val("Save");
                    document.getElementById("tank_form_btn").disabled = false;
                    location.reload();


                }, 2000);

            }

        }
    });

});

$('#nozel_tank_form').on("submit", function(event) {
    event.preventDefault();
    // alert("Name")
    var formData = $(this).serialize();
    console.log(formData);
    $.ajax({
        url: "<?php echo $api_url; ?>create/create_dealers_tanks_nozels.php",
        type: 'POST',
        data: formData,
        beforeSend: function() {
            $('#nozel_tank_btn').val("Saving");
            document.getElementById("nozel_tank_btn").disabled = true;

        },
        success: function(data) {
            console.log(data)

            if (data != 1) {
                Swal.fire(
                    'Server Error!',
                    'Record Not Created',
                    'error'
                )
                $('#nozel_tank_btn').val("Save");
                document.getElementById("nozel_tank_btn").disabled = false;
            } else {


                setTimeout(function() {
                    Swal.fire(
                        'Success!',
                        'Record Created Successfully',
                        'success'
                    )
                    $('#nozel_tank_form')[0].reset();

                    facilities();
                    $('#nozel_tank_btn').val("Save");
                    document.getElementById("nozel_tank_btn").disabled = false;
                    location.reload();


                }, 2000);

            }

        },
        error: function(xhr, status, error) {
            // Handle API errors
            console.log('Error:', error);
            console.log('Status:', status);
            console.log('Response:', xhr.responseText);
        }

    });
    console.log('ajax end')

});

$('#tank_dip_form').on("submit", function(event) {
    event.preventDefault();
    // alert("Name")
    var formData = $(this).serialize();
    console.log(formData);
    $.ajax({
        url: "<?php echo $api_url; ?>update/dealer_tank_dip.php",
        type: 'POST',
        data: formData,
        beforeSend: function() {
            $('#dip_btn').val("Saving");
            document.getElementById("dip_btn").disabled = true;

        },
        success: function(data) {
            console.log(data)

            if (data != 1) {
                Swal.fire(
                    'Server Error!',
                    'Record Not Created',
                    'error'
                )
                $('#dip_btn').val("Save");
                document.getElementById("dip_btn").disabled = false;
            } else {


                setTimeout(function() {
                    Swal.fire(
                        'Success!',
                        'Record Created Successfully',
                        'success'
                    )
                    $('#tank_dip_form')[0].reset();

                    facilities();
                    $('#dip_btn').val("Save");
                    document.getElementById("dip_btn").disabled = false;
                    location.reload();


                }, 2000);

            }

        },
        error: function(xhr, status, error) {
            // Handle API errors
            console.log('Error:', error);
            console.log('Status:', status);
            console.log('Response:', xhr.responseText);
        }

    });

});

$('#targeted_from').on("submit", function(event) {
    event.preventDefault();
    // alert("Name")
    var formData = $(this).serialize();
    console.log(formData);
    $.ajax({
        url: "<?php echo $api_url; ?>create/create_dealers_product_target.php",
        type: 'POST',
        data: formData,
        beforeSend: function() {
            $('#target_btn').val("Saving");
            document.getElementById("target_btn").disabled = true;

        },
        success: function(data) {
            console.log(data)

            if (data != 1) {
                Swal.fire(
                    'Server Error!',
                    'Record Not Created',
                    'error'
                )
                $('#target_btn').val("Save");
                document.getElementById("target_btn").disabled = false;
            } else {


                setTimeout(function() {
                    Swal.fire(
                        'Success!',
                        'Record Created Successfully',
                        'success'
                    )
                    $('#targeted_from')[0].reset();

                    // facilities();
                    $('#target_btn').val("Save");
                    document.getElementById("target_btn").disabled = false;
                    location.reload();


                }, 2000);

            }

        },
        error: function(xhr, status, error) {
            // Handle API errors
            Swal.fire(
                'Server Error!',
                'Duplicate Month Entry',
                'error'
            )
            $('#target_btn').val("Save");
            document.getElementById("target_btn").disabled = false;
            console.log('Error:', error);
            console.log('Status:', status);
            console.log('Response:', xhr.responseText);
        }

    });

});

$('#productts_form').on("submit", function(event) {
    event.preventDefault();
    // alert("Name")
    var formData = $(this).serialize();
    console.log(formData);
    $.ajax({
        url: "<?php echo $api_url; ?>create/create_dealers_products.php",
        type: 'POST',
        data: formData,
        beforeSend: function() {
            $('#products_btn').val("Saving");
            document.getElementById("products_btn").disabled = true;

        },
        success: function(data) {
            console.log(data)

            if (data != 1) {
                Swal.fire(
                    'Server Error!',
                    'Record Not Created',
                    'error'
                )
                $('#products_btn').val("Save");
                document.getElementById("products_btn").disabled = false;
            } else {


                setTimeout(function() {
                    Swal.fire(
                        'Success!',
                        'Record Created Successfully',
                        'success'
                    )
                    $('#productts_form')[0].reset();

                    // facilities();
                    $('#products_btn').val("Save");
                    document.getElementById("products_btn").disabled = false;
                    location.reload();


                }, 2000);

            }

        },
        error: function(xhr, status, error) {
            // Handle API errors
            console.log('Error:', error);
            console.log('Status:', status);
            console.log('Response:', xhr.responseText);
        }

    });

});

$('#complaint_form').on("submit", function(event) {
    event.preventDefault();
    // alert("Name")
    var formData = $(this).serialize();
    console.log(formData);
    $.ajax({
        url: "<?php echo $api_url; ?>create/create_complaints.php",
        type: 'POST',
        data: formData,
        beforeSend: function() {
            $('#complaint_btn').val("Saving");
            document.getElementById("complaint_btn").disabled = true;

        },
        success: function(data) {
            console.log(data)

            if (data != 1) {
                Swal.fire(
                    'Server Error!',
                    'Record Not Created',
                    'error'
                )
                $('#complaint_btn').val("Save");
                document.getElementById("complaint_btn").disabled = false;
            } else {


                setTimeout(function() {
                    Swal.fire(
                        'Success!',
                        'Record Created Successfully',
                        'success'
                    )
                    $('#complaint_form')[0].reset();


                    $('#complaint_btn').val("Save");
                    document.getElementById("complaint_btn").disabled = false;
                    location.reload();


                }, 2000);

            }

        },
        error: function(xhr, status, error) {
            // Handle API errors
            console.log('Error:', error);
            console.log('Status:', status);
            console.log('Response:', xhr.responseText);
        }

    });

});

function add_dip(id, old_dip) {

    $('#tank_id').val(id)
    $('#old_dip').val(old_dip)
    $('#tank_dip_modal').modal('show')
}

function edit_product_price(id) {

    $('#row_id').val(id)
    $.ajax({
        url: "<?php echo $api_url; ?>get/get_dealer_specific_product.php?key=03201232927&dealer_id=" +
            decryptedId + "&id=" +
            id + "",
        method: "GET",
        dataType: "json",
        success: function(data) {
            data = data[0];
            console.log(data.indent_price)

            $('#products_name').val(data.name);
            $('#from_date').val(data.from);
            $('#to_date').val(data.to);
            $('#indent_price_pro').val(parseFloat(data.indent_price));
            $('#nozel_price_pro').val(parseFloat(data.nozel_price));
        }
    });
    $('#products_modal').modal('show')
}

function edit_dealers_users(id) {

    $('#dealer_user_id').val(id)
    $.ajax({
        url: "<?php echo $api_url; ?>get/get_dealers_users.php?key=03201232927&dealer_id=" + decryptedId +
            "&id=" +
            id + "",
        method: "GET",
        dataType: "json",
        success: function(data) {
            data = data[0];
            console.log(data.indent_price)

            $('#usernames').val(data.name);
            $('#user_email').val(data.email);
            $('#user_password').val(data.password);
            $('#user_phone').val(parseInt(data.contact));
        }
    });
    $('#users_modal').modal('show');
}

function edit_dealers_last_recon(nozel_id,recon_id,last_recon_reading,dealer_id,nozel_name,task_id,product_id) {

    $('#recon_id').val(recon_id);
    $('#nozel_id').val(nozel_id);
    $('#nozel_last_recon').val(last_recon_reading);
    $('#nozel_name').val(nozel_name);
    $('#last_task_id').val(task_id);
    $('#recon_product_id').val(product_id);
    
    $('#recon_update_modal').modal('show');
}

function get_ledger_backlog() {

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("<?php echo $api_url; ?>get/get_dealer_ledger_log.php?key=03201232927&dealer_id=" + decryptedId + "",
            requestOptions)
        .then(response => response.json())
        .then(response => {
            console.log(response)
            $('#ledger_logs').empty();
            if (response.length > 0) {


                $.each(response, function(index, data) {

                    var originalDate = data.created_at;
                    var dateObject = new Date(originalDate);

                    var day = dateObject.getDate(); // Extract the day (returns 25)
                    var month = dateObject.toLocaleString('en-US', {
                        month: 'short'
                    }); // Extract the month (returns "Oct")

                    console.log("Day:", day);
                    console.log("Month:", month);
                    $('#ledger_logs').append('<div class="row timeline-right">' +
                        '<div class="col-md-6">' +
                        ' <div class="timeline-icon">' +
                        '<i class="bx bx-briefcase-alt-2 text-primary h2 mb-0"></i>' +
                        ' </div>' +
                        '</div>' +
                        '<div class="col-md-6">' +
                        '<div class="timeline-box">' +
                        '<div class="timeline-date bg-primary text-center rounded">' +
                        '<h3 class="text-white mb-0 font-size-20">' + day + '</h3>' +
                        '<p class="mb-0 text-white-50">' + month + '</p>' +
                        '</div>' +
                        '<div class="event-content">' +
                        '<div class="timeline-text">' +
                        // '<h3 class="font-size-17">' + data.description + '</h3>' +
                        '<p class="mb-0 mt-2 pt-1 text-muted">Previous Ledger : ' + data.old_ledger +
                        '</p>' +

                        '<p class="mb-0 mt-2 pt-1 text-muted">Update Ledger : ' + data.new_ledger +
                        '</p>' +
                        '<p class="mb-0 mt-2 pt-1 text-muted">Description : ' + data.description +
                        '</p>' +
                        '<p class="mb-0 mt-2 pt-1 text-muted">Action Time : ' + data.created_at +
                        '<p class="mb-0 mt-2 pt-1 text-muted">Action By : ' + data.name +
                        '</p>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>');

                });
            } else {
                $('#ledger_logs').append('<div class="row timeline-right">' +
                    '<div class="col-md-6">' +
                    ' <div class="timeline-icon">' +
                    '<i class="bx bx-briefcase-alt-2 text-primary h2 mb-0"></i>' +
                    ' </div>' +
                    '</div>' +
                    '<div class="col-md-6">' +
                    '<div class="timeline-box">' +
                    '<div class="timeline-date bg-primary text-center rounded">' +
                    '<h3 class="text-white mb-0 font-size-20">---</h3>' +
                    '<p class="mb-0 text-white-50">--</p>' +
                    '</div>' +
                    '<div class="event-content">' +
                    '<div class="timeline-text">' +
                    '<h3 class="font-size-17">Log Not Found</h3>' +
                    '<p class="mb-0 mt-2 pt-1 text-muted">Previous Dip : --- </p>' +
                    '<p class="mb-0 mt-2 pt-1 text-muted">Update Dip : --- </p>' +
                    '<p class="mb-0 mt-2 pt-1 text-muted">Action Time : --- </p>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            }
            $('#ledger_backlog_modal').modal('show');
        })
        .catch(error => console.log('error', error));



}


function get_dip_backlog(id, old_dip) {

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("<?php echo $api_url; ?>get/get_dealers_tanks_dip_log.php?key=03201232927&tank_id=" + id + "", requestOptions)
        .then(response => response.json())
        .then(response => {
            console.log(response)
            $('#order_logs').empty();
            if (response.length > 0) {


                $.each(response, function(index, data) {

                    var originalDate = data.created_at;
                    var dateObject = new Date(originalDate);

                    var day = dateObject.getDate(); // Extract the day (returns 25)
                    var month = dateObject.toLocaleString('en-US', {
                        month: 'short'
                    }); // Extract the month (returns "Oct")

                    console.log("Day:", day);
                    console.log("Month:", month);
                    $('#order_logs').append('<div class="row timeline-right">' +
                        '<div class="col-md-6">' +
                        ' <div class="timeline-icon">' +
                        '<i class="bx bx-briefcase-alt-2 text-primary h2 mb-0"></i>' +
                        ' </div>' +
                        '</div>' +
                        '<div class="col-md-6">' +
                        '<div class="timeline-box">' +
                        '<div class="timeline-date bg-primary text-center rounded">' +
                        '<h3 class="text-white mb-0 font-size-20">' + day + '</h3>' +
                        '<p class="mb-0 text-white-50">' + month + '</p>' +
                        '</div>' +
                        '<div class="event-content">' +
                        '<div class="timeline-text">' +
                        // '<h3 class="font-size-17">' + data.description + '</h3>' +
                        '<p class="mb-0 mt-2 pt-1 text-muted">Previous Dip : ' + data.previous_dip +
                        '</p>' +

                        '<p class="mb-0 mt-2 pt-1 text-muted">Update Dip : ' + data.current_dip +
                        '</p>' +
                        '<p class="mb-0 mt-2 pt-1 text-muted">Description : ' + data.description +
                        '</p>' +
                        '<p class="mb-0 mt-2 pt-1 text-muted">Action Time : ' + data.created_at +
                        '</p>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>');

                });
            } else {
                $('#order_logs').append('<div class="row timeline-right">' +
                    '<div class="col-md-6">' +
                    ' <div class="timeline-icon">' +
                    '<i class="bx bx-briefcase-alt-2 text-primary h2 mb-0"></i>' +
                    ' </div>' +
                    '</div>' +
                    '<div class="col-md-6">' +
                    '<div class="timeline-box">' +
                    '<div class="timeline-date bg-primary text-center rounded">' +
                    '<h3 class="text-white mb-0 font-size-20">---</h3>' +
                    '<p class="mb-0 text-white-50">--</p>' +
                    '</div>' +
                    '<div class="event-content">' +
                    '<div class="timeline-text">' +
                    '<h3 class="font-size-17">Log Not Found</h3>' +
                    '<p class="mb-0 mt-2 pt-1 text-muted">Previous Dip : --- </p>' +
                    '<p class="mb-0 mt-2 pt-1 text-muted">Update Dip : --- </p>' +
                    '<p class="mb-0 mt-2 pt-1 text-muted">Action Time : --- </p>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            }
            $('#dip_backlog_modal').modal('show');
        })
        .catch(error => console.log('error', error));



}

function get_product_price_backlog(id) {

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    // console.log("<?php echo $api_url; ?>get/get_dealers_price_backlog.php?key=03201232927&dealer_id="+decryptedId+"&product_id=" +id + "");
    fetch("<?php echo $api_url; ?>get/get_dealers_price_backlog.php?key=03201232927&dealer_id=" + decryptedId +
            "&product_id=" +
            id + "", requestOptions)
        .then(response => response.json())
        .then(response => {
            console.log(response)
            if (response.length > 0) {
                product_price_backlog.clear().draw();

                $.each(response, function(index, data) {
                    product_price_backlog.row.add([

                        index + 1,
                        data.name,
                        data.from,
                        data.to,
                        data.indent_price,
                        data.nozel_price,
                        data.created_at,

                    ]).draw(false);

                });
            }
            $('#products_price_backlog_modal').modal('show');
        })
        .catch(error => console.log('error', error));



}

function view_order(id) {
    if (id != "") {
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        console.log("<?php echo $api_url; ?>get/get_main_sub_orders.php?key=03201232927&id=" + id + "");
        fetch("<?php echo $api_url; ?>get/get_main_sub_orders.php?key=03201232927&id=" + id + "", requestOptions)
            .then(response => response.json())
            .then(response => {
                console.log(response)
                if (response.length > 0) {
                    suborders_tables.clear().draw();

                    $.each(response, function(index, data) {
                        suborders_tables.row.add([
                            index + 1,
                            data.date,
                            data.name,
                            // data.name,
                            data.product_name,
                            data.rate,
                            data.quantity,
                            data.delivery_based,
                            data.consignee_name,
                            data.amount

                        ]).draw(false);

                    });
                }
                $('#sub_orders_main').modal('show');
            })
            .catch(error => console.log('error', error));

    }

}



function displaySurvey(id, inspection_id, dealer_id) {
    // Clear existing content
    $('#survey-container').empty();

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("<?php echo $api_url; ?>get/get_dealer_survey_response.php?key=03201232927&inspection_id=" + inspection_id +
            "&task_id=" + id + "&dealer_id=" + dealer_id + "", requestOptions)
        .then(response => response.json())
        .then(result => {
            console.log(result)
            create_div(result)
        })
        .catch(error => console.log('error', error));



}

function get_tas_sales_data(task_id, dealer_id) {
    // Clear existing content
    // $('#survey-container').empty();

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("<?php echo $api_url; ?>get/get_dealers_sales_performance.php?key=03201232927&task_id=" + task_id +
            "&dealer_id=" + dealer_id + "", requestOptions)
        .then(response => response.json())
        .then(result => {
            console.log(result)
            if (result.length > 0) {
                sale_table.clear().draw();

                $.each(result, function(index, data) {
                    sale_table.row.add([
                        index + 1,
                        data.name,
                        data.monthly_target,
                        // data.name,
                        data.target_achived,
                        data.differnce,
                        data.reason,
                        data.created_at

                    ]).draw(false);

                });
            }
            $('#sales_performance').modal('show');
        })
        .catch(error => console.log('error', error));



}

function get_task_wet_stock(task_id, dealer_id) {
    // Clear existing content
    // $('#survey-container').empty();

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("<?php echo $api_url; ?>get/get_dealer_wet_stock.php?key=03201232927&task_id=" + task_id +
            "&dealer_id=" + dealer_id + "", requestOptions)
        .then(response => response.json())
        .then(result => {
            console.log(result)
            if (result.length > 0) {
                wet_stock.clear().draw();

                $.each(result, function(index, data) {
                    wet_stock.row.add([
                        index + 1,
                        data.name,
                        data.lorry_no,
                        // data.name,
                        data.dip_old,
                        data.dip_new,
                        data.created_at

                    ]).draw(false);

                });
            }
            $('#wet_stock_modal').modal('show');
        })
        .catch(error => console.log('error', error));



}

function get_task_despensing_unit(task_id, dealer_id) {
    // Clear existing content
    // $('#survey-container').empty();

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("<?php echo $api_url; ?>get/get_dealer_task_despensing_unit.php?key=03201232927&task_id=" + task_id +
            "&dealer_id=" + dealer_id + "", requestOptions)
        .then(response => response.json())
        .then(result => {
            console.log(result)
            if (result.length > 0) {
                despensing_unit_table.clear().draw();

                $.each(result, function(index, data) {
                    despensing_unit_table.row.add([
                        index + 1,
                        data.product_name,
                        data.nozle_name,
                        // data.name,
                        data.old_reading,
                        data.new_reading,
                        data.created_at

                    ]).draw(false);

                });
            }
            $('#despensing_unit_modal').modal('show');
        })
        .catch(error => console.log('error', error));



}

function get_task_stock_variations(task_id, dealer_id) {
    // Clear existing content

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("<?php echo $api_url; ?>get/get_dealer_task_stock_variation.php?key=03201232927&task_id=" + task_id +
            "&dealer_id=" + dealer_id + "", requestOptions)
        .then(response => response.json())
        .then(result => {
            console.log(result)
            if (result.length > 0) {
                stock_variations_table.clear().draw();

                $.each(result, function(index, data) {
                    stock_variations_table.row.add([
                        index + 1,
                        data.name,
                        data.opening_stock,
                        data.purchase_during_inspection_period,
                        data.total_product_available_for_sale,
                        data.sales_as_per_meter_reading,
                        data.book_stock,
                        data.current_physical_stock,
                        data.gain_loss,
                        data.created_at,

                    ]).draw(false);

                });
            }
            $('#stock_variations_modal').modal('show');
        })
        .catch(error => console.log('error', error));



}

function create_div(response) {
    // Iterate through the API response
    response.forEach(function(section) {
        // Create a div for each section
        var $sectionDiv = $('<div class="col-md-4"></div>');

        // Append section name
        $sectionDiv.append('<h2>' + section.name + '</h2>');

        // Create a div for each question
        section.Questions.forEach(function(question) {
            // Create a div for each question
            var $questionDiv = $('<div class="question"></div>');

            // Append question text
            $questionDiv.append('<strong>' + question.question + '</strong><br>');

            // Append response
            if (question.response != 'No') {

                $questionDiv.append(
                    'Answer: <i class="fas fa-check text-success" style="font-size: 20px;font-weight: bold;"></i> <br>'
                );
            } else {
                if (question.cancel_file != null) {
                    $questionDiv.append(
                        'Answer: <i class="text-danger" style="font-size: 20px;font-weight: bold;">X</i><a href="<?php echo $api_url; ?>uploads/' +
                        question.cancel_file +
                        '" target="_blank" style="margin-left: 20px;"><i class="fas fa-image text-info" style="font-size: 20px;font-weight: bold;"></i></a><br>'
                    );
                } else {
                    $questionDiv.append(
                        'Answer: <i class="text-danger" style="font-size: 20px;font-weight: bold;">X</i><br>'
                    );
                }


            }

            // Append additional information if needed
            // For example, file, created_at, created_by, etc.

            // Append question div to the section
            $sectionDiv.append($questionDiv);
        });

        // Append section div to the survey container
        $('#survey-container').append($sectionDiv);
        $('#survey_modal').modal('show');
    });
}

function decryptId(encryptedId, key, iv) {
    var decrypted = CryptoJS.AES.decrypt(encryptedId, key, {
        iv: iv
    });
    return decrypted.toString(CryptoJS.enc.Utf8);
}

function deleteDatadispensor(id) {
    var result = confirm("Are you sure you want to delete this record?");

    // If the user confirms, proceed with deletion
    if (result) {
        // Call a function to delete the item


        var settings = {
            "url": "<?php echo $api_url; ?>delete/delete_despensor.php?key=03201232927&id=" + id + "",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax({
            ...settings,
            statusCode: {
                200: function(response) {
                    Swal.fire(
                        'Success!',
                        'Record Deleted Successfully',
                        'success'
                    )
                    setTimeout(function() {

                        location.reload();


                    }, 2000);

                },
                success: function(data) {
                    // Additional success handling if needed
                },
                error: function(xhr, textStatus, errorThrown) {
                    Swal.fire(
                        'Server Error!',
                        'Record Not Deleted',
                        'error'
                    )

                    // console.log("Request failed with status code: " + xhr.status);
                }
            }
        })
    }

}

function deleteDatatank(id) {
    var result = confirm("Are you sure you want to delete this record?");

    // If the user confirms, proceed with deletion
    if (result) {
        // Call a function to delete the item


        var settings = {
            "url": "<?php echo $api_url; ?>delete/delete_tank.php?key=03201232927&id=" + id + "",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax({
            ...settings,
            statusCode: {
                200: function(response) {
                    Swal.fire(
                        'Success!',
                        'Record Deleted Successfully',
                        'success'
                    )
                    setTimeout(function() {

                        location.reload();


                    }, 2000);

                },
                success: function(data) {
                    // Additional success handling if needed
                },
                error: function(xhr, textStatus, errorThrown) {
                    Swal.fire(
                        'Server Error!',
                        'Record Not Deleted',
                        'error'
                    )

                    // console.log("Request failed with status code: " + xhr.status);
                }
            }
        })
    }

}

function deleteDatanozzels(id) {
    var result = confirm("Are you sure you want to delete this record?");

    // If the user confirms, proceed with deletion
    if (result) {
        // Call a function to delete the item


        var settings = {
            "url": "<?php echo $api_url; ?>delete/delete_nozzels.php?key=03201232927&id=" + id + "",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax({
            ...settings,
            statusCode: {
                200: function(response) {
                    Swal.fire(
                        'Success!',
                        'Record Deleted Successfully',
                        'success'
                    )
                    setTimeout(function() {

                        location.reload();


                    }, 2000);

                },
                success: function(data) {
                    // Additional success handling if needed
                },
                error: function(xhr, textStatus, errorThrown) {
                    Swal.fire(
                        'Server Error!',
                        'Record Not Deleted',
                        'error'
                    )

                    // console.log("Request failed with status code: " + xhr.status);
                }
            }
        })
    }

}

// Call the function with your API response
// displaySurvey(apiResponse);
</script>


</html>