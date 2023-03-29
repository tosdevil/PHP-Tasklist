<?php

$title =  "Авторизация";
$page_title = "Авторизация";
$content = file_get_contents("components/form_auth.php");

require('components/layout.php');

include("boot.php");
if (isset($_POST["login"]) and isset($_POST["password"])){
	$login = $_POST["login"];
	$pas = $_POST["password"];
	// echo $login ." ".$pas;
	require_once __DIR__.'/boot.php';

	$zapros = pdo()->query("SELECT * FROM `users` WHERE (login, password) = ('$login','$pas')");
	if ($zapros -> RowCount() == 1) 
	{
		echo 'Авторизация успешна!';
		$_SESSION['auth'] = true;
		$id_get = pdo() -> query("SELECT id FROM users WHERE (login, password) = ('$login','$pas')");
		$_SESSION['user_id'] = $id_get;
	}
	else 
	{
		// $stmt = pdo()->query("INSERT INTO users(login, password) VALUES ('$login','$pas')");
		echo 'Неверный логин или пароль.';
	}
}

?>