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
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
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



    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>


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

#main_data,
#sub_data,
.dynamic_table {
    border: 1px solid;
    border-collapse: collapse;
    margin-bottom: 20px;
}

#main_data th,
#sub_data th,
.dynamic_table th {
    border: 1px solid;
    padding: 8px;
    text-align: left;
    background-color: #f2f2f2;
}


#main_data td,
#sub_data td,
.dynamic_table td {
    border: 1px solid;
    padding: 8px;
    text-align: left;
}

.checkmark {
    color: green;
    /* Change color as needed */
}
</style>

<body>

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


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
                                <div class="card-body p-0">
                                    <div class="user-profile-img">
                                        <img src="" id="profile_img"
                                            class="profile-img profile-foreground-img rounded-top" alt="">
                                        <div class="overlay-content rounded-top">
                                            <div>
                                                <!-- <div class="user-nav p-3">
                                                    <div class="d-flex justify-content-end">
                                                        <div class="dropdown">
                                                            <a class="text-muted dropdown-toggle font-size-16" href="#"
                                                                role="button" data-bs-toggle="dropdown"
                                                                aria-haspopup="true">
                                                                <i
                                                                    class="bx bx-dots-vertical text-white font-size-20"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end user-profile-img -->


                                    <div class="p-4 pt-0">

                                        <div class="mt-n5 position-relative text-center border-bottom pb-3">
                                            <img id='profile_logo' src="" alt=""
                                                class="avatar-xl rounded-circle img-thumbnail">

                                            <div class="mt-3">
                                                <h5 class="mb-1" id="user">P2P</h5>

                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="table-responsive mt-3 border-bottom pb-3 col-6">
                                                <table
                                                    class="table align-middle table-sm table-nowrap table-borderless table-centered mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th class="fw-bold">
                                                                Subscription :</th>
                                                            <td class="text-muted" id='position'></td>
                                                        </tr>
                                                        <!-- end tr -->
                                                        <tr>
                                                            <th class="fw-bold">
                                                                Date / Time :</th>
                                                            <td class="text-muted" id='date'></td>
                                                        </tr>
                                                        <!-- end tr -->
                                                        <tr>
                                                            <th class="fw-bold">
                                                                Address :</th>
                                                            <td class="text-muted" id='location'></td>
                                                        </tr>
                                                        <!-- end tr -->

                                                        <tr>
                                                            <th class="fw-bold">Phone :</th>
                                                            <td class="text-muted" id='phone_no'></td>
                                                        </tr>
                                                        <!-- end tr -->

                                                        <tr>
                                                            <th class="fw-bold">Email :</th>
                                                            <td class="text-muted" id='email'>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="fw-bold">Ledger Balance :</th>
                                                            <td class="text-muted" id='ledger'>
                                                            </td>
                                                            <td>
                                                                <i class="fas fa-undo update_ledgers"
                                                                    id='update_ledgers'
                                                                    style="cursor:pointer;font-size: 20px;"></i>
                                                            </td>
                                                            <td>
                                                                <i class="fas fa-history backlog_ledgers"
                                                                    style="cursor:pointer;font-size: 20px;"
                                                                    onclick='get_ledger_backlog()'></i>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <th class="fw-bold">Setups :</th>
                                                            <td class="text-muted">
                                                                <a href="user_setup.php?id=<?php echo $_GET['id']; ?>"
                                                                    id="setup_tag" target="_blank"
                                                                    rel="noopener noreferrer"><i
                                                                        class="fas fa-users-cog"
                                                                        style="cursor:pointer;font-size: 20px;"></i></a>

                                                            </td>

                                                        </tr>

                                                        <!-- end tr -->
                                                    </tbody><!-- end tbody -->
                                                </table>


                                            </div>
                                            <div class="pt-2 col-6">


                                                <div id="map-canvas" style='height:300px'>



                                                </div>


                                            </div>
                                        </div>







                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Nozels Status</h5>
                                    </div>

                                    <div class="card-body pt-1" style="max-height: 310px; overflow:auto">
                                        <div class="mx-n4" id='currents_products' data-simplebar>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">ATGS</h5>
                                    </div>

                                    <div class="card-body pt-1" style="max-height: 310px; overflow:auto">
                                        <div class="mx-n4" id='atgs' data-simplebar>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                        <!-- <li class="nav-item">
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
                                        </li> -->

                                        <!-- <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#nozel_tanks_panel"
                                                role="tab">
                                                <span>Nozel's Tanks</span>
                                            </a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">
                                                <span>Reconcilation</span>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#post" role="tab">
                                                <span>Orders</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#complaint_tab" role="tab">
                                                <span>Complaint</span>
                                            </a>
                                        </li>


                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#lubes_order" role="tab">
                                                <span>Inspection</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#sale_performance"
                                                role="tab">
                                                <span>Sales Performance</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Tab content -->
                        <div class="tab-content">
                            <div class="tab-pane " id="overview" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <button id="add" class="btn btn-primary mb-3"> Add</button>
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

                                        <button id="add_dispenser" class="btn btn-primary mb-3"> Add</button>
                                        <br>

                                        <table id="dispenser_table" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.No</th>
                                                    <th class="text-center">Despensor</th>
                                                    <th class="text-center">Description</th>
                                                    <th class="text-center">Created At</th>


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

                                        <button id="addnozel" class="btn btn-primary mb-3"> Add</button>
                                        <br>

                                        <table id="myTable3" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.No</th>
                                                    <th class="text-center">Nozel</th>
                                                    <th class="text-center">Product</th>
                                                    <th class="text-center">Tank</th>
                                                    <th class="text-center">Dispenser</th>
                                                    <th class="text-center">Created At</th>


                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>



                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="nozel_tanks_panel" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">

                                        <button id="nozel_tanks_panel_add" class="btn btn-primary mb-3"> Add</button>
                                        <br>

                                        <table id="nozel_tanks_panel_table" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.No</th>
                                                    <th class="text-center">Nozel</th>
                                                    <th class="text-center">TanK</th>
                                                    <th class="text-center">Created At</th>


                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>



                                    </div>
                                </div>
                            </div>



                            <div class="tab-pane" id="messages" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="py-2">

                                            <div class="mx-n4 px-4" data-simplebar style="max-height: 360px;">

                                                <div class="row">
                                                    <div class="col-4">
                                                        <label for="">From Date</label>
                                                        <input type="date" class="form-control" name="" id="">
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="">To Date</label>
                                                        <input type="date" class="form-control" name="" id="">
                                                    </div>
                                                    <div class="col-4" style="display: flex;align-items: end;">
                                                        <input type="button" class="btn btn-primary " value="GET">
                                                    </div>
                                                </div>
                                                <div class="border-bottom py-3">
                                                    <div class="card-body">
                                                        <div id="chart" data-colors='["#1f58c7"]' class="apex-charts"
                                                            dir="ltr"></div>
                                                    </div>


                                                </div>

                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tanks_panel" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <button id="add_tanks" class="btn btn-primary mb-3"> Add</button>
                                        <br>

                                        <table id="tanks_table" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.No</th>
                                                    <th class="text-center">Tank #</th>
                                                    <th class="text-center">Product</th>
                                                    <th class="text-center">Min Limit</th>
                                                    <th class="text-center">Max Limit</th>
                                                    <th class="text-center">Current Dip</th>
                                                    <th class="text-center">Dip</th>
                                                    <th class="text-center">Dip Backlog</th>


                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>


                            </div>






                            <div class="tab-pane active" id="post" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mx-n3 px-3" data-simplebar style="max-height: 580px;">



                                            <div class="mt-4">
                                                <div class="table-responsive">
                                                    <table class="table table-nowrap table-hover mb-1" id="myTable">
                                                        <thead class="bg-light">
                                                            <tr>
                                                                <th class="text-center">S.No</th>
                                                                <th class="text-center">Date</th>
                                                                <th class="text-center">Site Name</th>
                                                                <th class="text-center">Type</th>
                                                                <th class="text-center">Depot</th>
                                                                <th class="text-center">Total Amount</th>
                                                                <!-- <th class="text-center">Ledger Amount</th> -->
                                                                <th class="text-center">Sales Order</th>
                                                                <th class="text-center">Sap Status</th>
                                                                <th class="text-center">Execution Status</th>
                                                                <th class="text-center">View Orders</th>
                                                                <th class="text-center">Track</th>
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
                            <div class="tab-pane" id="complaint_tab" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mx-n3 px-3" data-simplebar style="max-height: 580px;">

                                            <button id="add_complaints" class="btn btn-primary mb-3"> Add</button>
                                            <br>

                                            <div class="mt-4">
                                                <div class="table-responsive">
                                                    <table class="table table-nowrap table-hover mb-1"
                                                        id="complaint_table">
                                                        <thead class="bg-light">
                                                            <tr>
                                                                <th class="text-center">Date</th>
                                                                <th class="text-center">Name</th>
                                                                <th class="text-center">Email</th>
                                                                <th class="text-center">Phone</th>
                                                                <th class="text-center">Priority</th>
                                                                <th class="text-center">Subject</th>
                                                                <th class="text-center">Message</th>
                                                                <th class="text-center">Status</th>
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

                            <div class="tab-pane" id="users_tab" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mx-n3 px-3" data-simplebar style="max-height: 580px;">

                                            <button id="add_users" class="btn btn-primary mb-3"> Add</button>
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
                                                                <th class="text-center">Active/In-Active</th>
                                                                <th class="text-center">Edit</th>
                                                                <th class="text-center">Delete</th>
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
                            <div class="tab-pane" id="products" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mx-n3 px-3" data-simplebar style="max-height: 580px;">

                                            <button id="add_products" class="btn btn-primary mb-3"> Add</button>
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
                                                                <th class="text-center">Edit</th>
                                                                <th class="text-center">Log</th>
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
                            <div class="tab-pane" id="lubes_order" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mx-n3 px-3" data-simplebar style="max-height: 580px;">

                                            <div class="mt-4">
                                                <div class="table-responsive">
                                                    <table class="table table-nowrap table-hover mb-1" id="lubes_table">
                                                        <thead class="bg-light">
                                                            <tr>
                                                                <th class="text-center">S.No</th>
                                                                <th class="text-center">Date</th>
                                                                <th class="text-center">Complete Time</th>
                                                                <th class="text-center">User</th>
                                                                <th class="text-center">Dealer</th>
                                                                <th class="text-center">Type</th>
                                                                <th class="text-center">Status</th>
                                                                <th class="text-center">Inspection</th>
                                                                <th class="text-center">Sales Performance</th>
                                                                <th class="text-center">Measurement & Price</th>
                                                                <th class="text-center">Wet Stock Management</th>
                                                                <th class="text-center">Dispensing Unit Meter Reading
                                                                </th>
                                                                <th class="text-center">Stock Variaions</th>
                                                                <th class="text-center">Send Inspection Report on Email
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
                                    <!-- end card body -->
                                </div>
                            </div>

                            <div class="tab-pane" id="sale_performance" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mx-n3 px-3" data-simplebar style="max-height: 580px;">
                                            <button id="add_targets" class="btn btn-primary mb-3"> Add</button>
                                            <br>
                                            <div class="mt-4">
                                                <div class="table-responsive">
                                                    <table class="table table-nowrap table-hover mb-1"
                                                        id="targeted_table">
                                                        <thead class="bg-light">
                                                            <tr>
                                                                <th class="text-center">S.No</th>
                                                                <th class="text-center">Product Name</th>
                                                                <th class="text-center">Month</th>
                                                                <th class="text-center">Amount</th>
                                                                <th class="text-center">Descrition</th>

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
                                    <input type="hidden" name="dealer_id" value="">
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
                                    <input type="hidden" name="dealer_id" value="">
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

        <div id="survey_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Survey Response</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">

                                <button class="btn btn-info" id="exportBtn" style="float: right;">Export to
                                    PDF</button>
                            </div>

                        </div>
                        <div class="container-fluid" id="exporting">

                            <div class="row">
                                <div class="col-md-12">
                                    <img src="<?php echo $api_url . '' . $logo; ?>" alt="Image description"
                                        style="width: 100px;">

                                </div>
                                <div class="col-md-12">
                                    Time : <span id="survey_time"></span>
                                </div>

                                <div class="col-md-12">
                                    Site Name : <span id="survey_dealer_name"></span>
                                </div>
                            </div>
                            <div class="row" id="survey-container">

                            </div>

                        </div>


                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <div id="m_p_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="labelc">Measurement & Price</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container-fluid">
                            <div class="row my-3">
                                <div class="col-md-2">
                                    <button class="btn btn-info" id="expoert_measure_price" style="float: right;">Export
                                        to
                                        PDF</button>

                                </div>

                            </div>
                            <div class="row" id="maesurement_price_div">
                                <!-- Main Data Div -->
                                <div class="col-md-12">
                                    <table id="main_data">
                                        <thead>

                                            <th>Appreation Of Dealer </th>
                                            <th>Measure taken to overcome shortage</th>
                                            <th>Warning</th>
                                            <th>PMG ogra price</th>
                                            <th>PMG pump price</th>
                                            <th>PMG Variance</th>
                                            <th>HSD ogra price</th>
                                            <th>HSD pump price</th>
                                            <th>HSD Variance</th>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                                <div class="col-md-12">
                                    <table id="sub_data">
                                        <thead>

                                            <th>S # </th>
                                            <th>Dispenser</th>
                                            <th>PMG Accurate</th>
                                            <th>PMG Shorage (%)</th>
                                            <th>HSD Accurate</th>
                                            <th>HSD Shorage (%)</th>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>


                                <!-- Sub Data Div -->

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
                            <h5 id="labelc">Wet Stock Management</h5>
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
                            <h5 id="labelc">Dispensing Unit Meter Reading</h5>
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
                                    <input type="hidden" name="dealer_id" value="">
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
                                    <input type="hidden" name="dealer_id" value="">
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
                                            <input type="text" id="name" class="form-control" name='name'>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Product</label>
                                        <div class="col-md-10">
                                            <select name="nozzels_products" class="form-select" id="nozzels_products"
                                                onchange="product_tankss()">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Tanks</label>
                                        <div class="col-md-10">
                                            <select name="product_tank" class="form-select" id="product_tank">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input"
                                            class="col-md-2 col-form-label">Dispenser</label>
                                        <div class="col-md-10">
                                            <select name="product_dispenser" class="form-select" id="product_dispenser">

                                            </select>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-12" style="text-align: right;">
                                    <input type="hidden" name="user_id" id="user_id"
                                        value="<?php echo $_SESSION['user_id']; ?>">
                                    <input type="hidden" name="dealer_id" value="">
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
                                    <input type="hidden" name="dealer_id" value="">
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

                                <div class="col-4">
                                    <label for="">Min Limit</label>
                                    <input type="number" class="form-control" name="min_limit">
                                </div>
                                <div class="col-4">
                                    <label for="">Mmax Limit</label>
                                    <input type="number" class="form-control" name="max_limit">
                                </div>

                            </div>

                            <div class="col-12" style="text-align: right;">
                                <input type="hidden" name="user_id" id="user_id"
                                    value="<?php echo $_SESSION['user_id']; ?>">
                                <input type="hidden" name="dealer_id" value="">
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
                                <input type="hidden" name="dealer_id" value="">
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
                                    <input type="hidden" name="dealer_id" value="">
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
                                    <input type="hidden" name="dealer_id" value="">
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
                                    <input type="hidden" name="dealer_id" value="">
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
                            <h5 id="labelc">Customer Ledger</h5>
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
                                                <th class="text-center">Qty(Ltr)</th>
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

