<!DOCTYPE html>
<html lang="en">

<?php
$servername = "localhost"; // Replace with your server name
$username = 'Xhaka'; // Replace with your MySQL username
$password = '123456'; // Replace with your MySQL password
$dbname = 'wheelsnation'; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}


// Fetch records from the "cars" table
$sql = "SELECT * FROM event ";
$result = $conn->query($sql);


?>
<head>
    <title>WheelsNation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">Wheels<span>Nation</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>  

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="main.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                    <li class="nav-item">
                        <a href="events.php" class="nav-link">Events</a>
                    </li>
                    <li class="nav-item"><a href="car.php" class="nav-link">Cars</a></li>
                    <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>

                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link">LOG OUT</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/headlight-light-Nissan-GTR.png');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Events <i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Upcoming Events</h1>
                    <p><a href="create-event.php" class="btn btn-primary">Post Event </a></p>

                </div>
            </div>
        </div>
    </section>

    <section class="shows-events-tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="tabs">
                        <div class="col-lg-12">
                            <div class="heading-tabs">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <ul>
                                          <li><a href='#tabs-1'>Upcoming</a></li>
                                         <!-- <li><a href='#tabs-2'>Past</a></a></li>  --> 
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                          <div class="main-dark-button">
                                              <a href="ticket-details.html">Purchase Tickets</a>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <section class='tabs-content'>
                                <article id='tabs-1'>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="heading"><h2>Upcoming</h2></div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="sidebar">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="heading-sidebar">
                                                            <h4>Latest News:</h4>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-lg-12">
                                                        <div class="month">
                                                            <h6>Month</h6>
                                                           
                                                            <ul>
                                                                <li><a href="#">September</a></li>
                                                                <li><a href="#">October</a></li>
                                                                <li><a href="#">November</a></li>
                                                                <li><a href="#">December</a></li>
                                                            </ul>
                                                        </div>
                                                    </div> -->
                                                   
                                                    <div class="col-lg-12">
                                                        <div class="venues">
                                                            <h6> Event Category</h6>
                                                            <ul>
                                                            <?php
                                                            $displayedCategories = array();

                                                            foreach ($result as $category) :
                                                            
                                                             // Check if the venue has already been displayed
                                                             if (!in_array($category['event_category'], $displayedCategories)) {
                                                            ?>
                                                                <li><a href="#"><?php echo $category['event_category'];?></a></li>
                                                                <!-- <li><a href="#">Two Rivers Mall Athi River</a></li> -->
                                                                <!-- <li><a href="#">Kiambu</a></li> -->
                                                                <?php 
                                                            // Add the venue to the array to mark it as displayed
                                                            $displayedCategories[] = $category['event_category'];
                                                        }
                                                    endforeach; ?>
                                                    </ul>
                                                        </div>
                                                    </div>



                                                    <div class="col-lg-12">
                                                        <div class="venues">
                                                            <h6>Venues</h6>
                                                            <ul>
                                                            <?php
                                                            $displayedVenues = array();

                                                            foreach ($result as $venue) :
                                                            
                                                             // Check if the venue has already been displayed
                                                             if (!in_array($venue['event_venue'], $displayedVenues)) {
                                                            ?>
                                                                <li><a href="#"><?php echo $venue['event_venue'];?></a></li>
                                                                <!-- <li><a href="#">Two Rivers Mall Athi River</a></li> -->
                                                                <!-- <li><a href="#">Kiambu</a></li> -->
                                                                <?php 
                                                            // Add the venue to the array to mark it as displayed
                                                            $displayedVenues[] = $venue['event_venue'];
                                                        }
                                                    endforeach; ?>
                                                    </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <?php foreach ($result as $item) : ?>
                                                <div class="col-lg-12">
                                                    <div class="event-item">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="left-content">
                                                                    <h4><?php echo $item['event_title'];?></h4>
                                                                    <p><?php echo $item['description'];?>

                                                
                            
                                                                    </p><div class="main-dark-button"><a href="event-details.php">Discover More</a></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="thumb ">
                                                                    <img src="./database/event-images/<?php echo $item['image'];?>" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="right-content">
                                                                    <ul>
                                                                        <li>
                                                                            <i class="fa fa-clock-o "></i>
                                                                            <h6><?php 
                                                                            // Assuming $item['date'] contains a valid date string
                                                                            $dateString = $item['date'];
                                                                            // Convert the date string to a DateTime object
                                                                            $date = new DateTime($dateString);
                                                                            // Format the date as 'M-d-Y' (e.g., Sept-05-2023)
                                                                            $formattedDate = $date->format("M-d-l");
                                                                            // Output the formatted date
                                                                            echo $formattedDate;
                                                                            
                                                                            ?>
                                                                            <br><?php
                                                                            // Assuming $item['start_time'] contains a valid time string
                                                                            $start_time = $item['start_time'];
                                                                            $end_time = $item['finish_time'];

                                                                            // Convert the time string to a timestamp and then format it
                                                                            $formatted_start_time = date("g:i A", strtotime($start_time));
                                                                            $formatted_end_time = date("g:i A", strtotime($end_time));

                                                                            // Output the formatted start time
                                                                            echo $formatted_start_time . '-' . $formatted_end_time ;
                                                                            ?></h6>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-map-marker"></i>
                                                                            <span><?php echo $item['event_venue'];?></span>
                                                                        </li>
                                                                        <!-- <li>
                                                                            <i class="fa fa-users"></i>
                                                                            <span>540 Total Guests Attending</span>
                                                                        </li> -->
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>
                                                
                                                
                                                <div class="col-lg-12">
                                                    <!-- <div class="pagination">
                                                        <ul>
                                                            <li class="active"><span>1</span></li>
                                                            <li><a href="nexteventpage.html">2</a></li>
                                                            
                                                            <li><a href="nexteventpage.html">Next</a></li>
                                                            
                                                        </ul>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>    
                            </section>
                        </div>
                    </div>
                </div>
            </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>CrazeConnect</span></a></h2>
                        <p>Your gateway to the world of car culture and events.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Explore</h2>
                        <ul class="list-unstyled">
                            <li><a href="about.html" class="py-2 d-block">About</a></li>
                            <li>
                                <a href="events.html" class="py-2 d-block">Events</a>
                            </li>
                            <li><a href="#" class="py-2 d-block">Terms and Conditions</a></li>
                            <li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Support</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">FAQ</a></li>
                            <li><a href="#" class="py-2 d-block">Payment Options</a></li>
                            <li><a href="#" class="py-2 d-block">How It Works</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Contact</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">Nairobi, Kenya</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+1 123 4567 8901</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@crazecarconnect.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        <!-- Copyright notice -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This website is made by WheelsNation</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
        
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
