<?php
    session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
    ?>
<html>
    <head>
		<link rel="stylesheet" href="web.css" type="text/css">  
 	    <meta charset="ANSI">
        <title>������� ��������</title>
    </head>
    <body>
	
        <div class="header"><br>�������� ������� �������������� ����� � ������ ��� �������</div>

        <div class="left-column"> 

		<?php
		if(!empty($_SESSION['login']) ):
			echo "������������, <b>".$_SESSION['name'].".</b><br>
			<br><p>�� ���� �������������� ��� �� ����� �������! <br></p>";
		
		else: 
			echo "<br><p>������ ����! �� ���� �������������� ��� �� ����� �������! <br>
		
		���� ��� ���� ������ ���������, ����������� <a href='reg.php'>������������������</a>. <br>
		���� � ��� ��� ���� �������, �������������� ������ �����.
		</p>"; 
		endif;
		?>
		
		
		</div>

        <div class="right-column">
		
		<?php if(!empty($_SESSION['login']) ):	
			
			echo "�� ����� ��� <b>".$_SESSION['name'].".</b><br>";
				if($_SESSION['isp']==1) { 
					echo"<br><a  href='http://localhost/math/take.php'>����� �� ������ ������������ � �������� ��� ����������</a><br>";
					echo"<br><a  href='http://localhost/math/mez.php'>�������� � ������ ��������</a><br>";
					echo"<br><a  href='http://localhost/math/mezresh.php'>����� �� ������ ��������� ����������� ������</a>"; 					
				} else
				{
					echo"<br><a  href='http://localhost/math/zakaz.php'>����� �� ������ ������� �����</a><br>";
					echo"<br><a  href='http://localhost/math/per.php'>�������� � �������� ��������</a><br>";
					echo"<br><a  href='http://localhost/math/history.php'>������� �������</a>";
				};
			
			?>
		<?php else:?>
			<form action="testreg.php" method="post">
				<p>
					<label>��� �����:<br></label>
					<input name="login" type="text" size="15" maxlength="15">
				</p>
				<p>
					<label>��� ������:<br></label>
					<input name="password" type="password" size="15" maxlength="15">
				</p>
				<p>
					<input type="submit" name="submit" value="�����">
				<br>
				</p>
				<p>
					<a href="reg.php">������������������</a> 
					</br>
				</p>
			</form>
		
		
		<?php endif?>
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
    if ($_SESSION['isp']==1) 
		{
		echo"<br><a  href='http://localhost/math/take.php'>����� �� ������ ������������ � �������� ��� ����������</a>"; 
		}
	else
		{ 
		echo"<br><a  href='http://localhost/math/zakaz.php'>����� �� ������ ������� �����</a><br>"; 
		} 
	}
    ?>
	<br>
	<?php if(!empty($_SESSION['login']) ):?> <a href="exit.php">�����</a> <?php endif?>
		</div>
		
    </body>
</html>