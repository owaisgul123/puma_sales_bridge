<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Visits |
        <?php echo $_SESSION['user_name']; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="BYCO" name="description" />
    <meta content="P2P" name="author" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- App favicon -->

    <?php include 'css_script.php'; ?>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

</head>

<style>
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
</style>

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
        <?php include 'right_siebar.php'; ?>

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
                    <!-- <div class="row">

                        <div class="col-md-6">
                            <button class="btn btn-soft-primary waves-effect waves-light" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" id="add_btn"
                                aria-controls="offcanvasRight"><i
                                    class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer"></i>Add</button>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-md-4">
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
                                                <h6 class="mb-0 font-size-15">Total Visits</h6>
                                            </div>



                                        </div>

                                        <div>
                                            <h4 class="mt-4 pt-1 mb-0 font-size-22" id="total_visits">0</h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
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
                                                <h6 class="mb-0 font-size-15">Total Pending Visits</h6>
                                            </div>



                                        </div>

                                        <div>
                                            <h4 class="mt-4 pt-1 mb-0 font-size-22" id="total_p_visits">0</h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
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
                                                <h6 class="mb-0 font-size-15">Total Complete Visits</h6>
                                            </div>



                                        </div>

                                        <div>
                                            <h4 class="mt-4 pt-1 mb-0 font-size-22" id="total_c_visits">0</h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="card">
                    <div class="card-body" style="overflow: auto;">
                        <h3>Inspection Report</h3>

                        <table id="myTable" class="display" style="width:100%">
                            <thead>

                                <tr>
                                    <th class="text-center">S.No</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Complete Time</th>
                                    <th class="text-center">Dealer Sign</th>
                                    <th class="text-center">User</th>
                                    <th class="text-center">Dealer</th>
                                    <th class="text-center">Mode</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Inspection</th>

                                </tr>

                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'footer.php'; ?>

    </div>
    <!-- end main content-->
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
                                Planned Date : <span id="survey_time"></span>
                            </div>
                            <!-- <div class="col-md-12">
                                    Completion Date : <span id="survey_complete_time"></span>
                                </div> -->
                            <div id='last_recon'>

                            </div>

                            <div class="col-md-12">
                                Site Name : <span id="survey_dealer_name"></span>
                            </div>
                            <div class="col-md-12">
                                TM Name : <span id="survey_ispector_name"></span>
                            </div>
                            <div class="col-md-12 d-none">
                                Planned Type : <span id="survey_type"></span>
                            </div>
                        </div>
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
                                            <th class="text-center">Monthly Target (L)</th>
                                            <th class="text-center">Target Achived (L)</th>
                                            <th class="text-center">Difference (L)</th>
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

    <div id="despensing_unit_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        data-bs-scroll="true">
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

    <div id="stock_variations_modal_new" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true" data-bs-scroll="true">
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
                                Time : <span id="survey_time_stock_variation"></span>
                            </div>

                            <div class="col-md-12">
                                Site Name : <span id="survey_dealer_name_stock_variation"></span>
                            </div>
                        </div>
                        <div class="row" id="survey-container">

                        </div>

                    </div>


                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div id="stock_variations_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        data-bs-scroll="true">
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
                        <div class="row">
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

                                        <th>Appreciation Of Dealer </th>
                                        <th>Measure taken to overcome shortage</th>
                                        <th>Warning</th>
                                        <th>PMG OGRA Price</th>
                                        <th>PMG Pump Price</th>
                                        <th>PMG Variance</th>
                                        <th>HSD OGRA Price</th>
                                        <th>HSD Pump price</th>
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
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->


    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- chat offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 id="offcanvasRightLabel">Sizes</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <form method="post" id="insert_form" enctype="multipart/form-data">


                    <div class="form-row mb-4">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Sizes</label>
                            <input type="number" class="form-control" id="name" name="name" placeholder="Enter Username"
                                required>
                        </div>






                    </div>

                    <div class="col-12">
                        <input type="hidden" name="row_id" id="row_id" value="0">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'] ?>">
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

    <!-- JAVASCRIPT -->


    <?php include 'script_tags.php'; ?>

    <script>
    var table;
    var type;
    var subtype;

    $(document).ready(function() {
        // $('.js-example-basic-multiple').select2();
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


        lubes_table = $('#myTable').DataTable({
            dom: 'Bfrtip',


            buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

        });
        fetchtable();
        var names = <?php echo isset($_GET['name']) ? 'true' : 'false'; ?>;
        if (names) {
            var usersnames = <?php echo isset($_GET['name']) ? json_encode($_GET['name']) : 'null'; ?>;
            // alert(usersnames);
            lubes_table.search(usersnames).draw();
        }

    });

    function fetchtable() {
        blocking();

        var fromdate = $('#fromdate').val();
        var todate = $('#todate').val();

        var apiUrl = "<?php echo $api_url; ?>get/eng/get_all_dealers_inspection_report_data.php";
        var queryParams =
            `?key=03201232927&pre=<?php echo $_SESSION['privilege']; ?>&id=<?php echo $_SESSION['user_id']; ?>&from=${fromdate}&to=${todate}`;

        console.log(apiUrl + queryParams);

        fetch(apiUrl + queryParams, {
                method: 'GET',
                redirect: 'follow'
            })
            .then(response => response.json())
            .then(response => {
                if (response.length > 0) {
                    var t_visit = 0,
                        p_visit = 0,
                        c_visit = 0;

                    lubes_table.clear().draw();

                    $.each(response, function(index, data) {
                        var emailer = (data.email_status != 1) ?
                            `<button type="button" onclick="send_email(${data.id}, ${data.dealer_id})" class="btn btn-soft-danger waves-effect waves-light">
                            <i class="fas fa-mail-bulk font-size-16 align-middle"></i>
                        </button>` :
                            `<button type="button" class="btn btn-soft-danger waves-effect waves-light">
                            <i class="fas fa-mail-bulk font-size-16 align-middle text-danger"></i>
                        </button>`;

                        var inspection_btn = `<button type="button" onclick="displaySurvey(${data.id}, ${data.id}, ${data.dealer_id}, '${data.dealer_name.replace("'", "\\'")}', '${data.time}', '${data.visit_close_time}', '${data.name}', '${data.type}', ${data.last_visit_id}, '${data.privilege}')" class="btn btn-soft-danger waves-effect waves-light">
                            <i class="fas fa-align-justify font-size-16 align-middle"></i>
                        </button>`;
                        var inpection = (data.inspection == 1) ? inspection_btn : "---";

                        var current_status = (data.privilege == 'RM' && data.inspection == 1) ? 'Complete' :
                            data.current_status;

                        if (current_status === 'Pending') p_visit++;
                        else if (current_status === 'Complete') c_visit++;

                        t_visit++;

                        var dealer_sign = (data.dealer_sign != null) ?
                            `<a href="http://151.106.17.246:8080/pumabridgeApis/uploads/${data.dealer_sign}" target="_blank">
                            <i class="fas fa-file-image text-success" style="font-size: 20px; font-weight: bold;"></i>
                        </a>` :
                            "---";

                        lubes_table.row.add([
                            index + 1,
                            data.time,
                            data.visit_close_time,
                            dealer_sign,
                            data.name,
                            data.dealer_name,
                            data.type,
                            current_status,
                            inpection
                        ]).draw(false);
                    });

                    $('#total_visits').text(t_visit);
                    $('#total_p_visits').text(p_visit);
                    $('#total_c_visits').text(c_visit);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            })
            .finally(() => {
                $.unblockUI();
            });
    }


    function displaySurvey(id, inspection_id, dealer_id, dealer_name, isp_date, comp_date, username, type,
        last_visit_id, privilege) {
        // Clear existing content
        // alert(dealer_name);
        var currentDate = new Date();

        // Format the date as needed
        var formattedDate = currentDate.toLocaleString(); // Adjust the format based on your requirements

        var pril = "<?php echo $_SESSION['privilege'] ?>";

        // Display the formatted date
        $('#labelc').text('Inspection');
        $('#survey_time').text(isp_date);
        $('#survey_complete_time').text(comp_date);

        $('#survey_dealer_name').text(dealer_name);
        $('#survey_ispector_name').text(username);
        $('#survey_type').text(type);

        last_vists_dates('inspection', last_visit_id, comp_date, inspection_id);

        $('#survey-container').empty();

        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        var page_link = '';

        console.log("<?php echo $api_url; ?>get/eng/get_dealer_survey_response.php?key=03201232927&inspection_id=" +
            inspection_id +
            "&task_id=" + id + "&dealer_id=" + dealer_id + "")

        fetch("<?php echo $api_url; ?>get/eng/get_dealer_survey_response.php?key=03201232927&inspection_id=" +
                inspection_id +
                "&task_id=" + id + "&dealer_id=" + dealer_id + "", requestOptions)
            .then(response => response.json())
            .then(result => {
                console.log(result)
                create_div(result)
            })
            .catch(error => console.log('error', error));



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

        var percentage = (r_yes / (total_ques - r_n_a)) * 100;
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
                    '<a href="http://151.106.17.246:8080/pumabridgeApis/uploads/' + question
                    .cancel_file +
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

    function measure_price(id, inspection_id, dealer_id, dealer_name, isp_date, comp_date, username, type,
        last_visit_id) {
        // Clear existing content
        var currentDate = new Date();

        // Format the date as needed
        var formattedDate = currentDate.toLocaleString();
        $('#labelc').text('Measurement & Price');
        $('#survey_time').text(isp_date);
        $('#survey_complete_time').text(comp_date);

        $('#survey_dealer_name').text(dealer_name);
        $('#survey_ispector_name').text(username);
        $('#survey_type').text(type);
        last_vists_dates('price_measurement', last_visit_id, comp_date, inspection_id);
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
        var newRow = '<tr><td>' + mainData.appreation + '</td><td>' + mainData.measure_taken + '</td><td>' +
            mainData
            .warning + '</td><td>' + mainData.pmg_ogra_price + '</td><td>' + mainData.pmg_pump_price + '</td><td>' +
            mainData.pmg_variance + '</td><td>' + mainData.hsd_ogra_price + '</td><td>' + mainData.hsd_pump_price +
            '</td><td>' + mainData.hsd_variance + '</td></tr>';
        $('#main_data tbody').append(newRow);;



        // Sub Data Section


        // Add table rows
        var ii = 1;
        $.each(subData, function(index, item) {
            console.log(item)

            var newRow = '<tr><td>' + ii + '</td><td>' + item.dispensor_name + '</td><td>' + item
                .pmg_accurate +
                '</td><td>' + item.shortage_pmg + '</td><td>' + item.hsd_accurate + '</td><td>' + item
                .shortage_hsd + '</td></tr>';
            $('#sub_data tbody').append(newRow);;
            ii++;
        });
        $('#m_p_modal').modal('show');
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

    function blocking() {
        $.blockUI({
            message: '<h1>Please Wait...</h1>',
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }
        });
    }
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>