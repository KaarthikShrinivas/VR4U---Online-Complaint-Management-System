<?php
session_start();
?>
<html>

<head>
    <title>Delete</title>
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
            height: 45%;
            width: 70%;
            padding-top: 20px;
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
            <h1>Remove Existing Employee</h1><br><br>
            <form method="post" action="Delete.php">
                <div class="val">
                    <label>ID:</span></label>
                    <input type="text" name="id" class="search"><br><br>
                </div>
                <div class="val">
                    <label>Username:</span></label>
                    <input type="text" name="usn" class="search"><br><br>
                </div><br>
                <input type="submit" name="submit" value="REMOVE" class="but" id="sub">
            </form>
        </div>
    </center>
    <?php
    if (isset($_POST["submit"])) {
        $id = $_POST['id'];
        $usn = $_POST['usn'];

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
        //if(!empty($_POST['cnum']))
        $f = 0;
        $f1 = 0;

        if (!empty($_POST['id'])) {
            $id = $_POST['id'];
            $f = 1;
        }

        if (!empty($_POST['usn'])) {
            $usn = $_POST['usn'];
            $f1 = 1;
        }
        if ($f == 1 && $f1 == 1)
            $result = mysqli_query($conn, "DELETE from allusers where ID='$id' AND Username='$usn'");
        else if ($f == 1 && $f1 == 0)
            $result = mysqli_query($conn, "DELETE from allusers where ID='$id'");
        else if ($f == 0 && $f1 == 1)
            $result = mysqli_query($conn, "DELETE from allusers where Username='$usn'");
        else if ($f == 0 && $f1 == 0)
            echo "<script>alert('Enter any one entry to delete');<script>";


        //$result=mysqli_query($conn,"DELETE from channels WHERE channel_no='$cn' AND channel_name='$name'");
        if ($result) {
            echo "<script>alert('The Employee records have been deleted');</script>";
        } else
            echo "<script>alert('The Employee ID Or Employee Username does not match');</script>";

        mysqli_close($conn);
    }
    ?>

</body>

</html>