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

                        <div class="col-md-6">
                            <button class="btn btn-soft-primary waves-effect waves-light" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" id="add_btn"
                                aria-controls="offcanvasRight"><i
                                    class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer"></i>Add</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h3>Task</h3>

                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>User</th>
                                        <th>Site Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <!-- <th>Delete</th> -->
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
    <div class="offcanvas offcanvas-end w-75" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 id="offcanvasRightLabel">Task</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <form method="post" id="insert_form" enctype="multipart/form-data">


                    <div class="row mb-4">
                        <!-- <div class=" col-md-4">
                            <label for="example-text-input" class="col-md-2 col-form-label">Date</label>

                            <input type="datetime-local" class="form-control" id='datetime' name='datetime' required>


                        </div> -->
                        <div class=" col-md-4">
                            <label for="example-text-input" class="col-md-2 col-form-label">Users</label>

                            <select class="form-control" id="dealers" name="dealers" required
                                onchange="get_managers(this.value)">
                                <!-- Add more options as needed -->
                            </select>
                            <input type="hidden" name="row_id" id="row_id" value="">
                            <input type="hidden" name="c_user_id" id="c_user_id" value="">
                            <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                        </div>





                        <div class=" col-md-4">
                            <label for="example-text-input" class="col-md-2 col-form-label">Description</label>

                            <textarea id="description" name="description" class="form-control ">



                            </textarea>

                        </div>


                        <div class="container-fluid">
                            <div class="row" id='user_pumps'>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>For Pump Please Select Users </h6>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>





                    </div>

                    <div class="col-12">

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
    all_dealers();
    $(document).ready(function() {
        // $('.js-example-basic-multiple').select2();



        setTimeout(function() {
            var pre = "<?php echo $_SESSION['privilege']; ?>";
            if (pre == 'TM' || pre == 'ASM') {
                var users_idss = "<?php echo $_SESSION['user_id']; ?>";
                console.log('User ID: ', users_idss); // Debugging statement
                $('#dealers').val(users_idss);
                console.log('Selected value: ', $('#dealers').val()); // Debugging statement
                $('#dealers').trigger('change');
                console.log('Change event triggered'); // Debugging statement
                $("#dealers").prop("disabled", true);

                // Call the get_managers function after setting the value
                // get_managers(users_idss);
            }


        }, 2000);


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

            // $('#insert_form')[0].reset();
            // alert("running")

        });

        $('#insert_form').on("submit", function(event) {
            event.preventDefault();
            // alert("Name")
            var data = new FormData(this);

            $.ajax({
                url: "<?php echo $api_url; ?>create/inspection/create_dealers_inspection_task.php",
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
                    Swal.fire(
                        'Server Error!',
                        xhr.responseText,
                        'error'
                    )
                }

            });

        });
        load_all_select();
    })

    function all_dealers() {

        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        fetch("<?php echo $api_url; ?>get/task_users.php?key=03201232927", requestOptions)
            .then(response => response.json())
            .then(response => {
                console.log(response)

                // table.clear().draw();
                var newOption = $('<option>', {
                    value: '',
                    text: 'Select'
                });
                $('#dealers').append(newOption);

                $.each(response, function(index, data) {

                    var name = data.name + ' - (' + data.privilege + ')';
                    // Create a new option element
                    var newOption = $('<option>', {
                        value: data.id,
                        text: name,
                        'data-id': data.privilege
                    });

                    // Append the new option to the select
                    $('#dealers').append(newOption);

                    // Trigger the change event to notify Select2 about the update
                    $('#dealers').trigger('change');
                });
            })
            .catch(error => console.log('error', error));


    }

    function get_managers(id) {
        // alert(id)
        if (id != "") {
            // var dataIdValue = $('#dealers').data('id');

            var selectedOption = $('#dealers').find('option:selected');

            // Get the data-id attribute value of the selected option
            var dataIdValue = selectedOption.data('id');

            // console.log(selectedOption.val());
            $('#c_user_id').val(id);
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };
            console.log("<?php echo $api_url; ?>get/inspection/get_current_month_visit_dealers.php?key=03201232927&id=" + id + "&pre=" +
                dataIdValue + "");
            fetch("<?php echo $api_url; ?>get/inspection/get_current_month_visit_dealers.php?key=03201232927&id=" + id + "&pre=" +
                    dataIdValue + "",
                    requestOptions)
                .then(response => response.json())
                .then(response => {
                    // console.log(response)



                    $('#user_pumps').empty();

                    var i = 1;
                    $.each(response, function(index, data) {

                        var name = data.name + ' - (' + data.privilege + ')';


                        // Append the new option to the select
                        $('#user_pumps').append('<div class="col-md-4 " id="col_' + i +
                            '" style="border: 1px solid #3f3f3f;">' +
                            '<div class="row p-3">' +
                            '<div class="col-md-2">' +
                            '<input type="checkbox" class="myCheckbox" id="dealer_checkbox' + i +
                            '" name="dealer_checkbox[]" value="0">' +
                            '<input type="hidden" id="text_checkbox_' + i +
                            '" name="text_checkbox[]" value="0">' +
                            '</div>' +
                            '<div class="col-md-5">' +
                            '<label for="example-text-input" class="col-md-2 col-form-label">Dealer </label>' +
                            '<p  id="dealer_name_' + i + '" >' + data.name + '<p>' +
                            '<input type="hidden" id="dealers_id_' + i +
                            '" name="dealers_id[]" value="' + data.id + '">' +
                            '</div>' +
                            '<div class="col-md-5">' +
                            '<label for="example-text-input" class="col-md-2 col-form-label">Inspection </label>' +

                            '<input type="date" class="form-control" id="inspection_date_' + i +
                            '" name="inspection_date[]"  required >' +
                            '</div>' +
                            '</div>' +

                            '</div>');




                        var checkboxes = $('#dealer_checkbox' + i + '');
                        var checkboxes_text = $('#text_checkbox_' + i + '');

                        // Add an event listener for the change event on each checkbox
                        checkboxes.on('change', function() {
                            console.log(this.id)
                            // Loop through each checkbox
                            if (checkboxes.is(':checked')) {
                                console.log('Checkbox is checked');
                                $(this).val(1);
                                checkboxes_text.val(1);
                            } else {
                                console.log('Checkbox is not checked');
                                $(this).val(0);
                                checkboxes_text.val(0);


                            }
                        });
                        i++;
                    });
                    var currentDate = new Date().toISOString().split('T')[0];

                    // Set the current date in all date-type inputs
                    $('input[type="date"]').val(currentDate);

                })
                .catch(error => console.log('error', error));
        }




    }

    function fetchtable() {
        var fromdate = $('#fromdate').val();
        var todate = $('#todate').val();
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        console.log(
            "<?php echo $api_url; ?>get/get_task_inspection.php?key=03201232927&user_id=<?php echo $_SESSION['user_id'] ?>&pre=<?php echo $_SESSION['privilege'] ?>&from=" +fromdate + "&to=" + todate + ""
        )
        fetch("<?php echo $api_url; ?>get/get_task_inspection.php?key=03201232927&user_id=<?php echo $_SESSION['user_id'] ?>&pre=<?php echo $_SESSION['privilege'] ?>&from=" +fromdate + "&to=" + todate + "",
                requestOptions)
            .then(response => response.json())
            .then(response => {
                console.log(response)

                table.clear().draw();
                $.each(response, function(index, data) {
                    table.row.add([
                        index + 1,
                        data.manager_name,
                        data.dealer_name,
                        data.time,
                        data.current_status,


                        // '<button type="button" id="delete" name="delete" onclick="deleteData(' +
                        // data.id +
                        // ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>'
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
            url: '<?php echo $api_url; ?>get/get_zm.php?key=03201232927',
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
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>