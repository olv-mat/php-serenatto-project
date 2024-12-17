<?php

function createConnection(): PDO
{
    $databasePath = "mysql:host=localhost;dbname=serenatto";
    $databaseUser = "root";
    $databasePassword = "PFeC248QUGYB89?";

    $conn = new PDO($databasePath, $databaseUser, $databasePassword);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $conn;
}
