<?php

// session_start();

require_once __DIR__.'/boot.php';

// $_SESSION['user_login'] = isset($_POST['user_login']) ? $_POST['user_login'] : null." ";
// $_SESSION['user_id'] = isset($_POST['user_id']) ? $_POST['user_id'] : null." ";
// $_SESSION['auth'] = isset($_POST['auth']) ? $_POST['auth'] : false;

$title =  "Задания";

// echo "Your login is ".$user_login;
// echo "Your id is ".$_SESSION['user_id'];
// echo "is auth = ".$_SESSION['auth'];

// $zapross = pdo()->query("SELECT * FROM 'users' where user_id = $_SESSION['user_id']");
// $isblocked = $zaprosss->fetch();
// if ($isblocked['isblocked'] == 1)
// {
// 	$content = 'Эта учетная запись заблокирована.';
// }



if(isset($_SESSION['user_login']))
{
	$user_login = $_SESSION['user_login'];
	$user_id = $_SESSION['user_id'];
	// print_r($_SESSION);
	$page_title = "Список дел ".$_SESSION['user_login'];

	$zapross = pdo()->query("SELECT * FROM users where user_id = $user_id");
	$isblocked = $zapross->fetch();
	if ($isblocked['isblocked'] == 1)
	{
		$content = '<p>Ваша учетная запись была заблокирована.</p>';
		$content = $content . '<a href = "logout.php"><p>Выйти</p></a>';
	}
	else
	{
		$content = file_get_contents("components/form_addtask.php");
	

	



if(isset($_POST["task"])) {
$task = $_POST["task"];
if(isset($_POST["task"])) {
$adding_task = pdo()->query("INSERT INTO tasks(user_id, task) VALUES ('$user_id','$task')");
}


header("Location: ".$_SERVER['REQUEST_URI']);
}

if ($user_login != 'admin') { 
$stmt = pdo()->query("select u.user_id, u.login, t.task, t.id from users u, tasks t where (u.user_id = t.user_id) and u.user_id = $user_id");
}
else {
$stmt = pdo()->query("select u.user_id, u.login, t.task, t.id from users u, tasks t where (u.user_id = t.user_id)");	
}
while ($row = $stmt->fetch())
{
    $content = $content . 
		'<div class="singletask_block" style = "width: 500px;display:flex;flex-direction:row; margin-left:20px;margin-right:20px; justify-content: space-between; border: 5px solid black; padding: 10px;">
			<p class="singletask_author">'.$row['login'].'</p>
			<p class="singletask_label" style = "width: 200px;">'.$row['task'].'</p>
			<button class="singletask_edit" onclick = "edittask('.$row['id'].')"><img src = "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Black_pencil.svg/600px-Black_pencil.svg.png" style = "width:20px;height:20px;"/></button>
			<a href = "deletetask.php?id='.$row['id'].'"><button class="singletask_delete"><img src = "https://cdn-icons-png.flaticon.com/512/542/542724.png" style = "width:20px;height:20px;"/></button></a>
		</div>';

}
$content = $content . '<a href = "logout.php"><p>Выйти</p></a>';
}
}

else
{
	$page_title = "Список дел";
	$content = "<p>Авторизируйтесь, чтобы увидеть содержимое.</p>";
}
include("components/layout.php");

// 

?>