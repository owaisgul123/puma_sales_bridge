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
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNyJWb04pByaU1CTmimoWNl3b86VV6qZ8&callback=initMap&libraries=drawing&v=weekly"
        defer></script>
    <!-- App favicon -->

    <?php include 'css_script.php'; ?>


</head>

<style>
    .navbar .navbar-item.navbar-dropdown {
        margin-left: auto;
    }

    .layout-px-spacing {
        min-height: calc(100vh - 125px) !important;
    }

    .edits:hover {
        cursor: pointer;
        color: green;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        height: 200px;
        color: #000;
        background-color: #edf5f4;
        /* border: 1px solid green; */
    }

    .nav-pills .nav-link {
        height: 200px;

    }

    i.fa {
        display: inline-block;
        border-radius: 60px;
        box-shadow: 0px 0px 2px #888;
        padding: 0.5em 0.6em;

    }

    #style-4::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #F5F5F5;
    }

    #style-4::-webkit-scrollbar {
        width: 5px;
        background-color: #F5F5F5;
    }

    #style-4::-webkit-scrollbar-thumb {
        background-color: gray;
        border: 2px solid #555555;
    }

    #myInput {
        background-image: url('images/search.png');
        background-position: 10px 12px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
        border: none;
        border-bottom: 1px solid;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        height: 235px !important;
    }
</style>

