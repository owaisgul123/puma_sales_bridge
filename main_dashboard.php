<?php
include 'env_set.php';
session_start();
$user_id = $_SESSION['user_id'];
$privilege = $_SESSION['privilege'];
if ($_SESSION['privilege'] == 'Admin') {
    $redirectUrl = "dealer_dashboard.php";
    header("Location: $redirectUrl");
} elseif ($_SESSION['privilege'] == 'ZM') {
    $redirectUrl = "dealer_dashboard.php";
    header("Location: $redirectUrl");

} elseif ($_SESSION['privilege'] == 'TM') {
    $redirectUrl = "tm_dashboard_rebulid.php?id=$user_id&pre=$privilege";
    header("Location: $redirectUrl");
} elseif ($_SESSION['privilege'] == 'ASM') {
    $redirectUrl = "asm_dashboard_rebuild.php?id=$user_id&pre=$privilege";
    header("Location: $redirectUrl");

}
elseif ($_SESSION['privilege'] == 'Order') {
    $redirectUrl = "manage_order.php";
    header("Location: $redirectUrl");

}
elseif ($_SESSION['privilege'] == 'Order (GM Team)') {
    $redirectUrl = "manage_order.php";
    header("Location: $redirectUrl");

}
elseif ($_SESSION['privilege'] == 'Logistics') {
    $current_date = date('Y-m-d');
                        $next_dat = date('Y-m-d', strtotime($current_date . '+1 day'));
    $redirectUrl = "trip_board.php?from=$current_date&to=$next_dat";
    header("Location: $redirectUrl");

}
elseif ($_SESSION['privilege'] == 'Reporting') {
    $current_date = date('Y-m-d');
                        $next_dat = date('Y-m-d', strtotime($current_date . '+1 day'));
    $redirectUrl = "inspection_report.php";
    header("Location: $redirectUrl");

}
elseif ($_SESSION['privilege'] == 'Monitoring') {
    $current_date = date('Y-m-d');
                        $next_dat = date('Y-m-d', strtotime($current_date . '+1 day'));
    $redirectUrl = "dealer_dashboard.php";
    header("Location: $redirectUrl");

}
elseif ($_SESSION['privilege'] == 'Inspection Monitoring') {
    $current_date = date('Y-m-d');
                        $next_dat = date('Y-m-d', strtotime($current_date . '+1 day'));
    $redirectUrl = "dealer_dashboard.php";
    header("Location: $redirectUrl");

}
elseif ($_SESSION['privilege'] == 'Eng') {
    $redirectUrl = "eng_dashboard.php";
    header("Location: $redirectUrl");

}
elseif ($_SESSION['privilege'] == 'Planner') {
    $redirectUrl = "cacual_visit_report.php";
    header("Location: $redirectUrl");

}
?>