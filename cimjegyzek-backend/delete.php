<?php
require "connect.php";
$postdata = file_get_contents('php://input');
if(isset($postdata) && !empty($postdata)){
    $request = json_decode($postdata);
    
    $sql = "DELETE FROM `people` WHERE people.PeopleId = ?";
    $stmt = $conn->prepare($sql);


    $id = $request->PeopleId;

    $stmt->bind_param("d",$id);
    $stmt->execute();

    $emailsql = "DELETE FROM `emails` WHERE emails.PeopleId = ?";
    $emailstmt = $conn->prepare($emailsql);
    $emailstmt->bind_param("d", $id);
    $emailstmt->execute();

    $phonesql = "DELETE FROM `phonenumbers` WHERE phonenumbers.PeopleId = ?";
    $phonestmt = $conn->prepare($phonesql);
    $phonestmt->bind_param("d", $id);
    $phonestmt->execute();

}