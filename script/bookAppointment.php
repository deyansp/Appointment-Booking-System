<?php
require 'dbCred.php';
session_start();
$service = $date = $time = $status = $staff = $info = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    if (empty($_POST["selectedService"]) || empty($_POST["date"]) || empty($_POST["time"])) {
        
        exit("Fields cannot be blank");
    }
    
    else { 
        $service = sanitizeInput($_POST["selectedService"]);
        
        $date = sanitizeInput($_POST["date"]);
        
        $time = sanitizeInput($_POST["time"]);
        
        $info = sanitizeInput($_POST["additionalInfo"]);
        
        $email = $_SESSION['email'];
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            exit("Invalid Email");
        }
        
        $staffArray = array("Tomas Hay", "Samantha Freed", "Steven McKeinleigh");
        // selecting a staff member automatically
        $random = array_rand($staffArray, 1); 
        $staff = $staffArray[$random];

        $status = "Booked";
            
        $statement = $connection->prepare("INSERT INTO discoveryUniAppointments (StudentEmail, AppService, AppDate, AppTime, Staff, AppStatus, MoreInfo) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $statement->bind_param("sssssss", $email, $service, $date, $time, $staff, $status, $info);
        $statement->execute();
            
        $statement->close();
        $connection->close();
        
        header("location: /~1704796/CMP206/bookingSuccess.html");
    }
}
?>