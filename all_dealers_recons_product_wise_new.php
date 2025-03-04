<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Reconciliation Analyzing Report |
        <?php echo $_SESSION['user_name']; ?>
    </title>
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
<style>
table {
    width: 100%;
    border-collapse: collapse;
    /* Ensures no double borders */
}

.table-wrapper {
    overflow-y: auto;
    height: 80vh;
    /* Adjust the height as needed */
}

/* Apply border to table cells */
th,
td {
    border: 1px solid black;
    /* Black border for all cells */
    padding: 8px;
    /* Space inside cells */
    /* text-align: center; */
    /* Center align text */
}

/* Ensure DataTables styling doesn't override the borders */
.dataTable td,
.dataTable th {
    border: 1px solid black !important;
    /* Force black borders */
}
</style>

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
                            <h3>Reconciliation Analyzing Report</h3>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="card shadow-lg rounded-lg">
                                        <div class="card-header bg-primary text-white text-center">
                                            <h4 class="mb-0 text-white">Recon Statistics : <span class=" text-white" id="total_recons">0</span></h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <!-- First Column -->
                                                <div class="col-md-6">
                                                    
                                                    <div class="p-3 border-bottom">
                                                        <i class="bx bx-buildings text-primary font-size-24"></i>
                                                        <!-- Blue -->
                                                        <span class="fw-bold ms-2">No of Unique Sites Recons:</span>
                                                        <span class="float-end text-dark"
                                                            id="total_sites_recons">0</span>
                                                    </div>
                                                    <div class="p-3 border-bottom d-none">
                                                        <i class="bx bx-calendar text-warning font-size-24"></i>
                                                        <!-- Yellow -->
                                                        <span class="fw-bold ms-2">Avg No of Days:</span>
                                                        <span class="float-end text-dark" id="avg_day">0</span>
                                                    </div>
                                                    <div class="p-3 border-bottom">
                                                        <i class="bx bx-gas-pump text-danger font-size-24"></i>
                                                        <!-- Red -->
                                                        <span class="fw-bold ms-2">Total External Upliftment:</span>
                                                        <span class="float-end text-dark"
                                                            id="total_external_upliftment">0 Litres</span>
                                                    </div>
                                                    <div class="p-3 border-bottom">
                                                        <i class="bx bx-droplet text-info font-size-24"></i>
                                                        <!-- Light Blue -->
                                                        <span class="fw-bold ms-2">Total External Upliftment
                                                            (PMG):</span>
                                                        <span class="float-end text-dark"
                                                            id="total_external_upliftment_pmg">0 Litres</span>
                                                    </div>
                                                    <div class="p-3 border-bottom">
                                                    <i class="bx bx-droplet text-info font-size-24"></i>
                                                        <!-- Gray -->
                                                        <span class="fw-bold ms-2">Total External Upliftment
                                                            (HSD):</span>
                                                        <span class="float-end text-dark"
                                                            id="total_external_upliftment_hsd">0 Litres</span>
                                                    </div>
                                                    <div class="p-3 border-bottom d-none">
                                                    <i class="bx bx-droplet text-info font-size-24"></i>
                                                        <!-- Purple -->
                                                        <span class="fw-bold ms-2">Total External Upliftment
                                                            (Hasron):</span>
                                                        <span class="float-end text-dark"
                                                            id="total_external_upliftment_hasron">0 Litres</span>
                                                    </div>
                                                </div>

                                                <!-- Second Column -->
                                                <div class="col-md-6">
                                                    
                                                    <div class="p-3 border-bottom">
                                                        <i class="bx bx-stats text-success font-size-24"></i>
                                                        <!-- Green -->
                                                        <span class="fw-bold ms-2">Monthly Nozzle Potential
                                                            (MF):</span>
                                                        <span class="float-end text-dark" id="mix_potential">0
                                                            Litres</span>
                                                    </div>
                                                    <div class="p-3 border-bottom">
                                                        <i class="bx bx-bar-chart text-primary font-size-24"></i>
                                                        <!-- Blue -->
                                                        <span class="fw-bold ms-2">Monthly Nozzle Potential
                                                            (PMG):</span>
                                                        <span class="float-end text-dark" id="pmg_potential">0
                                                            Litres</span>
                                                    </div>
                                                    <div class="p-3 border-bottom">
                                                        <i class="bx bx-trending-up text-warning font-size-24"></i>
                                                        <!-- Yellow -->
                                                        <span class="fw-bold ms-2">Monthly Nozzle Potential
                                                            (HSD):</span>
                                                        <span class="float-end text-dark" id="hsd_potential">0
                                                            Litres</span>
                                                    </div>
                                                    <div class="p-3 border-bottom d-none">
                                                        <i class="bx bx-line-chart text-danger font-size-24"></i>
                                                        <!-- Red -->
                                                        <span class="fw-bold ms-2">Monthly Nozzle Potential
                                                            (Hasron):</span>
                                                        <span class="float-end text-dark" id="hasron_potential">0
                                                            Litres</span>
                                                    </div>
                                                </div>
                                            </div> <!-- End of Row -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12" style="overflow: auto;">
                                        <!-- <button id="exportButton" class="btn btn-success">Export to Excel</button> -->
                                        <div class="table-wrapper">
                                            <table id="recon_table" style="width:100%"
                                                class="table table-bordered dataTable">
                                                <thead>
                                                    <!-- <tr>
                                                    <th colspan="9"></th>
                                                    <th colspan="6" class="table-active text-center">Diesel</th>
                                                    <th colspan="6" class="table-success text-center">Gasoline</th>
                                                    <th colspan="6" class="table-success text-center">Gasoline 95</th>
                                                </tr> -->
                                                    <tr>
                                                        <th>S #</th>
                                                        <th>Site Code</th>
                                                        <th>Site Name</th>
                                                        <th>Territory Manager</th>
                                                        <!-- <th>Territory</th> -->
                                                        <th>Region</th>
                                                        <th>Product</th>
                                                        <th>Tank Behaviour</th>
                                                        <th>External Dumping</th>
                                                        <th>External Upliftment</th>
                                                        <!-- <th>Opening Date</th>
                                                        <th>Closing Date</th> -->
                                                        <th>No of Days</th>
                                                        <th>Daily Sales-L</th>
                                                        <th>Opening Stock</th>
                                                        <th>Physical Stock</th>
                                                        <th>Receipts</th>
                                                        <th>Sales</th>
                                                        <th>Book</th>
                                                        <th>Variance</th>
                                                        <th>Variance %</th>
                                                        <th>Remark</th>



                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>S #</th>
                                                        <th>SAP Code</th>
                                                        <th>Site</th>
                                                        <th>Territory Manager</th>
                                                        <!-- <th>Territory</th> -->
                                                        <th>Region</th>
                                                        <th>Product</th>
                                                        <th>Tank Behaviour</th>
                                                        <th>External Dumping</th>
                                                        <th>External Upliftment</th>
                                                        <!-- <th>Opening Date</th>
                                                        <th>Closing Date</th> -->
                                                        <th>No of Days</th>
                                                        <th>Daily Sales-L</th>
                                                        <th>Opening Stock</th>
                                                        <th>Physical Stock</th>
                                                        <th>Receipts</th>
                                                        <th>Sales</th>
                                                        <th>Book</th>
                                                        <th>Variance</th>
                                                        <th>Variance %</th>
                                                        <th>Remark</th>

                                                    </tr>
                                                </tfoot>
                                                <tbody id="data-table-body">
                                                    <!-- Data will be populated here by JavaScript -->
                                                </tbody>
                                            </table>
                                        </div>
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
                            <!-- <option value="">Select TM</option> -->
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="products" class="col-md-2 col-form-label">Products</label>
                        <select class="w-100 form-control" id="products" name="products[]" required>
                            <option value="">Select Product</option>
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
        all_products();
        initializeDataTable();
        $('.multiple_select').select2();
        // $("#exportButton").click(function() {
        //     var now = new Date();
        //     var formattedDateTime = formatDateTime(now);
        //     var wb = XLSX.utils.table_to_book(document.getElementById('recon_table'), {
        //         sheet: "Sheet1"
        //     });
        //     XLSX.writeFile(wb, 'Recon-Report-' + formattedDateTime + '.xlsx');


        // });

        $('#add_btn').click(function() {
            $('#row_id').val("");
        });
        $('#selectAllTm').change(function() {
            if ($(this).is(':checked')) {
                // Select all options
                $('#dealers > option').prop('selected', true);
                $('#dealers').trigger('change'); // Update the Select2 dropdown
            } else {
                // Deselect all options
                $('#dealers > option').prop('selected', false);
                $('#dealers').trigger('change'); // Update the Select2 dropdown
            }
        });

        // $("#dealers").select2(); // Initialize the select2 for dealers dropdown
    });

    function formatDateTime(date) {
        var year = date.getFullYear();
        var month = ("0" + (date.getMonth() + 1)).slice(-2);
        var day = ("0" + date.getDate()).slice(-2);
        var hours = ("0" + date.getHours()).slice(-2);
        var minutes = ("0" + date.getMinutes()).slice(-2);
        var seconds = ("0" + date.getSeconds()).slice(-2);
        return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
    }

    function all_dealers() {
        fetch(
                "<?php echo $api_url; ?>get/get_asm.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>"
            )
            .then(response => response.json())
            .then(response => {
                response.forEach(data => {
                    $('#dealers').append(new Option(data.name, data.id)).trigger('change');
                });
            })
            .catch(error => console.log('Error fetching dealers:', error));
    }

    function all_products() {
        // alert('Hamza')
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        fetch("<?php echo $api_url; ?>get/get_all_products.php?key=03201232927",
                requestOptions)
            .then(response => response.json())
            .then(result => {
                var products_name = $("#products");



                $.each(result, function(index, data) {
                    console.log('all products')
                    console.log(data.name)
                    products_name.append($('<option>', {
                        value: data.id,
                        text: data.name
                    }));


                });
            })
            .catch(error => console.log('error', error));
    }

    async function getRecon_new() {
        var dealers = $('#dealers').val();
        var from = $('#from').val();
        var to = $('#to').val();
        var products = $('#products').val();

        $('#dealer_recon_container').empty(); // Clear previous results
        recon_table.clear().draw(); // Clear the table

        if (dealers.length > 0 && from !== "" && to !== "") {
            blocking(); // Block the UI while processing

            try {
                var di = 1; // Counter for row numbers
                var recon_count = 0;
                var totalDays = 0;
                var upliftment_count = 0;
                var upliftment_count_pmg = 0;
                var upliftment_count_hsd = 0;
                var upliftment_count_hasron = 0;
                var total_sites_recons = 0;
                let totalOverall = 0;
                let totalPMG = 0;
                let totalHSD = 0;
                let totalHasron = 0;

                for (var i = 0; i < dealers.length; i++) {
                    let tm_id = dealers[i];

                    // Fetch dealer information for each dealer
                    let dealerData = await $.ajax({
                        url: `<?php echo $api_url; ?>get/all_dealers_department_users.php?key=03201232927&is_role=0&user_id=${tm_id}`,
                        method: 'GET',
                        dataType: 'json'
                    });

                    if (dealerData.length > 0) {
                        for (const item of dealerData) {
                            let dealer_id = item.id;

                            // Fetch recon data for each dealer and product
                            try {
                                let reconUrl =
                                    `<?php echo $api_url; ?>get/get_dealers_recons_product_wise_new.php?key=03201232927&dealer_id=${dealer_id}&from=${from}&to=${to}&products=${products}&tm_id=${tm_id}`;
                                console.log(`Recon API URL: ${reconUrl}`);
                                let reconResponse = await fetch(reconUrl);
                                let reconData = await reconResponse.json();

                                console.log("Recon Data:", reconData); // Debugging

                                let uniqueTaskIds = new Set();
                                let taskDaysMap = {};

                                // Iterate over reconData to populate uniqueTaskIds and calculate totalDays
                                reconData.forEach(data => {
                                    if (data.task_id) {
                                        uniqueTaskIds.add(data.task_id);
                                        if (!taskDaysMap[data.task_id]) {
                                            taskDaysMap[data.task_id] = data.total_days || 0;
                                        }
                                    }
                                });

                                Object.values(taskDaysMap).forEach(days => {
                                    totalDays += parseInt(days);
                                });

                                let distinctTaskIdCount = uniqueTaskIds.size;
                                recon_count += distinctTaskIdCount;

                                let uniqueDealerIds = new Set();
                                reconData.forEach(item => {
                                    if (item.site) {
                                        uniqueDealerIds.add(item.site);
                                    }
                                });

                                let uniqueDealerCount = uniqueDealerIds.size;
                                total_sites_recons += uniqueDealerCount;

                                let seenSitesProducts = new Set();

                                reconData.forEach(sale => {
                                    const siteKey = sale.site;
                                    const productNameKey = sale.product_name
                                        ?.toUpperCase(); // Make sure to handle product_name properly (case-insensitive)

                                    // Create a unique key based on both site and product name
                                    const uniqueKey = `${siteKey}_${productNameKey}`;

                                    if (!seenSitesProducts.has(uniqueKey)) {
                                        seenSitesProducts.add(uniqueKey);

                                        // Add to overall total and product-specific totals based on product name
                                        if (productNameKey === 'PMG') {
                                            totalOverall += Math.abs(parseFloat(sale.daily_sales || 0));
                                            totalPMG += Math.abs(parseFloat(sale.daily_sales || 0));
                                        } else if (productNameKey === 'HSD') {
                                            totalOverall += Math.abs(parseFloat(sale.daily_sales || 0));
                                            totalHSD += Math.abs(parseFloat(sale.daily_sales || 0));
                                        } else if (productNameKey === 'HASRON') {
                                            // Ensure positive value for HASRON sales
                                            totalOverall += Math.abs(parseFloat(sale.daily_sales || 0));
                                            totalHasron += Math.abs(parseFloat(sale.daily_sales || 0));
                                        }

                                    }
                                });


                                if (reconData.length > 0) {
                                    reconData.forEach((data, index) => {
                                        if (data.external_upliftment === true) {
                                            upliftment_count += parseFloat(data.variance || 0);
                                        }

                                        if (data.external_upliftment === true) {
                                            if (data.product_name === 'HSD') {
                                                upliftment_count_hsd += parseFloat(data.variance || 0);
                                            } else if (data.product_name === 'PMG') {
                                                upliftment_count_pmg += parseFloat(data.variance || 0);
                                            } else if (data.product_name === 'HASRON') {
                                                upliftment_count_hasron += parseFloat(data.variance || 0);
                                            }
                                        }

                                        recon_table.row.add([
                                            di,
                                            data.dealer_sap,
                                            data.site,
                                            data.tm,
                                            data.region,
                                            data.product_name,
                                            `<span style="color: transparent;">${data.tank_beharior}</span>
                                        ${(data.tank_beharior === false) ?
                                                    '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpYbUIFfRi0gF6G2i5iC3NasuR-00Cvn8fLg&s" alt="description" width="10" height="10">' :
                                                    '<img src="https://i.pinimg.com/736x/ae/39/6e/ae396e7d69a673158406ce2359206097.jpg" alt="description" width="10" height="10">'
                                                }`,
                                            `<span style="color: transparent;">${data.external_dumping}</span>
                                        ${(data.external_dumping === false) ?
                                                    '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpYbUIFfRi0gF6G2i5iC3NasuR-00Cvn8fLg&s" alt="description" width="10" height="10">' :
                                                    '<img src="https://i.pinimg.com/736x/ae/39/6e/ae396e7d69a673158406ce2359206097.jpg" alt="description" width="10" height="10">'
                                                }`,
                                            `<span style="color: transparent;">${data.external_upliftment}</span>
                                        ${(data.external_upliftment === false) ?
                                                    '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpYbUIFfRi0gF6G2i5iC3NasuR-00Cvn8fLg&s" alt="description" width="10" height="10">' :
                                                    '<img src="https://i.pinimg.com/736x/ae/39/6e/ae396e7d69a673158406ce2359206097.jpg" alt="description" width="10" height="10">'
                                                }`,
                                            data.no_os_days,
                                            (Number(data.daily_sales) || 0).toLocaleString(),
                                            (Number(data.opening_stock) || 0).toLocaleString(),
                                            (Number(data.physical_stock) || 0).toLocaleString(),
                                            (Number(data.receipts) || 0).toLocaleString(),
                                            (Number(data.sales) || 0).toLocaleString(),
                                            (Number(data.book_stock) || 0).toLocaleString(),
                                            (Number(data.variance) || 0).toLocaleString(),
                                            data.variance_percentage,
                                            data.remark
                                        ]).draw(false);
                                        di++;
                                    });
                                }

                            } catch (error) {
                                console.error('Error fetching recon data:', error);
                            }
                        }
                    } else {
                        alert('No Dealers Found');
                    }

                    let averageDays = recon_count > 0 ? (totalDays / recon_count) : 0;

                    $('#total_recons').text(recon_count);
                    $('#avg_day').text(Math.round(averageDays));
                    $('#total_external_upliftment').text(upliftment_count.toLocaleString());
                    $('#total_external_upliftment_pmg').text(upliftment_count_pmg.toLocaleString());
                    $('#total_external_upliftment_hsd').text(upliftment_count_hsd.toLocaleString());
                    $('#total_external_upliftment_hasron').text(upliftment_count_hasron.toLocaleString());
                    $('#total_sites_recons').text(total_sites_recons.toLocaleString());
                    $('#mix_potential').text((totalOverall * 30).toLocaleString());
                    $('#pmg_potential').text((totalPMG * 30).toLocaleString());
                    $('#hsd_potential').text((totalHSD * 30).toLocaleString());
                    $('#hasron_potential').text((totalHasron * 30).toLocaleString());
                }
            } catch (error) {
                console.error('Error fetching dealer data:', error);
            } finally {
                $.unblockUI();
            }
        } else {
            alert("Please select all required fields (dealers, dates, and products).");
            $.unblockUI();
        }
    }




    function initializeDataTable() {
        recon_table = $('#recon_table').DataTable({
            ordering: false,
            dom: 'Bfrtip',
            pageLength: 50,
            buttons: [
                'copy', 'csv', 'excel', 'print'
            ],
            initComplete: function() {
                var api = this.api();

                // Add search input to the first 4 columns in the header
                api.columns([1, 2, 3, 4, 5, 6, 7, 8]).every(function() {
                    var column = this;
                    var input = $('<input type="text" placeholder="Search">').appendTo($(column
                            .header()))
                        .on('keyup change', function() {
                            if (column.search() !== this.value) {
                                column.search(this.value).draw();
                            }
                        });
                });

                // Add search input to the footer in the same way
                api.columns([1, 2, 3, 4, 5, 6, 7, 8]).every(function() {
                    var column = this;
                    var input = $('<input type="text" placeholder="Search">').appendTo($(column
                            .footer()))
                        .on('keyup change', function() {
                            if (column.search() !== this.value) {
                                column.search(this.value).draw();
                            }
                        });
                });
            },
            createdRow: function(row, data, dataIndex) {
                // Example for setting row-specific styles
            }
        });
    }

    function blocking() {
        $.blockUI({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            overlayCSS: {
                backgroundColor: '#ffffff',
                opacity: 0.8
            },
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: 'transparent',
                color: '#fff',
                width: '100px',
                height: '100px'
            }
        });
    }

    function replaceText() {
        function replaceInTextNodes(element) {
            element.contents().each(function() {
                if (this.nodeType === Node.TEXT_NODE) {
                    this.nodeValue = this.nodeValue
                        .replace(/PMG/gi, 'Gasoline')
                        .replace(/HSD/gi, 'Diesel');
                } else if (this.nodeType === Node.ELEMENT_NODE) {
                    replaceInTextNodes($(this));
                }
            });
        }

        replaceInTextNodes($('body'));
    }
    </script>
</body>

</html>