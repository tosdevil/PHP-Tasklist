<?php

require_once __DIR__.'/boot.php';
$userid = $_GET['id'];
echo "мы готовы работать";

$stmt = pdo()->query("UPDATE `users` SET `isblocked` = '0' WHERE `users`.`user_id` = $userid");
;
echo 'пользователь разбанен!';

header("Location: secret.php");

?>