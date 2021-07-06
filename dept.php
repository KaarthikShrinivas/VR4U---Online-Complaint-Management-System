<?php
session_start();
?>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Complaints</title>
    <style>
        * {
            margin: 0px;
        }

        .search {
            height: 30px;
            width: 250px;
            background-color: lightgoldenrodyellow;
            border: 1px solid darkgray;
            border-radius: 5px;
        }

        ::placeholder {
            color: black;
        }

        #form {
            font-family: 'Roboto', sans-serif;
            background-color: #7adac0;
            height: 40%;
            width: 40%;
            margin-top: 6%;
            padding-top: 40px;
            border-radius: 10px;
        }

        .val label {
            font-size: 23px;
            display: inline-block;
            text-align: right;
            width: 190px;
        }

        .but {
            background-color: red;
            color: white;
            border: none;
            height: 40px;
            width: 18%;
            margin-left: 20px;
            border-radius: 10px;
        }

        .but2 {
            background-color: blue;
            color: white;
            border: none;
            height: 40px;
            width: 18%;
            margin-left: 20px;
            border-radius: 10px;
        }

        #sub {
            background-color: green;
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
    <script>

    </script>
</head>

<body>
    <br><br>
    <center>
        <div id="form">
            <h1>View Complaints/Update Department</h1><br><br>
            <!-- enctype="multipart/form-data needed for file upload-->
            <form method="post" action="dept.php" enctype="multipart/form-data">
                <div class="val">
                    <label>Complaint ID: <span style="color:red">* </span></label>
                    <input type="number" class="search" name="id" min="0"><br><br>
                </div>
                <div class="val">
                    <label>Department: <span style="color:red">* </span></label>
                    <input type="text" class="search" name="dept" min="0"><br><br>
                </div>
                <br>
                <input type="submit" value="VIEW ALL" name="view" class="but2" id="view">
                <input type="submit" value="UPDATE" name="submit" class="but" id="sub">
                <input type="reset" value="CLEAR" class="but">
            </form>

        </div>
    </center>
    <?php
    if (isset($_POST["submit"])) {
        $id = $_POST['id'];
        $dept = $_POST['dept'];

        $host    = "localhost";
        $user    = "root";
        $pass    = "";
        $db_name = "oosd";

        //create connection
        $conn = mysqli_connect($host, $user, $pass, $db_name);
        //test if connection failed
        if (!$conn) {
            die("Connection failed :" . mysqli_connect_error());
        }
        $result = mysqli_query($conn, "UPDATE complaints SET Department = '$dept' WHERE ID = '$id'");

        mysqli_close($conn);
    }
    if (isset($_POST["view"])) {
        $host    = "localhost";
        $user    = "root";
        $pass    = "";
        $db_name = "oosd";

        //create connection
        $db = mysqli_connect($host, $user, $pass, $db_name);
        if ($db) {
            $sql = "SELECT * from complaints";
            $x = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_array($x)) {
                echo "<center>";
                echo "<br><br><table border='1' style='border-collapse:collapse'>";
                echo "<tr><th>ID</th><th>Name</th><th>Address</th><th>Department</th><th>Subject</th><th>Description</th><th>UserID</th><th>Status</th><th>Latitude</th><th>Longitude</th><th>Date</th></tr>";
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td><td>" . $row[7] . "</td><td>" . $row[8] . "</td><td>" . $row[9] . "</td><td>" . $row[10] . "</td></tr>";
                echo "</center>";
            }
        }
    }
    ?>
</body>

</html>