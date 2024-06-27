<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Users | <?php echo $_SESSION['user_name'];?>
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
                            <h3>Users</h3>

                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Password</th>
                                        <th class="text-center">Privilege</th>
                                        <th class="text-center">Contact No</th>
                                        <!-- <th class="text-center">Edit</th> -->
                                        <th class="text-center">Delete</th>
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

                        </div>


                        <div class="form-group col-md-12 ">

                            <label for="" class="lab"> Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" required minlength="8"
                                class="form-control input" placeholder="Confirm Password">




                        </div>



                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Contact No</label>
                            <input type="text" class="form-control" id="number" name="number"
                                placeholder="Enter Contact No" required>
                        </div>


                        <div class="form-group col-md-12">
                            <label for="inputAddress">Role</label>

                            <!-- <select id="role" name="role" class="form-control">
                                <option value="">Select Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Sales">Sales</option>
                                <option value="Order">Order</option>
                                <option value="Logistics">Logistics</option>


                            </select> -->
                            <select class="form-control " id="role" name="role" placeholder="This is a placeholder">
                                <option value="">Select Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Sales">Sales</option>
                                <option value="Order">Order</option>
                                <option value="Logistics">Logistics</option>
                            </select>

                        </div>

                        <div class="form-group col-md-12" id="salesRole" style="display: none;">
                            <label for="inputAddress">Sales Role</label>

                            <select id="sales" name="sales_role" class="form-control ">
                                <option value="">Select Sales Role</option>
                                <option value="Admin">Admin</option>
                                <option value="ZM">ZM</option>
                                <option value="TM">TM</option>
                                <option value="ASM">ASM</option>


                            </select>
                        </div>



                        <div class="form-group col-md-12" id="zmRole" style="display: none;">
                            <label for="inputAddress">ZM</label>

                            <select id="zm" name="zm" class="form-control ">
                                <option value="">Select zm</option>



                            </select>
                        </div>
                        <div class="form-group col-md-12" id="tmRole" style="display: none;">
                            <label for="inputAddress">TM</label>

                            <select id="tm" name="tm" class="form-control ">
                                <option value="">Select TM</option>




                            </select>
                        </div>
                        <div class="form-group col-md-12" id="logisticsSelect" style="display: none;">
                            <label for="inputAddress">Logistics</label>

                            <select id="logistics" name="logistics_role" class="form-control ">
                                <option value="">Select logistics</option>

                                <option value="Admin">Admin</option>
                                <option value="Carriage">Carriage</option>


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

    <!-- JAVASCRIPT -->

    <?php include 'script_tags.php'; ?>

    <script>
    var table;
    var type;
    var subtype;
    $(document).ready(function() {
        // $('.js-example-basic-multiple').select2();


        $("#role").on("change", function() {
            var selectedRole = $(this).val();
            // Hide all secondary dropdowns
            $("#salesRole, #zmRole, #tmRole,#logisticsSelect").hide();
            if (selectedRole === "Sales") {
                $("#salesRole").show();
            } else if (selectedRole === "Logistics") {
                $("#logisticsSelect").show();
            }
        });

        $("#sales").on("change", function() {
            var selectedSalesRole = $(this).val();
            // alert(selectedSalesRole)
            // Hide all secondary dropdowns
            $("#zmRole, #tmRole").hide();
            if (selectedSalesRole === "TM") {
                $("#zmRole").show();
            } else if (selectedSalesRole === "ASM") {
                $("#tmRole").show();
            }
        });

        table = $('#myTable').DataTable({
            dom: 'Bfrtip',


            buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

        });
        fetchtable();
        $('#add_btn').click(function() {

            $('#row_id').val("");

            $('#insert_form')[0].reset();
            // alert("running")

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


                        Swal.fire(
                            'Success!',
                            'Record Created Successfully',
                            'success'
                        )
                        setTimeout(function() {
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

                }
            });

        });
        load_all_select();
    })



    function fetchtable() {

        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        fetch("<?php echo $api_url; ?>get/all_users.php?key=03201232927", requestOptions)
            .then(response => response.json())
            .then(response => {
                console.log(response)

                table.clear().draw();
                $.each(response, function(index, data) {
                    table.row.add([
                        index + 1,
                        data.name,
                        data.email,
                        '********',
                        data.privilege,
                        data.telephone,
                        // '<button type="button"id="edit" name="edit" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"  onclick="editData(' +
                        // data.id +
                        // ')"  class="btn btn-soft-warning waves-effect waves-light"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>',
                        '<button type="button" id="delete" name="delete" onclick="deleteData(' +
                        data.id +
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

    function deleteData(id) {
        var result = window.confirm("Are you sure you want to proceed?");

        // Check the result
        if (result) {
            var settings = {
                "url": "<?php echo $api_url;?>delete/delete_users.php?key=03201232927&id="+id+"",
                "method": "DELETE",
                "timeout": 0,
            };
            $.ajax({
                ...settings,
                statusCode: {
                    200: function(response) {
                        console.log(response);
                        // $('#myModal').modal('hide');
                        // console.log("Request was successful");
                        Swal.fire(
                            'Success!',
                            'Record Deleted Successfully',
                            'success'
                        )
                        setTimeout(function() {

                            location.reload();


                        }, 2000);
                    },
                    // Add more status code handlers as needed
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
            });
        }
    }
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>