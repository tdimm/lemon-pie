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
        <title>����� ������</title>
    </head>


    <body>
	
        <div class="header"><br>�������� ������� �������������� ����� � ������ ��� �������</div>

        <div class="central-column">
		
		<?php if ($_SESSION['isp']==1) 
		{
		echo"<br>���, �������� �������� ������ ����������, �� ������ <a href='take.php'>���������� ������ ��� ����������</a>"; 
		}
	else
		{  ?>
		
		"����� ������. ��� ���� ������ �� ������ ���������� � <a href="history.php">������� �������</a>" <br>
		
		<?php }?>
		</div>
        <div class="footer"><br>
		<?php
    // ���������, ����� �� ���������� ������ � id ������������
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    // ���� �����, �� �� �� ������� ������
    echo "�� ����� �� ����, ��� �����<br><a href='#'>��� ������  �������� ������ ������������������ �������������</a>";
    }
    else
    {

    // ���� �� �����, �� �� ������� ������
    echo "�� ����� �� ����, ��� ".$_SESSION['name']."<br>";
    }
    ?>
	<a href="exit.php">�����</a> <br>
	<a href="index.php">������� ��������</a>
		</div>


<body>
</body>
</html>		