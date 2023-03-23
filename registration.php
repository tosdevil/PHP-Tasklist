<?php

$title =  "Регистрация";
$page_title = "Регистрация";
$content = file_get_contents("components/form_reg.php");

require('components/layout.php');
include("boot.php");
if (isset($_POST["login"]) and isset($_POST["password"])){
	$login = $_POST["login"];
	$pas = $_POST["password"];
	echo $login ." ".$pas;
	require_once __DIR__.'/boot.php';
	$stmt = pdo()->query("INSERT INTO users(login, password) VALUES ('$login','$pas')");
}
?>