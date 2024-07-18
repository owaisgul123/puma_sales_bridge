<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
    Product Prices | <?php echo $_SESSION['user_name']; ?>
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
<style>
.select2-container--default .select2-selection--multiple {
    /* width: 280px; */
}

.select2-container--default .select2-search--inline .select2-search__field {
    width: max-content !important;
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
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">

                        <!-- <div class="col-md-6">
                            <button class="btn btn-soft-primary waves-effect waves-light" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" id="add_btn"
                                aria-controls="offcanvasRight"><i
                                    class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer"></i>Add</button>
                        </div> -->
                    </div>
                    <div class="card">

                        <div class="card-body">

                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Dealer</th>
                                        <th class="text-center">Product</th>
                                        <th class="text-center">From</th>
                                        <th class="text-center">To</th>
                                        <th class="text-center">Indent Price</th>
                                        <th class="text-center">Nozel Price</th>
                                        <th class="text-center">Created Time</th>
                                        <th class="text-center">Last Update Time</th>

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
    <div class="offcanvas offcanvas-end w-40" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 id="offcanvasRightLabel">Create </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <form method="post" id="productts_form" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Dealers</label>

                                <select class="w-100 multiple_select" id="dealers" name="dealers[]" multiple="multiple"
                                    required>
                                    <!-- Add more options as needed -->
                                </select>

                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Product</label>

                                <!-- <input type="text" class="form-control" id='products_name' name='products_name'
                                        required> -->

                                <select class=" form-control" id="products_name" name="products_name" required>
                                    <!-- Add more options as needed -->
                                </select>


                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">From</label>

                                <input type="datetime-local" class="form-control" id='from_date' name='from_date'
                                    required>

                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">To</label>

                                <input type="datetime-local" class="form-control" id='to_date' name='to_date' required>

                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Indent
                                    Price</label>

                                <input type="number" class="form-control" id='indent_price_pro' name='indent_price' step="any"
                                    required>

                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Nozel
                                    Price</label>

                                <input type="number" class="form-control" id='nozel_price_pro' name='nozel_price' step="any"
                                    required>

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
                            <input class="btn btn-primary waves-effect waves-light" type="submit" name="products_btn"
                                id="products_btn" value="Save">
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
        all_dealers()
        $('.multiple_select').select2();
        table = $('#myTable').DataTable({
            dom: 'Bfrtip',


            buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

        });

        $('#productts_form').on("submit", function(event) {
            event.preventDefault();
            // alert("Name")
            var formData = $(this).serialize();
            console.log(formData);
            $.ajax({
                url: "<?php echo $api_url; ?>update/multiple_dealers_nozel_update.php",
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('#products_btn').val("Saving");
                    document.getElementById("products_btn").disabled = true;

                },
                success: function(data) {
                    console.log(data)

                    if (data != 1) {
                        Swal.fire(
                            'Server Error!',
                            'Record Not Created',
                            'error'
                        )
                        $('#products_btn').val("Save");
                        document.getElementById("products_btn").disabled = false;
                    } else {


                        setTimeout(function() {
                            Swal.fire(
                                'Success!',
                                'Record Created Successfully',
                                'success'
                            )
                            $('#productts_form')[0].reset();

                            // facilities();
                            $('#products_btn').val("Save");
                            document.getElementById("products_btn").disabled =
                                false;
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
        nozzellist();
        $('#dealers').on('change', function() {
            var selectedValues = $(this).val();
            console.log(selectedValues);

            if (selectedValues.length > 0) {
                var requestOptions = {
                    method: 'GET',
                    redirect: 'follow'
                };
                var resultString = selectedValues.join(',');

                // Print the resulting string
                console.log(resultString);
                fetch("<?php echo $api_url; ?>get/get_multiple_dealers_product.php?key=03201232927&dealer_id=" +
                        resultString + "", requestOptions)
                    .then(response => response.json())
                    .then(response => {
                        console.log(response)

                        $('#products_name').empty();
                        $('#products_name').append('<option value="">Select Product</option>');
                        $.each(response, function(index, data) {

                            // Create a new option element
                            var newOption = $('<option>', {
                                value: data.id,
                                text: data.name
                            });

                            // Append the new option to the select
                            $('#products_name').append(newOption);

                            // Trigger the change event to notify Select2 about the update
                            // $('#dealers').trigger('change');
                        });
                    })
                    .catch(error => console.log('error', error));

            }
        });



    })
    // fetchtable();



    function nozzellist() {

        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        console.log("<?php echo $api_url; ?>get/get_all_dealers_products.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>")
        fetch("<?php echo $api_url; ?>get/get_all_dealers_products.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>",
                requestOptions)
            .then(response => response.json())
            .then(response => {
                console.log(response)

                table.clear().draw();
                $.each(response, function(index, data) {

                    table.row.add([

                        index + 1,
                        data.dealer_name,
                        data.name,
                        data.from,
                        data.to,
                        data.indent_price,
                        data.nozel_price,
                        data.created_at,
                        data.update_time

                    ]).draw(false);


                });

            })
            .catch(error => console.log('error', error));


    }

    function all_dealers() {

        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        fetch("<?php echo $api_url; ?>get/dealers.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>", requestOptions)
            .then(response => response.json())
            .then(response => {
                console.log(response)

                // table.clear().draw();
                $.each(response, function(index, data) {

                    // Create a new option element
                    var newOption = $('<option>', {
                        value: data.id,
                        text: data.name
                    });

                    // Append the new option to the select
                    $('#dealers').append(newOption);

                    // Trigger the change event to notify Select2 about the update
                    $('#dealers').trigger('change');
                });
            })
            .catch(error => console.log('error', error));


    }
    </script>

    <script>


    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>