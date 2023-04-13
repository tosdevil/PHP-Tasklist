<?php

require_once __DIR__.'/boot.php';
$userid = $_GET['id'];
echo "мы готовы работать";

$stmt = pdo()->query("UPDATE `users` SET `isblocked` = '1' WHERE `users`.`user_id` = $userid");
;
echo 'пользователь забанен!';

header("Location: secret.php");

?>