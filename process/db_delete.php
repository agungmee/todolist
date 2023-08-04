<?php

include('../db/db_connect.php');

$task_id = $_GET['id'];

$query = "DELETE FROM task WHERE id = '$task_id'";

if ($connection->query($query)) {
    header("Location: ../index.php");
} else {
    echo "Can't Delete Data";
}


?>