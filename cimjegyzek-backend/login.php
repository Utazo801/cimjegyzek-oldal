<?php

$userId = "admin";
$pwd = "admin";
$isLoggedIn = false;

$postdata = json_decode(file_get_contents('php://input'));

if(isset($postdata) && !empty($postdata)){
    
    if($userId == $postdata->userid && $pwd == $postdata->pwd){
        $isLoggedIn = true;
        $response[] = array('status'=>$isLoggedIn);
    }
    else{
        $response[] = array('status'=>$isLoggedIn);
    }
    echo json_encode($response);
    $isLoggedIn = false;
    exit;
}

?>