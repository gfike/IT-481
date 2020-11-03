<?php
$user = $_POST["user"];
$pwd = $_POST["pwd"];

$validUsers = file("valid-usernames.txt", FILE_IGNORE_NEW_LINES);

// echo gettype($validUsers);

if (key_exists($user, $validUsers) && !isDefaultPwd($pwd)) {
    displayAllTables($user, $mysqli);
}

if (!key_exists($user, $validUsers) || isDefaultPwd($pwd)) {
    echo "Invalid login credentials. Speak with admin for more details.";
}

try {
    $mysqli = new mysqli("localhost:3307", $user, $pwd, "northwind");
    if ($mysqli->connect_errno) {
        // echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

        // $plaintext = $mysqli->connect_errno;
        // $cipher = "aes-128-gcm";
        // $key = 123456;
        // if (in_array($cipher, openssl_get_cipher_methods())) {
        //     $ivlen = openssl_cipher_iv_length($cipher);
        //     $iv = openssl_random_pseudo_bytes($ivlen);
        //     $ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options = 0, $iv, $tag);
        //     $file = fopen("data.txt", 'w');
        //     fwrite($file, $ciphertext);
        //     fclose($file);
        // }
    }
    if (mysqli_connect_errno()) {
        exit();
    }
} catch (Exception $e) {
    // $file = fopen("data.txt", 'w');
    // fwrite($file, $e->getMessage());
    // fclose($file);
}

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

function isDefaultPwd($pwd)
{
    if ($pwd == "password") {
        return true;
    }

    return false;
}


$mysqli->close();
