<?
	include("blocks/db.php");
	
	$result=mysql_query("SELECT * FROM page WHERE page='gallery'",$db);
	$myrow=mysql_fetch_array($result);
	
	$view=$myrow["view"]+1;
	$result=mysql_query("UPDATE page SET view='$view' WHERE page='gallery'");
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
		<link rel="stylesheet" type="text/css" href="css/slimbox.css">
		<link href="css/jquery.booklet.css" type="text/css" rel="stylesheet"/>
		<link href="css/slimbox.css" type="text/css" rel="stylesheet"/>
		<link href="css/page.gallery.css" type="text/css" rel="stylesheet"/>
		<title>Стальные Конструкции &laquo;Ваш Выбор&raquo; &ndash; <?=$myrow['title']?></title>
	</head>
	<body>
		<?
			include('blocks/header.php');
		?>
		<div id="main">
			<h1><?=$myrow['title']?></h1>
			<?=$myrow['text']?>
			
			<?//<div id="tab"></div>?>
			<div class="book_wrapper">
				<div id="mybook">
					<?
						$result=mysql_query("SELECT * FROM china ORDER BY firm,model",$db);
						$myrow=mysql_fetch_array($result);
						
						$a=0;$b=0;$c=0;$d=0;
						do
						{
							if($myrow["firm"] == "Yasin")
							{
								if($a==0)
								{
									$chapter="Yasin";
									$a++;
								}
								else
									$chapter="";
							}
							
							if($myrow["firm"] == "Райт")
							{
								if($b==0)
								{
									$chapter="Райт";
									$b++;
								}
								else
									$chapter="";
							}
							
							if($myrow["firm"] == "Супер Двери")
							{
								if($c==0)
								{
									$chapter='"Супер Двери"';
									$c++;
								}
								else
									$chapter="";
							}
							
							if($myrow["firm"] == "Смоленская")
							{
								if($d==0)
								{
									$chapter="Смоленские двери";
									$d++;
								}
								else
									$chapter="";
							}
							
							printf(
							'
								<div title="%s" rel="%s">
									<h4>%s</h4>
									<a href="img/doors/big/%s.jpg" title="%s" rel="lightbox1">
										<img src="img/doors/small/%s.jpg" alt="%s"/>
									</a>
									<p>
										<strong>Доступные размеры:</strong> %s<br>
										<strong>Покрытие:</strong> %s<br>
										<strong>Толщина стали:</strong> %s<br>
										<strong>Утеплитель:</strong> %s<br>
										<strong>Примечания:</strong> %s<br>
										<strong>Цена:</strong> <span class="redprice">%s</span> рублей<br>
									</p>
									<a href="order.php?china=%s %s" class="order">Заказать</a>
								</div>
							', $myrow["model"], $chapter, $myrow["model"], $myrow["model"], $myrow["model"], $myrow["model"], $myrow["model"], $myrow["size"], $myrow["cover"], $myrow["depth"], $myrow["inside"], $myrow["descr"], $myrow["price"], $myrow["firm"], $myrow["model"]);
						}
						while($myrow=mysql_fetch_array($result));
					?>
				</div>
				<div id="loading" class="loading"></div>
			</div>
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
<script src="js/jquery.ui.js"></script>
<script src="js/jquery.easing.js"></script>
<script src="js/jquery.booklet.js"></script>
<script src="js/cufon/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon/font.Betina_400.js" type="text/javascript"></script>
<script src="js/slimbox.js"></script>
<script src="js/page.gallery.js"></script>