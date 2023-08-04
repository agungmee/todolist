<?php

include('../db/db_connect.php');

$id_task = $_POST['id'];
$task_name = $_POST['task_name'];
$task_description = $_POST['task_description'];
$task_status = $_POST['task_status'] == 'on' ? 'Done' : 'Not Yet';

$query = "UPDATE task SET task_name = '$task_name', task_description = '$task_description', status = '$task_status' WHERE id = '$id_task'";

if ($connection->query($query)) {
    header("Location: ../index.php");
} else {
    echo "Post Not Update";
}


?>