<?
	include("blocks/db.php");
	
	$result=mysql_query("SELECT * FROM page WHERE page='order'",$db);
	$myrow=mysql_fetch_array($result);
	
	$view=$myrow["view"]+1;
	$result=mysql_query("UPDATE page SET view='$view' WHERE page='order'");
	
	if(isset($_POST['fam']) || isset($_POST['name']) || isset($_POST['fath']) || isset($_POST['adr']) || isset($_POST['cel']) || isset($_POST['cell']) || isset($_POST['dat']) || isset($_POST['add'])) 
	{
		if($_POST['fam']=="" || $_POST['name']=="" || $_POST['fath']=="" || $_POST['adr']=="" || $_POST['cel']=="" || $_POST['mod']=="")
			$form=
			'
				<p id="warning">
					Вы не заполнили все обязательные поля!<br>
					Пожалуйста, повторите запрос!
				<p>
			';
		else
		{
			$fam=$_POST['fam']; 
			$fam=$_POST['fam']; 
			$name=$_POST['name']; 
			$fath=$_POST['fath']; 
			$adr=$_POST['adr']; 
			$cel=$_POST['cel']; 
			$cell=$_POST['cell']; 
			$mod=$_POST['mod']; 
			$dat=$_POST['dat']; 
			$add=$_POST['add']; 
			mail
			(
				"Николай Поляков <nicky_man@rambler.ru>, Игорь Поляков <noggatur@ya.ru>",
				
				"Заказ двери ".$mod,$fam." ".$name." ".$fath." хочет заказать дверь \"".$mod."\"!
				Адрес установки: ".$adr.",
				Телефон: ".$cel.",
				Другой телефон: ".$cell.",
				Ориентировочная дата установки: ".$dat.",
				Дополнительные условия: ".$add,
				
				"from:ЗаказДвери@ВашВыбор67.рф"
			);
			$form='<p>Спасибо за оформление заказа на сайте, '.$name.' '.$fath.'! Ожидайте звонка от мастера.</p>';
		}
	}
	else
	{
		if(isset($_GET['china']))
			$china=$_GET['china'];
		else
			$china="";
		
		$result=mysql_query("SELECT model,firm FROM china ORDER BY firm,model",$db);
		$door=mysql_fetch_array($result);
		
		$a=rand(1,9);
		$b=rand(1,9);
		$star='<strong class="star">*</strong>';
		
		$form=$myrow['text'].
		'
			<div id="sheet">				
				<form action="" id="form" method="post">	  
					<table align="center">
						<tr>
							<td id="order_border_left">
								'.$star.'Фамилия:<br>
								'.$star.'Имя:<br>
								'.$star.'Отчество:<br>
								'.$star.'Адрес:<br>
								'.$star.'Телефон(основной):<br>
								Телефон(дополнительный):<br>
								'.$star.'Модель двери:<br>
								Желаемая дата установки:<br>
								'.$star.'Сколько будет <strong id="a">'.$a.'</strong> плюс <strong id="b">'.$b.'</strong>?:<br>
								Дополнительная информация:
							</td>
							<td id="order_border_right">
								<input class="form" type="text" name="fam"><br>
								<input class="form" type="text" name="name"><br>
								<input class="form" type="text" name="fath"><br>
								<input class="form" type="text" name="adr"><br>
								<input class="form" type="text" name="cel"><br>
								<input class="form" type="text" name="cell"><br>
								<select class="form" name="mod">
		';
		
		do
		{
			if($china == $door["firm"]." ".$door["model"])
				$sel="selected";
			else
				$sel="";
				
			$form.="<option value=\"".$door["firm"]." ".$door["model"]."\" ".$sel.">".$door["firm"]." ".$door["model"]."</option>";
		}
		while($door=mysql_fetch_array($result));
		
		$form.=
		'
								</select><br>
								<input id="date" class="form" type="text" name="dat"><br>
								<input id="c" class="form" type="text" name="capt"><br>
								<textarea name="add" rows="5" cols="42"></textarea>
							</td>
						</tr>
						<tr>
							<td colspan="2" id="order_border">
								<input type="submit" name="submit" id="orderforming" value="Сформировать заявку">
							</td>
						</tr>	
					</table>	  
				</form>
			</div>
		';
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta name="description" content="<?=$myrow['meta_d']?>">
		<meta name="keywords" content="<?=$myrow['meta_k']?>">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?
			include("blocks/style.php");
		?>
		<link rel="stylesheet" type="text/css" href="css/page.order.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.datepicker.css">
		<title>Стальные Конструкции &laquo;Ваш Выбор&raquo; &ndash; <?=$myrow['title']?></title>
	</head>
	<body>
		<?
			include('blocks/header.php');
		?>
		<div id="main">
			<h1><?=$myrow['title']?></h1>
			<?=$form?>
		</div>
		<?
			include('blocks/rightbar.php');
			include('blocks/footer.php');
		?> 
	</body>
</html>
<?
	include('blocks/javascripts.php');
?>
<script type="text/javascript" src="js/jquery.datepicker.js"></script><?//Календарик?>
<script type="text/javascript" src="js/page.order.js"></script>