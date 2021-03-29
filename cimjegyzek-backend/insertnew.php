<?php 
    require 'connect.php';

    $postdata = file_get_contents('php://input');

    if(isset($postdata) && !empty($postdata)){
        $request = json_decode($postdata);
        //people.Name, people.Address, people.Workplace, phonenumbers.PhoneNumber, 
        //phonenumbers.Label, emails.Email, emails.Label as `emailLabel`
        $sql = "INSERT INTO `people`(`Name`, `Workplace`, `Address`) VALUES (?,?,?)";

        $stmt = $conn->prepare($sql);

        $name = '%'.$request->Name.'%';
        $address = '%'.$request->Address.'%';
        $workplace = '%'.$request->Workplace.'%';

        $stmt->bind_param("sss",$Name,$address,$workplace);

        $stmt->execute();
        $personId = $conn->insert_id;

        $Personresult = $stmt->get_result();
        echo "Person: ".json_encode($Personresult);
        echo " Person Id: ".$personId;

        if($Personresult->num_rows > 0){
            $emailsql = "INSERT INTO `emails`(`Email`, `EmailLabel`, `PeopleId`) VALUES (?,?,?)";
            $emailstmt = $conn->prepare($emailsql);

            $email = '%'.$request->Email.'%';
            $emailLabel = '%'.$request->EmailLabel.'%';

            $emailstmt->bind_param("sss",$email,$emailLabel,$personId);
            $emailstmt->execute();
            $emailResult = $emailstmt->get_result();


            $phonesql = "INSERT INTO `phonenumbers`(`PhoneNumber`, `Label`, `PeopleId`) VALUES (?,?, ?)";
            $phonestmt = $conn->prepare($phonesql);

            $phoneNumber = '%'.$request->PhoneNumber.'%';
            $label = '%'.$request->Label.'%';

            $phonestmt->bind_param("sss",$phonesql, $label, $personId);
            $phonestmt->execute();
            $phoneResult = $phonestmt->get_result();
            echo "Email: ".json_encode($emailResult);
            echo "Phone:".json_encode($phoneResult);

            
        }
    }

?>