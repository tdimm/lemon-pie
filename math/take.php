<?php
    session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	include ("bd.php");

    ?>
<html>
    <head>
		<link rel="stylesheet" href="web.css" type="text/css">  
 	    <meta charset="ANSI">
        <title>������� �����</title>
    </head>
    <body>
	
        <div class="header"><br>�������� ������� �������������� ����� � ������ ��� �������</div>

        <div class="central-column">
		 <?php if ($_SESSION['isp']==0) 
		{
		echo"<br>���, �������� �������� ������ ������������, �� ������ <a href='zakaz.php'>������� �����</a>"; 
		}
	else
		{ 
	
	
	
		     $q = mysql_query("SELECT * FROM `zakaz` WHERE status=1");
		 ?>
		
    <table>
    <tr>
		<th>����� ������</th> 
		<th>������</th>  
		<th>����</th>
		<th>���� ����������</th>
		<th>����� �����</th>
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
			echo "<a href=\"$uploaddir1\">    ������������    </a>"; 
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
		<td>
		
		<form action="update.php" method="post" value="'.$idz.'"> 
		<input type="submit" name="button" value="����� �����"/>
		<input type="hidden" name="HF" value="<?php echo $idz?>"/> 				
		</form>
	
		</td>
    </tr>
	<?php
		}
	?>
	</table>
		
		
		
		
		
		
		<?php } ?>
		
		</div>
        <div class="footer"><br>
		
		<?php
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    echo "�� ����� �� ����, ��� �����<br><a href='#'>��� ������  �������� ������ ������������������ �������������</a>";
    }
    else
    {
    echo "�� ����� �� ����, ��� ".$_SESSION['name']."<br> ������� ��������<a  href='index.php'></a>";
    }
    ?>
	<a href="exit.php">�����</a>
		</div>
    </body>
</html>