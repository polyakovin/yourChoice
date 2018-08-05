<?
	include("blocks/db.php");
	
	$result=mysql_query("SELECT * FROM page WHERE page='sale'",$db);
	$myrow=mysql_fetch_array($result);
	
	$view=$myrow["view"]+1;
	$result=mysql_query("UPDATE page SET view='$view' WHERE page='sale'");
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
				
				$result=mysql_query("SELECT * FROM sale",$db);
				$myrow=mysql_fetch_array($result);
				
				do
					printf(
					'
						<table align="center" id="special_border">
							<tr>
								<td rowspan="2" id="special_border_left">
									<img height="200" src="img/sale/%s" alt="%s">
								</td>
								<td class="special_border_right">
									<h3 class="salehead">%s</h3>
								</td>
							</tr>
							<tr>
								<td class="special_border_right" id="special_border_right">
									<p>%s</p>
									<div id="sale_price">
										<span class="oldprice">%s руб.</span><br>
										%s руб.
									</div>
								</td>
							</tr>
						</table>
					', $myrow['img'], $myrow['title'], $myrow['title'], $myrow['description'], $myrow['old_price'], $myrow['new_price']);
				while($myrow=mysql_fetch_array($result));
			?>	
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