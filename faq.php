<?
	include("blocks/db.php");
	
	$result=mysql_query("SELECT * FROM page WHERE page='faq'",$db);
	$myrow=mysql_fetch_array($result);
	
	$view=$myrow["view"]+1;
	$result=mysql_query("UPDATE page SET view='$view' WHERE page='faq'");
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
		<link rel="stylesheet" type="text/css" href="css/jquery.accordion.css">
		<title>Стальные Конструкции &laquo;Ваш Выбор&raquo; &ndash; <?=$myrow['title']?></title>
	</head>
	<body>
		<?
			include('blocks/header.php');
		?>
		<div id="main">
			<h1><?=$myrow['title']?></h1>
			<?=$myrow['text']?>
			<div id="accordion">
				<?
					$result=mysql_query("SELECT * FROM faq",$db);
					$myrow=mysql_fetch_array($result);
					
					do
						printf(
						'
							<h3><a href="#">%s</a></h3>
							<div><p>%s</p></div>
						', $myrow["question"], $myrow["answer"]);
					while($myrow=mysql_fetch_array($result));
				?>
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
<script type="text/javascript" src="js/jquery.accordion.js"></script>