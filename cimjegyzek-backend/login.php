<?php

$userId = "admin";
$pwd = "admin";
$isLoggedIn = false;

$postdata = file_get_contents('php://input');
if(isset($postdata) && !empty($postdata)){
    $request = json_decode($postdata);
    if($request){}
}

?>