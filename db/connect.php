<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "marksheet";

$con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

if(!$con) {
    die("Error: Could not connect " .mysqli_connect_error());
}

