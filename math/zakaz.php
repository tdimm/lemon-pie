<?php
    session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
    ?>
<html>
    <head>
		<link rel="stylesheet" href="web.css" type="text/css">  
 	    <meta charset="ANSI">
        <title>�������� ������</title>
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
		
			<form enctype="multipart/form-data" action="upload.php" method="post">
			<input type="hidden" name="MAX_FILE_SIZE" value="30000000">
			��������� ����: <input name="userfile" type="file">
			<input type="submit" value="���������">
			 
			<p>�������� ����: <input type="date" name="calendar"> <br>
			<p>�������� ����: <select name="theme">
			<option>������������� ���������</option>
			<option>������ �������</option>
			<option>�������</option>
			<option>�����������</option>
			<option>���������</option>
			<option>������� � �������</option>
			<option>���</option>
			<option>���������������� ���������</option>
			</select></p>
		</form> <?php }?>
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
    echo "�� ����� �� ����, ��� ".$_SESSION['name']."<br>";
    }
    ?>
	<a href="exit.php">�����</a>
	<a href="index.php">�������</a>
	<a href="per.php">������ ��������</a>
		</div>
    </body>
</html>