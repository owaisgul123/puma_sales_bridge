<?php 
session_start();

// Unset all session variables
session_unset();

// Destroy all session data
session_destroy();

// Redirect the user to the login page or another destination
// header("Location: inde.php");
?>
<?php include 'env_set.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/auth-logout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:06:38 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Logout | <?php echo $name?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>


<body>

    <!-- <body data-layout="horizontal"> -->

    <div class="authentication-bg min-vh-100">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">

                        <div class="mb-4 pb-2">
                            <a href="index.html" class="d-block auth-logo">
                                <img src="<?php echo $api_url.''.$logo;?>" alt="" height="60"
                                    class="auth-logo-dark me-start">
                                <img src="<?php echo $api_url.''.$logo;?>" alt="" height="60"
                                    class="auth-logo-light me-start"> </a>
                        </div>

                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2 my-2 text-center">
                                    <div class="avatar-lg mx-auto">
                                        <div class="avatar-title bg-light text-primary h2 rounded-circle">
                                            <i class="bx bxs-user"></i>
                                        </div>
                                    </div>

                                    <div class="mt-4 pt-2">
                                        <h5>You are Logged Out</h5>
                                        <p class="text-muted font-size-15">Thank you for using <span
                                                class="fw-semibold text-body"><?php echo $name;?></span></p>
                                        <div class="mt-4">
                                            <a href="index.php"
                                                class="btn btn-primary w-100 waves-effect waves-light">Sign In</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center p-4">
                            <p>© <script>
                                document.write(new Date().getFullYear())
                                </script> <?php echo $name?>. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                                P2P Track</p>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- end container -->
    </div>
    <!-- end authentication section -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/eva-icons/eva.min.js"></script>

</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/auth-logout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:06:38 GMT -->

</html>