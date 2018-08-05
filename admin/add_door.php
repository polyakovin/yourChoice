<?
	require'blocks/config.php';
	require'blocks/process.php';
	if(isset($_FILES['fupload']))
	{
		if(preg_match('/[.](jpg)|(gif)|(png)$/', $_FILES['fupload']['name']))
		{
			$filename = $_POST['model'].'.jpg';
			$source = $_FILES['fupload']['tmp_name']; 
			$target = $path_to_image_directory.$filename;
			move_uploaded_file($source, $target);
			createThumbnail($filename);
		}
	}

	include("../blocks/db.php");
	
	$var = array
	(
		1 => 'model',
		'price',
		'firm',
		'size',
		'depth',
		'cover',
		'inside',
		'descr',
	);
	
	for($i=1;$i<9;$i++)
	{
		if(isset($_POST[$var[$i]]))
		{
			$val[$i]=$_POST[$var[$i]];
			if($val[$i]=="")
				unset($val[$i]);
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?
			include("blocks/style.php");
		?>
		<title>Редактор Каталога сайта &laquo;ВашВыбор67.рф&raquo;</title>
	</head>
	<body>
		<?
			include('blocks/header.php');
		?>
		<div id="main">
		<h1>Добавление двери в Каталог</h1>
		<?
			if(isset($filename))
			{
				$ton=createThumbnail($filename);
				echo $ton;
				
				if(isset($var[1]) && isset($var[2]) && isset($var[3]) && isset($var[4]) && isset($var[5]) && isset($var[6]) && isset($var[7]))
				{
					$result = mysql_query("INSERT INTO china ($var[1],$var[2],$var[3],$var[4],$var[5],$var[6],$var[7],$var[8]) VALUES ('$val[1]','$val[2]','$val[3]','$val[4]','$val[5]','$val[6]','$val[7]','$val[8]')");
					if($result=='true') 
						echo
						'
							<h3>Дверь успешно добавлена в базу, спасибо!</h3>
							<h4>
								<a href=\'add_door.php\'>Добавить ещё одну дверь</a><br>
								<a href=\'index.php\'>Вернуться на главную</a>
							</h4>
						';
					else
						echo'<h3 id=\'warning\'>Возникли проблемы с базой данных! Повторите запрос!</h3>';
				}
				else
					echo '<h3 id=\'warning\'>Возникли проблемы с базой данных! Пожалуйста, заполните ВСЕ поля!</h3>';
			}
			else
				echo
				'
					<form enctype="multipart/form-data" method="post" action="">
						<label>
							Изготовитель<br>
							<select name="firm">
								<option value="Смоленская">Смоленск</option>
								<option value="Yasin">Yasin</option>
								<option value="Райт">Райт</option>
								<option value="Супер Двери">Супер Двери</option>
							</select>
						</label><br>
						<label>
							Модель<br>
							<input type="text" name="model">
						</label><br>
						<label>
							Цена(** ***)<br>
							<input type="text" name="price">
						</label><br>
						<label>
							Доступные размеры(*,**x*,**)<br>
							<input type="text" name="size">
						</label><br>
						<label>
							Толщина стали(*,**мм)<br>
							<input type="text" name="depth">
						</label><br>
						<label>
							Покрытие<br>
							<input type="text" name="cover">
						</label><br>
						<label>
							Утеплитель<br>
							<input type="text" name="inside">
						</label><br>
						<label>
							Примечание<br>
							<input type="text" name="descr">
						</label><br>
						<label>
							Изображение двери формата ".jpg" (не больше 640 пикселей)<br>
							<input type="file" name="fupload">
						</label><br>
						<input type="submit" value="Добавить дверь в Каталог">
					</form>
				';
		?>
		</div>
	</body>
</html>
<?
	include('blocks/javascripts.php');
?>