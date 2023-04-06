<?php
require_once __DIR__.'/boot.php';

$title =  "Задания";
$user_login = $_SESSION['user_login'];
echo "Your login is ".$_SESSION['user_login'];
echo "is auth = ".$_SESSION['auth'];
$page_title = "пока что ниче не работает";

$content = file_get_contents("components/form_addtask.php");
if(isset($_POST["task"])) {
$task = $_POST["task"];
if(isset($_POST["task"])) {
$adding_task = pdo()->query("INSERT INTO tasks(user_id, task) VALUES (0,'$task')");
}


header("Location: ".$_SERVER['REQUEST_URI']);
}
$stmt = pdo()->query("SELECT * FROM tasks");
while ($row = $stmt->fetch())
{
    // echo $row["id"];
    $content =  $content . $row['task'] . "<br>";
}
include("components/layout.php");

// 

?>