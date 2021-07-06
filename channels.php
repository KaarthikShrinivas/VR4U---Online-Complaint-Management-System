<?php
session_start();
?>
<html>

<head>
    <title>Government Employees</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            margin: 0px;
        }

        .data-table {
            margin-top: 100px;
            margin-left: 10px;
            border: 1px solid blue;
            color: black;
            padding: 10px;
            border-radius: 10px;
        }

        .data-headrow {
            background-color: blue;
            width: 200px;
            height: 100px;
            text-align: center;
        }

        .data-row {
            background-color: lightblue;
            width: 200px;
            height: 100px;
            padding: 10px;
            text-align: center;
        }

        #search {
            height: 30px;
            width: 250px;
            background-color: lightgoldenrodyellow;
            border: 1px solid darkgray;
            border-radius: 5px;
        }

        button {
            background-color: green;
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
            margin-left: 200px;
            margin-top: 150px;
            height: 45%;
            width: 70%;
            padding-top: 20px;
            text-align: center;
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

    <div id="form">
        <h1>Government Employee Details</h1><br><br>
        <form method="POST" action="channels.php">
            <label style="font-size:23px;">User ID: </label>
            <input type="text" id="search" placeholder="Search..." name="ID">
            <button style="font-size:20px" type="submit" name="search"><i class="fa fa-search" style="color:white"></i></button><br><br>
            <label style="font-size:23px">Department: </label>
            <input type="text" id="search" placeholder="Search..." name="Department">
            <button style="font-size:20px" type="submit" name="search"><i class="fa fa-search" style="color:white"></i></button><br><br><br>
            <input type="submit" value="VIEW ALL" class="but" name="view">
        </form>
    </div>
</body>
<?php

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
/*
if(mysqli_connect_errno()){
    die("connection failed: "
        . mysqli_connect_error()
        . " (" . mysqli_connect_errno()
        . ")");
}
*/
//get results from database
if (isset($_POST['view'])) {
    $result = mysqli_query($conn, "SELECT ID, Username, Password, Email, Authority, Department FROM allusers WHERE Authority != 'User' and  Authority != 'Admin'");

    $all_property = array();  //declare an array for saving property
    //showing property
    echo "<center>";
    echo '<table class="data-table">
        <tr class="data-heading">';  //initialize table tag
    while ($property = mysqli_fetch_field($result)) {
        echo '<td class="data-headrow">' . $property->name . '</td>';  //get field name for header
        array_push($all_property, $property->name);  //save those to array
    }
    echo '</tr>'; //end tr tag

    //showing all data
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        foreach ($all_property as $item) {
            echo '<td class="data-row">' . $row[$item] . '</td>'; //get items using property value
        }
        echo '</tr>';
    }
    echo "</table>";
    echo "</center>";
}
if (isset($_POST['search'])) {
    $f = 0;
    $f1 = 0;
    if (!empty($_POST['ID'])) {
        $cn = $_POST['ID'];
        $f = 1;
    }

    if (!empty($_POST['Department'])) {
        $cname = $_POST['Department'];
        $f1 = 1;
    }
    if ($f == 1 && $f1 == 1)
        $result = mysqli_query($conn, "SELECT ID, Username, Password, Email, Authority, Department FROM allusers where ID='$cn' AND Department='$cname'");
    else if ($f == 1 && $f1 == 0)
        $result = mysqli_query($conn, "SELECT ID, Username, Password, Email, Authority, Department FROM allusers where ID='$cn'");
    else if ($f == 0 && $f1 == 1)
        $result = mysqli_query($conn, "SELECT ID, Username, Password, Email, Authority, Department FROM allusers where Department='$cname'");
    else if ($f == 0 && $f1 == 0)
        echo "<script>alert('Select any one date to search');<script>";
    $all_property = array();  //declare an array for saving property
    //showing property
    if ($result) {
        echo "<center>";
        echo '<table class="data-table">
        <tr class="data-heading">';  //initialize table tag
        while ($property = mysqli_fetch_field($result)) {
            echo '<td class="data-headrow">' . $property->name . '</td>';  //get field name for header
            array_push($all_property, $property->name);  //save those to array
        }
        echo '</tr>'; //end tr tag

        //showing all data
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            foreach ($all_property as $item) {
                if ($item == 'img') {
                    echo '<td class="data-row">' . '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '"</td>';
                } else {
                    echo '<td class="data-row">' . $row[$item] . '</td>'; //get items using property value
                }
            }
            echo '</tr>';
        }
        echo "</table>";
        echo "</center>";
    }
}

?>

</html>