<?php 
    require 'connect.php';

    /* `people.Name, people.Address, people.Workplace, 
    phonenumbers.PhoneNumber, phonenumbers.Label, emails.Email, 
    emails.Label as `emailLabel*/
    $sql = "SELECT *
    FROM people 
    INNER JOIN phonenumbers On people.PeopleId = phonenumbers.PeopleId 
    INNER JOIN emails ON emails.PeopleId = people.PeopleId 
    Order By people.Name ASC";

    $result = $conn->query($sql);


    if($result->num_rows > 0){
        $values = $result->fetch_all(MYSQLI_ASSOC);
        //print_r($values);
        echo json_encode($values);
    } else{
        echo json_encode(null);
    }

?>