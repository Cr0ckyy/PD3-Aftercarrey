<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "aftercare";

// Open a new connection to the MySQL server
$conn = new mysqli($host, $username, $password, $db)
or die("Mysql could not be connected to." . mysqli_error($conn));

// Open a new connection to the MySQL server
$link = mysqli_connect($host, $username, $password, $db);

if (!$link) {
    // Terminates execution of the script.
    // Shutdown functions and object destructors will always be executed even if exit is called.
    // And returns a string description of the last error
    die(mysqli_error($link));
}