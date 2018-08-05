<?
	if(isset($_FILES['fupload']))
	{
		if(preg_match('/[.](jpg)|(gif)|(png)$/',$_FILES['fupload']['name']))
		{ 
			$filename = $_FILES['fupload']['name'];
			$source = $_FILES['fupload']['tmp_name']; 
			$target = "../img/sale/".$filename;  
			move_uploaded_file($source, $target);
		}
	}

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

	if(isset($_POST['title']))
	{
		$title=$_POST['title'];
		if($title=="")
			unset($title);
	}

	if(isset($_POST['description']))
	{
		$description=$_POST['description'];
		if($description=="")
			unset($description);
	}

	include("../blocks/db.php");
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
			<h1>Выставление двери на Распродажу</h1>
			<?
				if(isset($filename) && isset($title) && isset($description) && isset($old_price) && isset($new_price))
				{
					$result = mysql_query("INSERT INTO sale (title,img,description,old_price,new_price) VALUES ('$title','$filename','$description','$old_price','$new_price')");
					
					if($result=='true') 
						echo
						"
							<h3>Дверь успешно добавлена в базу, спасибо!</h3>
							<h4>
								<a href='add_sale.php'>Добавить ещё одну дверь</a><br>
								<a href='index.php'>Вернуться на главную</a>
							</h4>
						";
					else
						echo
						"
							<h3 id='warning'>Ошибка! Не удалось добавить дверь в базу данных! Пожалуйста, заполните ВСЕ поля!</h3>
						";
				}
				else
					echo
					'
						<form enctype="multipart/form-data" action="" method="post">
							<label>
								Заголовок<br>
								<input type="text" name="title">
							</label><br>
							<label>
								Старая цена<br>
								<input type="text" name="old_price">
							</label><br>
							<label>
								Новая цена<br>
								<input type="text" name="new_price">
							</label><br>
							<label>
								Описание (см. <a href="index.php">руководство</a>)<br>
								<textarea name="description"></textarea>
							</label><br>
							<label>
								Миниатюра (максимальный размер: 150x200)<br>
								<input type="file" name="fupload">
							</label><br>
							<input type="submit"" value="Выставить дверь на Распродажу">
						</form>
					';
			?>
		</div>
	</body>
</html>
<?
	include('blocks/javascripts.php');
?>