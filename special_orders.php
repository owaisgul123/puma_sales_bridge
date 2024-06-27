<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Special Approval Orders |
        <?php echo $_SESSION['user_name']; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="BYCO" name="description" />
    <meta content="P2P" name="author" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- App favicon -->

    <?php include 'css_script.php'; ?>


</head>
<style>
    .dtHorizontalExampleWrapper {
        max-width: 600px;
        margin: 0 auto;
    }

    #dtHorizontalExample th,
    td {
        white-space: nowrap;
    }

    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
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
                    <!-- <div class="row">

                        <div class="col-md-6">
                            <button class="btn btn-soft-primary waves-effect waves-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" id="add_btn" aria-controls="offcanvasRight"><i class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer" onclick="canvas_date()"></i>Add</button>
                        </div>
                    </div> -->

                    <div class="card">

                        <div class="card-body">

                            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm"
                                cellspacing="0" width="100% " style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Site Name</th>
                                        <th class="text-center">Mode</th>
                                        <th class="text-center">Depot</th>
                                        <th class="text-center">Total Amount</th>
                                        <th class="text-center">Ledger Amount</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">View Orders</th>
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
            <div id="products_price_backlog_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                aria-hidden="true" data-bs-scroll="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                            <h5 class="modal-title" id="myModalLabel">
                                <h5 id="labelc">Order Detail</h5>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-nowrap table-hover mb-1"
                                                id="product_price_backlog">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th class="text-center">S.No</th>
                                                        <th class="text-center">Date</th>
                                                        <th class="text-center">Site Name</th>
                                                        <!-- <th class="text-center">Customer</th>
                                                        <th class="text-center">SAP Code</th> -->
                                                        <th class="text-center">Product Type</th>
                                                        <th class="text-center">Rate</th>
                                                        <th class="text-center">Qty</th>
                                                        <th class="text-center">Delivered</th>
                                                        <th class="text-center">Depot</th>
                                                        <!-- <th class="text-center">Delivery Type</th> -->
                                                        <th class="text-center">Order Amount</th>
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
    <div class="offcanvas offcanvas-end w-40" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 id="offcanvasRightLabel">Manage Orders</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <form method="post" id="insert_form" enctype="multipart/form-data">


                    <div class="form-row row mb-4">

                        <div class="form-group col-md-12 pb-2">
                            <label for="inputEmail4">From Date</label>
                            <span id="lorry_span">
                                <input type="date" class="form-control" id="from_date" name="from_dates" required>
                            </span>
                        </div>

                        <div class="form-group col-md-12 pb-2">
                            <label for="inputEmail4">To Date</label>
                            <span id="lorry_span">
                                <input type="date" class="form-control" id="to_date" name="price" required>

                            </span>

                        </div>
                        <div class="form-group col-md-12 pb-2">
                            <input class="btn rounded-pill btn-primary w-50" type="submit" name="insert" id="insert"
                                value="GET">
                        </div>
                    </div>


            </div>
            </form>
        </div>
    </div>
    </div>

    <div id="approved_order_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                    <h5 class="modal-title" id="myModalLabel">
                        <h5 id="labelc">Update Status</h5>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="approved_orders" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-12">
                                <!-- <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <select id="special_order_status" name="special_order_status"
                                            class="form-control selectpicker">
                                            <option selected>Choose...</option>
                                            <option value="2">Complete</option>
                                            <option value="3">Cancel</option>
                                           

                                        </select>
                                    </div>
                                </div> -->
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Depot</label>
                                    <div class="col-md-10">
                                        <select class="form-control " id="depots" name="depots"
                                            placeholder="This is a placeholder" required>
                                            <option></option>

                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row" id='vehicle_select_div'>
                                    <label for="example-text-input" class="col-md-2 col-form-label">Vehicles</label>
                                    <div class="col-md-10">
                                        <select class="form-control " id="vehicles" name="vehicles"
                                            placeholder="This is a placeholder" required>
                                            <option></option>

                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Description</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" id="in_balanced_description"
                                            name="special_order_description" rows="4" cols="50"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12" style="text-align: right;">
                                <input type="hidden" name="spe_order" id="spe_order">
                                <input type="hidden" name="user_id" id="user_id"
                                    value="<?php echo $_SESSION['user_id']; ?>">
                                <button type="button" class="btn btn-secondary waves-effect"
                                    data-bs-dismiss="modal">Close</button>
                                <input class="btn btn-primary waves-effect waves-light" type="submit" name="app_btn"
                                    id="app_btn" value="Save changes">
                            </div>
                        </div>
                    </form>

                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <!-- JAVASCRIPT -->

    <?php include 'script_tags.php'; ?>

    <script>
        var table;
        var type;
        var subtype;
        $(document).ready(function () {
            // $('.multi_select').select2();

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
                url: '<?php echo $api_url; ?>get/all_vehicles.php?key=03201232927',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Iterate through the data and append options to the select element
                    $.each(data, function (index, item) {

                        $('#vehicles').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });

                    // Refresh the Select2 element to display the newly added options
                    $('#vehicles').trigger('change.select2');
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                }
            });

            table = $('#dtHorizontalExample').DataTable({
                "scrollX": true
            });
            $('.dataTables_length').addClass('bs-select');

            orderlist();
            // fetchtable();

            product_price_backlog = $('#product_price_backlog').DataTable({
                dom: 'Bfrtip',


                buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

            });


        })
        $(document).on('click', '.status', function () {

            var id = $(this).attr("id");
            // alert(employee_id)
            $('#spe_order').val(id);
            var tyes = $(this).data('type')
            if(tyes!='GC / Coco'){
                $('#vehicle_select_div').addClass('d-none')
                $('#vehicles').removeAttr('required');

            }
            else{
                $('#vehicle_select_div').removeClass('d-none')
                $('#vehicles').attr('required', true);
            }
            $('#approved_order_modal').modal('show');
        });



        $('#approved_orders').on("submit", function (event) {
            event.preventDefault();
            // alert("Name")
            var data = new FormData(this);

            $.ajax({
                url: "<?php echo $api_url; ?>update/special_order_status_update.php",
                cache: false,
                contentType: false,
                processData: false,
                method: "POST",
                data: data,
                beforeSend: function () {
                    $('#app_btn').val("Saving");
                    document.getElementById("app_btn").disabled = true;

                },
                success: function (data) {
                    console.log(data)

                    if (data != 1) {
                        Swal.fire(
                            'Server Error!',
                            'Record Not Created',
                            'error'
                        )
                        $('#app_btn').val("Save");

                        document.getElementById("app_btn").disabled = false;

                    } else {


                        setTimeout(function () {
                            Swal.fire(
                                'Success!',
                                'Record Created Successfully',
                                'success'
                            )
                            $('#approved_orders')[0].reset();
                            $('#approved_order_modal').modal('hide');
                            orderlist();
                            $('#app_btn').val("Save");
                            document.getElementById("app_btn").disabled = false;

                        }, 2000);

                    }

                },error: function(xhr, status, error) {
                // Handle API errors
                console.log('Error:', error);
                console.log('Status:', status);
                console.log('Response:', xhr.responseText);
            }
            });

        });
    </script>

    <script>
        // function creat_form() {
        //     var qty_f = document.getElementById("trip_qtys").value;
        //     // del_order

        //     // $("#dynamic_field").empty();
        //     $("#dynamic_field").find("tr:not(:nth-child(1)):not(:nth-child(1))").remove();

        //     // alert(qty_f)
        //     if (qty_f >= 10) {
        //         alert("overloaded");
        //     } else {
        //         // $("#dynamic_field").empty();
        //         for (var i = 1; i <= qty_f; i++) {
        //             $('#dynamic_field').append('<tr id="row' + i +


        //                 '"><td class="text-center">' + (i + 1) +
        //                 '</td> <td class="text-primary"><input type="text" class="form-control" id="consignee_code' + (
        //                     i + 1) + '" name="lorry_no[]" onchange="get_lorry_data(' + (i + 1) +
        //                 ')"  required></td> <td> <select id="products" name="products[]" class="form-control "> <option value="">Select</option> <option value="HSD">HSD</option> <option value="PMG">PMG</option> <option value="HOBC">HOBC</option> </select></td> <td class=""><input type="text" class="form-control" id="consignee_name' +
        //                 (i + 1) +
        //                 '" name="min_limit[]"  required ></td> <td><input type="text" class="form-control" id="quantity' +
        //                 (i + 1) + '"" name="max_limit[]" onchange="cal_quan_price(' + (i + 1) +
        //                 ')"  required></td> <td><button type="button" name="remove" id="' +
        //                 i + '" value="' + i + '" class="btn btn-success btn_remove">X</button></td></tr>');
        //             // alert("Create " + i)
        //         }
        //         $(document).on('click', '.btn_remove', function() {
        //             i--;
        //             var button = $(this).val();
        //             // alert(button);
        //             var button_id = $(this).attr("id");
        //             $('#row' + button_id + '').remove();
        //             var se = parseInt(button);
        //             se = se - 1;
        //             $('select[id=trip_qtys]').val(se);
        //             $('#trip_qtys').selectpicker('refresh');



        //         });


        //     }

        // }

        var table;
        var today;
        var tomorrow;
        today = new Date();
        tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);



        function orderlist() {

            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };
            fetch("<?php echo $api_url; ?>get/special_orders.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>",
                requestOptions)
                .then(response => response.json())
                .then(response => {
                    console.log(response)

                    table.clear().draw();
                    $.each(response, function (index, data) {


                        var variable = ""
                        if (data.status == 0) {
                            variable = "<span id=" + data.id +
                                " class='badge rounded-pill bg-warning status'>Pending</span>"
                        } else if (data.status == 1) {
                            variable = "<span id=" + data.id +
                                " class='badge rounded-pill bg-secondary status' data-type='"+data.type+"'>Approved</span>"
                        } else if (data.status == 2) {
                            variable = "<span id=" + data.id +
                                "  class='badge rounded-pill bg-success status'>Complete</span>"
                        } else if (data.status == 3) {
                            variable = "<span id=" + data.id +
                                " class='badge rounded-pill bg-danger status'>Cancel</span>"
                        } else if (data.status == 4) {
                            variable = "<span id=" + data.id +
                                " class='badge rounded-pill bg-info status'>Special Approval</span>"
                        } else if (data.status == 5) {
                            variable = "<span id=" + data.id +
                                " class='badge rounded-pill bg-dark status'>ASM Approved</span>"
                        }

                        table.row.add([

                            index + 1,
                            data.created_at,
                            data.name,
                            // data.name,
                            data.type,
                            data.consignee_name,
                            data.total_amount,
                            data.legder_balance,
                            variable,
                            '<button type="button" id="view_order" name="view_order" onclick="view_order(' +
                            data.id +
                            ')" class="btn btn-soft-danger waves-effect waves-light"><i class="fas fa-eye font-size-16 align-middle"></i></button>',
                        ]).draw(false);


                    });

                })
                .catch(error => console.log('error', error));


        }

        function view_order(id) {
            if (id != "") {
                var requestOptions = {
                    method: 'GET',
                    redirect: 'follow'
                };
                console.log("<?php echo $api_url; ?>get/get_main_sub_orders.php?key=03201232927&id=" + id + "");
                fetch("<?php echo $api_url; ?>get/get_main_sub_orders.php?key=03201232927&id=" + id + "", requestOptions)
                    .then(response => response.json())
                    .then(response => {
                        console.log(response)
                        if (response.length > 0) {
                            product_price_backlog.clear().draw();

                            $.each(response, function (index, data) {
                                product_price_backlog.row.add([
                                    index + 1,
                                    data.date,
                                    data.name,
                                    // data.name,
                                    data.product_name,
                                    data.rate,
                                    data.quantity,
                                    data.delivery_based,
                                    data.consignee_name,
                                    data.amount

                                ]).draw(false);

                            });
                        }
                        $('#products_price_backlog_modal').modal('show');
                    })
                    .catch(error => console.log('error', error));

            }

        }

        function canvas_date() {
            $('#from_date').val('2023-10-09');
            $('#to_date').val('2023-10-09');
        }
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>