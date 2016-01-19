<?php
    session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	include ("bd.php");

    ?>
<html>
    <head>
		<link rel="stylesheet" href="web.css" type="text/css">  
 	    <meta charset="ANSI">
        <title>Отправить решение</title>
    </head>
    <body>
	
        <div class="header"><br>Закажите решение математических задач и живите без проблем</div>

        <div class="left-column">
		<?php if ($_SESSION['isp']==0) 
		{
		echo"<br>Увы, страница доступна только исполнителям, вы можете <a href='zakaz.php'>Сделать заказ</a>"; 
		}
	else
		{ 		

			$iid=$_SESSION['id'];
		     $q = mysql_query("SELECT * FROM `zakaz` WHERE id_isp=$iid and status=2");
		 ?>
	<table>
    <tr>
		<th>Номер заказа</th> 
  
		<th>Тема</th>
		<th>&nbsp;&nbsp;  Дедлайн &nbsp;&nbsp;</th>
		<th>&nbsp;&nbsp; Дата взятия &nbsp;&nbsp;</th> 
		<th> &nbsp;&nbsp;Выгрузить</th>  		
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
			$uploaddir2=$uploaddir1;
			$uploaddir2.=$Result["bpath"];
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
			echo $Result["tema"];
		?>
		</td>
		<td align="center">
		<?php
			echo $Result["deadline"];
		?>
		</td>
		<td align="center">
		<?php
			echo $Result["datavz"];
		?>
		</td>
		
		<td>
	
			<form enctype="multipart/form-data" action="uploadresh.php" method="post">
			<input type="hidden" name="MAX_FILE_SIZE" value="30000000">
			<input type="hidden" name="HF" value="<?php echo $idz?>"/>
			<input name="userfile" type="file">
			<input type="submit" value="Send File">
			</form>

		</td>

    </tr>
	<?php
		}
	?>
	</table>
			<?php } ?>
		
		</div>

        <div class="right-column">
		
		
		<?php if(!empty($_SESSION['login']) ):	
			
			echo "Вы вошли как <b>".$_SESSION['name'].".</b><br>";
				if($_SESSION['isp']==1) { 
					echo"<br><a  href='http://localhost/math/take.php'>Здесь вы можете ознакомиться с заказами для выполнения</a><br>";
					echo"<br><a  href='http://localhost/math/mez.php'>Страница с вашими заказами</a><br>";
					echo"<br><a  href='http://localhost/math/mezresh.php'>Здесь вы можете загрузить выполненные заказы</a>"; 					
				} else
				{
					echo"<br><a  href='http://localhost/math/zakaz.php'>Здесь вы можете сделать заказ</a><br>";
					echo"<br><a  href='http://localhost/math/per.php'>Страница с текущими заказами</a><br>";
					echo"<br><a  href='http://localhost/math/history.php'>История заказов</a>";
				};
			
			?>
		<?php else:?>
			<form action="testreg.php" method="post">
				<p>
					<label>Ваш логин:<br></label>
					<input name="login" type="text" size="15" maxlength="15">
				</p>
				<p>
					<label>Ваш пароль:<br></label>
					<input name="password" type="password" size="15" maxlength="15">
				</p>
				<p>
					<input type="submit" name="submit" value="Войти">
				<br>
				</p>
				<p>
					<a href="reg.php">Зарегистрироваться</a> 
					</br>
				</p>
			</form>
		
		
		<?php endif?>
		
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
    echo "Вы вошли на сайт, как ".$_SESSION['name']."<br><a  href='http://localhost/math/take.php'>Здесь вы можете выбрать заказ</a> &nbsp;&nbsp;&nbsp;&nbsp;  <a  href='http://localhost/math/mez.php'>Личная страница</a>";; 
    }
    ?>
	<br>
	<?php if(!empty($_SESSION['login']) ):?> <a href="exit.php">Выход</a> <?php endif?> <br>
	<a href="index.php">Главная страница</a>
		</div>
		
    </body>
</html>