var decryptedId
$(document).ready(function() {
    var encryptedIdFromUrl = '<?php echo $_GET['id'];?>'; // Replace with the actual encrypted ID
    var key = 'Hamza Ansari';
    var iv = CryptoJS.lib.WordArray.random(16);

    // Decrypt the ID

    decryptedId = decryptId(encryptedIdFromUrl, key, iv);
    $('input[name="dealer_id"]').val(decryptedId);
    // Display the decrypted ID on the page or perform any other action
    // console.log('Encrypted ID from URL:', encryptedIdFromUrl);
    // console.log('Decrypted ID:', decryptedId);
    // alert(decryptedId)
    var encryptedId = encryptId(decryptedId, key, iv);

    $('#setup_tag').attr('href', 'user_setup.php?id=' + encodeURIComponent(encryptedId));


    fetchtable();
    order_details();
    orderlist();
    // facilities();
    // nozels();
    tanks_view();
    // nozels_tanks_form();
    // multiselect();
    // tank_select();
    dealers_complaints();
    dealers_products();
    // dealers_users();
    dealers_visits();
    get_dealer_target();
    // d_dispenser();
    // get_response_answers(1);
    // all_products();
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

                if (status == 'pending') {
                    status_value =
                        '<span id=' + data.id +
                        ' class="badge rounded-pill cursor-pointer bg-primary approved_check" data-key="t-new">' +
                        status + '</span>';
                } else if (status == 'Not Yet Processed') {
                    status_value =
                        '<span id=' + data.id +
                        ' class="badge rounded-pill cursor-pointer bg-info" data-key="t-new">Pending</span>';
                } else if (status == 'Completely Processed') {
                    status_value =
                        '<span id=' + data.id +
                        ' class="badge rounded-pill cursor-pointer bg-success" data-key="t-new">Released</span>';
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

                message = (data.delivered_status == 1) ? "Delivered" : "Not-Delivered";
                d_type = (data.type == 'ZDL') ? "Delivered" : "EX-Rack Self";
                track = (data.is_tracker == 1) ? "<a href='trip_board_salesOrder.php?no=" + data
                    .SaleOrder +
                    "' target='_blank'><i class='fas fa-route font-size-16 align-middle'></i></a>" : "----";

                table.row.add([
                    index + 1,
                    data.created_at,
                    data.name,
                    // data.name,
                    d_type,
                    data.consignee_name,
                    parseFloat(data.total_amount).toLocaleString(),
                    // data.legder_balance,
                    data.SaleOrder,
                    status_value,
                    message,
                    '<button type="button" id="view_order" name="view_order" onclick="view_order(' +
                    data.id +
                    ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-eye font-size-16 align-middle"></i></button>',
                    track,
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
    console.log("<?php echo $api_url; ?>get/get_dealers_inspections.php?id=" + decryptedId + "&key=03201232927");
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


                // if (data.current_status == 'Complete') {
                var emailer = '';
                if (data.email_status != 1) {
                    emailer = '<button type="button"  onclick="send_email(' + data.id +
                        ',' +
                        data.dealer_id +
                        ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-mail-bulk font-size-16 align-middle"></i></button>';
                } else {
                    emailer =
                        '<button type="button"  class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-mail-bulk font-size-16 align-middle text-danger"></i></button>';
                }

                var inspection_btn = '<button type="button"  onclick="displaySurvey(' + data.id +
                    ',' +
                    data.id + ',' + data.dealer_id + ', \'' + data.dealer_name +
                    '\')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button>';
                var inpection = (data.inspection == 1) ? inspection_btn : "---";

                var sales_performace_btn = '<button type="button" onclick="get_tas_sales_data(' +
                    data
                    .id + ',' + data
                    .dealer_id + ', \'' + data.dealer_name +
                    '\')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button>';
                var sales_performance = (data.sales_status == 1) ? sales_performace_btn : "---";

                var measurement_btn = '<button type="button" onclick="measure_price(' +
                    data
                    .id + ',' + data.id + ',' + data.dealer_id + ', \'' + data.dealer_name +
                    '\')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button>';
                var measurements = (data.measurement_status == 1) ? measurement_btn : "---";

                var wet_stock_btn = '<button type="button"  onclick="get_task_wet_stock(' + data
                    .id +
                    ',' + data
                    .dealer_id + ', \'' + data.dealer_name +
                    '\')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button>';
                var wet_stocks = (data.wet_stock_status == 1) ? wet_stock_btn : "---";

                var dispensing_unit_btn =
                    '<button type="button"  onclick="get_task_despensing_unit(' +
                    data.id +
                    ',' +
                    data.dealer_id + ', \'' + data.dealer_name +
                    '\')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button>';
                var dispensing_units = (data.dispensing_status == 1) ? dispensing_unit_btn : "---";

                var stock_variatins_btn =
                    '<button type="button"  onclick="get_task_stock_variations(' +
                    data.id +
                    ',' +
                    data.dealer_id + ', \'' + data.dealer_name +
                    '\')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button>';
                var stock_variations = (data.stock_variations_status == 1) ? stock_variatins_btn :
                    "---";

                lubes_table.row.add([


                    index + 1,
                        data.time,
                        data.visit_close_time,
                        data.name,
                        data.dealer_name,
                    data.type,
                    data.current_status,
                    inpection,
                    sales_performance,
                    measurements,
                    wet_stocks,
                    dispensing_units,
                    stock_variations,
                    (data.status == 1) ? emailer : "---",
                ]).draw(false);

                // } else {
                //     lubes_table.row.add([

                //         index + 1,
                //         data.time,
                //         data.name,
                //         data.current_status,
                //         '---',
                //         '---',
                //         '---',
                //         '---',
                //         '---',
                //         '---',
                //         '---',
                //     ]).draw(false);
                // }



            });

        })
        .catch(error => console.log('error', error));


}

