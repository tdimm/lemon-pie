<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
$db = mysql_connect('localhost','root','') or die("�� ���� �������������� � ����: " . mysql_error());
mysql_select_db('users') or die("�� ���� ������� ����" . mysql_error()); 
//mysqli_query($link, "SET NAMES utf8");
        ?> 