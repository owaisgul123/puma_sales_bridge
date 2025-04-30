<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Logistics Dashboard | <?php echo $_SESSION['user_name'];?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- App favicon -->

    <?php include 'css_script.php'; ?>

   <!-- Alertify.js Latest Version -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
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
        <?php include 'right_siebar.php'; ?>

        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-body">
                            <h3>Logistics Dashboard : <span id="Dash_title"><?php echo $_GET['title']?></span></h3>

                            <div class="container-fluid">
                                <div class="row my-4">
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-soft-primary waves-effect waves-light"
                                            style='background: #d2def4;' id="modal_b" data-bs-toggle="modal"
                                            data-bs-target="#myModal">
                                            <i class="bx bx-filter font-size-20 align-middle"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="card"
                                            onclick="get_all_vehicles('get_all_vehicles','Total Vehicles')"
                                            style="cursor: pointer;">
                                            <div class="card-body">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded bg-primary-subtle ">
                                                                <i
                                                                    class="fas fa-car font-size-24 mb-0 text-primary"></i>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0 font-size-15">Total Vehicles</h6>
                                                        </div>


                                                    </div>

                                                    <div>
                                                        <h4 class="mt-4 pt-1 mb-0 font-size-22" id="all_vehicles">0</h4>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card"
                                            onclick="get_all_vehicles('get_moving_vehicles','Vehicles Currently Moving')"
                                            style="cursor: pointer;">
                                            <div class="card-body">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded bg-primary-subtle ">
                                                                <i
                                                                    class="fas fa-route font-size-24 mb-0 text-success"></i>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0 font-size-15">Vehicles Currently Moving</h6>
                                                        </div>


                                                    </div>

                                                    <div>
                                                        <h4 class="mt-4 pt-1 mb-0 font-size-22" id="moving_vehicles">0
                                                        </h4>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card"
                                            onclick="get_all_vehicles('get_stop_vehicles','Vehicles Currently Stopped')"
                                            style="cursor: pointer;">
                                            <div class="card-body">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded bg-primary-subtle ">
                                                                <i
                                                                    class="fas fa-stop-circle font-size-24 mb-0 text-danger"></i>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0 font-size-15">Vehicles Currently Stopped
                                                            </h6>
                                                        </div>


                                                    </div>

                                                    <div>
                                                        <h4 class="mt-4 pt-1 mb-0 font-size-22" id="stop_vehicles">0
                                                        </h4>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card" onclick="get_all_vehicles('get_idle_vehicles','Idle State')"
                                            style="cursor: pointer;">
                                            <div class="card-body">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded bg-primary-subtle ">
                                                                <i
                                                                    class="fas fa-pause font-size-24 mb-0 text-warning"></i>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0 font-size-15">Idle State</h6>
                                                        </div>


                                                    </div>

                                                    <div>
                                                        <h4 class="mt-4 pt-1 mb-0 font-size-22" id="idle_vehicles">0
                                                        </h4>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card"
                                            onclick="get_all_vehicles('get_nr_vehicles','No Vehicles Activity Record')"
                                            style="cursor: pointer;">
                                            <div class="card-body">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded bg-primary-subtle ">
                                                                <i
                                                                    class="fas fa-tasks font-size-24 mb-0 text-primary"></i>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0 font-size-15">No Vehicles Activity Record
                                                            </h6>
                                                        </div>


                                                    </div>

                                                    <div>
                                                        <h4 class="mt-4 pt-1 mb-0 font-size-22" id="nr_vehicles">0</h4>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card"
                                            onclick="get_all_vehicles('get_overspeed_alert','Speed Violation')"
                                            style="cursor: pointer;">
                                            <div class="card-body">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded bg-primary-subtle ">
                                                                <i
                                                                    class="fas fa-tachometer-alt font-size-24 mb-0 text-danger"></i>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0 font-size-15">Speed Violation</h6>
                                                        </div>


                                                    </div>

                                                    <div>
                                                        <h4 class="mt-4 pt-1 mb-0 font-size-22" id="overspeed_vehicles">
                                                            0</h4>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card"
                                            onclick="get_all_vehicles('get_blackspot_vehicles','Black Spot')"
                                            style="cursor: pointer;">
                                            <div class="card-body">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded bg-primary-subtle ">
                                                                <i
                                                                    class="fas fa-exclamation-triangle font-size-24 mb-0 text-danger"></i>
                                                                    
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0 font-size-15">Black Spot</h6>
                                                        </div>


                                                    </div>

                                                    <div>
                                                        <h4 class="mt-4 pt-1 mb-0 font-size-22" id="black_spot">
                                                            0</h4>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card"
                                            onclick="get_all_vehicles('get_all_night_voilation','Night Voilations')"
                                            style="cursor: pointer;">
                                            <div class="card-body">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded bg-primary-subtle ">
                                                                <i
                                                                    class="fas fa-exclamation-triangle font-size-24 mb-0 text-danger"></i>
                                                                    
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0 font-size-15">Night Voilations</h6>
                                                        </div>


                                                    </div>

                                                    <div>
                                                        <h4 class="mt-4 pt-1 mb-0 font-size-22" id="night_vollation">
                                                            0</h4>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" id="all_car">
                                        <div class="widget-content widget-content-area br-6">
                                            <div class="table-responsive mb-4 mt-4">
                                                <center>
                                                    <h3 style="color: #24245c;" id="titles">All Vehicle</h3>
                                                </center>
                                                <table id="vehicle_table" class="table table-hover non-hover"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.NO</th>
                                                            <th>Reg No</th>
                                                            <th>Reporting Time</th>
                                                            <th>Location</th>
                                                            <th>Coordinates</th>
                                                            <th>Speed</th>
                                                            <th>Tracker</th>
                                                            <th>Cartraige/Tracker/User</th>



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

                <!-- container-fluid -->
            </div>
            <div id="myModal" style="padding-top: 50px;" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Select User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Users
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-0" id="dis">
                                            
                                        <li onclick="redirectToDashboard(1,'Admin')" class="ss2" id="1">Admin</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <!-- <h5>Select Distributor</h5> -->

                            <div class="card border border-primary">
                                <div class="card-header bg-transparent border-primary">
                                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Tracker
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-0">
                                        <!-- <li>Integer molestie lorem at massa</li> -->
                                        <li>
                                            <ul id="endu">


                                            </ul>
                                        </li>
                                        <!-- <li>Faucibus porta lacus fringilla vel</li> -->
                                    </ul>
                                </div>
                            </div>

                            <div class="card border border-primary">
                                <div class="card-header bg-transparent border-primary">
                                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Cartraige
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-0">
                                        <!-- <li>Integer molestie lorem at massa</li> -->
                                        <li>
                                            <ul id="Cartraige_list">


                                            </ul>
                                        </li>
                                        <!-- <li>Faucibus porta lacus fringilla vel</li> -->
                                    </ul>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect"
                                data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
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


    <!-- JAVASCRIPT -->

    <?php include 'script_tags.php'; ?>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
    <script>
    var vehicle_table;
    var type;
    var subtype;
    $(document).ready(function() {
        // $('.js-example-basic-multiple').select2();
        count();
        get_all_vehicles('get_all_vehicles', 'Total Vehicles');
        distributor();


        vehicle_table = $('#vehicle_table').DataTable({
            dom: 'Bfrtip',


            buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

        });


    })


    setInterval(function() {
        // window.location.reload();
        count()
    }, 10000);

    function count() {
        var from = "<?php echo $_GET['from'] ?>";
        var to = "<?php echo $_GET['to'] ?>";
        var id = "<?php echo $_GET['id']; ?>";

        // console.log("<?php echo $api_url;?>get/dashboard/all_counts.php?accesskey=12345&id=" + id + "&from=" + from + "&to=" + to + "");

        var settings = {
            "url": "<?php echo $api_url;?>get/dashboard/all_counts.php?accesskey=12345&id=" + id + "&from=" + from +
                "&to=" + to + "",
            "method": "GET",
            "timeout": 0,
            "dataType": 'json' // Automatically parses JSON
        };

        $.ajax(settings).done(function(data) {
            // console.log(data);
            $("#all_vehicles").html(data["all_devices"]);
            $("#moving_vehicles").html(data["moving_devices"]);
            $("#stop_vehicles").html(data["stop_devices"]);
            $("#idle_vehicles").html(data["idle_devices"]);
            $("#overspeed_vehicles").html(data["overspeed_devices"]);
            $("#black_spot").html(data["black_count"]);
            $("#night_vollation").html(data["night_voilation"]);

            // $("#nigthtime_vehicles").html(data["night_count"]);
            // $("#excess_vehicles").html(data["excess_count"]);
            $("#nr_vehicles").html(data["nr_devices"]);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX error:", textStatus, errorThrown);
        });
    }

    function get_all_vehicles(api_type, title) {
        var from = "<?php echo $_GET['from']; ?>";
        var to = "<?php echo $_GET['to']; ?>";
        var id = "<?php echo $_GET['id']; ?>";
        $("#titles").html(title);
        var requestOptions = {
            method: 'GET',
            redirect: 'follow',
        };

        blocking(); // Assuming this shows a loading state/UI block

        var apiUrl =
            `<?php echo $api_url; ?>get/dashboard/${api_type}.php?accesskey=12345&id=${id}&from=${from}&to=${to}`;

        fetch(apiUrl, requestOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Network response was not ok: ${response.statusText}`);
                }
                return response.json(); // Ensure the response is JSON
            })
            .then(data => {
                // console.log(data);

                // Clear the table before adding new rows
                vehicle_table.clear().draw();

                // Iterate over the response data and add rows to the table
                $.each(data, function(index, item) {
                    vehicle_table.row.add([
                        index + 1,
                        item.name || "N/A",
                        item.time || "N/A",
                        item.vlocation || "N/A",
                        `${item.latitude || "N/A"} ${item.longitude || "N/A"}`,
                        item.speed || "N/A",
                        item.vehicle_make || "N/A",
                        item.username || "N/A"
                    ]).draw(false);
                });

                $.unblockUI(); // Unblock the UI after the process is done
            })
            .catch(error => {
                console.error("Error:", error);
                $.unblockUI(); // Unblock the UI even if there's an error
            });
    }


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

    function distributor() {
        var settings = {
            "url": "",
            "method": "GET",
            "timeout": 0,
        };
        $.ajax({
            url: "<?php echo $api_url;?>map_apis/distributor.php?accesskey=12345",
            method: "GET",
            timeout: 0,
            cache: false,
            success: function(response) {
                // $('.info').append(html);
                var data;
                if (typeof response === "object") {
                    data = response;
                } else {
                    // Otherwise, parse the JSON string
                    try {
                        data = JSON.parse(response);
                    } catch (e) {
                        console.error("Error parsing JSON:", e);
                        return;
                    }
                }

                console.log("Parsed data:", data);
                for (var i = 0; i < data.length; i++) {


                    $('#dis').append(
                        '<li class="ss2" id="' + data[i]['distributor_id'] +
                        '" onclick="redirectToDashboard(' + data[i]['distributor_id'] + ')">' +
                        data[i]['dis_name'] +
                        '</li>'
                    );
                    // $('#dis').append('<div class="card bg-info border-primary text-white-50 p-0 "><div class="card-body p-1"><h5 class="mb-1 text-white mb-0" id="' + data[i]['distributor_id'] + '">' + data[i]['dis_name'] + '</h5></div></div>');
                }

            },
            complete: function() {
                $('#loading').hide();
            }
        });

        $.ajax({
            url: "<?php echo $api_url;?>map_apis/get_trackers.php?accesskey=12345",
            method: "GET",
            timeout: 0,
            cache: false,
            success: function(response) {
                // $('.info').append(html);
                var data;
                if (typeof response === "object") {
                    data = response;
                } else {
                    // Otherwise, parse the JSON string
                    try {
                        data = JSON.parse(response);
                    } catch (e) {
                        console.error("Error parsing JSON:", e);
                        return;
                    }
                }

                console.log("Parsed data:", data);
                for (var i = 0; i < data.length; i++) {


                    $('#endu').append('<li onclick="redirectToDashboard(' + data[i]['id'] + ',\'' + data[i]['name'] + '\')" class="ss3" id="' + data[i]['id'] + '">' + data[i][
                        'name'
                    ] + '</li>');
                    // $('#dis').append('<div class="card bg-info border-primary text-white-50 p-0 "><div class="card-body p-1"><h5 class="mb-1 text-white mb-0" id="' + data[i]['distributor_id'] + '">' + data[i]['dis_name'] + '</h5></div></div>');
                }

            },
            complete: function() {
                $('#loading').hide();
            }
        });


        $.ajax({
            url: "<?php echo $api_url;?>get/get_cart_users.php?key=03201232927",
            method: "GET",
            timeout: 0,
            cache: false,
            success: function(response) {
                // $('.info').append(html);
                var data;
                if (typeof response === "object") {
                    data = response;
                } else {
                    // Otherwise, parse the JSON string
                    try {
                        data = JSON.parse(response);
                    } catch (e) {
                        console.error("Error parsing JSON:", e);
                        return;
                    }
                }

                console.log("Parsed data:", data);
                for (var i = 0; i < data.length; i++) {


                    $('#Cartraige_list').append('<li onclick="redirectToDashboard(' + data[i]['id'] + ',\'' + data[i]['name'] + '\')" class="ss3" id="' + data[i]['id'] + '">' + data[i][
                        'name'
                    ] + '</li>');
                    // $('#dis').append('<div class="card bg-info border-primary text-white-50 p-0 "><div class="card-body p-1"><h5 class="mb-1 text-white mb-0" id="' + data[i]['distributor_id'] + '">' + data[i]['dis_name'] + '</h5></div></div>');
                }

            },
            complete: function() {
                $('#loading').hide();
            }
        });

    }

    function redirectToDashboard(distributorId,title) {
        // $('#Dash_title').val(title);
        const baseUrl = "dashboard.php";

        // Get today's date (from)
        const fromDate = new Date();
        const today = fromDate.toISOString().split('T')[0]; // Format: YYYY-MM-DD

        // Get tomorrow's date (to)
        fromDate.setDate(fromDate.getDate() + 1); // Set to tomorrow
        const toDate = fromDate.toISOString().split('T')[0]; // Format: YYYY-MM-DD

        // Construct the URL with the distributor ID, from, and to parameters
        const redirectUrl = `${baseUrl}?id=${distributorId}&from=${today}&to=${toDate}&title=${title}`;

        // Redirect to the URL
        window.location.href = redirectUrl;
    }

    function event_notify() {
    var user_id = "<?php echo $_GET['id']; ?>";
    var url = `<?php echo $api_url; ?>get/get_dashboard_alert_notify.php?accesskey=12345&id=${user_id}`;
    
    console.log(url);

    $.ajax({
        url: url,
        method: "GET",
        dataType: "json", // important! this makes jQuery parse it automatically
        timeout: 0,
        success: function (data) {
            if (data.length > 0) {
                alertify.set('notifier', 'position', 'bottom-right');

                for (var i = 0; i < data.length; i++) {
                    var message = data[i]['type'] + " " + data[i]['message'] + " - " + data[i]['created_at'];
                    alertify.notify(message, "success", 10); // 10 sec notification
                }
            }
        },
        error: function (xhr, status, error) {
            console.error("Notification error:", error);
        }
    });
}


    // Run event_notify() every 10 seconds
    setInterval(event_notify, 10000); // 10,000 ms = 10 sec

    // Call function immediately when page loads
    $(document).ready(function() {
        event_notify();
    });
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>