<?php
$mysqli = new mysqli("localhost:8889", "northwind", "password", "northwind");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
// echo $mysqli->host_info . "\n";

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

function getCustCount($mysqli) {
    $query = "SELECT COUNT(CustomerID) FROM customers";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($custCount);
$stmt->fetch();

return $custCount;

}

echo "Total number of customers: ".getCustCount($mysqli);

$mysqli->close();
?>