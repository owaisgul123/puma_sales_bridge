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
                            <h3>Dealers sales Performance</h3>

                            <table class="table table-nowrap table-hover mb-1" id="targeted_table">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Site Name</th>
                                        <th class="text-center">Product Name</th>
                                        <th class="text-center">Month</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Descrition</th>

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
                <form method="post" id="targeted_from" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Dealers</label>

                                <select class="w-100 multiple_select form-control" id="dealer_id" name="dealer_id"
                                    required onchange='dealers_products(this.value)'>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Month</label>

                                <input type="month" class="form-control" id='month_name' name='month_name' required>

                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Target
                                    Amount</label>

                                <input type="number" class="form-control" id='targeted_amount' name='targeted_amount'
                                    required>

                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Product</label>

                                <select name="targeted_product" class="form-select" id="targeted_product">

                                </select>

                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Description</label>

                                <textarea class="form-control" id="products_description" name="products_description"
                                    rows="4" cols="50" required></textarea>

                            </div>
                        </div>

                        <div class="col-12" style="text-align: right;">
                            <input type="hidden" name="user_id" id="user_id"
                                value="<?php echo $_SESSION['user_id']; ?>">
                            <input type="hidden" name="row_id" id="row_id">
                            <button type="button" class="btn btn-secondary waves-effect"
                                data-bs-dismiss="modal">Close</button>
                            <input class="btn btn-primary waves-effect waves-light" type="submit" name="target_btn"
                                id="target_btn" value="Save">
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
        targeted_table = $('#targeted_table').DataTable({
            dom: 'Bfrtip',


            buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

        });
        all_dealers();
        get_dealer_target();


        $('#add_btn').click(function() {

            $('#row_id').val("");

            $('#targeted_from')[0].reset();
            // alert("running")

        });

        $('#targeted_from').on("submit", function(event) {
            event.preventDefault();
            // alert("Name")
            var formData = $(this).serialize();
            console.log(formData);
            $.ajax({
                url: "<?php echo $api_url; ?>create/create_dealers_product_target.php",
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('#target_btn').val("Saving");
                    document.getElementById("target_btn").disabled = true;

                },
                success: function(data) {
                    console.log(data)

                    if (data != 1) {
                        Swal.fire(
                            'Server Error!',
                            'Record Not Created',
                            'error'
                        )
                        $('#target_btn').val("Save");
                        document.getElementById("target_btn").disabled = false;
                    } else {


                        setTimeout(function() {
                            Swal.fire(
                                'Success!',
                                'Record Created Successfully',
                                'success'
                            )
                            $('#targeted_from')[0].reset();

                            // facilities();
                            $('#target_btn').val("Save");
                            document.getElementById("target_btn").disabled = false;
                            location.reload();


                        }, 2000);

                    }

                },
                error: function(xhr, status, error) {
                    // Handle API errors
                    Swal.fire(
                        'Server Error!',
                        'Duplicate Month Entry',
                        'error'
                    )
                    $('#target_btn').val("Save");
                    document.getElementById("target_btn").disabled = false;
                    console.log('Error:', error);
                    console.log('Status:', status);
                    console.log('Response:', xhr.responseText);
                }

            });

        });
    })



    

    
    function all_dealers() {

        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        fetch("<?php echo $api_url; ?>get/dealers.php?key=03201232927&pre=<?php echo $_SESSION['privilege']?>&user_id=<?php echo $_SESSION['user_id']?>", requestOptions)
            .then(response => response.json())
            .then(response => {
                // console.log(response)

                var newOption = $('<option>', {
                    value: '',
                    text: 'Select'
                });

                // Append the new option to the select
                $('#dealer_id').append(newOption);

                // Trigger the change event to notify Select2 about the update
                $('#dealer_id').trigger('change');

                $.each(response, function(index, data) {

                    // Create a new option element
                    var newOption = $('<option>', {
                        value: data.id,
                        text: data.name
                    });

                    // Append the new option to the select
                    $('#dealer_id').append(newOption);

                    // Trigger the change event to notify Select2 about the update
                    $('#dealer_id').trigger('change');
                });
            })
            .catch(error => console.log('error', error));


    }

    function dealers_products(id) {
        if(id!=""){

        
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        fetch("<?php echo $api_url; ?>get/dealers_products.php?key=03201232927&dealer_id=" + id + "",
                requestOptions)
            .then(response => response.json())
            .then(result => {
                $("#targeted_product").empty();
                var selectElement = $("#targeted_product");

                selectElement.append($('<option>', {
                    value: '',
                    text: 'Select Product'
                }));


                $.each(result, function(index, data) {

                    console.log(data.name)
                    selectElement.append($('<option>', {
                        value: data.id,
                        text: data.name
                    }));




                });
            })
            .catch(error => console.log('error', error));
        }
    }

    function get_dealer_target() {
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        console.log("<?php echo $api_url; ?>get/all_dealers_sales_performance.php?key=03201232927&pre=<?php echo $_SESSION['privilege']?>&user_id=<?php echo $_SESSION['user_id']?>")

        fetch("<?php echo $api_url; ?>get/all_dealers_sales_performance.php?key=03201232927&pre=<?php echo $_SESSION['privilege']?>&user_id=<?php echo $_SESSION['user_id']?>",
                requestOptions)
            .then(response => response.json())
            .then(result => {

                $.each(result, function(index, data) {

                    console.log(data.name)

                    targeted_table.row.add([

                        index + 1,
                        data.dealer_name,
                        data.name,
                        data.date_month,
                        data.target_amount,
                        data.description


                    ]).draw(false);


                });
            })
            .catch(error => console.log('error', error));
    }
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>