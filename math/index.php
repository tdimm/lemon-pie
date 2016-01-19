<?php
    session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
    ?>
<html>
    <head>
		<link rel="stylesheet" href="web.css" type="text/css">  
 	    <meta charset="ANSI">
        <title>Главная страница</title>
    </head>
    <body>
	
        <div class="header"><br>Закажите решение математических задач и живите без проблем</div>

        <div class="left-column"> 

		<?php
		if(!empty($_SESSION['login']) ):
			echo "Здравствуйте, <b>".$_SESSION['name'].".</b><br>
			<br><p>Ма рады приветствовать вас на нашем портале! <br></p>";
		
		else: 
			echo "<br><p>Добрый день! Ма рады приветствовать вас на нашем портале! <br>
		
		Если это ваше первое посещение, рекомендуем <a href='reg.php'>зарегистрироваться</a>. <br>
		Если у Вас уже есть аккаунт, воспользуйтесь формой входа.
		</p>"; 
		endif;
		?>
		
		
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
    if ($_SESSION['isp']==1) 
		{
		echo"<br><a  href='http://localhost/math/take.php'>Здесь вы можете ознакомиться с заказами для выполнения</a>"; 
		}
	else
		{ 
		echo"<br><a  href='http://localhost/math/zakaz.php'>Здесь вы можете сделать заказ</a><br>"; 
		} 
	}
    ?>
	<br>
	<?php if(!empty($_SESSION['login']) ):?> <a href="exit.php">Выход</a> <?php endif?>
		</div>
		
    </body>
</html>