function tanks_view() {

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
                        data.min_limit,
                        data.max_limit,
                        data.current_dip,
                        '<button type="button" id="tank_dip" name="tank_dip" onclick="add_dip(' +
                        data
                        .id + ',' + data.current_dip +
                        ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-plus-square font-size-16 align-middle"></i></button>',
                        '<button type="button" id="tank_dip" name="tank_dip" onclick="get_dip_backlog(' +
                        data
                        .id + ',' + data.current_dip +
                        ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-align-justify font-size-16 align-middle"></i></button>',


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
                    '<button type="button" id="tank_dip" name="tank_dip" onclick="edit_product_price(' +
                    data
                    .id +
                    ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-plus-square font-size-16 align-middle"></i></button>',
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
                    data.contact,
                    '<button type="button" id="tank_dip" name="tank_dip" onclick="edit_dealers_users(' +
                    data
                    .id +
                    ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-edit font-size-16 align-middle"></i></button>',
                    '<button type="button" id="tank_dip" name="tank_dip" onclick="get_product_price_backlog(' +
                    data
                    .id +
                    ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-trash-alt font-size-16 align-middle"></i></button>',


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
                    data.created_at


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
                    data.created_at


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

                    var originalDate = data.datetime;
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
                        // '<p class="mb-0 mt-2 pt-1 text-muted">Previous Ledger : ' + data.old_ledger +
                        // '</p>' +

                        '<p class="mb-0 mt-2 pt-1 text-muted">Update Ledger : ' + data.new_ledger +
                        '</p>' +
                        '<p class="mb-0 mt-2 pt-1 text-muted">Date : ' + data.datetime +
                        '<p class="mb-0 mt-2 pt-1 text-muted">Doc NO : ' + data.doc_no + '</p>' +
                        '<p class="mb-0 mt-2 pt-1 text-muted">Debit/Credit : ' + data.debit_no +
                        '</p>' +
                        '<p class="mb-0 mt-2 pt-1 text-muted">Document Type : ' + data.document_type +
                        '</p>' +
                        '<p class="mb-0 mt-2 pt-1 text-muted">Record Time : ' + data.created_at +
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
                            parseFloat(data.amount).toLocaleString(),

                        ]).draw(false);

                    });
                }
                $('#sub_orders_main').modal('show');
            })
            .catch(error => console.log('error', error));

    }

}



