<?
	include("../blocks/db.php");
	
	if(isset($_POST['id']))
		$id=$_POST['id'];
		
	if(isset($_POST['question']))
	{
		$question=$_POST['question'];
		if($question=="")
			unset($question);
	}
	
	if(isset($_POST['answer']))
	{
		$answer=$_POST['answer'];
		if($answer=="")
			unset($answer);
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?
			include("blocks/style.php");
		?>
		<title>Редактор F.A.Q. сайта &laquo;ВашВыбор67.рф&raquo;</title>
	</head>
	<body>
		<?
			include('blocks/header.php');
		?>
		<div id="main">
		<h1>Уточнение Вопроса</h1>
		<?
			if(isset($answer) && isset($question))
			{
				$result = mysql_query("UPDATE faq SET question='$question',answer='$answer' WHERE id='$id'");
				
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
				$result = mysql_query("SELECT * FROM faq WHERE id=$id",$db);
				$myrow=mysql_fetch_array($result);
				
				print<<<HERE
					<form method="post" action="">
						<label>
							Вопрос<br>
							<textarea name="question">$myrow[question]</textarea>
						</label><br>
						<label>
							Ответ (см. <a href="index.php">руководство</a>)<br>
							<textarea name="answer">$myrow[answer]</textarea>
						</label><br>
						<input name="id" type="hidden" value="$myrow[id]">
						<input type="submit" value="Уточнить Вопрос">
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