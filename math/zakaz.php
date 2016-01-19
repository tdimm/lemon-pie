<?php
    session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
    ?>
<html>
    <head>
		<link rel="stylesheet" href="web.css" type="text/css">  
 	    <meta charset="ANSI">
        <title>Загрузка заказа</title>
    </head>
    <body>
	
        <div class="header"><br>Закажите решение математических задач и живите без проблем</div>

        <div class="central-column">
		
		<?php if ($_SESSION['isp']==1) 
		{
		echo"<br>Увы, страница доступна только заказчикам, вы можете <a href='take.php'>Посмотреть заказы для исполнения</a>"; 
		}
	else
		{  ?>
		
			<form enctype="multipart/form-data" action="upload.php" method="post">
			<input type="hidden" name="MAX_FILE_SIZE" value="30000000">
			Отправить файл: <input name="userfile" type="file">
			<input type="submit" value="Отправить">
			 
			<p>Выберите дату: <input type="date" name="calendar"> <br>
			<p>Выберите тему: <select name="theme">
			<option>Аналитическая геометрия</option>
			<option>Высшая алгебра</option>
			<option>Пределы</option>
			<option>Производные</option>
			<option>Интегралы</option>
			<option>Функции и графики</option>
			<option>ФПН</option>
			<option>Дифференциальные уравнения</option>
			</select></p>
		</form> <?php }?>
		</div>
        <div class="footer"><br>
		<?php
    // Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    // Если пусты, то мы не выводим ссылку
    echo "Вы вошли на сайт, как гость<br><a href='#'>Эта ссылка  доступна только зарегистрированным пользователям</a>";
    }
    else
    {
    echo "Вы вошли на сайт, как ".$_SESSION['name']."<br>";
    }
    ?>
	<a href="exit.php">Выход</a>
	<a href="index.php">Главная</a>
	<a href="per.php">Личная страница</a>
		</div>
    </body>
</html>