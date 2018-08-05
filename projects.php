<?
	include("blocks/db.php");
	
	$result=mysql_query("SELECT * FROM page WHERE page='projects'",$db);
	$myrow=mysql_fetch_array($result);
	
	$view=$myrow["view"]+1;
	$result=mysql_query("UPDATE page SET view='$view' WHERE page='projects'");
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
		<link href="css/slimbox.css" type="text/css" rel="stylesheet"/>
		<title>Стальные Конструкции &laquo;Ваш Выбор&raquo; &ndash; <?=$myrow['title']?></title>
	</head>
	<body>
		<?
			include('blocks/header.php');
		?>
		<div id="main">
			<h1><?=$myrow['title']?></h1>
			<?
				echo $myrow['text'];
				
				for($i=1;$i<7;$i++)
					echo
					'
						<a href="forpages/projects/big/'.$i.'.jpg" rel="lightbox1">
							<img class="project_img_1" src="forpages/projects/small/'.$i.'.jpg">
						</a>
					';
			?>			
			
			<a href="forpages/projects/big/w1.jpg" rel="lightbox1">
				<img class="project_img_2" src="forpages/projects/small/w1.jpg">
			</a>
			
			<p>Надеемся, что Вас заинтересовала наша продукция. Мы будем рады видеть Вас в качестве нашего Клиента!</p>
		</div>
		<?
			include('blocks/rightbar.php');
			include('blocks/footer.php');
		?>
	</body>
</html>
</html>
<?
	include('blocks/javascripts.php');
?>
<script src="js/slimbox.js"></script>