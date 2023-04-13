<?php

$title =  "Секретная страничка";
$page_title = "Секретная страничка";
$content = 
'
<h2 class = "page_title_style">сан тюажурко ытеркеС</h2>
';

require_once __DIR__.'/boot.php';

if($_SESSION['user_login'] == 'admin')
{

$stmt = pdo()->query("SELECT * FROM users");
$content = 
'
<h2 class = "page_title_style">сан тюажурко ытеркеС</h2>
';
while ($row = $stmt->fetch())
{
    // echo $row["id"];
    $content =  $content . $row['user_id'] . " | ". $row['login'] . " | " . $row['password'] . " | " . "<a href = 'banuser.php?".$row['user_id']."><p>Заблокировать</p></a>'"." | "."<br>";
}
}
else
{
    $content = $content."<p>Доступ разрешен только для администратора.</p>";
}
include("components/layout.php");

?>