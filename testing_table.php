<!DOCTYPE html>
<html>

<head>
    <meta name="description" content="Export with customisable file name" />
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.js"></script>
    <link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet"
        type="text/css" />
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <meta charset=utf-8 />
    <title>Order Report</title>
</head>
<style>
body {
    font: 90%/1.45em "Helvetica Neue", HelveticaNeue, Verdana, Arial, Helvetica, sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
    background-color: #fff;
}
</style>

<body>
    <div class="container">
        <table id="example" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="text-center">S.No</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Site Name</th>
                    <th class="text-center">Mode</th>
                    <th class="text-center">Depot</th>
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
                    <th class="text-center">Depot</th>
                    <th class="text-center">Total Amount</th>
                    <th class="text-center">Ledger Amount</th>
                    <th class="text-center">Status</th>
                    <th>Index</th>
                </tr>
            </tfoot>
        </table>

    </div>
</body>
<script>
$(document).ready(function() {





    fetchtable();
});

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

    fetch("http://151.106.17.246:8080/OMCS-CMS-APIS/get/all_in_one_orders.php?key=03201232927", requestOptions)
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
                    {
                        "data": 'consignee_name'
                    },
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

</html>