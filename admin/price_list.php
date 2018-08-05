<?
	include("../blocks/db.php");
	
	$element[1] = array("var" => "type_1", "name" => "Стандартная Конструкция");
	$element[2] = array("var" => "type_2", "name" => "Супер Контур Эконом");
	$element[3] = array("var" => "type_3", "name" => "Супер Контур");
	$element[4] = array("var" => "type_4", "name" => "Супер Контур Плюс");
	$element[5] = array("var" => "nalich_no", "name" => "Отсутствует");
	$element[6] = array("var" => "nalich_decor", "name" => "Декоративный");
	$element[7] = array("var" => "nalich_frez", "name" => "Фрезированный");
	$element[8] = array("var" => "out_otd_por", "name" => "Порошок");
	$element[9] = array("var" => "out_otd_col", "name" => "Покраска");
	$element[10] = array("var" => "out_otd_vin", "name" => "Винилискожа");
	$element[11] = array("var" => "out_otd_mdfpvh10", "name" => "МДФ-ПВХ(10мм)");
	$element[12] = array("var" => "out_otd_mdfpvh16", "name" => "МДФ-ПВХ(16мм)");
	$element[13] = array("var" => "out_otd_mdfpla10", "name" => "МДФ-пластик(10мм)");
	$element[14] = array("var" => "out_otd_mdfpla16", "name" => "МДФ-пластик(16мм)");
	$element[15] = array("var" => "out_otd_mdfshp10", "name" => "МДФ-шпон(10мм)");
	$element[16] = array("var" => "out_otd_mdfshp16", "name" => "МДФ-шпон(16мм)");
	$element[17] = array("var" => "out_otd_mas", "name" => "Массив");
	$element[18] = array("var" => "in_otd_por", "name" => "Порошок");
	$element[19] = array("var" => "in_otd_col", "name" => "Покраска");
	$element[20] = array("var" => "in_otd_vin", "name" => "Винилискожа");
	$element[21] = array("var" => "in_otd_mdfpvh10", "name" => "МДФ-ПВХ(10мм)");
	$element[22] = array("var" => "in_otd_mdfpvh16", "name" => "МДФ-ПВХ(16мм)");
	$element[23] = array("var" => "in_otd_mdfpla10", "name" => "МДФ-пластик(10мм)");
	$element[24] = array("var" => "in_otd_mdfpla16", "name" => "МДФ-пластик(16мм)");
	$element[25] = array("var" => "in_otd_mdfshp10", "name" => "МДФ-шпон(10мм)");
	$element[26] = array("var" => "in_otd_mdfshp16", "name" => "МДФ-шпон(16мм)");
	$element[27] = array("var" => "in_otd_mas", "name" => "Массив");
	$element[28] = array("var" => "in_otd_hdf", "name" => "ХДФ");
	$element[29] = array("var" => "zerkalo", "name" => "Зеркало");
	$element[30] = array("var" => "hole", "name" => "Декоративное окно");
	$element[31] = array("var" => "lich_1", "name" => "Перфорированная с вертушкой");
	$element[32] = array("var" => "lich_2", "name" => "CISA");
	$element[33] = array("var" => "lich_3", "name" => "MOTTURA");
	$element[34] = array("var" => "nakl_1", "name" => "Стандартная накладка");
	$element[35] = array("var" => "nakl_2", "name" => "Накладная броненакладка");
	$element[36] = array("var" => "nakl_3", "name" => "Врезная броненакладка");
	$element[37] = array("var" => "lock_1", "name" => "1 класс");
	$element[38] = array("var" => "lock_2", "name" => "2 класс");
	$element[39] = array("var" => "lock_3", "name" => "3 класс");
	$element[40] = array("var" => "lock_4", "name" => "4 класс");
	$element[41] = array("var" => "lock_5", "name" => "5 класс");
	$element[42] = array("var" => "lock_6", "name" => "6 класс");
	$element[43] = array("var" => "lock_7", "name" => "7 класс");
	$element[44] = array("var" => "glaz", "name" => "Глазок");
	$element[45] = array("var" => "zadv", "name" => "Задвижка");
	$element[46] = array("var" => "warm", "name" => "Утеплитель");
	$element[47] = array("var" => "demont", "name" => "Демонтаж двери");
	$element[48] = array("var" => "service", "name" => "Доставка и установка");
	
	for($i=1;$i<49;$i++)
	{
		if(isset($_POST[$element[$i]["var"]]))
		{
			$element[$i]["val"]=$_POST[$element[$i]["var"]];
			if($element[$i]["val"]=="")
				unset($element[$i]["val"]);
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?
			include("blocks/style.php");
		?>
		<style>h2{margin:7px 0 3px 0} input[type="text"]{width:150px} #submit{width:150px;height:50px}</style>
		<title>Редактор цен в Конструкторе сайта &laquo;ВашВыбор67.рф&raquo;</title>
	</head>
	<body>
		<?
			include('blocks/header.php');
		?>
		<div id="main">
			<h1>Редактор цен в Конструкторе</h1>
			<?
				if(isset($element[1]["val"]) && isset($element[2]["val"]) && isset($element[3]["val"]) && isset($element[4]["val"]))
				{
					for($i=1;$i<49;$i++)
						mysql_query("UPDATE price_heavy SET value='$element[$i][\"val\"]' WHERE name='$element[$i][\"var\"]'");
					
					echo"<h3>Информация в базе успешно обновлена, спасибо!<br><a href='index.php'>Вернуться на Главную</a></h3>";
				}
				else
				{
					$result=mysql_query("SELECT * FROM price_list",$db);
					$pst=mysql_fetch_array($result);
					
					do
						$prst[$pst['name']]=$pst['value'];
					while($pst=mysql_fetch_array($result));

					echo
					'
						<form method="post" action="">	
							<h2>Базовая стоимость</h2>
					';
					for($i=1;$i<5;$i++)
						echo
						'
							<label>
								'.$element[$i]["name"].'<br>
								<input type="text" name="'.$element[$i]["var"].'" value="'.$prst[$element[$i]["var"]].'">
							</label><br>
						';
					
					echo'<h2>Наличник</h2>';
					for($i=5;$i<8;$i++)
						echo
						'
							<label>
								'.$element[$i]["name"].'<br>
								<input type="text" name="'.$element[$i]["var"].'" value="'.$prst[$element[$i]["var"]].'">
							</label><br>
						';
					
					echo'<h2>Наружняя отделка</h2>';
					for($i=8;$i<18;$i++)
						echo
						'
							<label>
								'.$element[$i]["name"].'<br>
								<input type="text" name="'.$element[$i]["var"].'" value="'.$prst[$element[$i]["var"]].'">
							</label><br>
						';
					
					echo'<h2>Внутренняя отделка</h2>';
					for($i=18;$i<31;$i++)
						echo
						'
							<label>
								'.$element[$i]["name"].'<br>
								<input type="text" name="'.$element[$i]["var"].'" value="'.$prst[$element[$i]["var"]].'">
							</label><br>
						';
					
					echo'<h2>Личинки</h2>';
					for($i=31;$i<34;$i++)
						echo
						'
							<label>
								'.$element[$i]["name"].'<br>
								<input type="text" name="'.$element[$i]["var"].'" value="'.$prst[$element[$i]["var"]].'">
							</label><br>
						';
					
					echo'<h2>Броненакладки</h2>';
					for($i=34;$i<37;$i++)
						echo
						'
							<label>
								'.$element[$i]["name"].'<br>
								<input type="text" name="'.$element[$i]["var"].'" value="'.$prst[$element[$i]["var"]].'">
							</label><br>
						';
					
					echo'<h2>Замки</h2>';
					for($i=37;$i<44;$i++)
						echo
						'
							<label>
								'.$element[$i]["name"].'<br>
								<input type="text" name="'.$element[$i]["var"].'" value="'.$prst[$element[$i]["var"]].'">
							</label><br>
						';
					
					echo'<h2>Дополнительно</h2>';
					for($i=44;$i<49;$i++)
						echo
						'
							<label>
								'.$element[$i]["name"].'<br>
								<input type="text" name="'.$element[$i]["var"].'" value="'.$prst[$element[$i]["var"]].'">
							</label><br>
						';
					echo
					'
							<input id="submit" type="submit" value="Поменять цены">
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