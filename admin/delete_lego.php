<?
	include("../blocks/db.php");

	$i=$_POST['i'];

	if(isset($_POST['id']))
		$id=$_POST['id'];
		
	if(isset($_POST['type']))
		$type=$_POST['type'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
		<h1>Удаляем <? echo $_POST['i'];?></h1>
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
				
				if(isset($id))
				{
					$result = mysql_query("DELETE FROM lego_$type WHERE id='$id'");
					if($result=='true')
						echo
						"
							<h3>Информация из базы успешно удалена, спасибо!</h3>
							<h4><a href='index.php'>Вернуться на главную</a></h4>
						";
					else{echo "<h3 id='warning'>Ошибка!</h3>";}
				}
				else
				{
					echo
					'
						<form id="list" method="post" action="" class="leftalign">
							<input name="type" type="hidden" value="'.$type.'">
							<input name="i" type="hidden" value="'.$i.'">
					';
					$result = mysql_query("SELECT id,title FROM lego_$type",$db);
					$myrow=mysql_fetch_array($result);
					
					do
						printf(
						"
							<label>
								<input type=\"radio\" name=\"id\" value=\"%s\">%s
							</label><br>
						", $myrow["id"], $myrow["title"]);
					while($myrow=mysql_fetch_array($result));
					
					echo
					'
							<input name="submit" type="submit" value="Удалить '.$i.'">
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