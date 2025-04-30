<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>History Report | <?php echo $_SESSION['user_name']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery (Must be before other scripts) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Bootstrap Select CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" />

    <?php include 'css_script.php'; ?>
</head>

<body>
    <div id="layout-wrapper">
        <?php include 'header.php'; ?>
        <?php include 'sidebar.php'; ?>
        <?php include 'right_siebar.php'; ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-soft-primary waves-effect waves-light" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" id="add_btn"
                                aria-controls="offcanvasRight"><i
                                    class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer"></i>Search</button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h3>History Report</h3>
                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Plate.No</th>
                                        <th>Location</th>
                                        <th>Power</th>
                                        <th>Speed</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php include 'footer.php'; ?>
        </div>
    </div>

    <!-- Right Sidebar -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 id="offcanvasRightLabel">Sizes</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <div class="form-row mb-4">
                    <div class="form-group col-md-12">
                        <label for="vehi_id">Vehicles</label>
                        <select class="form-control selectpicker" data-live-search="true" name="vehi_id" id="vehi_id"
                            title="Search Vehicle">
                            <option value="">Select Vehicle</option>
                        </select>

                        <div class="col-md-12 mt-3">
                            <label class="form-label">From</label>
                            <input type="datetime-local" class="form-control" id="from" name="from" required>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label class="form-label">To</label>
                            <input type="datetime-local" class="form-control" id="to" name="to" required>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <input type="hidden" name="row_id" id="row_id" value="0">
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                    <div class="mb-3 row text-center">
                        <input class="btn rounded-pill btn-primary" type="submit" name="insert" id="insert"
                            value="Save" onclick="myFunction()">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Tags -->
    <?php include 'script_tags.php'; ?>

    <!-- Bootstrap Bundle (required for Bootstrap components) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Select JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

    <script>
        var table;
        $(document).ready(function () {
            $('.selectpicker').selectpicker(); // Initialize the dropdown with search

            table = $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'excel', 'csv', 'pdf', 'print']
            });

            $('#add_btn').click(function () {
                $('#row_id').val("");
                $('#insert_form')[0]?.reset();
            });

            load_all_select();
        });

        function load_all_select() {
            $.ajax({
                url: '<?php echo $api_url; ?>get/get_all_vehicles.php?key=03201232927',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#vehi_id').empty().append('<option value="">Select</option>');
                    $.each(data, function (index, item) {
                        $('#vehi_id').append(`<option value="${item.id}">${item.name}</option>`);
                    });

                    $('#vehi_id').selectpicker('refresh'); // Refresh after loading new options
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

        function myFunction() {
            let vehicle = $("#vehi_id").val();
            let from = $("#from").val();
            let to = $("#to").val();

            if (!vehicle || !from || !to) {
                alert("Please select all fields!");
                return;
            }

            let apiUrl =
                `<?php echo $api_url; ?>get/puma_sap_order/get_trip_routes.php?key=03201232927&vehicle_id=${vehicle}&start_time=${from}&end_time=${to}`;

            $.ajax({
                url: apiUrl,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    table.clear().draw();
                    if (data.length > 0) {
                        let i = 1;
                        let rowData = data.map(item => [
                            i++,
                            item.vehicle_name,
                            item.address,
                            item.power,
                            `${item.speed} Km/hr`,
                            item.latitude,
                            item.longitude,
                            item.time,
                        ]);
                        table.rows.add(rowData).draw();
                    } else {
                        alert("No data found!");
                    }
                },
                error: function () {
                    alert("Error fetching data!");
                }
            });
        }
    </script>
</body>
</html>
