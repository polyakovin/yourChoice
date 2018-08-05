<?
	if(isset($_FILES['fupload']))
	{
		if(preg_match('/[.](jpg)|(gif)|(png)$/',$_FILES['fupload']['name']))
		{ 
			$filename = $_FILES['fupload']['name'];
			$source = $_FILES['fupload']['tmp_name']; 
			$target = "../img/special/". $filename;  
			move_uploaded_file($source, $target);
		}
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
		<title>Редактор Эксклюзива сайта &laquo;ВашВыбор67.рф&raquo;</title>
	</head>
	<body>
		<?
			include('blocks/header.php');
		?>
		<div id="main">
			<h1>Добавление Эксклюзива</h1>
			<?
				if(isset($filename) && isset($title) && isset($description))
				{
					$result = mysql_query("INSERT INTO special (title,img,description) VALUES ('$title','$filename','$description')");
					
					if($result=='true') 
						echo
						"
							<h3>Дверь успешно добавлена в базу, спасибо!</h3>
							<h4>
								<a href='add_special.php'>Добавить ещё одну особую дверь</a><br>
								<a href='index.php'>Вернуться на главную</a>
							</h4>
						";
					else
						echo"<h3 id='warning'>Ошибка! Не удалось добавить дверь в базу данных! Пожалуйста, заполните ВСЕ поля!</h3>";
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
								Описание<br>
								<textarea name="description"></textarea>
							</label><br>
							<label>
								Миниатюра (максимальный размер: 150x200)<br>
								<input type="file" name="fupload">
							</label><br>
							<input type="submit" value="Добавить Эксклюзив">
						</form>
					';
			?>
		</div>
	</body>
</html>
<?
	include('blocks/javascripts.php');
?>