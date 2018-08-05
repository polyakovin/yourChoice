<?
	include("../blocks/db.php");
	
	if(isset($_POST['id']))
		$id=$_POST['id'];
		
	if(isset($_POST['price']))
		$price=$_POST['price'];
		
	if(isset($_POST['size']))
		$size=$_POST['size'];
		
	if(isset($_POST['depth']))
		$depth=$_POST['depth'];
		
	if(isset($_POST['cover']))
		$cover=$_POST['cover'];
		
	if(isset($_POST['inside']))
		$inside=$_POST['inside'];
		
	if(isset($_POST['descr']))
		$descr=$_POST['descr'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
		<?
			include("blocks/style.php");
		?>
		<title>Редактор Каталога сайта &laquo;ВашВыбор67.рф&raquo;</title>
	</head>
	<body>
		<?
			include('blocks/header.php');
			
			$result1=mysql_query("SELECT * FROM china WHERE id=$id",$db);
			$myrow=mysql_fetch_array($result1);
		?>
		<div id="main">
			<h1><b><?=$myrow['firm']?> <?=$myrow['model']?></b></h1>
			<?
				if(isset($price) && isset($size) && isset($depth) && isset($cover) && isset($inside))
				{
					$result=mysql_query("UPDATE china SET price='$price',size='$size',depth='$depth',cover='$cover',inside='$inside',descr='$descr' WHERE id='$id'");
					
					if($result=='true')
						echo"<h3>Информация в базе успешно обновлена, спасибо!<br><a href='index.php'>Вернуться на Главную</a></h3>";
					else
						echo"<h4 id='warning'>Ошибка!<br><a href='index.php'>Вернуться на Главную</a></h4>";
				}
				else
				{
					print<<<HERE
						<form method="post" action="">
							<label>
								Цена(** ***)<br>
								<input type="text" name="price" value="$myrow[price]">
							</label><br> 
							<label>
								Доступные размеры(*,**x*,**)<br>
								<input type="text" name="size" value="$myrow[size]">
							</label><br> 
							<label>
								Толщина стали(*,**мм)<br>
								<input type="text" name="depth" value="$myrow[depth]">
							</label><br> 
							<label>
								Покрытие<br>
								<input type="text" name="cover" value="$myrow[cover]">
							</label><br> 
							<label>
								Утеплитель<br>
								<input type="text" name="inside" value="$myrow[inside]">
							</label><br> 
							<label>
								Примечание<br>
								<input type="text" name="descr" value="$myrow[descr]">
							</label><br>
							<input name="id" type="hidden" value="$myrow[id]">
							<input type="submit" value="Изменить параметры двери">
						</form>
HERE;
				}
			?>
		</div>
	</body>
</html>
<?
	include('blocks/javascripts.php');
?>