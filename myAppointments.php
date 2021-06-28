<?php
require 'script/dbCred.php';
session_start();
// preventing unauthorised access
if(!isset($_COOKIE['name']) || !isset($_SESSION['email'])) {
	header("location: index.php");
}
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Appointments | Discovery University</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/service-page.css">
    <link rel="shortcut icon" href="img/fav-icon.ico" type="image/x-icon">
</head>

<body>
    <!--Navigation-->
    <nav class="navbar navbar-expand-md navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" alt="home" href="welcome.php">
                <img src="img/logo.png" id ='logo'> Discovery University</a>

            <button id="button" class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarOverlay">
                <span class="navbar-toggler-icon ml-auto"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarOverlay">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="myAppointments.php">MY APPOINTMENTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="script/logOut.php">LOG OUT</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

	<div class="container content">
        <div class="row">
            <div class ="col-12">
                <h2 class = "display-4" style="margin-top:4rem; font-family: 'Oswald';">Your Booked Appointments</h2>
                <hr class = "my-4">
            </div>
        </div>
    </div>
	<!-- Dynamically generating table with appointments from db-->
<?php
        $email = $_SESSION["email"];


		// fetching user's appointments from db

		$statement = $connection->prepare("SELECT ID, AppService, AppDate, AppTime, Staff, AppStatus, MoreInfo FROM discoveryUniAppointments WHERE StudentEmail = ? AND NOT AppStatus ='Cancelled'");
		$statement->bind_param("s", $email);
		$statement->execute();
		$result = $statement->get_result();

		if ($result->num_rows == 0) {
            echo '<div class="container content">
                    <div class="alert alert-primary" role="alert">
                    You do not have any upcoming appointments!
                    </div></div>';
		}

		else {
			// printing out table and header
            echo "<div class='container'>
                <div class='table-responsive-md'>
                <table class='table table-hover'>
                 <thead class='thead-light'>
                  <tr>";
			// getting the field names from the db
			while ($field = $result->fetch_field()) {
				echo "<th scope='col'>" . $field->name . "</th>";
			}
			// outputting header names for the buttons
			echo "<th scope='col'>Cancel</th>
                    </tr>
                </thead>
                <tbody>";
			// outputting each row
			while($row = $result->fetch_assoc()) {
                echo "<td>" . $row['ID']. "</td>";
				echo "<td>" . $row['AppService']. "</td>";
				echo "<td>" . $row['AppDate']. "</td>";
				echo "<td>" . $row['AppTime']. "</td>";
                echo "<td>" . $row['Staff']. "</td>";
                echo "<td>" . $row['AppStatus']. "</td>";
                echo "<td>" . $row['MoreInfo']. "</td>";
				echo "<td><a class='btn btn-success btn-sm btn-block cancelApp' href='script/cancelAppointment.php?ID=". $row['ID'] ."'>Cancel</a></td>
                          </tr>";
			}
			echo "</tbody>
                    </table>
                </div></div>";
		}
		$statement->close();
		$connection->close();
?>
</body>
</html>