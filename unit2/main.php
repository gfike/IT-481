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
    $query = "SELECT DISTINCT COUNT(CustomerID) FROM customers";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($custCount);
$stmt->fetch();
$stmt->close();
return $custCount;

}

function getCustNames($mysqli) {
    $query = "SELECT CompanyName FROM customers;";
    $query .= "SELECT ContactName FROM customers;";
    $names = [];
if ($mysqli -> multi_query($query)) {
  do {
    // Store first result set
    $temp = [];
    if ($result = $mysqli -> store_result()) {
      while ($row = $result -> fetch_row()) {
        // printf("%s\n", $row[0]);
        array_push($temp, $row[0]);
      }
     $result -> free_result();
     array_push($names, $temp);
    }
  } while ($mysqli -> next_result());
}
return $names;
}

echo "Total number of customers: ".getCustCount($mysqli);

$names = getCustNames($mysqli);

// echo var_dump($names[1]);

$mysqli->close();
?>