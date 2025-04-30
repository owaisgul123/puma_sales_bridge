<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Vehicle Management | <?php echo $_SESSION['user_name'];?>
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
                                    class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer"></i>Add</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h3>Vehicle Management</h3>

                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>User</th>
                                        <th>Vehicle</th>
                                        <th>Delete</th>

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
            <h5 id="offcanvasRightLabel">Sizes</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <div class="form-group col-md-12">

                    <form method="post" id="insert_form" enctype="multipart/form-data">


                        <div class="form-row mb-4">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Users</label>
                                <select class="w-100 form-control" id="users" name="users" required>
                                    <!-- onchange="get_user_dealers(this.value)" -->
                                    <!-- <option value="">Select TM</option> -->
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Vehi</label>
                                <select class="w-100 multiple_select" id="dealers" name="dealers[]" multiple="multiple"
                                    required>
                                    <!-- <option value="">Select TM</option> -->
                                </select>
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
            all_dealers();

            $('.multiple_select').select2();

            table = $('#myTable').DataTable({
                dom: 'Bfrtip',


                buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

            });
            fetchtable();


            $('#insert_form').on("submit", function(event) {
                event.preventDefault();


                var data = new FormData(this);
                $.ajax({
                    url: "<?php echo $api_url; ?>create/assign_user_vehicles.php",
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
                                $("#salesRole, #zmRole, #tmRole,#logisticsSelect")
                                    .hide();
                                $('#insert').val("Save");
                                document.getElementById("insert").disabled = false;

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


            });
            load_all_select();
        })

        function all_dealers() {
            fetch(
                    "<?php echo $api_url; ?>get/get_all_vehicles.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>"
                )
                .then(response => response.json())
                .then(response => {
                    response.forEach(data => {
                        $('#dealers').append(new Option(data.name, data.id)).trigger('change');
                    });
                })
                .catch(error => console.log('Error fetching dealers:', error));

            fetch(
                    "<?php echo $api_url; ?>get/get_cart_users.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>"
                )
                .then(response => response.json())
                .then(response => {
                    $('#users').append(new Option('Select', '')).trigger('change');
                    response.forEach(data => {
                        $('#users').append(new Option(data.name, data.id)).trigger('change');
                    });
                })
                .catch(error => console.log('Error fetching dealers:', error));
        }

        function get_user_dealers(user_id) {
            fetch(
                    `<?php echo $api_url; ?>get/get_user_dealers.php?key=03201232927&pre=<?php echo $_SESSION['privilege']; ?>&user_id=<?php echo $_SESSION['user_id']; ?>&id=${user_id}`
                )
                .then(response => response.json())
                .then(response => {
                    console.log("API Response:", response); // Debugging

                    // Check if response is valid and not empty
                    if (Array.isArray(response) && response.length > 0) {
                        let dealerIds = response.map(data => data.dealer_id); // Extract all dealer IDs
                        $('#dealers').val(dealerIds).trigger('change'); // Set values & trigger update
                    } else {
                        console.warn("No dealers found for user_id:", user_id);
                        $('#dealers').val(null).trigger('change'); // Clear selection if no data
                    }
                })
                .catch(error => console.error('Error fetching dealers:', error));
        }


        function deleteAssign(id) {
            var result = confirm("Are you sure you want to delete this record?");

            // If the user confirms, proceed with deletion
            if (result) {
                // Call a function to delete the item


                var settings = {
                    "url": "<?php echo $api_url; ?>delete/delete_cart_devices.php?key=03201232927&id=" + id + "",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax({
                    ...settings,
                    statusCode: {
                        200: function(response) {
                            Swal.fire(
                                'Success!',
                                'Record Deleted Successfully',
                                'success'
                            )
                            setTimeout(function() {

                                location.reload();


                            }, 2000);

                        },
                        success: function(data) {
                            // Additional success handling if needed
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            Swal.fire(
                                'Server Error!',
                                'Record Not Deleted',
                                'error'
                            )

                            // console.log("Request failed with status code: " + xhr.status);
                        }
                    }
                })
            }

        }

        function editData(id) {

            var settings = {
                "url": "<?php echo $api_url; ?>get/get_container_sizes.php?key=03201232927&id=" + id + "",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax({
                ...settings,
                statusCode: {
                    200: function(response) {

                        $('#row_id').val(response[0]['id'])
                        $('#name').val(response[0]['sizes']);

                    }
                }
            })
            $('#offcanvasRight').offcanvas('show');

        }

        function fetchtable() {

            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            fetch("<?php echo $api_url; ?>get/get_cart_users_devices.php?key=03201232927&id=<?php echo $_SESSION['user_id'] ?>",
                    requestOptions)
                .then(response => response.json())
                .then(response => {
                    console.log(response)

                    table.clear().draw();
                    $.each(response, function(index, data) {
                        table.row.add([
                            index + 1,
                            data.user_name,
                            data.device_name,


                            '<button type="button" id="delete" name="delete" onclick="deleteAssign(' +
                            data.users_devices_id +
                            ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>'
                        ]).draw(false);
                    });
                })
                .catch(error => console.log('error', error));


        }

        function load_all_select() {


            $.ajax({
                url: '<?php echo $api_url;?>get/get_tm.php?key=03201232927',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#zm').empty();

                    // Iterate through the data and append options to the select element
                    $.each(data, function(index, item) {
                        $('#tm').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });

                    // Refresh the Select2 element to display the newly added options
                    $('#tm').trigger('change.select2');
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });

            $.ajax({
                url: '<?php echo $api_url;?>get/get_zm.php?key=03201232927',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#zm').empty();
                    console.log('ZM')
                    console.log(data)
                    // Iterate through the data and append options to the select element
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




        }

        function get_regions_dealers(id) {
            // alert(id)
            if (id != "") {
                $.ajax({
                    url: '<?php echo $api_url; ?>get/dealers_region.php?key=03201232927&region=' + id + '',
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);

                        var region = [];
                        $.each(data, function(index, item) {
                            region.push(parseInt(item.id));

                        });
                        console.log(region)
                        $('#dealers').val(region).trigger('change');

                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });

            }
        }
        </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>