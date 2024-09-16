<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dealers Reconciliation |
        <?php echo $_SESSION['user_name']; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="PUMA" name="description" />
    <meta content="PUMA" name="PUMA" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script> -->
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
                                    <div class="col-md-12" id="dealer_recon_container" style="overflow: auto;"></div>
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
                    <div class="form-group col-md-12 d-none">
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
                            <input class="btn rounded-pill btn-primary" type="button" onclick="getRecon()" name="insert"
                                id="insert" value="Save">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'script_tags.php'; ?>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>

    <script>
    var table;
    var type;
    var subtype;

    $(document).ready(function() {
        all_dealers();
        $('.multiple_select').select2();

        $("#role").on("change", function() {
            var selectedRole = $(this).val();
            $("#salesRole, #zmRole, #tmRole,#logisticsSelect").hide();
            if (selectedRole === "Sales") {
                $("#salesRole").show();
            } else if (selectedRole === "Logistics") {
                $("#logisticsSelect").show();
            }
        });

        $("#sales").on("change", function() {
            var selectedSalesRole = $(this).val();
            $("#zmRole, #tmRole").hide();
            if (selectedSalesRole === "TM") {
                $("#zmRole").show();
            } else if (selectedSalesRole === "ASM") {
                $("#tmRole").show();
            }
        });

        $('#add_btn').click(function() {
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
                200: function(response) {
                    Swal.fire('Success!', 'Record Deleted Successfully', 'success');
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                },
                error: function(xhr, textStatus, errorThrown) {
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
                200: function(response) {
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
            success: function(data) {
                $('#zm').empty();
                $.each(data, function(index, item) {
                    $('#tm').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });
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
                $.each(data, function(index, item) {
                    $('#zm').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });
                $('#zm').trigger('change.select2');
            },
            error: function(error) {
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
                $.each(response, function(index, data) {
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

    function getRecon() {
        var dealers = $('#dealers').val();
        var from = $('#from').val();
        var to = $('#to').val();
        $('#dealer_recon_container').empty();

        if (from !== '' && to !== '') {
            blocking();
            $.ajax({
                url: "<?php echo $api_url; ?>get/all_dealers_department_users.php?key=03201232927&is_role=1&user_id=" +
                    dealers,
                method: 'GET',
                dataType: 'json',
                success: async function(data) {
                    if (data.length > 0) {
                        var tableHtml = `
                        <table id="recon_table" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S #</th>
                                    <th>Dealer</th>
                                    <th>TM</th>
                                    <th>RM</th>
                                    <th>Region</th>
                                    <th>Inspection Date (Current)</th>
                                    <th>Inspection Date (Last)</th>
                                    <th>Days since last visit</th>
                                    <th>Product</th>
                                    <th>Sale</th>
                                    <th>Daily Nozzle Sale (Avg)</th>
                                    <th>Monthly Nozzle Sales (Avg)</th>
                                    <th>Receipt</th>
                                    <th>Gain/Loss</th>
                                </tr>
                            </thead>
                            <tbody>`;

                        var di = 1;
                        for (const item of data) {
                            var dealer_id = item.id;
                            const reconResponse = await fetch(
                                "<?php echo $api_url; ?>get/get_dealers_recons_last_visit.php?key=03201232927&dealer_id=" +
                                dealer_id + "&from=" + from + "&to=" + to
                            );
                            const reconData = await reconResponse.json();

                            if (reconData.length > 0) {
                                for (const dealer of reconData) {
                                    var dealer_name = dealer.name;
                                    var region = dealer.region;
                                    var zm_name = dealer.zm_name;
                                    var tm_name = dealer.tm_name;
                                    var asm_name = dealer.asm_name;
                                    var recon = dealer.recon;

                                    tableHtml += `
                                    <tr>
                                        <td>${di}</td>
                                        <td>${dealer_name}</td>
                                        <td>${asm_name}</td>
                                        <td>${tm_name}</td>
                                        <td>${region}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>`;

                                    if (recon.length > 0) {
                                        for (const recon_item of recon) {
                                            tableHtml += `
                                            <tr>
                                                <td style="color: transparent;">${di}</td>
                                                <td style="color: transparent;">${dealer_name}</td>
                                                <td style="color: transparent;">${asm_name}</td>
                                                <td style="color: transparent;">${tm_name}</td>
                                                <td style="color: transparent;">${region}</td>
                                                <td>${recon_item.created_at}</td>
                                                <td>${recon_item.last_visit_date}</td>
                                                <td>${recon_item.no_of_days}</td>
                                                <td>${recon_item.product_name}</td>
                                                <td>${recon_item.sales_as_per_meter_reading}</td>
                                                <td>${(recon_item.avg_daily_sale).toFixed(2)}</td>
                                                <td>${(recon_item.avg_month_sale).toFixed(2)}</td>
                                                <td>${recon_item.purchase_during_inspection_period}</td>
                                                <td>${recon_item.gain_loss}</td>
                                            </tr>`;
                                        }
                                    }
                                    di++;
                                }
                            }
                        }

                        tableHtml += `</tbody></table>`;
                        $('#dealer_recon_container').html(tableHtml);
                        formatNumbers();
                        initializeDataTable();
                        $.unblockUI();
                    } else {
                        $('#dealer_recon_container').append('Data Not Found');
                        alert('No Dealers Found');
                        $.unblockUI();
                    }
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        } else {
            $('#dealer_recon_container').append('Data Not Found');
            alert("Please select both dates");
            $.unblockUI();
        }
    }


    function initializeDataTable() {
        $('#recon_table').DataTable({
            ordering: false,
            dom: 'Bfrtip',
            pageLength: 50,
            buttons: [
                'copy', 'csv', 'excel',
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: ':visible'
                    },
                    customize: function(doc) {
                        doc.defaultStyle.alignment = 'center';
                        doc.styles.tableHeader.alignment = 'center';
                    }
                },
                'print'
            ],
            initComplete: function() {
                var api = this.api();
                var columnsToSearch = [1, 2, 3, 4]; // Corresponding to Dealer, TM, RM, Region

                api.columns().every(function(index) {
                    if (columnsToSearch.includes(index)) {
                        var column = this;
                        var header = $(column.header());

                        // Create a wrapper element
                        var wrapper = $('<div style="display: flex; align-items: center;"></div>');

                        // Create and append header text
                        var headerText = $('<span>' + header.text() + '</span>');
                        wrapper.append(headerText);

                        // Create and append search input
                        var input = $(
                                '<input type="text" placeholder="Search" style="margin-left: 10px;"/>'
                            )
                            .appendTo(wrapper) // Add input to the wrapper
                            .on('keyup change clear', function() {
                                if (column.search() !== this.value) {
                                    column
                                        .search(this.value)
                                        .draw();
                                }
                            });

                        // Replace the header content with the wrapper
                        header.empty().append(wrapper);
                    }
                });
            }
        });
    }


    function blocking() {
        $.blockUI({
            message: '<h1>Please Wait...</h1>',
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }
        });
    }

    function formatNumbers() {
        $('body *').each(function() {
            var element = $(this);
            if (element.children().length === 0) { // Only text nodes
                var html = element.html();
                // Use a regex that does not match dates
                var newHtml = html.replace(/\b(?!\d{4}-\d{2}-\d{2})(\d+)\b/g, function(match) {
                    return formatNumber(match);
                });
                element.html(newHtml);
            }
        });
    }

    // Helper function to format number with commas
    function formatNumber(num) {
        num = num.replace(/\D/g, ''); // Remove non-digit characters
        return num.replace(/\B(?=(\d{3})+(?!\d))/g, ','); // Format with commas
    }
    </script>
</body>

</html>