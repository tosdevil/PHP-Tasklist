<?php

require_once __DIR__.'/boot.php';
$taskid = $_GET['id'];
echo "мы готовы работать";

$stmt = pdo()->query("DELETE FROM tasks WHERE `tasks`.`id` = $taskid");
echo 'успешно удалено!';

header("Location: addtask.php");

?>