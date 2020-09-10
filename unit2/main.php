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
$stmt->close();
return $custCount;

}

// below is good for binding one array of reults to a variable
// function getCustNames($mysqli) {
//     $query = "SELECT CompanyName, ContactName FROM customers";
//     $stmt = $mysqli->prepare($query);
//     if (!$stmt->execute()) {
//         echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
//    }
   
//    if (!($res = $stmt->get_result())) {
//        echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
//    }
   
//    echo var_dump($res->fetch_all());
// }

// below runs multi query but puts it all into one variable
function getCustNames($mysqli) {
    $query = "SELECT CompanyName FROM customers;";
    $query .= "SELECT ContactName FROM customers;";
    if (!$mysqli->multi_query($query)) {
        echo "Multi query failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    
    do {
        if ($res = $mysqli->store_result()) {
            var_dump($res->fetch_all(MYSQLI_ASSOC));
            $res->free();
        }
    } while ($mysqli->more_results() && $mysqli->next_result());
}


//TODO https://www.w3schools.com/php/func_mysqli_multi_query.asp

// echo "Total number of customers: ".getCustCount($mysqli);
getCustNames($mysqli);

$mysqli->close();
?>