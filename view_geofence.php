<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Geofence | <?php echo $_SESSION['user_name']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    
    <!-- jQuery & SweetAlert -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Google Maps API -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNyJWb04pByaU1CTmimoWNl3b86VV6qZ8&libraries=drawing,places" defer></script>

    <?php include 'css_script.php'; ?>

    <style>
        #map-canvas {
            width: 100%;
            height: 100vh;
            z-index: 0;
        }
    </style>

</head>

<body>

    <div id="layout-wrapper">
        <?php include 'header.php'; ?>
        <?php include 'sidebar.php'; ?>
        <?php include 'right_siebar.php'; ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- <button class="btn btn-soft-primary waves-effect waves-light" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" id="add_btn"
                                aria-controls="offcanvasRight">
                                <i class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer"></i>Add
                            </button> -->

                            Geofence Name : <span id='fence_name'></span><br>
                            Geofence Code : <span id='fence_code'></span><br>
                            Geofence Type : <span id='fence_type'></span><br>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="container-fluid p-0">
                                <div class="row">
                                    <div class="col-md-12 p-0">
                                        <!-- <input id="pac-input" type="text" placeholder="Enter a location" /> -->
                                        <div id="map-canvas"></div>
                                    </div>
                                </div><!-- end row-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include 'footer.php'; ?>
        </div>
    </div>

    <div class="rightbar-overlay"></div>

    <?php include 'script_tags.php'; ?>

    <script>
        $(document).ready(function() {
            getFence();
        });

        function getFence() {
            $.ajax({
                url: "<?php echo $api_url; ?>get/get_fence_by_id.php?key=03201232927&id=" + <?php echo $_GET['id']?>,
                method: "GET",
                success: function(response) {
                    if (response.length > 0) {
                        $('#fence_name').text(response[0]['consignee_name']);
                        $('#fence_code').text(response[0]['code']);
                        $('#fence_type').text(response[0]['geotype']);
                        var coordinates = response[0]['Coordinates'].split(', ');

                        var center = {
                            lat: parseFloat(coordinates[0]),
                            lng: parseFloat(coordinates[1])
                        };
                        initMap(center);
                    } else {
                        console.error("No coordinates received from API.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching coordinates: " + error);
                }
            });
        }

        function initMap(center) {
            const map = new google.maps.Map(document.getElementById("map-canvas"), {
                zoom: 15,
                center: center,
                mapTypeId: "terrain",
            });

            const cityCircle = new google.maps.Circle({
                strokeColor: "#FF0000",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#FF0000",
                fillOpacity: 0.35,
                map: map,
                center: center,
                radius: 300
            });

            google.maps.event.addListener(cityCircle, 'center_changed', function() {
                var newCenter = cityCircle.getCenter();
                console.log("New center: ", newCenter.lat(), newCenter.lng());
            });

            google.maps.event.addListener(cityCircle, 'radius_changed', function() {
                console.log("New radius: ", cityCircle.getRadius());
            });
        }
    </script>

</body>
</html>
