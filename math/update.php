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
        <title>����� ������</title>
    </head>

    <body>
	
        <div class="header"><br>�������� ������� �������������� ����� � ������ ��� �������</div>

        <div class="central-column">
		"�� ������� �������!" <br>
		� ������, �� ����� ����� ����� <?php echo $idzz ?>, ������� ����� ��������� �� <?php echo $Result["deadline"]?> <br>
		
		��� ������ ���� ������ ����� ����������<a href="mez.php"> �����</a>
		
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