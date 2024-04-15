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
                            <!-- <h3>Change Passsword</h3> -->

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row justify-content-center my-auto">
                                            <div class="col-md-8 col-lg-6 col-xl-5">

                                                <div class="mb-4 pb-2">
                                                    <a href="index.html" class="d-block auth-logo">
                                                        <img src="<?php echo $api_url . '' . $logo; ?>" alt=""
                                                            height="60" class="auth-logo-dark me-start">
                                                        <img src="<?php echo $api_url . '' . $logo; ?>" alt=""
                                                            height="60" class="auth-logo-light me-start">
                                                    </a>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body p-4">
                                                        <div class="text-center mt-2">
                                                            <h5>Welcome Back !</h5>
                                                            <p class="text-muted">Change Password
                                                                <?php echo $name; ?>.
                                                            </p>
                                                        </div>
                                                        <div class="p-2 mt-4">

                                                            <div class="mb-3">
                                                                <label class="form-label" for="username">Old
                                                                    Password</label>
                                                                <div class="position-relative input-custom-icon">
                                                                    <input type="text" class="form-control"
                                                                        id="old_pass">
                                                                    <span class="bx bx-user"></span>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <div class="float-end">
                                                                </div>
                                                                <label class="form-label" for="password-input">New
                                                                    Password</label>
                                                                <div
                                                                    class="position-relative auth-pass-inputgroup input-custom-icon">
                                                                    <span class="bx bx-lock-alt"></span>
                                                                    <input type="text" class="form-control"
                                                                        id="new_pass">
                                                                    <button type="button"
                                                                        class="btn btn-link position-absolute h-100 end-0 top-0">
                                                                        <!-- <i class="mdi mdi-eye-outline font-size-18 text-muted"></i> -->
                                                                    </button>
                                                                </div>
                                                            </div>



                                                            <div class="mt-3">
                                                                <button
                                                                    class="btn btn-primary w-100 waves-effect waves-light"
                                                                    type="submit" onclick="do_login()">Change</button>
                                                            </div>




                                                        </div>

                                                    </div>
                                                </div>

                                            </div><!-- end col -->
                                        </div>
                                    </div>
                                </div>
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
        // $('.js-example-basic-multiple').select2();


    });

    function do_login() {
        var old_pass = $("#old_pass").val();
        var new_pass = $("#new_pass").val();
        var current_pass = "<?php echo $_SESSION['password']; ?>";
        var row_id = "<?php echo $_SESSION['user_id']; ?>";
        // console.log(current_pass)
        if (old_pass != "" && new_pass != "") {
            $("#loading_spinner").css({
                "display": "block"
            });
            if (old_pass == current_pass) {


                $.ajax({
                    type: 'post',
                    url: "<?php echo $api_url; ?>update/update_users_password.php",
                    data: {
                        do_login: "do_login",
                        edit_password: new_pass,
                        row_id: row_id
                    },
                    success: function(response) {
                        console.log(response)
                        if (response == 1) {

                            Swal.fire(
                                'Success!',
                                'Password Chnaged Successfully',
                                'success'
                            )
                            setTimeout(function() {
                               

                                // location.reload();

                                window.location.href = "auth-logout.php";

                            }, 2000);
                        } else {
                            Swal.fire(
                                'Authentication Error!',
                                'Password Not Change.',
                                'error'
                            )


                        }
                    }
                });
            } else {
                Swal.fire(
                    'Authentication Error!',
                    'Old Password Not Match',
                    'error'
                )
            }
        } else {
            Swal.fire(
                'Authentication Error!',
                'Please Fill All The Details',
                'error'
            )
        }


    }
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>