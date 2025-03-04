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
<style>
/* Wrapper for the table */
.table-wrapper {
    overflow-y: auto;
    height: 80vh;
    /* Adjust the height as needed */
}

/* Make the header sticky */
#recon_table thead th {
    position: sticky;
    top: 0;
    background-color: #fff;
    /* Ensure background color */
    z-index: 1;
    /* Ensure header stays on top */
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
    /* Optional: Adds a shadow for better visibility */
}

/* Optional: Add styles for better table look */
#recon_table {
    width: 100%;
    border-collapse: collapse;
}

#recon_table th,
#recon_table td {
    padding: 8px;
    text-align: left;
    border: 1px solid #ddd;
}
</style>
<style>
.custom-table {
    table-layout: fixed;
    width: 100%;
}

.custom-table td {
    width: 18.5%;
    /* 8 columns => 100% / 8 = 12.5% */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
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
                                    <div class="row" id="tms_list">

                                    </div>


                                    <div class="container-fluid mt-4">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped table-hover text-center align-middle shadow-sm custom-table">
                                                <tbody class="bg-white">
                                                    <tr>
                                                        <td class="fw-bold">
                                                            <i class="bx bx-check-shield text-primary"></i> Total Sites
                                                        </td>
                                                        <td id="total_sites" class="fw-bold text-dark">0</td>
                                                    </tr>
                                                    <tr>

                                                        <td class="fw-bold">
                                                            <i class="bx bx-task text-success"></i> Total Recons
                                                        </td>
                                                        <td id="total_recons" class="fw-bold text-dark">0</td>
                                                        <td class="fw-bold">
                                                            <i class="bx bx-map text-warning"></i> No of Unique Sites
                                                            Recons
                                                        </td>
                                                        <td id="total_sites_recons" class="fw-bold text-dark">0</td>
                                                        <td class="fw-bold">
                                                            <i class="bx bx-line-chart text-danger"></i> Network
                                                            Efficiency
                                                        </td>
                                                        <td id="total_efficiency" class="fw-bold text-dark">0</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="fw-bold">
                                                            <i class="bx bx-gas-pump text-info"></i> Total External
                                                            Upliftment
                                                        </td>
                                                        <td id="total_external_upliftment" class="fw-bold text-dark">0
                                                            Litres</td>
                                                        <td class="fw-bold">
                                                            <i class="bx bx-droplet text-warning"></i> Total External
                                                            Upliftment (PMG)
                                                        </td>
                                                        <td id="total_external_upliftment_pmg"
                                                            class="fw-bold text-dark">0 </td>
                                                        <td class="fw-bold">
                                                            <i class="bx bx-droplet text-danger"></i> Total External
                                                            Upliftment (HSD)
                                                        </td>
                                                        <td id="total_external_upliftment_hsd"
                                                            class="fw-bold text-dark">0 </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">
                                                            <i class="bx bx-gas-pump text-info"></i> Total External
                                                            Dumping
                                                        </td>
                                                        <td id="total_external_dumping" class="fw-bold text-dark">0
                                                        </td>
                                                        <td class="fw-bold">
                                                            <i class="bx bx-droplet text-warning"></i> Total External
                                                            Dumping (PMG)
                                                        </td>
                                                        <td id="total_external_dumping_pmg" class="fw-bold text-dark">0
                                                        </td>
                                                        <td class="fw-bold">
                                                            <i class="bx bx-droplet text-danger"></i> Total External
                                                            Dumping (HSD)
                                                        </td>
                                                        <td id="total_external_dumping_hsd" class="fw-bold text-dark">0
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="fw-bold">
                                                            <i class="bx bx-gas-pump text-danger"></i> Monthly Nozzle
                                                            Potential (MF)
                                                        </td>
                                                        <td id="mix_potential" class="fw-bold text-dark">0 </td>
                                                        <td class="fw-bold">
                                                            <i class="bx bx-droplet text-warning"></i> Monthly Nozzle
                                                            Potential (PMG)
                                                        </td>
                                                        <td id="pmg_potential" class="fw-bold text-dark">0 </td>
                                                        <td class="fw-bold">
                                                            <i class="bx bx-droplet text-danger"></i> Monthly Nozzle
                                                            Potential (HSD)
                                                        </td>
                                                        <td id="hsd_potential" class="fw-bold text-dark">0 </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                    <div class="col-md-3 d-none">
                                        <div class="card" style="height: 160px;">
                                            <div class="card-body">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded bg-success-subtle ">
                                                                <i
                                                                    class="bx bx-check-shield font-size-24 mb-0 text-primary"></i>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0 font-size-15">Average no of days</h6>
                                                        </div>



                                                    </div>

                                                    <div>
                                                        <h6 class="mt-4 pt-1 mb-0 font-size-22" id="avg_day">0</h6>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 d-none">
                                        <div class="card" style="height: 160px;">
                                            <div class="card-body">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded bg-danger-subtle ">
                                                                <i
                                                                    class="bx bx-check-shield font-size-24 mb-0 text-primary"></i>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0 font-size-15">Total External Upliftment
                                                                (HOBC)</h6>
                                                        </div>



                                                    </div>

                                                    <div>
                                                        <h6 class="mt-4 pt-1 mb-0 font-size-22"
                                                            id="total_external_upliftment_hasron">0</h6>
                                                        <span>Litres</span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 d-none">
                                        <div class="card" style="height: 160px;">
                                            <div class="card-body">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded bg-danger-subtle ">
                                                                <i
                                                                    class="bx bx-check-shield font-size-24 mb-0 text-primary"></i>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0 font-size-15">Total External Dumping
                                                                (HOBC)</h6>
                                                        </div>



                                                    </div>

                                                    <div>
                                                        <h6 class="mt-4 pt-1 mb-0 font-size-22"
                                                            id="total_external_dumping_hasron">0</h6>
                                                        <span>Litres</span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 d-none">
                                        <div class="card" style="height: 160px;">
                                            <div class="card-body">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded bg-danger-subtle ">
                                                                <i
                                                                    class="bx bx-check-shield font-size-24 mb-0 text-primary"></i>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0 font-size-15">Monthly Nozzle Potential
                                                                (HOBC)</h6>
                                                        </div>



                                                    </div>

                                                    <div>
                                                        <h6 class="mt-4 pt-1 mb-0 font-size-22" id="hasron_potential">0
                                                        </h6><span>Litres</span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="overflow: auto;">
                                        <!-- <button id="exportButton" class="btn btn-success">Export to Excel</button> -->

                                        <div class="table-wrapper">
                                            <table id="recon_table" class="table table-bordered dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>S #</th>
                                                        <th>Date</th>
                                                        <th>JD Code</th>
                                                        <th>Site</th>
                                                        <th>TM</th>
                                                        <th>Region</th>
                                                        <th>Product</th>
                                                        <th>Tank Behaviour</th>
                                                        <th>External Dumping</th>
                                                        <th>External Upliftment</th>
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
                                                        <th>Date</th>
                                                        <th>JD Code</th>
                                                        <th>Site</th>
                                                        <th>TM</th>
                                                        <th>Region</th>
                                                        <th>Product</th>
                                                        <th>Tank Behaviour</th>
                                                        <th>External Dumping</th>
                                                        <th>External Upliftment</th>
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
                        <label for="products" class="col-md-2 col-form-label">Regions</label>
                        <input type="checkbox" id="selectAllTm"> Select All

                        <select class="w-100 form-control multiple_select" id="region" name="region[]" required
                            multiple="multiple" onchange="get_region_tm(this.value)">
                            <!-- <option value="">Select Regions</option> -->
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="dealers" class="col-md-2 col-form-label">TM</label>

                        <select class="w-100 multiple_select" id="dealers" name="dealers[]" multiple="multiple"
                            required>
                            <!-- <option value="">Select TM</option> -->
                        </select>
                    </div>
                    <div class="form-group col-md-12 d-none">
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
                                name="insert" id="insert" value="Search">
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
        // replaceText();
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
                $('#region > option').prop('selected', true);
            } else {
                // Deselect all options
                $('#region > option').prop('selected', false);

            }
            $('#region').trigger('change'); // Trigger change event after selection
        });

        $('#region').change(function() {
            let selectedRegions = $(this).val();
            if (selectedRegions.length > 0) {
                // get_region_tm(selectedRegions);
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
        // fetch(
        //         "<?php echo $api_url; ?>get/get_all_dpt_tm.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>"
        //     )
        //     .then(response => response.json())
        //     .then(response => {
        //         response.forEach(data => {
        //             $('#dealers').append(new Option(data.name, data.id)).trigger('change');
        //         });
        //     })
        //     .catch(error => console.log('Error fetching dealers:', error));

        fetch(
                "<?php echo $api_url; ?>get/get_regions.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>"
            )
            .then(response => response.json())
            .then(response => {
                response.forEach(data => {
                    $('#region').append(new Option(data.region, data.region)).trigger('change');
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
        let dealersString = dealers.join(',');
        $('#dealer_recon_container').empty(); // Clear previous results
        $('#tms_list').empty(); // Clear previous results

        recon_table.clear().draw(); // Clear the table
        var regions = $('#region').val();
        var total_sites = 0;
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

        var dumping_count = 0;
        var dumping_count_pmg = 0;
        var dumping_count_hsd = 0;
        var dumping_count_hasron = 0;
        if (regions.length > 0 && from !== "" && to !== "") {
            blocking(); // Block the UI while processing

            try {
                var di = 1; // Counter for row numbers


                for (const city of regions) {

                    // Fetch dealer information for each dealer
                    try {
                        let reconUrl =
                            `<?php echo $api_url; ?>get/get_dealers_recons_product_wise_new2.php?key=03201232927&dealer_id=&from=${from}&to=${to}&products=${products}&region=${city}&tm=${dealersString}`;
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
                                } else if (productNameKey === 'HOBC') {
                                    // Ensure positive value for HOBC sales
                                    totalOverall += Math.abs(parseFloat(sale.daily_sales || 0));
                                    totalHasron += Math.abs(parseFloat(sale.daily_sales || 0));
                                }

                            }
                        });


                        if (reconData.length > 0) {
                            reconData.forEach((data, index) => {


                                if (data.external_dumping === true) {
                                    console.log("dumping " + data.variance)
                                    dumping_count += Math.abs(parseFloat(data.variance || 0));

                                    if (data.product_name === 'HSD') {
                                        dumping_count_hsd += Math.abs(parseFloat(data.variance ||
                                            0));
                                    } else if (data.product_name === 'PMG') {
                                        dumping_count_pmg += Math.abs(parseFloat(data.variance ||
                                            0));
                                    } else if (data.product_name === 'HOBC') {
                                        dumping_count_hasron += Math.abs(parseFloat(data.variance ||
                                            0));
                                    }
                                }

                                if (data.external_upliftment === true) {
                                    upliftment_count += parseFloat(data.variance || 0);
                                }
                                if (data.external_upliftment === true) {
                                    if (data.product_name === 'HSD') {
                                        upliftment_count_hsd += parseFloat(data.variance || 0);
                                    } else if (data.product_name === 'PMG') {
                                        upliftment_count_pmg += parseFloat(data.variance || 0);
                                    } else if (data.product_name === 'HOBC') {
                                        upliftment_count_hasron += parseFloat(data.variance || 0);
                                    }
                                }
                                // console.log(data.variance)
                                recon_table.row.add([
                                    di,
                                    (data.created_at).split(" ")[0],
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

                    let averageDays = recon_count > 0 ? (totalDays / recon_count) : 0;

                    $('#total_recons').text(recon_count);
                    $('#avg_day').text(Math.round(averageDays));
                    $('#total_external_upliftment').text(upliftment_count.toLocaleString());
                    $('#total_external_upliftment_pmg').text(upliftment_count_pmg.toLocaleString());
                    $('#total_external_upliftment_hsd').text(upliftment_count_hsd.toLocaleString());
                    $('#total_external_upliftment_hasron').text(upliftment_count_hasron.toLocaleString());

                    $('#total_external_dumping').text('-' + dumping_count.toLocaleString());
                    $('#total_external_dumping_pmg').text('-' + dumping_count_pmg.toLocaleString());
                    $('#total_external_dumping_hsd').text('-' + dumping_count_hsd.toLocaleString());
                    $('#total_external_dumping_hasron').text('-' + dumping_count_hasron.toLocaleString());

                    $('#total_sites_recons').text(total_sites_recons);
                    $('#mix_potential').text((totalOverall * 30).toLocaleString());
                    $('#pmg_potential').text((totalPMG * 30).toLocaleString());
                    $('#hsd_potential').text((totalHSD * 30).toLocaleString());
                    $('#hasron_potential').text((totalHasron * 30).toLocaleString());
                }
            } catch (error) {
                console.error('Error fetching dealer data:', error);
            } finally {
                $.unblockUI();
                // replaceText();
                get_tm_dealer_counts();
            }
        } else {
            alert("Please select all required fields (dealers, dates, and products).");
            $.unblockUI();
        }
    }
    async function get_tm_dealer_counts() {
        $('#tms_list').empty();

        var regions = $('#region').val();
        var dealers = $('#dealers').val();
        var from = $('#from').val();
        var to = $('#to').val();
        console.log(regions);
        console.log(dealers);
        let dealersString = dealers.join(',');

        var all_total_site = 0;
        var all_total_count = 0;
        var all_total_distinct_count = 0;
        for (const city of regions) {

            var total_sites = parseInt($('#total_sites').val()) || 0; // Initialize once
            var total_sites_recons = parseInt($('#total_sites_recons').text()) || 0;
            var t_total_site = 0;
            var t_total_count = 0;
            var t_distinct_count = 0;
            var t_rank = 0;
            var t_dumping = 0;
            var t_external = 0;
            var div = `
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-title rounded bg-primary-subtle">
                                            <i class="fas fa-user font-size-24 mb-0 text-dark"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 font-size-15">${city}</h6>
                                    </div>
                                </div>
                                <div id="tm-data-${city.replace(/\s+/g, '')}" style="overflow: auto; max-content;">
                                    <p>Loading...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;

            $('#tms_list').append(div);
            console.log(
                `<?php echo $api_url; ?>get/get_region_networks_with_dumping.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>&from=${from}&to=${to}&region=${encodeURIComponent(city)}&tm=${dealersString}`
            )
            try {
                let response = await fetch(
                    `<?php echo $api_url; ?>get/get_region_networks_with_dumping.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>&from=${from}&to=${to}&region=${encodeURIComponent(city)}&tm=${dealersString}`
                );

                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                let data = await response.json();
                let tmDetails = '';

                if (Array.isArray(data) && data.length > 0) {
                    data.forEach(entry => {
                        let tm_name = entry.tm_name || "N/A";
                        let total_site = parseInt(entry.total_site || 0);
                        let total_count = parseInt(entry.total_count || 0);
                        let distinct_count = parseInt(entry.distinct_count || 0);
                        let rank = parseFloat(entry.rank || 0);
                        let total_dumping = parseFloat(entry.total_dumping || 0);
                        let total_external = parseFloat(entry.total_external || 0);

                        // total_sites += total_site; // Update total_sites
                        t_total_site += total_site;
                        t_total_count += total_count;
                        t_distinct_count += distinct_count;
                        t_rank += rank;
                        t_dumping += total_dumping;
                        t_external += total_external;

                        tmDetails += `<div style="border-bottom: 1px solid;margin-top: 6px;">
                        <p class="m-0"><strong>TM Name:</strong> ${tm_name}</p>
                        <p class="m-0"><strong>Sites:</strong> ${total_site}</p>
                        <p class="m-0"><strong>Visits:</strong> ${total_count}</p>
                        <p class="m-0"><strong>Unique Visits:</strong> ${distinct_count}</p>
                        <p class="m-0"><strong>Dumping:</strong> -${total_dumping.toLocaleString()}</p>
                        <p class="m-0"><strong>External Upliftment:</strong> ${total_external.toLocaleString()}</p>
                        <p class="m-0"><strong>Network Coverage:</strong> ${Math.round(rank)}%</p>
                    </div>`;
                    });

                    let network_efficiency = t_total_site > 0 ?
                        ((t_distinct_count / t_total_site) * 100).toFixed(2) + "%" :
                        "0%";

                    tmDetails += `<div style="margin-top: 6px;">
                    <p class="m-0"><strong>Total Sites:</strong> ${t_total_site}</p>
                    <p class="m-0"><strong>Total Visits:</strong> ${t_total_count}</p>
                    <p class="m-0"><strong>Total Unique Visits:</strong> ${t_distinct_count}</p>
                    <p class="m-0"><strong>Total Dumping:</strong> -${t_dumping.toLocaleString()}</p>
                    <p class="m-0"><strong>Total External Upliftment:</strong> ${t_external.toLocaleString()}</p>
                    <p class="m-0"><strong>Network Coverage:</strong> ${network_efficiency}</p>
                    </div>`;
                    $('#total_recons').text(t_total_count);
                    $('#total_sites_recons').text(t_distinct_count);
                    // $('#total_efficiency').text(network_efficiency);

                    all_total_site += t_total_site;
                    all_total_count += t_total_count;
                    all_total_distinct_count += t_distinct_count;
                } else {
                    tmDetails = '<p>No data available</p>';
                }

                document.getElementById(`tm-data-${city.replace(/\s+/g, '')}`).innerHTML = tmDetails;

            } catch (error) {
                console.error('Error fetching dealers:', error);
                document.getElementById(`tm-data-${city.replace(/\s+/g, '')}`).innerHTML =
                    '<p>Error fetching data</p>';
            }
        }


        var all_network_efficiency = all_total_site > 0 ?
            ((all_total_distinct_count / all_total_site) * 100).toFixed(2) + "%" :
            "0%";
        // ✅ Update total sites count AFTER loop
        $('#total_sites').text(all_total_site);
        $('#total_recons').text(all_total_count);
        $('#total_sites_recons').text(all_total_distinct_count);
        $('#total_efficiency').text(all_network_efficiency);

        // setTimeout(() => {
        console.log(total_sites_recons);
        var total_efficiency = t_total_site > 0 ?
            ((total_sites_recons / t_total_site) * 100).toFixed(2) :
            0;

        // $('#total_efficiency').text(total_efficiency + " %");
        // }, 5000); // 2 seconds delay

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
                api.columns([1, 2, 3, 4, 5, 6, 7, 8, 9]).every(function() {
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
                api.columns([1, 2, 3, 4, 5, 6, 7, 8, 9]).every(function() {
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

    function get_region_tm(region) {


        $('#dealers').empty();
        var regions = $('#region').val();
        console.log(regions)
        $.each(regions, function(index, city) {
            fetch(
                    "<?php echo $api_url; ?>get/get_region_tm.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>&region=" +
                    city + ""
                )
                .then(response => response.json())
                .then(response => {

                    let dealersDropdown = $('#dealers');
                    response.forEach(data => {
                        dealersDropdown.append(new Option(data.name, data.id, true, true)).trigger(
                            'change');

                    });
                    // $('#dealers > option').prop('selected', true);
                })
                .catch(error => console.log('Error fetching dealers:', error));
        });

        // Append each city as a list item




    }
    </script>
</body>

</html>