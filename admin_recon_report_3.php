<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Retail Sites Performance |
        <?php echo htmlspecialchars($_SESSION['user_name']); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="PUMA" name="description" />
    <meta content="PUMA" name="author" />

    <!-- Ensure the jQuery and SweetAlert scripts are loaded securely -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/exceljs/dist/exceljs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

    <!-- Include your CSS and other scripts -->
    <?php include 'css_script.php'; ?>
    <style>
    th {
        font-size: 10px;
    }

    th {
        font-size: 10px;
    }
    </style>
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
                            <h3>Retail Sites Performance</h3>
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
                                                        style="line-height: 10px;background-color: rgb(255 166 127);height: 23px;">

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
                                        <button id="exportExcel" class="btn btn-info">Export to Excel</button>

                                        <table id="recon_table" style=" width: 100%;" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="background-color: rgb(2 30 47);color:#FFF">S #</th>
                                                    <th style="background-color: rgb(2 30 47);color:#FFF">Site Name</th>
                                                    <th style="background-color: rgb(2 30 47);color:#FFF">Site Code</th>
                                                    <th style="background-color: rgb(2 30 47);color:#FFF">Region</th>
                                                    <th style="background-color: rgb(2 30 47);color:#FFF">City</th>
                                                    <th style="background-color: rgb(2 30 47);color:#FFF">RM</th>
                                                    <th style="background-color: rgb(2 30 47);color:#FFF">TM</th>
                                                    <th style="background-color: rgb(2 30 47);color:#FFF">Visit Date</th>
                                                    <!-- Dynamic day columns for the selected month will be inserted here -->
                                                    <th style="background-color: rgb(2 30 47);color:#FFF">Total Visit TM</th>
                                                    <th style="background-color: rgb(2 30 47);color:#FFF">Total Visit RM</th>
                                                    <th style="background-color: rgb(2 30 47);color:#FFF">Total Visit GM</th>
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

    $(document).ready(function() {
        all_dealers();
        $('.multiple_select').select2();
        // initializeDataTable();

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

        // Insert new day headers dynamically after the "Visit Date" column
        for (let day = daysInMonth; day >= 1; day--) {
            const monthName = getMonthName(month);
            const dayOfWeek = getDayOfDate(year, month, day); // Get the day of the week

            // Generate day header in the format "Day (dd-MMM-yy)"
            const dayHeader = `<th class="dynamic-day" colspan="3" style="background-color: rgb(2 30 47); color: #FFF">
            (${('0' + day).slice(-2)}-${monthName}-${year.slice(-2)}) ${dayOfWeek} </th>`;

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

    // Function to get the day of the week for a given date
    function getDayOfDate(year, month, day) {
        const date = new Date(year, month - 1, day); // Create date object
        return date.toLocaleString('en-US', {
            weekday: 'long'
        }); // Get day of the week
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
                success: function(data) {
                    // Clear the existing table content
                    $('#data-table-body').empty();
                    var dataLength = data.length; // Get the length of the data array

                    // Check if there is data
                    if (data.length > 0) {
                        $.each(data, function(index, item) {
                            var dateInfoArray = item.date_info;

                            var dateInfoHtml = '';
                            var rowHtml = '';

                            // Check if current item is the last item
                            if (index === data.length - 1) {
                                // This is the last item
                                console.log("Last row data:", item);

                                // Create <td> elements for each dateInfo with fixed width
                                $.each(dateInfoArray, function(dateIndex, dateInfo) {
                                    // dateInfoHtml +=
                                    //     '<td style="padding: 0; width: 150px;">' +
                                    //     '<table style="width: 100%; table-layout: fixed;" class="table table-bordered">' +
                                    //     '<tr>' +
                                    //     '<td style="width: 33%; height: 100%; background-color:' +
                                    //     dateInfo.tm_color +
                                    //     ';padding: 0;font-weight: bold">' + dateInfo
                                    //     .tm_color +
                                    //     '</td>' +
                                    //     '<td style="width: 33%; height: 100%; background-color:' +
                                    //     dateInfo.rm_color +
                                    //     ';padding: 0;font-weight: bold">' + dateInfo
                                    //     .rm_color +
                                    //     '</td>' +
                                    //     '<td style="width: 33%; height: 100%; background-color:' +
                                    //     dateInfo.gm_color +
                                    //     ';padding: 0;font-weight: bold">' + dateInfo
                                    //     .gm_color +
                                    //     '</td>' +
                                    //     '</tr>' +
                                    //     '</table>' +
                                    //     '</td>';

                                    dateInfoHtml +=

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
                                        '</td>';
                                });
                                rowHtml = '<tr>' +
                                    '<td style="width: 150px;">' + (index + 1) +
                                    '</td>' +
                                    // Serial number
                                    '<td style="width: 150px;" class="cell_size">' + item.site +
                                    '</td>' +
                                    '<td style="width: 150px;" class="cell_size">' + item
                                    .dealer_sap +
                                    '</td>' +
                                    '<td style="width: 150px;" class="cell_size">' + item.region +
                                    '</td>' +
                                    '<td style="width: 150px;" class="cell_size">' + item.city +
                                    '</td>' +
                                    '<td style="width: 150px;" class="cell_size">' + item.rm_name +
                                    '</td>' +
                                    '<td style="width: 150px;" class="cell_size">' + item.tm_name +
                                    '</td>' +
                                    '<td style="width: 150px;font-weight: bold" class="cell_size">' +
                                    item
                                    .plan_data + '</td>' +
                                    dateInfoHtml +
                                    '<td style="width: 150px;" class="cell_size">' + item.tm_count +
                                    '</td>' +
                                    // Total TM Visits
                                    '<td style="width: 150px;" class="cell_size">' + item.rm_count +
                                    '</td>' +
                                    // Total RM Visits
                                    '<td style="width: 150px;" class="cell_size">' + item.gm_count +
                                    '</td>' +
                                    // Total GM Visits
                                    '</tr>';
                            } else {
                                // This is not the last item
                                $.each(dateInfoArray, function(dateIndex, dateInfo) {
                                    // dateInfoHtml +=
                                    //     '<td style="padding: 0; width: 150px;">' +
                                    //     '<table style="width: 100%; table-layout: fixed;" class="table table-bordered">' +
                                    //     '<tr>' +
                                    //     '<td style="width: 33%; height: 100%; background-color:' +
                                    //     dateInfo.tm_color + ';color: transparent;">@</td>' +
                                    //     '<td style="width: 33%; height: 100%; background-color:' +
                                    //     dateInfo.rm_color + ';color: transparent;">#</td>' +
                                    //     '<td style="width: 33%; height: 100%; background-color:' +
                                    //     dateInfo.gm_color + ';color: transparent;">$</td>' +
                                    //     '</tr>' +
                                    //     '</table>' +
                                    //     '</td>';
                                    let result_tm = dateInfo.tm_color === "" ? "" : "@";
                                    let result_rm = dateInfo.rm_color === "" ? "" : "#";
                                    let result_gm = dateInfo.gm_color === "" ? "" : "$";

                                    dateInfoHtml +=

                                        '<td style="width: 33%; height: 100%; background-color:' +
                                        dateInfo.tm_color + ';color: transparent;">' +
                                        result_tm + '</td>' +
                                        '<td style="width: 33%; height: 100%; background-color:' +
                                        dateInfo.rm_color + ';color: transparent;">' +
                                        result_rm + '</td>' +
                                        '<td style="width: 33%; height: 100%; background-color:' +
                                        dateInfo.gm_color + ';color: transparent;">' +
                                        result_gm + '</td>';
                                });
                                rowHtml = '<tr>' +
                                    '<td style="width: 150px;" >' + (index + 1) +
                                    '</td>' +
                                    // Serial number
                                    '<td style="width: 150px;" class="cell_size">' + item.site +
                                    '</td>' +
                                    '<td style="width: 150px;" class="cell_size">' + item
                                    .dealer_sap +
                                    '</td>' +
                                    '<td style="width: 150px;" class="cell_size">' + item.region +
                                    '</td>' +
                                    '<td style="width: 150px;" class="cell_size">' + item.city +
                                    '</td>' +
                                    '<td style="width: 150px;" class="cell_size">' + item.rm_name +
                                    '</td>' +
                                    '<td style="width: 150px;" class="cell_size">' + item.tm_name +
                                    '</td>' +
                                    '<td style="width: 150px;" class="cell_size">' + item
                                    .plan_data +
                                    '</td>' +
                                    dateInfoHtml +
                                    '<td style="width: 150px;" class="cell_size">' + item.tm_count +
                                    '</td>' +
                                    // Total TM Visits
                                    '<td style="width: 150px;" class="cell_size">' + item.rm_count +
                                    '</td>' +
                                    // Total RM Visits
                                    '<td style="width: 150px;" class="cell_size">' + item.gm_count +
                                    '</td>' +
                                    // Total TM Visits
                                    '</tr>';
                            }

                            // Construct the full row HTML


                            // Append the row to the table body
                            $('#data-table-body').append(rowHtml);
                        });

                    }

                    // initializeDataTable();
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
    <script>
    function exportTableToExcel() {
        const workbook = new ExcelJS.Workbook();
        const worksheet = workbook.addWorksheet('Report');

        // Add static header in the first column
        worksheet.mergeCells('A1:C1');
        worksheet.mergeCells('A2:C2');
        worksheet.mergeCells('A3:C3');

        // Set the main header
        worksheet.getCell('A1').value = "Puma Energy Pakistan Pvt. Ltd.";
        worksheet.getCell('A1').alignment = {
            horizontal: 'center',
            vertical: 'middle'
        };
        worksheet.getCell('A1').font = {
            bold: true,
            size: 14,
            name: 'Aptos Narrow'
        };

        // Set the second line under the merged cell
        worksheet.getCell('A2').value = "Retail Sites Performance";
        worksheet.getCell('A2').alignment = {
            horizontal: 'center',
            vertical: 'middle'
        };
        worksheet.getCell('A2').font = {
            bold: true,
            size: 14,
            name: 'Aptos Narrow'
        };

        // Set date in A3 (visually part of the merged area)
        worksheet.getCell('A3').value = " <?php echo date('F j, Y'); ?>";
        worksheet.getCell('A3').alignment = {
            horizontal: 'center',
            vertical: 'middle'
        };
        worksheet.getCell('A3').font = {
            size: 11,
            name: 'Aptos Narrow'
        };

        // Add a spacing row
        worksheet.addRow([]);

        // Visit By section
        worksheet.getCell('D1').value = "Visit By";
        worksheet.getCell('D1').font = {
            bold: true,
            size: 11,
            name: 'Aptos Narrow'
        };
        worksheet.getCell('D1').alignment = {
            horizontal: 'center',
            vertical: 'middle'
        };

        // Start from row 2 for visit titles
        let bcell = 2;
        const visitByTitles = ["TM", "RM", "GM", "SGM", "CEO", "GM SC", "CFO", "Director", "Chairman"];
        visitByTitles.forEach((title) => {
            worksheet.getCell(`D${bcell}`).value = title;
            worksheet.getCell(`D${bcell}`).alignment = {
                horizontal: 'left',
                horizontal: 'center',
                vertical: 'middle'
            };
            worksheet.getCell(`D${bcell}`).font = {
                size: 11,
                name: 'Aptos Narrow'
            };
            bcell++;
        });

        // Add another spacing row
        worksheet.addRow([]);

        // Category by Color section
        worksheet.getCell('E1').value = "Category by Color";
        worksheet.getCell('E1').font = {
            bold: true,
            size: 11,
            name: 'Aptos Narrow'
        };
        worksheet.getCell('E1').alignment = {
            horizontal: 'center',
            vertical: 'middle'
        };

        const categoryColors = [{
                color: 'D5EAF8',
                label: 'Light Blue'
            },
            {
                color: '1695D9',
                label: 'Blue'
            },
            {
                color: 'FFFF1F',
                label: 'Yellow'
            },
            {
                color: 'FFA67F',
                label: 'Light Orange'
            },
            {
                color: 'FF0000',
                label: 'Red'
            },
            {
                color: 'D3F3D1',
                label: 'Light Green'
            },
            {
                color: 'F29BD9',
                label: 'Pink'
            },
            {
                color: 'D0D0D0',
                label: 'Gray'
            },
            {
                color: '00A93B',
                label: 'Dark Green'
            }
        ];
        categoryColors.forEach((category, index) => {
            const colorCell = worksheet.getCell(`E${index + 2}`);
            colorCell.fill = {
                type: 'pattern',
                pattern: 'solid',
                fgColor: {
                    argb: category.color
                }
            };
            colorCell.alignment = {
                horizontal: 'left',
                vertical: 'middle'
            };
            colorCell.font = {
                size: 11,
                name: 'Aptos Narrow'
            };
        });

        worksheet.addRow([]);

        worksheet.getCell('F1').value = "Date";
        worksheet.getCell('F1').font = {
            bold: true,
            size: 11,
            name: 'Aptos Narrow'
        };
        worksheet.getCell('F1').alignment = {
            horizontal: 'center',
            vertical: 'middle'
        };
        worksheet.getCell('F2').value = " <?php echo date('F j, Y'); ?>";
        worksheet.getCell('F2').alignment = {
            horizontal: 'center',
            vertical: 'middle'
        };
        worksheet.getCell('F2').font = {
            size: 11,
            name: 'Aptos Narrow'
        };

        worksheet.addRow([]);

        let currentColumn = 1;
        const maxColumns = 16384;

        $('#recon_table thead tr').each(function() {
            const headerCells = $(this).find('th');

            headerCells.each(function() {
                const colspan = parseInt($(this).attr('colspan')) || 1;
                const cellValue = $(this).text();
                const cellColor = $(this).css('background-color');
                const fontColor = $(this).css('color');

                if (currentColumn > maxColumns) {
                    console.error('Maximum column limit exceeded.');
                    return;
                }

                const headerCell = worksheet.getCell(12, currentColumn);
                headerCell.value = cellValue;
                headerCell.fill = {
                    type: 'pattern',
                    pattern: 'solid',
                    fgColor: {
                        argb: rgbToHex(cellColor)
                    }
                };
                headerCell.font = {
                    color: {
                        argb: rgbToHex(fontColor)
                    },
                    bold: true,
                    size: 11,
                    name: 'Aptos Narrow'
                };
                headerCell.alignment = {
                    horizontal: 'center',
                    vertical: 'middle'
                };

                if (colspan > 1) {
                    worksheet.mergeCells(12, currentColumn, 12, currentColumn + colspan - 1);
                }

                currentColumn += colspan;
            });
        });

        worksheet.views = [{
            state: 'frozen',
            ySplit: 12,
            zoomScale: 70
        }];

        // Default column width
        const numberOfColumns = currentColumn - 1;
        worksheet.columns = Array(numberOfColumns).fill({
            width: 20
        });

        // Update column widths for cells with the "cell_size" class
        $('#data-table-body tr').each(function(rowIndex) {
            const rowData = [];
            $(this).find('td').each(function(cellIndex) {
                const cellValue = $(this).text().trim();
                rowData.push(cellValue);

                if ($(this).hasClass('cell_size')) {
                    worksheet.getColumn(cellIndex + 1).width =
                        40; // Increase width for 'cell_size' class
                } else {
                    worksheet.getColumn(cellIndex + 1).width =
                        12; // Increase width for 'cell_size' class

                }
            });

            const newRow = worksheet.addRow(rowData);
            newRow.height = 20;

            newRow.eachCell((cell) => {
                cell.alignment = {
                    horizontal: 'center',
                    vertical: 'middle'
                };

                // Apply background colors based on special characters
                if (cell.value === '@') {
                    cell.fill = {
                        type: 'pattern',
                        pattern: 'solid',
                        fgColor: {
                            argb: 'D5EAF8'
                        }
                    };
                    cell.value = '';
                } else if (cell.value === '#') {
                    cell.fill = {
                        type: 'pattern',
                        pattern: 'solid',
                        fgColor: {
                            argb: '1695D9'
                        }
                    };
                    cell.value = '';
                } else if (cell.value === '$') {
                    cell.fill = {
                        type: 'pattern',
                        pattern: 'solid',
                        fgColor: {
                            argb: 'FFFF1F'
                        }
                    };
                    cell.value = '';
                }
            });
        });

        workbook.xlsx.writeBuffer().then(function(data) {
            const blob = new Blob([data], {
                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            });
            saveAs(blob, `retail_Performance_report_${new Date().toLocaleDateString()}.xlsx`);
        });
    }

    // Helper function to convert RGB color to hex format
    function rgbToHex(rgb) {
        const result = rgb.match(/\d+/g);
        return result ? ((1 << 24) + (result[0] << 16) + (result[1] << 8) + +result[2]).toString(16).slice(1)
            .toUpperCase() : 'FFFFFF';
    }








    $(document).ready(function() {
        $('#exportExcel').click(exportTableToExcel);
    });
    </script>
</body>

</html>