<?php

echo "мы готовы работать";

$stmt = pdo()->query("DELETE FROM tasks WHERE `tasks`.`id` = $taskid");
echo 'успешно удалено!';

?>