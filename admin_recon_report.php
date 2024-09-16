<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dealers Reconciliation |
        <?php echo htmlspecialchars($_SESSION['user_name']); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="PUMA" name="description" />
    <meta content="PUMA" name="author" />

    <!-- Ensure the jQuery and SweetAlert scripts are loaded securely -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6>Puma Energy Pakistan Pvt. Ltd. </h6>
                                                <h6>Retail Sites Performance </h6>
                                                <h6>
                                                    <?php echo date('F j, Y'); ?>.
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h6>Visit By</h6>


                                                <div class="row">
                                                    <div class="col-md-12">

                                                        TM
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        RM

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        GM

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        SGM

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        CEO

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        GM SC

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        CFO

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        Director

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        Chairman

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">

                                                <h6>Category by color</h6>
                                                <div class="row">
                                                    <div class="col-md-12"
                                                        style="line-height: 10px;background-color: rgb(213 234 248);height: 23px;">

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12"
                                                        style="line-height: 10px;background-color: rgb(22 149 217);height: 23px;">

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12"
                                                        style="line-height: 10px;background-color: rgb(255 255 31);height: 23px;">

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12"
                                                        style="line-height: 10px;background-color: rgb(255 166 127;height: 23px;">

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12"
                                                        style="line-height: 10px;background-color: rgb(255 0 0);height: 23px;">

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12"
                                                        style="line-height: 10px;background-color: rgb(211 243 209);height: 23px;">

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12"
                                                        style="line-height: 10px;background-color: rgb(242 155 218);height: 23px;">

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12"
                                                        style="line-height: 10px;background-color: rgb(208 208 208);height: 23px;">

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12"
                                                        style="line-height: 10px;background-color: rgb(0 169 59);height: 23px;">

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <h6>
                                                    <?php echo date('F j, Y'); ?>
                                                </h6>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="overflow: auto;">
                                        <table id="recon_table" style=" width: 100%;" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>S #</th>
                                                    <th>Site Name</th>
                                                    <th>Site Code</th>
                                                    <th>Region</th>
                                                    <th>City</th>
                                                    <th>RM</th>
                                                    <th>TM</th>
                                                    <th>Visit Date</th>
                                                    <!-- Dynamic day columns for the selected month will be inserted here -->
                                                    <th>Total Visit GM</th>
                                                    <th>Total Visit RM</th>
                                                    <th>Total Visit TM</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data-table-body">
                                                <!-- Data will be populated here by JavaScript or PHP -->
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
                <div class="row mb-4">
                    <!-- Month selection -->
                    <div class="col-md-12">
                        <label for="monthSelect">Select Month</label>
                        <input type="month" id="monthSelect" class="form-control" onchange="generateTableHeader()">
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

        $(document).ready(function () {
            all_dealers();
            $('.multiple_select').select2();
            // initializeDataTable();

            $('#add_btn').click(function () {
                $('#row_id').val("");
            });

            $('#selectAllTm').change(function () {
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
                "<?php echo $api_url; ?>get/get_asm.php?key=03201232927&pre=<?php echo htmlspecialchars($_SESSION['privilege']); ?>&user_id=<?php echo htmlspecialchars($_SESSION['user_id']); ?>"
            )
                .then(response => response.json())
                .then(response => {
                    response.forEach(data => {
                        $('#dealers').append(new Option(data.name, data.id)).trigger('change');
                    });
                })
                .catch(error => console.log('Error fetching dealers:', error));
        }

        // Generate table headers based on the selected month
        // Generate table headers based on the selected month in reverse order (last day first)
        function generateTableHeader() {
            const selectedMonth = $('#monthSelect').val(); // Get the selected month
            if (!selectedMonth) return;

            // Get year and month from selected value
            const [year, month] = selectedMonth.split('-');

            // Calculate the number of days in the selected month
            const daysInMonth = new Date(year, month, 0).getDate();

            // Clear the old dynamic headers (days)
            $('#recon_table thead tr').find('th.dynamic-day').remove();

            // Find the index of "Visit Date" column (we'll insert after this)
            const lastVisitIndex = $('#recon_table thead tr').find('th:contains("Visit Date")').index();

            // Insert new day headers dynamically after the "Visit Date" column in reverse order
            for (let day = daysInMonth; day >= 1; day--) {
                // Generate day in the format "dd-MMM-yy" (e.g., 30-Sep-24)
                const dayHeader = '<th class="dynamic-day">' + ('0' + day).slice(-2) + '-' +
                    getMonthName(month) + '-' +
                    year.slice(-2) + '</th>';

                // Insert the dynamic day header after "Visit Date"
                $('#recon_table thead tr th').eq(lastVisitIndex).after(dayHeader);
            }
        }


        // Function to get short month name (e.g., "Jan", "Feb")
        function getMonthName(month) {
            const date = new Date();
            date.setMonth(month - 1);
            return date.toLocaleString('en-US', {
                month: 'short'
            });
        }

        function getRecon_new() {
            var monthSelect = $('#monthSelect').val();

            if (monthSelect != "") {
                blocking();

                $.ajax({
                    url: "<?php echo $api_url; ?>get/get_admin_current_month_visit_report_with_total.php?key=03201232927&months=" +
                        monthSelect,
                    method: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        // Clear the existing table content
                        $('#data-table-body').empty();
                        var dataLength = data.length; // Get the length of the data array

                        // Check if there is data
                        if (data.length > 0) {
                            $.each(data, function (index, item) {
                                var dateInfoArray = item.date_info;

                                var dateInfoHtml = '';
                                var rowHtml = '';

                                // Check if current item is the last item
                                if (index === data.length - 1) {
                                    // This is the last item
                                    console.log("Last row data:", item);

                                    // Create <td> elements for each dateInfo with fixed width
                                    $.each(dateInfoArray, function (dateIndex, dateInfo) {
                                        dateInfoHtml +=
                                            '<td style="padding: 0; width: 150px;">' +
                                            '<table style="width: 100%; table-layout: fixed;" class="table table-bordered">' +
                                            '<tr>' +
                                            '<td style="width: 33%; height: 100%; background-color:' +
                                            dateInfo.tm_color +
                                            ';padding: 0;font-weight: bold">' + dateInfo
                                                .tm_color +
                                            '</td>' +
                                            '<td style="width: 33%; height: 100%; background-color:' +
                                            dateInfo.rm_color +
                                            ';padding: 0;font-weight: bold">' + dateInfo
                                                .rm_color +
                                            '</td>' +
                                            '<td style="width: 33%; height: 100%; background-color:' +
                                            dateInfo.gm_color +
                                            ';padding: 0;font-weight: bold">' + dateInfo
                                                .gm_color +
                                            '</td>' +
                                            '</tr>' +
                                            '</table>' +
                                            '</td>';
                                    });
                                    rowHtml = '<tr>' +
                                        '<td style="width: 150px;">' + (index + 1) +
                                        '</td>' +
                                        // Serial number
                                        '<td style="width: 150px;">' + item.site + '</td>' +
                                        '<td style="width: 150px;">' + item.dealer_sap +
                                        '</td>' +
                                        '<td style="width: 150px;">' + item.region +
                                        '</td>' +
                                        '<td style="width: 150px;">' + item.city + '</td>' +
                                        '<td style="width: 150px;">' + item.rm_name +
                                        '</td>' +
                                        '<td style="width: 150px;">' + item.tm_name +
                                        '</td>' +
                                        '<td style="width: 150px;font-weight: bold">' + item
                                            .plan_data + '</td>' +
                                        dateInfoHtml +
                                        '<td style="width: 150px;">' + item.gm_count +
                                        '</td>' +
                                        // Total GM Visits
                                        '<td style="width: 150px;">' + item.rm_count +
                                        '</td>' +
                                        // Total RM Visits
                                        '<td style="width: 150px;">' + item.tm_count +
                                        '</td>' +
                                        // Total TM Visits
                                        '</tr>';
                                } else {
                                    // This is not the last item
                                    $.each(dateInfoArray, function (dateIndex, dateInfo) {
                                        dateInfoHtml +=
                                            '<td style="padding: 0; width: 150px;">' +
                                            '<table style="width: 100%; table-layout: fixed;" class="table table-bordered">' +
                                            '<tr>' +
                                            '<td style="width: 33%; height: 100%; background-color:' +
                                            dateInfo.tm_color + ';color: transparent;">@</td>' +
                                            '<td style="width: 33%; height: 100%; background-color:' +
                                            dateInfo.rm_color + ';color: transparent;">#</td>' +
                                            '<td style="width: 33%; height: 100%; background-color:' +
                                            dateInfo.gm_color + ';color: transparent;">$</td>' +
                                            '</tr>' +
                                            '</table>' +
                                            '</td>';
                                    });
                                    rowHtml = '<tr>' +
                                        '<td style="width: 150px;">' + (index + 1) +
                                        '</td>' +
                                        // Serial number
                                        '<td style="width: 150px;">' + item.site + '</td>' +
                                        '<td style="width: 150px;">' + item.dealer_sap +
                                        '</td>' +
                                        '<td style="width: 150px;">' + item.region +
                                        '</td>' +
                                        '<td style="width: 150px;">' + item.city + '</td>' +
                                        '<td style="width: 150px;">' + item.rm_name +
                                        '</td>' +
                                        '<td style="width: 150px;">' + item.tm_name +
                                        '</td>' +
                                        '<td style="width: 150px;">' + item.plan_data +
                                        '</td>' +
                                        dateInfoHtml +
                                        '<td style="width: 150px;">' + item.gm_count +
                                        '</td>' +
                                        // Total GM Visits
                                        '<td style="width: 150px;">' + item.rm_count +
                                        '</td>' +
                                        // Total RM Visits
                                        '<td style="width: 150px;">' + item.tm_count +
                                        '</td>' +
                                        // Total TM Visits
                                        '</tr>';
                                }

                                // Construct the full row HTML


                                // Append the row to the table body
                                $('#data-table-body').append(rowHtml);
                            });

                        }

                        initializeDataTable();
                        $.unblockUI();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
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

        function initializeDataTable() {
            recon_table = $('#recon_table').DataTable({
                ordering: false,
                dom: 'Bfrtip',
                pageLength: 1000,
                buttons: [
                    'copy', 'csv', 'excel', 'print'
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
    </script>
</body>

</html>