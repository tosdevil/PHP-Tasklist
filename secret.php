<?php

$title =  "Секретная страничка";
$page_title = "Секретная страничка";
$content = 
'
<h2 class = "page_title_style">сан тюажурко ытеркеС</h2>
';

require_once __DIR__.'/boot.php';
$stmt = pdo()->query("SELECT * FROM users");
$content = 
'
<h2 class = "page_title_style">сан тюажурко ытеркеС</h2>
';
while ($row = $stmt->fetch())
{
    // echo $row["id"];
    $content =  $content . $row['user_id'] . " | ". $row['login'] . " | " . $row['password'] . "<br>";
}
include("components/layout.php");

?>