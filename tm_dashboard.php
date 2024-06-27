<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Dealers |
        <?php echo $_SESSION['user_name']; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="BYCO" name="description" />
    <meta content="P2P" name="author" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        <?php
        $pre = $_GET['pre'];
        $disabledAttribute = ($pre == 'TM') ? 'disabled' : '';

        // $disabledAttribute = (strpos($pre, 'TM') === 0) ? 'disabled' : '';
        
        ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 d-none">
                            <label for="inputEmail4">Region</label>

                            <select data-live-search="true" class="form-control selectpicker" id="regions"
                                name="regions" required multiple>
                                <option value="">Select</option>



                            </select>

                        </div>
                        <div class="col-md-3 d-none">
                            <label for="inputEmail4">Province</label>

                            <select data-live-search="true" class="form-control selectpicker" id="province"
                                name="province" required multiple>
                                <option value="">Select</option>



                            </select>

                        </div>
                        <div class="col-md-3 d-none">
                            <label for="inputEmail4">City</label>

                            <select data-live-search="true" class="form-control selectpicker" id="city" name="city"
                                required multiple>
                                <option value="">Select</option>



                            </select>

                        </div>
                        <div class="col-md-3 d-none">
                            <label for="inputEmail4">District</label>

                            <select data-live-search="true" class="form-control selectpicker" id="district"
                                name="district" required multiple>
                                <option value="">Select</option>



                            </select>

                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4">RM</label>

                            <select data-live-search="true" class="form-control selectpicker" id="tm_user"
                                name="tm_user" required multiple <?php echo $disabledAttribute; ?>>
                                <option value="">Select</option>



                            </select>

                        </div>
                        <div class="col-md-3 d-none">
                            <label for="inputEmail4">TM</label>

                            <select data-live-search="true" class="form-control selectpicker" id="asm_users"
                                name="asm_users" required multiple>
                                <option value="">Select</option>



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
                                                <h6 class="mb-0 font-size-15">Visits Task</h6>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0 font-size-15"><small> Pending</small> : <span
                                                        id="Pending_tasks">0</span> </h6>
                                                <h6 class="mb-0 font-size-15"><small> Complete</small>  : <span
                                                        id="completed_tasks">0</span> </h6>
                                            </div>

                                        </div>

                                        <div>
                                            <h4 class="mt-4 pt-1 mb-0 font-size-22" id="task_count">0</h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-none">
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
                                                <h6 class="mb-0 font-size-15">RM</h6>
                                            </div>


                                        </div>

                                        <div>
                                            <h4 class="mt-4 pt-1 mb-0 font-size-22" id="rm_counts">0</h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-none">
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
                                                <h6 class="mb-0 font-size-15">TM</h6>
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
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="region_chart"></canvas>

                                </div>
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="lineChart"></canvas>

                                </div>
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="city_chart"></canvas>

                                </div>
                            </div>


                        </div>
                        <div class="col-md-6">
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
                    <div class="row d-none">

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body" style="height: 350px;">
                                    <strong>Task</strong>
                                    <canvas id="task_users"></canvas>

                                </div>
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body" style="height: 350px;">
                                    <strong>Task Status</strong>
                                    <canvas id="task_status"></canvas>

                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="card">

                        <div class="card-body" style="overflow: auto;">
                            <div id="loader" style="display: none;text-align: center;">Loading Data...</div>

                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">SAP #</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Contact</th>
                                        <th class="text-center">Location</th>
                                        <th class="text-center">City</th>
                                        <th class="text-center">Province</th>
                                        <th class="text-center">Region</th>
                                        <th class="text-center">Created Time</th>

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
                                                <th>S.No</th>
                                                <th>User</th>
                                                <th>Site Name</th>
                                                <th>Date</th>
                                                <th>Status</th>
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

            <div id="edit_password_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                aria-hidden="true" data-bs-scroll="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                            <h5 class="modal-title" id="myModalLabel">
                                <h5 id="labelc">Edit Password</h5>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="password_update_form" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3 row">
                                            <label for="example-text-input"
                                                class="col-md-2 col-form-label">Password</label>
                                            <div class="col-md-10">
                                                <input type="text" id="edit_password" class="form-control"
                                                    name='edit_password'>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-12" style="text-align: right;">


                                        <input type="hidden" name="row_id" id="dealer_row_id">
                                        <button type="button" class="btn btn-secondary waves-effect"
                                            data-bs-dismiss="modal">Close</button>
                                        <input class="btn btn-primary waves-effect waves-light" type="submit"
                                            name="update_pass" id="update_pass" value="Save">
                                    </div>
                                </div>
                            </form>

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
            <h5 id="offcanvasRightLabel">Create Dealers</h5>
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
                            <label for="inputAddress">RM</label>

                            <select class="form-control" id="tm" name="tm" onchange='get_tm_asm(this.value)'>

                            </select>
                        </div>
                        <div class="form-group col-md-2 d-none">
                            <label for="inputAddress">TM</label>

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
        $(document).ready(function () {
            $('.multi_select').select2();
            $('.selectpicker').select2();


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

                        reader.onload = function (e) {
                            const img = new Image();
                            img.src = e.target.result;

                            img.onload = function () {
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

                        reader2.onload = function (e) {
                            const img2 = new Image();
                            img2.src = e.target.result;

                            img2.onload = function () {
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
            $('.selectpicker').on('change', function () {
                filterTable();
            });

            fetchtable();
            multi_select();
            // facility_select();

            $('#add_btn').click(function () {

                $('#row_id').val("");
                $('#depots').val([]).trigger('change');


                document.getElementById("imagePreview2").src = ""
                document.getElementById("imagePreview").src = ""

                $('#insert_form')[0].reset();
                get_zm_tm(0);
                get_tm_asm(0)
                // alert("running")

            });

            $('#password_update_form').on("submit", function (event) {
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
                        beforeSend: function () {
                            $('#update_pass').val("Saving");
                            document.getElementById("update_pass").disabled = true;

                        },
                        success: function (data) {
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


                                setTimeout(function () {
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
                        error: function (xhr, status, error) {
                            // Handle API errors
                            console.log('Error:', error);
                            console.log('Status:', status);
                            console.log('Response:', xhr.responseText);
                        }

                    });
                }

            });

            $('#insert_form').on("submit", function (event) {
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
                                    location.reload();

                                }, 2000);

                            }

                        },

                        error: function (error) {
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
                        beforeSend: function () {
                            var file_
                            $('#insert').val("Saving");
                            document.getElementById("insert").disabled = true;

                        },
                        success: function (data) {
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


                                setTimeout(function () {
                                    Swal.fire(
                                        'Success!',
                                        'Record Updated Successfully',
                                        'success'
                                    )
                                    document.getElementById("imagePreview2").src = ""
                                    document.getElementById("imagePreview").src = ""
                                    $('#insert_form')[0].reset();
                                    $('#offcanvasRight').modal('hide');
                                    fetchtable();
                                    $('#insert').val("Save");
                                    document.getElementById("insert").disabled = false;
                                    location.reload();

                                }, 2000);

                            }

                        },
                        error: function (error) {
                            console.error('Error fetching data:', error);
                        }
                    });
                }

            });

        })



        function fetchtable() {
            $('#loader').show();
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };
            console.log("<?php echo $api_url; ?>get/dealers.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>");
            fetch("<?php echo $api_url; ?>get/dealers.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>",
                requestOptions)
                .then(response => response.json())
                .then(async response => {
                    console.log(response)
                    dealers_data = response;

                    $('#dealers_count').html(response.length);
                    table.clear().draw();
                    $.each(response, function (index, data) {
                        $('#loader').hide();
                        table.row.add([
                            index + 1,
                            data.name,
                            data.sap_no,
                            data.email,
                            data.contact,
                            data.location,
                            data.city,
                            data.province,
                            data.region,
                            data.created_at
                        ]).draw();
                    });

                    try {
                        setTimeout(async function () {
                            var tm_ids = "<?php echo $_GET['id'] ?>";
                            // Code to be executed after the delay
                            $('#tm_user').val(tm_ids).trigger('change');
                            const result2 = await filterTable();
                            console.log('This code executes after a 2-second delay');
                        }, 2000);
                    } catch (error) {
                        console.log('error', error);
                    }
                    // check_data(response);
                    // chart_datas(response, 'lineChart', 'province', 'Province')
                    // chart_datas(response, 'region_chart', 'region', 'Region')
                    // chart_datas(response, 'city_chart', 'city', 'City')
                    // chart_datas(response, 'terr_chart', 'district', 'District')
                    // chart_datas(response, 'rm_chart', 'tm', 'RM')
                    // chart_datas(response, 'tm_chart', 'asm', 'TM')
                    // chart_datas(response, 'depot_chart', 'actual_depot', 'Depot')
                    // chart_datas(response, 'rural_urban', 'cat_2', 'Cat-2')

                })
                .catch(error => console.log('error', error));

            fetch("<?php echo $api_url; ?>get/inspection/all_dealers_inspection.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>",
                requestOptions)
                .then(response => response.json())
                .then(async response => {
                    console.log(response)
                    task_data = response;

                    $('#task_count').html(response.length);

                    task_table.clear().draw();
                    $.each(response, function (index, data) {
                        task_table.row.add([
                            index + 1,
                            data.user_name,
                            data.dealer_name,
                            data.time,
                            (data.status === 1) ? 'Complete' : 'Pending',
                            data.description,
                            data.task_create_time,
                        ]).draw(false);
                    });

                    var pendingCount = 0;
                    var completeCount = 0;

                    // Loop through the array and count Pending and Complete records
                    $.each(response, function (index, record) {
                        if (record.current_status === 'Pending') {
                            pendingCount++;
                        } else if (record.current_status === 'Complete') {
                            completeCount++;
                        }
                    });

                    $('#Pending_tasks').text(pendingCount);
                    $('#completed_tasks').text(completeCount);

                    try {


                        task_datas(response, 'task_users', 'user_name', 'Users Task')
                        task_datas(response, 'task_status', 'current_status', 'Task Status')

                        // filterTable();
                    } catch (error) {
                        console.log('error', error);
                    }




                })
                .catch(error => console.log('error', error));

            console.log('<?php echo $api_url; ?>get/get_region_district_dealers.php?key=03201232927')
            $.ajax({
                url: '<?php echo $api_url; ?>get/get_region_district_dealers.php?key=03201232927',
                method: 'GET',
                dataType: 'json',
                success: async function (data) {
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
                    $.each(district, function (index, item) {

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
                    $.each(city, function (index, item) {

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
                    $.each(province, function (index, item) {

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
                    $.each(region, function (index, item) {

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
                    $.each(tm, function (index, item) {

                        $('#tm_user').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });
                    $('#asm_users').empty();
                    $('#asm_users').append($('<option>', {
                        value: '',
                        text: 'Select'
                    }));
                    $.each(asm, function (index, item) {

                        $('#asm_users').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });



                    // Refresh the Select2 element to display the newly added options
                    // $('#zm').trigger('change.select2');
                },
                error: function (error) {
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
                success: function (data) {
                    // Iterate through the data and append options to the select element
                    $.each(data, function (index, item) {

                        $('#depots').append($('<option>', {
                            value: item.id,
                            text: item.consignee_name
                        }));
                    });

                    // Refresh the Select2 element to display the newly added options
                    $('#mySelect').trigger('change.select2');
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                }
            });

            $.ajax({
                url: '<?php echo $api_url; ?>get/get_zm.php?key=03201232927',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Iterate through the data and append options to the select element
                    $('#zm').append($('<option>', {
                        value: '',
                        text: 'Select GRM'
                    }));
                    $.each(data, function (index, item) {

                        $('#zm').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });

                    // Refresh the Select2 element to display the newly added options
                    $('#zm').trigger('change.select2');
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                }
            });

            $.ajax({
                url: '<?php echo $api_url; ?>get/get_zm.php?key=03201232927',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Iterate through the data and append options to the select element
                    $('#products1').append($('<option>', {
                        value: '',
                        text: 'Select Nozel'
                    }));
                    $.each(data, function (index, item) {

                        $('#products1').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });

                    // Refresh the Select2 element to display the newly added options
                    $('#products1').trigger('change.select2');
                },
                error: function (error) {
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
                success: function (data) {
                    console.log(data)
                    // Iterate through the data and append options to the select element
                    $('#tm').empty();
                    $('#tm').append($('<option>', {
                        value: '',
                        text: 'Select RM'
                    }));
                    $.each(data, function (index, item) {

                        $('#tm').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });

                    // Refresh the Select2 element to display the newly added options
                    // $('#zm').trigger('change.select2');
                },
                error: function (error) {
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
                success: function (data) {
                    console.log(data);
                    // Iterate through the data and append options to the select element
                    $('#asm').empty();
                    $('#asm').append($('<option>', {
                        value: '',
                        text: 'Select TM'
                    }));
                    $.each(data, function (index, item) {

                        $('#asm').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });

                    // Refresh the Select2 element to display the newly added options
                    // $('#zm').trigger('change.select2');
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                }
            });
        }


        function facility_select() {
            $.ajax({
                url: '<?php echo $api_url; ?>get/facilities_get.php?key=03201232927',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Iterate through the data and append options to the select element
                    $.each(data, function (index, item) {
                        $('#facility').append($('<option>', {
                            value: item.id,
                            text: item.facilities
                        }));
                    });

                    // Refresh the Select2 element to display the newly added options
                    $('#facility').trigger('change.select2');
                },
                error: function (error) {
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
                        '</td> <td class="text-primary"><input type="text" class="form-control" id="consignee_code' + (
                            i + 1) + '" name="lorry_no[]" onchange="get_lorry_data(' + (i + 1) +
                        ')"  required></td> <td> <select id="products" name="products[]" class="form-control "> <option value="">Select</option> <option value="HSD">HSD</option> <option value="PMG">PMG</option> <option value="HOBC">HOBC</option> </select></td> <td class=""><input type="text" class="form-control" id="consignee_name' +
                        (i + 1) +
                        '" name="min_limit[]"  required ></td> <td><input type="text" class="form-control" id="quantity' +
                        (i + 1) + '"" name="max_limit[]" onchange="cal_quan_price(' + (i + 1) +
                        ')"  required></td> <td><button type="button" name="remove" id="' +
                        i + '" value="' + i + '" class="btn btn-success btn_remove">X</button></td></tr>');
                    // alert("Create " + i)
                }
                $(document).on('click', '.btn_remove', function () {
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
            // Get selected values from dropdowns
            var selectedCity = $('#city').val();
            var selectedProvince = $('#province').val();
            var regions = $('#regions').val();
            var terri = $('#district').val();
            var rm_counts = $('#tm_user').val();
            var tm_counts = $('#asm_users').val();
            // Get other selected values similarly
            console.log(selectedCity)
            // alert(rm_counts)
            console.log('dealers_data')
            console.log(dealers_data)

            // Filter the dealers based on selected values
            // var filteredDealers = dealers_data.filter(function(dealer) {
            //     // console.log(dealer.city);
            //     return (
            //         dealer.city === selectedCity &&
            //         dealer.province === selectedProvince
            //         // Add conditions for other filters
            //     );
            // });

            var filteredData = dealers_data.filter(function (item) {
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
            // console.log('Distinct TM Count:', distinctTmCount);
            // console.log('Distinct ASM No Count:', distinctASMCount);

            console.log(filteredData)
            table.clear().draw();
            $.each(filteredData, function (index, data) {
                // $('#loader').hide();
                table.row.add([
                    index + 1,
                    data.name,
                    data.sap_no,
                    data.email,
                    data.contact,
                    data.location,
                    data.city,
                    data.province,
                    data.region,
                    data.created_at
                ]).draw();
            });
            $('#dealers_count').text(filteredData.length);
            chart_datas(filteredData, 'lineChart', 'province', 'Province')
            chart_datas(filteredData, 'region_chart', 'region', 'Region')
            chart_datas(filteredData, 'city_chart', 'city', 'City')
            chart_datas(filteredData, 'terr_chart', 'district', 'District')
            chart_datas(filteredData, 'rm_chart', 'tm', 'RM')
            chart_datas(filteredData, 'tm_chart', 'asm', 'TM')


            var filteredTaskData = task_data.filter(function (item) {
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

            $('#task_count').html(filteredTaskData.length);
            task_table.clear().draw();
            $.each(filteredTaskData, function (index, data) {
                task_table.row.add([
                    index + 1,
                    data.user_name,
                    data.dealer_name,
                    data.time,
                    (data.status === 1) ? 'Complete' : 'Pending',
                    data.description,
                    data.task_create_time,

                ]).draw(false);
            });
            var pendingCount = 0;
            var completeCount = 0;

            // Loop through the array and count Pending and Complete records
            $.each(filteredTaskData, function (index, record) {
                if (record.current_status === 'Pending') {
                    pendingCount++;
                } else if (record.current_status === 'Complete') {
                    completeCount++;
                }
            });

            $('#Pending_tasks').text(pendingCount);
            $('#completed_tasks').text(completeCount);
            // table.clear().draw();
            // task_datas(filteredTaskData, 'region_chart', 'user_name', 'Users Task')
            task_datas(filteredTaskData, 'task_users', 'user_name', 'Users Task')
            task_datas(filteredTaskData, 'task_status', 'current_status', 'Task Status')


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

            google.maps.event.addListener(shape, 'center_changed', function () {
                var circle_point_edit = [];
                var lat = this.getCenter().lat();
                var lng = this.getCenter().lng();
                var radius = this.getRadius();
                circle_point_edit.push(lat + ", " + lng)
                console.log(circle_point_edit)
                document.getElementById("lati").value = circle_point_edit;
                document.getElementById("type").value = 'circle';


            })
            google.maps.event.addListener(shape, 'radius_changed', function () {
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

            google.maps.event.addListener(polygon.getPath(), 'insert_at', function () {
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

            google.maps.event.addListener(polygon.getPath(), 'remove_at', function () {
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

            google.maps.event.addListener(polygon.getPath(), 'set_at', function () {
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
                    200: function (response) {
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

                        setTimeout(function () {
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
                                200: function (response) {
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
                success: function (data) {
                    // Additional success handling if needed

                },
                error: function (xhr, textStatus, errorThrown) {
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
            var apexData = {
                labels: label,
                datasets: [{
                    label: name,
                    data: data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
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



        function chart_datas(response, id, value, name) {
            var provinceCount = {};
            console.log(value)
            // Loop through the dealers data
            $.each(response, function (index, dealer) {
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

        function task_datas(response, id, value, name) {
            var provinceCount = {};
            console.log(response)
            // Loop through the dealers data
            $.each(response, function (index, dealer) {
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

                } else if (value == 'current_status') {
                    var province = dealer.current_status;

                }

                // Check if the province is already in the count, if not, initialize it to 1, otherwise increment
                provinceCount[province] = (provinceCount[province] || 0) + 1;
            });

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
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 205, 86, 1)'],
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
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>