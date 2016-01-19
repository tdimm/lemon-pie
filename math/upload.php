<?php
    session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
$uploaddir = 'C:\wamp\www\math\uploads';
if (isset($_POST['calendar'])) { $ddl = $_POST['calendar']; } //заносим введенный пользовател
if (isset($_POST['theme'])) {$theme = $_POST['theme'];}
$name1=$_FILES['userfile']['name'];
$name2=$_FILES['userfile']['tmp_name'];
if (move_uploaded_file($name2, 
"$uploaddir\ $name1")) 
{
    print "Файл успешно загужен в  "; 
	print "$uploaddir ";
} else {
    print "There some errors! "; 
}
	include ("bd.php");
	$idd = $_SESSION['id'];
	$path = $_FILES['userfile']['name'];
	$str1 = "INSERT INTO zakaz(";
	$str1 = $str1 . "deadline, ";
	$str1 = $str1 . "id_zak, ";
	$str1 = $str1 . "tema, ";
	$str1 = $str1 . "path) ";
	$str1 = $str1 . "VALUES (";
	$str1 = $str1 . "'$ddl', ";
	$str1 = $str1 . "'$idd', ";
	$str1 = $str1 . "'$theme', ";
	$str1 = $str1 . "'$path') ";	
	mysql_query($str1) or die(mysql_error());
	?>