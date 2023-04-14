<?php
// include("boot.php");

require_once __DIR__.'/boot.php';

$title =  "Авторизация";
$page_title = "Авторизация";
$content = file_get_contents("components/form_auth.php");

if (isset($_SESSION['user_login']))
{
	$content = "<p>Вы уже авторизовались, ".$_SESSION['user_login']."!</p>";
	$content = $content . '<a href = "logout.php"><p>Выйти</p></a>';
}
else if (isset($_POST["login"]) and isset($_POST["password"])){
	
	$login = $_POST["login"];
	$pas = $_POST["password"];
	// echo $login ." ".$pas;

	$zapros = pdo()->query("SELECT * FROM `users` WHERE (login, password) = ('$login','$pas')");
	$isblocked = $zapros -> fetch();
	if ($isblocked['isblocked'] == 1)
	{
		$content = $content.'<p>Эта учетная запись заблокирована.</p>';
	}
	else if ($zapros -> RowCount() == 1) 
	{
		echo 'Авторизация успешна!';
		$_SESSION['auth'] = true;

		

		$id_get = pdo() -> query("SELECT user_id FROM users WHERE (login, password) = ('$login','$pas')");

		while ($row = $id_get->fetch())
		{
			$_SESSION['user_id'] = $row['user_id'];
		}
		// $_SESSION['user_id'] = $id_get['user_id'];

		$_SESSION['user_login'] = "$login";
		$_SESSION['randommsg'] = "как же круто";
		// echo $_SESSION['randommsg'];
		// echo $_SESSION['user_login'];
		// echo $_SESSION['user_id'];

		// print_r($_SESSION);
		header("Location: ".$_SERVER['REQUEST_URI']);
	}
	else 
	{
		// $stmt = pdo()->query("INSERT INTO users(login, password) VALUES ('$login','$pas')");
		$content = $content.'<p>Неверный логин или пароль.</p>';
	}
	
}
include('components/layout.php');
?>