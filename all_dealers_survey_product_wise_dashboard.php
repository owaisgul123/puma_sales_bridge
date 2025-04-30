<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dealers Inspection |
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
                            <h3>Inspection Analyzing Report</h3>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="row" id="tms_list">

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 ">
                                            <label for="inputEmail4">Region</label>

                                            <select data-live-search="true" class="form-control selectpicker"
                                                id="r_regions" name="r_regions" required multiple>
                                                <option value="">Select</option>



                                            </select>

                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputEmail4">TM</label>

                                            <select data-live-search="true" class="form-control selectpicker"
                                                id="asm_users" name="asm_users" required multiple>
                                                <option value="">Select</option>



                                            </select>

                                        </div>
                                        <div class="col-md-3 ">
                                            <label for="inputEmail4">Category</label>

                                            <select data-live-search="true" class="form-control selectpicker"
                                                id="category" name="category" required multiple>
                                                <option value="">Select</option>



                                            </select>

                                        </div>
                                        <div class="col-md-3 ">
                                            <label for="inputEmail4">Questions</label>

                                            <select data-live-search="true" class="form-control selectpicker"
                                                id="question" name="question" required multiple>
                                                <option value="">Select</option>



                                            </select>

                                        </div>
                                        <div class="col-md-3 ">
                                            <label for="inputEmail4">Response</label>

                                            <select data-live-search="true" class="form-control selectpicker"
                                                id="response_data" name="response_data" required multiple>
                                                <option value="">Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>



                                            </select>

                                        </div>
                                        <div class="col-md-3 ">
                                            <label for="inputEmail4">File</label>

                                            <select data-live-search="true" class="form-control selectpicker"
                                                id="is_file" name="is_file" required multiple>
                                                <option value="">Select</option>
                                                <option value="with_file">With File</option>
                                                <option value="without_file">Without File</option>



                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card" style="height: 160px;">
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
                                                            <h6 class="mb-0 font-size-15">Total Sites</h6>
                                                        </div>



                                                    </div>

                                                    <div>
                                                        <h6 class="mt-4 pt-1 mb-0 font-size-22" id="total_sites">0</h6>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card" style="height: 160px;">
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
                                                            <h6 class="mb-0 font-size-15">Total Inspection</h6>
                                                        </div>



                                                    </div>

                                                    <div>
                                                        <h6 class="mt-4 pt-1 mb-0 font-size-22" id="total_recons">0</h6>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card" style="height: 160px;">
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
                                                            <h6 class="mb-0 font-size-15">No of Unique Sites Inspection
                                                            </h6>
                                                        </div>



                                                    </div>

                                                    <div>
                                                        <h6 class="mt-4 pt-1 mb-0 font-size-22" id="total_sites_recons">
                                                            0</h6>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card" style="height: 160px;">
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
                                                            <h6 class="mb-0 font-size-15">Network Efficiency</h6>
                                                        </div>



                                                    </div>

                                                    <div>
                                                        <h6 class="mt-4 pt-1 mb-0 font-size-22" id="total_efficiency">0
                                                        </h6>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
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
                                                            <h6 class="mb-0 font-size-15">Total YES</h6>
                                                        </div>



                                                    </div>

                                                    <div>
                                                        <h6 class="mt-4 pt-1 mb-0 font-size-22" id="total_yes">0</h6>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card" style="height: 160px;">
                                            <div class="card-body">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded bg-info-subtle ">
                                                                <i
                                                                    class="bx bx-check-shield font-size-24 mb-0 text-primary"></i>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0 font-size-15">Total NO</h6>
                                                        </div>



                                                    </div>

                                                    <div>
                                                        <h6 class="mt-4 pt-1 mb-0 font-size-22" id="total_no">0</h6>
                                                        <span>Litres</span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card" style="height: 160px;">
                                            <div class="card-body">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded bg-warning-subtle ">
                                                                <i
                                                                    class="bx bx-check-shield font-size-24 mb-0 text-primary"></i>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0 font-size-15">Total N/A</h6>
                                                        </div>



                                                    </div>

                                                    <div>
                                                        <h6 class="mt-4 pt-1 mb-0 font-size-22" id="total_na">0</h6>
                                                        <span>Litres</span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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
                                                            <h6 class="mb-0 font-size-15">Total Files</h6>
                                                        </div>



                                                    </div>

                                                    <div>
                                                        <h6 class="mt-4 pt-1 mb-0 font-size-22" id="total_file">0</h6>
                                                        <span>Litres</span>

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
                                                        <th>Category</th>
                                                        <th>Question</th>
                                                        <th>Answer</th>
                                                        <th>File</th>
                                                        <th>Remark</th>
                                                        <th>Site Code</th>
                                                        <th>Site</th>
                                                        <th>TM</th>
                                                        <th>Region</th>

                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>

                                                        <th>S #</th>
                                                        <th>Date</th>
                                                        <th>Category</th>
                                                        <th>Question</th>
                                                        <th>Answer</th>
                                                        <th>File</th>
                                                        <th>Remark</th>
                                                        <th>Site Code</th>
                                                        <th>Site</th>
                                                        <th>TM</th>
                                                        <th>Region</th>

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
            <h5 id="offcanvasRightLabel">Inspection</h5>
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
    let recon_table = '';
    let filter_tablesss = '';

    $(document).ready(function() {
        all_dealers();
        all_products();
        initializeDataTable();

        $('.selectpicker, .multiple_select').select2();

        $('.selectpicker').on('change', filterTable);

        $('#add_btn').click(() => $('#row_id').val(""));

        $('#selectAllTm').change(function() {
            $('#region > option').prop('selected', this.checked);
            $('#region').trigger('change');
        });

        $('#region').change(function() {
            let selectedRegions = $(this).val();
            if (selectedRegions.length > 0) {
                // get_region_tm(selectedRegions);
            }
        });
    });

    function formatDateTime(date) {
        return `${date.getFullYear()}-${("0" + (date.getMonth() + 1)).slice(-2)}-${("0" + date.getDate()).slice(-2)} ${("0" + date.getHours()).slice(-2)}:${("0" + date.getMinutes()).slice(-2)}:${("0" + date.getSeconds()).slice(-2)}`;
    }

    function all_dealers() {
        fetch(
                `<?php echo $api_url; ?>get/get_regions.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>`
                )
            .then(res => res.json())
            .then(data => {
                data.forEach(item => {
                    $('#region, #r_regions').append(new Option(item.region, item.region));
                });
            })
            .catch(console.error);

        fetch(
                `<?php echo $api_url; ?>get/get_asm.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id']?>`
                )
            .then(res => res.json())
            .then(data => {
                data.forEach(item => {
                    $('#asm_users').append(new Option(item.name, item.name));
                });
            })
            .catch(console.error);

        fetch(`<?php echo $api_url; ?>get/get_survey_category.php?key=03201232927&id=<?php echo $_SESSION['user_id']?>`)
            .then(res => res.json())
            .then(data => {
                data.forEach(item => {
                    $('#category').append(new Option(item.name, item.name));
                });
            })
            .catch(console.error);

        fetch(`<?php echo $api_url; ?>get/survey_questions.php?key=03201232927&id=<?php echo $_SESSION['user_id']?>`)
            .then(res => res.json())
            .then(data => {
                data.forEach(item => {
                    $('#question').append(new Option(item.name, item.name));
                });
            })
            .catch(console.error);
    }

    function all_products() {
        fetch(`<?php echo $api_url; ?>get/get_all_products.php?key=03201232927`)
            .then(res => res.json())
            .then(data => {
                data.forEach(product => {
                    $('#products').append(new Option(product.name, product.id));
                });
            })
            .catch(console.error);
    }

    async function getRecon_new() {
        const dealers = $('#dealers').val();
        const from = $('#from').val();
        const to = $('#to').val();
        const products = $('#products').val();
        const regions = $('#region').val();

        if (!dealers.length || !regions.length || !from || !to) {
            alert("Please select all required fields (dealers, dates, and products).");
            return $.unblockUI();
        }

        const dealersString = dealers.join(',');
        $('#dealer_recon_container, #tms_list').empty();
        recon_table.clear().draw();

        let di = 1,
            totalDays = 0,
            recon_count = 0,
            total_sites_recons = 0;
        let totalyes = 0,
            totalno = 0,
            totalna = 0,
            totalfile = 0;

        blocking();

        try {
            for (const city of regions) {
                const url =
                    `<?php echo $api_url; ?>get/get_dealers_survey_product_wise_new.php?key=03201232927&dealer_id=&from=${from}&to=${to}&products=${products}&region=${city}&tm=${dealersString}`;

                try {
                    const res = await fetch(url);
                    const data = await res.json();

                    const taskDaysMap = {};
                    const taskIds = new Set();
                    const dealerIds = new Set();

                    data.forEach(item => {
                        if (item.task_id) {
                            taskIds.add(item.task_id);
                            taskDaysMap[item.task_id] = taskDaysMap[item.task_id] || item.total_days || 0;
                        }
                        if (item.site) {
                            dealerIds.add(item.site);
                        }
                    });

                    totalDays += Object.values(taskDaysMap).reduce((sum, val) => sum + parseInt(val), 0);
                    recon_count += taskIds.size;
                    total_sites_recons += dealerIds.size;

                    if (data.length > 0) {
                        filter_tablesss = data;

                        data.forEach(item => {
                            if (item.response === 'Yes') totalyes++;
                            else if (item.response === 'No') totalno++;
                            else if (item.response === 'N/A') totalna++;

                            if (item.cancel_file != null) totalfile++;

                            recon_table.row.add([
                                di++,
                                item.created_at.split(" ")[0],
                                item.catogory_name,
                                item.question,
                                item.response,
                                item.cancel_file,
                                item.comment,
                                item.dealer_sap,
                                item.site,
                                item.tm,
                                item.region

                            ]).draw(false);
                        });
                    }
                } catch (err) {
                    console.error(`Error in ${city}:`, err);
                }

                $('#total_recons').text(recon_count);
                $('#total_yes').text(totalyes.toLocaleString());
                $('#total_no').text(totalno.toLocaleString());
                $('#total_na').text(totalna.toLocaleString());
                $('#total_file').text(totalfile.toLocaleString());
            }
        } catch (err) {
            console.error('General error in getRecon_new:', err);
        } finally {
            $.unblockUI();
            get_tm_dealer_counts();
        }
    }

    async function get_tm_dealer_counts() {
        $('#tms_list').empty();

        const regions = $('#region').val();
        const dealers = $('#dealers').val();
        const from = $('#from').val();
        const to = $('#to').val();
        const dealersString = dealers.join(',');

        let allSites = 0,
            allCounts = 0,
            allDistinct = 0;

        for (const city of regions) {
            const containerId = `tm-data-${city.replace(/\s+/g, '')}`;
            $('#tms_list').append(`
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
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
                            <div id="${containerId}" style="overflow: auto; max-content;">
                                <p>Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>`);

            const url =
                `<?php echo $api_url; ?>get/get_region_survey_detail.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>&from=${from}&to=${to}&region=${encodeURIComponent(city)}&tm=${dealersString}`;

            try {
                const res = await fetch(url);
                const data = await res.json();

                if (!Array.isArray(data) || data.length === 0) {
                    $(`#${containerId}`).html('<p>No data available</p>');
                    continue;
                }

                let html = '',
                    tSites = 0,
                    tCounts = 0,
                    tDistinct = 0;
                let tQuestions = 0,
                    tYes = 0,
                    tNo = 0,
                    tNA = 0,
                    tFiles = 0;

                data.forEach(entry => {
                    const {
                        tm_name = "N/A", total_site = 0, total_count = 0, distinct_count = 0,
                            total_questions = 0, total_yes = 0, total_no = 0, total_na = 0,
                            total_files = 0, rank = 0
                    } = entry;

                    tSites += +total_site;
                    tCounts += +total_count;
                    tDistinct += +distinct_count;
                    tQuestions += +total_questions;
                    tYes += +total_yes;
                    tNo += +total_no;
                    tNA += +total_na;
                    tFiles += +total_files;

                    html += `
                        <div style="border-bottom: 1px solid;margin-top: 6px;">
                            <p class="m-0"><strong>TM Name:</strong> ${tm_name}</p>
                            <p class="m-0"><strong>Sites:</strong> ${total_site}</p>
                            <p class="m-0"><strong>Visits:</strong> ${total_count}</p>
                            <p class="m-0"><strong>Unique Visits:</strong> ${distinct_count}</p>
                            <p class="m-0"><strong>Total Survey Questions:</strong> ${total_questions}</p>
                            <p class="m-0"><strong>Total Yes Answer:</strong> ${total_yes}</p>
                            <p class="m-0"><strong>Total NO Answer:</strong> ${total_no}</p>
                            <p class="m-0"><strong>Total N/A Answer:</strong> ${total_na}</p>
                            <p class="m-0"><strong>Total Files Submit:</strong> ${total_files}</p>
                            <p class="m-0"><strong>Network Coverage:</strong> ${Math.round(rank)}%</p>
                        </div>`;
                });

                const efficiency = tQuestions > 0 ? (((tYes + tNo) / tQuestions) * 100).toFixed(2) + "%" : "0%";

                html += `
                    <div style="margin-top: 6px;">
                        <p class="m-0"><strong>Total Sites:</strong> ${tSites}</p>
                        <p class="m-0"><strong>Total Visits:</strong> ${tCounts}</p>
                        <p class="m-0"><strong>Total Unique Visits:</strong> ${tDistinct}</p>
                        <p class="m-0"><strong>Total Survey Questions:</strong> ${tQuestions}</p>
                        <p class="m-0"><strong>Total Yes Answer:</strong> ${tYes}</p>
                        <p class="m-0"><strong>Total NO Answer:</strong> ${tNo}</p>
                        <p class="m-0"><strong>Total N/A Answer:</strong> ${tNA}</p>
                        <p class="m-0"><strong>Total Files Submit:</strong> ${tFiles}</p>
                        <p class="m-0"><strong>Network Coverage:</strong> ${efficiency}</p>
                    </div>`;

                $(`#${containerId}`).html(html);

                allSites += tSites;
                allCounts += tCounts;
                allDistinct += tDistinct;

                const overallEfficiency = allSites > 0 ? (((tYes + tNo) / tQuestions) * 100).toFixed(2) + "%" :
                "0%";
                $('#total_efficiency').text(overallEfficiency);
            } catch (error) {
                console.error('Error fetching TM region data:', error);
                $(`#${containerId}`).html('<p>Error fetching data</p>');
            }
        }


        $('#total_sites').text(allSites);
        $('#total_recons').text(allCounts);
        $('#total_sites_recons').text(allDistinct);
    }

    function initializeDataTable() {
        recon_table = $('#recon_table').DataTable({
            ordering: false,
            dom: 'Bfrtip',
            pageLength: 50,
            buttons: ['copy', 'csv', 'excel', 'print'],
            initComplete: function() {
                this.api().columns([1, 2, 3, 4, 5, 6, 7, 8, 9]).every(function() {
                    let column = this;
                    $('<input type="text" placeholder="Search">')
                        .appendTo($(column.header()))
                        .on('keyup change', function() {
                            if (column.search() !== this.value) column.search(this.value)
                                .draw();
                        });

                    $('<input type="text" placeholder="Search">')
                        .appendTo($(column.footer()))
                        .on('keyup change', function() {
                            if (column.search() !== this.value) column.search(this.value)
                                .draw();
                        });
                });
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
                    this.nodeValue = this.nodeValue.replace(/PMG/gi, 'Gasoline').replace(/HSD/gi, 'Diesel');
                } else if (this.nodeType === Node.ELEMENT_NODE) {
                    replaceInTextNodes($(this));
                }
            });
        }
        replaceInTextNodes($('body'));
    }

    function get_region_tm(region) {
        $('#dealers').empty();
        const regions = $('#region').val();
        regions.forEach(city => {
            fetch(
                    `<?php echo $api_url; ?>get/get_region_tm.php?key=03201232927&pre=<?php echo $_SESSION['privilege'] ?>&user_id=<?php echo $_SESSION['user_id'] ?>&region=${city}`
                    )
                .then(res => res.json())
                .then(data => {
                    data.forEach(item => {
                        $('#dealers').append(new Option(item.name, item.id, true, true)).trigger(
                            'change');
                    });
                })
                .catch(err => console.log('Error fetching dealers:', err));
        });
    }

    function filterTable() {
        // Get selected values from dropdowns
        var r_regions = $('#r_regions').val() || [];
        var asm_users = $('#asm_users').val() || [];
        var category = $('#category').val() || [];
        var question = $('#question').val() || [];
        var response_data = $('#response_data').val() || [];

        // Reset previous values
        let di = 1;
        let totalDays = 0;
        let recon_count = 0;
        let totalyes = 0;
        let totalno = 0;
        let totalna = 0;
        let totalfile = 0;
        let total_sites_recons = 0;

        recon_table.clear().draw(); // Clear previous rows

        // Filter data
        var filteredData = filter_tablesss.filter(function(item) {
            return (
                (r_regions.length === 0 || r_regions.includes(item.region)) &&
                (asm_users.length === 0 || asm_users.includes(item.tm)) &&
                (category.length === 0 || category.includes(item.catogory_name)) &&
                (question.length === 0 || question.includes(item.question)) &&
                (response_data.length === 0 || response_data.includes(item.response))
            );
        });

        let uniqueTaskIds = new Set();
        let taskDaysMap = {};
        let uniqueDealerIds = new Set();

        filteredData.forEach(data => {
            if (data.task_id) {
                uniqueTaskIds.add(data.task_id);
                if (!taskDaysMap[data.task_id]) {
                    taskDaysMap[data.task_id] = parseInt(data.total_days) || 0;
                }
            }

            if (data.site) {
                uniqueDealerIds.add(data.site);
            }

            if (data.response === 'Yes') {
                totalyes++;
            } else if (data.response === 'No') {
                totalno++;
            } else if (data.response === 'N/A') {
                totalna++;
            }

            if (data.cancel_file != null) {
                totalfile++;
            }

            recon_table.row.add([
                di++,
                (data.created_at || '').split(" ")[0],
                data.catogory_name || '',
                data.question || '',
                data.response || '',
                data.cancel_file || '',
                data.comment || '',
                data.dealer_sap || '',
                data.site || '',
                data.tm || '',
                data.region || ''

            ]).draw(false);
        });

        // Calculate totals
        Object.values(taskDaysMap).forEach(days => {
            totalDays += parseInt(days);
        });

        recon_count = uniqueTaskIds.size;
        total_sites_recons = uniqueDealerIds.size;

        // Update UI
        $('#total_recons').text(recon_count);
        $('#total_yes').text(totalyes.toLocaleString());
        $('#total_no').text(totalno.toLocaleString());
        $('#total_na').text(totalna.toLocaleString());
        $('#total_file').text(totalfile.toLocaleString());
        $('#total_sites_recons').text(total_sites_recons.toLocaleString());

        // Optional: Calculate efficiency here if needed
    }
    </script>

</body>

</html>