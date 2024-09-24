<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export to Excel with Dynamic Dates</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/exceljs/dist/exceljs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Visit Report</h2>
    <select id="monthSelect">
        <option value="">Select Month</option>
        <option value="2023-09">September 2023</option>
        <!-- Add more months as needed -->
    </select>
    <button id="getData" class="btn btn-primary">Get Data</button>
    <button id="exportExcel" class="btn btn-success">Export to Excel</button>

    <table id="recon_table" style="width: 100%;" class="table table-bordered">
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
                <th>Total Visit GM</th>
                <th>Total Visit RM</th>
                <th>Total Visit TM</th>
            </tr>
        </thead>
        <tbody id="data-table-body">
            <!-- Data will be populated here by JavaScript -->
        </tbody>
    </table>
</div>

<script>
function generateTableHeader() {
    const selectedMonth = $('#monthSelect').val();
    if (!selectedMonth) return;

    const [year, month] = selectedMonth.split('-');
    const daysInMonth = new Date(year, month, 0).getDate();
    $('#recon_table thead tr').find('th.dynamic-day').remove();

    for (let day = 1; day <= daysInMonth; day++) {
        $('#recon_table thead tr').append(`<th class="dynamic-day">${('0' + day).slice(-2)}-${month}-${year.slice(-2)}</th>`);
    }
}

function getRecon_new() {
    const monthSelect = $('#monthSelect').val();
    if (monthSelect) {
        generateTableHeader(); // Generate dynamic headers

        // Mock data for testing purposes
        const data = [
            {
                site: "Site A",
                dealer_sap: "SAP001",
                region: "Region 1",
                city: "City A",
                rm_name: "RM A",
                tm_name: "TM A",
                visit_date: "2023-09-01",
                gm_count: 5,
                rm_count: 10,
                tm_count: 15,
                date_info: [
                    { tm_color: "blue", rm_color: "", gm_color: "green" },
                    { tm_color: "red", rm_color: "", gm_color: "yellow" },
                    // Add more mock date info as needed
                ]
            },
            // Add more entries as needed
        ];

        $('#data-table-body').empty();
        data.forEach((item, index) => {
            let dateInfoHtml = '';
            item.date_info.forEach(dateInfo => {
                const tmSymbol = dateInfo.tm_color ? '@' : '';
                const rmSymbol = dateInfo.rm_color ? '#' : '';
                const gmSymbol = dateInfo.gm_color ? '$' : '';

                dateInfoHtml += `<td style="background-color:${dateInfo.tm_color || 'transparent'};">${tmSymbol}</td>
                                 <td style="background-color:${dateInfo.rm_color || 'transparent'};">${rmSymbol}</td>
                                 <td style="background-color:${dateInfo.gm_color || 'transparent'};">${gmSymbol}</td>`;
            });

            const rowHtml = `<tr>
                <td>${index + 1}</td>
                <td>${item.site}</td>
                <td>${item.dealer_sap}</td>
                <td>${item.region}</td>
                <td>${item.city}</td>
                <td>${item.rm_name}</td>
                <td>${item.tm_name}</td>
                <td>${item.visit_date}</td>
                ${dateInfoHtml}
                <td>${item.gm_count}</td>
                <td>${item.rm_count}</td>
                <td>${item.tm_count}</td>
            </tr>`;

            $('#data-table-body').append(rowHtml);
        });
    } else {
        alert("Please select a month.");
    }
}

function exportTableToExcel() {
    const workbook = new ExcelJS.Workbook();
    const worksheet = workbook.addWorksheet('Report');

    // Add headers
    $('#recon_table thead th').each(function() {
        worksheet.addRow([$(this).text()]);
    });

    // Add data
    $('#data-table-body tr').each(function() {
        const rowData = [];
        $(this).find('td').each(function() {
            const cellValue = $(this).text();
            rowData.push(cellValue);
            const cell = worksheet.getCell(`${String.fromCharCode(65 + rowData.length - 1)}${worksheet.lastRow.number + 1}`);

            // Apply styles based on cell value
            if (cellValue === '@') {
                cell.fill = { type: 'pattern', pattern: 'solid', fgColor: { argb: 'FF0000FF' } }; // Blue
            } else if (cellValue === '#') {
                cell.fill = { type: 'pattern', pattern: 'solid', fgColor: { argb: 'FF00FF00' } }; // Green
            } else if (cellValue === '$') {
                cell.fill = { type: 'pattern', pattern: 'solid', fgColor: { argb: 'FFFFFF00' } }; // Yellow
            }
        });
        worksheet.addRow(rowData);
    });

    workbook.xlsx.writeBuffer().then(function(data) {
        const blob = new Blob([data], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
        saveAs(blob, 'ExportedData.xlsx');
    });
}

$(document).ready(function() {
    $('#getData').click(getRecon_new);
    $('#exportExcel').click(exportTableToExcel);
});
</script>

</body>
</html>
