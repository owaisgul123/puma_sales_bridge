<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Orders |
        <?php echo $_SESSION['user_name']; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="BYCO" name="description" />
    <meta content="P2P" name="author" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- App favicon -->

    <?php include 'css_script.php'; ?>


</head>


<body>

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <?php include 'header.php'; ?>
        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'sidebar.php'; ?>

        <!-- Left Sidebar End -->


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- <div class="row">

                        <div class="col-md-6">
                            <button class="btn btn-soft-primary waves-effect waves-light" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" id="add_btn"
                                aria-controls="offcanvasRight"><i
                                    class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer"></i>Add</button>
                        </div>
                    </div> -->
                    <div class="card">

                        <div class="card-body">

                            <table id="example" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Site Name</th>
                                        <th class="text-center">Mode</th>
                                        <!-- <th class="text-center">Depot</th> -->
                                        <th class="text-center">Total Amount</th>
                                        <th class="text-center">Ledger Amount</th>
                                        <th class="text-center">Status</th>
                                        <th>Index</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Site Name</th>
                                        <th class="text-center">Mode</th>
                                        <!-- <th class="text-center">Depot</th> -->
                                        <th class="text-center">Total Amount</th>
                                        <th class="text-center">Ledger Amount</th>
                                        <th class="text-center">Status</th>
                                        <th>Index</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include 'footer.php'; ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->


    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- chat offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 id="offcanvasRightLabel">Settings</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <form method="post" id="insert_form" enctype="multipart/form-data">


                    <div class="form-row mb-4">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Username</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Username"
                                required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
                                required>
                        </div>

                        <div class="form-group col-md-12  ">

                            <label for="" class="lab"> Enter
                                Password</label>
                            <input type="password" id="password" required minlength="8" class="form-control input"
                                placeholder="Enter Password">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" id="togglePassword" class="feather feather-eye"
                                style="    position: absolute;top: 42px;right: 13px;color: #888ea8;fill: rgba(0, 23, 55, 0.08);width: 17px;cursor: pointer;">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                </path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </div>


                        <div class="form-group col-md-12 ">

                            <label for="" class="lab"> Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" required minlength="8"
                                class="form-control input" placeholder="Confirm Password">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" id="togglePassword1" class="feather feather-eye"
                                style="    position: absolute;top: 42px;right: 13px;color: #888ea8;fill: rgba(0, 23, 55, 0.08);width: 17px;cursor: pointer;">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                </path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>



                        </div>



                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Contact No</label>
                            <input type="text" class="form-control" id="number" name="number"
                                placeholder="Enter Contact No" required>
                        </div>


                        <div class="form-group col-md-12">
                            <label for="inputAddress">Role</label>

                            <select id="role" name="role" class="form-control selectpicker">
                                <option selected>Choose...</option>
                                <option value="admin_user">Admin User</option>
                                <option value="viewer">viewer</option>
                                <option value="Cartraige">Cartraige</option>


                            </select>
                        </div>

                    </div>

                    <div class="col-12">
                        <input type="hidden" name="row_id" id="row_id" value="">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-10 col-form-label"></label>
                            <div class="col-md-12 text-center">

                                <input class="btn rounded-pill btn-primary" type="submit" name="insert" id="insert"
                                    value="Save">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->


    <?php include 'script_tags.php'; ?>

    <script>
    var table;
    var type;
    var subtype;
    $(document).ready(function() {

        fetchtable()

    })



    function fetchtable() {

        function format(d) {
            var html = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<thead>' +
                '<tr>' +
                '<th> </th>' +
                '<th>Date</th>' +
                '<th>Site Name</th>' +
                '<th>Product Type</th>' +
                '<th>Rate</th>' +
                '<th>Qty</th>' +
                '<th>Delivered</th>' +
                '<th>Order Amount</th>' +
                '</tr>' +
                '</thead>';
            for (i = 0; i < d.results.length; i++) {
                result = d.results[i];
                console.log(result)

                html += '<tr>' +
                    '<td></td>' +
                    '<td class="text-left">' + result.date + '</td>' +
                    '<td class="text-left">' + result.d_name + '</td>' +
                    '<td class="text-left">' + result.product_name + '</td>' +
                    '<td class="text-left">' + result.rate + '</td>' +
                    '<td class="text-left">' + result.quantity + '</td>' +
                    '<td class="text-left">' + result.delivery_based + '</td>' +
                    '<td class="text-left">' + result.amount + '</td>' +

                    '</tr>';

            }



            return html;
        }

        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        fetch("<?php echo $api_url; ?>get/all_in_one_orders.php?key=03201232927&pre=<?php echo $_SESSION['privilege']?>&user_id=<?php echo $_SESSION['user_id']?>", requestOptions)
            .then(response => response.json())
            .then(response => {
                console.log(response)

                var table = $('#example').DataTable({
                    data: response,
                    "columns": [{
                            "data": 'id'
                        },
                        {
                            "data": 'created_at'
                        },
                        {
                            "data": 'name'
                        },
                        {
                            "data": 'type'
                        },
                        // {
                        //     "data": 'consignee_name'
                        // },
                        {
                            "data": 'total_amount'
                        },
                        {
                            "data": 'legder_balance'
                        },
                        {
                            "data": 'current_status'
                        },
                        {
                            "data": null,
                            visible: false,
                            render: function(data, type, row, meta) {
                                return meta.row;
                            }
                        }
                    ],
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'excelHtml5',
                        customize: function(xlsx) {
                            var table = $('#example').DataTable();

                            // Get number of columns to remove last hidden index column.
                            var numColumns = table.columns().header().count();

                            // Get sheet.
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];

                            var col = $('col', sheet);
                            // Set the column width.
                            $(col[1]).attr('width', 20);

                            // Get a clone of the sheet data.        
                            var sheetData = $('sheetData', sheet).clone();

                            // Clear the current sheet data for appending rows.
                            $('sheetData', sheet).empty();

                            // Row index from last column.
                            var DT_row; // Row count in Excel sheet.

                            var rowCount = 1;

                            // Itereate each row in the sheet data.
                            $(sheetData).children().each(function(index) {

                                // Used for DT row() API to get child data.
                                var rowIndex = index - 1;

                                // Don't process row if its the header row.
                                if (index > 0) {

                                    // Get row
                                    var row = $(this.outerHTML);

                                    // Set the Excel row attr to the current Excel row count.
                                    row.attr('r', rowCount);

                                    var colCount = 1;

                                    // Iterate each cell in the row to change the rwo number.
                                    row.children().each(function(index) {
                                        var cell = $(this);

                                        // Set each cell's row value.
                                        var rc = cell.attr('r');
                                        rc = rc.replace(/\d+$/, "") + rowCount;
                                        cell.attr('r', rc);

                                        if (colCount === numColumns) {
                                            DT_row = cell.text();
                                            cell.html('');
                                        }

                                        colCount++;
                                    });

                                    // Get the row HTML and append to sheetData.
                                    row = row[0].outerHTML;
                                    console.log(row)
                                    $('sheetData', sheet).append(row);
                                    rowCount++;

                                    // Get the child data - could be any data attached to the row.
                                    var childData = table.row(DT_row, {
                                        search: 'none',
                                        order: 'index'
                                    }).data().results;

                                    if (childData.length > 0) {
                                        // Prepare Excel formated row
                                        headerRow = '<row r="' + rowCount +
                                            '" s="2"><c t="inlineStr" r="A' + rowCount +
                                            '"><is><t>' +
                                            '</t></is></c><c t="inlineStr" r="B' +
                                            rowCount +
                                            '" s="2"><is><t>Product Type' +
                                            '</t></is></c><c t="inlineStr" r="C' +
                                            rowCount +
                                            '" s="2"><is><t>Rate' +
                                            '</t></is></c><c t="inlineStr" r="D' +
                                            rowCount +
                                            '" s="2"><is><t>QTY' +
                                            '</t></is></c><c t="inlineStr" r="E' +
                                            rowCount +
                                            '" s="2"><is><t>Order Amount' +
                                            '</t></is></c></row>';

                                        // Append header row to sheetData.
                                        $('sheetData', sheet).append(headerRow);
                                        rowCount++; // Inc excelt row counter.

                                    }

                                    // The child data is an array of rows
                                    for (c = 0; c < childData.length; c++) {

                                        // Get row data.
                                        child = childData[c];

                                        // Prepare Excel formated row
                                        childRow = '<row r="' + rowCount +
                                            '"><c t="inlineStr" r="A' + rowCount +
                                            '"><is><t>' +
                                            '</t></is></c><c t="inlineStr" r="B' +
                                            rowCount +
                                            '"><is><t>' + child.product_name +
                                            '</t></is></c><c t="inlineStr" r="C' +
                                            rowCount +
                                            '"><is><t>' + child.rate +
                                            '</t></is></c><c t="inlineStr" r="D' +
                                            rowCount +
                                            '"><is><t>' + child.quantity +
                                            '</t></is></c><c t="inlineStr" r="E' +
                                            rowCount +
                                            '"><is><t>' + child.amount +
                                            '</t></is></c></row>';

                                        // Append row to sheetData.
                                        $('sheetData', sheet).append(childRow);
                                        rowCount++; // Inc excelt row counter.

                                    }
                                    // Just append the header row and increment the excel row counter.
                                } else {
                                    var row = $(this.outerHTML);

                                    var colCount = 1;

                                    // Remove the last header cell.
                                    row.children().each(function(index) {
                                        var cell = $(this);

                                        if (colCount === numColumns) {
                                            cell.html('');
                                        }

                                        colCount++;
                                    });
                                    row = row[0].outerHTML;
                                    $('sheetData', sheet).append(row);
                                    rowCount++;
                                }
                            });
                        },
                    }]
                });

                $('#example').on('click', 'tbody td', function() {

                    var tr = $(this).closest('tr');
                    var row = table.row(tr);

                    if (row.child.isShown()) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                    } else {
                        // Open this row
                        var data = row.data();

                        row.child(format(data)).show();
                        tr.addClass('shown');
                    }
                });
            })
            .catch(error => console.log('error', error));


    }
    </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>