function displaySurvey(id, inspection_id, dealer_id, dealer_name) {
    // Clear existing content
    var currentDate = new Date();

    // Format the date as needed
    var formattedDate = currentDate.toLocaleString(); // Adjust the format based on your requirements

    // Display the formatted date
    $('#survey_time').text(formattedDate);
    $('#survey-container').empty();
    $('#survey_dealer_name').text(dealer_name);

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

function measure_price(id, inspection_id, dealer_id, dealer_name) {
    // Clear existing content
    var currentDate = new Date();

    // Format the date as needed
    var formattedDate = currentDate.toLocaleString();
    $('#labelc').text('Measurement & Price');
    $('#survey_time').text(formattedDate);

    $('#survey_dealer_name').text(dealer_name);
    $('#survey-container').empty();

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("<?php echo $api_url; ?>get/get_dealers_measurement_price_inspection.php?key=03201232927&inspection_id=" +
            inspection_id +
            "&task_id=" + id + "&dealer_id=" + dealer_id + "", requestOptions)
        .then(response => response.json())
        .then(result => {
            // displayMainData(result[0].main_data);
            // displaySubData(result[0].sub_data);
            var main_data = result[0].main_data;
            var sub_data = result[0].sub_data;
            var dis_0 = sub_data.length > 1 ? sub_data[0] : null;
            var dis_1 = sub_data.length > 1 ? sub_data[1] : null;
            var dis_2 = sub_data.length > 1 ? sub_data[2] : null;
            var dis_3 = sub_data.length > 1 ? sub_data[3] : null;
            var dis_4 = sub_data.length > 1 ? sub_data[4] : null;
            var dis_5 = sub_data.length > 1 ? sub_data[5] : null;
            var dis_6 = sub_data.length > 1 ? sub_data[6] : null;
            var dis_7 = sub_data.length > 1 ? sub_data[7] : null;
            console.log(sub_data)


            // var sub_row_data =  main_data.length > 1 ? main_data : null;
            // console.log(sub_row_data)
            console.log(main_data.appreation)


            var table_main = `
                <table class="dynamic_table" style="width:100%">
                    <tr>
                        <th>Appreciation Of Dealer if correct</th>
                        <th>${main_data.appreation}</th>
                        <th></th>
                        <th>OGRA Price</th>
                        <th>Pump Price</th>
                        <th>Variance</th>
                    </tr>
                    <tr>
                        <th>Measure taken to overcome shortage</th>
                        <td>${main_data.measure_taken}</td>
                        <th>PMG</th>
                        <td>${main_data.pmg_ogra_price}</td>
                        <td>${main_data.pmg_pump_price}</td>
                        <td>${main_data.pmg_variance}</td>
                    </tr>
                    <tr>
                        <th>Warning</th>
                        <td>${main_data.warning}</td>
                        <th>HSD</th>
                        <td>${main_data.hsd_ogra_price}</td>
                        <td>${main_data.hsd_pump_price}</td>
                        <td>${main_data.hsd_variance}</td>
                    </tr>
                    
                </table>`;

            var table_sub = `<h6 style="text-align: center;padding: 3px 11px;background: #f2f2f2;">Measurement & Price</h6>
                <table class="dynamic_table" style="width:100%">
                    <tr>
                        <th></th>
                        <th>${dis_0 ? dis_0.dispensor_name : '---'}</th>
                        <th>${dis_1 ? dis_1.dispensor_name : '---'}</th>
                        <th>${dis_2 ? dis_2.dispensor_name : '---'}</th>
                        <th>${dis_3 ? dis_3.dispensor_name : '---'}</th>
                        <th>${dis_4 ? dis_4.dispensor_name : '---'}</th>
                        <th>${dis_5 ? dis_5.dispensor_name : '---'}</th>
                        <th>${dis_6 ? dis_6.dispensor_name : '---'}</th>
                        <th>${dis_7 ? dis_7.dispensor_name : '---'}</th>
                       
                    </tr>
                    <tr>
                        <th>PMG Accurate (Y/N)</th>
                        <td>${dis_0 ? dis_0.pmg_accurate : '---'}</td>
                        <td>${dis_1 ? dis_1.pmg_accurate : '---'}</td>
                        <td>${dis_2 ? dis_2.pmg_accurate : '---'}</td>
                        <td>${dis_3 ? dis_3.pmg_accurate : '---'}</td>
                        <td>${dis_4 ? dis_4.pmg_accurate : '---'}</td>
                        <td>${dis_5 ? dis_5.pmg_accurate : '---'}</td>
                        <td>${dis_6 ? dis_6.pmg_accurate : '---'}</td>
                        <td>${dis_7 ? dis_7.pmg_accurate : '---'}</td>
                       
                    </tr>
                    <tr>
                        <th>Shortage %</th>
                        <td>${dis_0 ? dis_0.shortage_pmg : '---'}</td>
                        <td>${dis_1 ? dis_1.shortage_pmg : '---'}</td>
                        <td>${dis_2 ? dis_2.shortage_pmg : '---'}</td>
                        <td>${dis_3 ? dis_3.shortage_pmg : '---'}</td>
                        <td>${dis_4 ? dis_4.shortage_pmg : '---'}</td>
                        <td>${dis_5 ? dis_5.shortage_pmg : '---'}</td>
                        <td>${dis_6 ? dis_6.shortage_pmg : '---'}</td>
                        <td>${dis_7 ? dis_7.shortage_pmg : '---'}</td>
                       
                    </tr>
                    <tr>
                        <th>HSD Accurate (Y/N)</th>
                       <td>${dis_0 ? dis_0.hsd_accurate : '---'}</td>
                        <td>${dis_1 ? dis_1.hsd_accurate : '---'}</td>
                        <td>${dis_2 ? dis_2.hsd_accurate : '---'}</td>
                        <td>${dis_3 ? dis_3.hsd_accurate : '---'}</td>
                        <td>${dis_4 ? dis_4.hsd_accurate : '---'}</td>
                        <td>${dis_5 ? dis_5.hsd_accurate : '---'}</td>
                        <td>${dis_6 ? dis_6.hsd_accurate : '---'}</td>
                        <td>${dis_7 ? dis_7.hsd_accurate : '---'}</td>
                       
                    </tr>
                    <tr>
                        <th>Shortage %</th>
                        <td>${dis_0 ? dis_0.shortage_hsd : '---'}</td>
                        <td>${dis_1 ? dis_1.shortage_hsd : '---'}</td>
                        <td>${dis_2 ? dis_2.shortage_hsd : '---'}</td>
                        <td>${dis_3 ? dis_3.shortage_hsd : '---'}</td>
                        <td>${dis_4 ? dis_4.shortage_hsd : '---'}</td>
                        <td>${dis_5 ? dis_5.shortage_hsd : '---'}</td>
                        <td>${dis_6 ? dis_6.shortage_hsd : '---'}</td>
                        <td>${dis_7 ? dis_7.shortage_hsd : '---'}</td>
                       
                    </tr>
                    
                    
                </table>`;
            $('#survey-container').append(table_sub);

            $('#survey-container').append(table_main);

            $('#survey_modal').modal('show');
            // displayData(result[0].main_data, result[0].sub_data);
        })
        .catch(error => console.log('error', error));



}

function displayData(mainData, subData) {
    $('#main_data tbody').empty();
    $('#sub_data tbody').empty();

    // Main Data Section
    console.log(mainData)
    var newRow = '<tr><td>' + mainData.appreation + '</td><td>' + mainData.measure_taken + '</td><td>' + mainData
        .warning + '</td><td>' + mainData.pmg_ogra_price + '</td><td>' + mainData.pmg_pump_price + '</td><td>' +
        mainData.pmg_variance + '</td><td>' + mainData.hsd_ogra_price + '</td><td>' + mainData.hsd_pump_price +
        '</td><td>' + mainData.hsd_variance + '</td></tr>';
    $('#main_data tbody').append(newRow);;



    // Sub Data Section


    // Add table rows
    var ii = 1;
    $.each(subData, function(index, item) {
        console.log(item)

        var newRow = '<tr><td>' + ii + '</td><td>' + item.dispensor_name + '</td><td>' + item.pmg_accurate +
            '</td><td>' + item.shortage_pmg + '</td><td>' + item.hsd_accurate + '</td><td>' + item
            .shortage_hsd + '</td></tr>';
        $('#sub_data tbody').append(newRow);;
        ii++;
    });
    $('#m_p_modal').modal('show');
}

function get_tas_sales_data(task_id, dealer_id, dealer_name) {
    // Clear existing content
    // $('#survey-container').empty();
    var currentDate = new Date();

    // Format the date as needed
    var formattedDate = currentDate.toLocaleString(); // Adjust the format based on your requirements

    // Display the formatted date
    $('#labelc').text('Sales Performance');
    $('#survey_time').text(formattedDate);

    $('#survey_dealer_name').text(dealer_name);

    $('#survey-container').empty();
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("<?php echo $api_url; ?>get/get_dealers_sales_performance.php?key=03201232927&task_id=" +
            task_id +
            "&dealer_id=" + dealer_id + "", requestOptions)
        .then(response => response.json())
        .then(result => {
            console.log(result)
            if (result.length > 0) {
                var first = result.length > 1 ? result[0] : null;
                var second = result.length > 1 ? result[1] : null;

                var table = `<h6 style="text-align: center;padding: 3px 11px;background: #f2f2f2;">Sales Performance</h6>
                <table class="dynamic_table" style="width:100%">
            <tr>
                <th></th>
                <th>${first ? first.name : '---'}</th>
                <th>${second ? second.name : '---'}</th>
                <th>---</th>
                <th>---</th>
            </tr>
            <tr>
                <th>Target For the month (KL)</th>
                <td>${first ? first.monthly_target : '---'}</td>
                <td>${second ? second.monthly_target : '---'}</td>
                <td>---</td>
                <td>---</td>
            </tr>
            <tr>
            <th>Actual todate (KL)</th>
                <td>${first ? first.target_achived : '---'}</td>
                <td>${second ? second.target_achived : '---'}</td>
                <td>---</td>
                <td>---</td>
            </tr>
            <tr>
            <th>Variance (KL)</th>
                <td>${first ? first.differnce : '---'}</td>
                <td>${second ? second.differnce : '---'}</td>
                <td>---</td>
                <td>---</td>
            </tr>
            <tr>
            <th>Reason For Variation</th>
                <td>${first ? first.reason : '---'}</td>
                <td>${second ? second.reason : '---'}</td>
                <td>---</td>
                <td>---</td>
            </tr>
            
           
           
        </table>`;

                $('#survey-container').append(table);
                // sale_table.clear().draw();

                // $.each(result, function(index, data) {
                //     sale_table.row.add([
                //         index + 1,
                //         data.name,
                //         data.monthly_target,
                //         // data.name,
                //         data.target_achived,
                //         data.differnce,
                //         data.reason,
                //         data.created_at

                //     ]).draw(false);

                // });
            }
            $('#survey_modal').modal('show');
        })
        .catch(error => console.log('error', error));




}

function get_task_wet_stock(task_id, dealer_id, dealer_name) {
    // Clear existing content
    // $('#survey-container').empty();
    var currentDate = new Date();

    // Format the date as needed
    var formattedDate = currentDate.toLocaleString(); // Adjust the format based on your requirements

    // Display the formatted date
    $('#labelc').text('Wet Stock Management');
    $('#survey_time').text(formattedDate);

    $('#survey_dealer_name').text(dealer_name);
    $('#survey-container').empty();
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
                var t1_1 = result.length > 1 ? result[0] : null;
                var t1_2 = result.length > 1 ? result[1] : null;
                var t1_3 = result.length > 1 ? result[2] : null;
                var t1_4 = result.length > 1 ? result[3] : null;
                var sumPMG = 0;
                var sumHSD = 0;

                // Iterate through the JSON data
                $.each(result, function(index, item) {
                    // Calculate the difference (dip_new - dip_old)
                    var difference = parseInt(item.dip_new) - parseInt(item.dip_old);
                    // Check the product name
                    if (item.name === "PMG") {
                        sumPMG += difference; // Add the difference to PMG sum
                    } else if (item.name === "HSD") {
                        sumHSD += difference; // Add the difference to HSD sum
                    }
                });

                console.log("Sum of PMG: ", sumPMG);
                console.log("Sum of HSD: ", sumHSD);
                var PMGArray = [];
                var HSDArray = [];

                // Initialize arrays with empty strings
                for (var i = 0; i < 4; i++) {
                    PMGArray.push('---');
                    HSDArray.push('---');
                }

                // Iterate through the JSON data
                $.each(result, function(index, item) {
                    // Calculate the difference (dip_new - dip_old)
                    var difference = parseInt(item.dip_new) - parseInt(item.dip_old);

                    // Check the product name and store the difference in the corresponding array
                    if (item.name === "PMG") {
                        PMGArray[index] = difference
                            .toString(); // Convert to string to keep consistency with empty strings
                    } else if (item.name === "HSD") {
                        HSDArray[index] = difference
                            .toString(); // Convert to string to keep consistency with empty strings
                    }
                });

                console.log("PMG Array: ", PMGArray);
                console.log("HSD Array: ", HSDArray);

                var table = `<h6 style="text-align: center;padding: 3px 11px;background: #f2f2f2;">Wet Stock Management</h6>
                        <table class="dynamic_table" style="width:100%">
                    <tr>
                        <th>Date</th>
                        <th>Product</th>
                        <th>${t1_1 ? t1_1.lorry_no : '---'}</th>
                        <th>${t1_2 ? t1_2.lorry_no : '---'}</th>
                        <th>${t1_3 ? t1_3.lorry_no : '---'}</th>
                        <th>${t1_4 ? t1_4.lorry_no : '---'}</th>
                    </tr>
                    <tr>
                        <td>${t1_1 ? t1_1.created_at : '---'}</td>
                        <th>PMG</th>
                        <td>${PMGArray[0]}</td>
                        <td>${PMGArray[1]}</td>
                        <td>${PMGArray[2]}</td>
                        <td>${PMGArray[3]}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <th>HSD</th>
                        <td>${HSDArray[0]}</td>
                        <td>${HSDArray[1]}</td>
                        <td>${HSDArray[2]}</td>
                        <td>${HSDArray[3]}</td>
                    </tr>
                   
                    
                   
                   
                </table>
                <h6>Total Stock available</h6>
                        <table class="dynamic_table" style="width:100%">
                    <tr>
                        <th>PMG</th>
                        <td>${sumPMG}</td>
                        
                    </tr>
                    <tr>
                        <th>HSD</th>
                        <td>${sumHSD}</td>
                        
                    </tr>
                   
                   
                    
                   
                   
                </table>`;

                $('#survey-container').append(table);

                // wet_stock.clear().draw();

                // $.each(result, function (index, data) {
                //     wet_stock.row.add([
                //         index + 1,
                //         data.name,
                //         data.lorry_no,
                //         // data.name,
                //         data.dip_old,
                //         data.dip_new,
                //         data.created_at

                //     ]).draw(false);

                // });
            }
            $('#survey_modal').modal('show');
        })
        .catch(error => console.log('error', error));



}

