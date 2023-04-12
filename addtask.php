<?php

// session_start();

require_once __DIR__.'/boot.php';

$_SESSION['user_login'] = isset($_POST['user_login']) ? $_POST['user_login'] : null." ";
$_SESSION['user_id'] = isset($_POST['user_id']) ? $_POST['user_id'] : null." ";
$_SESSION['auth'] = isset($_POST['auth']) ? $_POST['auth'] : false;
$title =  "Задания";
$user_login = $_SESSION['user_login'];
$user_id = $_SESSION['user_id'];
// print_r($_SESSION);
$_SESSION['user_login'] = isset($_POST['user_login']) ? $_POST['user_login'] : null." ";
$_SESSION['user_id'] = isset($_POST['user_id']) ? $_POST['user_id'] : null." ";
echo "Your login is ".$user_login;
// echo "Your id is ".$_SESSION['user_id'];
echo "is auth = ".$_SESSION['auth'];


if(isset($_SESSION['user_login']))
{
$page_title = "Добро пожаловать, ".$_SESSION['user_login'];
}
else
{
	$page_title = "Вы не авторизованы";
}

$content = file_get_contents("components/form_addtask.php");
if(isset($_POST["task"])) {
$task = $_POST["task"];
if(isset($_POST["task"])) {
$adding_task = pdo()->query("INSERT INTO tasks(user_id, task) VALUES ('$user_id','$task')");
}


header("Location: ".$_SERVER['REQUEST_URI']);
}
$stmt = pdo()->query("select u.user_id, u.login, t.task, t.id from users u, tasks t where (u.user_id = t.user_id)");
while ($row = $stmt->fetch())
{
    $content = $content . 
		'<div class="singletask_block" style = "width: 500px;display:flex;flex-direction:row; margin-left:20px;margin-right:20px; justify-content: space-between; border: 5px solid black; padding: 10px;">
			<p class="singletask_author">'.$row['login'].'</p>
			<p class="singletask_label" style = "width: 200px;">'.$row['task'].'</p>
			<button class="singletask_edit" onclick = "edittask('.$row['id'].')"><img src = "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Black_pencil.svg/600px-Black_pencil.svg.png" style = "width:20px;height:20px;"/></button>
			<button class="singletask_delete" onclick = "deletetask('.$row['id'].')"><img src = "https://cdn-icons-png.flaticon.com/512/542/542724.png" style = "width:20px;height:20px;"/></button>
		</div>';

}
include("components/layout.php");

// 

?>