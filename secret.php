<?php

$title =  "Секретная страничка";
$page_title = "Секретная страничка";
$content = 
'
<h2 class = "page_title_style">сан тюажурко ытеркеС</h2>
';

require_once __DIR__.'/boot.php';

if(isset($_SESSION['user_login'])) {

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
    if ($row['isblocked'] != 1) {
    $content =  $content . $row['user_id'] . " | ". $row['login'] . " | " . $row['password'] . " | " . "<a href = 'banuser.php?id=".$row['user_id']."'><p>Заблокировать</p></a>" ." | "."<br>";
    }
    else 
    {
        $content =  $content . $row['user_id'] . " | ". $row['login'] . " | " . $row['password'] . " | " . "<a href = 'unbanuser.php?id=".$row['user_id']."'><p>Разблокировать</p></a>" ." | "."<br>";    
    }

}
}
else
{
    $content = $content."<p>Доступ разрешен только для администратора.</p>";
}
$content = $content . '<a href = "logout.php"><p>Выйти</p></a>';
}
else 
{
    $content = $content."<p>Авторизуйтесь, чтобы увидеть содержимое.</p>";
}
include("components/layout.php");

?>