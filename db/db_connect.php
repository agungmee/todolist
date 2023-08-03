<?php

$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "todolist";

$connection = mysqli_connect($host, $dbuser, $dbpass, $dbname);

if ($connection) {
    echo "";
} else {
    echo "Not Connect to Database". mysqli_connect_error();
}

?>