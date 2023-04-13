<?php

session_start();

session_destroy();

echo "сессия завершена";

header("Location: index.php");


?>