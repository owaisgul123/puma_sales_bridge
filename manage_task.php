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
                            <h3>Task</h3>

                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>User</th>
                                        <th>Site Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Delete</th>
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
    <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 id="offcanvasRightLabel">Task</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <form method="post" id="insert_form" enctype="multipart/form-data">


                    <div class="form-row mb-4">
                        <div class="form-group col-md-12">
                            <label for="example-text-input" class="col-md-2 col-form-label">Date</label>

                            <input type="datetime-local" class="form-control" id='datetime' name='datetime' required>


                        </div>
                        <div class="form-group col-md-12">
                            <label for="example-text-input" class="col-md-2 col-form-label">Dealers</label>

                            <select class="w-100 multiple_select form-control" id="dealers" name="dealers" required
                                onchange="get_managers(this.value)">
                                <!-- Add more options as needed -->
                            </select>

                        </div>
                        <div class="form-group col-md-12">
                            <label for="example-text-input" class="col-md-2 col-form-label">Assign Task To</label>

                            <select id="sales" name="dealers_manager" class="form-control ">



                            </select>

                        </div>

                        <div class="form-group col-md-12">
                            <label for="example-text-input" class="col-md-2 col-form-label">Description</label>

                            <textarea id="description" name="description" class="form-control ">



                            </textarea>

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
        all_dealers()

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

        fetch("<?php echo $api_url; ?>get/dealers.php?key=03201232927", requestOptions)
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

    function get_managers(id) {
        if (id != "") {

            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            fetch("<?php echo $api_url; ?>get/get_spec_dealer.php?key=03201232927&dealer_id=" + id + "",
                    requestOptions)
                .then(response => response.json())
                .then(result => {
                    console.log(result)
                    $('#sales').empty();
                    var zm = result[0].zm
                    var tm = result[0].tm
                    var asm = result[0].asm


                    $('#sales').append('<option>Select </option>');
                    $('#sales').append('<option value=' + zm + '>GRM </option>');
                    $('#sales').append('<option value=' + tm + '>RM </option>');
                    $('#sales').append('<option value=' + asm + '>TM </option>');


                })
                .catch(error => console.log('error', error));
        }




    }

    function fetchtable() {

        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        fetch("<?php echo $api_url; ?>get/get_task_inspection.php?key=03201232927&id=<?php echo $_SESSION['user_id'] ?>",
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
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>