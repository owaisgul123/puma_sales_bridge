<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Casual Visit Info |
        <?php echo $_SESSION['user_name']; ?>
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
                        <div class="col-md-3">
                            <label for="inputEmail4">From</label>

                            <input type="date" class="form-control" name="fromdate" id="fromdate"
                                value="<?php echo date('Y-m-01') ?>">

                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4">To</label>

                            <input type="date" class="form-control" name="todate" id="todate"
                                value="<?php echo (new DateTime('last day of this month'))->modify('+1 day')->format('Y-m-d'); ?>">

                        </div>
                        <div class="col-md-3">

                            <input type="btn" class="btn btn-primary mt-3" name="btn_get" id="btn_get" value="Get"
                                onclick="fetchtable()">

                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">

                        <!-- <div class="col-md-6">
                            <button class="btn btn-soft-primary waves-effect waves-light" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" id="add_btn"
                                aria-controls="offcanvasRight"><i
                                    class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer"></i>Add</button>
                        </div> -->
                        <div class="row">
                            <div class="col-md-3">
                                <label for="inputEmail4">Users</label>

                                <select data-live-search="true" class="form-control selectpicker" id="asm_users"
                                    name="asm_users" required multiple>
                                    <option value="">Select</option>



                                </select>

                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded bg-primary-subtle ">
                                                        <i
                                                            class="bx bx-check-shield font-size-24 mb-0 text-primary"></i>
                                                    </div>
                                                </div>

                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0 font-size-15">Total TM</h6>
                                                </div>



                                            </div>

                                            <div>
                                                <h4 class="mt-4 pt-1 mb-0 font-size-22" id="tm_counts">0</h4>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded bg-primary-subtle ">
                                                        <i
                                                            class="bx bx-check-shield font-size-24 mb-0 text-primary"></i>
                                                    </div>
                                                </div>

                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0 font-size-15">Total Cacual Visit</h6>
                                                </div>



                                            </div>

                                            <div>
                                                <h4 class="mt-4 pt-1 mb-0 font-size-22" id="total_visit">0</h4>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <h3>Casual Visit Info</h3>

                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>TM Name </th>
                                        <th>Region </th>
                                        <th>JD Code </th>
                                        <th>Station Name</th>
                                        <th>Visit Date</th>
                                        <th>Remarks</th>
                                        <!-- <th>TM</th> -->

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
                <form method="post" id="insert_form" enctype="multipart/form-data">


                    <div class="form-row mb-4">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Sizes</label>
                            <input type="number" class="form-control" id="name" name="name" placeholder="Enter Username"
                                required>
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
    var dealers_data = "";
    $(document).ready(function() {
        // $('.js-example-basic-multiple').select2();
        $('.selectpicker').select2();




        table = $('#myTable').DataTable({
            dom: 'Bfrtip',


            buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

        });
        fetchtable();



        load_all_select();


        $('.selectpicker').on('change', function() {
            filterTable();
        });

    })
    //     function deleteData(id){

    function filterTable() {
        var tm_counts = $('#asm_users').val();

        var filteredData = dealers_data.filter(function(item) {
            // return selectedCity.includes(item.city);
            return (
                (tm_counts.length === 0 || tm_counts.includes(item.users_id))
            );
        });

        var distinctTmCount = [...new Set(filteredData.map(dealer => dealer.users_id))].length;

        $('#total_visit').html(filteredData.length);
        $('#tm_counts').html(distinctTmCount);
        table.clear().draw();
        $.each(filteredData, function(index, data) {
            // $('#loader').hide();
            table.row.add([
                index + 1,
                data.tm_name,
                data.region,
                data.dealer_sap,
                data.site_name,
                data.visit_time,
                data.description,
                // data.name,

            ]).draw(false);
        });

    }


    function fetchtable() {
        var fromdate = $('#fromdate').val();
        var todate = $('#todate').val();

        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        fetch("<?php echo $api_url; ?>get/eng/get_cacual_visits.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&id=<?php echo $_SESSION['user_id'] ?>&from=" +
                fromdate + "&to=" + todate + "",
                requestOptions)
            .then(response => response.json())
            .then(response => {
                console.log(response)
                dealers_data = response;

                const userIds = dealers_data.map(item => item.users_id);

                // Create a Set to store unique `users_id`
                const uniqueUserIds = new Set(userIds);

                // Get the count of unique `users_id`
                const uniqueUserCount = uniqueUserIds.size;
                $('#total_visit').html(response.length);
                $('#tm_counts').html(uniqueUserCount);
                table.clear().draw();
                $.each(response, function(index, data) {
                    table.row.add([
                        index + 1,
                        data.tm_name,
                        data.region,
                        data.dealer_sap,
                        data.site_name,
                        data.visit_time,
                        data.description,
                        // data.name,

                    ]).draw(false);
                });
            })
            .catch(error => console.log('error', error));


    }

    function load_all_select() {

        $.ajax({
            url: '<?php echo $api_url; ?>get/get_eng_planner.php?key=03201232927',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#asm_users').empty();

                // Iterate through the data and append options to the select element
                $.each(data, function(index, item) {
                    $('#asm_users').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });

                // Refresh the Select2 element to display the newly added options
                $('#asm_users').trigger('change.select2');
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });






    }
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>