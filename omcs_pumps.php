<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        OMCS DEALERS |
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

                        <div class="col-md-12">
                            <div id="map-canvas" style="width: 100%; height: 100vh;" class="">

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
    var table;
    var type;
    var subtype;
    $(document).ready(function() {




    })



    let map;
    var circle;
    let flightPath;

    function initMap() {

        gmarkers = [];
        map = new google.maps.Map(document.getElementById("map-canvas"), {
            center: {
                lat: 24.8607,
                lng: 67.0011
            },
            zoom: 6,

        });
        console.log('<?php echo $api_url; ?>get/get_omcs_pumps.php?key=03201232927')
        $.ajax({
            url: '<?php echo $api_url; ?>get/get_omcs_pumps.php?key=03201232927',
            type: 'POST',
            success: function(data) {
                // data = JSON.parse(data);
                console.log(data)
                var len = data.length;
                var i = 0;

                $.each(data, function(index, item) {

                    
                    var consignee = item.name;
                    var cordinates = item.coordinates;
                    var omcs_name = item.omcs_name;
                    //console.log(cordinates)
                    var chars = cordinates.split(', ');
                    //console.log(chars[0]);
                    //console.log(chars[1]);
                    marker_creation(chars[0], chars[1], consignee,omcs_name)
                });

                
            }
        });

        function marker_creation(lat, lng, consignee,omcs_name) {
            const image = "https://www.freeiconspng.com/uploads/fuel-pump-icon-23.png";
            var positiona = new google.maps.LatLng(lat, lng);
            var marker = new google.maps.Marker({
                position: positiona,

                map,
                icon: {
                    
                    url: image,

                    scaledSize: new google.maps.Size(40, 40) 
                },
            });
            var infowindow = new google.maps.InfoWindow({
                content: '<p>Details:' + '<p>OMCS : '+omcs_name+'</p><br><p>Consignee # :' + consignee + '</p>'
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });

        }

    }
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>