<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        <?php echo $_GET['page'] ?> |
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
                                        <th class="text-center">Dealer</th>
                                        <th class="text-center">Start-Date</th>
                                        <th class="text-center">End-Date</th>
                                        <th class="text-center">Product</th>
                                        <th class="text-center">Indent Price</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">2023-01-01</td>
                                        <td class="text-center">2023-01-15</td>
                                        <td class="text-center">wheel statio</td>
                                        <td class="text-center">PMG</td>
                                        <td class="text-center">300.17</td>
                                       
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td class="text-center">2023-01-01</td>
                                        <td class="text-center">2023-01-15</td>
                                        <td class="text-center">wheel statio</td>
                                        <td class="text-center">PMG</td>
                                        <td class="text-center">300.17</td>
                                       
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td class="text-center">2023-01-01</td>
                                        <td class="text-center">2023-01-15</td>
                                        <td class="text-center">wheel statio</td>
                                        <td class="text-center">PMG</td>
                                        <td class="text-center">300.17</td>
                                       
                                    </tr>
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

   

    <!-- chat offcanvas -->
    <div class="offcanvas offcanvas-end w-40" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 id="offcanvasRightLabel">Create Indent</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <form method="post" id="insert_form" enctype="multipart/form-data">


                    <div class="form-row row mb-4">
                    <div class="form-group col-md-12 pb-2">
                        <label for="">Dealers</label>
                    <select class="form-select " aria-label="Default select example">
                        <option selected>select</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        </select>
                        </div>

                        <div class="form-group col-md-12 pb-2">
                            <label for="inputEmail4">Date</label>
                            <span id="lorry_span">
                                <input type="date" class="form-control" id="from_date" name="from_date" required>
                            </span>
                        </div>

                        <div class="form-group col-md-12 pb-2">
                            <label for="inputEmail4">Price</label>
                            <span id="lorry_span">
                                <input type="number" class="form-control" id="price" name="price" required>

                            </span>
                               
                            </div>
                            <div class="form-group col-md-12 pb-2">
                            <input class="btn rounded-pill btn-primary w-50" type="submit" name="insert" id="insert" value="GET">
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
        

        table = $('#myTable').DataTable({
            dom: 'Bfrtip',


            buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

        });
        indentlist();
        // fetchtab le();
    })

    function indentlist() {
        
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        fetch("<?php echo $api_url; ?>get/indent_data.php?key=03201232927",
                requestOptions)
            .then(response => response.json())
            .then(response => {
                console.log(response)

                table.clear().draw();
                $.each(response, function(index, data) {

                    table.row.add([

                        index + 1,
                        data.name,
                        data.startdate,
                        data.enddate,
                        data.product,
                        data.price
                     
                    ]).draw(false);


                });

            })
            .catch(error => console.log('error', error));


    }



    </script>

</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>                     