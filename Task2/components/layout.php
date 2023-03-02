<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title><?=$title?></title>
</head>
<body>
	<header>	
		<h1><?=$page_title?></h1>
	</header>
	<nav>
    <ul>
      <li>
        <a href="index.php">Главная</a>
      </li>
      <li>
        <a href="registration.php">Регистрация</a>
      </li>
      <li>
      	<a href="authorize.php">Авторизация</a>
      </li>
      <li>
        <a href="secret.php">Скрытая страница</a>
      </li>
    </ul>
  </nav>
	<main>
		<?=$content?>
	</main>
	<script src = "js/script.js"></script>
</body>
</html>