function get_task_despensing_unit(task_id, dealer_id, dealer_name) {
    // Clear existing content
    // $('#survey-container').empty();
    var currentDate = new Date();

    // Format the date as needed
    var formattedDate = currentDate.toLocaleString();
    $('#labelc').text('Dispensing Unit Meter Reading');
    $('#survey_time').text(formattedDate);

    $('#survey_dealer_name').text(dealer_name);
    $('#survey-container').empty();
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("<?php echo $api_url; ?>get/get_dealer_task_despensing_unit.php?key=03201232927&task_id=" + task_id +
            "&dealer_id=" + dealer_id + "", requestOptions)
        .then(response => response.json())
        .then(result => {
            if (result.length > 0) {
                // despensing_unit_table.clear().draw();

                // $.each(result, function(index, data) {
                //     despensing_unit_table.row.add([
                //         index + 1,
                //         data.product_name,
                //         data.nozle_name,
                //         // data.name,
                //         data.old_reading,
                //         data.new_reading,
                //         data.created_at

                //     ]).draw(false);

                // });
                var sub_data = result;
                console.log(sub_data)
                var PMGArray = [];
                var HSDArray = [];

                // Initialize arrays with empty strings
                for (var i = 0; i < 8; i++) {
                    PMGArray.push('---');
                    HSDArray.push('---');
                }

                // Iterate through the JSON data
                $.each(result, function(index, item) {
                    // Calculate the difference (dip_new - dip_old)
                    var difference = item;

                    // Check the product name and store the difference in the corresponding array
                    if (item.product_name === "PMG") {
                        PMGArray[index] =
                            difference; // Convert to string to keep consistency with empty strings
                    } else if (item.product_name === "HSD") {
                        HSDArray[index] =
                            difference; // Convert to string to keep consistency with empty strings
                    }
                });

                console.log("PMG Array: ", PMGArray);
                console.log("HSD Array: ", HSDArray);

                var dis_0 = sub_data.length > 1 ? sub_data[0] : null;
                var dis_1 = sub_data.length > 1 ? sub_data[1] : null;
                var dis_2 = sub_data.length > 1 ? sub_data[2] : null;
                var dis_3 = sub_data.length > 1 ? sub_data[3] : null;
                var dis_4 = sub_data.length > 1 ? sub_data[4] : null;
                var dis_5 = sub_data.length > 1 ? sub_data[5] : null;
                var dis_6 = sub_data.length > 1 ? sub_data[6] : null;
                var dis_7 = sub_data.length > 1 ? sub_data[7] : null;

                var table_sub = `<h6 style="text-align: center;padding: 3px 11px;background: #f2f2f2;">Dispensing Unit Meter Reading</h6>
                <table class="dynamic_table" style="width:100%">
                    <tr>
                        <th></th>
                        <th></th>
                        <th><small>${dis_0 ? dis_0.dispensor_name + " (" + dis_0.nozle_name + ")" : '---'}</small></th>
                        <th><small>${dis_1 ? dis_1.dispensor_name + " (" + dis_1.nozle_name + ")" : '---'}</small></th>
                        <th><small>${dis_2 ? dis_2.dispensor_name + " (" + dis_2.nozle_name + ")" : '---'}</small></th>
                        <th><small>${dis_3 ? dis_3.dispensor_name + " (" + dis_3.nozle_name + ")" : '---'}</small></th>
                        <th><small>${dis_4 ? dis_4.dispensor_name + " (" + dis_4.nozle_name + ")" : '---'}</small></th>
                        <th><small>${dis_5 ? dis_5.dispensor_name + " (" + dis_5.nozle_name + ")" : '---'}</small></th>
                        <th><small>${dis_6 ? dis_6.dispensor_name + " (" + dis_6.nozle_name + ")" : '---'}</small></th>
                        <th><small>${dis_7 ? dis_7.dispensor_name + " (" + dis_7.nozle_name + ")" : '---'}</small></th>

                       
                    </tr>
                    <tr>
                        <th>Date - P</th>
                        <th></th>
                        <td>${PMGArray[0] != '---' ? PMGArray[0].new_reading : '---'}</td>
                        <td>${PMGArray[1] != '---' ? PMGArray[1].new_reading : '---'}</td>
                        <td>${PMGArray[2] != '---' ? PMGArray[2].new_reading : '---'}</td>
                        <td>${PMGArray[3] != '---' ? PMGArray[3].new_reading : '---'}</td>
                        <td>${PMGArray[4] != '---' ? PMGArray[4].new_reading : '---'}</td>
                        <td>${PMGArray[5] != '---' ? PMGArray[5].new_reading : '---'}</td>
                        <td>${PMGArray[6] != '---' ? PMGArray[6].new_reading : '---'}</td>
                        <td>${PMGArray[7] != '---' ? PMGArray[7].new_reading : '---'}</td>
                       
                    </tr>
                    <tr>
                        <th>Date - L</th>
                        <th></th>
                        <td>${PMGArray[0] != '---' ? PMGArray[0].old_reading : '---'}</td>
                        <td>${PMGArray[1] != '---' ? PMGArray[1].old_reading : '---'}</td>
                        <td>${PMGArray[2] != '---' ? PMGArray[2].old_reading : '---'}</td>
                        <td>${PMGArray[3] != '---' ? PMGArray[3].old_reading : '---'}</td>
                        <td>${PMGArray[4] != '---' ? PMGArray[4].old_reading : '---'}</td>
                        <td>${PMGArray[5] != '---' ? PMGArray[5].old_reading : '---'}</td>
                        <td>${PMGArray[6] != '---' ? PMGArray[6].old_reading : '---'}</td>
                        <td>${PMGArray[7] != '---' ? PMGArray[7].old_reading : '---'}</td>
                       
                    </tr>
                    <tr>
                        <th>Net Sales</th>
                        <th>PMG</th>
                        <td>${PMGArray[0] != '---' ? parseFloat(PMGArray[0].new_reading) - parseFloat(PMGArray[0].old_reading) : '---'}</td>
                        <td>${PMGArray[1] != '---' ? parseFloat(PMGArray[1].new_reading) - parseFloat(PMGArray[1].old_reading) : '---'}</td>
                        <td>${PMGArray[2] != '---' ? parseFloat(PMGArray[2].new_reading) - parseFloat(PMGArray[2].old_reading) : '---'}</td>
                        <td>${PMGArray[3] != '---' ? parseFloat(PMGArray[3].new_reading) - parseFloat(PMGArray[3].old_reading) : '---'}</td>
                        <td>${PMGArray[4] != '---' ? parseFloat(PMGArray[4].new_reading) - parseFloat(PMGArray[4].old_reading) : '---'}</td>
                        <td>${PMGArray[5] != '---' ? parseFloat(PMGArray[5].new_reading) - parseFloat(PMGArray[5].old_reading) : '---'}</td>
                        <td>${PMGArray[6] != '---' ? parseFloat(PMGArray[6].new_reading) - parseFloat(PMGArray[6].old_reading) : '---'}</td>
                        <td>${PMGArray[7] != '---' ? parseFloat(PMGArray[7].new_reading) - parseFloat(PMGArray[7].old_reading) : '---'}</td>

                       
                    </tr>
                    <tr>
                        <th>Date - P</th>
                        <th></th>
                        <td>${HSDArray[0] != '---' ? HSDArray[0].new_reading : '---'}</td>
                        <td>${HSDArray[1] != '---' ? HSDArray[1].new_reading : '---'}</td>
                        <td>${HSDArray[2] != '---' ? HSDArray[2].new_reading : '---'}</td>
                        <td>${HSDArray[3] != '---' ? HSDArray[3].new_reading : '---'}</td>
                        <td>${HSDArray[4] != '---' ? HSDArray[4].new_reading : '---'}</td>
                        <td>${HSDArray[5] != '---' ? HSDArray[5].new_reading : '---'}</td>
                        <td>${HSDArray[6] != '---' ? HSDArray[6].new_reading : '---'}</td>
                        <td>${HSDArray[7] != '---' ? HSDArray[7].new_reading : '---'}</td>

                    </tr>
                    <tr>
                        <th>Date - L</th>
                        <th></th>
                        <td>${HSDArray[0] != '---' ? HSDArray[0].old_reading : '---'}</td>
                        <td>${HSDArray[1] != '---' ? HSDArray[1].old_reading : '---'}</td>
                        <td>${HSDArray[2] != '---' ? HSDArray[2].old_reading : '---'}</td>
                        <td>${HSDArray[3] != '---' ? HSDArray[3].old_reading : '---'}</td>
                        <td>${HSDArray[4] != '---' ? HSDArray[4].old_reading : '---'}</td>
                        <td>${HSDArray[5] != '---' ? HSDArray[5].old_reading : '---'}</td>
                        <td>${HSDArray[6] != '---' ? HSDArray[6].old_reading : '---'}</td>
                        <td>${HSDArray[7] != '---' ? HSDArray[7].old_reading : '---'}</td>

                    </tr>
                    <tr>
                    <th>Net Sales</th>
                    <th>HSD</th>
                        <td>${HSDArray[0] != '---' ? parseFloat(HSDArray[0].new_reading) - parseFloat(HSDArray[0].old_reading) : '---'}</td>
                        <td>${HSDArray[1] != '---' ? parseFloat(HSDArray[1].new_reading) - parseFloat(HSDArray[1].old_reading) : '---'}</td>
                        <td>${HSDArray[2] != '---' ? parseFloat(HSDArray[2].new_reading) - parseFloat(HSDArray[2].old_reading) : '---'}</td>
                        <td>${HSDArray[3] != '---' ? parseFloat(HSDArray[3].new_reading) - parseFloat(HSDArray[3].old_reading) : '---'}</td>
                        <td>${HSDArray[4] != '---' ? parseFloat(HSDArray[4].new_reading) - parseFloat(HSDArray[4].old_reading) : '---'}</td>
                        <td>${HSDArray[5] != '---' ? parseFloat(HSDArray[5].new_reading) - parseFloat(HSDArray[5].old_reading) : '---'}</td>
                        <td>${HSDArray[6] != '---' ? parseFloat(HSDArray[6].new_reading) - parseFloat(HSDArray[6].old_reading) : '---'}</td>
                        <td>${HSDArray[7] != '---' ? parseFloat(HSDArray[7].new_reading) - parseFloat(HSDArray[7].old_reading) : '---'}</td>


                    </tr>
                    
                </table> <h6>P=Present</h6><h6>L=Last</h6>`;
                $('#survey-container').append(table_sub);
            }

            $('#survey_modal').modal('show');
        })
        .catch(error => console.log('error', error));



}

