<?php

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
// function getCustNames($mysqli) {
//     $query = "SELECT CompanyName FROM customers;";
//     $query .= "SELECT ContactName FROM customers;";
//     if (!$mysqli->multi_query($query)) {
//         echo "Multi query failed: (" . $mysqli->errno . ") " . $mysqli->error;
//     }
    
//     do {
//         if ($res = $mysqli->store_result()) {
//             var_dump($res->fetch_all(MYSQLI_ASSOC));
//             $res->free();
//         }
//     } while ($mysqli->more_results() && $mysqli->next_result());
// }

?>