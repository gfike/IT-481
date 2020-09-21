<?php

// "localhost:8889"

$server = $_POST["server"];
$db = $_POST["db"];
$user = $_POST["user"];
$pwd = $_POST["pwd"];
try {
$mysqli = new mysqli($server, $user, $pwd, $db);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
// echo $mysqli->host_info . "\n";

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
} catch (Exception $e) {
    echo $e->getMessage()."\n";
}
 echo "Welcome!";

// header("Location: ../tableSelector/tableSelector.html");

?>