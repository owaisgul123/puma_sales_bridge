<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Follow-Up |
        <?php echo $_SESSION['user_name']; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Byco" name="description" />
    <meta content="Byco" name="author" />
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
                        <div class="card-body" style="overflow:auto">
                            <h3>Follow-Ups</h3>

                            <div class="container-fluid">
                                <div class="row ">
                                    <div class="col-md-12" style="text-align: right;">
                                        <div class="dropdown d-inline-block">
                                            <button type="button" class="btn header-item noti-icon"
                                                id="page-header-notifications-dropdown-v" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                Un-Read Notifications<i class="bx bx-bell icon-sm align-middle"></i>
                                                <span class="noti-dot bg-danger rounded-pill" id="unread_msg">0</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0"
                                                aria-labelledby="page-header-notifications-dropdown-v" style="">
                                                <div class="p-3">
                                                    <div class="row align-items-center" id="chat_not">

                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-12" style="text-align: right;">
                                        <div class="dropdown d-inline-block">
                                            <button type="button" class="btn header-item noti-icon"
                                                id="page-header-notifications-dropdown-v2" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                Read Notifications<i class="bx bx-bell icon-sm align-middle"></i>
                                                <span class="noti-dot bg-danger rounded-pill" id="read_msg">0</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0"
                                                aria-labelledby="page-header-notifications-dropdown-v2" style="">
                                                <div class="p-3">
                                                    <div class="row align-items-center" id="readchat_not">

                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Ticket #</th>
                                        <th class="text-center">Dealer</th>
                                        <th class="text-center">Catagory</th>
                                        <th class="text-center">Question</th>
                                        <th class="text-center">Acceleration Time (In hours)</th>
                                        <!-- <th class="text-center">Form Name</th> -->
                                        <th class="text-center">Inspector Name</th>
                                        <th class="text-center">Acceleration Time</th>
                                        <th class="text-center">Acceleration</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Chatlog</th>
                                        <th class="text-center">No of Msgs</th>
                                        <th class="text-center">Action</th>
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
                        <h5 id="labelc">Chat-log</h5>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">


                                        <div class="mx-n4" data-simplebar style="max-height: 421px;">
                                            <div class="border-bottom loyal-customers-box pt-2" id="chatlog_div">

                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" id="approved_orders" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-12">

                                            <div class="mb-3 row">
                                                <label for="example-text-input"
                                                    class="col-md-2 col-form-label">Message</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" id="message_des" name="message_des"
                                                        rows="4" cols="50"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 " style="text-align: right;">
                                            <input type="hidden" name="followup_id" id="followup_id">
                                            <input type="hidden" name="user_id" id="user_id"
                                                value="<?php echo $_SESSION['user_id']; ?>">
                                            <input type="hidden" name="row_id" id="row_id">

                                            <button type="button" class="btn btn-secondary waves-effect"
                                                data-bs-dismiss="modal">Close</button>
                                            <input class="btn btn-primary waves-effect waves-light" type="submit"
                                                name="app_btn" id="app_btn" value="Save changes">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->

    </div><!-- /.modal -->

    <div id="action_modals" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                    <h5 class="modal-title" id="myModalLabel">
                        <h5 id="labelc">Close</h5>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" id="followup_close" enctype="multipart/form-data">

                                    <div class="row">

                                        <div class="col-12">

                                            <div class="mb-3 row">
                                                <label for="example-text-input"
                                                    class="col-md-2 col-form-label">Files</label>
                                                <div class="col-md-10">
                                                    <input type="file" class="form-control" id="action_file"
                                                        name="action_file">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-text-input"
                                                    class="col-md-2 col-form-label">Message</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" id="message_des" name="message_des"
                                                        rows="4" cols="50"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 " style="text-align: right;">
                                            <input type="hidden" name="action_id" id="action_id">
                                            <input type="hidden" name="user_id" id="user_id"
                                                value="<?php echo $_SESSION['user_id']; ?>">
                                            <input type="hidden" name="row_id" id="row_id">

                                            <button type="button" class="btn btn-secondary waves-effect"
                                                data-bs-dismiss="modal">Close</button>
                                            <input class="btn btn-primary waves-effect waves-light" type="submit"
                                                name="app_btn" id="app_btn" value="Save changes">
                                        </div>
                                    </div>
                                </form>
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
        function handleButtonClick() {
            console.log('Bell icon clicked!');
            // Call your function here
            un_read_chat_notification(); // Example: Call chat_notification on click
        }

        // Attach click event handler using jQuery
        $('#page-header-notifications-dropdown-v').on('click', handleButtonClick);

        function handleButtonClick2() {
            console.log('Bell icon clicked!');
            // Call your function here
            read_chat_notification(); // Example: Call chat_notification on click
        }

        // Attach click event handler using jQuery
        $('#page-header-notifications-dropdown-v2').on('click', handleButtonClick2);

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

        $('#followup_close').on("submit", function(event) {
            event.preventDefault();
            // alert("Name")
            var data = new FormData(this);

            $.ajax({
                url: "<?php echo $api_url; ?>update/eng/close_followup_chase.php",
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
                                'Record Updated Successfully',
                                'success'
                            )

                            location.reload();
                            $('#app_btn').val("Save");
                            document.getElementById("app_btn").disabled = false;

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

        $('#approved_orders').on("submit", function(event) {
            event.preventDefault();
            // alert("Name")
            var data = new FormData(this);

            $.ajax({
                url: "<?php echo $api_url; ?>create/eng/create_followup_chatlog.php",
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

                },
                error: function(xhr, status, error) {
                    // Handle API errors
                    console.log('Error:', error);
                    console.log('Status:', status);
                    console.log('Response:', xhr.responseText);
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
            $('#followup_id').val(id);

            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            fetch("<?php echo $api_url; ?>get/eng/get_followup_chats.php?key=03201232927&followup_id=" +
                    id + "",
                    requestOptions)
                .then(response => response.json())
                .then(result => {

                    $('#chatlog_div').empty();
                    if (result.length > 0) {
                        $.each(result, function(index, data) {

                            console.log(data)

                            $('#chatlog_div').append(
                                '<div class="d-flex align-items-center">' +

                                ' <div class="flex-grow-1 ms-3 overflow-hidden">' +
                                '<h5 class="font-size-15 mb-1 text-truncate">' + data
                                .description + '</h5>' +
                                ' <p class="text-muted text-truncate mb-0">' + data
                                .created_at + '</p>' +
                                '</div>' +
                                '<div class="flex-shrink-0">' +
                                '<h5 class="font-size-14 mb-0 text-truncate w-xs bg-light p-2 rounded text-center">' +
                                data.name + '' +
                                '</h5>' +
                                '</div>' +
                                '</div>');


                        });
                    } else {
                        $('#chatlog_div').append('<div class="d-flex align-items-center">' +

                            ' <div class="flex-grow-1 ms-3 overflow-hidden">' +
                            '<h5 class="font-size-15 mb-1 text-truncate">Data Not Found</h5>' +
                            '</div>' +

                            '</div>');
                    }
                })
                .catch(error => console.log('error', error));

            $('#approved_order_modal').modal('show');
        });

        $(document).on('click', '.action_form', function() {

            var id = $(this).attr("id");
            // alert(id)
            $('#action_id').val(id);
            $('#action_modals').modal('show');
        });

    })

    // chat_notification();

    function chat_notification_count() {
        // console.log('chat_notification called');
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        // Construct URL using template literals
        const apiUrl = "<?php echo $api_url; ?>";
        const key = "03201232927";
        const privilege = "<?php echo $_SESSION['privilege'] ?>";
        const user_id = "<?php echo $_SESSION['user_id'] ?>";

        const url = `${apiUrl}get/eng/get_unread_followup_msg.php?key=${key}&pre=${privilege}&dpt_id=${0}&user_id=${user_id}`;

        // console.log(url);

        fetch(url, requestOptions)
            .then(response => response.json())
            .then(result => {
                // $('#chat_not').empty();
                $('#unread_msg').text(result.length);


            })
            .catch(error => console.error('Error:', error))
            .finally(() => {
                // Call the chat_notification function again after 30 seconds
                setTimeout(chat_notification_count, 10000);
            });
    }
    chat_notification_count();

    function un_read_chat_notification() {

        console.log('read_chat_notification called');
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        // Construct URL using template literals
        const apiUrl = "<?php echo $api_url; ?>";
        const key = "03201232927";
        const privilege = "<?php echo $_SESSION['privilege'] ?>";
        const dptId = 0;
        const user_id = "<?php echo $_SESSION['user_id'] ?>";

        const url = `${apiUrl}get/eng/get_unread_followup_msg.php?key=${key}&pre=${privilege}&dpt_id=${dptId}&user_id=${user_id}`;

        // console.log(url);

        fetch(url, requestOptions)
            .then(response => response.json())
            .then(result => {
                $('#readchat_not').empty();
                $('#read_msg').text(result.length);

                if (result.length > 0) {
                    result.forEach(data => {
                        // console.log(data);

                        $('#chat_not').append(`
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 ms-3 overflow-hidden">
                        <h5 class="text-muted text-truncate mb-0">Ticket: 
                            <a href="#" onclick="searchTicket(${data.ticket_no})">${data.ticket_no}</a>
                        </h5>
                        <p class="font-size-15 mb-1 text-truncate">Chat By: ${data.username}</p>
                        <p class="text-muted text-truncate mb-0">Time: ${data.created_at}</p>
                    </div>
                </div>
            `);
                    });
                } else {
                    $('#chat_not').append(`
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3 overflow-hidden">
                    <h5 class="font-size-15 mb-1 text-truncate">Data Not Found</h5>
                </div>
            </div>
        `);
                }
            })
            .catch(error => console.error('Error:', error));
            updateChat();
    }

    function read_chat_notification_count() {
        // console.log('chat_notification called');
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        // Construct URL using template literals
        const apiUrl = "<?php echo $api_url; ?>";
        const key = "03201232927";
        const privilege = "<?php echo $_SESSION['privilege'] ?>";
        const dptId = 0;

        const url = `${apiUrl}get/eng/get_read_followup_msg.php?key=${key}&pre=${privilege}&dpt_id=${dptId}`;

        // console.log(url);

        fetch(url, requestOptions)
            .then(response => response.json())
            .then(result => {
                // $('#chat_not').empty();
                $('#read_msg').text(result.length);


            })
            .catch(error => console.error('Error:', error))
            .finally(() => {
                // Call the chat_notification function again after 30 seconds
                setTimeout(read_chat_notification_count, 10000);
            });
    }
    read_chat_notification_count();


    function read_chat_notification() {

        console.log('read_chat_notification called');
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        // Construct URL using template literals
        const apiUrl = "<?php echo $api_url; ?>";
        const key = "03201232927";
        const privilege = "<?php echo $_SESSION['privilege'] ?>";
        const dptId = 0;

        const url = `${apiUrl}get/eng/get_read_followup_msg.php?key=${key}&pre=${privilege}&dpt_id=${dptId}`;

        // console.log(url);

        fetch(url, requestOptions)
            .then(response => response.json())
            .then(result => {
                $('#readchat_not').empty();
                $('#read_msg').text(result.length);

                if (result.length > 0) {
                    result.forEach(data => {
                        // console.log(data);

                        $('#readchat_not').append(`
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 ms-3 overflow-hidden">
                                <h5 class="text-muted text-truncate mb-0">Ticket: 
                                    <a href="#" onclick="searchTicket(${data.ticket_no})">${data.ticket_no}</a>
                                </h5>
                                <p class="font-size-15 mb-1 text-truncate">Chat By: ${data.username}</p>
                                <p class="text-muted text-truncate mb-0">Time: ${data.created_at}</p>
                            </div>
                        </div>
                    `);
                    });
                } else {
                    $('#readchat_not').append(`
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 ms-3 overflow-hidden">
                            <h5 class="font-size-15 mb-1 text-truncate">Data Not Found</h5>
                        </div>
                    </div>
                `);
                }
            })
            .catch(error => console.error('Error:', error));

    }

    async function updateChat() {
        // Define the headers for the request
        let headersList = {
            "Accept": "*/*",
            "User-Agent": "Thunder Client (https://www.thunderclient.com)"
        };

        // Construct the URL using template literals for better readability
        let url =
            `<?php echo $api_url; ?>update/eng/read_followups.php?key=03201232927&pre=<?php echo $_SESSION['privilege']; ?>&dpt_id=0`;

        try {
            // Make the fetch request
            let response = await fetch(url, {
                method: "GET",
                headers: headersList
            });

            // Check if the response is OK
            if (response.ok) {
                let data = await response.text();
                console.log(data);
            } else {
                console.error(`HTTP error! status: ${response.status}`);
            }
        } catch (error) {
            // Handle any errors that occurred during the fetch
            console.error('Fetch error:', error);
        }
    }




    function searchTicket(ticketNumber) {
        // Search DataTable for the ticket number
        table.search(ticketNumber).draw();
    }

    function fetchtable() {
        var fromdate = $('#fromdate').val();
        var todate = $('#todate').val();
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        console.log(
            "<?php echo $api_url; ?>get/eng/page_followup_heri.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>&from=" +
            fromdate + "&to=" + todate + "&department_id=0"
        )
        fetch("<?php echo $api_url; ?>get/eng/page_followup_heri.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>&from=" +
                fromdate + "&to=" + todate + "&department_id=0",
                requestOptions)
            .then(response => response.json())
            .then(response => {
                console.log(response)

                table.clear().draw();
                $.each(response, function(index, data) {
                    var status = data.status;
                    console.log(status)
                    var status_value = '';
                    var status_chat = '';
                    var status_action = '';
                    var status_waiting = '';

                    if (status == 0) {
                        status_value =
                            '<span id=' + data.id +
                            ' class="badge rounded-pill cursor-pointer bg-primary " data-key="t-new">Pending</span>';
                    } else if (status == 0) {
                        status_value =
                            '<span id=' + data.id +
                            ' class="badge rounded-pill cursor-pointer bg-info" data-key="t-new">Approved</span>';
                    } else if (status == 1) {
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
                    var chat_counts = data.chat_counts;
                    if (chat_counts > 0) {
                        icon_color = 'text-success'; // Corrected typo here
                    } else {
                        icon_color = 'text-dark';
                    }

                    if (status == 0) {
                        status_chat =
                            '<i class="bx bx-chat icon nav-icon approved_check ' + icon_color + '" id=' +
                            data.id + ' style="font-weight: bold;font-size: 20px;"></i>';

                        status_action =
                            '<i class="fas fa-edit icon nav-icon action_form" id=' + data.id + '></i>';

                        status_waiting = data.waiting;

                    } else {
                        status_chat =
                            '<i class="bx bx-chat icon nav-icon text-success" id=' + data.id +
                            '></i>';
                        status_action =
                            '<i class="fas fa-edit icon nav-icon text-success" id=' + data.id + '></i>';

                        status_waiting = 'Completed';

                    }


                    table.row.add([
                        data.id,
                        data.dealers_name,
                        data.cat_name,
                        data.ques_name,
                        // data.name,
                        data.hours_duration,
                        // data.fm_name,
                        data.inspector_name,
                        data.created_at,
                        status_waiting,
                        // data.follow_dpt,
                        status_value,
                        status_chat,
                        data.chat_counts,
                        status_action

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
                                data.amount

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