<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Retail Hierarchy |
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
                            <h3>Retail Hierarchy</h3>

                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Sap #</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">GRM</th>
                                        <th class="text-center">RM</th>
                                        <th class="text-center">TM</th>
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
            <h5 id="offcanvasRightLabel">Create</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <div class="form-group col-md-12">
                    <label for="inputAddress">Region <br><small>(If you want to select all Dealers under specific
                            region.)</small></label>

                    <select class="form-control" id="regions" name="regions" onchange='get_regions_dealers(this.value)'
                        required>

                    </select>
                </div>
                <hr>
                <form method="post" id="productts_form" enctype="multipart/form-data">


                    <div class="form-row mb-4">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Dealers</label>
                            <select class="w-100 multiple_select" id="dealers" name="dealers[]" multiple="multiple"
                                required>
                                <!-- Add more options as needed -->
                            </select>
                        </div>



                        <div class="form-group col-md-12">
                            <label for="inputAddress">GRM</label>

                            <select class="form-control" id="zm" name="zm" onchange='get_zm_tm(this.value)' required>

                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress">RM</label>

                            <select class="form-control" id="tm" name="tm" onchange='get_tm_asm(this.value)' required>

                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress">TM</label>

                            <select class="form-control" id="asm" name="asm">
                                <option value="">Select TM</option>
                            </select>
                        </div>





                    </div>

                    <div class="col-12">
                        <input type="hidden" name="row_id" id="row_id" value="0">

                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'] ?>">
               

                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-10 col-form-label"></label>
                            <div class="col-md-12 text-center">

                                <input class="btn rounded-pill btn-primary" type="submit" name="products_btn" id="products_btn"
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
    $(document).ready(function() {
        all_dealers();
        $('.multiple_select').select2();
        // $('.js-example-basic-multiple').select2();





        table = $('#myTable').DataTable({
            dom: 'Bfrtip',


            buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

        });

        fetchtable();
        $('#add_btn').click(function() {

            $('#row_id').val("");

            $('#productts_form')[0].reset();
            // alert("running")

        });

        $('#productts_form').on("submit", function(event) {
            event.preventDefault();
            // alert("Name")
            var formData = $(this).serialize();
            console.log(formData);
            $.ajax({
                url: "<?php echo $api_url; ?>update/multiple_dealers_heri.php",
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
        

    })






    function fetchtable() {

        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        fetch("<?php echo $api_url; ?>get/get_dealers_with_users.php?key=03201232927", requestOptions)
            .then(response => response.json())
            .then(response => {
                console.log(response)

                table.clear().draw();
                $.each(response, function(index, data) {
                    table.row.add([
                        index + 1,
                        data.sap_no,
                        data.dealer_name,
                        data.zm,
                        data.tm,
                        data.asm
                    ]).draw(false);
                });
            })
            .catch(error => console.log('error', error));


    }

    function load_all_select() {



        $.ajax({
            url: '<?php echo $api_url; ?>get/get_zm.php?key=03201232927',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // $('#zm').empty(); 
                console.log('ZM')
                console.log(data)
                $('#zm').append($('<option>', {
                    value: '',
                    text: 'Select GRM'
                }));
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

        $.ajax({
            url: '<?php echo $api_url; ?>get/get_dealers_region.php?key=03201232927',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // $('#zm').empty(); 
                console.log('ZM')
                console.log(data)
                $('#regions').append($('<option>', {
                    value: '',
                    text: 'Select Region'
                }));
                // Iterate through the data and append options to the select element
                $.each(data, function(index, item) {
                    $('#regions').append($('<option>', {
                        value: item.region,
                        text: item.region
                    }));
                });

                // Refresh the Select2 element to display the newly added options
                $('#regions').trigger('change.select2');
            },
            error: function(error) {
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
                    200: function(response) {
                        console.log(response);
                        // $('#myModal').modal('hide');
                        // console.log("Request was successful");
                        Swal.fire(
                            'Success!',
                            'Record Deleted Successfully',
                            'success'
                        )
                        setTimeout(function() {

                            // location.reload();


                        }, 2000);
                    },
                    // Add more status code handlers as needed
                },
                success: function(data) {
                    // Additional success handling if needed
                },
                error: function(xhr, textStatus, errorThrown) {
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
                200: function(response) {
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
                                    200: function(response) {
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
                                    200: function(response) {
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
    // $('#add_btn').on('click', function() {
    //     $('#zmRole').hide();
    //     $('#tmRole').hide();
    //     $("#salesRole").hide();

    // })

    function all_dealers() {

        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        var pre = "<?php echo $_SESSION['privilege']?>";
        var user_id = "<?php echo $_SESSION['user_id']?>";
        fetch("<?php echo $api_url; ?>get/dealers.php?key=03201232927&pre="+pre+"&user_id="+user_id+"", requestOptions)
            .then(response => response.json())
            .then(response => {
                
                $.each(response, function(index, data) {
                    console.log(data)

                    // Create a new option element
                    var newOption = $('<option>', {
                        value: data.id,
                        text: data.name+" - "+data.sap_no
                    });

                    // Append the new option to the select
                    $('#dealers').append(newOption);

                    // Trigger the change event to notify Select2 about the update
                    $('#dealers').trigger('change');
                });
            })
            .catch(error => console.log('error', error));


    }

    function get_zm_tm(id) {
        // alert(id)
        $.ajax({
            url: '<?php echo $api_url; ?>get/individual_tm_of_zm.php?key=03201232927&zm_id=' + id + '',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data)
                // Iterate through the data and append options to the select element
                $('#tm').empty();
                $('#tm').append($('<option>', {
                    value: '',
                    text: 'Select RM'
                }));
                $.each(data, function(index, item) {

                    $('#tm').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });

                // Refresh the Select2 element to display the newly added options
                // $('#zm').trigger('change.select2');
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    function get_tm_asm(id) {
        // alert(id)
        $.ajax({
            url: '<?php echo $api_url; ?>get/individual_asm_of_tm.php?key=03201232927&tm_id=' + id + '',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                // Iterate through the data and append options to the select element
                $('#asm').empty();
                $('#asm').append($('<option>', {
                    value: '',
                    text: 'Select ASM'
                }));
                $.each(data, function(index, item) {

                    $('#asm').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });

                // Refresh the Select2 element to display the newly added options
                // $('#zm').trigger('change.select2');
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    function get_regions_dealers(id) {
        // alert(id)
        if (id != "") {
            $.ajax({
                url: '<?php echo $api_url; ?>get/dealers_region.php?key=03201232927&region=' + id + '',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);

                    var region = [];
                    $.each(data, function(index, item) {
                        region.push(parseInt(item.id));

                    });
                    console.log(region)
                    $('#dealers').val(region).trigger('change');

                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });

        }
    }
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>