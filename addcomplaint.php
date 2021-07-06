<?php
session_start();
$host    = "localhost";
$user    = "root";
$pass    = "";
$db_name = "oosd";
$name = $_SESSION["Username"];

$uid = $_SESSION["UserId"];
$conn = mysqli_connect($host, $user, $pass, $db_name);
if (isset($_POST["submit"])) {
    $cname = $_POST["name"];
    $dep = $_POST["gridRadios"];
    $sub = $_POST["subject"];
    $des = $_POST["description"];
    $add = $_POST["address"];
    $cdate = $_POST["date"];
    $queryString = http_build_query([
        'access_key' => 'dd52cad410e9ea3ff06a2c4c152ef83d',
        'query' => $add, //Keep the sql query here
        'output' => 'json',
        'limit' => 1,
    ]);

    $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $json = curl_exec($ch);

    curl_close($ch);

    $apiResult = json_decode($json, true);

    $lat = $apiResult['data'][0]['latitude'];
    $long = $apiResult['data'][0]['longitude'];

    $res = mysqli_query($conn, "INSERT INTO complaints
(Name,Address,Department,Subject,Description,UserId,Latitude,Longitude,Date)
VALUES('$cname','$add','$dep','$sub','$des','$uid','$lat','$long','$cdate')");
    echo '<script language="javascript">alert("complaint successfully registered");</script>';
    echo '<script>window.location.href="userform.php";</script>';
}
