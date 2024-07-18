<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Users |
        <?php echo $_SESSION['user_name']; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include 'css_script.php'; ?>
</head>

<body>
    <div id="layout-wrapper">
        <?php include 'header.php'; ?>
        <?php include 'sidebar.php'; ?>
        <?php include 'right_siebar.php'; ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-soft-primary waves-effect waves-light" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" id="add_btn"
                                aria-controls="offcanvasRight">
                                <i class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer"></i>Search
                            </button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h3>Dealers Reconciliation</h3>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12" id="dealer_recon_container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'footer.php'; ?>
            </div>
        </div>
    </div>

    <div class="rightbar-overlay"></div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 id="offcanvasRightLabel">Reconciliation</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <div class="form-row mb-4">
                    <div class="form-group col-md-12">
                        <label for="dealers" class="col-md-2 col-form-label">TM</label>
                        <select class="w-100 form-control" id="dealers" name="dealers[]" required>
                            <option value="">Select TM</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="from" class="col-md-2 col-form-label">From</label>
                        <input type="date" class="form-control" id="from" name="from" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="to" class="col-md-2 col-form-label">To</label>
                        <input type="date" class="form-control" id="to" name="to" required>
                    </div>
                </div>
                <div class="col-12">
                    <input type="hidden" name="row_id" id="row_id" value="0">
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-10 col-form-label"></label>
                        <div class="col-md-12 text-center">
                            <input class="btn rounded-pill btn-primary" type="button" onclick="get_recon()"
                                name="insert" id="insert" value="Save">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'script_tags.php'; ?>

    <script>
        var table;
        var type;
        var subtype;

        $(document).ready(function () {
            all_dealers();
            $('.multiple_select').select2();

            $("#role").on("change", function () {
                var selectedRole = $(this).val();
                $("#salesRole, #zmRole, #tmRole,#logisticsSelect").hide();
                if (selectedRole === "Sales") {
                    $("#salesRole").show();
                } else if (selectedRole === "Logistics") {
                    $("#logisticsSelect").show();
                }
            });

            $("#sales").on("change", function () {
                var selectedSalesRole = $(this).val();
                $("#zmRole, #tmRole").hide();
                if (selectedSalesRole === "TM") {
                    $("#zmRole").show();
                } else if (selectedSalesRole === "ASM") {
                    $("#tmRole").show();
                }
            });

            $('#add_btn').click(function () {
                $('#row_id').val("");
            });

            load_all_select();
        });

        function deleteData(id) {
            var settings = {
                "url": "<?php echo $api_url; ?>delete/delete_container_size.php?key=03201232927&id=" + id,
                "method": "GET",
                "timeout": 0,
            };

            $.ajax({
                ...settings,
                statusCode: {
                    200: function (response) {
                        Swal.fire('Success!', 'Record Deleted Successfully', 'success');
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        Swal.fire('Server Error!', 'Record Not Deleted', 'error');
                    }
                }
            });
        }

        function editData(id) {
            var settings = {
                "url": "<?php echo $api_url; ?>get/get_container_sizes.php?key=03201232927&id=" + id,
                "method": "GET",
                "timeout": 0,
            };

            $.ajax({
                ...settings,
                statusCode: {
                    200: function (response) {
                        $('#row_id').val(response[0]['id']);
                        $('#name').val(response[0]['sizes']);
                    }
                }
            });
            $('#offcanvasRight').offcanvas('show');
        }

        function load_all_select() {
            $.ajax({
                url: '<?php echo $api_url; ?>get/get_tm.php?key=03201232927',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#zm').empty();
                    $.each(data, function (index, item) {
                        $('#tm').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });
                    $('#tm').trigger('change.select2');
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                }
            });

            $.ajax({
                url: '<?php echo $api_url; ?>get/get_zm.php?key=03201232927',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#zm').empty();
                    $.each(data, function (index, item) {
                        $('#zm').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });
                    $('#zm').trigger('change.select2');
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

        function all_dealers() {
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            fetch("<?php echo $api_url; ?>get/get_asm.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>",
                requestOptions)
                .then(response => response.json())
                .then(response => {
                    $.each(response, function (index, data) {
                        var newOption = $('<option>', {
                            value: data.id,
                            text: data.name
                        });
                        $('#dealers').append(newOption);
                        $('#dealers').trigger('change');
                    });
                })
                .catch(error => console.log('error', error));
        }

        async function get_recon() {
            var dealers = $('#dealers').val();
            var from = $('#from').val();
            var to = $('#to').val();
            $('#dealer_recon_container').empty();

            if (dealers.length > 0) {
                try {
                    var requestOptions = {
                        method: 'GET',
                        redirect: 'follow'
                    };

                    const response = await fetch(
                        "<?php echo $api_url; ?>get/all_dealers_department_users.php?key=03201232927&is_role=0&user_id=" +
                        dealers,
                        requestOptions
                    );
                    const data = await response.json();

                    if (data.length > 0) {
                        for (const item of data) {
                            var dealer_id = item.id;
                            console.log("<?php echo $api_url; ?>get/get_dealers_recons.php?key=03201232927&dealer_id=" +
                                dealer_id + "&from=" + from + "&to=" + to)
                            const reconResponse = await fetch(
                                "<?php echo $api_url; ?>get/get_dealers_recons.php?key=03201232927&dealer_id=" +
                                dealer_id + "&from=" + from + "&to=" + to,
                                requestOptions
                            );
                            const reconData = await reconResponse.json();
                            if (reconData.length > 0) {
                                var table = `
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Dealer</th>
                                <th>Region</th>
                                <th>Recon</th>
                            </tr>
                        </thead>
                        <tbody>`;

                                for (const dealer of reconData) {
                                    var dealer_name = dealer.name;
                                    // var terr = dealer.terr;
                                    var region = dealer.region;
                                    var recon = dealer.recon;

                                    if (recon.length > 0) {


                                        table += `
                        <tr>
                            <td>${dealer_name}</td>
                            <td>${region}</td>
                            <td>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>TM Name</th>
                                            <th>Product</th>
                                            <th>Sale</th>
                                            <th>Receipt</th>
                                            <th>Variance</th>
                                            <th>Variance %</th>
                                            <th>Recon Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;

                                        for (const recon_item of recon) {
                                            table += `
                            <tr>
                                <td>${recon_item.name}</td>
                                <td>${recon_item.product_name}</td>

                                <td>${recon_item.sales_as_per_meter_reading}</td>
                                <td>${recon_item.purchase_during_inspection_period}</td>
                                <td>${recon_item.gain_loss}</td>
                                <td>${(recon_item.gain_loss/recon_item.sales_as_per_meter_reading)*100}</td>
                                <td>${recon_item.created_at}</td>
                            </tr>`;
                                        }

                                        table += `
                                    </tbody>
                                </table>
                            </td>
                        </tr>`;
                                    } else {
                                        $('#dealer_recon_container').append('Data Not Found');

                                    }
                                }

                                table += `
                        </tbody>
                    </table>`;

                                $('#dealer_recon_container').append(table);
                            }
                        }
                    } else {
                        $('#dealer_recon_container').append('Data Not Found');

                        alert('No Dealers Found');
                    }
                } catch (error) {
                    console.log('error', error);
                }
            } else {
                $('#dealer_recon_container').append('Data Not Found');
            }
        }
    </script>
</body>

</html>