function get_task_stock_variations(task_id, dealer_id, dealer_name) {
    // Clear existing content
    var currentDate = new Date();

    // Format the date as needed
    var formattedDate = currentDate.toLocaleString(); // Adjust the format based on your requirements

    // Display the formatted date
    $('#labelc').text('Stock Variations');
    $('#survey_time').text(formattedDate);

    $('#survey_dealer_name').text(dealer_name);
    $('#survey-container').empty();

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
                var first = result[0];
                var second = result.length > 1 ? result[1] : null;

                var table = `<table class="dynamic_table" style="width:100%">
                    <tr>
                        <th></th>
                        <th></th>
                        <th>${first.name}</th>
                        <th>${second ? second.name : ''}</th>
                    </tr>
                    <tr>
                        <th>A</th>
                        <th>Opening Stock (Total of all tanks)</th>
                        <td>${first.opening_stock}</td>
                        <td>${second ? second.opening_stock : ''}</td>
                    </tr>
                    <tr>
                        <th>B</th>
                        <th>Purchase during inspection period</th>
                        <td>${first.purchase_during_inspection_period}</td>
                        <td>${second ? second.purchase_during_inspection_period : ''}</td>
                    </tr>
                    <tr>
                        <th>C=A+B</th>
                        <th>Total Product available for sale</th>
                        <td>${first.total_product_available_for_sale}</td>
                        <td>${second ? second.total_product_available_for_sale : ''}</td>
                    </tr>
                    <tr>
                        <th>D</th>
                        <th>Sales As Per Meter Reading (Nozzle Sale)</th>
                        <td>${first.sales_as_per_meter_reading}</td>
                        <td>${second ? second.sales_as_per_meter_reading : ''}</td>
                    </tr>
                    <tr>
                        <th>E=C-D</th>
                        <th>Book Stock</th>
                        <td>${first.book_stock}</td>
                        <td>${second ? second.book_stock : ''}</td>
                    </tr>
                    <tr>
                        <th>F</th>
                        <th>Current Physical Stock</th>
                        <td>${first.current_physical_stock}</td>
                        <td>${second ? second.current_physical_stock : ''}</td>
                    </tr>
                    <tr>
                        <th>G=F-E</th>
                        <th>Gain/Less</th>
                        <td>${first.gain_loss}</td>
                        <td>${second ? second.gain_loss : ''}</td>
                    </tr>
                </table>`;

                $('#survey-container').append(table);
            }

            $('#survey_modal').modal('show');
        })
        .catch(error => console.log('error', error));



}

