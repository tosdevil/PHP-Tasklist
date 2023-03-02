<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Веб-разработка</title>
</head>
<body>
    <header class = "dark_back">
        <h2>Разработка веб-приложений</h2>
				<?php
					print "Это вывел php";
					$login = $_POST['login'];
					print "Было введено ". $login;
					$mysqli = new mysqli("localhost", "root", "", "task1");
					if ($mysqli->connect_errno) {
						/* Используйте предпочитаемый вами метод регистрации ошибок */
						print('Ошибка соединения: ' . $mysqli->connect_errno);
					}
					$sql = "INSERT INTO users(login, password) VALUES ('test','test')";
					$result = $mysqli->query($sql);
				?>
    </header>
    <nav>
        <ul>
            <li>
                <a href="index.html">Главная</a>
            </li>
            <li>
                <a href="reg.html">Регистрация</a>
            </li>
            <li>
                <a href="auth.html">Авторизация</a>
            </li>
            <li>
                <a href="hidden_page.html">Скрытая страница</a>
            </li>
        </ul>
    </nav>
    <main class = "top_border">
        <div class="main_flexing">
            <p>Проектикс</p>
        </div>
				<form action = "" method = "post">
						<input type = "text" name = "login">
						<input type = "submit" value = "Отправить">
				</form>
    </main>
    <footer>
       <p>Карпов Тимофей, 2012</p> 
    </footer>
</body>
</html>