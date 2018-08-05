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
	<title>Редактор Каталога сайта &laquo;ВашВыбор67.рф&raquo;</title>
	</head>
	<body>
		<?
			include('blocks/header.php');
		?>
		<div id="main" class="leftalign">
			<h1>Удаление двери из Каталога</h1>	
			<?
				if(isset($id))
				{
					$result1=mysql_query("SELECT model FROM china WHERE id='$id'");
					$model=mysql_fetch_array($result1);
					
					$result=mysql_query("DELETE FROM china WHERE id='$id'");
					
					if($result=='true')
					{
						unlink('../img/doors/big/'.$model[0].'.jpg');
						unlink('../img/doors/small/'.$model[0].'.jpg');
						echo
						"
							<h3>Информация из базы успешно удалена, спасибо!</h3>
							<h4>
								<a href='delete_door.php'>Удалить ещё одну дверь</a><br>
								<a href='index.php'>Вернуться на главную</a>
							</h4>
						";
					}
					else
						echo"<h3 id='warning'>Ошибка!</h3>";
				}
				else
				{
					echo'<form id="list" method="post" action="" class="leftalign">';
					
					$result=mysql_query("SELECT id,model,firm FROM china ORDER BY firm,model",$db);
					$myrow=mysql_fetch_array($result);
					
					do
						printf(
						"
							<label>
								<input type='radio' name='id' value='%s'>
								%s %s
							</label><br>
						",$myrow['id'],$myrow['firm'],$myrow['model']);
					while($myrow=mysql_fetch_array($result));
					
					echo
					'
							<input type="submit" value="Убрать дверь из Каталога">
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