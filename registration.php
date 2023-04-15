<?php

$title =  "Регистрация";
$page_title = "Регистрация";
$content = file_get_contents("components/form_reg.php");


include("boot.php");
if (isset($_SESSION['user_login']))
{
	$content = "<p>Вы уже зарегистрировались, ".$_SESSION['user_login']."!</p>";
	$content = $content . '<a href = "logout.php"><p>Выйти</p></a>';
}
if (isset($_POST["login"]) and isset($_POST["password"])){
	$login = $_POST["login"];
	$pas = $_POST["password"];
	// echo $login ." ".$pas;
	require_once __DIR__.'/boot.php';

	$zapros = pdo()->query("SELECT * FROM `users` WHERE login = '$login'");
	if ($zapros -> RowCount() > 0) 
	{
		$content = $content . '<p>Этот логин уже занят, попробуйте использовать другой</p>';
	}
	else 
	{
		$stmt = pdo()->query("INSERT INTO users(login, password) VALUES ('$login','$pas')");
		echo 'Успешная регистрация!';
		header("Location: authorize.php");
	}
	
}

require('components/layout.php');
?>