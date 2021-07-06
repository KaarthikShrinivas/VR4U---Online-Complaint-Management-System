<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VR4U - Governemnt Employee</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/updateEmployee.css">

</head>

<body>
    <section id="title">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">VR4U</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link"><?php ob_start();
                                                session_start();
                                                echo $_SESSION['Username'];
                                                ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Employee.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <section id="Update-Section">
        <div class="update-form">
            <h2>Profile</h2>
            <?php
            $link = mysqli_connect("localhost", "root", "", "oosd");
            if (!$link) {
                echo mysqli_connect_errno();
            }
            $idToUpdate = $_SESSION['UserId'];
            $result = mysqli_query($link, "select * from allusers where ID = '$idToUpdate' limit 1");
            while ($row = mysqli_fetch_array($result)) {
                $currUsername = $row["Username"];
                $currFname = $row["Fname"];
                $currLname = $row["Lname"];
                $currPass  = $row["Password"];
                $currEmail = $row["Email"];
                $currPhone = $row["Phone"];
            }
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="changeUsername"><strong>Username</strong></label>
                    <input type="text" class="form-control" id="changeUsername" name="newUsername" value="<?php echo $currUsername; ?>" required>
                </div>
                <div class="form-group">
                    <label for="changeFirstName"><strong>First Name</strong></label>
                    <input type="text" class="form-control" id="changeFirstName" name="newFirstName" value="<?php echo $currFname; ?>" required>
                </div>
                <div class="form-group">
                    <label for="changeLastName"><strong>Last Name</strong></label>
                    <input type="text" class="form-control" id="changeLastName" name="newLastName" value="<?php echo $currLname; ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"><strong>Email address</strong></label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="newEmail" value="<?php echo $currEmail; ?>" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"><strong>Password</strong></label>
                    <input type="password" class="form-control" name="newPass" id="exampleInputPassword1" value="<?php echo $currPass; ?>" required>
                </div>
                <div class="form-group">
                    <label for="PhoneNumber"><strong>Phone Number</strong></label>
                    <input type="text" class="form-control" name="PhoneNumber" id="PhoneNumber" value="<?php echo $currPhone; ?>" required>
                </div>
                <button type="submit" name="updateSubmit" class="btn btn-primary">Update</button>
            </form>
            <?php


            if (isset($_POST["updateSubmit"])) {
                $newUsername = $_POST["newUsername"];
                $newEmail = $_POST["newEmail"];
                $newPassword = $_POST["newPass"];
                $newPhone = $_POST["PhoneNumber"];
                $newFname = $_POST["newFirstName"];
                $newLname = $_POST["newLastName"];
                mysqli_query($link, "UPDATE allusers SET Username='$newUsername',Password='$newPassword',Email='$newEmail',Phone='$newPhone',Fname='$newFname',Lname='$newLname' where ID='$idToUpdate'");
                header('Location: UpdateProfileEmployee.php');
                exit;
            }
            ob_end_flush();
            ?>
        </div>
    </section>
    <!--Bootstrap4-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>