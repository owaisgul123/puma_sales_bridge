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
                                        <!-- <button id="exportButton" class="btn btn-success">Export to Excel</button> -->

                                        <table id="recon_table" style="width:100%" class="table table-bordered">
                                            <thead>
                                                <!-- <tr>
                                                    <th colspan="9"></th>
                                                    <th colspan="6" class="table-active text-center">Diesel</th>
                                                    <th colspan="6" class="table-success text-center">Gasoline</th>
                                                    <th colspan="6" class="table-success text-center">Gasoline 95</th>
                                                </tr> -->
                                                <tr>
                                                    <th>S #</th>
                                                    <th>SAP</th>
                                                    <th>Dealer</th>
                                                    <th>TM</th>
                                                    <th>RM</th>
                                                    <th>Region</th>
                                                    <th>planned date</th>
                                                    <th>PMG Inspection Date (Current)</th>
                                                    <th>PMG Inspection Time (Current)</th>
                                                    <th>PMG Inspection Date (Last)</th>
                                                    <th>PMG Inspection Time (Last)</th>
                                                    <th>PMG Days since last visit</th>
                                                    <th>PMG Sale</th>
                                                    <th>PMG Daily Nozzle Sale (Avg)</th>
                                                    <th>PMG Monthly Nozzle Sales (Avg)</th>
                                                    <th>PMG Receipt</th>
                                                    <th>PMG Gain/Loss</th>
                                                    <th>HSD Inspection Date (Current)</th>
                                                    <th>HSD Inspection Time (Current)</th>
                                                    <th>HSD Inspection Date (Last)</th>
                                                    <th>HSD Inspection Time (Last)</th>
                                                    <th>HSD Days since last visit</th>
                                                    <th>HSD Sale (PMG)</th>
                                                    <th>HSD Daily Nozzle Sale (Avg)</th>
                                                    <th>HSD Monthly Nozzle Sales (Avg)</th>
                                                    <th>HSD Receipt</th>
                                                    <th>HSD Gain/Loss</th>
                                                    <th>MF Nozzle Sale</th>
                                                    <th>Daily Nozzle sale (Avg)</th>
                                                    <th>Monthly Nozzle Sales (Avg)</th>
                                                    <th>Purchased from Puma (SAP)</th>
                                                    <th>Gain/ Loss (From Inspection)</th>

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
                            <!-- <option value="">Select TM</option> -->
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

        $(document).ready(function () {
            all_dealers();
            $('.multiple_select').select2();
            initializeDataTable();
            // $("#exportButton").click(function() {
            //     var now = new Date();
            //     var formattedDateTime = formatDateTime(now);
            //     var wb = XLSX.utils.table_to_book(document.getElementById('recon_table'), {
            //         sheet: "Sheet1"
            //     });
            //     XLSX.writeFile(wb, 'Recon-Report-' + formattedDateTime + '.xlsx');


            // });

            $('#add_btn').click(function () {
                $('#row_id').val("");
            });
            $('#selectAllTm').change(function () {
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

        function getRecon_new() {
            var dealers = $('#dealers').val();
            var from = $('#from').val();
            var to = $('#to').val();
            $('#dealer_recon_container').empty();
            recon_table.clear().draw();
            console.log(dealers)
            var di = 1;
            if (dealers.length > 0 && from != "" && to != "") {
                blocking();
                for (var i = 0; i < dealers.length; i++) {
                    // Access the current dealer using dealers[i]
                    var tm_id = dealers[i];

                    // Perform any operations with the current dealer
                    console.log(tm_id); // Example: print the dealer to the console

                    $.ajax({
                        url: "<?php echo $api_url; ?>get/all_dealers_department_users.php?key=03201232927&is_role=0&user_id=" +
                            tm_id,
                        method: 'GET',
                        dataType: 'json',
                        success: async function (data) {
                            if (data.length > 0) {

                                for (const item of data) {
                                    var dealer_id = item.id;
                                    try {
                                        console.log(
                                            "<?php echo $api_url; ?>get/get_dealers_recons_new.php?key=03201232927&dealer_id=" +
                                            dealer_id + "&from=" + from + "&to=" + to)
                                        const reconResponse = await fetch(
                                            "<?php echo $api_url; ?>get/get_dealers_recons_new.php?key=03201232927&dealer_id=" +
                                            dealer_id + "&from=" + from + "&to=" + to);
                                        const reconData = await reconResponse.json();

                                        if (reconData.length > 0) {
                                            reconData.forEach((data, index) => {
                                                const pmgSalesTotal =  parseInt(data.pmg_sales) + parseInt(data.hsd_sales);
                                                const avgDailySales = parseInt(pmgSalesTotal) / 38;
                                                const avgMonthlySales = parseInt(avgDailySales) * 30;
                                                const totalReceipts = parseInt(data.pmg_receipts) + parseInt(data.hsd_receipts);
                                                const totalGainLoss = parseInt(pmgSalesTotal) - parseInt(totalReceipts);

                                                recon_table.row.add([
                                                    di,
                                                    formatNumber(data.dealer_sap),
                                                    data.site,
                                                    data.asm_name,
                                                    data.tm_name,
                                                    data.region,
                                                    data.plan_time,
                                                    splitDateTime(data.pmg_inspection_date_current, 'date'),
                                                    splitDateTime(data.pmg_inspection_date_current, 'time'),
                                                    splitDateTime(data.pmg_inspection_date_last, 'date'),
                                                    splitDateTime(data.pmg_inspection_date_last, 'time'),
                                                    data.no_of_days,
                                                    data.pmg_sales,
                                                    data.pmg_daily_sales,
                                                    data.pmg_monthly_sales,
                                                    data.pmg_receipts,
                                                    data.pmg_loss_gain,
                                                    splitDateTime(data.hsd_inspection_date_current, 'date'),
                                                    splitDateTime(data.hsd_inspection_date_current, 'time'),
                                                    splitDateTime(data.hsd_inspection_date_last, 'date'),
                                                    splitDateTime(data.hsd_inspection_date_last, 'time'),
                                                    data.no_of_days,
                                                    data.hsd_sales,
                                                    data.hsd_daily_sales,
                                                    data.hsd_monthly_sales,
                                                    data.hsd_receipts,
                                                    data.hsd_loss_gain,
                                                    Math.round(pmgSalesTotal),
                                                    Math.round(avgDailySales),
                                                    Math.round(avgMonthlySales),
                                                    Math.round(totalReceipts),
                                                    Math.round(totalGainLoss)
                                                ]).draw(false);

                                                di++;
                                            });
                                        }

                                    } catch (error) {
                                        console.error('Error fetching recon data:', error);
                                    }
                                }
                                // replaceText();
                                formatNumbers();
                                $.unblockUI();
                            } else {
                                alert('No Dealers Found');
                                $.unblockUI();
                            }
                        },
                        error: function (error) {
                            console.error('Error fetching data:', error);
                            $.unblockUI();
                        }
                    });


                }


            } else {
                alert("Please select both dates");
                $.unblockUI();
            }
        }

        function splitDateTime(datetime, mode) {
            if (datetime !== 'First Time') {
                var parts = datetime.split(' ');
                var date = parts[0];
                var time = parts[1].substring(0, 5); // Removing seconds

                if (mode === 'date') {
                    return date;
                } else if (mode === 'time') {
                    return time;
                } else {
                    return null; // Invalid mode
                }
            } else {
                return datetime; // Returning the original datetime if mode is 'First Time'
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
            // $('div.dt-buttons').addClass('d-none');
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
                element.contents().each(function () {
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

        function formatNumbers() {
            $('body *').each(function () {
                var element = $(this);
                if (element.children().length === 0) { // Only text nodes
                    var html = element.html();
                    // Use a regex that does not match dates
                    var newHtml = html.replace(/\b(?!\d{4}-\d{2}-\d{2})(\d+)\b/g, function (match) {
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