<?php 
    session_start();
    // preventing unauthorised access
    if(!isset($_COOKIE['name']) || !isset($_SESSION['email'])) {
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book An Appointment | Discovery University</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/appointment-booking.css">
    <link rel="shortcut icon" href="img/fav-icon.ico" type="image/x-icon">
</head>
  
<body>
    <!--Navigation-->
    <nav class="navbar navbar-expand-md navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="welcome.php" alt="home">
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
    
    <div class="jumbotron jumbotron-fluid">
         <div class="container">
            <h1 class="display-4 jumbotron-top">Appointment Booking</h1>
         </div>
    </div>
    
    <div class="container forms">
    <form method="post" action="script/bookAppointment.php">
     <div class="form-group">
        
        <label for="selectService">Service</label>
        <select class="form-control" name="selectedService" required>
          <option value="Student Advisory">Student Advisory</option>
          <option value="Financial Advisory">Financial Advisory</option>
          <option value="Disabillity Support">Disabillity Support</option>
          <option value="Learning Support">Learning Support</option>
          <option value="Mental Health">Mental Health and Welfare</option>
        </select>
    </div>
        
        <div class="form-group">
            <label for="date-picker">Date</label>
                <input type="date" class="form-control" name="date" required>
         </div>
        
        <div class="form-group">
            <label for="time-picker">Time</label>
                <input type="time" class="form-control" name="time" required>
         </div>
        
        <div class="form-group">
            <label for="additional-info">Additional Information (optional)</label>
            <textarea rows="3" cols="3" class="form-control" name="additionalInfo" placeholder="Add any details that may help us understand your needs better. (255 characters max)" maxlength="255"></textarea>
         </div>
        <div class="alert alert-primary" role="alert">
            Note: You will automatically be allocated a member of staff for your appointment.
        </div>
        <button id="submitBtn" type="submit" class="btn btn-default btn-success">Submit</button>
    </form>
    </div>
    <!--Footer-->
    <footer>
        <p>© <?php echo date("Y"); ?> Discovery University Dundee</p>
    </footer>
</body>
</html>