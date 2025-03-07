<?php
include '../env_set.php';
session_start();


// username and password sent from form 

$myusername = $_POST['username'];
$mypassword = $_POST['password'];
// $mypassword = hash('sha256', $mypassword); 
// $mypassword = md5($mypassword);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => ''.$api_url.'get/login.php?key=03201232927&username='.$myusername.'&password='.$mypassword.'',
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
// echo $response;

$data = json_decode($response, true);

// Access elements using array notation
 $result = $data['result'];
 
 // If result matched $myusername and $mypassword, table row must be 1 row
 if ($result != 0) {
    $data_res = $data['data'];
   
    if($data_res['privilege']=='ZM'){

        $_SESSION['user_id'] = 2;
    }else{
        
        $_SESSION['user_id'] = $data_res['id'];
    }
    $_SESSION['email'] = $data_res['login'];
    $_SESSION['user_name'] = $data_res['name'];
    $_SESSION['privilege'] = $data_res['privilege'];
    $_SESSION['password'] = $data_res['description'];
    $status = $data_res['status'];
    if ($status != '1') {
        echo 2;
    } else {
        echo 1;

    }
} else {
    echo 0;
}
?>