<?php

$serverName = "DESKTOP-FIO8IDL\SQLEXPRESS";

$connectionOptions = array("Database"=>"Northwind");

$conn = sqlsrv_connect( $serverName, $connectionOptions);

if( $conn === false )

die( FormatErrors( sqlsrv_errors() ) );


?>