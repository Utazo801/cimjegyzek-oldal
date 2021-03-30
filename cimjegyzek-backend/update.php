<?php

require "connect.php";

$postdata = file_get_contents('php://input');
if(isset($postdata) && !empty($postdata)){
    $request = json_decode($postdata);
    
    $sql = "UPDATE `people` SET `Name`=?,`Workplace`=?,`Address`=? WHERE people.PeopleID = ?";
    $stmt = $conn->prepare($sql);

    $personId = $request->PeopleId;

    $name = $request->Name;
    $address = $request->Address;
    $workplace = $request->Workplace;
    $stmt->bind_param("sssd",$name,$workplace,$address,$personId);
    $stmt->execute();


    $emailsql = "UPDATE `emails` SET `Email`=?,`EmailLabel`=? WHERE emails.PeopleID = ?";
    $emailstmt = $conn->prepare($emailsql);

    $email = $request->Email;
    $emailLabel = $request->EmailLabel;
    $emailstmt->bind_param("ssd",$email,$emailLabel,$personId);
    $emailstmt->execute();

    $phonesql = "UPDATE `phonenumbers` SET `PhoneNumber`=? ,`Label`=? WHERE phonenumbers.PeopleId = ?";
    $phonestmt = $conn->prepare($phonesql);

    $phoneNumber = $request->PhoneNumber;
    $label = $request->Label;
    $phonestmt->bind_param("ssd",$phoneNumber, $label, $personId);
    $phonestmt->execute();
}