<?define('_JEXEC',1);
include("blocks/db.php");
if(isset($_POST['type'])){
	$type=$_POST['type'];
	switch($type){
		case 1:
			$type="Стандарт";
			break;
		case 2:
			$type="СуперКонтур Эконом";
			break;
		case 3:
			$type="СуперКонтур";
			break;
		case 4:
			$type="СуперКонтур Плюс";
			break;
	}
	$price=$_POST['price'];
	$nalich=$_POST['nalich_POST'];
	$out_otd=$_POST['out_otd_POST'];
	$out_otd_model=$_POST['out_otd_model'];$result=mysql_query("SELECT name,type FROM lego_otd WHERE title='$out_otd_model'",$db);$myrow=mysql_fetch_array($result);$out_otd_model=$myrow[0];$out_otd_type=$myrow[1];
	
	if(($_POST['out_frez']==1)&&($out_otd_type==1||$out_otd_type==5||$out_otd_type==6)){
		$out_otd_col_model=$_POST['out_otd_col_model'];
		$result=mysql_query("SELECT name FROM lego_frez WHERE title='$out_otd_col_model'",$db);
		$myrow=mysql_fetch_array($result);
		$out_otd_col_model=' - '.$myrow[0];
	}else $out_otd_col_model='';
	
	$in_otd=$_POST['in_otd_POST'];
	$in_otd_model=$_POST['in_otd_model'];$result=mysql_query("SELECT name,type FROM lego_otd WHERE title='$in_otd_model'",$db);$myrow=mysql_fetch_array($result);$in_otd_model=$myrow[0];$in_otd_type=$myrow[1];
	
	if(($_POST['in_frez']==1)&&($in_otd_type==1||$in_otd_type==5||$in_otd_type==6)){
		$in_otd_col_model=$_POST['in_otd_col_model'];
		$result=mysql_query("SELECT name FROM lego_frez WHERE title='$in_otd_col_model'",$db);
		$myrow=mysql_fetch_array($result);
		$in_otd_col_model=' - '.$myrow[0];
	}else $in_otd_col_model='';
	
	$handles=$_POST['handles_model'];
	$locks=$_POST['locks_model'];
	$locks2=$_POST['locks2_model'];
	$lich=$_POST['lich_model'];
	$nakl=$_POST['nakl_model'];
	if(isset($_POST['zerkalo']))$zerkalo="+";else $zerkalo="-";
	if(isset($_POST['hole']))$hole="+";else $hole="-";
	if(isset($_POST['dovod']))$dovod="+";else $dovod="-";
	if(isset($_POST['polim']))$polim="+";else $polim="-";
	if(isset($_POST['glaz']))$glaz="+";else $glaz="-";
	if(isset($_POST['zadv']))$zadv="+";else $zadv="-";
	if(isset($_POST['warm']))$warm="+";else $warm="-";
	if(isset($_POST['demont']))$demont="+";else $demont="-";
	if(isset($_POST['service']))$service="+";else $service="-";
	if(isset($_POST['city']))$city="+";else $city="-";
}?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="description" content="<?=$myrow['meta_d']?>">
<meta name="keywords" content="<?=$myrow['meta_k']?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?include("blocks/style.php");?>
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.order.min.css">
<link rel="stylesheet" type="text/css" href="css/order.css">
<title>Стальные Конструкции "Ваш Выбор" - <?=$myrow['title']?></title></head>
<body>
<div id="body">
<?include('blocks/header.php');?>
<h1><?=$myrow['title']?></h1></div>
<div id="main">


<h2>Параметры конструкции:</h2><p>
</br>
Тип конструкции: <?=$type?></br>
Наличник: <?=$nalich?></br>
Внешняя отделка: <?=$out_otd?> (<?=$out_otd_model?>)<?=$out_otd_col_model?></br>
Внутренняя отделка: <?=$in_otd?> (<?=$in_otd_model?>)<?=$in_otd_col_model?></br>
Тип внешней отделки: <?=$out_otd_type?></br>
Ручки: <span style="text-transform:capitalize"><?=$handles?></span></br>
Верхний замок: <span style="text-transform:capitalize"><?=$locks?></span></br>
Нижний замок: <span style="text-transform:capitalize"><?=$locks2?></span></br>
Личинка: <span style="text-transform:capitalize"><?=$lich?></span></br>
Броненакладка: <span style="text-transform:capitalize"><?=$nakl?></span></br>
Зеркало: <?=$zerkalo?></br>
Декоративное окно: <?=$hole?></br>
Доводчик: <?=$dovod?></br>
Полимерное защитное покрытие: <?=$polim?></br>
Глазок: <?=$glaz?></br>
Задвижка: <?=$zadv?></br>
Утепление коробки: <?=$warm?></br>
Демонтаж: <?=$demont?></br>
Доставка и установка: <?=$service?></br>
Доставка за город: <?=$city?></br>
Стоимость: <?=$price?></br>
</p>

<?$html='<table border="1"><tr><td>Пример 1</td><td>Пример 2</td><td>Пример 3</td><td>Пример 4</td></tr><tr><td>Пример 5</td><td>Пример 6</td><td>Пример 7</td><td><a href="http://mpdf.bpm1.com/" title="mPDF">mPDF</a></td></tr></table>

<h2>Параметры конструкции:</h2><p>
</br>
Тип конструкции: '.$type.'</br>
Наличник: '.$nalich.'</br>
Внешняя отделка: '.$out_otd.' ('.$out_otd_model.')'.$out_otd_col_model.'</br>
Внутренняя отделка: '.$in_otd.' ('.$in_otd_model.')'.$in_otd_col_model.'</br>
Тип внешней отделки: '.$out_otd_type.'</br>
Ручки: <span style="text-transform:capitalize">'.$handles.'</span></br>
Верхний замок: <span style="text-transform:capitalize">'.$locks.'</span></br>
Нижний замок: <span style="text-transform:capitalize">'.$locks2.'</span></br>
Личинка: <span style="text-transform:capitalize">'.$lich.'</span></br>
Броненакладка: <span style="text-transform:capitalize">'.$nakl.'</span></br>
Зеркало: '.$zerkalo.'</br>
Декоративное окно: '.$hole.'</br>
Доводчик: '.$dovod.'</br>
Полимерное защитное покрытие: '.$polim.'</br>
Глазок: '.$glaz.'</br>
Задвижка: '.$zadv.'</br>
Утепление коробки: '.$warm.'</br>
Демонтаж: '.$demont.'</br>
Доставка и установка: '.$service.'</br>
Доставка за город: '.$city.'</br>
Стоимость: '.$price.'</br>
</p>

';
include("mpdf/mpdf.php");
$mpdf = new mPDF('utf-8', 'A4', '8', '', 10, 10, 7, 7, 10, 10);
$mpdf->charset_in='utf-8';
$stylesheet=file_get_contents('css/order_download_pdf.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->list_indent_first_level=0; 
$mpdf->WriteHTML($html,2);/*формируем pdf*/
$mpdf->Output('vashvybor_order.pdf','I');?>



</div>
<?include('blocks/bonus.php');?>
<?include('blocks/footer.php');?> 
<script type="text/javascript" src="js/jquery-ui-1.10.3.order.min.js"></script>
</div>
</body>
</html>