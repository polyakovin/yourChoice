<?
	include("../blocks/db.php");
	
	if(isset($_GET['a']))
		$a=$_GET['a'];
		
	if(isset($_POST['id']))
		$id=$_POST['id'];
		
	if(isset($_POST['title']))
	{
		$title=$_POST['title'];
		if($title=="")
			unset($title);
	}
	
	if(isset($_POST['meta_d']))
	{
		$meta_d=$_POST['meta_d'];
		if($meta_d=="")
			unset($meta_d);
	}
	
	if(isset($_POST['meta_k']))
	{
		$meta_k=$_POST['meta_k'];
		if($meta_k=="")
			unset($meta_k);
	}
	
	if(isset($_POST['text']))
	{
		$text=$_POST['text'];
		if($text=="")
			unset($text);
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?
			include("blocks/style.php");
		?>
		<title>Редактор страниц сайта &laquo;ВашВыбор67.рф&raquo;</title>
	</head>
	<body>
		<?
			include('blocks/header.php');
		?>
		<div id="main">
			<h1>Редактор страниц</h1>
			<?
				if(isset($id) && isset($meta_d) && isset($meta_k) && isset($text))
				{
					$result1=mysql_query("UPDATE page SET meta_d='$meta_d', meta_k='$meta_k', title='$title', text='$text' WHERE id='$id'");
					if($result1=='true')
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
					$myrow=mysql_fetch_array(mysql_query("SELECT * FROM page WHERE id=$a",$db));
					print<<<HERE
						<form method="post" action="">
							<label>
								Название страницы<br>
								<input type="text" name="title" value="$myrow[title]">
							</label><br>   
							<label>
								Описание страницы в поисковике<br>
								<input type="text" name="meta_d" value="$myrow[meta_d]">
							</label><br> 
							<label>
								Ключевые слова для поисковика<br>
								<input type="text" name="meta_k" value="$myrow[meta_k]">
							</label><br> 
							<label>
								Содержание (см. <a href="index.php">руководство</a>)<br>
								<textarea name="text">$myrow[text]</textarea>
							</label><br>
							<input type="hidden" name="id" value="$myrow[id]">
							<input type="submit" value="Изменить параметры страницы">
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