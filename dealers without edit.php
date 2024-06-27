<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Dealers | <?php echo $_SESSION['user_name'];?>
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


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6">
                            <button class="btn btn-soft-primary waves-effect waves-light" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" id="add_btn"
                                aria-controls="offcanvasRight"><i
                                    class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer"></i>Add</button>
                        </div>
                    </div>
                    <div class="card">

                        <div class="card-body">

                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Contact</th>
                                        <th class="text-center">Password</th>
                                        <!-- <th class="text-center">Indent Price (PMG)</th>
                                        <th class="text-center">Nozzle Price (PMG)</th> -->
                                        <th class="text-center">Ledger Balance</th>
                                        <th class="text-center">View</th>
                                        <th class="text-center">Edit Password</th>
                                        <!-- <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th> -->
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
                            <label for="inputEmail4">Site Name</label>
                            <span id="lorry_span">
                                <input type="text" class="form-control" id="dealer_name" name="dealer_name" required>

                            </span>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Dealer SAP #</label>
                            <span id="lorry_span">
                                <input type="number" class="form-control" id="dealer_sap_no" name="dealer_sap_no"
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
                        <div class="form-group col-md-2">
                            <label for="inputAddress">ZM</label>

                            <select class="form-control" id="zm" name="zm" onchange='get_zm_tm(this.value)' required>

                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputAddress">TM</label>

                            <select class="form-control" id="tm" name="tm" onchange='get_tm_asm(this.value)' required>

                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputAddress">ASM</label>

                            <select class="form-control" id="asm" name="asm">

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
                            <div id="dropArea">
                                <p>Drag and drop , or click to select an image. Image must be 1200x200</p>
                                <div id="imageContainer">
                                    <img id="imagePreview" src="" alt="Image Preview">
                                    <i id="removeButton" class="fas fa-times-circle"></i>
                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-4">

                            <label for="fileInput2" id="fileInputLabel2">Logo </label></br>
                            <input type="file" id="fileInput2" accept="image/*" name='logo_img' required>
                            <div id="dropArea2">
                                <p>Drag and drop , or click to select an image. Image must be 96x96 </p>
                                <div id="imageContainer2">
                                    <img id="imagePreview2" src="" alt="Image Preview">
                                    <i id="removeButton2" class="fas fa-times-circle"></i>
                                </div>
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

    <script>
    var table;
    var type;
    var subtype;
    $(document).ready(function() {
        $('.multi_select').select2();


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

        removeButton.addEventListener('click', () => {
            imageContainer.style.display = 'none';
            fileInput.value = ''; // Clear the selected file
            fileInputLabel.style.display = 'block';
        });

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

                    reader.onload = function(e) {
                        const img = new Image();
                        img.src = e.target.result;

                        img.onload = function() {
                            resolution.width = img.width;
                            resolution.height = img.height;

                            if (resolution.width === 1200 && resolution.height === 200) {
                                imagePreview.src = e.target.result;
                                imageContainer.style.display = 'block';
                                fileInputLabel.style.display = 'none';
                                removeButton.style.display = 'block';
                            } else {
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

        removeButton2.addEventListener('click', () => {
            imageContainer2.style.display = 'none';
            fileInput2.value = ''; // Clear the selected file
            fileInputLabel2.style.display = 'block';
        });

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

                    reader2.onload = function(e) {
                        const img2 = new Image();
                        img2.src = e.target.result;

                        img2.onload = function() {
                            resolution2.width = img2.width;
                            resolution2.height = img2.height;

                            if (resolution2.width === 96 && resolution2.height === 96) {
                                imagePreview2.src = e.target.result;
                                imageContainer2.style.display = 'block';
                                fileInputLabel2.style.display = 'none';
                                removeButton2.style.display = 'block';
                            } else {
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
        fetchtable();
        multi_select();
        // facility_select();

        $('#add_btn').click(function() {

            $('#row_id').val("");

            $('#insert_form')[0].reset();
            // alert("running")

        });

        $('#password_update_form').on("submit", function(event) {
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
                    beforeSend: function() {
                        $('#update_pass').val("Saving");
                        document.getElementById("update_pass").disabled = true;

                    },
                    success: function(data) {
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


                            setTimeout(function() {
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
                    error: function(xhr, status, error) {
                        // Handle API errors
                        console.log('Error:', error);
                        console.log('Status:', status);
                        console.log('Response:', xhr.responseText);
                    }

                });
            }

        });

        $('#insert_form').on("submit", function(event) {
            event.preventDefault();
            // alert("Name")
            var data = new FormData(this);

            $.ajax({
                url: "<?php echo $api_url; ?>create/dealers.php",
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
                            location.reload();

                        }, 2000);

                    }

                }
            });

        });

    })



    function fetchtable() {

        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        fetch("<?php echo $api_url; ?>get/dealers.php?key=03201232927", requestOptions)
            .then(response => response.json())
            .then(response => {
                console.log(response)

                table.clear().draw();
                $.each(response, function(index, data) {
                    table.row.add([
                        index + 1,
                        data.name,
                        data.email,
                        data.contact,
                        '********',
                        data.acount,
                        // 23434,
                        // 23434,

                        '<a type="button"id="View" name="view" href="user_profile.php?page=Dealer Details&id=' +
                        data.id +
                        '" target="blank" class="btn btn-soft-warning waves-effect waves-light"><i class="fas fa-eye font-size-16 align-middle"></i></a>',
                        '<button type="button"id="edit" name="edit_pa"  onclick="update_pass(' +
                        data.id +
                        ')"  class="btn btn-soft-warning waves-effect waves-light"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>',
                        // '<button type="button"id="edit" name="edit" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"  onclick="editdata(' +
                        // data.id +
                        // ')"  class="btn btn-soft-warning waves-effect waves-light"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>',
                        // '<button type="button" id="delete" name="delete" onclick="deleteData(' +
                        // data.id +
                        // ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>'
                    ]).draw(false);
                });
            })
            .catch(error => console.log('error', error));


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
            success: function(data) {
                // Iterate through the data and append options to the select element
                $.each(data, function(index, item) {

                    $('#depots').append($('<option>', {
                        value: item.id,
                        text: item.consignee_name
                    }));
                });

                // Refresh the Select2 element to display the newly added options
                $('#mySelect').trigger('change.select2');
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });

        $.ajax({
            url: '<?php echo $api_url; ?>get/get_zm.php?key=03201232927',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Iterate through the data and append options to the select element
                $('#zm').append($('<option>', {
                    value: '',
                    text: 'Select ZM'
                }));
                $.each(data, function(index, item) {

                    $('#zm').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });

                // Refresh the Select2 element to display the newly added options
                $('#zm').trigger('change.select2');
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });

        $.ajax({
            url: '<?php echo $api_url; ?>get/get_zm.php?key=03201232927',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Iterate through the data and append options to the select element
                $('#products1').append($('<option>', {
                    value: '',
                    text: 'Select Nozel'
                }));
                $.each(data, function(index, item) {

                    $('#products1').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });

                // Refresh the Select2 element to display the newly added options
                $('#products1').trigger('change.select2');
            },
            error: function(error) {
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
            success: function(data) {
                console.log(data)
                // Iterate through the data and append options to the select element
                $('#tm').empty();
                $('#tm').append($('<option>', {
                    value: '',
                    text: 'Select TM'
                }));
                $.each(data, function(index, item) {

                    $('#tm').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });

                // Refresh the Select2 element to display the newly added options
                // $('#zm').trigger('change.select2');
            },
            error: function(error) {
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
            success: function(data) {
                console.log(data);
                // Iterate through the data and append options to the select element
                $('#asm').empty();
                $('#asm').append($('<option>', {
                    value: '',
                    text: 'Select ASM'
                }));
                $.each(data, function(index, item) {

                    $('#asm').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });

                // Refresh the Select2 element to display the newly added options
                // $('#zm').trigger('change.select2');
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });
    }


    function facility_select() {
        $.ajax({
            url: '<?php echo $api_url; ?>get/facilities_get.php?key=03201232927',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Iterate through the data and append options to the select element
                $.each(data, function(index, item) {
                    $('#facility').append($('<option>', {
                        value: item.id,
                        text: item.facilities
                    }));
                });

                // Refresh the Select2 element to display the newly added options
                $('#facility').trigger('change.select2');
            },
            error: function(error) {
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
            $(document).on('click', '.btn_remove', function() {
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
        google.maps.event.addListener(drawingManager, 'polygoncomplete', polygon);
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

        google.maps.event.addListener(shape, 'center_changed', function() {
            var circle_point_edit = [];
            var lat = this.getCenter().lat();
            var lng = this.getCenter().lng();
            var radius = this.getRadius();
            circle_point_edit.push(lat + ", " + lng)
            console.log(circle_point_edit)
            document.getElementById("lati").value = circle_point_edit;
            document.getElementById("type").value = 'circle';


        })
        google.maps.event.addListener(shape, 'radius_changed', function() {
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

        google.maps.event.addListener(polygon.getPath(), 'insert_at', function() {
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

        google.maps.event.addListener(polygon.getPath(), 'remove_at', function() {
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

        google.maps.event.addListener(polygon.getPath(), 'set_at', function() {
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

    function editdata() {

    }
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>