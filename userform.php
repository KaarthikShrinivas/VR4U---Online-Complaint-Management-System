<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VR4U</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/index.css">
  <link rel="stylesheet" href="styles/userform.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
  <section id="title">
    <div class="container-fluid">
      <!-- Nav Bar -->
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <a class="navbar-brand" style=" font-weight: bolder;color: #7adac0 ;">VR4U</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="color: #7adac0 ;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                My Profile
              </a>

              <div class="dropdown-menu" style="background-color: aliceblue; border-radius: 10px;box-shadow: 5px;" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" style="color: #7adac0 ;" href="profile.php">View Profile</a>
                <a class="dropdown-item" style="color: #7adac0 ;" href="profile.php">Edit Profile</a>

              </div>
            </li>
            <li class="nav-item scroll">
              <a style="color: #7adac0;" class="nav-link" href="userform.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="color: #7adac0 ;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                My Complaints
              </a>

              <div class="dropdown-menu" style="background-color: aliceblue; border-radius: 10px;box-shadow: 5px;" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" style="color: #7adac0 ;" href="viewcomplaints.php">View Complaints</a>
                <a class="dropdown-item" style="color: #7adac0 ;" href="viewcomplaints.php">Check Status of complaints</a>
              </div>
            </li>
            <li class="nav-item scroll">
              <a style="color: #7adac0;" class="nav-link" href="#testimonials">Departments</a>
            </li>
            <li class="nav-item scroll">
              <a style="color: #7adac0;" class="nav-link" href="#footer">Contact Us</a>
            </li>
            <li class="nav-item">
              <a style="color: #7adac0;" class="nav-link" href="index.html">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </section>
  <!--Bootstrap4-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <section id="cform">
    <form method="post" action="addcomplaint.php">
      <div class="form-title">
        <h3>Complaint Registration Form</h3><br><br>
      </div>
      <div class="form-group row">
        <label for="fname" class="col-sm-2 col-form-label">Your Name</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="name" placeholder="Your Name" required>
        </div>
      </div>
      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0">Department</legend>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Police" required>
              <label class="form-check-label" for="gridRadios1">
                Police Department
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="Municipal" required>
              <label class="form-check-label" for="gridRadios2">
                Muncipal Department
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="Postal" required>
              <label class="form-check-label" for="gridRadios3">
                Postal Department
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios4" value="Electricity" required>
              <label class="form-check-label" for="gridRadios4">
                Electricity Department
              </label>
            </div>
          </div>
        </div>
      </fieldset>
      <div class="form-group row">
        <label for="subject" class="col-sm-2 col-form-label">Subject</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="subject" placeholder="Subject" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-7">
          <textarea class="form-control" name="description" placeholder="Description" required></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="address" placeholder="Address" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="datecomplaint" class="col-sm-2 col-form-label">Date</label>
        <div class="col-sm-5">
          <input type="date" class="form-control" name="date" placeholder="Select date" required>
        </div>
      </div>
      <br>
      <div class="form-group row">
        <input type="submit" class="btn btn-primary" id="submit" name="submit">
      </div>
    </form>
    <!--chatbox--ui-->
    <input type="checkbox" id="check"> <label class="chat-btn" for="check"><a href="bot.php"><i class="fa fa-commenting-o comment"></i> <i class="fa fa-close close"></i></a> </label>

  </section>
  <section id="testimonials">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row">
            <div class="card col-lg-4 col-md-4" style="width: 18rem;">
              <img class="card-img-top" src="images/police.jpg" style="height:100%; width: fill-container;" alt="Police">
              <div class="card-body">
                <h5 class="card-title">Police Department</h5>
                <p class="card-text">You can raise you complaint that are concerned with police
                  department. Some of the common complaints are regarding
                  theft, missing reports, murder, etc. </p>
              </div>
            </div>
            <div class="card col-lg-4 col-md-4" style="width: 18rem;">
              <img class="card-img-top" src="images/electrician.jfif" style="height:100%; width: fill-container;" alt="Electrician">
              <div class="card-body">
                <h5 class="card-title">Electricity Deparmtent</h5>
                <p class="card-text">You can raise you complaint that are concerned with Electric
                  department. Some of the common complaints are regarding
                  electricity disruption, transformer repair ,etc..</p>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            <div class="card col-lg-4 col-md-4" style="width: 18rem;">
              <img class="card-img-top" src="images/post.jpg" style="height:100%; width: fill-container;" alt="Post box">
              <div class="card-body">
                <h5 class="card-title">Postal Department</h5>
                <p class="card-text">You can raise you complaint that are concerned with postal
                  department. Some of the common complaints are regarding
                  missing letter/courier, wrong parcel, etc. </p>
              </div>
            </div>
            <div class="card col-lg-4 col-md-4" style="width: 18rem;">
              <img class="card-img-top" src="images/municipal.jfif" style="height:100%; width: fill-container;" alt="Municiplaity">
              <div class="card-body">
                <h5 class="card-title">Municipal Deparmtent</h5>
                <p class="card-text">You can raise you complaint that are concerned with police
                  department. Some of the common complaints are regarding
                  road maintainance ,street light maintaince ,drainage problems ,etc..</p>
              </div>
            </div>
          </div>
        </div>

      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>
</body>