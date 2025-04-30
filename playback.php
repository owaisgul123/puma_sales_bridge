<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Playback |
        <?php echo $_SESSION['user_name']; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNyJWb04pByaU1CTmimoWNl3b86VV6qZ8&callback=initMap&libraries=drawing&v=weekly"
        defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <!-- App favicon -->

    <?php include 'css_script.php'; ?>


</head>
<style>
    .password-container {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .password-input {
        padding-right: 30px;
        /* Space for the show/hide button */
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .highlight_class {
        background-color: #9f68a3 !important;
    }
</style>

<style>
    .activity-wid .activity-list {
        padding: 0 !important;
    }
</style>

<body>
    <script>
        // console.log(circle_cord);

        var route_data = [];
        var markersArray = [];
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
        <?php include 'right_siebar.php'; ?>

        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6">
                            <button class="btn btn-soft-primary waves-effect waves-light" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" id="add_btn"
                                aria-controls="offcanvasRight"><i
                                    class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer"></i>Playback</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container-fluid">



                            <div class="row d-none">
                                <div class="col-md-4">
                                    <button id="playBtn" class="btn btn-success poly_btn" onclick="play()">Play</button>
                                    <button id="pauseBtn" class="btn btn-danger poly_btn"
                                        onclick="pause()">Pause</button>
                                    <button id="resetBtn" class="btn btn-info poly_btn" onclick="reset()">Reset</button>
                                    <button id="backwordBtn" class="btn btn-warning poly_btn"
                                        onclick="backward()">Backward</button>
                                    <button id="fowardBtn" class="btn btn-warning poly_btn"
                                        onclick="forward()">Forward</button>


                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4">

                                    <div class="card">
                                        <div class="card-header align-items-center ">
                                            <h4 class="card-title mb-0 flex-grow-1">Playback Activity</h4>
                                            <h4 class="card-title mb-0 flex-grow-1">Vehicle Name : <span
                                                    id="vehicle_id_no"
                                                    style="color: maroon;font-style: italic;">------</span></h4>
                                            <h4 class="card-title mb-0 flex-grow-1">Moving Status : <span
                                                    id="playing_status"
                                                    style="color: maroon;font-style: italic;">Stop...</span></h4>


                                        </div><!-- end card header -->

                                        <div class="card-body px-0">
                                            <div class="px-3 scrolling_top" data-simplebar>
                                                <ul class="list-unstyled activity-wid mb-0" id="my_list"
                                                    style="overflow: auto;height: 50vh;">


                                                </ul>
                                            </div>
                                        </div>

                                        <!-- end card body -->
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div id="map-canvas" style="width: 100%; height: 100vh; z-index: 0;" class="">

                                    </div>
                                </div>
                            </div>
                            <!-- end row-->





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
            <h5 id="offcanvasRightLabel">Playback</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mb-3">





                            <div class="form-group col-md-12">
                                <label for="inputAddress">Asset</label>

                                <select class="form-control" data-trigger name="vehi_id" id="vehi_id"
                                    placeholder="Search Asset">
                                    <option value="">Select Asset</option>

                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">From</label>
                                <input type="datetime-local" class="form-control " id="from" name="from" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">To</label>
                                <input type="datetime-local" class="form-control " id="to" name="to" required>
                            </div>
                        </div>




                        <div class="mb-3 text-center">
                            <button type="button" class="btn btn-primary" id="drawing"
                                onclick="myFunction()">Playback</button>

                        </div>



                        <div class="col-md-12 mt-4">
                            <button type="button" class="btn btn-primary" id="removing" onclick="remove_line()"
                                style="float:right; display: none">Remove</button>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->

    <?php include 'script_tags.php'; ?>

    <script>
        var table;
        var type;
        var subtype;
        $(document).ready(function () {
            // $('.js-example-basic-multiple').select2();
            load_all_select();






        })

        function load_all_select() {

            $.ajax({
                url: '<?php echo $api_url; ?>get/get_all_vehicles.php?key=03201232927',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#vehi_id').empty();
                    $('#vehi_id').append($('<option>', {
                        value: '',
                        text: 'Select'
                    }));
                    // Iterate through the data and append options to the select element
                    $.each(data, function (index, item) {
                        $('#vehi_id').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });

                    // Refresh the Select2 element to display the newly added options
                    $('#tm').trigger('change.select2');
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                }
            });






        }
    </script>

    <script>
        let map;
        var circle;
        let flightPath;

        var poly_marker;
        var line;
        var intervalId;
        var index = 0;
        var currentIndex = 0;
        var isPlaying = false;
        var infowindow;
        var opened_info_dis;

        function initMap() {

            gmarkers = [];
            map = new google.maps.Map(document.getElementById("map-canvas"), {
                center: {
                    lat: 30.3753,
                    lng: 69.3451
                },
                zoom: 6,

            });


            opened_info_dis = new google.maps.InfoWindow();




        }

        function remove_line() {
            $("#my_list").empty();
            flightPath.setMap(null);
            setMapOnAll(null);
            markersArray = [];
            document.getElementById("removing").style.display = 'none';
            document.getElementById("drawing").disabled = false;
        }

        function setMapOnAll(map) {
            for (let i = 0; i < markersArray.length; i++) {
                markersArray[i].setMap(map);
            }
        }
    </script>

    <script>
        var startTime;
        var pre_time = 0;
        var end_time;
        var hours;
        var sum_hours = 0;
        var flightPlanCoordinates = [];
        var other_data = [];
        var vehicle = "";
        var stop_starttime;

        function myFunction() {
            document.getElementById("drawing").disabled = true;

            vehicle = document.getElementById("vehi_id").value;

            var selectElement = document.getElementById("vehi_id");
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var selectedText = selectedOption.text;
            // alert(selectedText)

            var from_ = document.getElementById("from").value;
            var to_ = document.getElementById("to").value;
            const format1 = "YYYY-MM-DD HH:mm:ss";

            var from = moment(from_).format(format1);
            var to = moment(to_).format(format1);
            // alert(vehicle + " " + from + " " + to);
            var save_first = [];
            var save_first_val = 0;
            var stop_lat = '';
            var stop_lng = '';
            var stop_time = '';
            var stop_start_time = '';
            var stop_location = '';
            const lineSymbol = {
                path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
            };
            const image = "http://151.106.17.246:8080/OMCS-CMS-APIS/uploads/rec.png";
            const start = "http://151.106.17.246:8080/OMCS-CMS-APIS/uploads/icon/car_icon_blue.png";
            const end = "http://151.106.17.246:8080/OMCS-CMS-APIS/uploads/icon/car_red.png";
            const stops = "http://151.106.17.246:8080/OMCS-CMS-APIS/uploads/stop-sign1.png";
            const running = "http://151.106.17.246:8080/OMCS-CMS-APIS/uploads/icon/car_icon_green.png";
            var div = '';
            if (vehicle != "" && from_ != "" && to_ != "") {
                flightPlanCoordinates = [];
                other_data = [];
                // drawing
                // console.log("http://119.160.107.173:3002/positions2/" + vehicle + "/" + from + "/" + to + "");
                $.ajax({
                    url: "<?php echo $api_url; ?>get/puma_sap_order/get_trip_routes.php?key=03201232927&vehicle_id=" +
                        vehicle + "&start_time=" + from + "&end_time=" + to +
                        "",
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function () {
                        // $('#insert').val("Updating");
                        $('#loader').show();
                        $("#drawing").prop("disabled", true);
                    },
                    success: function (data) {

                        // data = JSON.parse(data);
                        // console.log(data)
                        var len = data.length;
                        $("#my_list").empty();

                        if (len > 0) {
                            document.getElementById("vehicle_id_no").innerHTML = selectedText;

                            document.getElementById("removing").style.display = 'block';
                            $('.poly_btn').prop('disabled', false);

                            // document.getElementById("drawing").disabled = true;



                            var i = 0;


                            data.forEach(obj => {

                                var vehicle_name = '';
                                var lat = data[i].latitude;
                                var lng = data[i].longitude;
                                var speed = data[i].speed;
                                var power = data[i].power;
                                var location = data[i].address;
                                // var time = moment(data[i].time).format(format1);
                                var time = data[i].time;
                                var MessageId = data[i].id;
                                console.log(data[i])


                                var bg_class = "";
                                if (power == '0' && speed == 0) {
                                    bg_class = "bg-danger";
                                } else {
                                    bg_class = "bg-success";

                                }


                                div += '<li id="list_' + i + '" class="activity-list p-2 ' + bg_class +
                                    ' remove_highlight"' +
                                    'style="padding: 10px !important;"' +
                                    'onclick="focus_on_map(' + lat + ',' + lng + ',' +
                                    i +
                                    ',' + data[i].id + ')"' +
                                    ' style="cursor: pointer">' +
                                    ' <div class=".container-fluid">' +
                                    ' <div class="row">' +
                                    '<div class="col-md-5">' +
                                    ' <p class="font-size-14 mb-1 font-bold"' +
                                    ' style="font-weight: bold;">' + time + '</p>' +
                                    ' </div>' +
                                    ' <div class="col-md-2">' +
                                    ' <p class="font-size-14 mb-1" style="font-weight: bold;">' +
                                    speed +
                                    ' Km/hr' +
                                    ' </p>' +
                                    ' </div>' +
                                    ' <div class="col-md-5">' +
                                    '<p class="font-size-14 mb-1" style="font-weight: bold;">' +
                                    ' ' + lat + ' , ' + lng + '' +
                                    ' </div>' +

                                    ' </div>' +
                                    ' </div>' +
                                    ' </li>';



                                // console.log(lat)
                                // console.log(speed)
                                // console.log(power)
                                // console.log(time)

                                other_data.push({
                                    name: selectedText,
                                    speed: speed,
                                    power: power,
                                    location: location,
                                    time: time,
                                    MessageId: MessageId,
                                });

                                var positiona = new google.maps.LatLng(lat, lng);
                                if (i == 0) {
                                    var marker = new google.maps.Marker({
                                        position: positiona,
                                        map,
                                        icon: {
                                            url: start,
                                        },


                                    });
                                    markersArray.push(marker);

                                    var infowindow = new google.maps.InfoWindow({
                                        content: '<p>Details:' + '<p>Vehical # :' +
                                            selectedText +
                                            '</p>' + '<p>Start Location # :' + location +
                                            '</p>' + '<p>Latitude:' + lat + '</p>' +
                                            '<p>Longitude:' + lng + '</p>' + '<p>speed:' +
                                            speed +
                                            '</p>' + '<p>Last:' + time + '</p>'
                                    });
                                    marker.addListener('click', function () {
                                        infowindow.open(map, marker);
                                    });
                                }

                                if (power == '0' && speed == 0) {
                                    var starting = time;
                                    var datetime1, datetime2;
                                    // console.log("starting " + starting);
                                    // console.log("pre " + pre_time);

                                    if (save_first_val == 0) {
                                        stop_lat = lat;
                                        stop_lng = lng;
                                        stop_time = time;
                                        stop_location = location;

                                    }
                                    save_first_val++;


                                    if (i == 0) {
                                        startTime = starting;

                                        var now = moment(startTime); //todays date
                                        var ends = moment(pre_time);
                                        var duration = moment.duration(now.diff(ends));
                                        hours = duration.asMinutes();
                                        // console.log(hours)
                                        pre_time = startTime;
                                    } else {
                                        startTime = starting;

                                        var now = moment(startTime); //todays date
                                        var ends = moment(pre_time);
                                        const format1 = "YYYY-MM-DD HH:mm:ss"
                                        datetime1 = now.format(format1);
                                        datetime2 = moment(pre_time).format(format1);
                                        var duration = moment.duration(now.diff(ends));
                                        hours = duration.asMinutes();
                                        // console.log(hours)
                                        sum_hours = hours + sum_hours;
                                        pre_time = startTime;
                                    }




                                } else {
                                    save_first_val = 0;
                                    stop_start_time = time;
                                    var datetime1 = stop_start_time;
                                    var datetime2 = stop_time;

                                    // Parse the datetime strings into JavaScript Date objects

                                    if (sum_hours > 1) {
                                        var date1 = new Date(datetime1);
                                        var date2 = new Date(datetime2);

                                        // Calculate the time difference in milliseconds
                                        var timeDifferenceMillis = date1 - date2;

                                        // Convert milliseconds to minutes
                                        var timeDifferenceMinutes = timeDifferenceMillis / (1000 * 60);

                                        // console.log("Time difference in minutes:", timeDifferenceMinutes);
                                        if (timeDifferenceMinutes > 0) {
                                            var marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(stop_lat,
                                                    stop_lng),
                                                map,
                                                icon: {
                                                    url: stops,
                                                },


                                            });
                                            markersArray.push(marker);

                                            var duration = moment.duration(timeDifferenceMinutes,
                                                'minutes');
                                            var hours = duration.hours();
                                            var minutesRemaining = duration.minutes();

                                            var formattedResult = moment({
                                                hours: hours,
                                                minutes: minutesRemaining
                                            }).format('HH:mm');
                                            var infowindow = new google.maps.InfoWindow({
                                                content: '<p>Details:' + '<p>Vehical # :' +
                                                    selectedText +
                                                    '</p>' + '<p>Stop Time # :' + stop_time +
                                                    '</p>' + '<p>Start Time # :' +
                                                    stop_start_time +
                                                    '</p>' + '<p>Stop Location # :' +
                                                    stop_location +
                                                    '</p>' + '<p>Latitude:' + stop_lat +
                                                    '</p>' +
                                                    '<p>Longitude:' + stop_lng + '</p>' +
                                                    '<p>Last:' + time + '</p>' +
                                                    '<p>Stop Duration:' + formattedResult +
                                                    ' Minutes' + '</p>'
                                            });
                                            marker.addListener('click', function () {
                                                infowindow.open(map, marker);
                                            });
                                        }


                                    }
                                    sum_hours = 0;
                                    pre_time = time;
                                }

                                if (i == len - 1) {
                                    var marker = new google.maps.Marker({
                                        position: positiona,
                                        map,
                                        icon: {
                                            url: end,
                                        },

                                    });
                                    markersArray.push(marker);
                                    var infowindow = new google.maps.InfoWindow({
                                        content: '<p>Details:' + '<p>Vehical # :' +
                                            selectedText +
                                            '</p>' + '<p>End Location # :' + location +
                                            '</p>' + '<p>Latitude:' + lat + '</p>' +
                                            '<p>Longitude:' + lng + '</p>' + '<p>speed:' +
                                            speed +
                                            '</p>' + '<p>Last:' + time + '</p>'
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

                                i++;

                            });


                        } else {
                            alert("Data Not Found");
                            document.getElementById("drawing").disabled = false;
                            $('.poly_btn').prop('disabled', true);


                        }


                    },
                    complete: function () {
                        console.log("hamza");
                        console.log(flightPlanCoordinates)
                        flightPath = new google.maps.Polyline({
                            path: flightPlanCoordinates,
                            geodesic: true,
                            strokeColor: "#0008ff",
                            strokeOpacity: 1.0,
                            strokeWeight: 2,
                            icons: [{
                                icon: lineSymbol,
                                offset: "100%",
                                repeat: '100px',
                            },],

                        });

                        flightPath.setMap(map);
                        poly_marker = new google.maps.Marker({
                            position: flightPlanCoordinates[0],
                            map: map,
                            icon: {
                                url: running,
                                //                 url: 'https://maps.google.com/mapfiles/kml/shapes/truck.png',
                                // scaledSize: new google.maps.Size(50, 50)
                            },
                            title: 'poly_marker'
                        });
                        infowindow = new google.maps.InfoWindow({
                            content: 'Starting point'
                        });

                        // Attach infowindow to marker
                        poly_marker.addListener('click', function () {
                            infowindow.open(map, poly_marker);
                        });

                        markersArray.push(poly_marker);
                        $('#my_list').append(div);















                        $('#loader').hide();

                    }
                });

            } else {
                alert("Please Select Field")
                document.getElementById("drawing").disabled = false;
                $('.poly_btn').prop('disabled', true);


            }
        }


        function animateMarker() {

            if (currentIndex === flightPlanCoordinates.length) {
                clearInterval(intervalId);
                currentIndex = 0;
                isPlaying = false;
                return;
            }
            // $("#list_"+currentIndex+"").focus();
            poly_marker.setPosition(flightPlanCoordinates[currentIndex]);
            //get_location_name(flightPlanCoordinates[currentIndex].lat, flightPlanCoordinates[currentIndex].lng)
            //tracker(vehicle, other_data[currentIndex].MessageId)

            var info_data = '<p>Details</p>' + '<p>Vehical # :' + other_data[currentIndex].name + '</p>' +
                '<p>Latitude:' + flightPlanCoordinates[currentIndex].lat + '</p>' +
                '<p>Longitude:' + flightPlanCoordinates[currentIndex].lng + '</p>' +
                '<p>Speed:' + other_data[currentIndex].speed + ' km/hr</p>' +
                '<p>Time:' + other_data[currentIndex].time + '</p><p >Location: <span class="set_location">' + other_data[
                    currentIndex].location + '</span></p>';
            infowindow.setContent(info_data);
            map.panTo(flightPlanCoordinates[currentIndex]);

            $('.remove_highlight').removeClass('highlight_class');
            $('#list_' + currentIndex + '').addClass('highlight_class');

            // var itemId = $(this).attr('id');

            // scroll down to the clicked item
            // $('.simplebar-content-wrapper').animate({
            //   scrollTop: $('#list_' + currentIndex + '').offset().top + ($('.simplebar-content-wrapper').outerWidth() / 2)
            // });

            currentIndex++;
        }

        function play() {
            if (isPlaying == false) {
                isPlaying = true;
                document.getElementById("playing_status").innerHTML = "Playing...";
                intervalId = setInterval(animateMarker, 500);
            }
            // intervalId = setInterval(animateMarker, 0.05);
        }

        function pause() {
            clearInterval(intervalId);
            document.getElementById("playing_status").innerHTML = "Pause..."
            isPlaying = false;
        }

        function reset() {
            pause();
            document.getElementById("playing_status").innerHTML = "Stop..."
            currentIndex = 0;
            poly_marker.setPosition(flightPlanCoordinates[currentIndex]);
            infowindow.setContent('Starting Point');

            map.panTo(flightPlanCoordinates[currentIndex]);

            // console.log(flightPlanCoordinates[currentIndex])

            clearInterval(intervalId);
            isPlaying = false;
        }

        function forward() {

            if (currentIndex < flightPlanCoordinates.length - 1) {
                pause();
                document.getElementById("playing_status").innerHTML = "Farwarding..."
                // console.log(flightPlanCoordinates[currentIndex].lat)
                // currentIndex++;
                currentIndex += 1;
                $('.remove_highlight').removeClass('highlight_class');
                $('#list_' + currentIndex + '').addClass('highlight_class');

                // var targetOffset = $('#list_' + currentIndex + '').offset() .top; // Calculate the top offset of the focused list item
                // var containerOffset = $('#my_list').offset().top; // Calculate the top offset of the list container
                // var scrollPosition = targetOffset - containerOffset; // Calculate the scroll position relative to the container

                // $('#my_list').scrollTop(scrollPosition);
                // $('#list_' + currentIndex + '').prependTo('#my_list')

                var index = $('#list_' + currentIndex + '').index(); // Get the index of the focused list item
                var listItemHeight = $('#list_' + currentIndex + '').outerHeight(true); // Get the height of each list item
                var scrollPosition = index * listItemHeight; // Calculate the scroll position based on the index

                $('#my_list').scrollTop(scrollPosition);

                //     var itemTop = $('#list_' + currentIndex + '').offset().top;

                // // Scroll to the selected list item
                // $('.simplebar-content').animate({
                //   scrollTop: itemTop
                // }, 500);


                poly_marker.setPosition(flightPlanCoordinates[currentIndex]);
                //get_location_name(flightPlanCoordinates[currentIndex].lat, flightPlanCoordinates[currentIndex].lng)
                //tracker(vehicle, other_data[currentIndex].MessageId)
                var info_data = '<p>Details</p>' + '<p>Vehical # :' + other_data[currentIndex].name + '</p>' +
                    '<p>Latitude:' + flightPlanCoordinates[currentIndex].lat + '</p>' +
                    '<p>Longitude:' + flightPlanCoordinates[currentIndex].lng + '</p>' +
                    '<p>Speed:' + other_data[currentIndex].speed + ' km/hr</p>' +
                    '<p>Time:' + other_data[currentIndex].time + '</p><p >Location: <span class="set_location">' +
                    other_data[currentIndex].location + '</span></p>';
                infowindow.setContent(info_data);

                map.panTo(flightPlanCoordinates[currentIndex]);

                isPlaying = false;
            }
        }

        function fast_forward() {

            if (currentIndex < flightPlanCoordinates.length - 1) {
                pause();
                document.getElementById("playing_status").innerHTML = "Fast Farwarding..."
                // console.log(flightPlanCoordinates[currentIndex].lat)
                // currentIndex++;

                currentIndex += 50;
                $('.remove_highlight').removeClass('highlight_class');
                $('#list_' + currentIndex + '').addClass('highlight_class');

                var index = $('#list_' + currentIndex + '').index(); // Get the index of the focused list item
                var listItemHeight = $('#list_' + currentIndex + '').outerHeight(true); // Get the height of each list item
                var scrollPosition = index * listItemHeight; // Calculate the scroll position based on the index

                $('#my_list').scrollTop(scrollPosition);

                poly_marker.setPosition(flightPlanCoordinates[currentIndex]);
                //get_location_name(flightPlanCoordinates[currentIndex].lat, flightPlanCoordinates[currentIndex].lng)
                //tracker(vehicle, other_data[currentIndex].MessageId)
                var info_data = '<p>Details</p>' + '<p>Vehical # :' + other_data[currentIndex].name + '</p>' +
                    '<p>Latitude:' + flightPlanCoordinates[currentIndex].lat + '</p>' +
                    '<p>Longitude:' + flightPlanCoordinates[currentIndex].lng + '</p>' +
                    '<p>Speed:' + other_data[currentIndex].speed + ' km/hr</p>' +
                    '<p>Time:' + other_data[currentIndex].time + '</p><p >Location: <span class="set_location">' +
                    other_data[currentIndex].location + '</span></p>';
                infowindow.setContent(info_data);

                map.panTo(flightPlanCoordinates[currentIndex]);

                isPlaying = false;
            }
        }

        function backward() {
            if (currentIndex > 0) {
                pause();
                document.getElementById("playing_status").innerHTML = "Backwarding..."
                // currentIndex--;
                currentIndex -= 1;
                $('.remove_highlight').removeClass('highlight_class');
                $('#list_' + currentIndex + '').addClass('highlight_class');

                var index = $('#list_' + currentIndex + '').index(); // Get the index of the focused list item
                var listItemHeight = $('#list_' + currentIndex + '').outerHeight(true); // Get the height of each list item
                var scrollPosition = index * listItemHeight; // Calculate the scroll position based on the index

                $('#my_list').scrollTop(scrollPosition);

                poly_marker.setPosition(flightPlanCoordinates[currentIndex]);
                //get_location_name(flightPlanCoordinates[currentIndex].lat, flightPlanCoordinates[currentIndex].lng)
                //tracker(vehicle, other_data[currentIndex].MessageId)

                var info_data = '<p>Details</p>' + '<p>Vehical # :' + other_data[currentIndex].name + '</p><p>Location:' +
                    //get_location_name(flightPlanCoordinates[currentIndex].lat, flightPlanCoordinates[currentIndex].lng) +
                    '</p>' +
                    '<p>Latitude:' + flightPlanCoordinates[currentIndex].lat + '</p>' +
                    '<p>Longitude:' + flightPlanCoordinates[currentIndex].lng + '</p>' +
                    '<p>Speed:' + other_data[currentIndex].speed + ' km/hr</p>' +
                    '<p>Time:' + other_data[currentIndex].time + '</p><p >Location: <span class="set_location">' +
                    other_data[currentIndex].location + '</span></p>';
                infowindow.setContent(info_data);

                map.panTo(flightPlanCoordinates[currentIndex]);
                isPlaying = false;

            }
        }

        function fast_backward() {
            if (currentIndex > 0) {
                pause();
                document.getElementById("playing_status").innerHTML = "Fast Backwarding..."
                // currentIndex--;
                currentIndex -= 50;
                $('.remove_highlight').removeClass('highlight_class');
                $('#list_' + currentIndex + '').addClass('highlight_class');

                var index = $('#list_' + currentIndex + '').index(); // Get the index of the focused list item
                var listItemHeight = $('#list_' + currentIndex + '').outerHeight(true); // Get the height of each list item
                var scrollPosition = index * listItemHeight; // Calculate the scroll position based on the index

                $('#my_list').scrollTop(scrollPosition);

                poly_marker.setPosition(flightPlanCoordinates[currentIndex]);
                //get_location_name(flightPlanCoordinates[currentIndex].lat, flightPlanCoordinates[currentIndex].lng)
                //tracker(vehicle, other_data[currentIndex].MessageId)

                var info_data = '<p>Details</p>' + '<p>Vehical # :' + other_data[currentIndex].name + '</p><p>Location:' +
                    //get_location_name(flightPlanCoordinates[currentIndex].lat, flightPlanCoordinates[currentIndex].lng) +
                    '</p>' +
                    '<p>Latitude:' + flightPlanCoordinates[currentIndex].lat + '</p>' +
                    '<p>Longitude:' + flightPlanCoordinates[currentIndex].lng + '</p>' +
                    '<p>Speed:' + other_data[currentIndex].speed + ' km/hr</p>' +
                    '<p>Time:' + other_data[currentIndex].time + '</p><p >Location: <span class="set_location">' +
                    other_data[currentIndex].location + '</span></p>';
                infowindow.setContent(info_data);

                map.panTo(flightPlanCoordinates[currentIndex]);
                isPlaying = false;

            }
        }

        function focus_on_map(lat, lng, index, MessageId) {

            $('.remove_highlight').removeClass('highlight_class');
            $('#list_' + index + '').addClass('highlight_class');

            if (index > 0) {
                pause();
                document.getElementById("playing_status").innerHTML = "Jump..."
                currentIndex = index;
                // currentIndex--;
                poly_marker.setPosition(flightPlanCoordinates[currentIndex]);
                //get_location_name(flightPlanCoordinates[currentIndex].lat, flightPlanCoordinates[currentIndex].lng)
                //tracker(vehicle, MessageId)

                var info_data = '<p>Details</p>' + '<p>Vehical # :' + other_data[currentIndex].name + '</p><p>Location:' +
                    //get_location_name(flightPlanCoordinates[currentIndex].lat, flightPlanCoordinates[currentIndex].lng) +
                    '</p>' +
                    '<p>Latitude:' + flightPlanCoordinates[currentIndex].lat + '</p>' +
                    '<p>Longitude:' + flightPlanCoordinates[currentIndex].lng + '</p>' +
                    '<p>Speed:' + other_data[currentIndex].speed + ' km/hr</p>' +
                    '<p>Time:' + other_data[currentIndex].time + '</p><p >Location: <span class="set_location">' +
                    other_data[currentIndex].location + '</span></p>';
                infowindow.setContent(info_data);

                map.panTo(flightPlanCoordinates[currentIndex]);
                isPlaying = false;

            }


        }

        function showInfo_dis(event) {
            opened_info_dis.close();
            if (opened_info_dis.name != this.infowindow.name) {
                this.infowindow.setPosition(event.latLng);
                this.infowindow.open(map);
                opened_info_dis = this.infowindow;
            } else {
                this.infowindow.setPosition(event.latLng);
                this.infowindow.open(map);
                opened_info_dis = this.infowindow;
            }
        }



        document.addEventListener("keydown", function (event) {

            if (event.keyCode === 40) {
                // event.preventDefault(); // Left arrow key
                // Call function for left arrow key
                backward();

                // list.scrollTop(currentScrollTop - listItemHeight);
                event.preventDefault();
            } else if (event.keyCode === 38) {
                // event.preventDefault();// Right arrow key
                // Call function for right arrow key
                forward();
                // list.scrollTop(currentScrollTop + listItemHeight);
                event.preventDefault();
            } else if (event.keyCode === 32) {
                // event.preventDefault(); // Space key
                if (isPlaying) {
                    // Call pause function
                    pause();
                    event.preventDefault();
                } else {
                    // Call play function
                    play();
                    event.preventDefault();
                }
            } else if (event.keyCode === 27) {
                // event.preventDefault();// Right arrow key
                // Call function for right arrow key
                reset();
                event.preventDefault();
            } else if (event.keyCode === 33) {
                // event.preventDefault();// Right arrow key
                // Call function for right arrow key
                fast_forward();
                // list.scrollTop(currentScrollTop + listItemHeight);
                event.preventDefault();
            } else if (event.keyCode === 34) {
                // event.preventDefault();// Right arrow key
                // Call function for right arrow key
                fast_backward();
                // list.scrollTop(currentScrollTop + listItemHeight);
                event.preventDefault();
            }

        });



        function get_location_name(lat, lng) {
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            fetch("http://119.160.107.173:3002/location_name/" + lat + "/" + lng + "", requestOptions)
                .then(response => response.json())
                .then(result => {
                    // console.log(result[0]['location']);
                    $(".set_location").text(result[0]['location']);
                    // return result[0]['location'];
                })
                .catch(error => console.log('error', error));

        }

        function tracker(foc, latest_pos1) {
            var settings = {
                "url": "http://119.160.107.173:3002/tracker/" + foc + "/" + latest_pos1 + "",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function (response1) {
                const myJSON = JSON.stringify(response1);
                const data2 = JSON.parse(myJSON);
                // const data2 = response1;
                // console.log('Tracker '+data2.length);
                // cons
                var row = "";
                for (a = 0; a < data2.length; a++) {

                    row +=
                        '<div class="row">' +
                        '<div class="col-3 ">' +
                        '<p class="font-weight-bold"> <b>' + data2[a]['Name'] + '</b> </p>' +
                        '</div>' +

                        '<div class="col-3  ">' +
                        '<p class="font-size-12 font-weight-bold"' +
                        'style="color:rgb(11, 167, 11)"><b>' + data2[a]['Value'] + '</b></p>' +
                        '</div>' +
                        '<div class="col-3  ">' +
                        '<p class="font-size-12 font-weight-bold"' +
                        'style="color:rgb(11, 167, 11)"><b>' + data2[a]['Min'] + '</b></p>' +
                        '</div>' +
                        '<div class="col-3  ">' +
                        '<p class="font-size-12 font-weight-bold"' +
                        'style="color:rgb(11, 167, 11)"><b>' + data2[a]['Max'] + '</b></p>' +
                        '</div>' +
                        '</div>'
                    // row.replace('undefined','');
                    // console.log(row);
                }
                document.getElementById("tracker").innerHTML = row;

            });
        }

        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        var pre = "<?php echo $_SESSION['privilege'] ?>";
        var user_id = "<?php echo $_SESSION['user_id'] ?>";
        fetch("<?php echo $api_url; ?>get/dealers.php?key=03201232927&pre=" + pre + "&user_id=" + user_id + "",
            requestOptions)
            .then(response => response.json())
            .then(response => {

                $.each(response, function (index, data) {
                    console.log(data)
                    var co = data.co_ordinates;
                    var name = data.name;
                    var depo_co_parts = co.split(", "); // Split the string using comma as delimiter

                    var depo_lati = depo_co_parts[0];
                    var depo_lngi = depo_co_parts[1];
                    marker_creation(depo_lati, depo_lngi, name);
                    // Create a new option element

                });
            })
            .catch(error => console.log('error', error));

        function marker_creation(lat, lng, consignee) {
            const image = "http://151.106.17.246:8080/OMCS-CMS-APIS/uploads/rec.png";
            var positiona = new google.maps.LatLng(lat, lng);
            var marker = new google.maps.Marker({
                position: positiona,

                map,
                icon: {
                    labelOrigin: new google.maps.Point(11, 50),
                    url: image,

                    //size: new google.maps.Size(22, 40),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(11, 40),
                },
            });
            var infowindow = new google.maps.InfoWindow({
                content: '<p>Details:' + '<p>Consignee # :' + consignee + '</p>'
            });
            marker.addListener('click', function () {
                infowindow.open(map, marker);
            });

        }
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>