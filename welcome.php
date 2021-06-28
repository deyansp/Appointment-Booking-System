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
    <title>Online Booking Service | Discovery University</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/fav-icon.ico" type="image/x-icon">
</head>

<body>
    <!--Navigation-->
    <nav class="navbar navbar-expand-md navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" alt="home">
                <img src="img/logo.png" id ='logo' href="welcome.php"> Discovery University</a>

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

    <!--Image Slideshow-->
    <div id="slides" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/main-page-banner.jpg" />
                <div class="carousel-caption">
                    <h3>Welcome<?php echo ", " .$_COOKIE["name"]?></h3>
                    <h5>Book an appointment with one of our services below.</h5>
                </div>
            </div>
        </div>
    </div>
    
    <!--Services-->
    <div class= "container-fluid" id="services-section">
        <div class="container">
        <div class="row">
            <div class ="col-12 content-heading">
                <h2 class = "display-4">Our Services</h2>
                <hr class = "my-4">
            </div>
        </div>
        </div>
        <div class = "container" id="services-cards">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="card">
                         <div class="card-body">
                         <a href="service-info-page.html">
                             <img class="card-img-top" src="img/student-support2.jpg">
                            <h5 class="card-title">Student Advisory Service</h5>
                         </a>
                            <p class="card-text">Our Student Advisors are on hand with information and advice about university life. We offer specialist services such as career advisors.</p>
                            <a class="btn btn-success" href="appointment-booking.php">Book Now</a>
                          </div>
                    </div>
                </div>
                
                 <div class="col-md-4 text-center">
                    <div class="card">
                         <div class="card-body">
                         <a href="service-info-page.html">
                             <img class="card-img-top" src="img/financial2.jpg">
                            <h5 class="card-title">Financial Advisory Service</h5>
                         </a>
                            <p class="card-text">If you want to learn about budgeting or you are worried about debt, the Financial Advisory team can offer you specialist advice on all financial matters.</p>
                            <a class="btn btn-success" href="appointment-booking.php">Book Now</a>
                          </div>
                    </div>
                </div>
                
                 <div class="col-md-4 text-center">
                    <div class="card">
                         <div class="card-body">
                         <a href="service-info-page.html">
                             <img class="card-img-top" src="img/disabillity2.jpg">
                            <h5 class="card-title">Disability Support</h5>
                         </a>
                            <p class="card-text">This service provides a range of confidential support for disabled students. This includes students with physical and sensory impairments.</p>
                            <a class="btn btn-success" href="appointment-booking.php">Book Now</a>
                          </div>
                    </div>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4 text-center">
                    <div class="card">
                         <div class="card-body">
                         <a href="service-info-page.html">
                                 <img class="card-img-top" src="img/learning2.jpg">
                                  <h5 class="card-title">Learning Support</h5>
                             </a>
                             <p class="card-text">We offer support and advice to enable students with cognition and learning needs to be fully included and to achieve good outcomes.</p>
                            <a class="btn btn-success" href="appointment-booking.php">Book Now</a>
                          </div>
                    </div>
                </div>
                
                 <div class="col-md-4 text-center">
                    <div class="card">
                         <div class="card-body">
                         <a href="service-info-page.html">
                             <img class="card-img-top" src="img/mental%20health2.jpg">
                            <h5 class="card-title">Mental Health and Welfare</h5>
                         </a>
                            <p class="card-text">Helping you gain understanding and insight into any difficulties you may be experiencing, to develop emotional resilience and put into effect real change.</p>
                            <a class="btn btn-success" href="appointment-booking.php">Book Now</a>
                          </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
     </div>
    </div>
    <div class="container">
            <div class="alert alert-primary text-center" role="alert">
                Note: Apart from the Student Advisory page, service information pages are under construction.
            </div>
    </div>
    
    <!--Footer-->
    <footer>
        <p>© <?php echo date("Y"); ?> Discovery University Dundee</p>
    </footer>
</body>
</html>