<?php
session_start();
?>
<html>

<head>
    <title>Users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>

    </script>
    <style>
        * {
            margin: 0px;
        }

        #search {
            height: 30px;
            width: 250px;
            background-color: lightgoldenrodyellow;
            border: 1px solid darkgray;
            border-radius: 5px;
            font-family: 'Roboto', sans-serif;
        }

        button {
            background-color: green;
            font-family: 'Roboto', sans-serif;
            border-radius: 50%;
            border: 1px solid transparent;
            height: 35px;
            width: 35px;
            border-radius: 10px;
        }

        ::placeholder {
            color: black;
        }

        #form {
            font-family: 'Roboto', sans-serif;
            background-color: #7adac0;
            height: 45%;
            width: 70%;
            padding-top: 20px;
            border-radius: 10px;
        }

        .but {
            background-color: red;
            color: white;
            border: none;
            height: 40px;
            width: 20%;
            border-radius: 10px;
        }

        table {
            width: 45%;
            height: 50px;
            font-size: 22px;
        }

        th,
        td {
            padding: 5px;
            text-align: center;
        }

        body {
            background: #210070;
        }

        table

        /*, th ,td*/
            {
            border: 1px solid black;
        }

        th {
            background-color: #210070;
            color: white;
        }

        tr {
            background-color: #d4d4d4
        }
    </style>
</head>

<body>
    <br><br>
    <center>
        <div id="form">
            <h1>User Details</h1><br><br>
            <form method="POST">
                <label style="font-size:23px;">Username: </label>
                <input type="text" id="search" placeholder="Search..." name="usn">
                <button style="font-size:20px" type="submit" name="sub1"><i class="fa fa-search" style="color:white"></i></button><br><br>
                <label style="font-size:23px">Email ID: </label>
                <input type="email" id="search" placeholder="Search..." name="email">
                <button style="font-size:20px" type="submit" name="sub2"><i class="fa fa-search" style="color:white"></i></button><br><br><br>
                <input type="submit" value="VIEW ALL" class="but" name="sub3">
            </form>
        </div>
        <?php
        if (isset($_POST["sub3"])) {
            $db = mysqli_connect("localhost", "root", "", "oosd");
            if ($db) {
                $sql = "SELECT ID, Username, Email, Authority FROM allusers WHERE Authority='user'";
                $result = mysqli_query($db, $sql);
                $rowcount = mysqli_num_rows($result);
                if ($rowcount) {
                    echo "<br><br><table border='1' style='border-collapse:collapse'>";
                    echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Authority</th></tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['Username'] . "</td><td>" . $row['Email'] . "</td><td>" . $row['Authority'] . "</td></tr>";
                    }
                    echo "</table>";
                }
            }
        } else if (isset($_POST["sub2"])) {
            $db = mysqli_connect("localhost", "root", "", "oosd");
            if ($db) {
                $email = $_POST['email'];
                $sql = "SELECT ID, Username, Email, Authority FROM allusers where Email='$email' LIMIT 1";
                if ($row = mysqli_fetch_row(mysqli_query($db, $sql))) {
                    echo "<br><br><table border='1' style='border-collapse:collapse'>";
                    echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Authority</th></tr>";
                    echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td></tr>";
                }
            }
        } else if (isset($_POST["sub1"])) {
            $db = mysqli_connect("localhost", "root", "", "oosd");
            if ($db) {
                $usn = $_POST['usn'];
                $sql = "SELECT ID, Username, Email, Authority FROM allusers where Username='$usn'";
                if ($row = mysqli_fetch_row(mysqli_query($db, $sql))) {
                    echo "<br><br><table border='1' style='border-collapse:collapse'>";
                    echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Authority</th></tr>";
                    echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td></tr>";
                }
            }
        }
        ?>
    </center>
</body>

</html>