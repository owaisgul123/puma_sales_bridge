<?php
error_reporting(0);
$sales_order = $_GET['no'];

$active_class = 0;
$category_html = '';
$product_html = '';
$modal_zoom = '';

$total_trips = 0;
$withtracker = 0;
$withouttracker = 0;

$curl = curl_init();

curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => 'http://151.106.17.246:8080/OMCS-CMS-APIS/get/puma_sap_order/get_sap_order_data_salesOrder.php?key=03201232927&sales_order=' . $sales_order . '',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    )
);

$response = curl_exec($curl);

$array = json_decode($response, true);

foreach ($array as $category) {
    $current_tab = "";
    $current_content = "";
    if (!$active_class) {
        $active_class = 1;
        $current_tab = 'active';
        $current_content = 'in active';
    }
    $total_trips++;
    if ($category['tracker_status'] == 'With-Tracker') {
        $withtracker++;

    } else {
        $withouttracker++;

    }
    $category_html .= '<a class="nav-link border border-dark ' . $current_tab . ' mb-3" id="v-line-pills-home-tab' . $category['id'] . '"
        data-toggle="pill" href="#v-line-pills-home' . $category['id'] . '" role="tab"
        aria-controls="v-line-pills-home' . $category['id'] . '" aria-selected="true">
        <div class="container-fluid my-3">
            <div class="row ">
                <div class="col-md-3" style="">
                    <i class="fa fas fa-truck-moving" style="font-size:18px"></i>
                </div>
                <div class="col-md-9 text-left " style="margin: auto;font-weight: bold;color:#3e3ea7;">
                    ' . $category['vehicle'] . '</div>
            </div>
            <div class="row ">
                <div class="col-md-3" style="">
                    <i class="fa fas fa-user" style="font-size:18px"></i>
                </div>
                <div class="col-md-9 text-left " style="margin: auto;font-weight: bold;color:#3e3ea7;">
                    ' . $category['driver_name'] . '<br><small>(' . $category['driver_cnic'] . ')</small></div>
            </div>
            <div class="row  ">
                <div class="col-md-3" style="">
                    <i class="fa fas fa-route" style="font-size:20px"></i>
                </div>
                <div class="col-md-9 text-left " style="margin: auto;">' . $category['tracker_status'] . ' Trips
                </div>
            </div>
            <div class="row  ">
                <div class="col-md-3" style="">
                    <i class="fa fas fa-clock" style="font-size:20px"></i>
                </div>
                <div class="col-md-9 text-left " style="margin: auto;">' . $category['created_at'] . ' 
                </div>
            </div>
        </div>
    </a>';

    $product_html .= '<div class="tab-pane fade show  ' . $current_content . '" id="v-line-pills-home' . $category["id"] . '" role="tabpanel" aria-labelledby="v-line-pills-home-tab' . $category["id"] . '">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table mb-4">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Customer Sap</th>
                                <th>Order Sap</th>
                                <th>Material</th>
                                <th>QTY</th>
                                <th>Order Amount</th>
                                <th>Trip Status</th>
                                <th>Map</th>
                                <th>Distance</th>
                                <th>Active Time</th>
                                <th>ETA</th>
                                <th>Close Time</th>
                                <th>Completion Duration</th>
                            </tr>
                        </thead>
                        <tbody>';

    $cat_id = $category["id"];
    $tracker_status = $category["tracker_status"];

    $sub_data = get_sub($cat_id, $sales_order);
    $product_detail = json_decode($sub_data, true);

    foreach ($product_detail as $product) {
        $sub_id = $product["id"];
        $salesapNo = $product["salesapNo"];
       $salesapstatus = $product["status"];
        $current_status = $product["current_status"];

        $map_btn = '<button type="button" class=" btn btn-outline-info btn-rounded mb-2" style="width: max-content;font-size: 12px;padding: 2px 10px;" onclick="my_markers(' . $sub_id . ',' . $salesapNo . ');"> Focused
        On Map</button>';
        $status_btn = ($tracker_status == 'With-Tracker') ? $map_btn : "---";

        if ($salesapstatus == 0) {
            $status_value =
                '<span  class="badge rounded-pill cursor-pointer bg-primary approved_check" data-key="t-new">' + $current_status + '</span>';
        } else if ($salesapstatus == 1) {
            $status_value = '<span  class="badge rounded-pill cursor-pointer bg-warning" data-key="t-new">' . $current_status . '</span>';
        } else if ($salesapstatus == 2) {
            $status_value = '<span  class="badge rounded-pill cursor-pointer bg-success" data-key="t-new">' . $current_status . '</span>';
        }
        $completeTimeStr = $product["close_time"];
        $lastVisitDateStr = $product["active_time"];

        // Create DateTime objects from the date-time strings
        $completeTime = new DateTime($completeTimeStr);

        // Last Visit Date
        $lastVisitDate = new DateTime($lastVisitDateStr);
        
        // Calculate the difference
        $difference = $completeTime->diff($lastVisitDate);
        
        // Format the difference
        $formattedDifference = $difference->format('%h:%i:%s');
        $product_html .= '<tr style="background-color:#FFF">
                                <td class="text-center">' . $product["name"] . '</td>
                                <td>' . $product["dealer_sap"] . '</td>
                                <td>' . $product["salesapNo"] . '</td>
                                <td>' . $product["product_name"] . '</td>
                                <td>' . $product["qty"] . '</td>
                                <td>' . number_format($product["price"], 2, '.', ',') . '</td>
                                <td>' . $status_value . '</td>
                                <td>' . $status_btn . '</td>
                                <td>' . round($product["distance"]) . '</td>
                                <td>' . $product["active_time"] . '</td>
                                <td>' . $product["eta"] . '</td>
                                <td>' . $product["close_time"] . '</td>
                                <td>' . $formattedDifference . '</td>'
        ;
    }

    $product_html .= '</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="clear_both"></div>
    </div>';
}

curl_close($curl);

function get_sub($id, $sales_order)
{
    $curl = curl_init();
    // echo 'http://151.106.17.246:8080/OMCS-CMS-APIS/get/puma_sap_order/get_sap_order_subtripdata_salesOrder.php?key=03201232927&id=' . $id . '&sales_order=' . $sales_order . '';
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => 'http://151.106.17.246:8080/OMCS-CMS-APIS/get/puma_sap_order/get_sap_order_subtripdata_salesOrder.php?key=03201232927&id=' . $id . '&sales_order=' . $sales_order . '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        )
    );

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;

}

?>