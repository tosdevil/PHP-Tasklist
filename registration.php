<?php

$title =  "Регистрация";
$page_title = "Регистрация";
$content = file_get_contents("components/form_reg.php");

require('components/layout.php');
include("boot.php");
if (isset($_POST["login"]) and isset($_POST["password"])){
	$login = $_POST["login"];
	$pas = $_POST["password"];
	// echo $login ." ".$pas;
	require_once __DIR__.'/boot.php';

	$zapros = pdo()->query("SELECT * FROM `users` WHERE login = '$login'");
	if ($zapros -> RowCount() > 0) 
	{
		echo 'Этот логин уже занят, попробуйте использовать другой';
	}
	else 
	{
		$stmt = pdo()->query("INSERT INTO users(login, password) VALUES ('$login','$pas')");
		echo 'Успешная регистрация!';
		header("Location: authorize.php");
	}
	
}
?>