<?php
    session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	include ("bd.php");

    ?>
<html>
    <head>
		<link rel="stylesheet" href="web.css" type="text/css">  
 	    <meta charset="ANSI">
        <title>��������� �������</title>
    </head>
    <body>
	
        <div class="header"><br>�������� ������� �������������� ����� � ������ ��� �������</div>

        <div class="left-column">
		<?php if ($_SESSION['isp']==0) 
		{
		echo"<br>���, �������� �������� ������ ������������, �� ������ <a href='zakaz.php'>������� �����</a>"; 
		}
	else
		{ 		

			$iid=$_SESSION['id'];
		     $q = mysql_query("SELECT * FROM `zakaz` WHERE id_isp=$iid and status=2");
		 ?>
	<table>
    <tr>
		<th>����� ������</th> 
  
		<th>����</th>
		<th>&nbsp;&nbsp;  ������� &nbsp;&nbsp;</th>
		<th>&nbsp;&nbsp; ���� ������ &nbsp;&nbsp;</th> 
		<th> &nbsp;&nbsp;���������</th>  		
    </tr>
	<?php
		$uploaddir = 'C:\wamp\www\math\uploads';
		while($Result = mysql_fetch_assoc($q))
		{
	?>
	<tr>
		<?php
			$uploaddir1 =$uploaddir;
			$uploaddir1.="\\%20";
			$uploaddir2=$uploaddir1;
			$uploaddir2.=$Result["bpath"];
			$uploaddir1.=$Result["path"];
			$idz=$Result["id_z"];
		?>
		<td align="center">
		<?php
			echo $Result["id_z"]; 
		?>
		</td>

		<td>
		<?php
			echo $Result["tema"];
		?>
		</td>
		<td align="center">
		<?php
			echo $Result["deadline"];
		?>
		</td>
		<td align="center">
		<?php
			echo $Result["datavz"];
		?>
		</td>
		
		<td>
	
			<form enctype="multipart/form-data" action="uploadresh.php" method="post">
			<input type="hidden" name="MAX_FILE_SIZE" value="30000000">
			<input type="hidden" name="HF" value="<?php echo $idz?>"/>
			<input name="userfile" type="file">
			<input type="submit" value="Send File">
			</form>

		</td>

    </tr>
	<?php
		}
	?>
	</table>
			<?php } ?>
		
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
    echo "�� ����� �� ����, ��� ".$_SESSION['name']."<br><a  href='http://localhost/math/take.php'>����� �� ������ ������� �����</a> &nbsp;&nbsp;&nbsp;&nbsp;  <a  href='http://localhost/math/mez.php'>������ ��������</a>";; 
    }
    ?>
	<br>
	<?php if(!empty($_SESSION['login']) ):?> <a href="exit.php">�����</a> <?php endif?> <br>
	<a href="index.php">������� ��������</a>
		</div>
		
    </body>
</html>