<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	$idzz = $_REQUEST["HF"];
	include ("bd.php");

	$id_i=$_SESSION['id'];
	$today = date('Y-m-d');
	if(!mysql_query("UPDATE zakaz
		SET status=2, id_isp=$id_i, datavz='$today'
		WHERE id_z=$idzz"));
		
	$q = mysql_query("SELECT deadline from zakaz WHERE id_z=$idzz");
	$Result = mysql_fetch_assoc($q);
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
		"Вы приняли вызооов!" <br>
		А точнее, Вы взяли заказ номер <?php echo $idzz ?>, который нужно выполнить до <?php echo $Result["deadline"]?> <br>
		
		Все взятые вами заказы можно посмотреть<a href="mez.php"> здесь</a>
		
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