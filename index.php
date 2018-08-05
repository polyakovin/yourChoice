<?
	include("blocks/db.php");
	
	$result=mysql_query("SELECT * FROM page WHERE page='index'",$db);
	$myrow=mysql_fetch_array($result);
	
	$view=$myrow["view"]+1;
	$result=mysql_query("UPDATE page SET view='$view' WHERE page='index'");
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
		<title>Стальные Конструкции &laquo;Ваш Выбор&raquo;</title>
	</head>
	<body>
		<?
			include('blocks/header.php');
		?>
		<div id="main">
			<h1 id="title"><?=$myrow['title']?></h1>
			<?=$myrow['text']?>
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
<script src="js/theArrow/transform.js"></script><?//Стрелочка, которая показывает, где меню?>
<script src="js/theArrow/jquery.pointpoint.js"></script>
<script src="js/page.index.js"></script>