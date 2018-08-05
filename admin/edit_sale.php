<?
	include("../blocks/db.php");
	
	if(isset($_POST['id']))
		$id=$_POST['id'];
		
	if(isset($_POST['new_price']))
	{
		$new_price=$_POST['new_price'];
		if($new_price=="")
			unset($new_price);
	}
	
	if(isset($_POST['old_price']))
	{
		$old_price=$_POST['old_price'];
		if($old_price=="")
			unset($old_price);
	}
	
	if(isset($_POST['description']))
	{
		$description=$_POST['description'];
		if($description=="")
			unset($description);
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?
			include("blocks/style.php");
		?>
		<title>Редактор Распродажи сайта &laquo;ВашВыбор67.рф&raquo;</title>
	</head>
	<body>
		<?
			include('blocks/header.php');
		?>
		<div id="main">
			<h1>Редактируем Уценёнку</h1>
			<?
				if(isset($new_price) && isset($old_price) && isset($description))
				{
					$result = mysql_query("UPDATE sale SET new_price='$new_price',old_price='$old_price',description='$description' WHERE id='$id'");
					
					if($result=='true')
						echo
						"
							<h3>
								Информация в базе успешно обновлена, спасибо!<br>
								<a href='index.php'>Вернуться на Главную</a>
							</h3>
						";
					else
						echo
						"
							<h4 id='warning'>
								Ошибка!<br>
								<a href='index.php'>Вернуться на Главную</a>
							</h4>
						";
				}
				else
				{
					$result = mysql_query("SELECT * FROM sale WHERE id=$id",$db);
					$myrow=mysql_fetch_array($result);
					
					print<<<HERE
						<form method="post" action="">
							<label>
								Старая цена<br>
								<input value="$myrow[old_price]" type="text" name="old_price">
							</label><br> 
							<label>
								Новая цена<br>
								<input value="$myrow[new_price]" type="text" name="new_price">
							</label><br> 
							<label>
								Описание (см. <a href="index.php">руководство</a>)<br>
								<textarea name="description">$myrow[description]</textarea>
							</label><br>
							<input name="id" type="hidden" value="$myrow[id]">
							<input type="submit" value="Изменить параметры товара">
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