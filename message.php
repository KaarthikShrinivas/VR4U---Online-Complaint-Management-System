<?php
session_start();
// connecting to database
$conn = mysqli_connect("localhost", "root", "", "oosd") or die("Database Error");

// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);


//checking user query to database query
$ad = "";
$depart = "";
$desr = "";
$gm = $getMesg;
$garray = array();
$garray = explode(" ", $gm);
$f = 0;
$problemarray = array(
    "killing", "murder", "theft", "robbery",
    "health", "mosquito", "drainage", "sewage", "delivery",
    "undelivered", "goods", "courier", "posts", "water", "pole",
    "road", "street light", "streetlight", "electricity",
    "municipal", "postal", "crime", "rape", "molesting", "cheating"
);
$greetings = array("hi", "hello", "hey", "hola");
$cityarray = array("adyar", "kolathur", "tambaram", "mylapore", "chennai", "mumbai", "kolkata", "delhi", "patna", "indore", "jaipur", "hyderabad", "ahmedabad", "velachery", "trichy", "tanjore");
$flag = 0;
for ($j = 0; $j < count($problemarray); $j++) {
    for ($i = 0; $i < count($garray); $i++) {
        if ($garray[$i] == $problemarray[$j]) {
            $flag = 1;
            break;
        }
    }
    if ($flag != 0)
        break;
}

for ($j = 0; $j < count($greetings); $j++) {
    for ($i = 0; $i < count($garray); $i++) {
        if ($garray[$i] == $greetings[$j]) {
            $flag = 2;
            break;
        }
    }
    if ($flag != 0)
        break;
}

for ($j = 0; $j < count($cityarray); $j++) {
    for ($i = 0; $i < count($garray); $i++) {
        if ($garray[$i] == $cityarray[$j]) {
            $flag = 3;
            break;
        }
    }
    if ($flag != 0)
        break;
}

for ($i = 0; $i < count($garray); $i++) {

    $gelement = $garray[$i];
    if ($flag == 1) {
        $check_data = "SELECT replies FROM chatbot WHERE queries like '%$gelement%' and intent=1";
        $getd = "SELECT department FROM chatbot WHERE queries like '%$gelement%' and intent=1";
        $res = mysqli_query($conn, $getd);
        $fetch_d = mysqli_fetch_assoc($res);
        $dep = $fetch_d['department'];
        $_SESSION['dept'] = $dep;
        $sp = " ";
        $_SESSION['subj'] = $gelement . $sp . $garray[$i + 1];
        $_SESSION['des'] = $gm;
    } elseif ($flag == 3) {
        $check_data = "SELECT replies FROM chatbot WHERE queries like '%$gelement%' and intent=2";
        $_SESSION['add'] = $gm;
        $name = $_SESSION['Username'];
        $depart = $_SESSION['dept'];
        $desr = $_SESSION['des'];
        $sub = $_SESSION['subj'];
        $d = date("Y-m-d");
        $ad = $_SESSION['add'];
        $queryString = http_build_query([
            'access_key' => 'dd52cad410e9ea3ff06a2c4c152ef83d',
            'query' => $ad, //Keep the sql query here
            'output' => 'json',
            'limit' => 1,
        ]);

        $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);

        curl_close($ch);

        $apiResult = json_decode($json, true);

        $_SESSION['latitude'] = $apiResult['data'][0]['latitude'];
        $_SESSION['longitude'] = $apiResult['data'][0]['longitude'];
        $lat = $_SESSION['latitude'];
        $long = $_SESSION['longitude'];
        $uid = $_SESSION['UserId'];
        $res = mysqli_query($conn, "INSERT INTO complaints
(Name,Address,Department,Subject,Description,UserId,Latitude,Longitude,Date)
VALUES('$name','$ad','$depart','$sub','$desr','$uid','$lat','$long','$d')");
    } else
        $check_data = "SELECT replies FROM chatbot WHERE queries like '%$gelement%'and intent=0";

    $run_query = mysqli_query($conn, $check_data) or die("Error");

    // if user query matched to database query we'll show the reply otherwise it go to else statement
    if (mysqli_num_rows($run_query) > 0) {
        //fetching replay from the database according to the user query
        $fetch_data = mysqli_fetch_assoc($run_query);
        //storing replay to a varible which we'll send to ajax
        $replay = $fetch_data['replies'];
        $f = 1;
        echo $replay;
    }
    if ($f == 1)
        break;
}

if ($f == 0) {
    echo "Im listening!";
}
