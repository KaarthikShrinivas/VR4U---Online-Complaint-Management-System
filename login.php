<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles/style.css">
  <title>VR4U</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="#" method="POST" class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="Usernamel" required>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="Passwordl" required>
          </div>
          <div>
            <input type="radio" name="auth" value="Admin"> Admin <input type="radio" value="GovEmp" name="auth"> Government Employee <input type="radio" name="auth" value="User"> User
          </div>
          <input type="submit" value="Login" class="btn solid" name="SignIn">
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
          <br>
          <a href="index.html">
            <i class="fas fa-home fa-2x"></i> Home
          </a>
        </form>
        <form action="#" class="sign-up-form" method="POST">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="Username" required>
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="Email" required>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="Password" required>
          </div>
          <input type="submit" class="btn" name="SignUp" value="Sign up" />
          <p class="social-text">Or Sign up with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Register and proceed to your services!!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Login and get your required services here!!!!
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
      </div>
    </div>
  </div>
  <?php
  $link =  mysqli_connect("localhost", "root", "", "oosd");
  if (!$link) {
    echo "Couldn't connect database Please check Your Connection.";
  }
  if ($_POST["SignUp"]) {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Email = $_POST['Email'];
    $auth = "User";
    $dep = "NA";
    //Checking if the Username already Exists
    $queryCheckUsername = mysqli_query($link, "select * from allusers where Username = '$Username' limit 1");
    $fetchCheckResult = mysqli_fetch_array($queryCheckUsername);
    if (!empty($fetchCheckResult)) {
      echo "<script>alert('The Username Already Exists');</script>";
      echo '<script>window.location.href="login.php"</script>';
    } else {
      mysqli_query($link, "insert into allusers(Username,Password,Email,Authority,Department) values('$Username','$Password','$Email','$auth','$dep')");
      header("Location: login.php");
      exit();
    }
  }
  if ($_POST["SignIn"]) {
    $Username = $_POST['Usernamel'];
    $Password = $_POST['Passwordl'];
    $autho = $_POST["auth"];
    $queryFirst = mysqli_query($link, "select * from allusers where Username = '$Username'");
    $resultFirst = mysqli_fetch_array($queryFirst);
    $query = mysqli_query($link, "select * from allusers where Username = '$Username' and Password='$Password' and Authority='$autho'");
    $result = mysqli_fetch_array($query);

    if (empty($resultFirst)) {
      echo "<script>alert('Username Doesnot Exists')</script>";
    } elseif ((empty($result)) && (strcmp($resultFirst['Username'], $Username) == 0)) {
      echo "<script>alert('Username and Password Donot Match')</script>";
    } elseif ((strcmp($result['Username'], $Username) == 0) && (strcmp($result['Password'], $Password) == 0) && (strcmp($result['Authority'], $autho) == 0)) {
      session_start();
      $_SESSION['Username'] = $Username;
      $_SESSION['UserId'] = $result['ID'];
      if (strcmp($result['Authority'], "Admin") == 0) {
        header("Location: admin.php");
      } elseif (strcmp($result['Authority'], "GovEmp") == 0) {
        $_SESSION['Dept'] = $result['Department'];
        header("Location: Employee.php");
      } else {
        header("Location: userform.php");
      }
      exit();
    }
  }
  ?>

  <script src="app.js"></script>
</body>

</html>