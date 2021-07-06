<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>VR4U Admin Module</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="styles/index.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'>
        </script>
</head>
<style>
           a{
                font-size:25px;
                
            }
            a:hover {
                color:#4fcaff;
            }
            h1{color: #7adac0;
                font-size: 50px;
            }
        </style>
<body>
    <section id="title">
        <div class="container-fluid">
            <!-- Nav Bar -->

            <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
                <a class="navbar-brand" style=" font-weight: bolder;color: #7adac0 ;">VR4U</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item scroll">
                        <i class='fas'>&#xf015;</i></li><a style="color: #7adac0;" class="nav-link" href="admin.php">Home</a>
                        </li>
                        <li class="nav-item scroll">
                        <i class='fas'>&#xf007;</i></li><a style="color: #7adac0;" class="nav-link" href="customers.php" >Users</a>
                        </li>
                        <li class="nav-item scroll">
                        <i class="fas fa-database"></i></li><a style="color: #7adac0;" class="nav-link" href="dept.php" >Complaints</a>
                        </li>
                        <li class="nav-item scroll">
                        <i class="fas fa-search"></i></li><a style="color: #7adac0;"href="channels.php" class="nav-link"> Govt</a>
                        </li>
                        <li class="nav-item scroll">
                        <i class="fas fa-plus"></i></li><a style="color: #7adac0;" class="nav-link" href="insert.php"> Add</a>
                        </li>
                        <li class="nav-item scroll">
                        <i class="fas fa-minus"></i></li><a style="color: #7adac0;" class="nav-link" href="delete.php"> Delete</a>
                        </li>
                        <li class="nav-item">
                        <i class="fas fa-sign-out-alt"></i></li><a style="color: #7adac0;" class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>


            <!-- Title -->

            <div id="title-row" class="row" style="margin-top: 0px;">
                <div class="col-lg-6">
                    <h1>Admin Module</h1>
                </div>
            </div>
        </div>

    </section>
    <section id="features">
        <div class="row">
            <div class="feature-box col-lg-4">
                <i class="icon fa fa-check-circle fa-4x"></i>
                <h3>Easy to use.</h3>
                <p>So easy to use, as no need to fill big forms.</p>
            </div>
            <div class="feature-box col-lg-4">
                <i class="icon fa fa-bullseye fa-4x" aria-hidden="true"></i>
                <h3>Track</h3>
                <p>Track the status of your complaint.</p>
            </div>
            <div class="feature-box col-lg-4">
                <i class="fa fa-comments icon fa-4x" aria-hidden="true"></i>
                <h3>Chat Box</h3>
                <p>Can even give your complaints as simple as chatting with chat box</p>
            </div>
        </div>
    </section>

    <!--Bootstrap4-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>