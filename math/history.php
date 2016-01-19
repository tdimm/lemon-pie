<?php
    session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	 include ("bd.php");

    ?>
<html>
    <head>
		<link rel="stylesheet" href="web.css" type="text/css">  
 	    <meta charset="ANSI">
        <title>История заказов</title>
    </head>
    <body>
	
        <div class="header"><br>Закажите решение математических задач и живите без проблем</div>

        <div class="central-column"> 
		
		<?php if ($_SESSION['isp']==1) 
		{
		echo"<br>Увы, страница доступна только заказчикам, вы можете <a href='take.php'>Посмотреть заказы для исполнения</a>"; 
		}
	else
		{ 
		 
			 	$idd = $_SESSION['id'];
				
		     $q = mysql_query("SELECT * FROM `zakaz` WHERE status=4 and id_zak=$idd");
		 ?>
		
    <table>
    <tr>
		<th>Номер заказа</th> 
		<th>Ссылка на решение</th>  
		<th>Тема</th>
		<th>Дата выполнения</th>
    </tr>
	<?php
		$uploaddir = 'C:\wamp\www\math\uploads';
		while($Result = mysql_fetch_assoc($q))
		{
	?>
	<tr>
		<?php
			$uploaddir1 =$uploaddir;
			$uploaddir1.="\\%20";
			$uploaddir1.=$Result["path"];
			$idz=$Result["id_z"];
		?>
		<td align="center">
		<?php
			echo $Result["id_z"]; 
		?>
		</td>
		<td>
		<?php 
			echo "<a href=\"$uploaddir1\">    Посмотреть    </a>"; 
		?>
		</td>
		<td>
		<?php
			echo $Result["tema"];
		?>
		</td>
		<td align="center">
		<?php
			echo $Result["datavoz"];
		?>
		</td>

    </tr>
	<?php
		}
	?>
	</table>
		<?php } ?>
		</div> 
        <div class="footer"><br>
		
		<?php
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    echo "Вы вошли на сайт, как гость<br><a href='#'>Эта ссылка  доступна только зарегистрированным пользователям</a>";
    }
    else
    {
    echo "Вы вошли на сайт, как ".$_SESSION['name']."<br> <a  href='index.php'>Главная страница</a>";
    } 
    ?>
	<br>
	<a href="zakaz.php">Сделать заказ</a>	 <br>
	<a href="exit.php">Выход</a>
		</div>
    </body>
</html>