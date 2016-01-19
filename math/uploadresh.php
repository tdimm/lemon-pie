<?php
    session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	$idzz = $_REQUEST["HF"];
$uploaddir = 'C:\wamp\www\math\uploads';
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
	?><br><a href="mezresh.php">Назад</a><?php
	include ("bd.php");
	$idd = $_SESSION['id'];
	$path = $_FILES['userfile']['name'];
	$today = date('Y-m-d');
	$str1 = "UPDATE zakaz 
			 SET status=3, bpath='$path', datavoz='$today' 
			 WHERE id_z=$idzz";
	mysql_query($str1) or die(mysql_error());
	?>