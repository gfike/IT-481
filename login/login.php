<?php
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
    echo $e->getMessage() . "<br>";
}

displayAllTables($user, $mysqli);

function displayAllTables($user, $mysqli)
{
    echo "<b>Username</b>: " . $user . "<br>";
    // Gather all table names into an array.

    $query = "SHOW TABLES";

    $result = $mysqli->query($query);
    $tables = $result->fetch_all();
    // Step through the array, only accessing the first element (the table name)
    // and gather the column names in each table.
    foreach ($tables as $table) {

        echo "<h2>" . $table[0] . "</h2>";
        $rowCount = getRecordCount($mysqli, $table[0]);
        echo "<b>Number of Records: </b>" . $rowCount . "<br/>";
    }
}

function getRecordCount($mysqli, $tableName)
{
    $row_count = 0;
    if ($result = $mysqli->query("SELECT * FROM " . $tableName)) {

        /* determine number of rows result set */
        $row_count = $result->num_rows;

        /* close result set */
        $result->close();
    }
    return $row_count;
}


$mysqli->close();
