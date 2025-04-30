<?php
if($_SESSION['privilege'] == 'Admin'){
    include 'admin_sidebar.php';
}elseif($_SESSION['privilege'] == 'ZM'){
    include 'zm_sidebar.php';

}
elseif($_SESSION['privilege'] == 'TM'){
    include 'tm_sidebar.php';
    
}elseif($_SESSION['privilege'] == 'ASM'){
    include 'asm_sidebar.php';
    
}elseif($_SESSION['privilege'] == 'Order'){
    include 'orders_sidebar.php';
    
}
elseif($_SESSION['privilege'] == 'Order (GM Team)'){
    include 'order_bsmteam_sidebar.php';
    
}
elseif($_SESSION['privilege'] == 'Logistics'){
    include 'logistic_sidebar.php';
    
}elseif($_SESSION['privilege'] == 'Reporting'){
    include 'reporting_sidebar.php';
    
}elseif($_SESSION['privilege'] == 'Monitoring'){
    include 'monitor_sidebar.php';
    
}elseif($_SESSION['privilege'] == 'Inspection Monitoring'){
    include 'inspection_monit_sidebar.php';
    
}
elseif($_SESSION['privilege'] == 'Eng'){
    include 'eng_sidebar.php';
    
}
elseif($_SESSION['privilege'] == 'Planner'){
    include 'planner_sidebar.php';
    
}
?>