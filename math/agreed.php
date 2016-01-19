<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	$idzz = $_REQUEST["HF"];
	include ("bd.php");
	$id_i=$_SESSION['id'];
	$today = date('Y-m-d');
	if(!mysql_query("UPDATE zakaz
		SET status=4
		WHERE id_z=$idzz"));

?>

<html>
<head>
		<link rel="stylesheet" href="web.css" type="text/css">  
 	    <meta charset="ANSI">
        <title>Заказ принят</title>
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
		
		"Заказ принят. Все ваши заказы вы можете посмотреть в <a href="history.php">Истории заказов</a>" <br>
		
		<?php }?>
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

    // Если не пусты, то мы выводим ссылку
    echo "Вы вошли на сайт, как ".$_SESSION['name']."<br>";
    }
    ?>
	<a href="exit.php">Выход</a> <br>
	<a href="index.php">Главная страница</a>
		</div>


<body>
</body>
</html>		