<body>
    <script>
        var map;
        var markersArray = [];
        var flightPath;
        var flightPlanCoordinates = [];
    </script>
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
                    <div class="container-fluid mt-4">
                        <?php include_once("trip_board_tabs_salesOrder.php"); ?>


                        <div class="row mb-4 mt-3 ">
                            <div class="col-sm-3 col-12 scrollbar" id="style-4" style="height:40vh;overflow:auto">
                                <input type="text" id="myInput" placeholder="Search Vehicle..." title="Type in a name">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <?php echo $category_html; ?>

                                </div>
                            </div>

                            <div class="col-sm-9 col-12" id="style-4" style="height:40vh;overflow:auto">
                                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                    <?php echo $product_html; ?>



                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <div id="map" style="width: 100%; height: 100vh;" class="">
                                </div>
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



        <!-- JAVASCRIPT -->

        <?php include 'script_tags.php'; ?>
        <script>
            // let map;
            // let flightPath;

            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: 30.3753,
                        lng: 69.3451
                    },
                    zoom: 8,
                });
            }
        </script>
        <script>
            var table;
            var type;
            var subtype;


            $(document).ready(function () {

                $("#myInput").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#v-pills-tab a").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
                $('#v-pills-tab a').on('click', function (e) {
                    e.preventDefault()
                    $(this).tab('show')
                })

                // fetchtable();
                $('#add_btn').click(function () {

                    $('#row_id').val("");

                    $('#insert_form')[0].reset();

                });

                $('#insert_form').on("submit", function (event) {
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
                        beforeSend: function () {
                            $('#insert').val("Saving");
                            document.getElementById("insert").disabled = true;

                        },
                        success: function (data) {
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


                                setTimeout(function () {
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

                $('#approved_orders').on("submit", function (event) {
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
                        beforeSend: function () {
                            $('#app_btn').val("Saving");
                            document.getElementById("app_btn").disabled = true;

                        },
                        success: function (data) {
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


                                setTimeout(function () {
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

                $('#ins_orders_update').on("submit", function (event) {
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
                        beforeSend: function () {
                            $('#sp_btn').val("Saving");
                            document.getElementById("sp_btn").disabled = true;

                        },
                        success: function (data) {
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


                                setTimeout(function () {
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

                $(document).on('click', '.approved_check', function () {

                    var id = $(this).attr("id");
                    // alert(employee_id)
                    $('#order_approval').val(id);
                    $('#approved_order_modal').modal('show');
                });

                $(document).on('click', '.insuficient_check', function () {

                    var id = $(this).attr("id");
                    // alert(employee_id)
                    $('#spe_approval').val(id);
                    $('#in_balanced_order_modal').modal('show');
                });

            })



            function fetchtable() {

                var requestOptions = {
                    method: 'GET',
                    redirect: 'follow'
                };
                console.log(
                    "<?php echo $api_url; ?>get/get_all_main_orders.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>"
                )
                fetch("<?php echo $api_url; ?>get/get_all_main_orders.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>",
                    requestOptions)
                    .then(response => response.json())
                    .then(response => {
                        console.log(response)

                        table.clear().draw();
                        $.each(response, function (index, data) {
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

            function view_order(id) {
                if (id != "") {
                    var requestOptions = {
                        method: 'GET',
                        redirect: 'follow'
                    };
                    console.log("<?php echo $api_url; ?>get/get_main_sub_orders.php?key=03201232927&id=" + id + "");
                    fetch("<?php echo $api_url; ?>get/get_main_sub_orders.php?key=03201232927&id=" + id + "",
                        requestOptions)
                        .then(response => response.json())
                        .then(response => {
                            console.log(response)
                            if (response.length > 0) {
                                product_price_backlog.clear().draw();

                                $.each(response, function (index, data) {
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
        <script>
            function my_markers(sub_id, sale_order) {
                // alert(sub_id + ' ' +sale_order);

                var requestOptions = {
                    method: 'GET',
                    redirect: 'follow'
                };
                fetch("<?php echo $api_url; ?>get/puma_sap_order/get_order_co.php?key=03201232927&id=" + sub_id + "",
                    requestOptions)
                    .then(response => response.json())
                    .then(response => {
                        console.log(response[0]);
                        var vehi_id = response[0].vehicle_id;
                        var vehicle_name = response[0].vehicle_name;
                        var v_lat = response[0].d_lat;
                        var v_lng = response[0].d_lng;
                        var time = response[0].time;

                        var dealer_name = response[0].dealer_name;
                        var dealer_co = response[0].dealer_co;
                        var current_status = response[0].current_status;
                        var depo_co = response[0].depo_co;
                        var consignee_name = response[0].consignee_name;
                        var depo_co_parts = depo_co.split(", "); // Split the string using comma as delimiter

                        var depo_lati = depo_co_parts[0];
                        var depo_lngi = depo_co_parts[1];

                        var parts = dealer_co.split(", "); // Split the string using comma as delimiter

                        var d_lati = parts[0];
                        var d_lngi = parts[1];

                        var trip_id = name;
                        // alert(trip_id)
                        deleteMarkers();
                        setMarker_pos(depo_lati, depo_lngi, 2, vehicle_name, consignee_name, 'vlocation', 'time','depo');
                        setMarker_pos(d_lati, d_lngi, 2, vehicle_name, dealer_name, 'vlocation', 'time','dealer');
                        setMarker_users(v_lat, v_lng, vehicle_name, 'altitude', sub_id, time);
                        if (current_status == 'Start') {

                        } else if (current_status == 'Complete') {

                        };
                        deliverd_trip(sale_order, sub_id, vehi_id);

                    })
                    .catch(error => console.log('error', error));


                // $.ajax({
                //     url: 'get_order_co.php',
                //     type: 'POST',
                //     data: {
                //         check: name
                //     },
                //     success: function(data) {
                //         data = JSON.parse(data)

                //         var len = data.length;
                //         //alert("len "+len)
                //         // console.log(data)
                //         for (var i = 0; i <= len; i++) {
                //             var name = data[i][0];
                //             var lat = data[i][1];
                //             var lng = data[i][2];
                //             console.log(lat + " " + lng)
                //             var time = data[i][3];


                //             setMarker_users(lat, lng, name, 'altitude', trip_id, time)


                //             // flightPlanCoordinates.push({lat: lat,lng: lng});
                //             // flightPlanCoordinates.push({lat: pos_lat,lng: pos_lng});
                //             // console.log(flightPlanCoordinates);

                //         }




                //     }
                // });

            }

            function deliverd_trip(salesOrders, id, vehi_id) {
                var requestOptions = {
                    method: 'GET',
                    redirect: 'follow'
                };
                // console.log(
                //     "<?php echo $api_url; ?>get/puma_sap_order/get_delivered_trip.php?key=03201232927&salesOrders=" +
                //     salesOrders + "&id=" + id + "");
                fetch("<?php echo $api_url; ?>get/puma_sap_order/get_delivered_trip.php?key=03201232927&salesOrders=" +
                    salesOrders + "&id=" + id + "",
                    requestOptions)
                    .then(response => response.json())
                    .then(response => {
                        console.log(response[0])
                        if (flightPath) {
                            flightPath.setMap(null);
                            flightPlanCoordinates = [];
                        }
                        if (response.length > 0) {

                            var delivered_status = response[0].delivered_status;
                            var trip_start_time = response[0].trip_start_time;

                            var status = response[0].status;
                            var close_time = response[0].close_time;

                            var end_time = '';
                            if (delivered_status != '0') {
                                if (close_time != "") {
                                    end_time = close_time;

                                } else {

                                    end_time = "<?php echo date('Y-m-d H:i:s'); ?>";

                                }
                                draw_routes(vehi_id, trip_start_time, end_time);

                            } else {
                                if (flightPath) {
                                    flightPath.setMap(null);
                                    flightPlanCoordinates = [];
                                } else {
                                    console.log('Hamza')
                                }
                            }

                        }

                    })
                    .catch(error => console.log('error', error));
            }

            function draw_routes(vehi_id, trip_start_time, end_time) {
                // alert("Hamza")
                var requestOptions = {
                    method: 'GET',
                    redirect: 'follow'
                };
                console.log("<?php echo $api_url; ?>get/puma_sap_order/get_trip_routes.php?key=03201232927&vehicle_id=" +
                    vehi_id + "&start_time=" + trip_start_time + "&end_time=" + end_time +
                    "")
                fetch("<?php echo $api_url; ?>get/puma_sap_order/get_trip_routes.php?key=03201232927&vehicle_id=" +
                    vehi_id + "&start_time=" + trip_start_time + "&end_time=" + end_time +
                    "",
                    requestOptions)
                    .then(response => response.json())
                    .then(data => {
                        var len = data.length;
                        if (len > 0) {
                            // flightPath.setMap(null);
                            if (flightPath) {
                                flightPath.setMap(null);
                            } else {
                                console.log('Hamza')
                            }

                            // Clear the flightPlanCoordinates array
                            flightPlanCoordinates = [];
                            const lineSymbol = {
                                path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                            };


                            var i = 0;
                            const image = "<?php echo $api_url; ?>uploads/rec.png";
                            const start = "<?php echo $api_url; ?>uploads/icon/start1.png";
                            const end = "<?php echo $api_url; ?>uploads/icon/car_red.png";
                            const stops = "<?php echo $api_url; ?>uploads/stop-sign1.png";
                            data.forEach(obj => {

                                var vehicle_name = data[i]['vehicle_name'];
                                var lat = data[i]['latitude'];
                                var lng = data[i]['longitude'];
                                var speed = data[i]['speed'];
                                var time = data[i]['time'];
                                var positiona = new google.maps.LatLng(lat, lng);
                                //console.log("Samad" + i)
                                //console.log(len)
                                if (i == 0) {
                                    //console.log("samad")
                                    var marker = new google.maps.Marker({
                                        position: positiona,
                                        map,
                                        icon: {
                                            url: start,
                                        },


                                    });
                                    markersArray.push(marker);

                                    var infowindow = new google.maps.InfoWindow({
                                        content: '<p>Details:' +
                                            '<p>Vehical # :' +
                                            vehicle_name +
                                            '</p>' + '<p>Latitude:' + lat +
                                            '</p>' +
                                            '<p>Longitude:' + lng + '</p>' +
                                            '<p>' +
                                            '</p>' + '<p>Start Time:' +
                                            time + '</p>'
                                    });
                                    marker.addListener('click', function () {
                                        infowindow.open(map, marker);
                                    });
                                }




                                var lati = parseFloat(lat)
                                var lngi = parseFloat(lng)
                                var position = new google.maps.LatLng(lat, lng);
                                flightPlanCoordinates.push({
                                    lat: lati,
                                    lng: lngi
                                });
                                map.setCenter(position);
                                map.setZoom(12)

                                // //console.log(route_data);
                                i++;

                            });
                            //console.log(flightPlanCoordinates);

                            flightPath = new google.maps.Polyline({
                                path: flightPlanCoordinates,
                                geodesic: true,
                                strokeColor: "#FF0000",
                                strokeOpacity: 1.0,
                                strokeWeight: 2,
                                icons: [{
                                    icon: lineSymbol,
                                    offset: "100%",
                                    repeat: '30px',
                                },],

                            });

                            flightPath.setMap(map);
                        } else {
                            alert("Data Not Found");

                        }

                    })
                    .catch(error => console.log('error', error));
            }

            function my_markers_line(name, consignee_name, lat, lng, start_date, current_time) {
                // alert("Running " + name);
                var date;
                if (current_time === "") {
                    date = moment().format('YYYY-MM-DD HH:mm:ss');

                } else {
                    date = current_time;
                }

                // console.log(date)
                var d_lati = lat;
                var d_lngi = lng;

                var trip_id = name;
                deleteMarkers();
                setMarker_pos(d_lati, d_lngi, 2, name, consignee_name, 'vlocation', 'time')

                $.ajax({
                    url: 'get_trip_position.php',
                    type: 'POST',
                    data: {
                        check: name
                    },
                    success: function (data) {
                        data = JSON.parse(data)

                        var len = data.length;
                        //alert("len "+len)
                        // console.log(data)
                        for (var i = 0; i <= len; i++) {
                            var name = data[i][0];
                            var lat = data[i][1];
                            var lng = data[i][2];
                            // console.log(lat + " " + lng)
                            var time = data[i][3];


                            setMarker_users(lat, lng, name, 'altitude', trip_id, time)




                        }




                    }
                });




            }



            function setMarker_users(lat, lng, device_id, vehicle_name, trip_id, time) {
                //removeMarker(markerId);
                ids = device_id;


                const image = "<?php echo $api_url; ?>uploads/icon/car_icon_blue.png";
                const fimage = "<?php echo $api_url; ?>uploads/icon/car_icon_green.png";
                const nr = "<?php echo $api_url; ?>uploads/icon/car_red.png";


                const mark = fimage;

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat, lng),
                    id: ids,
                    animation: google.maps.Animation.DROP,
                    map: map,
                    icon: {
                        labelOrigin: new google.maps.Point(11, 50),
                        url: mark,

                        //size: new google.maps.Size(22, 40),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(11, 40),
                    },
                });
                var latLng = marker.getPosition(); // returns LatLng object
                // map.setCenter(latLng);
                map.setZoom(11);
                map.panTo(latLng);
                markersArray.push(marker);



                var infowindow = new google.maps.InfoWindow({
                    content: '<p>Details:' + '<p>Vehical # :' + device_id + '</p>' + '<p>Trip ID # :' +
                        trip_id +
                        '</p>' + '<p>Last:' + time + '</p>'
                });
                marker.addListener('click', function () {
                    infowindow.open(map, marker);
                });
            }

            function setMarker_pos(lat, lng, speeds, device_id, consignee_name, location, last_time,mars) {
                //removeMarker(markerId);
                ids = device_id;
                // alert("Saa "+lat)
                var speed = speeds;
                var image = '';

                if(mars!='depo'){
                     image = "<?php echo $api_url; ?>uploads/pump.png";

                }
                else{
                    image = "https://cdn-icons-png.freepik.com/512/1899/1899143.png";

                }

                const fimage = "<?php echo $api_url; ?>uploads/pump.png";
                const nr = "<?php echo $api_url; ?>uploads/pump.png";
                // const mark = (speed > 0) ? fimage : image;
                var diffDays = 20;

                // var server_time = moment(last_time).format('MM/DD/YYYY hh:mm A');
                // var current_time = moment().format('MM/DD/YYYY hh:mm A');
                // var a = moment(server_time, 'MM/DD/YYYY hh:mm A');
                // var b = moment(current_time, 'MM/DD/YYYY hh:mm A');
                // var diffDays = b.diff(a, 'minutes');
                // alert(diffDays ) ;

                const mark = speed > 0 ? fimage : (diffDays > 1440 ? nr : image);

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat, lng),
                    id: ids,
                    animation: google.maps.Animation.DROP,
                    map: map,
                    icon: {
                        labelOrigin: new google.maps.Point(11, 50),
                        url: image,

                        scaledSize: new google.maps.Size(40, 40) 
                    },
                });
                // var latLng = marker.getPosition(); // returns LatLng object
                // map.setCenter(latLng);
                markersArray.push(marker);
                // allMyMarkers.push( marker );

                // var index = map.markers.length;
                // map.markers.push(marker /* new Point(map.markers.length, location.lat(), location.lng())*/ );
                // console.log(JSON.stringify(map.markers.length));
                /* var temp_marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat, lng),
                });
                temp_marker.setMap(map);
                temp_marker.metadata = {
                    id: markerId
                };
                markers[markerId] = temp_marker; */
                var infowindow = new google.maps.InfoWindow({
                    content: '<p>Details:' + '<p>Name # :' + consignee_name + '</p>'
                });
                marker.addListener('click', function () {
                    infowindow.open(map, marker);
                });
            }



            function setMapOnAll(map) {
                for (let i = 0; i < markersArray.length; i++) {
                    markersArray[i].setMap(map);
                }

                // flightPath.setMap(map);


            }

            function deleteMarkers() {
                hideMarkers();
                markersArray = [];
            }

            function hideMarkers() {
                // flightPath.setMap(null);

                setMapOnAll(null);
            }
        </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>