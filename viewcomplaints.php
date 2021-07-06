<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Complaints</title>
    <link rel="stylesheet" href="styles/index.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        .searchcol {
            margin-top: 100px;
            margin-left: 300px;
        }

        .btn {
            margin-left: 100px;
            padding: 10px;
            background-color: #0c2326;
            font-weight: bolder;
            color: white;
            border-radius: 10px;
            border: 1px solid;
            transition: transform .2s;
        }

        .btn:hover {
            cursor: pointer;
            background: #4fcaff;
            color: #000;
            transform: scale(1.25);
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        #NoTasks {
            margin: 20px;
        }

        #Job-section {
            width: 90%;
            margin: 10px auto;
        }
    </style>
    <?php
    ob_start(); ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function infoDisplay(compID) {
            document.getElementById("mod" + compID).style.display = "block";
            let modal = document.getElementById("mod" + compID);
            modal.style.display = "block";
            let span = document.getElementsByClassName("close")[0];
            span.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }

        function updateDisplay(comID) {
            document.getElementById("up" + comID).style.display = "block";
            let modal = document.getElementById("up" + comID);
            modal.style.display = "block";
            let span = document.getElementsByClassName("close")[1];
            span.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }
        <?php
        session_start();
        $link =  mysqli_connect("localhost", "root", "", "oosd");
        if (!$link) {
            echo "Couldn't connect database Please check Your Connection.";
        } ?>
    </script>
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
                            <a style="color: #7adac0;" class="nav-link" href="userform.php">Departments</a>
                        </li>
                        <li class="nav-item scroll">
                            <a style="color: #7adac0;" class="nav-link" href="userform.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #7adac0;" class="nav-link" href="userform.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>

    <form method="post" action="viewcomplaints.php">
        <div class="searchcol">
            <button name="view" class="btn">View All complaints</button>
            <label>From date: </label>&nbsp;
            <input type="date" name="fdate">&nbsp;
            <label>To date: </label>&nbsp;
            <input type="date" name="tdate">&nbsp;&nbsp;
            <button name="search" class="btn">Search complaints</button>
        </div>
    </form>

    <section id="Job-section">
        <h3>Complaints</h3>
        <hr>
        <?php
        $uid = $_SESSION["UserId"];
        if (isset($_POST['view'])) {
            $resultComplaints = mysqli_query($link, "SELECT * from complaints where UserId=$uid ");
        } else if (isset($_POST['search'])) {
            $td = $_POST['tdate'];
            $fd = $_POST['fdate'];
            $resultComplaints = mysqli_query($link, "SELECT * from complaints where UserId=$uid and Date>='$fd' and Date<='$td'");
        }
        if (isset($_POST['view']) || isset($_POST['search'])) {
            if ($resultComplaints) {
                if (mysqli_num_rows($resultComplaints) > 0) {

        ?>
                    <table class="table" id="Complaints-table">
                        <thead>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Department</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>




                        </thead>
                    <?php

                    while ($row = mysqli_fetch_array($resultComplaints)) {
                        $idForDisplay = $row['ID'];
                        echo ('<tr>');
                        echo ('<td scope="row">' . $row['ID'] . "</td>");
                        echo ("<td>" . $row['Name'] . "</td>");
                        echo ("<td>" . $row['Address'] . "</td>");
                        echo ("<td>" . $row['Department'] . "</td>");
                        echo ("<td>" . $row['Subject'] . "</td>");
                        echo ("<td>" . $row['Description'] . "</td>");
                        echo ("<td>" . $row['Status'] . "</td>");
                        echo ("<td>" . $row['Date'] . "</td>");

                        echo ('<td id="' . $idForDisplay . '" onclick="infoDisplay(this.id)"><i style="font-size: 20px;" class="fa fa-info-circle"></i></td>');
                        echo ('</tr>');
                        echo ('<div id="mod' . $idForDisplay . '" class="modal">
                        <div class="modal-content" id="modal-contentFully">
                          <span class="close">&times;</span>
                          <br>
                          <div>
                            <h3>Complaint DETAILS</h3>
                            <br>
                            <p><strong>Comlaint ID: </strong>' . $row["ID"] . '</p>
                            <p><strong>Complaint filed date: </strong>' . $row["Date"] . '</p>
                            <p><strong>Subject</strong>' . $row["Subject"] . '</p>
                            <p><strong>Department</strong>' . $row["Department"] . '</p>
                            <p><strong>Description</strong>' . $row["Description"] . '</p>
                            <p><strong>Status: </strong>' . $row["Status"] . '</p>
                          </div>
                        </div>
                      </div>');
                    }
                }
            } else {
                    ?>
                    <h3>No Complaints filed</h3>
            <?php
            }
            ob_end_flush();
        }
            ?>

                    </table>
    </section>
    <!--Bootstrap4-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>