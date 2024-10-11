<?php include 'session/session_input.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        Invoice | <?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'Guest'; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Byco" name="description" />
    <meta content="Byco" name="author" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- App favicon -->
    <?php include 'css_script.php'; ?>
</head>

<style>
    *{
        font-size: 10px;
    }
</style>
<body>
    <div id="layout-wrapper">
        <?php include 'header.php'; ?>
        <?php include 'sidebar.php'; ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body" style="padding:50px;">
                                    <div class="invoice-title">
                                        <h4 class="float-end font-size-15">
                                            Order # <span class="order_no" id="order_no"></span>
                                        </h4>
                                        <div class="mb-4">
                                            <img src="assets/images/logo-dark-sm.png" class="logo_image" alt="logo"
                                                height="100" />
                                        </div>
                                    </div>
                                    <hr class="my-4">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-muted">
                                                <h5 class="font-size-16 mb-3">Billed To:</h5>
                                                <h5 class="font-size-15 mb-2" id="dealer_name">Dealer Name</h5>
                                                <p class="mb-1" id="locations">Location</p>
                                                <p class="mb-1" id="emails">Email</p>
                                                <p id="contact">Contact</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="text-muted text-sm-end">
                                                <div>
                                                    <h5 class="font-size-15 mb-1">Order #:</h5>
                                                    <p class="order_no">Order No</p>
                                                </div>
                                                <div class="mt-4">
                                                    <h5 class="font-size-15 mb-1">Order Date:</h5>
                                                    <p id="order_date">Order Date</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-2">
                                        <h5 class="font-size-15">Order Summary</h5>
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-centered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="fw-bold" style="width: 70px;">SNo.</th>
                                                        <th class="fw-bold">Code</th>
                                                        <th class="fw-bold">Grade</th>
                                                        <th class="fw-bold">Pack Size (Ltrs & Kg.)</th>
                                                        <th class="fw-bold">Ctn Size (Ltrs)</th>
                                                        <th class="fw-bold">Packs in CTN</th>
                                                        <th class="fw-bold">Qty</th>
                                                        <th class="fw-bold">Price</th>
                                                        <th class="text-end fw-bold" style="width: 120px;">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="product_table">
                                                    <!-- Product rows will be appended here -->
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th scope="row" colspan="8" class="border-0 text-end fw-bold">
                                                            Total
                                                        </th>
                                                        <td class="border-0 text-end">
                                                            <h4 class="m-0 fw-semibold" id="total_amount">0</h4>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="d-print-none mt-4">
                                            <div class="float-end">
                                                <a href="javascript:window.print()" class="btn btn-success me-1">
                                                    <i class="fa fa-print"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End card-body -->
                            </div> <!-- End card -->
                        </div> <!-- End col-lg-12 -->
                    </div> <!-- End row -->
                </div> <!-- End container-fluid -->
            </div> <!-- End page-content -->
            
        </div> <!-- End main-content -->
    </div> <!-- End layout-wrapper -->

    <script>
    $(document).ready(function() {
        fetchtable(); // Call the fetch table function on load
    });

    function fetchtable() {
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        console.log(
            "<?php echo htmlspecialchars($api_url); ?>get/lubes/get_lubes_order_invoice.php?key=03201232927&id=<?php echo htmlspecialchars($_GET['id']); ?>"
            )
        fetch("<?php echo htmlspecialchars($api_url); ?>get/lubes/get_lubes_order_invoice.php?key=03201232927&id=<?php echo htmlspecialchars($_GET['id']); ?>",
                requestOptions)
            .then(response => response.json())
            .then(invoiceData => {
                invoiceData = invoiceData[0];
                console.log(invoiceData);

                // Populate invoice details
                $('#dealer_name').text(invoiceData.dealer_name);
                $('#locations').text(invoiceData.location);
                $('#emails').text(invoiceData.email);
                $('#contact').text(invoiceData.contact);
                $('.order_no').text(invoiceData.order_id);
                $('#order_date').text(invoiceData.created_at);
                $('#total_amount').text(invoiceData.total_amount);

                // Populate product table
                var productTable = $('#product_table');
                productTable.empty(); // Clear the table first
                console.log(invoiceData.total_amount)
                invoiceData.product.forEach(function(item, index) {
                    var row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.product_code}</td>
                            <td>${item.category}</td>
                            <td>${item.size_name}</td>
                            <td>${item.ctn_size}</td>
                            <td>${item.ctn_qty}</td>
                            <td>${item.qty}</td>
                            <td>${item.price}</td>
                            <td class="text-end">${item.amount}</td>
                        </tr>
                    `;
                    productTable.append(row);
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    }
    </script>
</body>

</html>