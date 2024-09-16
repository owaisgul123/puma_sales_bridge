<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dealers Reconciliation | <?php echo htmlspecialchars($_SESSION['user_name']); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="PUMA" name="description" />
    <meta content="PUMA" name="author" />

    <!-- Ensure the jQuery and SweetAlert scripts are loaded securely -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

    <!-- Include your CSS and other scripts -->
    <?php include 'css_script.php'; ?>
</head>

<body>
    <div id="layout-wrapper">
        <!-- Include the layout components -->
        <?php include 'header.php'; ?>
        <?php include 'sidebar.php'; ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Main content -->
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
                                    <div class="col-md-12" style="overflow: auto;">
                                        <table id="recon_table" style="width:100%" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>S #</th>
                                                    <th>Site Code</th>
                                                    <th>Site Name</th>
                                                    <th>TM</th>
                                                    <th>RM</th>
                                                    <th>Region</th>
                                                    <th>Planned Date</th>
                                                    <th>Actual Date</th>
                                                    <th>Last Visit</th>
                                                    <th>Days Since Last Visit</th>
                                                    <th>Product</th>
                                                    <th>Opening Stock (Total of all tanks)</th>
                                                    <th>Receipts</th>
                                                    <th>Sales as per Meter Readings</th>
                                                    <th>Book Stock</th>
                                                    <th>Physical Stock</th>
                                                    <th>Gain / Loss</th>
                                                    <th>DU1</th>
                                                    <th>DU2</th>
                                                    <th>DU3</th>
                                                    <th>DU4</th>
                                                    <th>DU5</th>
                                                    <th>DU6</th>
                                                    <th>DU7</th>
                                                    <th>DU8</th>
                                                    <th>OGRA Notified Price</th>
                                                    <th>Pump Price</th>
                                                    <th>Variance</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data-table-body">
                                                <!-- Data will be populated here by JavaScript -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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

    <!-- Overlay for right sidebar -->
    <div class="rightbar-overlay"></div>

    <!-- Offcanvas sidebar for reconciliation form -->
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
                        <input type="checkbox" id="selectAllTm"> Select All

                        <select class="w-100 multiple_select" id="dealers" name="dealers[]" multiple="multiple"
                            required>
                            <!-- Options will be populated by JavaScript -->
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
                    <input type="hidden" name="user_id" id="user_id"
                        value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
                    <div class="mb-3 row">
                        <div class="col-md-12 text-center">
                            <input class="btn rounded-pill btn-primary" type="button" onclick="getRecon_new()"
                                name="insert" id="insert" value="Save">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include additional scripts -->
    <?php include 'script_tags.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>

    <script>
    var recon_table = '';

    $(document).ready(function() {
        all_dealers();
        $('.multiple_select').select2();
        initializeDataTable();

        $('#add_btn').click(function() {
            $('#row_id').val("");
        });

        $('#selectAllTm').change(function() {
            if ($(this).is(':checked')) {
                $('#dealers > option').prop('selected', true);
            } else {
                $('#dealers > option').prop('selected', false);
            }
            $('#dealers').trigger('change');
        });
    });

    function all_dealers() {
        fetch(
                "<?php echo $api_url; ?>get/get_asm.php?key=03201232927&pre=<?php echo htmlspecialchars($_SESSION['privilege']); ?>&user_id=<?php echo htmlspecialchars($_SESSION['user_id']); ?>")
            .then(response => response.json())
            .then(response => {
                response.forEach(data => {
                    $('#dealers').append(new Option(data.name, data.id)).trigger('change');
                });
            })
            .catch(error => console.log('Error fetching dealers:', error));
    }

    function getRecon_new() {
        var dealers = $('#dealers').val();
        var from = $('#from').val();
        var to = $('#to').val();
        $('#dealer_recon_container').empty();
        recon_table.clear().draw();

        if (dealers.length > 0 && from !== "" && to !== "") {
            blocking();
            dealers.forEach(dealer => {
                $.ajax({
                    url: "<?php echo $api_url; ?>get/all_dealers_department_users.php?key=03201232927&is_role=0&user_id=" +
                        dealer,
                    method: 'GET',
                    dataType: 'json',
                    success: async function(data) {
                        if (data.length > 0) {
                            for (const item of data) {
                                const dealer_id = item.id;
                                try {
                                    const reconResponse = await fetch(
                                        "<?php echo $api_url; ?>get/get_dealers_recons_latest.php?key=03201232927&dealer_id=" +
                                        dealer_id + "&from=" + from + "&to=" + to);
                                    const reconData = await reconResponse.json();

                                    if (reconData.length > 0) {
                                        reconData.forEach((data, index) => {
                                            recon_table.row.add([
                                                recon_table.rows().count() + 1,
                                                // formatNumber(data.dealer_sap),
                                                data.dealer_sap,
                                                data.site,
                                                data.asm_name,
                                                data.tm_name,
                                                data.region,
                                                (data.plan_time).split(' ')[0],
                                                (data.inspection_date_current).split(' ')[0],
                                                (data.inspection_date_last.split(' ')[0]),
                                                data.no_of_days,
                                                data.product_name,
                                                data.opening_stock,
                                                data.receipts,
                                                data.sales,
                                                data.book_stock,
                                                data.current_physical_stock,
                                                data.loss_gain,
                                                data.DU1,
                                                data.DU2,
                                                data.DU3,
                                                data.DU4,
                                                data.DU5,
                                                data.DU6,
                                                data.DU7,
                                                data.DU8,
                                                data.ogra_price,
                                                data.pump_price,
                                                data.variance
                                            ]).draw();
                                        });
                                    }
                                } catch (error) {
                                    console.error('Error fetching dealer reconciliation:', error);
                                }
                            }
                        }
                        // formatNumbers();
                        $.unblockUI();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error fetching dealer department users:', textStatus,
                            errorThrown);
                        $.unblockUI();
                    }
                });
            });
        } else {
            Swal.fire({
                title: "Error!",
                text: "Please fill in all fields.",
                icon: "error",
                confirmButtonText: "OK"
            });
        }
    }

    function initializeDataTable() {
        recon_table = $('#recon_table').DataTable({
                ordering: false,
                dom: 'Bfrtip',
                pageLength: 50,
                buttons: [
                    'copy', 'csv', 'excel',
                    // {
                    //     extend: 'pdfHtml5',
                    //     orientation: 'landscape', // Set the orientation to landscape
                    //     pageSize: 'A4', // You can also set the page size here
                    //     exportOptions: {
                    //         columns: ':visible' // Export only visible columns
                    //     },
                    //     customize: function(doc) {
                    //         doc.defaultStyle.alignment = 'center'; // Optional: center align text
                    //         doc.styles.tableHeader.alignment = 'center'; // Optional: center align header
                    //     }
                    // },
                    'print'
                ]

            });
    }

    function blocking() {
        $.blockUI({
            message: '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>',
            css: {
                border: 'none',
                backgroundColor: 'transparent'
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

    function formatNumber(number) {
        if (!isNaN(number) && number !== null) {
            return Number(number).toLocaleString(); // Format the number with commas
        }
        return number; // Return as is if it's not a valid number
    }
    // Helper function to format number with commas
    function formatNumber(num) {
        num = num.replace(/\D/g, ''); // Remove non-digit characters
        return num.replace(/\B(?=(\d{3})+(?!\d))/g, ','); // Format with commas
    }
    </script>
</body>

</html>