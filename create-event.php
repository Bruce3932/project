<!DOCTYPE html>
<html lang="en">

<?php
error_reporting(E_ALL);

$msg = "";

if (isset($_POST['upload'])) {
    $title = $_POST['Title'];
    $venue = $_POST['Venue'];
    $category = $_POST['Category'];
    $description = $_POST['description'];
    $date = $_POST['Date'];
    $start =$_POST['start_time'];
    $end = $_POST['finish_time'];

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./database/event-images/" . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        $db = mysqli_connect("localhost", "root", "", "wheelsnation");
        if ($db) {
            // Use prepared statements to prevent SQL injection
            $sql = "INSERT INTO event (event_title, event_venue,event_category, image, start_time, finish_time, date, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssss", $title, $venue,$category, $filename,$start,$end, $date, $description);

            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Uploaded successfully");</script>';
                header('Location: events.php');
            } else {
                echo '<h3>Failed to insert data into the database</h3>';
            }

            mysqli_stmt_close($stmt);
            mysqli_close($db);
        } else {
            echo '<h3>Failed to connect to the database</h3>';
        }
    } else {
        echo '<h3>Failed to upload image</h3>';
    }
}
?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    
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


    <div class="col-md-8 block-9 mb-md-5">
        <form action="" class="bg-light p-5 contact-form" method="POST"  enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Event Title" id="Title" name="Title">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Event  Venue" id="Venue" name="Venue">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Event  Category" id="Category" name="Category">
            </div>

            <div class="form-group">
                <input type="date" class="form-control" placeholder="Event Date" id="Date" name="Date">
            </div>

            <div class="form-group">
            <input type="time" placeholder="Time" id="start_time" name="start_time">
            </div>

            <div class="form-group">
            <input type="time" placeholder="Time" id="finish_time" name="finish_time">
            </div>
          
            <div class="form-group">
				      <input class="form-control" type="file" name="uploadfile" value="" />
			</div>
            
            <div class="form-group">
                <textarea name="description" cols="30" rows="7" class="form-control" placeholder="Description" id="description" ></textarea>
            </div>
            <div class="form-group">
                <input name="upload" type="submit" value="CREATE" class="btn btn-primary py-3 px-5" >
            </div>
            <div><a href="events.php">BACK</a></div>
        </form>

    </div>


   
  </body>
</html>
