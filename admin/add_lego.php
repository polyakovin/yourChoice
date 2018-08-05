<?
	require 'blocks/config_lego.php';
	require 'blocks/process_lego.php';

	if(isset($_FILES['fupload']))
	{
		if(preg_match('/[.](jpg)|(gif)|(png)$/', $_FILES['fupload']['name']))
		{
			$i=$_POST['i'];
			$filename = $_POST['title'].'.jpg';
			$source = $_FILES['fupload']['tmp_name']; 
			$target = $path_to_image_directory.$filename;
			move_uploaded_file($source, $target);
			createThumbnail($filename);
		}
	}

	include("../blocks/db.php");

	if(isset($_POST['title']))
	{
		$title=$_POST['title'];
		if($title=="")
			unset($title);
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?
			include("blocks/style.php");
		?>
		<title>Редактор Конструктора сайта &laquo;ВашВыбор67.рф&raquo;</title>
	</head>
	<body>
		<?
			include('blocks/header.php');
		?>
		<div id="main">
			<h1>Добавим <?=$_POST['i']?></h1>
			<?
				$i=$_POST['i'];
				
				if(isset($_GET['i']))
					$i=$_GET['i'];
					
				switch($i)
				{
					case "Тип Конструкции":
						$type="constr";
						$t="Тип Конструкции";
						break;
						
					case "Глазок":
						$type="eye";
						break;
						
					case "Ручку":
						$type="handles";
						break;
						
					case "Личинку":
						$type="lich";
						break;
						
					case "Замок":
						$type="locks";
						break;
						
					case "Накладку":
						$type="nakl";
						break;
						
					case "Отделку":
						$type="otd";
						break;
						
					case "Рисунок":
						$type="otd_col";
						break;
						
					case "Задвижку":
						$type="zadv";
						break;
				}

				if(isset($filename))
				{
					$ton=createThumbnail($filename);
					echo $ton;  
					
					if(isset($title))
						{
							$result = mysql_query("INSERT INTO lego_$type (title,img) VALUES ('$title','$filename')");
							
							if($result=='true') 
								echo
								'
									<h3>Деталь успешно добавлена в базу, спасибо!</h3>
									<h4><a href=\'index.php\'>Вернуться на главную</a></h4>
								';
							else
								echo
								'
									<h3 id=\'warning\'>Но возникли проблемы с базой данных! Повторите запрос!</h3>
								';
						}
						else
							echo
							'
								<h3 id=\'warning\'>Но возникли проблемы с базой данных! Пожалуйста, заполните ВСЕ поля!</h3>
							';
				}
				else
					echo
					'
						<form enctype="multipart/form-data" action="" method="post">
							<input name="type" type="hidden" value="'.$type.'">
							<input name="i" type="hidden" value="'.$i.'">
							<label>
								Название<br>
								<input type="text" name="title">
							</label><br>
							<label>
								Загрузите изображение формата ".jpg" (размер < 1024x768)<br>
								<input type="file" name="fupload">
							</label><br>
							<input type="submit" value="Добавить '.$i.' в базу">
						</form>
					';
			?>
		</div>
	</body>
</html>
<?
	include('blocks/javascripts.php');
?>