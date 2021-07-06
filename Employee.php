<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VR4U - Governemnt Employee</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <style>
        html {
            scroll-behavior: smooth;
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

        #map {
            height: 500px;
            width: 100%;
        }

        #Complaint-section {
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

        function initMap() {
            var numlocations = <?php
                                $DEPT = $_SESSION['Dept'];
                                $locationRes = mysqli_query($link, "SELECT Latitude,Longitude from complaints where Department = '$DEPT' and Status<>'Finshed'");
                                echo mysqli_num_rows($locationRes); ?>;
            var locations = [];
            <?php
            while ($row = mysqli_fetch_array($locationRes)) {
            ?>
                locations.push({
                    lat: <?php echo $row["Latitude"]; ?>,
                    lng: <?php echo $row["Longitude"]; ?>
                });
            <?php
            }
            ?>
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 8,
                center: {
                    lat: 13.0827,
                    lng: 80.2707
                }
            });
            const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            // Add some markers to the map.
            // Note: The code uses the JavaScript Array.prototype.map() method to
            // create an array of markers based on a given "locations" array.
            // The map() method here has nothing to do with the Google Maps API.
            const markers = locations.map((location, i) => {
                return new google.maps.Marker({
                    position: location,
                    label: labels[i % labels.length],
                });
            });
            // Add a marker clusterer to manage the markers.
            new MarkerClusterer(map, markers, {
                imagePath: "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
            });
        }
    </script>
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
                            <a class="nav-link" href="UpdateProfileEmployee.php"><?php

                                                                                    echo $_SESSION['Username'];
                                                                                    ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Map-section">Map</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Complaint-section">Complaints</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <section id="map-section">
        <div id="map"></div>
    </section>


    <section id="Complaint-section">
        <h3>Complaints</h3>

        <?php

        $resultComplaints = mysqli_query($link, "SELECT * from complaints WHERE Department = '$DEPT'");
        if ($resultComplaints) {
            if (mysqli_num_rows($resultComplaints) > 0) {

        ?>
                <table class="table" id="Complaints-table">
                    <thead>
                        <th scope="col">Complaint ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Status</th>
                        <th scope="col">Info</th>
                        <th scope="col">Update</th>
                    </thead>
                <?php

                while ($row = mysqli_fetch_array($resultComplaints)) {
                    $idForDisplay = $row['ID'];
                    echo ('<tr>');
                    echo ('<td scope="row">' . $row['ID'] . "</td>");
                    echo ("<td>" . $row['Name'] . "</td>");
                    echo ("<td>" . $row['Subject'] . "</td>");
                    echo ("<td>" . $row['Status'] . "</td>");
                    echo ('<td id="' . $idForDisplay . '" onclick="infoDisplay(this.id)"><i style="font-size: 20px;" class="fa fa-info-circle"></i></td>');
                    echo ('<td id="update' . $idForDisplay . '" onclick="updateDisplay(this.id)"><i style="font-size: 20px;" class="fa fa-pencil-square" aria-hidden="true"></i></td>');
                    echo ('</tr>');
                    echo ('<div id="mod' . $idForDisplay . '" class="modal">
                        <div class="modal-content" id="modal-contentFully">
                          <span class="close">&times;</span>
                          <br>
                          <div>
                            <h3>Complaint DETAILS</h3>
                            <br>
                            <p><strong>Complaint ID: </strong>' . $row["ID"] . '</p>
                            <p><strong>Name: </strong>' . $row["Name"] . '</p>
                            <p><strong>Subject: </strong>' . $row["Subject"] . '</p>
                            <p><strong>Description: </strong>' . $row["Description"] . '</p>
                            <p><strong>Responsible Department: </strong>' . $row["Department"] . ' </p>
                            <p><strong>Address: </strong>' . $row["Address"] . ' </p>
                            <p><strong>Status: </strong>' . $row["Status"] . '</p>
                          </div>
                        </div>
                      </div>');
                    echo ('<div id="upupdate' . $idForDisplay . '" class="modal">
                      <div class="modal-content" id="modal-contentF">
                      <span class="close">&times;</span>
                      <br>
                        <div>
                        <h3>Update Status of Complaint</h3>
                        <form action="" method="POST">
                        <select name="newstatus" class="form-control" required>
                            <option value="Pending">Pending</option>
                            <option value="Resolving">Resolving</option>
                            <option value="Finshed">Finshed</option>
                        </select>
                        <br>
                        <button name="sub' . $idForDisplay . '" type="submit" class="btn btn-primary mb-2">Update</button>
                        </form>
                        </div>
                      </div>
                      </div>');
                    if (isset($_POST['sub' . $idForDisplay . ''])) {
                        $newStat = $_POST['newstatus'];
                        mysqli_query($link, "UPDATE complaints SET Status='$newStat' WHERE ID='$idForDisplay'");
                        header('Location: Employee.php');
                        exit;
                    }
                }
            }
        } else {
                ?>
                <h3>No Complaints</h3>
            <?php
        }
        ob_end_flush();
            ?>

                </table>
    </section>
    <!--Bootstrap4-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKKC2pDqIpw_U9CkIcMfCwHL8C7SnhEd0
    &callback=initMap&libraries=&v=weekly" async></script>
</body>

</html>