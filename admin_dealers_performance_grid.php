<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dealers Reconciliation | <?php echo htmlspecialchars($_SESSION['user_name']); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="PUMA" name="description" />
    <meta content="PUMA" name="author" />

    <!-- jQuery, AG Grid, and SweetAlert scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- AG Grid CSS and Scripts -->
    <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/styles/ag-grid.css">
    <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/styles/ag-theme-alpine.css">
    <script src="https://unpkg.com/ag-grid-community/dist/ag-grid-community.noStyle.js"></script>
    <script src="https://unpkg.com/ag-grid-enterprise/dist/ag-grid-enterprise.min.js"></script>

    <?php include 'css_script.php'; ?>
</head>

<body>
    <div id="layout-wrapper">
        <?php include 'header.php'; ?>
        <?php include 'sidebar.php'; ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-soft-primary waves-effect waves-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" id="add_btn" aria-controls="offcanvasRight">
                                <i class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer"></i>Search
                            </button>
                            <button class="btn btn-success" id="exportBtn">Export to Excel</button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h3>Dealers Reconciliation</h3>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12 ag-theme-alpine" style="height: 400px;">
                                        <div id="recon_table" style="height: 100%; width: 100%;"></div>
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

    <div class="rightbar-overlay"></div>

    <!-- Offcanvas for adding data -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 id="offcanvasRightLabel">Reconciliation</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="monthSelect">Select Month</label>
                        <input type="month" id="monthSelect" class="form-control" onchange="generateTableHeader()">
                    </div>
                </div>
                <div class="col-12">
                    <input type="hidden" name="row_id" id="row_id" value="0">
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
                    <div class="mb-3 row">
                        <div class="col-md-12 text-center">
                            <input class="btn rounded-pill btn-primary" type="button" onclick="getRecon_new()" name="insert" id="insert" value="Save">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'script_tags.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>

    <script>
        var recon_table = null; // Global reference to AG Grid instance
        var dayColumns = []; // For storing dynamic day columns

        $(document).ready(function() {
            initializeAGGrid();
            $('#exportBtn').click(function() {
                recon_table.api.exportDataAsExcel();
            });
        });

        function initializeAGGrid() {
            // Static columns
            const columnDefs = [
                { headerName: 'S #', field: 'index', width: 90 },
                { headerName: 'Site Name', field: 'site' },
                { headerName: 'Site Code', field: 'dealer_sap' },
                { headerName: 'Region', field: 'region' },
                { headerName: 'City', field: 'city' },
                { headerName: 'RM', field: 'rm_name' },
                { headerName: 'TM', field: 'tm_name' },
                { headerName: 'Visit Date', field: 'plan_data' },
                { headerName: 'Total Visit GM', field: 'gm_count' },
                { headerName: 'Total Visit RM', field: 'rm_count' },
                { headerName: 'Total Visit TM', field: 'tm_count' },
            ];

            const gridOptions = {
                columnDefs: columnDefs.concat(dayColumns), // Add dynamic day columns here
                rowData: [], // This will be populated later by AJAX
                pagination: true,
                paginationPageSize: 50,
                domLayout: 'autoHeight',
                defaultColDef: {
                    resizable: true,
                    sortable: true,
                    filter: true
                },
                animateRows: true,
                enableRangeSelection: true,
                excelStyles: [
                    {
                        id: 'header',
                        interior: { color: '#e0e0e0', pattern: 'Solid' },
                        font: { bold: true }
                    }
                ],
                onGridReady: function(params) {
                    recon_table = params.api; // Corrected reference to the AG Grid API
                    getRecon_new(); // Load data into grid
                }
            };

            // Initialize the grid
            const eGridDiv = document.querySelector('#recon_table');
            new agGrid.Grid(eGridDiv, gridOptions);
        }

        function generateTableHeader() {
            const selectedMonth = $('#monthSelect').val(); // Get the selected month
            if (!selectedMonth) return;

            const [year, month] = selectedMonth.split('-');
            const daysInMonth = new Date(year, month, 0).getDate();

            dayColumns = []; // Reset day columns
            for (let day = 1; day <= daysInMonth; day++) {
                dayColumns.push({
                    headerName: `Day ${day}`,
                    field: `day_${day}`,
                    width: 100,
                    cellRenderer: function(params) {
                        const dayInfo = params.value || {};
                        return `<span style="background-color:${dayInfo.gm_color};width:33%;">.</span>
                                <span style="background-color:${dayInfo.rm_color};width:33%;">.</span>
                                <span style="background-color:${dayInfo.tm_color};width:33%;">.</span>`;
                    }
                });
            }

            initializeAGGrid(); // Reinitialize grid with updated day columns
            getRecon_new(); // Reload data
        }

        function getRecon_new() {
            var monthSelect = $('#monthSelect').val();

            if (monthSelect) {
                blocking();
                $.ajax({
                    url: "<?php echo $api_url; ?>get/get_admin_current_month_visit_report.php?key=03201232927&months=" + monthSelect,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        const rowData = [];
                        if (data.length > 0) {
                            $.each(data, function(index, item) {
                                const rowDataItem = {
                                    index: index + 1,
                                    site: item.site,
                                    dealer_sap: item.dealer_sap,
                                    region: item.region,
                                    city: item.city,
                                    rm_name: item.rm_name,
                                    tm_name: item.tm_name,
                                    plan_data: item.plan_data,
                                    gm_count: item.gm_count,
                                    rm_count: item.rm_count,
                                    tm_count: item.tm_count
                                };

                                // Fill day data dynamically
                                const dateInfoArray = item.date_info || [];
                                $.each(dateInfoArray, function(dayIndex, dateInfo) {
                                    rowDataItem[`day_${dayIndex + 1}`] = {
                                        gm_color: dateInfo.gm_color,
                                        rm_color: dateInfo.rm_color,
                                        tm_color: dateInfo.tm_color
                                    };
                                });

                                rowData.push(rowDataItem);
                            });
                        }
                        recon_table.setRowData(rowData); // Corrected method to set row data
                        $.unblockUI();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error fetching data:', textStatus, errorThrown);
                        $.unblockUI();
                    }
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

        function blocking() {
            $.blockUI({
                message: '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>',
                css: { border: 'none', backgroundColor: 'transparent' }
            });
        }
    </script>
</body>

</html>
