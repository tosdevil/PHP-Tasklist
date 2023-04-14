<?php

require_once __DIR__.'/boot.php';
$editedtask = $_POST['editedtask'];
$taskid = $_GET['id'];

$stmt = pdo()->query("UPDATE `tasks` SET `task` = '$editedtask' WHERE `tasks`.`id` = '$taskid'");

header("Location: addtask.php");


?>