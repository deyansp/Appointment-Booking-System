<?php
require 'dbCred.php';
session_start();
// preventing unauthorised access
if(!isset($_COOKIE['name']) || !isset($_SESSION['email'])) {
    header("location: index.php");
}

if (isset($_GET['ID'])) {
    
    $id = sanitizeInput($_GET["ID"]);

        $statement = $connection->prepare("UPDATE discoveryUniAppointments SET AppStatus = 'Cancelled' WHERE ID=?"); 
        $statement->bind_param("s", $id);
        $statement->execute();
        $statement->close();
        $connection->close();

        header("location: /~1704796/CMP206/myAppointments.php");
}

else {
    echo "<p>Unable to complete query!</p>";
}
?>