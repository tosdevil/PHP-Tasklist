<?php

$title =  "Главная";
$page_title = "Главная";
$content = "Привет, это крутой сайт";

require_once __DIR__.'/boot.php';
$stmt = pdo()->query("SELECT * FROM tasks");
$content = file_get_contents("components/form_addtask.php");
while ($row = $stmt->fetch())
{
    // echo $row["id"];
    $content =  $content . $row['task'] . "<br>";
}


$task = $_POST["task"];
if(isset($_POST["task"])) {
$adding_task = pdo()->query("INSERT INTO tasks(user_id, task) VALUES (2,'$task')");
}

include("components/layout.php");
?>