function send_email(task_id, dealer_id) {

    if (task_id != "" && dealer_id != "") {



        let timerInterval;
        Swal.fire({
            title: "Email Sending !",
            html: "I will close in <b></b> milliseconds.",
            timer: 5000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
                const timer = Swal.getPopup().querySelector("b");
                timerInterval = setInterval(() => {
                    timer.textContent = `${Swal.getTimerLeft()}`;
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log("I was closed by the timer");
            }
        });





        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        fetch("<?php echo $api_url; ?>emailer/puma_inpection_reports.php?dealer_id=" + dealer_id + "&task_id=" +
                task_id + "",
                requestOptions)
            .then(response => response.text())
            .then(result => {
                console.log(result)
                if (result != 0) {
                    Swal.fire(
                        'Success!',
                        'Email Send Successfully',
                        'success'
                    )

                    setTimeout(function() {


                        location.reload();


                    }, 2000);

                } else {
                    Swal.fire(
                        'Server Error!',
                        'Email Not Send',
                        'error'
                    )
                }
            })
            .catch(error => console.log('error', error));
    } else {
        alert('ID Required')
    }

}

function create_div(response) {
    // Iterate through the API response
    var total_ques = 0;
    var r_yes = 0;
    var r_no = 0;
    var r_n_a = 0;

    var $sectionDiv = $('<div class="col-md-12"></div>');
    var table1 = $('<table class="dynamic_table">').attr('id', 'questions_toral');
    var tableHead1 = $('<thead>');
    var tableBody1 = $('<tbody>');

    var headerRow1 = $('<tr>');
    headerRow1.append($('<th>').text('Total Questions'));
    headerRow1.append($('<th>').text('Yes'));
    headerRow1.append($('<th>').text('No'));
    headerRow1.append($('<th>').text('N/A'));
    headerRow1.append($('<th>').text('%'));
    tableHead1.append(headerRow1);
    table1.append(tableHead1);
    response.forEach(function(section) {
        section.Questions.forEach(function(question) {
            console.log(question.response)
            total_ques++;
            if (question.response == 'Yes') {
                r_yes++;
            } else if (question.response == 'No') {
                r_no++;
            } else if (question.response == 'N/A') {
                r_n_a++;
            }
        })

        console.log('Ques ' + total_ques);
    })

    var percentage = ((total_ques - r_n_a) / total_ques) * 100;
    var row1 = $('<tr>');
    row1.append($('<td>').text(total_ques));
    row1.append($('<td>').text(r_yes));
    row1.append($('<td>').text(r_no));
    row1.append($('<td>').text(r_n_a));
    row1.append($('<td>').text(Math.round(percentage)));
    tableBody1.append(row1);

    table1.append(tableBody1);

    // Append table to the body of the document
    // $('body').append(table);

    $sectionDiv.append(table1);

    response.forEach(function(section) {
        //  $sectionDiv = $('<div class="col-md-12"></div>');
        // Create a div for each section
        var output = "";

        // Append section name
        var i = 1;


        // $sectionDiv.append('<h5>' + section.name + '</h5>');


        // Create a div for each question
        // output = '<div class="table-responsive"><style>table, th, td {border: 1px solid black;border-collapse: collapse;}th, td {padding:10px;}</style> ';





        var table = $('<table class="dynamic_table">').attr('id', 'questionsTable' + (i));
        var tableHead = $('<thead>');
        var tableBody = $('<tbody>');

        // Create table headers
        var headerRow = $('<tr>');
        headerRow.append($('<th>').text('SNo'));
        headerRow.append($('<th>').text(section.name));
        headerRow.append($('<th>').text('Yes'));
        headerRow.append($('<th>').text('No'));
        headerRow.append($('<th>').text('N/A'));
        headerRow.append($('<th>').text('Comments'));
        headerRow.append($('<th>').text('File'));
        tableHead.append(headerRow);
        table.append(tableHead);
        var j = 1;
        section.Questions.forEach(function(question) {
            // Create a div for each question
            // console.log(question);
            var row = $('<tr>');
            row.append($('<td>').text(j));
            row.append($('<td>').text(question.question));
            row.append($('<td>').html(question.response === 'Yes' ?
                '<i class="fas fa-check text-success" style="font-size: 20px;font-weight: bold;"></i>' :
                ''));
            row.append($('<td>').html(question.response === 'No' ?
                '<i class="fas fa-check text-success" style="font-size: 20px;font-weight: bold;"></i>' :
                ''));
            row.append($('<td>').html(question.response === 'N/A' ?
                '<i class="fas fa-check text-success" style="font-size: 20px;font-weight: bold;"></i>' :
                ''));
            row.append($('<td>').text(question.comment));
            row.append($('<td>').html(question.cancel_file === null ? '---' :
                '<a href="<?php echo $api_url; ?>uploads/' + question.cancel_file +
                '" target="_blank"><i class="fas fa-file-image text-success" style="font-size: 20px;font-weight: bold;"></i></a>'
            ));
            tableBody.append(row);


            // Append table body to table
            j++;
        });
        table.append(tableBody);

        // Append table to the body of the document
        // $('body').append(table);

        $sectionDiv.append(table);
        i++;
        // Append section div to the survey container
        $('#survey-container').append($sectionDiv);
    });
    $('#survey_modal').modal('show');
}

function getPDF() {
    var currentDate = new Date();

    // Format the date as needed
    var formattedDate = currentDate.toLocaleString();
    var element = document.getElementById('exporting');
    var opt = {
        margin: 0.5, // Decrease the margin
        filename: 'Inspection-Result-' + formattedDate + '.pdf',
        image: {
            type: 'text',
            quality: 0.98
        },
        html2canvas: {
            scale: 2 // Adjust scale for better resolution
        },
        jsPDF: {
            unit: 'in',
            format: 'A4',
            orientation: 'landscape',
            userUnit: 1.0 // Disable text selection
        }
    };

    html2pdf().from(element).set(opt).save();
    $('#exportBtn').prop('disabled', false);

    setTimeout(function() {
        $('#exportBtn').text('Export PDF');
    }, 2000);

};


// Attach click event to the export button
$('#exportBtn').on('click', function() {
    console.log("Click");
    $('#exportBtn').prop('disabled', true).text('Downloading');

    getPDF();
});

function getPDF2() {

    // var HTML_Width = $("#maesurement_price_div").width();
    var element = document.getElementById('maesurement_price_div');
    var opt = {
        margin: 1,
        filename: 'Measurement & Price Result.pdf',
        image: {
            type: 'jpeg',
            quality: 0.98
        },
        html2canvas: {
            scale: 2
        },
        jsPDF: {
            unit: 'in',
            format: 'letter',
            orientation: 'portrait'
        }
    };

    html2pdf().from(element).set(opt).save();
    setTimeout(function() {
        maesurement_price_div
        $('#expoert_measure_price').text('Export PDF');
    }, 2000);

};

$('#expoert_measure_price').on('click', function() {
    console.log("Click");
    $('#expoert_measure_price').prop('disabled', true).text('Downloading');

    getPDF2();
});

function decryptId(encryptedId, key, iv) {
    var decrypted = CryptoJS.AES.decrypt(encryptedId, key, {
        iv: iv
    });
    return decrypted.toString(CryptoJS.enc.Utf8);
}

function encryptId(originalId, key, iv) {
    var cipher = CryptoJS.AES.encrypt(originalId.toString(), key, {
        iv: iv
    });
    return cipher.toString();
}
// Call the function with your API response
// displaySurvey(apiResponse);
</script>


</html>