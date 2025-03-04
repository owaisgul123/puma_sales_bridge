<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        DEALERS DASHBOARD |
        <?php echo $_SESSION['user_name']; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="BYCO" name="description" />
    <meta content="P2P" name="author" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNyJWb04pByaU1CTmimoWNl3b86VV6qZ8&callback=initMap&libraries=places,drawing&v=weekly"
        defer></script>
    <!-- App favicon -->

    <?php include 'css_script.php'; ?>

    <style>
    #dropArea {
        border: 2px dashed #ccc;
        padding: 20px;
        text-align: center;
        position: relative;
    }

    #imageContainer {
        max-width: 100%;
        max-height: 200px;
        display: none;
        position: relative;
    }

    #imagePreview {
        max-width: 100%;
        max-height: 200px;
    }

    #removeButton {
        position: absolute;
        top: 10px;
        right: 10px;
        display: none;
        cursor: pointer;
        color: red;
        font-size: 24px;
    }

    #dropArea2 {
        border: 2px dashed #ccc;
        padding: 20px;
        text-align: center;
        position: relative;
    }

    #imageContainer2 {
        max-width: 100%;
        max-height: 200px;
        display: none;
        position: relative;
    }

    #imagePreview2 {
        max-width: 100%;
        max-height: 200px;
    }

    #removeButton2 {
        position: absolute;
        top: 10px;
        right: 10px;
        display: none;
        cursor: pointer;
        color: red;
        font-size: 24px;
    }

    .loader {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .loader-bar {
        position: relative;
        width: 70%;
        height: 30px;
        background: #ccc;
        border-radius: 10px;
        overflow: hidden;
    }

    .loader-percentage {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        background: #3498db;
        color: #fff;
        text-align: center;
        line-height: 30px;
        border-radius: 10px;
        transition: width 0.1s;
    }
    </style>
</head>


<body>

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <?php include 'header.php'; ?>
        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'sidebar.php'; ?>

        <!-- Left Sidebar End -->


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputEmail4">From</label>

                            <input type="date" class="form-control" name="fromdate" id="fromdate"
                                value="<?php echo date('Y-m-01') ?>">

                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4">To</label>

                            <input type="date" class="form-control" name="todate" id="todate"
                                value="<?php echo (new DateTime('last day of this month'))->modify('+1 day')->format('Y-m-d'); ?>">

                        </div>
                        <div class="col-md-3">

                            <input type="btn" class="btn btn-primary mt-3" name="btn_get" id="btn_get" value="Get"
                                onclick="fetchtable()">

                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputEmail4">Region</label>

                            <select data-live-search="true" class="form-control selectpicker" id="regions"
                                name="regions" required multiple>
                                <option value="">Select</option>



                            </select>

                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4">Province</label>

                            <select data-live-search="true" class="form-control selectpicker" id="province"
                                name="province" required multiple>
                                <option value="">Select</option>



                            </select>

                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4">City</label>

                            <select data-live-search="true" class="form-control selectpicker" id="city" name="city"
                                required multiple>
                                <option value="">Select</option>



                            </select>

                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4">District</label>

                            <select data-live-search="true" class="form-control selectpicker" id="district"
                                name="district" required multiple>
                                <option value="">Select</option>



                            </select>

                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4">Regional Manager</label>

                            <select data-live-search="true" class="form-control selectpicker" id="tm_user"
                                name="tm_user" required multiple>
                                <option value="">Select</option>



                            </select>

                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4">Territory Manager</label>

                            <select data-live-search="true" class="form-control selectpicker" id="asm_users"
                                name="asm_users" required multiple>
                                <option value="">Select</option>



                            </select>

                        </div>
                        <div class="col-md-3 d-none">
                            <label for="inputEmail4">Status</label>

                            <select data-live-search="true" class="form-control selectpicker" id="task_status_select"
                                name="task_status_select" required multiple>
                                <option value="Pending">Pending</option>
                                <option value="Overdue">Overdue</option>
                                <option value="Upcoming">Upcoming</option>
                                <option value="Complete">Complete</option>



                            </select>

                        </div>



                    </div>

                    <div class="row my-3">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar">
                                                <div class="avatar-title rounded bg-primary-subtle ">
                                                    <i class="bx bx-check-shield font-size-24 mb-0 text-primary"></i>
                                                </div>
                                            </div>

                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0 font-size-15">Dealers</h6>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 onclick="check_dealers_status('Verified')" class="mb-0 font-size-12"
                                                    style="cursor: pointer">
                                                    <small> Verified </small>: <span id="verified_dealers"
                                                        class="text-success">0</span>
                                                </h6>

                                                <h6 onclick="check_dealers_status('Not-Active')"
                                                    class="mb-0 font-size-12" style="cursor: pointer">
                                                    <small> Not-Active </small> : <span id="nonverified_dealers"
                                                        class="text-danger">0</span>
                                                </h6>
                                                <h6 onclick="check_dealers_status('Not-Active')"
                                                    class="mb-0 font-size-12" style="cursor: pointer">
                                                    <small> Login </small> : <span id="logined_dealers"
                                                        class="text-success">0</span>
                                                </h6>

                                            </div>

                                        </div>

                                        <div>

                                            <h4 class="mt-4 pt-1 mb-0 font-size-22" id="dealers_count">0</h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar">
                                                <div class="avatar-title rounded bg-primary-subtle ">
                                                    <i class="bx bx-check-shield font-size-24 mb-0 text-primary"></i>
                                                </div>
                                            </div>

                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0 font-size-15">Visit Task</h6>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 onclick="check_task_status('Pending')" class="mb-0 font-size-12"
                                                    style="cursor: pointer">
                                                    <small> Pending</small>: <span id="Pending_tasks"
                                                        class="text-warning">0</span>
                                                </h6>
                                                <h6 onclick="check_task_status('Complete')" class="mb-0 font-size-12"
                                                    style="cursor: pointer">
                                                    <small> Complete</small> : <span id="completed_tasks"
                                                        class="text-success">0</span>
                                                </h6>
                                                <h6 onclick="check_task_status('Overdue')" class="mb-0 font-size-12"
                                                    style="cursor: pointer">
                                                    <small> Overdue</small> : <span id="late_tasks"
                                                        class="text-danger">0</span>
                                                </h6>
                                                <h6 onclick="check_task_status('Upcoming')" class="mb-0 font-size-12"
                                                    style="cursor: pointer">
                                                    <small> Upcoming</small> : <span id="upcoming_tasks"
                                                        class="text-info">0</span>
                                                </h6>
                                                <h6 onclick="getting_listing('listing_users')" class="mb-0 font-size-12"
                                                    style="cursor: pointer">
                                                    <small> Visits Users</small> : <span id="vistes_users"
                                                        class="text-info">0</span>
                                                </h6>
                                            </div>



                                        </div>

                                        <div>
                                            <h4 class="mt-4 pt-1 mb-0 font-size-22" id="task_count">0</h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar">
                                                <div class="avatar-title rounded bg-primary-subtle ">
                                                    <i class="bx bx-check-shield font-size-24 mb-0 text-primary"></i>
                                                </div>
                                            </div>

                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0 font-size-15">Regional Manager</h6>
                                            </div>

                                            <div class="flex-grow-1 ms-3"
                                                onclick="getting_listing('TERRITORY MANAGER')">
                                                <svg style="float: right;" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </div>


                                        </div>

                                        <div>
                                            <h4 class="mt-4 pt-1 mb-0 font-size-22" id="rm_counts">0</h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar">
                                                <div class="avatar-title rounded bg-primary-subtle ">
                                                    <i class="bx bx-check-shield font-size-24 mb-0 text-primary"></i>
                                                </div>
                                            </div>

                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0 font-size-15">Territory Manager</h6>
                                            </div>
                                            <div class="flex-grow-1 ms-3" onclick="getting_listing('ASM')">
                                                <svg style="float: right;" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </div>


                                        </div>

                                        <div>
                                            <h4 class="mt-4 pt-1 mb-0 font-size-22" id="tm_counts">0</h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body" style="height: 400px;">
                                    <canvas id="region_chart"></canvas>

                                </div>
                            </div>


                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body" style="height: 400px;">
                                    <strong>Regional Manager Approve Status</strong>
                                    <canvas id="task_status"></canvas>

                                </div>
                            </div>


                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body" style="height: 400px;">
                                    <canvas id="rms_charts"></canvas>

                                </div>
                            </div>


                        </div>
                        <div class="col-md-4">
                            <div class="card">


                                <div class="card-body pt-1" style="height: 400px; overflow:auto">
                                    <h5 class="card-title mb-0">Regional Manager Approve Status</h5>
                                    <div class="mx-n4" id='atgs' data-simplebar>

                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 d-none">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="lineChart"></canvas>

                                </div>
                            </div>


                        </div>
                        <div class="col-md-6 d-none">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="city_chart"></canvas>

                                </div>
                            </div>


                        </div>
                        <div class="col-md-6 d-none">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="terr_chart"></canvas>

                                </div>
                            </div>


                        </div>
                        <div class="col-md-6 d-none">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="rm_chart"></canvas>

                                </div>
                            </div>


                        </div>

                        <div class="col-md-6 d-none">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="tm_chart"></canvas>

                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-6 d-none">
                            <div class="card">
                                <div class="card-body" style="height: 350px;">
                                    <strong>Task</strong>
                                    <canvas id="task_users"></canvas>

                                </div>
                            </div>


                        </div>
                        <!-- <div class="col-md-6">
                            <div class="card">
                                <div class="card-body" style="height: 350px;">
                                    <strong>REGIONAL MANAGER APPROVE STATUS</strong>
                                    <canvas id="task_status"></canvas>

                                </div>
                            </div>


                        </div> -->
                    </div>
                    <div class="card">

                        <div class="card-body" style="overflow: auto;">
                            <div id="loader" style="display: none;text-align: center;">Loading Data...</div>

                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">S. No</th>
                                        <th class="text-center">Site Name</th>
                                        <th class="text-center">Site Code</th>
                                        <th class="text-center">Is Verified</th>
                                        <th class="text-center">Regional Manager</th>
                                        <th class="text-center">Territory Manager</th>
                                        <th class="text-center">Contact</th>
                                        <th class="text-center">Location</th>
                                        <th class="text-center">Is-Login</th>
                                        <th class="text-center">City</th>
                                        <th class="text-center">Province</th>
                                        <th class="text-center">Region</th>


                                        <!-- <th class="text-center">Created Time</th> -->

                                        <!-- <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="row">
                        <div class="container-fluid">

                            <div class="card">
                                <div class="card-body">
                                    <h3>Task</h3>

                                    <table id="task_table" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S. No</th>
                                                <th>User</th>
                                                <th>Site Code</th>
                                                <th>Site Name</th>
                                                <th>Planned Date</th>
                                                <th>Dealer Sign</th>
                                                <th>Complete Time</th>
                                                <th>Regional Manager Approved Time</th>
                                                <th>Regional Manager Approval Status</th>
                                                <th>View Regional Manager Approval</th>
                                                <th>Visit Status</th>
                                                <th>Description</th>
                                                <th>Created At</th>


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
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <div id="listing_users" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
                data-bs-scroll="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                            <h5 class="modal-title" id="myModalLabel">
                                <h5 id="labelc"></h5>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid user_lists" id="tm_div">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Regional Manager List</h4>

                                        <div class="card">
                                            <div class="card-body">


                                                <div class="mx-n4 simplebar-scrollable-y" data-simplebar="init"
                                                    style="max-height: 421px;">
                                                    <div class="simplebar-wrapper" style="margin: 0px;">
                                                        <div class="simplebar-height-auto-observer-wrapper">
                                                            <div class="simplebar-height-auto-observer"></div>
                                                        </div>
                                                        <div class="simplebar-mask">
                                                            <div class="simplebar-offset"
                                                                style="right: 0px; bottom: 0px;">
                                                                <div class="simplebar-content-wrapper" tabindex="0"
                                                                    role="region" aria-label="scrollable content"
                                                                    style="height: auto; overflow: hidden scroll;">
                                                                    <div class="simplebar-content"
                                                                        style="padding: 0px;">
                                                                        <div class="border-bottom loyal-customers-box pt-2"
                                                                            id='apend_rm_users'>

                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="simplebar-placeholder"
                                                            style="width: 325px; height: 432px;"></div>
                                                    </div>
                                                    <div class="simplebar-track simplebar-horizontal"
                                                        style="visibility: hidden;">
                                                        <div class="simplebar-scrollbar"
                                                            style="width: 0px; display: none;"></div>
                                                    </div>
                                                    <div class="simplebar-track simplebar-vertical"
                                                        style="visibility: visible;">
                                                        <div class="simplebar-scrollbar"
                                                            style="height: 410px; transform: translate3d(0px, 0px, 0px); display: block;">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid user_lists" id="asm_div">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Territory Manager List</h4>
                                        <div class="card">
                                            <div class="card-body">


                                                <div class="mx-n4 simplebar-scrollable-y" data-simplebar="init"
                                                    style="max-height: 421px;">
                                                    <div class="simplebar-wrapper" style="margin: 0px;">
                                                        <div class="simplebar-height-auto-observer-wrapper">
                                                            <div class="simplebar-height-auto-observer"></div>
                                                        </div>
                                                        <div class="simplebar-mask">
                                                            <div class="simplebar-offset"
                                                                style="right: 0px; bottom: 0px;">
                                                                <div class="simplebar-content-wrapper" tabindex="0"
                                                                    role="region" aria-label="scrollable content"
                                                                    style="height: auto; overflow: hidden scroll;">
                                                                    <div class="simplebar-content"
                                                                        style="padding: 0px;">
                                                                        <div class="border-bottom loyal-customers-box pt-2"
                                                                            id='apend_tm_users'>

                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="simplebar-placeholder"
                                                            style="width: 325px; height: 432px;"></div>
                                                    </div>
                                                    <div class="simplebar-track simplebar-horizontal"
                                                        style="visibility: hidden;">
                                                        <div class="simplebar-scrollbar"
                                                            style="width: 0px; display: none;"></div>
                                                    </div>
                                                    <div class="simplebar-track simplebar-vertical"
                                                        style="visibility: visible;">
                                                        <div class="simplebar-scrollbar"
                                                            style="height: 410px; transform: translate3d(0px, 0px, 0px); display: block;">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid user_lists" id="viste_mode">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Visit Creation Users</h4>
                                        <div class="card">
                                            <div class="card-body">


                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table id="users_tasking" class="display"
                                                                style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">S.No</th>
                                                                        <th class="text-center">Users</th>
                                                                        <th class="text-center">Privilege</th>
                                                                        <th class="text-center">Total Sites</th>
                                                                        <th class="text-center">Total Visit</th>
                                                                        <th class="text-center">Pending</th>
                                                                        <th class="text-center">Overdue</th>
                                                                        <th class="text-center">Upcoming</th>
                                                                        <th class="text-center">Complete</th>
                                                                        <th class="text-center">Only visit not complete
                                                                        </th>
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

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <?php include 'footer.php'; ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->


    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- chat offcanvas -->
    <div class="offcanvas offcanvas-end w-75" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 id="offcanvasRightLabel">Create DEALERS</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <form method="post" id="insert_form" enctype="multipart/form-data">


                    <div class="form-row row mb-4">
                        <div class="form-group col-md-2">
                            <input type="hidden" name="id" id="hide_id" value="0">
                            <label for="inputEmail4">Site Name</label>
                            <span id="lorry_span">
                                <input type="text" class="form-control" id="dealer_name" name="dealer_name" required>

                            </span>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Dealer SAP #</label>
                            <span id="lorry_span">
                                <input type="text" class="form-control" id="dealer_sap_no" name="dealer_sap_no"
                                    required>

                            </span>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Email</label>
                            <span id="lorry_span">
                                <input type="email" class="form-control" id="emails" name="emails" required>

                            </span>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Password</label>
                            <span id="lorry_span">
                                <input type="text" class="form-control" id="password" name="password" required>

                            </span>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Contact #</label>
                            <span id="lorry_span">
                                <input type="number" class="form-control" id="call_no" name="call_no" required>

                            </span>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputAddress">Location</label>
                            <input type="text" class="form-control" id="location" name="location" required>


                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputAddress">Co-Ordinates</label>
                            <input type="text" class="form-control" id="lati" name="lati" required readonly>

                            <input type="hidden" name="type" id="type" required>


                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputAddress">Account Balance</label>
                            <input type="text" class="form-control" id="account_balanced" name="account_balanced"
                                required>


                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Subscription</label>

                            <select data-live-search="true" class="form-control selectpicker" id="housekeeping"
                                name="housekeeping" required>
                                <option value="">Select Housekeeping</option>
                                <option value="Platinum">Platinum</option>
                                <option value="Gold">Gold</option>
                                <option value="Bronze">Bronze</option>



                            </select>

                        </div>
                        <!-- <div class="form-group col-md-2">
                            <label for="inputEmail4">Number of Tank</label>

                            <select id="trip_qtys" onchange="creat_form()" class="form-control selectpicker">
                                <option value="0">1</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                                <option value="4">5</option>


                            </select>
                        </div> -->
                        <div class="form-group col-md-2 d-none">
                            <label for="inputAddress">GRM</label>

                            <select class="form-control" id="zm" name="zm" onchange='get_zm_tm(this.value)'>

                            </select>
                        </div>
                        <div class="form-group col-md-2 d-none">
                            <label for="inputAddress">REGIONAL MANAGER</label>

                            <select class="form-control" id="tm" name="tm" onchange='get_tm_asm(this.value)'>

                            </select>
                        </div>
                        <div class="form-group col-md-2 d-none">
                            <label for="inputAddress">TERRITORY MANAGER</label>

                            <select class="form-control" id="asm" name="asm">

                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputAddress">District</label>

                            <select class="form-control" id="district" name="district">

                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputAddress">City</label>

                            <select class="form-control" id="city" name="city">

                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputAddress">Region</label>

                            <select class="form-control" id="region" name="region">

                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputAddress">Province</label>

                            <select class="form-control" id="province" name="province">

                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputAddress">Depot</label>

                            <select class="form-control multi_select" id="depots" name="depots[]" multiple
                                placeholder="This is a placeholder" required>

                            </select>
                        </div>



                        <div class="form-group col-md-4">
                            <label for="fileInput" id="fileInputLabel">Banner</label> </br>
                            <input type="file" id="fileInput" name='banner_img' accept="image/*" required>
                            <input type="hidden" id="banner_img_hidden" name="banner_img_hidden">
                            <div id="dropArea">
                                <p>Drag and drop , or click to select an image. Image must be 1200x200</p>
                                <!-- <div id="imageContainer">
                                    <i id="removeButton" class="fas fa-times-circle"></i>
                                </div> -->
                                <img id="imagePreview" src="" alt="Image Preview">

                            </div>

                        </div>
                        <div class="form-group col-md-4">

                            <label for="fileInput2" id="fileInputLabel2">Logo </label></br>
                            <input type="file" id="fileInput2" accept="image/*" name='logo_img' required>
                            <input type="hidden" id="logo_img_hidden" name="logo_img_hidden">

                            <div id="dropArea2">
                                <p>Drag and drop , or click to select an image. Image must be 96x96 </p>
                                <!-- <div id="imageContainer2">
                                    <i id="removeButton2" class="fas fa-times-circle"></i>
                                </div> -->
                                <img id="imagePreview2" src="" alt="Image Preview">

                            </div>


                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="pac-input" class="form-control input" type="text"
                                        placeholder="Search Box" />
                                    <div id="map-canvas" style="width: 100%; height: 50vh; z-index: 0;" class="">

                                    </div>
                                </div>



                            </div>
                        </div>


                    </div>

                    <div class="col-12">
                        <input type="hidden" name="row_id" id="row_id" value="">
                        <input type="hidden" name="dealer_id" id="dealer_id" value="0">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'] ?>"
                            required>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-10 col-form-label"></label>
                            <div class="col-md-12 text-center">

                                <input class="btn rounded-pill btn-primary" type="submit" name="insert" id="insert"
                                    value="Save">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="rm_approval_form" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                    <h5 class="modal-title" id="myModalLabel">
                        <h5 id="labelc">REGIONAL MANAGER Approval Form</h5>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="container-fluid">
                        <div class="row" id='approval_reports'>


                        </div>


                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>

    <!-- JAVASCRIPT -->

    <?php include 'script_tags.php'; ?>
    <script src="js_cdn/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
    var table;
    var type;
    var subtype;
    var dealers_data = "";
    var task_data = "";
    $(document).ready(function() {
        $('.multi_select').select2();
        $('.selectpicker').select2();

        var check_pri = "<?php echo $_SESSION['privilege'] ?>";


        setTimeout(function() {
            if (table_access != "Admin") {
                // alert('Hamza');
                $('.dt-buttons').removeClass('d-none')
            }
        }, 3000);

        users_tasking = $('#users_tasking').DataTable({
            dom: 'Bfrtip',


            buttons: ['copy', 'excel', 'csv', 'pdf', 'print']


        });


        ///banner image start
        const dropArea = document.getElementById('dropArea');
        const fileInput = document.getElementById('fileInput');
        const fileInputLabel = document.getElementById('fileInputLabel');
        const imageContainer = document.getElementById('imageContainer');
        const imagePreview = document.getElementById('imagePreview');
        const removeButton = document.getElementById('removeButton');

        dropArea.addEventListener('dragover', (event) => {
            event.preventDefault();
            dropArea.style.border = '2px solid #000';
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.style.border = '2px dashed #ccc';
        });

        dropArea.addEventListener('drop', (event) => {
            event.preventDefault();
            dropArea.style.border = '2px dashed #ccc';

            const selectedFile = event.dataTransfer.files[0];
            processImage(selectedFile);
        });

        fileInput.addEventListener('change', () => {
            const selectedFile = fileInput.files[0];
            processImage(selectedFile);
        });

        // removeButton.addEventListener('click', () => {
        //     imageContainer.style.display = 'none';
        //     fileInput.value = ''; // Clear the selected file
        //     fileInputLabel.style.display = 'block';
        // });

        function processImage(selectedFile) {
            if (selectedFile) {
                const fileExtension = selectedFile.name.split('.').pop().toLowerCase();
                const resolution = {
                    width: 0,
                    height: 0
                };

                if (fileExtension === 'jpg' || fileExtension === 'jpeg' || fileExtension === 'png' ||
                    fileExtension === 'gif') {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = new Image();
                        img.src = e.target.result;

                        img.onload = function() {
                            resolution.width = img.width;
                            resolution.height = img.height;

                            if (resolution.width === 1200 && resolution.height === 200) {
                                imagePreview.src = e.target.result;
                                //    . imageContainer.style.display = 'block';
                                fileInputLabel.style.display = 'none';
                                // removeButton.style.display = 'block';
                            } else {
                                fileInput.value = '';
                                alert(
                                    'Invalid resolution. Please select an image with a resolution of 1200x200.'
                                );
                            }
                        };
                    };

                    reader.readAsDataURL(selectedFile);
                } else {
                    alert('Invalid file format. Please select an image file.');
                }
            }
        }
        ///banner image end
        /// logo image start

        const dropArea2 = document.getElementById('dropArea2');
        const fileInput2 = document.getElementById('fileInput2');
        const fileInputLabel2 = document.getElementById('fileInputLabel2');
        const imageContainer2 = document.getElementById('imageContainer2');
        const imagePreview2 = document.getElementById('imagePreview2');
        const removeButton2 = document.getElementById('removeButton2');

        dropArea2.addEventListener('dragover', (event) => {
            event.preventDefault();
            dropArea2.style.border = '2px solid #000';
        });

        dropArea2.addEventListener('dragleave', () => {
            dropArea2.style.border = '2px dashed #ccc';
        });

        dropArea2.addEventListener('drop', (event) => {
            event.preventDefault();
            dropArea2.style.border = '2px dashed #ccc';

            const selectedFile2 = event.dataTransfer.files[0];
            processImage2(selectedFile2);
        });

        fileInput2.addEventListener('change', () => {
            const selectedFile2 = fileInput2.files[0];
            processImage2(selectedFile2);
        });

        // removeButton2.addEventListener('click', () => {
        //     imageContainer2.style.display = 'none';
        //     fileInput2.value = ''; // Clear the selected file
        //     fileInputLabel2.style.display = 'block';
        // });

        function processImage2(selectedFile2) {
            if (selectedFile2) {
                const fileExtension2 = selectedFile2.name.split('.').pop().toLowerCase();
                const resolution2 = {
                    width: 0,
                    height: 0
                };

                if (fileExtension2 === 'jpg' || fileExtension2 === 'jpeg' || fileExtension2 === 'png' ||
                    fileExtension2 === 'gif') {
                    const reader2 = new FileReader();

                    reader2.onload = function(e) {
                        const img2 = new Image();
                        img2.src = e.target.result;

                        img2.onload = function() {
                            resolution2.width = img2.width;
                            resolution2.height = img2.height;

                            if (resolution2.width === 96 && resolution2.height === 96) {
                                imagePreview2.src = e.target.result;
                                // imageContainer2.style.display = 'block';
                                fileInputLabel2.style.display = 'none';
                                // removeButton2.style.display = 'block';
                            } else {
                                fileInput2.value = '';
                                alert(
                                    'Invalid resolution. Please select an image with a resolution of 96x96.'
                                );
                            }
                        };
                    };

                    reader2.readAsDataURL(selectedFile2);
                } else {
                    alert('Invalid file format. Please select an image file.');
                }
            }
        }

        ///logo image end





        table = $('#myTable').DataTable({
            dom: 'Bfrtip',


            buttons: ['copy', 'excel', 'csv', 'pdf', 'print']


        });
        task_table = $('#task_table').DataTable({
            dom: 'Bfrtip',


            buttons: ['copy', 'excel', 'csv', 'pdf', 'print']


        });
        // $('.selectpicker').on('change', function() {
        //     table.search(this.value).draw();
        // });

        // $('.selectpicker').on('change', function() {
        //     // Clear the array before updating it
        //     selectedValues = [];

        //     // Iterate over all select elements with class 'all_select'
        //     $('.selectpicker').each(function() {
        //         // Get the selected value of each select and push it into the array
        //         selectedValues.push($(this).val());
        //     });

        //     var searchString = selectedValues.join(' ');

        //     // Perform search and redraw the DataTable
        //     table.search(searchString).draw();
        //     // Log the array or perform other actions with it
        //     console.log(selectedValues);
        //     var rowCount = table.rows({
        //         search: 'applied'
        //     }).count();
        //     console.log(rowCount)

        //     $('#dealers_count').html(rowCount)



        // });



        // Event listener for dropdown changes
        $('.selectpicker').on('change', function() {
            filterTable();
        });

        fetchtable();
        multi_select();
        // facility_select();

        $('#add_btn').click(function() {

            $('#row_id').val("");
            $('#depots').val([]).trigger('change');


            document.getElementById("imagePreview2").src = ""
            document.getElementById("imagePreview").src = ""

            $('#insert_form')[0].reset();
            get_zm_tm(0);
            get_tm_asm(0)
            // alert("running")

        });

        $('#password_update_form').on("submit", function(event) {
            event.preventDefault();
            // alert("Name")

            let result = confirm("Do you want to proceed ?");
            if (result === true) {
                var data = new FormData(this);

                $.ajax({
                    url: "<?php echo $api_url; ?>update/update_dealers_password.php",
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: "POST",
                    data: data,
                    beforeSend: function() {
                        $('#update_pass').val("Saving");
                        document.getElementById("update_pass").disabled = true;

                    },
                    success: function(data) {
                        console.log(data)

                        if (data != 1) {
                            Swal.fire(
                                'Server Error!',
                                'Record Not Created',
                                'error'
                            )
                            $('#update_pass').val("Save");
                            document.getElementById("update_pass").disabled = false;
                        } else {


                            setTimeout(function() {
                                Swal.fire(
                                    'Success!',
                                    'Record Updated Successfully',
                                    'success'
                                )
                                $('#password_update_form')[0].reset();
                                $('#edit_password_modal').modal('hide');

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
            }

        });

        $('#insert_form').on("submit", function(event) {
            event.preventDefault();
            update_id = $('#dealer_id').val();


            if (update_id == 0) {

                var data = new FormData(this);

                $.ajax({
                    url: "<?php echo $api_url; ?>create/dealers.php",
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
                                $('#offcanvasRight').modal('hide');
                                fetchtable();
                                $('#insert').val("Save");
                                document.getElementById("insert").disabled =
                                    false;
                                location.reload();

                            }, 2000);

                        }

                    },

                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }

                });

            } else {
                var data = new FormData(this);


                $.ajax({
                    url: "<?php echo $api_url; ?>update/dealer_update.php",
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: "POST",
                    data: data,
                    beforeSend: function() {
                        var file_
                        $('#insert').val("Saving");
                        document.getElementById("insert").disabled = true;

                    },
                    success: function(data) {
                        console.log(data)

                        if (data != 1) {
                            Swal.fire(
                                'Server Error!',
                                'Record Not Updated',
                                'error'
                            )
                            $('#insert').val("Save");
                            document.getElementById("insert").disabled = false;
                        } else {


                            setTimeout(function() {
                                Swal.fire(
                                    'Success!',
                                    'Record Updated Successfully',
                                    'success'
                                )
                                document.getElementById("imagePreview2").src =
                                    ""
                                document.getElementById("imagePreview").src = ""
                                $('#insert_form')[0].reset();
                                $('#offcanvasRight').modal('hide');
                                fetchtable();
                                $('#insert').val("Save");
                                document.getElementById("insert").disabled =
                                    false;
                                location.reload();

                            }, 2000);

                        }

                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

        });

    })



    function fetchtable() {
        blocking();
        var fromdate = $('#fromdate').val();
        var todate = $('#todate').val();
        $('#loader').show();
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        console.log(
            "<?php echo $api_url; ?>get/dealers.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>"
        );
        fetch("<?php echo $api_url; ?>get/dealers.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>",
                requestOptions)
            .then(response => response.json())
            .then(response => {
                console.log(response)
                dealers_data = response;
                var verifiedCount = 0;
                var nonVerifiedCount = 0;
                var loginCount = 0;
                $('#dealers_count').html(response.length);
                table.clear().draw();
                $.each(response, function(index, data) {
                    $('#loader').hide();
                    table.row.add([
                        index + 1,
                        data.name,
                        data.sap_no,
                        data.indent_price == '1' ? 'Verified ' : 'Not-Active ',
                        data.tm_name,
                        data.asm_name,
                        data.contact,
                        data.location,
                        data.Nozel_price != '0' ? 'Logged-In' : 'Not-Login Yet ',
                        data.city,
                        data.province,
                        data.region
                    ]).draw();

                    if (data.indent_price == '1') {
                        verifiedCount++;
                    } else {
                        nonVerifiedCount++;
                    }
                    if (data.Nozel_price != '0') {
                        loginCount++;
                    }
                });
                // $.unblockUI();
                $('#verified_dealers').html(verifiedCount);
                $('#nonverified_dealers').html(nonVerifiedCount);
                $('#logined_dealers').html(loginCount);

                // check_data(response);
                chart_datas(response, 'lineChart', 'province', 'Province')
                chart_datas(response, 'region_chart', 'region', 'Region')
                chart_datas(response, 'city_chart', 'city', 'City')
                chart_datas(response, 'terr_chart', 'district', 'District')
                chart_datas(response, 'rm_chart', 'tm', 'REGIONAL MANAGER')
                chart_datas(response, 'tm_chart', 'asm', 'TERRITORY MANAGER')
                // chart_datas(response, 'depot_chart', 'actual_depot', 'Depot')
                // chart_datas(response, 'rural_urban', 'cat_2', 'Cat-2')

            })
            .catch(error => console.log('error', error));
        console.log(
            "<?php echo $api_url; ?>get/inspection/all_dealers_inspection.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>&from=" +
            fromdate + "&to=" + todate + "")
        fetch("<?php echo $api_url; ?>get/inspection/all_dealers_inspection.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>&from=" +
                fromdate + "&to=" + todate + "",
                requestOptions)
            .then(response => response.json())
            .then(response => {
                console.log(response)
                task_data = response;

                $('#task_count').html(response.length);
                var uniqueUsers = [];
                task_table.clear().draw();
                $.each(response, function(index, data) {
                    var dealer_sign = (data.dealer_sign != null) ?
                        '<a href="http://151.106.17.246:8080/pumabridgeApis/uploads/' + data.dealer_sign +
                        '" target="_blank"><i class="fas fa-file-image text-success" style="font-size: 20px;font-weight: bold;"></i></a>' :
                        "---";

                    var rm_approval = (data.approved_status != null) ? data.approved_status : "---";

                    if (rm_approval != '---') {
                        var rm_approval = (data.approved_status != 0) ?
                            '<button type="button"  onclick="view_rm_approved_report(' + data.task_id +
                            ',' +
                            data
                            .dealer_id +
                            ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button>' :
                            "---";

                    }
                    task_table.row.add([
                        index + 1,
                        '<a href="inspection_report.php?name=' + data.user_name +
                        '" target="_blank">' + data.user_name + '</a>',
                        data.sap_no,
                        data.dealer_name,
                        data.time,
                        dealer_sign,
                        (data.visit_close_time != null) ? data.visit_close_time : "---",
                        (data.approved_at != null) ? data.approved_at : "---",
                        data.approval_status,
                        rm_approval,
                        data.current_status,
                        // (data.status === '1') ? 'Complete' : 'Pending',
                        data.description,
                        data.task_create_time,
                    ]).draw(false);

                });


                rm_deatas(response);
                var pendingCount = 0;
                var completeCount = 0;
                var lateCount = 0;
                var upcomingCount = 0;

                // Loop through the array and count Pending and Complete records
                $.each(response, function(index, record) {
                    if (record.current_status === 'Pending') {
                        pendingCount++;
                    } else if (record.current_status === 'Complete') {
                        completeCount++;
                    } else if (record.current_status === 'Overdue') {
                        lateCount++;
                    } else if (record.current_status === 'Upcoming') {
                        upcomingCount++;
                    }
                });

                $('#Pending_tasks').text(pendingCount);
                $('#completed_tasks').text(completeCount);
                $('#late_tasks').text(lateCount);
                $('#upcoming_tasks').text(upcomingCount);

                task_datas(response, 'task_users', 'user_name', 'Users Task')
                task_datas(response, 'task_status', 'approval_status', '')


            })
            .catch(error => console.log('error', error));

        console.log(
            "<?php echo $api_url; ?>get/inspection/get_all_specific_visits_user.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>&from=" +
            fromdate + "&to=" + todate + "")
        fetch("<?php echo $api_url; ?>get/inspection/get_all_specific_visits_user.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>&from=" +
                fromdate + "&to=" + todate + "",
                requestOptions)
            .then(response => response.json())
            .then(response => {
                users_tasking.clear().draw();

                $('#vistes_users').html(response.length);
                $.each(response, function(index, data) {


                    // htmlContent = '<div class="container-fluid">' +
                    //     '<div class="row">' +
                    //     '<div class="col-md-4">' + data.user_name + '</div>' +
                    //     ' <div class="col-md-8">' +
                    //     '<div class="container-fluid">' +
                    //     '<div class="row">' +
                    //     '<div class="col-md-3"><small>Pending : ' + data.sum_pending + '</small></div>' +
                    //     '<div class="col-md-3"><small>Overdue : ' + data.sum_Late + '</small> </div>' +
                    //     '<div class="col-md-3"><small>Upcoming : ' + data.sum_Upcoming + '</small></div>' +
                    //     '<div class="col-md-3"><small>Complete : ' + data.sum_Complete + ' </small></div>' +
                    //     '</div>' +
                    //     '</div>' +
                    //     '</div>' +
                    //     '</div>' +
                    //     '</div>';

                    // Append the HTML content to the container
                    // $('#liat_vist_users').append(htmlContent);
                    var lang = data.privilege;
                    if (lang == 'ZM') {
                        lang = 'GRM';
                    } else if (lang == 'TERRITORY MANAGER') {
                        lang = 'REGIONAL MANAGER';

                    } else if (lang == 'Admin') {
                        lang = 'Admin';

                    } else if (lang == 'ASM') {
                        lang = 'TERRITORY MANAGER';

                    } else {
                        lang = data.privilege;

                    }
                    users_tasking.row.add([
                        index + 1,
                        (data.user_name),
                        lang,
                        data.total_dealers,
                        data.total_visits,
                        data.sum_pending,
                        data.sum_Late,
                        data.sum_Upcoming,
                        data.sum_Complete,
                        data.only_visited
                    ]).draw();
                });






            })
            .catch(error => console.log('error', error));

        console.log('<?php echo $api_url; ?>get/get_region_district_dealers.php?key=03201232927')
        $.ajax({
            url: '<?php echo $api_url; ?>get/get_region_district_dealers.php?key=03201232927',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var district = JSON.parse(data[0]['district']);

                var city = JSON.parse(data[0]['city']);
                var province = JSON.parse(data[0]['province']);
                var region = JSON.parse(data[0]['region']);
                var tm = JSON.parse(data[0]['tm']);
                var asm = JSON.parse(data[0]['asm']);

                console.log('regions')
                console.log(region)

                $('#rm_counts').text(tm.length);
                $('#tm_counts').text(asm.length);


                console.log(district)

                $('#district').empty();
                $('#district').append($('<option>', {
                    value: '',
                    text: 'Select District'
                }));
                $.each(district, function(index, item) {

                    $('#district').append($('<option>', {
                        value: item.district,
                        text: item.district
                    }));
                });


                $('#city').empty();
                $('#city').append($('<option>', {
                    value: '',
                    text: 'Select City'
                }));
                $.each(city, function(index, item) {

                    $('#city').append($('<option>', {
                        value: item.city,
                        text: item.city
                    }));
                });

                $('#province').empty();
                $('#province').append($('<option>', {
                    value: '',
                    text: 'Select'
                }));
                $.each(province, function(index, item) {

                    $('#province').append($('<option>', {
                        value: item.province,
                        text: item.province
                    }));
                });

                $('#regions').empty();
                $('#regions').append($('<option>', {
                    value: '',
                    text: 'Select'
                }));
                $.each(region, function(index, item) {

                    $('#regions').append($('<option>', {
                        value: item.region,
                        text: item.region
                    }));
                });

                $('#tm_user').empty();
                $('#tm_user').append($('<option>', {
                    value: '',
                    text: 'Select'
                }));
                $('#apend_rm_users').empty();
                $.each(tm, function(index, item) {

                    $('#tm_user').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));

                    var htmlContent = '<div class="d-flex align-items-center">';
                    htmlContent += '<div class="flex-grow-1 ms-3 overflow-hidden">';
                    htmlContent += '<h5 class="font-size-15 mb-1 text-truncate">' + item.name +
                        '</h5>';
                    htmlContent += '</div>';
                    htmlContent += '<div class="flex-shrink-0">';
                    htmlContent +=
                        '<h5 class="font-size-14 mb-0 text-truncate w-xs bg-light p-2 rounded text-center">';
                    htmlContent +=
                        '<a href="tm_dashboard_rebulid.php?id=' + item.id + '&pre=' + item
                        .privilege +
                        '" target="_blank" rel="noopener noreferrer"><i class="fas fa-file-import font-size-14 text-primary ms-1"></i></a> ';
                    htmlContent += '</h5>';
                    htmlContent += '</div>';
                    htmlContent += '</div>';

                    // Append the HTML content to the container
                    $('#apend_rm_users').append(htmlContent);
                });
                $('#asm_users').empty();
                $('#asm_users').append($('<option>', {
                    value: '',
                    text: 'Select'
                }));

                $('#apend_tm_users').empty();

                $.each(asm, function(index, item) {

                    $('#asm_users').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));

                    var htmlContent = '<div class="d-flex align-items-center">';
                    htmlContent += '<div class="flex-grow-1 ms-3 overflow-hidden">';
                    htmlContent += '<h5 class="font-size-15 mb-1 text-truncate">' + item.name +
                        '</h5>';
                    htmlContent += '</div>';
                    htmlContent += '<div class="flex-shrink-0">';
                    htmlContent +=
                        '<h5 class="font-size-14 mb-0 text-truncate w-xs bg-light p-2 rounded text-center">';
                    htmlContent +=
                        '<a href="asm_dashboard_rebuild.php?id=' + item.id + '&pre=' + item
                        .privilege +
                        '" target="_blank" rel="noopener noreferrer"><i class="fas fa-file-import font-size-14 text-primary ms-1"></i></a> ';
                    htmlContent += '</h5>';
                    htmlContent += '</div>';
                    htmlContent += '</div>';

                    // Append the HTML content to the container
                    $('#apend_tm_users').append(htmlContent);
                });



                // Refresh the Select2 element to display the newly added options
                // $('#zm').trigger('change.select2');
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });


    }

    function update_pass(id) {
        // alert(id)
        $('#dealer_row_id').val(id);
        $('#edit_password_modal').modal('show');
    }

    function multi_select() {
        $.ajax({
            url: '<?php echo $api_url; ?>get/depotes.php?key=03201232927',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Iterate through the data and append options to the select element
                $.each(data, function(index, item) {

                    $('#depots').append($('<option>', {
                        value: item.id,
                        text: item.consignee_name
                    }));
                });

                // Refresh the Select2 element to display the newly added options
                $('#mySelect').trigger('change.select2');
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });

        $.ajax({
            url: '<?php echo $api_url; ?>get/get_zm.php?key=03201232927',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Iterate through the data and append options to the select element
                $('#zm').append($('<option>', {
                    value: '',
                    text: 'Select GRM'
                }));
                $.each(data, function(index, item) {

                    $('#zm').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });

                // Refresh the Select2 element to display the newly added options
                $('#zm').trigger('change.select2');
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });

        $.ajax({
            url: '<?php echo $api_url; ?>get/get_zm.php?key=03201232927',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Iterate through the data and append options to the select element
                $('#products1').append($('<option>', {
                    value: '',
                    text: 'Select Nozel'
                }));
                $.each(data, function(index, item) {

                    $('#products1').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });

                // Refresh the Select2 element to display the newly added options
                $('#products1').trigger('change.select2');
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    function get_zm_tm(id) {
        // alert(id)
        $.ajax({
            url: '<?php echo $api_url; ?>get/individual_tm_of_zm.php?key=03201232927&zm_id=' + id + '',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data)
                // Iterate through the data and append options to the select element
                $('#tm').empty();
                $('#tm').append($('<option>', {
                    value: '',
                    text: 'Select REGIONAL MANAGER'
                }));
                $.each(data, function(index, item) {

                    $('#tm').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });

                // Refresh the Select2 element to display the newly added options
                // $('#zm').trigger('change.select2');
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    function get_tm_asm(id) {
        // alert(id)
        $.ajax({
            url: '<?php echo $api_url; ?>get/individual_asm_of_tm.php?key=03201232927&tm_id=' + id + '',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                // Iterate through the data and append options to the select element
                $('#asm').empty();
                $('#asm').append($('<option>', {
                    value: '',
                    text: 'Select TERRITORY MANAGER'
                }));
                $.each(data, function(index, item) {

                    $('#asm').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });

                // Refresh the Select2 element to display the newly added options
                // $('#zm').trigger('change.select2');
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });
    }


    function facility_select() {
        $.ajax({
            url: '<?php echo $api_url; ?>get/facilities_get.php?key=03201232927',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Iterate through the data and append options to the select element
                $.each(data, function(index, item) {
                    $('#facility').append($('<option>', {
                        value: item.id,
                        text: item.facilities
                    }));
                });

                // Refresh the Select2 element to display the newly added options
                $('#facility').trigger('change.select2');
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });
    }
    </script>

    <script>
    function creat_form() {
        var qty_f = document.getElementById("trip_qtys").value;
        // del_order

        // $("#dynamic_field").empty();
        $("#dynamic_field").find("tr:not(:nth-child(1)):not(:nth-child(1))").remove();

        // alert(qty_f)
        if (qty_f >= 10) {
            alert("overloaded");
        } else {
            // $("#dynamic_field").empty();
            for (var i = 1; i <= qty_f; i++) {
                $('#dynamic_field').append('<tr id="row' + i +


                    '"><td class="text-center">' + (i + 1) +
                    '</td> <td class="text-primary"><input type="text" class="form-control" id="consignee_code' +
                    (
                        i + 1) + '" name="lorry_no[]" onchange="get_lorry_data(' + (i + 1) +
                    ')"  required></td> <td> <select id="products" name="products[]" class="form-control "> <option value="">Select</option> <option value="HSD">HSD</option> <option value="PMG">PMG</option> <option value="HOBC">HOBC</option> </select></td> <td class=""><input type="text" class="form-control" id="consignee_name' +
                    (i + 1) +
                    '" name="min_limit[]"  required ></td> <td><input type="text" class="form-control" id="quantity' +
                    (i + 1) + '"" name="max_limit[]" onchange="cal_quan_price(' + (i + 1) +
                    ')"  required></td> <td><button type="button" name="remove" id="' +
                    i + '" value="' + i + '" class="btn btn-success btn_remove">X</button></td></tr>');
                // alert("Create " + i)
            }
            $(document).on('click', '.btn_remove', function() {
                i--;
                var button = $(this).val();
                // alert(button);
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
                var se = parseInt(button);
                se = se - 1;
                $('select[id=trip_qtys]').val(se);
                $('#trip_qtys').selectpicker('refresh');



            });


        }

    }

    function filterTable() {
        blocking();
        // Get selected values from dropdowns
        var selectedCity = $('#city').val();
        var selectedProvince = $('#province').val();
        var regions = $('#regions').val();
        var terri = $('#district').val();
        var rm_counts = $('#tm_user').val();
        var tm_counts = $('#asm_users').val();
        var task_status_select = $('#task_status_select').val();

        // Get other selected values similarly
        console.log(selectedCity)

        // Filter the dealers based on selected values
        // var filteredDealers = dealers_data.filter(function(dealer) {
        //     // console.log(dealer.city);
        //     return (
        //         dealer.city === selectedCity &&
        //         dealer.province === selectedProvince
        //         // Add conditions for other filters
        //     );
        // });

        var filteredData = dealers_data.filter(function(item) {
            // return selectedCity.includes(item.city);
            return (
                (selectedCity.length === 0 || selectedCity.includes(item.city)) &&
                (selectedProvince.length === 0 || selectedProvince.includes(item.province)) &&
                (regions.length === 0 || regions.includes(item.region)) &&
                (terri.length === 0 || terri.includes(item.district)) &&
                (rm_counts.length === 0 || rm_counts.includes(item.tm)) &&
                (tm_counts.length === 0 || tm_counts.includes(item.asm))
            );
        });
        var distinctTmCount = [...new Set(filteredData.map(dealer => dealer.tm))].length;

        // Calculate count of distinct 'sap_no' values
        var distinctASMCount = [...new Set(filteredData.map(dealer => dealer.asm))].length;
        $('#rm_counts').text(distinctTmCount);
        $('#tm_counts').text(distinctASMCount);

        // Output the results
        // console.log('Distinct TERRITORY MANAGER Count:', distinctTmCount);
        // console.log('Distinct ASM No Count:', distinctASMCount);
        var verifiedCount = 0;
        var nonVerifiedCount = 0;
        var loginCount = 0;
        console.log(filteredData)
        table.clear().draw();
        $.each(filteredData, function(index, data) {
            // $('#loader').hide();
            table.row.add([
                index + 1,
                data.name,
                data.sap_no,
                data.indent_price == '1' ? 'Verified ' : 'Not-Active ',
                data.tm_name,

                data.asm_name,
                data.contact,
                data.location,
                data.Nozel_price != '0' ? 'Logged-In' : 'Not-Login Yet ',
                data.city,
                data.province,
                data.region
            ]).draw();

            if (data.indent_price == '1') {
                verifiedCount++;
            } else {
                nonVerifiedCount++;
            }
            if (data.Nozel_price != '0') {
                loginCount++;
            }
        });
        // $.unblockUI();
        $('#dealers_count').text(filteredData.length);
        $('#verified_dealers').html(verifiedCount);
        $('#nonverified_dealers').html(nonVerifiedCount);
        $('#logined_dealers').html(loginCount);
        chart_datas(filteredData, 'lineChart', 'province', 'Province')
        chart_datas(filteredData, 'region_chart', 'region', 'Region')
        chart_datas(filteredData, 'city_chart', 'city', 'City')
        chart_datas(filteredData, 'terr_chart', 'district', 'District')
        chart_datas(filteredData, 'rm_chart', 'tm', 'REGIONAL MANAGER')
        chart_datas(filteredData, 'tm_chart', 'asm', 'TERRITORY MANAGER')


        var filteredTaskData = task_data.filter(function(item) {
            // return selectedCity.includes(item.city);
            return (
                (selectedCity.length === 0 || selectedCity.includes(item.city)) &&
                (selectedProvince.length === 0 || selectedProvince.includes(item.province)) &&
                (regions.length === 0 || regions.includes(item.region)) &&
                (terri.length === 0 || terri.includes(item.district)) &&
                (rm_counts.length === 0 || rm_counts.includes(item.tm)) &&
                (tm_counts.length === 0 || tm_counts.includes(item.asm)) &&
                (task_status_select.length === 0 || task_status_select.includes(item.current_status))
            );
        });

        $('#task_count').html(filteredTaskData.length);
        task_table.clear().draw();
        rm_deatas(filteredTaskData);
        $.each(filteredTaskData, function(index, data) {
            var dealer_sign = (data.dealer_sign != null) ?
                '<a href="<?php echo $api_url; ?>uploads/' + data.dealer_sign +
                '" target="_blank"><i class="fas fa-file-image text-success" style="font-size: 20px;font-weight: bold;"></i></a>' :
                "---";

            var rm_approval = (data.approved_status != null) ? data.approved_status : "---";

            if (rm_approval != '---') {
                var rm_approval = (data.approved_status != 0) ?
                    '<button type="button"  onclick="view_rm_approved_report(' + data.task_id +
                    ',' +
                    data
                    .dealer_id +
                    ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button>' :
                    "---";

            }
            task_table.row.add([
                index + 1,
                '<a href="inspection_report.php?name=' + data.user_name +
                '" target="_blank">' + data.user_name + '</a>',
                data.sap_no,
                data.dealer_name,
                data.time,
                dealer_sign,
                (data.visit_close_time != null) ? data.visit_close_time : "---",
                (data.approved_at != null) ? data.approved_at : "---",
                data.approval_status,
                rm_approval,
                data.current_status,
                // (data.status === '1') ? 'Complete' : 'Pending',
                data.description,
                data.task_create_time,

            ]).draw(false);
        });

        var pendingCount = 0;
        var completeCount = 0;
        var lateCount = 0;
        var upcomingCount = 0;

        // Loop through the array and count Pending and Complete records
        $.each(filteredTaskData, function(index, record) {
            if (record.current_status === 'Pending') {
                pendingCount++;
            } else if (record.current_status === 'Complete') {
                completeCount++;
            } else if (record.current_status === 'Overdue') {
                lateCount++;
            } else if (record.current_status === 'Upcoming') {
                upcomingCount++;
            }
        });

        $('#Pending_tasks').text(pendingCount);
        $('#completed_tasks').text(completeCount);
        $('#late_tasks').text(lateCount);
        $('#upcoming_tasks').text(upcomingCount);
        // table.clear().draw();
        // task_datas(filteredTaskData, 'region_chart', 'user_name', 'Users Task')
        task_datas(filteredTaskData, 'task_users', 'user_name', 'Users Task')
        task_datas(filteredTaskData, 'task_status', 'approval_status', '')


        // Update the DataTable with filtered data
        // var dataTable = $('#dealer-table').DataTable();
        // table.clear().rows.add(filteredData).draw();
    }


    let map;
    var circle;

    function initMap() {

        gmarkers = [];
        map = new google.maps.Map(document.getElementById("map-canvas"), {
            center: {
                lat: 30.3753,
                lng: 69.3451
            },
            zoom: 4,
            mapTypeId: "roadmap",

        });

        const input = document.getElementById("pac-input");
        const searchBox = new google.maps.places.SearchBox(input);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener("bounds_changed", () => {
            searchBox.setBounds(map.getBounds());
        });

        let markers = [];
        searchBox.addListener("places_changed", () => {
            const places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach((marker) => {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            const bounds = new google.maps.LatLngBounds();

            places.forEach((place) => {
                if (!place.geometry || !place.geometry.location) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                const icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25),
                };

                // Create a marker for each place.
                markers.push(
                    new google.maps.Marker({
                        map,
                        icon,
                        title: place.name,
                        position: place.geometry.location,
                    })
                );
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
        const drawingManager = new google.maps.drawing.DrawingManager({
            // drawingMode: google.maps.drawing.OverlayType.MARKER,
            drawingControl: true,
            drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_LEFT,
                drawingModes: [
                    google.maps.drawing.OverlayType.CIRCLE,
                    google.maps.drawing.OverlayType.POLYGON,
                ],
            },
            // markerOptions: {
            //   icon:
            //     "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
            // },
            circleOptions: {
                fillColor: "lightGreen",
                fillOpacity: 0.4,
                strokeWeight: 5,
                clickable: false,
                editable: true,
                zIndex: 1,
                draggable: true,
                geodesic: false,
            },
            polygonOptions: {
                fillColor: "lightGreen",
                fillOpacity: 0.4,
                strokeWeight: 5,
                clickable: false,
                editable: true,
                zIndex: 1,
                draggable: true,
                geodesic: false,
            },
        });
        drawingManager.setMap(map);
        google.maps.event.addListener(drawingManager, 'circlecomplete', onCircleComplete);
        // google.maps.event.addListener(drawingManager, 'polygoncomplete', polygon);
    }
    var circle_point = [];

    function onCircleComplete(shape) {
        if (shape == null || (!(shape instanceof google.maps.Circle))) return;

        if (circle != null) {
            circle.setMap(null);
            circle = null;
        }

        circle = shape;
        // console.log('radius', circle.getRadius());
        // console.log('lat', circle.getCenter().lat());
        // console.log('lng', circle.getCenter().lng());

        var radius = circle.getRadius();
        // console.log(radius);
        var cirlat = circle.getCenter().lat();
        // console.log(cirlat);
        var cirlng = circle.getCenter().lng();
        // console.log(cirlng);

        var time = new Date();
        var currentTime = time.toLocaleString();
        circle_point.push(cirlat + ", " + cirlng)
        console.log(circle_point)

        // alert(n);

        // alert(" lat => "+ cirlat +" long => "+ cirlng+"Radius => "+radius );
        document.getElementById("lati").value = circle_point;
        document.getElementById("type").value = 'circle';
        circle_point = [];

        google.maps.event.addListener(shape, 'center_changed', function() {
            var circle_point_edit = [];
            var lat = this.getCenter().lat();
            var lng = this.getCenter().lng();
            var radius = this.getRadius();
            circle_point_edit.push(lat + ", " + lng)
            console.log(circle_point_edit)
            document.getElementById("lati").value = circle_point_edit;
            document.getElementById("type").value = 'circle';


        })
        google.maps.event.addListener(shape, 'radius_changed', function() {
            var circle_point_edit = [];
            var lat = this.getCenter().lat();
            var lng = this.getCenter().lng();
            var radius = this.getRadius();
            circle_point_edit.push(lat + ", " + lng)
            console.log(circle_point_edit)
            document.getElementById("lati").value = circle_point_edit;
            document.getElementById("type").value = 'circle';


        })
        // document.getElementById("longi").value = cirlng;
        // document.getElementById("radius").value = radius;
    }
    var poly_points = [];

    function polygon(polygon) {
        var coordStr = "";
        for (var i = 0; i < polygon.getPath().getLength(); i++) {
            var co_string = polygon.getPath().getAt(i).toUrlValue(6);
            var spl_co = co_string.split(",");
            // console.log(polygon.getPath().getAt(i).toUrlValue(6))
            coordStr += spl_co[0] + "," + spl_co[1] + ";";
            // document.getElementById('coords').value = coordStr;

        }
        poly_points.push(coordStr)
        console.log(poly_points);
        var time = new Date();
        var currentTime = time.toLocaleString();
        document.getElementById("lati").value = poly_points;
        document.getElementById("type").value = 'polygon';

        poly_points = [];

        google.maps.event.addListener(polygon.getPath(), 'insert_at', function() {
            var coordStr_edit = "";
            var poly_points_edit = [];
            for (var i = 0; i < polygon.getPath().getLength(); i++) {
                var co_string = polygon.getPath().getAt(i).toUrlValue(6);
                var spl_co = co_string.split(",");
                console.log(polygon.getPath().getAt(i).toUrlValue(6))
                coordStr_edit += spl_co[0] + "," + spl_co[1] + ";";

            }
            poly_points_edit.push(coordStr_edit)
            console.log(poly_points_edit);
            document.getElementById("lati").value = poly_points_edit;
            document.getElementById("type").value = 'polygon';
        });

        google.maps.event.addListener(polygon.getPath(), 'remove_at', function() {
            var coordStr_edit = "";
            var poly_points_edit = [];
            for (var i = 0; i < polygon.getPath().getLength(); i++) {
                var co_string = polygon.getPath().getAt(i).toUrlValue(6);
                var spl_co = co_string.split(",");
                console.log(polygon.getPath().getAt(i).toUrlValue(6))
                coordStr_edit += spl_co[0] + "," + spl_co[1] + ";";

            }
            poly_points_edit.push(coordStr_edit)
            console.log(poly_points_edit);
            document.getElementById("lati").value = poly_points_edit;
            document.getElementById("type").value = 'polygon';
        });

        google.maps.event.addListener(polygon.getPath(), 'set_at', function() {
            var coordStr_edit = "";
            var poly_points_edit = [];
            for (var i = 0; i < polygon.getPath().getLength(); i++) {
                var co_string = polygon.getPath().getAt(i).toUrlValue(6);
                var spl_co = co_string.split(",");
                console.log(polygon.getPath().getAt(i).toUrlValue(6))
                coordStr_edit += spl_co[0] + "," + spl_co[1] + ";";

            }
            poly_points_edit.push(coordStr_edit)
            console.log(poly_points_edit);
            document.getElementById("lati").value = poly_points_edit;
            document.getElementById("type").value = 'polygon';
        });



    }


    function editData(id) {

        var settings = {
            "url": "<?php echo $api_url; ?>get/dealer_profile.php?key=03201232927&id=" + id + "",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax({
            ...settings,
            statusCode: {
                200: function(response) {
                    // console.log(response[0]['title']);
                    document.getElementById("imagePreview2").src = ""
                    document.getElementById("imagePreview").src = ""
                    $('#row_id').val(response[0]['id']);
                    document.getElementById('dealer_id').value = response[0]['id'];
                    document.getElementById('dealer_name').value = response[0]['name'];
                    document.getElementById('dealer_sap_no').value = response[0]['sap_no'];
                    document.getElementById('emails').value = response[0]['email'];
                    document.getElementById('call_no').value = response[0]['contact'];
                    document.getElementById('password').value = response[0]['password'];
                    document.getElementById('location').value = response[0]['location'];
                    document.getElementById('lati').value = response[0]['co-ordinates'];
                    document.getElementById('account_balanced').value = response[0]['acount'];
                    document.getElementById("housekeeping").value = response[0]['housekeeping'];
                    document.getElementById('banner_img_hidden').value = response[0]['banner'];
                    document.getElementById('logo_img_hidden').value = response[0]['logo'];
                    $('#district').val(response[0]['district']);
                    $('#city').val(response[0]['city']);
                    $('#region').val(response[0]['region']);
                    $('#province').val(response[0]['province']);

                    // var file1=document.getElementById('banner_img');
                    // var file2=document.getElementById('logo_img');
                    // alert()
                    // if(file1==""||file2==""){
                    //     file1.removeAttribute('required');
                    //     file2.removeAttribute('required');
                    // }
                    // alert();    
                    var filelogo = $('#fileInput2')[0];
                    var filebanner = $('#fileInput')[0];
                    if (filelogo.files.length === 0) {
                        filelogo.removeAttribute('required')

                    }
                    if (filebanner.files.length === 0) {
                        filebanner.removeAttribute('required')

                    }

                    var zm = response[0]['zm'];
                    var tm = response[0]['tm'];
                    get_zm_tm(zm);
                    get_tm_asm(tm)
                    $('#zm').val(response[0]['zm'])

                    setTimeout(function() {
                        $('#tm').val(response[0]['tm']);
                        $('#asm').val(response[0]['asm']);

                        console.log("Anonymous function called after 2 seconds");
                    }, 2000);


                    // alert(zm);
                    // alert(tm)

                    // document.getElementById("zm").value = response[0]['zm'];
                    // document.getElementById("tm").value = response[0]['tm'];
                    // document.getElementById("asm").value = response[0]['asm'];
                    document.getElementById("imagePreview2").src = "<?php echo $api_url; ?>uploads/" +
                        response[0]['logo'] + "";
                    document.getElementById("imagePreview").src = "<?php echo $api_url; ?>uploads/" +
                        response[0]['banner'] + "";
                    var settings = {
                        "url": "<?php echo $api_url; ?>get/dealer_depot.php?key=03201232927&dealer_id=" +
                            id + "",
                        "method": "GET",
                        "timeout": 0,
                    };
                    $.ajax({
                        ...settings,
                        statusCode: {
                            200: function(response) {
                                var defaultValues = [];
                                console.log(response)
                                for (var i = 0; i < response.length; i++) {
                                    defaultValues.push(response[i]['depot_id']);
                                    // alert(defaultValues[i]);
                                }
                                console.log(defaultValues)
                                $('#depots').val([]).trigger('change');

                                $('#depots').val(defaultValues).trigger('change');




                            }
                        }
                    })


                    // document.getElementById("asm").value =response[0]['housekeeping'];

                    // document.getElementById('account_balanced').value = response[0]['city'];
                    // document.getElementById('state').value = response[0]['state'];
                    // document.getElementById('country').value = response[0]['country'];
                    // document.getElementById('zip').value = response[0]['zipcode'];
                    // document.getElementById('hidden').value = response[0]['id'];
                    // parent.setChoiceByValue(response[0]['marketing_manager']);
                    // store.setChoiceByValue(response[0]['store_manager']);
                    // vendor.setChoiceByValue(response[0]['vendor_r']);
                    // parent_bu.setChoiceByValue(response[0]['parent_bu_id']);
                    // $("#parent").val(response[0]['marketing_manager']);
                    // $("#store").val(response[0]['store_manager']);
                    // $('#myModal').modal('show');
                    // document.getElementById("labelc").innerHTML = 'Update'


                },


                // Add more status code handlers as needed
            },
            success: function(data) {
                // Additional success handling if needed

            },
            error: function(xhr, textStatus, errorThrown) {
                Swal.fire(
                    'Server Error!',
                    '',
                    'error'
                )

                // console.log("Request failed with status code: " + xhr.status);
            }
        });

    }

    function line_charts(id, label, data, name) {
        var randomColor = generateRandomLightColor();

        var apexData = {
            labels: label,
            datasets: [{
                label: name,
                data: data,
                borderColor: randomColor,
                backgroundColor: randomColor,
                fill: true
            }]
        };
        var ctx = document.getElementById('' + id + '').getContext('2d');
        var existingChart = Chart.getChart(ctx);
        if (existingChart) {
            existingChart.destroy();
        }
        // Get the canvas element

        // Create the line chart
        var lineChart = new Chart(ctx, {
            type: 'bar',
            data: apexData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        type: 'category',
                        labels: apexData.labels
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
    // stacked_chart(1)
    function generateRandomLightColor() {
        var r = Math.floor(Math.random() * 150) + 100; // Red component biased towards higher values (100-255)
        var g = Math.floor(Math.random() * 150) + 100; // Green component biased towards higher values (100-255)
        var b = Math.floor(Math.random() * 150) + 100; // Blue component biased towards higher values (100-255)

        // Convert RGB values to hex
        var hexColor = '#' + ('0' + r.toString(16)).slice(-2) +
            ('0' + g.toString(16)).slice(-2) +
            ('0' + b.toString(16)).slice(-2);

        return hexColor;
    }


    function chart_datas(response, id, value, name) {
        var provinceCount = {};
        console.log(value)
        // Loop through the dealers data
        $.each(response, function(index, dealer) {
            if (value == 'region') {
                var province = dealer.region;

            } else if (value == 'province') {
                var province = dealer.province;

            } else if (value == 'city') {
                var province = dealer.city;

            } else if (value == 'district') {
                var province = dealer.district;

            } else if (value == 'tm') {
                var province = dealer.tm_name;

            } else if (value == 'asm') {
                var province = dealer.asm_name;

            }

            // Check if the province is already in the count, if not, initialize it to 1, otherwise increment
            provinceCount[province] = (provinceCount[province] || 0) + 1;
        });

        console.log(provinceCount);
        var provincesArray = Object.keys(provinceCount);
        var countsArray = Object.values(provinceCount);
        console.log(provincesArray);
        console.log(countsArray);

        line_charts(id, provincesArray, countsArray, name)
    }

    function rm_deatas(jsonData) {
        var labels = [];
        var datasets = {};
        $('#atgs').empty();

        // Count approval_status for each tm_name
        $.each(jsonData, function(index, item) {
            var tm_name = item.tm_name;
            var asm_name = item.asm_name;
            var approval_status = item.approval_status;

            // If tm_name not already in labels array, add it
            if (labels.indexOf(approval_status) === -1) {
                labels.push(approval_status);
            }

            // If dataset object for tm_name not already exists, initialize it
            if (!datasets.hasOwnProperty(tm_name)) {
                datasets[tm_name] = {};
            }

            // If dataset object for approval_status not already exists, initialize it
            if (!datasets[tm_name].hasOwnProperty(approval_status)) {
                datasets[tm_name][approval_status] = 0;
            }

            // Increment count for approval_status
            datasets[tm_name][approval_status]++;
        });

        // Convert datasets object to array
        var chartDatasets = [];
        // console.log('approvalData')
        // console.log(datasets)
        $.each(datasets, function(region, statusObject) {
            // Create list item HTML
            var listItemHtml = '<div class="border-bottom loyal-customers-box pt-2">' +
                '<div class="d-flex align-items-center">' +
                '<div class="flex-grow-1 ms-3 overflow-hidden">' +
                '<h5 class="font-size-15 mb-1 text-truncate">' + region + '</h5>' +
                '<ul>';

            // Loop through the nested object (statusObject) and add status/count pairs
            $.each(statusObject, function(status, count) {
                listItemHtml += '<li>' + status + ': ' + count + '</li>';
            });

            listItemHtml += '</ul>';
            listItemHtml += '</div>' +

                '</div>' +
                '</div>';

            // Append the list item HTML to the div with id "atgs"
            $('#atgs').append(listItemHtml);
        });
        $.each(datasets, function(tm_name, approvalData) {
            // console.log(tm_name)
            var dataValues = Object.values(approvalData);
            // console.log(dataValues)
            chartDatasets.push({
                label: tm_name,
                data: dataValues,
                backgroundColor: 'rgba(' + Math.floor(Math.random() * 256) + ',' + Math.floor(Math
                    .random() * 256) + ',' + Math.floor(Math.random() * 256) + ', 0.5)'
            });
        });

        // Create chart data
        var chartData = {
            labels: labels,
            datasets: chartDatasets
        };

        // Create chart options
        var chartOptions = {
            responsive: true,
            indexAxis: 'y',
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    stacked: true
                }
            }
        };

        // Get canvas element
        var ctx = document.getElementById('rms_charts').getContext('2d');
        var existingChart = Chart.getChart(ctx);
        if (existingChart) {
            existingChart.destroy();
        }
        // Create chart
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: chartOptions
        });
    }

    function task_datas(response, id, value, name) {
        var provinceCount = {};
        console.log(response)
        // Loop through the dealers data
        $.each(response, function(index, dealer) {
            if (value == 'region') {
                var province = dealer.region;

            } else if (value == 'province') {
                var province = dealer.province;

            } else if (value == 'city') {
                var province = dealer.city;

            } else if (value == 'district') {
                var province = dealer.district;

            } else if (value == 'tm') {
                var province = dealer.tm_name;

            } else if (value == 'asm') {
                var province = dealer.asm_name;

            } else if (value == 'user_name') {
                var province = dealer.user_name;

            } else if (value == 'approval_status') {
                var province = dealer.approval_status;

            }

            // Check if the province is already in the count, if not, initialize it to 1, otherwise increment
            provinceCount[province] = (provinceCount[province] || 0) + 1;
        });

        var pendingCount = 0;
        var completeCount = 0;
        var lateCount = 0;
        var upcomingCount = 0;

        // Loop through the array and count Pending and Complete records
        $.each(response, function(index, record) {
            if (record.current_status === 'Pending') {
                pendingCount++;
            } else if (record.current_status === 'Complete') {
                completeCount++;
            } else if (record.current_status === 'Overdue') {
                lateCount++;
            } else if (record.current_status === 'Upcoming') {
                upcomingCount++;
            }
        });

        $('#Pending_tasks').text(pendingCount);
        $('#completed_tasks').text(completeCount);
        $('#late_tasks').text(lateCount);
        $('#upcoming_tasks').text(upcomingCount);

        console.log(provinceCount);
        var provincesArray = Object.keys(provinceCount);
        var countsArray = Object.values(provinceCount);
        console.log(provincesArray);
        console.log(countsArray);

        user_task(id, provincesArray, countsArray, name)
    }
    // user_task();

    function user_task(id, leb, ser, name) {


        // var options = {
        //     series: ser,
        //     chart: {
        //         type: 'donut',
        //     },
        //     labels: leb,
        //     title: {
        //         text: name
        //     },
        //     responsive: [{
        //         breakpoint: 480,
        //         options: {
        //             chart: {
        //                 width: 300
        //             },
        //             legend: {
        //                 position: 'bottom'
        //             }
        //         }
        //     }]
        // };

        // var chart = new ApexCharts(document.querySelector("#task_users"), options);
        // chart.render();

        var data = {
            labels: leb,
            datasets: [{
                label: name,
                data: ser,
                backgroundColor: ['rgba(255, 99, 132, 0.7)', 'rgba(75, 192, 192, 0.7)',
                    'rgba(255, 205, 86, 0.7)'
                ],
                borderColor: ['rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)',
                    'rgba(255, 205, 86, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Get the canvas element
        var ctx = document.getElementById('' + id + '').getContext('2d');
        var existingChart = Chart.getChart(ctx);
        if (existingChart) {
            existingChart.destroy();
        }
        // Create the donut chart
        var donutChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutoutPercentage: 50, // Adjust the cutoutPercentage to create a donut
                legend: {
                    position: 'bottom'
                }
            }
        });
    };

    function getting_listing(user) {
        $('.user_lists').addClass('d-none')
        if (user == 'TERRITORY MANAGER') {
            $('#tm_div').removeClass('d-none')

        } else if (user == 'ASM') {
            $('#asm_div').removeClass('d-none')

        } else if (user == 'listing_users') {
            $('#viste_mode').removeClass('d-none')

        }
        $('#listing_users').modal('show');
    }

    function check_task_status(value) {
        // var searchText = $('#searchInput').val();
        task_table.search(value).draw();
    }

    function check_dealers_status(value) {
        console.log(value)
        // var searchText = $('#searchInput').val();
        table.search(value).draw();
    }

    function view_rm_approved_report(task_id, dealer_id) {

        if (task_id != "") {
            $.ajax({
                url: '<?php echo $api_url; ?>get/inspection/get_visit_tm_response.php?key=03201232927&task_id=' +
                    task_id + '',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data[0]);
                    var res = data[0];
                    // Iterate through the data and append options to the select element
                    $('#approval_reports').empty();
                    var sales_approval = (res.sales_approval === '1' ?
                        '<i class="fas fa-check text-success" style="font-size: 20px;font-weight: bold;"></i>' :
                        '<i class="fas fa-times text-danger" style="font-size: 20px;font-weight: bold;"></i>'
                    );
                    var measurement_approval = (res.measurement_approval === '1' ?
                        '<i class="fas fa-check text-success" style="font-size: 20px;font-weight: bold;"></i>' :
                        '<i class="fas fa-times text-danger" style="font-size: 20px;font-weight: bold;"></i>'
                    );
                    var wet_stock_approval = (res.wet_stock_approval === '1' ?
                        '<i class="fas fa-check text-success" style="font-size: 20px;font-weight: bold;"></i>' :
                        '<i class="fas fa-times text-danger" style="font-size: 20px;font-weight: bold;"></i>'
                    );
                    var dispensing_approval = (res.dispensing_approval === '1' ?
                        '<i class="fas fa-check text-success" style="font-size: 20px;font-weight: bold;"></i>' :
                        '<i class="fas fa-times text-danger" style="font-size: 20px;font-weight: bold;"></i>'
                    );
                    var stock_variations_approval = (res.stock_variations_approval === '1' ?
                        '<i class="fas fa-check text-success" style="font-size: 20px;font-weight: bold;"></i>' :
                        '<i class="fas fa-times text-danger" style="font-size: 20px;font-weight: bold;"></i>'
                    );
                    var inspection = (res.inspection === '1' ?
                        '<i class="fas fa-check text-success" style="font-size: 20px;font-weight: bold;"></i>' :
                        '<i class="fas fa-times text-danger" style="font-size: 20px;font-weight: bold;"></i>'
                    );
                    var comment = res.comment;
                    var rm_name = res.rm_name;
                    var approved_at = res.approved_at;

                    var div = `
                            <div class="col-md-12" >
                               <p>Approved By : ${rm_name}  </p>
                               <p>Approved At : ${approved_at}  </p>

                                </div><div class="col-md-12" >
                               <span> ${inspection} : Inspection Report </span>

                                </div>  
                                <div class="col-md-12" >
                               <span> ${sales_approval} : Sales Performance Report </span>

                                </div>
                                <div class="col-md-12" >
                               <span> ${measurement_approval} : Measurement & Price Report </span>

                                </div>
                                <div class="col-md-12" >
                               <span> ${wet_stock_approval} : Wet Stock Management Report </span>

                                </div>
                                <div class="col-md-12" >
                               <span> ${stock_variations_approval} : Stock Variaions Report </span>

                                </div>
                                <div class="col-md-12" >
                               <span> ${dispensing_approval} : Dispensing Unit Meter Reading Report </span>

                                </div>
                                <div class="col-md-12 mt-3" >
                               <span>Comments : ${comment} </span>

                                </div>`;
                    $('#approval_reports').html(div);

                    $('#rm_approval_form').modal('show');

                    // Refresh the Select2 element to display the newly added options
                    // $('#zm').trigger('change.select2');
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

    }

    function blocking() {
        $.blockUI({
            message: `
                    <div class='loader'>
                        <div class='loader-bar'>
                            <div class='loader-percentage'>0%</div>
                        </div>
                    </div>`,
            css: {
                border: 'none',
                backgroundColor: 'transparent',
                cursor: 'wait'
            },
            overlayCSS: {
                backgroundColor: '#aab5a3',
                opacity: 0.99,
                cursor: 'wait'
            }
        });

        let progress = 0;
        const estimatedLoadTime = 10000; // 3 seconds
        const intervalTime = estimatedLoadTime / 100; // Update every 1%

        const interval = setInterval(function() {
            if (progress < 100) {
                progress += 1; // Increment progress
                $('.loader-percentage').text(progress + '%').css('width', progress + '%'); // Update loader
            } else {
                clearInterval(interval);
                unblocking();
            }
        }, intervalTime);
    }

    function unblocking() {
        $.unblockUI();
    }
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>