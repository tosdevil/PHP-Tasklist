<?php

$title =  "Задания";
$page_title = "Здесь можно добавить задания";

require_once __DIR__.'/boot.php';
$content = file_get_contents("components/form_addtask.php");

$task = $_POST["task"];
if(isset($_POST["task"])) {
$adding_task = pdo()->query("INSERT INTO tasks(user_id, task) VALUES (0,'$task')");
}

$stmt = pdo()->query("SELECT * FROM tasks");
while ($row = $stmt->fetch())
{
    // echo $row["id"];
    $content =  $content . $row['task'] . "<br>";
}



include("components/layout.php");

?>