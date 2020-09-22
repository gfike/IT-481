<?php

// below will display column names in each iteration
// function displayAllTables($user, $mysqli)
// {
//     echo "<b>Username</b>: " . $user . "<br>";
//     // Gather all table names into an array.

//     $query = "SHOW TABLES";

//     $result = $mysqli->query($query);
//     $tables = $result->fetch_all();
//     // Step through the array, only accessing the first element (the table name)
//     // and gather the column names in each table.
//     foreach ($tables as $table) {

//         echo "<h2>" . $table[0] . "</h2>";
//         $rowCount = getRecordCount($mysqli, $table[0]);
//         echo "<b>Number of Records: </b>".$rowCount."<br/>";

//         $query = "DESCRIBE " . $table[0];
//         $result = $mysqli->query($query);

//         $columns = $result->fetch_all();

//         foreach ($columns as $column) {
//             echo $column[0] . "<br />";
//         }
//     }
// }

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

function getCustCount($mysqli) {
    $custCount = "";
      $query = "SELECT DISTINCT COUNT(CustomerID) FROM customers";
  $stmt = $mysqli->prepare($query);
  $stmt->execute();
  $stmt->bind_result($custCount);
  $stmt->fetch();
  $stmt->close();
  return $custCount;
  
  }
  
  function getCustNames($mysqli) {
      $query = "SELECT CompanyName FROM customers ORDER BY CustomerID ASC;";
      $query .= "SELECT ContactName FROM customers ORDER BY CustomerID ASC;";
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
  
  echo "Total number of customers: ".getCustCount($mysqli)."<hr/>";
  
  $names = getCustNames($mysqli);
  
  $companyNames = $names[0];
  $contactNames = $names[1];
  
  echo "Companies:<ol>";
  
  foreach($companyNames as &$name){
      echo "<li>".$name."</li>";
  }
  
  echo "</ol></hr>Contact for Company:<ol>";
  
  foreach($contactNames as &$name){
      echo "<li>".$name."</li>";
  }
  
  echo "</ol>";
  
  $mysqli->close();

?>