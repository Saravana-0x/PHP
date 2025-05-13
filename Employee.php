<?php

    //connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "php_employee_management";

    //Create Connection
    $connection = new mysqli($servername, $username, $password, $database);

    //Check connection stablished or not!
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }



    $name = "";
    $email = "";
    $phone = "";
    $address = "";

    $errorMessage = "";
    $successMessage = "";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        //echo "DDD";
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];


        do {
            # code...
            if(empty($name) || empty($email) || empty($phone) || empty($address)){
                $errorMessage = "All the fields are required";
                break;
                //echo $errorMessage;
            }
    
            //add new employee into database

            $sql = "INSERT INTO employee (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query : " . $connection->error);
                break;
            }
    
            $name = "";
            $email = "";
            $phone = "";
            $address = "";
    
            $successMessage = "";
    
            $successMessage = "Employee Added Successfully!";

            header("location: ./index.php");
            exit;


        } while (false);

        
    }else{
        //echo "ELse";
    }

?>
