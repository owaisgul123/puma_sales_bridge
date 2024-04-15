<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Users |
        <?php echo $_SESSION['user_name']; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
</style>


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
                                        <th class="text-center">Edit</th>
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

                        <div class="form-group col-md-12">
                            <label for="" class="lab"> Enter Password</label>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="password-container">
                                <input type="password" id="password" name="password" required minlength="10"
                                    class="form-control input" placeholder="Confirm Password">
                                <span class="toggle-password" id="togglePassword"><i class="fas fa-eye"></i></span>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="confirmPassword" class="lab">Confirm Password</label>
                            </div>

                            <div class="form-group col-md-12">
                                <div class="password-container">
                                    <input type="password" id="confirm_password" name="confirm_password" required
                                        minlength="10" class="form-control input" placeholder="Confirm Password">
                                    <span class="toggle-password" id="toggleConfirmPassword"><i
                                            class="fas fa-eye"></i></span>
                                </div>
                                <p id="message"></p>
                            </div>



                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Contact No</label>
                                <input type="text" class="form-control" id="number" name="number"
                                    placeholder="Enter Contact No" required>
                            </div>


                            <div class="form-group col-md-12">
                                <label for="inputAddress">Role</label>


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
                                <input type="hidden" name="sales_role_hide" id="sales_role_hide">

                                <select id="sales" name="sales_role" class="form-control ">
                                    <option value="">Select Sales Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="ZM">GRM</option>
                                    <option value="TM">RM</option>
                                    <option value="ASM">TM</option>


                                </select>
                            </div>




                            <div class="form-group col-md-12" id="zmRole" style="display: none;">
                                <label for="inputAddress">GRM</label>

                                <select id="zm" name="zm" class="form-control ">
                                    <option value="">Select GRM</option>



                                </select>
                            </div>
                            <div class="form-group col-md-12" id="tmRole" style="display: none;">
                                <label for="inputAddress">RM</label>

                                <select id="tm" name="tm" class="form-control ">
                                    <option value="">Select RM</option>




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
                            <input type="hidden" name="row_id" id="row_id" value="0">

                            <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                            <input type="hidden" name="zm_hide" id="zm_hide">
                            <input type="hidden" name="tm_hide" id="tm_hide">

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
        load_all_select();
        $(document).ready(function () {
            // $('.js-example-basic-multiple').select2();
            $('#togglePassword').on('click', function () {
                togglePasswordVisibility('password', 'togglePassword');
            });

            $('#toggleConfirmPassword').on('click', function () {
                togglePasswordVisibility('confirm_password', 'toggleConfirmPassword');
            });

            function togglePasswordVisibility(inputId, toggleId) {
                var passwordInput = $('#' + inputId);
                var toggleButton = $('#' + toggleId);

                var passwordType = passwordInput.attr('type');
                if (passwordType === 'password') {
                    passwordInput.attr('type', 'text');
                    toggleButton.find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordInput.attr('type', 'password');
                    toggleButton.find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            }

            $("#role").on("change", function () {
                var selectedRole = $(this).val();
                // Hide all secondary dropdowns
                $("#salesRole, #zmRole, #tmRole,#logisticsSelect").hide();
                if (selectedRole === "Sales") {
                    $("#salesRole").show();
                } else if (selectedRole === "Logistics") {
                    $("#logisticsSelect").show();
                }
            });

            $("#sales").on("change", function () {
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
            $('#add_btn').click(function () {

                $('#row_id').val("");

                $('#insert_form')[0].reset();
                // alert("running")

            });

            $('#insert_form').on("submit", function (event) {
                update_id = $('#row_id').val();
                if (update_id == 0) {
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


                                Swal.fire(
                                    'Success!',
                                    'Record Created Successfully',
                                    'success'
                                )
                                setTimeout(function () {
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
                } else {
                    event.preventDefault();
                    // alert("Name")
                    var data = new FormData(this);

                    $.ajax({
                        url: "<?php echo $api_url; ?>update/update_user.php",
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
                                    'Record Not Updated',
                                    'error'
                                )
                                $('#insert').val("Save");
                                document.getElementById("insert").disabled = false;
                            } else {


                                Swal.fire(
                                    'Success!',
                                    'Record Updated Successfully',
                                    'success'
                                )
                                setTimeout(function () {
                                    $('#insert_form')[0].reset();
                                    $('#offcanvasRight').modal('hide');
                                    fetchtable();
                                    $("#salesRole, #zmRole, #tmRole,#logisticsSelect")
                                        .hide();
                                    $('#insert').val("Save");
                                    document.getElementById("insert").disabled = false;

                                    location.reload();



                                }, 2000);
                                // load_all_select()

                            }

                        },
                        error: function (xhr, textStatus, errorThrown) {
                            console.log(xhr)
                            console.log(textStatus)
                            console.log(errorThrown)
                            Swal.fire(
                                'Server Error!',
                                'Record Not Updated',
                                'error'

                            )

                            // console.log("Request failed with status code: " + xhr.status);
                        }
                    });


                }
            });

        })
        $('#password,#confirm_password').on('input', function () {
            validatePassword();
        });


        function validatePassword() {
            var password = $('#password').val();
            var confirmPassword = $('#confirm_password').val();

            if (password !== confirmPassword) {
                var error_message = $('#message').html('Passwords do not match!').css('color', 'red');
                $("#insert").prop("disabled", true);


            } else {
                var success_message = $('#message').html('Passwords match.').css('color', 'green');
                $("#insert").prop("disabled", false);

            }
        }


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
                    $.each(response, function (index, data) {
                        var lang = data.privilege;
                        if (lang == 'ZM') {
                            lang = 'GRM';
                        } else if (lang == 'TM') {
                            lang = 'RM';

                        } else if (lang == 'Admin') {
                            lang = 'Admin';

                        }else if (lang == 'ASM') {
                            lang = 'TM';

                        } else {
                            lang = data.privilege;

                        }
                        
                        table.row.add([
                            index + 1,
                            data.name,
                            data.email,
                            '********',
                            lang,
                            data.telephone,
                            // '<button type="button"id="edit" name="edit" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"  onclick="editData(' +
                            // data.id +
                            // ')"  class="btn btn-soft-warning waves-effect waves-light"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>',
                            '<button type="button" id="delete" name="delete" onclick="deleteData(' +
                            data.id +
                            ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>',
                            '<button type="button" id="edit" name="edit"  onclick="editData(' +
                            data.id +
                            ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>'
                        ]).draw(false);
                    });
                })
                .catch(error => console.log('error', error));


        }

        function load_all_select() {

            $.ajax({
                url: '<?php echo $api_url; ?>get/get_tm.php?key=03201232927',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#zm').empty();

                    // Iterate through the data and append options to the select element
                    $.each(data, function (index, item) {
                        $('#tm').append($('<option>', {
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

            $.ajax({
                url: '<?php echo $api_url; ?>get/get_zm.php?key=03201232927',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // $('#zm').empty(); 
                    console.log('ZM')
                    console.log(data)
                    // Iterate through the data and append options to the select element
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




        }

        function deleteData(id) {
            var result = window.confirm("Are you sure you want to proceed?");

            // Check the result
            if (result) {
                var settings = {
                    "url": "<?php echo $api_url; ?>delete/delete_users.php?key=03201232927&id=" + id + "",
                    "method": "DELETE",
                    "timeout": 0,
                };
                $.ajax({
                    ...settings,
                    statusCode: {
                        200: function (response) {
                            console.log(response);
                            // $('#myModal').modal('hide');
                            // console.log("Request was successful");
                            Swal.fire(
                                'Success!',
                                'Record Deleted Successfully',
                                'success'
                            )
                            setTimeout(function () {

                                // location.reload();


                            }, 2000);
                        },
                        // Add more status code handlers as needed
                    },
                    success: function (data) {
                        // Additional success handling if needed
                    },
                    error: function (xhr, textStatus, errorThrown) {
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

        function editData(id) {
            $('#zmRole').hide();
            $('#tmRole').hide();
            var settings = {
                "url": "<?php echo $api_url; ?>get/view_user.php?key=03201232927&id=" + id + "",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax({
                ...settings,
                statusCode: {
                    200: function (response) {
                        // load_all_select()
                        $('#name').val(response[0]['name']);
                        $('#email').val(response[0]['email']);
                        $('#password').val(response[0]['description']);
                        $('#confirm_password').val(response[0]['description']);
                        $('#number').val(response[0]['telephone']);
                        $('#role').val('Sales');
                        var row_id = $('#row_id').val(response[0]['id']);



                        // setTimeout(function() {
                        var role_val = $('#role').val()
                        if (role_val == 'Sales') {
                            var privilege = response[0]['privilege']

                            $("#salesRole").show();

                            if (privilege == 'ZM') {
                                $('#sales').val('ZM');
                                $('#sales_role_hide').val('ZM');
                            }
                            if (privilege == 'TM') {

                                var settings = {
                                    "url": "<?php echo $api_url; ?>get/get_zm_tm.php?key=03201232927&id=" +
                                        id + "",
                                    "method": "GET",
                                    "timeout": 0,
                                };
                                $.ajax({
                                    ...settings,
                                    statusCode: {
                                        200: function (response) {
                                            $('#sales').val('TM')
                                            $('#sales_role_hide').val('TM');
                                            $('#zmRole').show();
                                            // alert("hello")
                                            // alert(response[0]['zm_id'])
                                            $('#zm_hide').val(response[0]['zm_id'])
                                            $('#zm').val(response[0]['zm_id']);
                                        }
                                    }
                                })


                            }
                            if (privilege == 'ASM') {
                                var settings = {
                                    "url": "<?php echo $api_url; ?>get/get_asm_tm.php?key=03201232927&id=" +
                                        id + "",
                                    "method": "GET",
                                    "timeout": 0,
                                };
                                $.ajax({
                                    ...settings,
                                    statusCode: {
                                        200: function (response) {
                                            $('#sales_role_hide').val('ASM');
                                            $('#sales').val('ASM');
                                            $('#tmRole').show();
                                            // alert("hello")
                                            // alert(response[0]['tm_id'])
                                            $('#tm_hide').val(response[0]['tm_id'])
                                            $('#tm').val(response[0]['tm_id']);
                                        }
                                    }
                                })
                            }

                        }
                        // }, 2000);



                        // $('#role').value(response[0]['name'])

                    }
                }
            })
            $('#offcanvasRight').offcanvas('show')
        }
        $('#add_btn').on('click', function () {
            $('#zmRole').hide();
            $('#tmRole').hide();
            $("#salesRole").hide();

        })
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>