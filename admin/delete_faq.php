<?
	include("../blocks/db.php");

	if(isset($_POST['id']))
		$id=$_POST['id'];
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
		<div id="main" class="leftalign">
		<h1>Удаление Вопроса</h1>
		<?
			if(isset($id))
			{
				$result = mysql_query("DELETE FROM faq WHERE id='$id'");
				
				if($result=='true')
					echo
					"
						<h3>Информация из базы успешно удалена, спасибо!</h3>
						<h4>
							<a href='delete_door.php'>Удалить ещё один вопрос</a><br>
							<a href='index.php'>Вернуться на главную</a>
						</h4>
					";
				else
					echo"<h3 id='warning'>Ошибка!</h3>";
			}
			else
			{
				echo'<form id="list" method="post" action="" class="leftalign">';
				
				$result = mysql_query("SELECT id,question FROM faq",$db);
				$myrow=mysql_fetch_array($result);
				
				do
					printf(
					"
						<label>
							<input type=\"radio\" name=\"id\" value=\"%s\">
							%s
						</label><br>
					",$myrow["id"],$myrow["question"]);
				while($myrow=mysql_fetch_array($result));
				
				echo
				'
						<input name="submit" type="submit" value="Удалить Вопрос">
					</form>
				';
			}
		?>
		</div>
	</body>
</html>
<?
	include('blocks/javascripts.php');
?>