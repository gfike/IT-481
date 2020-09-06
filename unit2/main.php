<?php

$serverName = "(local)\sqlexpress";  
$connectionOptions = array("Database"=>"Northwind");
$conn = sqlsrv_connect( $serverName, $connectionOptions);

if( $conn === false )

die( FormatErrors( sqlsrv_errors() ) );

$params = array(&$_POST['query']);

$tsql = "SELECT TOP 10 TerritoryID

         FROM dbo.Territories";

$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

$getProducts = sqlsrv_query($conn, $tsql, $params, $options);

if ($getProducts === false)

        die( FormatErrors( sqlsrv_errors() ) );

echo var_dump($getProducts);

?>