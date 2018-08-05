<?define('_JEXEC',1);
include("blocks/db.php");
$result=mysql_query("SELECT * FROM page WHERE page='special'",$db);
$myrow=mysql_fetch_array($result);
$view=$myrow["view"]+1;
$result=mysql_query("UPDATE page SET view='$view' WHERE page='special'");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="description" content="<?=$myrow['meta_d']?>">
<meta name="keywords" content="<?=$myrow['meta_k']?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?include("blocks/style.php");?>
<title>Стальные Конструкции "Ваш Выбор" - <?=$myrow['title']?></title></head>
<body>
<div id="body">
<?include('blocks/header.php');?>
<h1><?=$myrow['title']?></h1></div>
<div id="main">
<?echo$myrow['text'];
$result=mysql_query("SELECT * FROM special",$db);
$myrow=mysql_fetch_array($result);
do{printf('	<table align="center" id="special_border"><tr>
<td rowspan="2" id="special_border_left"><img height="200" src="img/special/%s" alt="%s"></td>
<td class="special_border_right"><h3 class="specialhead">%s</h3></td>
</tr>
<tr>
<td class="special_border_right"><p>%s</p></td>
</tr>
</table>',$myrow['img'],$myrow['title'],$myrow['title'],$myrow['description']);}
while($myrow=mysql_fetch_array($result));?>
</div>
<?include('blocks/bonus.php');?>
<?include('blocks/footer.php');?> 
</div>
</body>
</html>
