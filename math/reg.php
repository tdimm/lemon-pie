
<html>
    <head>
		<link rel="stylesheet" href="web.css" type="text/css">  
 	    <meta charset="ANSI">
        <title>Регистрация</title>
    </head>
    <body>
	
        <div class="header"><br>Закажите решение математических задач и живите без проблем</div>

        <div class="central-column">
		
		
		
				<form action="save_user.php" method="post">
			<p>
			<label>Имя:<br></label>
			<input name="firstname" type="text" size="15" maxlength="15">
			</p>
			
			<p>
			<label>Фамилия:<br></label>
			<input name="name" type="text" size="15" maxlength="15">
			</p>
			
			<p>
			<label>Отчество:<br></label>
			<input name="lastname" type="text" size="15" maxlength="15">
			</p>
			
			<p>
			<label>Ваш логин:<br></label>
			<input name="login" type="text" size="15" maxlength="15">
			</p>
			
			<p>
			<label>Пароль<br></label>
			<input name="password" type="password" size="15" maxlength="15">
			</p>
			<p>
			<input type="checkbox" name="isp"  value="yes"/>
			<label for="isp">Исполнитель</label> <br>
			</p>
			<p>
			<input type="submit" name="submit" value="Зарегистрироваться">
			</p>
			</form>
	
		</div>
        <div class="footer">
		</div>
    </body>
</html>