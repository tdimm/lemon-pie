<?php
	 error_reporting(E_ALL ^ E_DEPRECATED);
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
	if (isset($_POST['firstname'])) { $firstname=$_POST['firstname']; if ($firstname =='') { unset($firstname);} }
	if (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') { unset($name);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['lastname'])) { $lastname=$_POST['lastname']; if ($lastname =='') { unset($lastname);} }
    if (isset($_POST['isp']) && $_POST['isp']=='yes') 
	{$isp='1';} 
else {$isp='0';}
	//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
 if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
 $password = stripslashes($password);
    $password = htmlspecialchars($password);
	//$name = stripslashes($name);
 //   $name = htmlspecialchars($name);
//	$firstname = stripslashes($firstname);
 //   $firstname = htmlspecialchars($firstname);
//	$lastname = stripslashes($lastname);
  //  $lastname = htmlspecialchars($lastname);
 //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
//	$name = trim($name);
 //   $firstname = trim($firstname);
//	$lastname = trim($lastname);
 // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 // проверка на существование пользователя с таким же логином
    $result = mysql_query("SELECT id FROM users WHERE login='$login'");
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
 // если такого нет, то сохраняем данные
	if ($isp=='1'){
    $result2 = mysql_query ("INSERT INTO users (login,password,name,firstname,lastname,isp) VALUES('$login','$password','$name','$firstname','$lastname',1)");
    }
	else {$result2 = mysql_query ("INSERT INTO users (login,password,name,firstname,lastname,isp) VALUES('$login','$password','$name','$firstname','$lastname',0)");	
	}
	// Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
    ?>
	<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
</body>
</html>