<?php 
    require 'connect.php';

    $postdata = file_get_contents('php://input');

    if(isset($postdata) && !empty($postdata)){
        $request = json_decode($postdata);
        //people.Name, people.Address, people.Workplace, phonenumbers.PhoneNumber, 
        //phonenumbers.Label, emails.Email, emails.Label as `emailLabel`
        $sql = "SELECT * FROM people 
        INNER JOIN phonenumbers On people.PeopleId = phonenumbers.PeopleId 
        INNER JOIN emails ON emails.PeopleId = people.PeopleId 
        WHERE people.Name LIKE ?
        Order By people.Name ASC";

        $stmt = $conn->prepare($sql);

        $name = '%'.$request->name.'%';

        $stmt->bind_param("s",$name);
        // s -> string
        // i -> integer
        // d -> decimal
        $stmt->execute();
        
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $values = $result->fetch_all(MYSQLI_ASSOC);
            //print_r($values);
            echo json_encode($values);
        } else{
            echo json_encode(null);
        }
    }
?>