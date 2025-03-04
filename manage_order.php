<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Orders |
        <?php echo $_SESSION['user_name']; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="BYCO" name="description" />
    <meta content="P2P" name="author" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- App favicon -->

    <?php include 'css_script.php'; ?>


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
                    <!-- <div class="row">

                        <div class="col-md-6">
                            <button class="btn btn-soft-primary waves-effect waves-light" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" id="add_btn"
                                aria-controls="offcanvasRight"><i
                                    class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer"></i>Add</button>
                        </div>
                    </div> -->
                    <div class="card">

                        <div class="card-body">

                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.NO</th>
                                        <th class="text-center">DATE</th>
                                        <th class="text-center">SITE CODE</th>
                                        <th class="text-center">SITE NAME</th>
                                        <th class="text-center">TERRITORY MANAGER</th>
                                        <th class="text-center">MODE</th>
                                        <th class="text-center">DEPOT</th>
                                        <th class="text-center">TOTAL AMOUNT</th>
                                        <!-- <th class="text-center">LEDGER AMOUNT</th> -->
                                        <th class="text-center">SALES ORDER</th>
                                        <th class="text-center">SAP STATUS</th>
                                        <th class="text-center">EXECUTION STATUS</th>
                                        <th class="text-center">VIEW ORDERS</th>
                                        <th class="text-center">TRACK</th>

                                        <!-- <th class="text-center">Delete</th> -->
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
            <h5 id="offcanvasRightLabel">Settings</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <form method="post" id="insert_form" enctype="multipart/form-data">


                    <div class="form-row mb-4">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Username</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Username"
                                required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
                                required>
                        </div>

                        <div class="form-group col-md-12  ">

                            <label for="" class="lab"> Enter
                                Password</label>
                            <input type="password" id="password" required minlength="8" class="form-control input"
                                placeholder="Enter Password">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" id="togglePassword" class="feather feather-eye"
                                style="    position: absolute;top: 42px;right: 13px;color: #888ea8;fill: rgba(0, 23, 55, 0.08);width: 17px;cursor: pointer;">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                </path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </div>


                        <div class="form-group col-md-12 ">

                            <label for="" class="lab"> Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" required minlength="8"
                                class="form-control input" placeholder="Confirm Password">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" id="togglePassword1" class="feather feather-eye"
                                style="    position: absolute;top: 42px;right: 13px;color: #888ea8;fill: rgba(0, 23, 55, 0.08);width: 17px;cursor: pointer;">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                </path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>



                        </div>



                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Contact No</label>
                            <input type="text" class="form-control" id="number" name="number"
                                placeholder="Enter Contact No" required>
                        </div>


                        <div class="form-group col-md-12">
                            <label for="inputAddress">Role</label>

                            <select id="role" name="role" class="form-control selectpicker">
                                <option selected>Choose...</option>
                                <option value="admin_user">Admin User</option>
                                <option value="viewer">viewer</option>
                                <option value="Cartraige">Cartraige</option>


                            </select>
                        </div>

                    </div>

                    <div class="col-12">
                        <input type="hidden" name="row_id" id="row_id" value="">
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

    <div id="approved_order_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                    <h5 class="modal-title" id="myModalLabel">
                        <h5 id="labelc">Approved Orders</h5>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="approved_orders" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <select id="approved_order_status" name="approved_order_status"
                                            class="form-control selectpicker">
                                            <option selected>Choose...</option>
                                            <option value="1">Approved</option>
                                            <option value="3">Cancel</option>


                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Description</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" id="approved_order_description"
                                            name="approved_order_description" rows="4" cols="50"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 " style="text-align: right;">
                                <input type="hidden" name="order_approval" id="order_approval">
                                <input type="hidden" name="user_id" id="user_id"
                                    value="<?php echo $_SESSION['user_id']; ?>">


                                <button type="button" class="btn btn-secondary waves-effect"
                                    data-bs-dismiss="modal">Close</button>
                                <input class="btn btn-primary waves-effect waves-light" type="submit" name="app_btn"
                                    id="app_btn" value="Save changes">
                            </div>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->

    </div><!-- /.modal -->
    <div id="in_balanced_order_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                    <h5 class="modal-title" id="myModalLabel">
                        <h5 id="labelc">Insufficient Balance</h5>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="ins_orders_update" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <select id="in_balanced_order" name="in_balanced_order"
                                            class="form-control selectpicker">
                                            <option selected>Choose...</option>
                                            <option value="4">Special Approval</option>


                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Description</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" id="in_balanced_description"
                                            name="in_balanced_description" rows="4" cols="50"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12" style="text-align: right;">
                                <input type="hidden" name="spe_approval" id="spe_approval">
                                <input type="hidden" name="user_id" id="user_id"
                                    value="<?php echo $_SESSION['user_id']; ?>">
                                <button type="button" class="btn btn-secondary waves-effect"
                                    data-bs-dismiss="modal">Close</button>
                                <input class="btn btn-primary waves-effect waves-light" type="submit" name="sp_btn"
                                    id="sp_btn" value="Save changes">
                            </div>
                        </div>
                    </form>

                </div>



            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- JAVASCRIPT -->

    <div id="products_price_backlog_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true" data-bs-scroll="true">
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
                                    <table class="table table-nowrap table-hover mb-1" id="product_price_backlog">
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
    <?php include 'script_tags.php'; ?>

    <script>
    var table;
    var type;
    var subtype;
    $(document).ready(function() {

        table = $('#myTable').DataTable({
            dom: 'Bfrtip',


            buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

        });

        product_price_backlog = $('#product_price_backlog').DataTable({
            dom: 'Bfrtip',


            buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

        });

        fetchtable();
        $('#add_btn').click(function() {

            $('#row_id').val("");

            $('#insert_form')[0].reset();

        });

        $('#insert_form').on("submit", function(event) {
            event.preventDefault();
            // alert("Name")
            var data = new FormData(this);

            $.ajax({
                url: "<?php echo $api_url; ?>create/users.php",
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
                            document.getElementById("insert").disabled = false;

                        }, 2000);

                    }

                }
            });

        });

        $('#approved_orders').on("submit", function(event) {
            event.preventDefault();
            // alert("Name")
            var data = new FormData(this);

            $.ajax({
                url: "<?php echo $api_url; ?>update/approved_orders.php",
                cache: false,
                contentType: false,
                processData: false,
                method: "POST",
                data: data,
                beforeSend: function() {
                    $('#app_btn').val("Saving");
                    document.getElementById("app_btn").disabled = true;

                },
                success: function(data) {
                    console.log(data)

                    if (data != 1) {
                        Swal.fire(
                            'Server Error!',
                            'Record Not Created',
                            'error'
                        )
                        $('#app_btn').val("Save");
                        document.getElementById("app_btn").disabled = false;
                    } else {


                        setTimeout(function() {
                            Swal.fire(
                                'Success!',
                                'Record Created Successfully',
                                'success'
                            )
                            $('#approved_orders')[0].reset();
                            $('#approved_order_modal').modal('hide');
                            fetchtable();
                            $('#app_btn').val("Save");
                            document.getElementById("app_btn").disabled = false;

                        }, 2000);

                    }

                }
            });

        });

        $('#ins_orders_update').on("submit", function(event) {
            event.preventDefault();
            alert("Name")
            var data = new FormData(this);

            $.ajax({
                url: "<?php echo $api_url; ?>update/send_special_approval.php",
                cache: false,
                contentType: false,
                processData: false,
                method: "POST",
                data: data,
                beforeSend: function() {
                    $('#sp_btn').val("Saving");
                    document.getElementById("sp_btn").disabled = true;

                },
                success: function(data) {
                    console.log(data)

                    if (data != 1) {
                        Swal.fire(
                            'Server Error!',
                            'Record Not Created',
                            'error'
                        )
                        $('#sp_btn').val("Save");
                        document.getElementById("sp_btn").disabled = false;
                    } else {


                        setTimeout(function() {
                            Swal.fire(
                                'Success!',
                                'Record Created Successfully',
                                'success'
                            )
                            $('#ins_orders_update')[0].reset();
                            $('#in_balanced_order_modal').modal('hide');
                            fetchtable();
                            $('#sp_btn').val("Save");
                            document.getElementById("sp_btn").disabled = false;

                        }, 2000);

                    }

                }
            });

        });

        $(document).on('click', '.approved_check', function() {

            var id = $(this).attr("id");
            // alert(employee_id)
            $('#order_approval').val(id);
            $('#approved_order_modal').modal('show');
        });

        $(document).on('click', '.insuficient_check', function() {

            var id = $(this).attr("id");
            // alert(employee_id)
            $('#spe_approval').val(id);
            $('#in_balanced_order_modal').modal('show');
        });

    })



    function fetchtable() {
        var fromdate = $('#fromdate').val();
        var todate = $('#todate').val();
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        console.log(
            "<?php echo $api_url; ?>get/get_all_main_orders.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>"
        )
        fetch("<?php echo $api_url; ?>get/get_all_main_orders.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>&from=" +
                fromdate + "&to=" + todate + "",
                requestOptions)
            .then(response => response.json())
            .then(response => {
                console.log(response)

                table.clear().draw();
                $.each(response, function(index, data) {
                    var status = data.status_value;
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
                    // 
                    // message = (data.delivered_status == 1) ? "Invoiced" : "Scheduled";
                    d_type = (data.type == 'ZDL') ? "Delivered" : "EX-Rack Self";
                    track = (data.is_tracker == 1) ? "<a href='trip_board_salesOrder.php?no=" + data
                        .SaleOrder +
                        "' target='_blank'><i class='fas fa-route font-size-16 align-middle'></i></a>" :
                        "----";
                    console.log(data.is_tracker)
                    console.log(data.SaleOrder)

                    if (parseInt(data.delivered_status) === 1) {
                        // If data.is_tracker is 1, generate track link
                        message = "Invoiced";
                    } else {
                        // If data.is_tracker is not 1, display ----

                        if (status == 'Not Yet Processed' || status == 'pending') {
                            message = "---";

                        } else {
                            message = "Scheduled";
                        }
                    }

                    table.row.add([
                        index + 1,
                        data.created_at,
                        data.sap_no,
                        data.name,
                        data.usersnames,

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
                        // '<button type="button" id="delete" name="delete" onclick="deleteData(' +
                        // data.id +
                        // ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>'
                    ]).draw(false);
                });
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
                        product_price_backlog.clear().draw();

                        $.each(response, function(index, data) {
                            product_price_backlog.row.add([
                                index + 1,
                                data.date,
                                data.name,
                                // data.name,
                                data.product_name,
                                data.rate,
                                data.quantity,
                                data.delivery_based,
                                data.consignee_name,
                                parseFloat(data.amount).toLocaleString()

                            ]).draw(false);

                        });
                    }
                    $('#products_price_backlog_modal').modal('show');
                })
                .catch(error => console.log('error', error));

        }

    }
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>