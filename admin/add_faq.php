<?
	include("../blocks/db.php");
	
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
			<h1>Добавление вопроса</h1>
			<?
				if(isset($question) && isset($answer))
				{
					$result = mysql_query("INSERT INTO faq (question,answer) VALUES ('$question','$answer')");
					if($result=='true')
						echo
						"
							<h3>Вопрос успешно добавлен в базу, спасибо!</h3>
							<h4>
								<a href='add_faq.php'>Добавить ещё один вопрос</a><br>
								<a href='index.php'>Вернуться на главную</a>
							</h4>
						";
						else
							echo
							"
								<h3 id='warning'>Ошибка! Не удалось добавить вопрос в базу данных! Пожалуйста, заполните ВСЕ поля!</h3>
							";
				}		
				else
					echo
					'
						<form action="" method="post">	
							<label>
								Вопрос<br>
								<textarea name="question"></textarea>
							</label><br>
							<label>
								Ответ (см. <a href="index.php">руководство</a>)<br>
								<textarea name="answer"></textarea>
							</label><br>
							<input type="submit" value="Добавить Вопрос">
						</form>
					';
			?>
		</div>
	</body>
</html>
<?
	include('blocks/javascripts.php');
?>