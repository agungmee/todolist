<?php

include('../db/db_connect.php');

$task = $_POST['task_name'];
$desc = $_POST['task_description'];
$deadline = $_POST['task_deadline'];

$query = "INSERT INTO task (task_name, task_description, task_deadline) VALUE ('$task', '$desc','$deadline')";

if ($connection->query($query)) {
    header("Location: ../index.php");
} else {
    echo "Cant Insert Data, please check";
}

?>