<?php
session_start();
$host    = "localhost";
$user    = "root";
$pass    = "";
$db_name = "oosd";

//create connection
$conn = mysqli_connect($host, $user, $pass, $db_name);
$uname = $_SESSION['Username']; //session variable
$uid = $_SESSION['UserId'];

echo "the username is" . $uname . " ";
$res = mysqli_query($conn, "SELECT Email from allusers where Username='$uname'");
if (mysqli_num_rows($res) > 0) {
    $r = mysqli_fetch_assoc($res);
    $t = $r["Email"];

    $sql = "SELECT * from allusers where Email='$t'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result);
}
if (!$conn) {
    die("Connection failed :" . mysqli_connect_error());
}

if (isset($_POST['save'])) {
    $n1 = $_POST['fname'];
    $n2 = $_POST['lname'];
    $un = $_POST['uname'];
    $em = $_POST['email'];
    $p = $_POST['pass'];
    $ph = $_POST['phone'];
    $sq = "UPDATE allusers set Fname='$n1',Lname='$n2',Email='$em', Phone='$ph' WHERE Username='$un'";
    $res = mysqli_query($conn, $sq);
    if ($res) {
        echo "<script>alert('Your details have been updated');</script>";
    } else {
        echo "<script>alert('sorry try again');</script>";
    }
}
mysqli_close($conn);
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

    <link rel="stylesheet" href="styles/profile.css">
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
                                <a class="dropdown-item" style="color: #7adac0 ;" href="#">View Profile</a>
                                <a class="dropdown-item" style="color: #7adac0 ;" href="#">Edit Profile</a>

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

    <section id="profileinfo">
        <h2 class="profile_title">User profile
        </h2>
        <div class="profile">
            <form method="post" action="profile.php">
                <input type="hidden" name="uid" class="input-box" value="<?php echo $row['id']; ?>">
                Your Name:&nbsp;
                <input type="text" name="fname" size="10" class="input-box" value="<?php echo $row['Fname']; ?>" pattern="[A-Za-z]+">
                <input type="text" name="lname" size="10" class="input-box" value="<?php echo $row['Lname']; ?>" pattern="[A-Za-z]+"><br><br>
                Username:&nbsp;&nbsp;&nbsp;
                <input type="text" name="uname" class="input-box" value="<?php echo $row['Username']; ?>" readonly><br><br>
                Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="email" name="email" class="input-box" value="<?php echo $row['Email']; ?>"><br><br>
                Password: &nbsp;&nbsp;&nbsp;
                <input type="password" name="pass" class="input-box" oninput="show()" onblur="hide()" value="<?php echo $row['Password']; ?>" id="pa" pattern="(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^A-Za-z0-9]).{8,15}"><br><br>
                <b id="passd">The Password must contain
                    <ul>
                        <li>8-15 Characters</li>
                        <li>Atleast one Uppercase and Lowercase Character</li>
                        <li>Atleast one Number and one Special Character</li>
                    </ul>
                </b>
                Phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="tel" name="phone" class="input-box" value="<?php echo $row['Phone']; ?>" pattern="[0-9]{10}"><br><br>
                <br>
                <button class="btn" name="save"> Update Details </button><br>
            </form>

            <script>
                var y = document.getElementById('passd');

                function show() {
                    var x = document.getElementById('pa').value;
                    if (x.length)
                        y.style.display = 'block';
                }

                function hide() {
                    y.style.display = "none";
                }
            </script>
    </section>
</body>

</html>