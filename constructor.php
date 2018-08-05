<?
	include("blocks/db.php");
	
	$result=mysql_query("SELECT * FROM page WHERE page='constructor'",$db);
	$myrow=mysql_fetch_array($result);
	
	$view=$myrow["view"]+1;
	$result=mysql_query("UPDATE page SET view='$view' WHERE page='constructor'");
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
		<link rel="stylesheet" type="text/css" href="css/jquery.slider.tooltip.css">
		<link rel="stylesheet" type="text/css" href="css/page.constructor.css">
		<title>Стальные Конструкции &laquo;Ваш Выбор&raquo; &ndash; <?=$myrow['title']?></title>
	</head>
	<body>
		<?
			include('blocks/header.php');
		?>
		<div id="main">
			<h1 id='shuffle'><?=$myrow['title']?></h1>
			<?=$myrow['text']?>
			<?
				// Выборка информации по элементам конструкции из базы
				$result=mysql_query("SELECT * FROM price_list",$db);
				$prices=mysql_fetch_array($result);
				
				do
				{
					$price[$prices['name']]=$prices['value'];
					$description[$prices['name']]=$prices['description'];
				}
				while($prices=mysql_fetch_array($result));
			?>
				
			<form id='constructor' action="order.pdf.php" method="post">
				<div id="changeprice1"></div><?//Визуализация динамики цен?>
				<div id="choose_type"><?//Выбор типа конструкции?>
					<div id="type_arrows"></div>
					<?
						for($i=1;$i<5;$i++)//Типы конструкции
						echo
						'
							<label class="type_unit" id="type_'.$i.'" title=\''.$description['type_'.$i].'\'>
								<input class="type_radio" type="radio" name="type" value="'.$i.'" price="'.$price['type_'.$i].'">
							</label>
						';
					?>
					<div class="clear"></div>
				</div>
				
				<div id="other_options">
				<div id="change_type">Сменить тип конструкции</div>
					<div id="result"><?//Визуализация получившейся двери?>
						<div id="img">
							<div id='pokr'></div><?//Покрытие - основной цвет?>
							<div id='frez'></div><?//Фрезировка для МДФ?>
							<div id='nali'></div><?//Наличник?>
							<div id='nalil'></div><?//Подсветка к наличнику?>
							<div id='nalifrez'></div><?//Фрезерованный Наличник?>
							<div id='thrd'></div><?//Градиент для придания объёма?>
							<div id='nalinone'></div><?//Наличник отсутствует?>
							<div id="eye"></div><?//Глазок?>
							<div id='window'></div><?//Декоративное окно?>
							<div id='nakll'></div><?//Накладка?>
							<div id='handle'></div><?//Ручка?>
							<div id='inner_side'><?//Внутренняя сторона?>
								<div id='inner_home'></div><?//Домашний интерьер?>
								<div id='inner_frez'></div><?//Фрезировка для внутренней МДФ?>
								<div id='inner_thrd'></div><?//Градиент для придания объёма внутри?>
								<div id='inner_eye'></div><?//Глазок изнутри?>
								<div id='inner_handle'></div><?//Ручка изнутри?>
								<div id='inner_keyhole'></div><?//Накладка?>
							</div>
							<div id='butt'></div><?//Петли?>
						</div>
						<div id="order">
							<div id="summ">
								<div id="price_sign">Стоимость</div>
								<strong>не определена<!--<span></span><i> рублей</i>--></strong>
							</div><?//Калькулятор/ценник?>
							<input name="price" type="hidden" value="12500"><?//Надо, чтобы калькулятор обновлял и этот ценник?>
							<input type="submit" id="order_button" value="Заказать">
						</div>
					</div>

					<div id="bricks"><?//Конструктор?>
						<div class="selectionblock"><?//Наличник?>
							<div class="ChooseClass">
								<div class="tip" title="Придаёт законченный эстетичный внешний вид изделию."></div>
								<h5>Наличник</h5>
								<select id="lego_nalich" name="nalich">
									<option value="<?=$price["nalich_no"]?>">Отсутствует</option>
									<option id="decor_nali" value="<?=$price["nalich_decor"]?>" selected="selected">Декоративный</option>
									<option id="frez_nali" value="<?=$price["nalich_frez"]?>">Фрезерованный</option>
								</select>
							</div>
							<input name="nalich_POST" type="hidden" value="Декоративный">
							<div class="ChooseIm" id="nalichs"></div><?//Можно сюда впендюрить виды фрезированных наличников?>
						</div>
						<hr class="constrhr">

						<div class="selectionblock"><?//Внешняя отделка?>
							<div class="ChooseClass">
								<div class="tip" title="Декоративное покрытие, наносимое на внешнюю сторону полотна двери. Придаёт изделию оригинальный внешний вид."></div>
								<h5>Внешняя отделка</h5>
								<select id="lego_out_otd">
									<option value="<?=$price["out_otd_por"]?>">Порошковое напыление</option>
									<option value="<?=$price["out_otd_col"]?>">Молотковая эмаль</option>
									<!--<option value="<?=$price["out_otd_vin"]?>">Винилискожа</option>-->
									<option value="<?=$price["out_otd_mdfpvh10"]?>">ПВХ на МДФ(10мм)</option>
									<option value="<?=$price["out_otd_mdfpvh16"]?>">ПВХ на МДФ(16мм)</option>
									<option value="<?=$price["out_otd_mdfpla10"]?>">Пластик на МДФ(10мм)</option>
									<option value="<?=$price["out_otd_mdfpla16"]?>">Пластик на МДФ(16мм)</option>
									<option value="<?=$price["out_otd_mdfshp10"]?>">Шпон на МДФ(10мм)</option>
									<option value="<?=$price["out_otd_mdfshp16"]?>">Шпон на МДФ(16мм)</option>
									<!--<option value="<?=$price["out_otd_mas"]?>">Массив</option>-->
								</select>
							</div>
							<div class="ChooseIm"><?//Выбор цвета выбранного типа покрытия?>
								<div class="thebutton" id="out_otd_button"></div>
								<div class="thebutton" id="out_otd_por_button"></div>
								<div class="thebutton" id="out_otd_mol_button"></div>
								<div class="thebutton" id="out_otd_shpon_button"></div>
								<div class="thebutton" id="out_otd_plastic_button"></div>
							</div>
							<input id="out_otd_POST" name="out_otd_POST" type="hidden" value="Порошковое напыление">
							<input id="out_otd_model" name="out_otd_model" type="hidden" value="por_blue"><?//Записываем информацию о модели(цвете) выбранного типа покрытия?>
						</div>
						<hr class="constrhr">

						<div id="out_frez_show"><?//Внешняя фрезировка?>
							<div class="selectionblock">
								<div class="ChooseClass">
									<div class="tip" title="Декоративный рисунок, выфрезированный на поверхности МДФ-накладок."></div>
									<h5>Внешняя фрезеровка</h5>
									<select id="out_frez" name="out_frez">
										<option value="0">Отсутствует</option>
										<option value="1" selected="selected">Присутствует</option>
									</select>
								</div>
								<div class="ChooseIm">
									<div class="thebutton" id="out_frez_button"></div>
								</div>
								<input id="out_otd_col_model" name="out_otd_col_model" type="hidden" value="14-2">
							</div>
						</div>
						<hr class="constrhr">

						<div class="selectionblock"><?//Внутренняя отделка?>
							<div class="ChooseClass">
								<div class="tip" title="Декоративное покрытие, наносимое на внутреннюю сторону полотна двери."></div>
								<h5>Внутренняя отделка</h5>
								<select id="lego_in_otd" name="in_otd">
									<option value="<?=$price["in_otd_hdf"]?>">ХДФ покрытие</option>
									<option id="inner_por" value="<?=$price["in_otd_por"]?>" disabled="disabled">Порошковое напыление</option>
									<option value="<?=$price["in_otd_col"]?>">Молотковая эмаль</option>
									<!--<option value="<?=$price["in_otd_vin"]?>">Винилискожа</option>-->
									<option value="<?=$price["in_otd_mdfpvh10"]?>">ПВХ на МДФ(10мм)</option>
									<option value="<?=$price["in_otd_mdfpvh16"]?>">ПВХ на МДФ(16мм)</option>
									<option value="<?=$price["in_otd_mdfpla10"]?>">Пластик на МДФ(10мм)</option>
									<option value="<?=$price["in_otd_mdfpla16"]?>">Пластик на МДФ(16мм)</option>
									<option value="<?=$price["in_otd_mdfshp10"]?>">Шпон на МДФ(10мм)</option>
									<option value="<?=$price["in_otd_mdfshp16"]?>">Шпон на МДФ(16мм)</option>
									<!--<option value="<?=$price["in_otd_mas"]?>">Массив</option>-->
								</select>
							</div>
							<div class="ChooseIm">
								<div class="thebutton" id="in_otd_button"></div>
								<div class="thebutton" id="in_otd_hdf_button"></div>
								<div class="thebutton" id="in_otd_por_button"></div>
								<div class="thebutton" id="in_otd_mol_button"></div>
								<div class="thebutton" id="in_otd_shpon_button"></div>
								<div class="thebutton" id="in_otd_plastic_button"></div>
							</div>
							<input id="in_otd_POST" name="in_otd_POST" type="hidden" value="ХДФ покрытие">
							<input id="in_otd_model" name="in_otd_model" type="hidden" value="hdf_buk">
						</div>
						<hr class="constrhr">

						<div id="in_frez_show"><?//Внутренняя фрезировка?>
							<div class="selectionblock">
								<div class="ChooseClass">
									<div class="tip" title="Декоративный рисунок, выфрезированный на поверхности МДФ-накладок."></div>
									<h5>Внутренняя фрезеровка</h5>
									<select id="in_frez" name="in_frez">
										<option value="0">Отсутствует</option>
										<option value="1" selected="selected">Присутствует</option>
									</select>
								</div>
								<div class="ChooseIm">
									<div class="thebutton" id="in_frez_button"></div>
								</div>
								<input id="in_otd_col_model" name="in_otd_col_model" type="hidden" value="classica874">
							</div>
						</div>
						<hr class="constrhr">

						<div class="selectionblock"><?//Ручки?>
							<div class="ChooseClass">
								<div class="tip" title="Обычно используются хромированные, позолоченные, с эффектом старой меди или бронзы."></div>
								<h5>Ручки</h5>
								<select id="lego_handles" name="handles">
									<option value="0">Декоративные</option> <?//Закинуть?>
									<option value="500">Офисные</option>   <?//все цены в?>
									<option value="4000">Парадные</option><?//базу данных?>
								</select>
							</div>
							<div class="ChooseIm"><div class="thebutton" id="handles_button"></div></div>
							<input id="handles_model" name="handles_model" type="hidden" value="cannello">
						</div>
						<hr class="constrhr">

						<div class="selectionblock"><?//Верхний замок?>
							<div class="ChooseClass">
								<div class="tip" title="Основной элемент конструкции, который обеспечивает безопасность Вашему дому."></div>
								<h5>Верхний замок</h5>
								<select id="lego_lock1" name="lock1">
									<option value="0">Не нужен</option>
									<optgroup label="Отечественные">
										<option value="<?=$price["lock_1"]?>">Гардиан</option>
										<option value="<?=$price["lock_6"]?>">Крит (противопожарный)</option>
										<option value="<?=$price["lock_2"]?>">Эльбор</option>
									</optgroup>
									<optgroup label="Импортные">
										<option value="<?=$price["lock_4"]?>">CISA</option>
										<option value="<?=$price["lock_3"]?>">Kale</option>
										<option value="<?=$price["lock_5"]?>">Mottura</option>
									</optgroup>
								</select>
							</div>
							<div class="ChooseIm">
								<div class="thebutton" id="locks_button"></div>
							</div>
							<input id="locks_model" name="locks_model" type="hidden" value="gardian3011">
						</div>
						<hr class="constrhr">

						<div class="selectionblock"><?//Нижний замок?>
							<div class="ChooseClass">
								<div class="tip" title="Дополнительная защита никому не повредит!"></div>
								<h5>Нижний замок</h5>
								<select id="lego_lock2" name="lock2">
									<option value="0">Не нужен</option>
									<optgroup label="Отечественные">
										<option value="<?=$price["lock_1"]?>">Гардиан</option>
										<option value="<?=$price["lock_6"]?>">Крит (противопожарный)</option>
										<option value="<?=$price["lock_2"]?>">Эльбор</option>
									</optgroup>
									<optgroup label="Импортные">
										<option value="<?=$price["lock_4"]?>">CISA</option>
										<option value="<?=$price["lock_3"]?>">Kale</option>
										<option value="<?=$price["lock_5"]?>">Mottura</option>
									</optgroup>
								</select>
							</div>
							<div class="ChooseIm">
								<div class="thebutton" id="locks2_button"></div>
							</div>
							<input id="locks2_model" name="locks2_model" type="hidden" value="elbor">
						</div>
						<hr class="constrhr">

						<div class="selectionblock"><?//Личинка?>
							<div class="ChooseClass">
								<div class="tip" title="Служит для открывания цилиндровых замков. Не является основным средством защиты! В дополнение необходимо использовать замки сувальдного типа."></div>
								<h5>Личинка</h5>
								<select id="lego_lich" name="lich">
									<option value="<?=$price["lich_1"]?>">Перфорированная с вертушкой</option>
									<option value="<?=$price["lich_2"]?>">CISA</option>
									<option value="<?=$price["lich_3"]?>">KALE</option>
									<option value="<?=$price["lich_4"]?>">MOTTURA</option>
								</select>
							</div>
							<div class="ChooseIm">
								<div class="thebutton" id="lich_button"></div>
							</div>
							<input id="lich_model" name="lich_model" type="hidden" value="apeks">
						</div>
						<hr class="constrhr">

						<div class="selectionblock"><?//Броненакладка?>
							<div class="ChooseClass">
								<div class="tip" title="Защищают цилиндровый механизм замка от выбивания или высверливания и придает изделию законченный эстетический внешний вид."></div>
								<h5>Броненакладки</h5>
								<select id="lego_nakl" name="nakl">
									<option value="<?=$price["nakl_1"]?>">Отсутсвует</option>
									<option value="<?=$price["nakl_2"]?>">Накладная</option>
									<option value="<?=$price["nakl_3"]?>">Врезная</option>
								</select>
							</div>
							<div class="ChooseIm">
								<div class="thebutton" id="nakl_button"></div>
							</div>
							<input id="nakl_model" name="nakl_model" type="hidden" value="bulava">
						</div>
					</div>
					<div class="clear"></div>

					<h5 id="addopt">Дополнительные опции</h5>
					<label class="dops" id="lego_zerkalo" title="Зеркало">
						<input type="checkbox" name="zerkalo" value="<?=$price["zerkalo"]?>" disabled="disabled">
					</label>
					<label class="dops" id="lego_hole" title="Декоративное окно">
						<input type="checkbox" name="hole" value="<?=$price["hole"]?>">
					</label>
					<label class="dops" id="lego_dovod" title="Доводчик">
						<input type="checkbox" name="dovod" value="<?=$price["dovod"]?>">
					</label>
					<label class="dops" id="lego_polim" title="Полимерное защитное покрытие под порошок">
						<input type="checkbox" name="polim" value="<?=$price["polim"]?>">
					</label>
					<label class="dops" id="lego_glaz" title="Глазок">
						<input type="checkbox" name="glaz" value="<?=$price["glaz"]?>" checked="checked">
					</label>
					<label class="dops" id="lego_zadv" title="Задвижка">
						<input type="checkbox" name="zadv" value="<?=$price["zadv"]?>">
					</label>
					<label class="dops" id="lego_warm" title="Утепление коробки">
						<input type="checkbox" name="warm" value="<?=$price["warm"]?>">
					</label>
					<label class="dops" id="lego_demont" title="Демонтаж">
						<input type="checkbox" name="demont" value="<?=$price["demont"]?>">
					</label>
					<label class="dops" id="lego_service" title="Доставка и установка">
						<input type="checkbox" name="service" value="<?=$price["service"]?>">
					</label>
					<div class="clear"></div>

					<div id="hide_deliv"><?//Слайдер загородной доставки?>
						<label>
							<input type="checkbox" id="checkdel" name="city" value="city">
							Доставка за город<span class="hide_fardeliv">. Дистанция: <span id="amount">50</span></span>
						</label>
						<input type="hidden" id="delivery" name="country" value="country">
						<div class="hide_fardeliv" id="slider-range"></div>
					</div> 

					<div id="another_order_button">
						<input type="submit" id="orderforming" value="Заказать">
					</div>
					
					<p id="lego_subtext">
						<i><b>Примечание.</b> Толщина стального листа двери &mdash; 2мм. При желании можно сделать 1мм или 1,5мм, чтобы облегчить или удешевить конструкцию.</i>
					</p>
					<p>
						<b>Внимание!</b> Калькулятор находится в стадии тестирования и показывает лишь примерную стоимость. Полученный вид вашей конструкции несёт <b>ознакомительный</b> характер и даёт лишь общее понятие о будущем изделии! Для более полного представления о внешнем виде, ценах, технических характеристиках и деталях конструкции необходимо посетить <a href="contacts.php">выставку</a>, либо позвонить по телефону <b>40&ndash;19&ndash;28</b> и получить консультацию специалиста!
					</p>
				</div>
			</form></br>

			<div id="select_window"><?//Модальное окно для выбора вида деталей?>
				<div id="shadow"></div>
				<div id="sel_gallery">
					<div id="cross"></div>
					
					<div id="out_otd_window">
						<h2>Выберите ПВХ для внешней МДФ-отделки:</h2>
						<?
							$lego_otd=mysql_query("SELECT title,name FROM lego_otd WHERE type=1 ORDER BY name",$db);
							$otd_list=mysql_fetch_array($lego_otd);
							
							do
								printf('<img class="gallery_element gallery_out_otd" src="lego/small/otd/%s.jpg" title="%s" model="%s">',$otd_list["title"], $otd_list["name"], $otd_list["title"]);
							while($otd_list=mysql_fetch_array($lego_otd));
						?>
					</div>

					<div id="out_otd_por_window">
						<h2>Выберите цвет порошкового напыления для внешней отделки:</h2>
						<?
							$lego_otd=mysql_query("SELECT title,name FROM lego_otd WHERE type=2 ORDER BY name",$db);
							$otd_list=mysql_fetch_array($lego_otd);
							
							do
								printf('<img class="gallery_element gallery_out_otd_por" src="lego/small/otd/%s.jpg" title="%s" model="%s">', $otd_list["title"], $otd_list["name"], $otd_list["title"]);
							while($otd_list=mysql_fetch_array($lego_otd));
						?>
					</div>

					<div id="out_otd_mol_window">
						<h2>Выберите цвет молотковой эмали для внешней отделки:</h2>
						<?
							$lego_otd=mysql_query("SELECT title,name FROM lego_otd WHERE type=3 ORDER BY name",$db);
							$otd_list=mysql_fetch_array($lego_otd);
							
							do
								printf('<img class="gallery_element gallery_out_otd_mol" src="lego/small/otd/%s.jpg" title="%s" model="%s">', $otd_list["title"], $otd_list["name"], $otd_list["title"]);
							while($otd_list=mysql_fetch_array($lego_otd));
						?>
					</div>

					<div id="out_otd_shpon_window">
						<h2>Выберите шпон для внешней МДФ-отделки:</h2>
						<?
							$lego_otd=mysql_query("SELECT title,name FROM lego_otd WHERE type=5 ORDER BY name",$db);
							$otd_list=mysql_fetch_array($lego_otd);
							
							do
								printf('<img class="gallery_element gallery_out_otd_shpon" src="lego/small/otd/%s.jpg" title="%s" model="%s">', $otd_list["title"], $otd_list["name"], $otd_list["title"]);
							while($otd_list=mysql_fetch_array($lego_otd));
						?>
					</div>

					<div id="out_otd_plastic_window">
						<h2>Выберите пластик для внешней МДФ-отделки:</h2>
						<?
							$lego_otd=mysql_query("SELECT title,name FROM lego_otd WHERE type=6 ORDER BY name",$db);
							$otd_list=mysql_fetch_array($lego_otd);
							
							do
								printf('<img class="gallery_element gallery_out_otd_plastic" src="lego/small/otd/%s.jpg" title="%s" model="%s">', $otd_list["title"], $otd_list["name"], $otd_list["title"]);
							while($otd_list=mysql_fetch_array($lego_otd));
						?>
					</div>

					<div id="out_frez_window">
						<h2>Выберите рисунок фрезеровки внешней панели:</h2>
						<?
							$lego_otd_col=mysql_query("SELECT * FROM lego_frez ORDER BY name",$db);
							$otd_col_list=mysql_fetch_array($lego_otd_col);
							
							do
								printf('<img class="gallery_element gallery_out_otd_col" src="lego/small/frez/%s.png" title="%s" model="%s">', $otd_col_list["title"], $otd_col_list["name"], $otd_col_list["title"]);
							while($otd_col_list=mysql_fetch_array($lego_otd_col));
						?>
					</div>

					<div id="in_otd_window">
						<h2>Выберите ПВХ для внутренней МДФ-отделки:</h2>
						<?
							$lego_otd=mysql_query("SELECT title,name FROM lego_otd WHERE type=1 ORDER BY name",$db);
							$otd_list=mysql_fetch_array($lego_otd);
							
							do
								printf('<img class="gallery_element gallery_in_otd" src="lego/small/otd/%s.jpg" title="%s" model="%s">', $otd_list["title"], $otd_list["name"], $otd_list["title"]);
							while($otd_list=mysql_fetch_array($lego_otd));
						?>
					</div>

					<div id="in_otd_hdf_window">
						<h2>Выберите ХДФ покрытие для внутренней отделки:</h2>
						<?
							$lego_otd=mysql_query("SELECT title,name FROM lego_otd WHERE type=4 ORDER BY name",$db);
							$otd_list=mysql_fetch_array($lego_otd);
							
							do
								printf('<img class="gallery_element gallery_in_otd_hdf" src="lego/small/otd/%s.jpg" title="%s" model="%s">', $otd_list["title"], $otd_list["name"], $otd_list["title"]);
							while($otd_list=mysql_fetch_array($lego_otd));
						?>
					</div>

					<div id="in_otd_por_window">
						<h2>Выберите цвет порошкового напыления для внутренней отделки:</h2>
						<?
							$lego_otd=mysql_query("SELECT title,name FROM lego_otd WHERE type=2 ORDER BY name",$db);
							$otd_list=mysql_fetch_array($lego_otd);
							
							do
								printf('<img class="gallery_element gallery_in_otd_por" src="lego/small/otd/%s.jpg" title="%s" model="%s">', $otd_list["title"], $otd_list["name"], $otd_list["title"]);
							while($otd_list=mysql_fetch_array($lego_otd));
						?>
					</div>

					<div id="in_otd_mol_window">
						<h2>Выберите цвет молотковой эмали для внутренней отделки:</h2>
						<?
							$lego_otd=mysql_query("SELECT title,name FROM lego_otd WHERE type=3 ORDER BY name",$db);
							$otd_list=mysql_fetch_array($lego_otd);
							
							do
								printf('<img class="gallery_element gallery_in_otd_mol" src="lego/small/otd/%s.jpg" title="%s" model="%s">', $otd_list["title"], $otd_list["name"], $otd_list["title"]);
							while($otd_list=mysql_fetch_array($lego_otd));
						?>
					</div>

					<div id="in_otd_shpon_window">
						<h2>Выберите шпон для внутренней МДФ-отделки:</h2>
						<?
							$lego_otd=mysql_query("SELECT title,name FROM lego_otd WHERE type=5 ORDER BY name",$db);
							$otd_list=mysql_fetch_array($lego_otd);
							
							do
								printf('<img class="gallery_element gallery_in_otd_shpon" src="lego/small/otd/%s.jpg" title="%s" model="%s">', $otd_list["title"], $otd_list["name"], $otd_list["title"]);
							while($otd_list=mysql_fetch_array($lego_otd));
						?>
					</div>

					<div id="in_otd_plastic_window">
						<h2>Выберите пластик для внутренней МДФ-отделки:</h2>
						<?
							$lego_otd=mysql_query("SELECT title,name FROM lego_otd WHERE type=6 ORDER BY name",$db);
							$otd_list=mysql_fetch_array($lego_otd);
							
							do
								printf('<img class="gallery_element gallery_in_otd_plastic" src="lego/small/otd/%s.jpg" title="%s" model="%s">', $otd_list["title"], $otd_list["name"], $otd_list["title"]);
							while($otd_list=mysql_fetch_array($lego_otd));
						?>
					</div>

					<div id="in_frez_window">
						<h2>Выберите рисунок фрезеровки внутренней панели:</h2>
						<?
							$lego_otd_col=mysql_query("SELECT * FROM lego_frez",$db);
							$otd_col_list=mysql_fetch_array($lego_otd_col);
							
							do
								printf('<img class="gallery_element gallery_in_otd_col" src="lego/small/frez/%s.png" title="%s" model="%s">', $otd_col_list["title"], $otd_col_list["name"], $otd_col_list["title"]);
							while($otd_col_list=mysql_fetch_array($lego_otd_col));
						?>
					</div>

					<div id="handles_window">
						<h2>Выберите ручку:</h2>
						<?
							$lego_handles=mysql_query("SELECT title,img FROM lego_handles",$db);
							$handles_list=mysql_fetch_array($lego_handles);
							
							do
								printf('<img class="gallery_element gallery_handles" src="lego/small/handles/%s" model="%s">', $handles_list["img"], $handles_list["title"]);
							while($handles_list=mysql_fetch_array($lego_handles));
						?>
					</div>

					<div id="locks_window">
						<h2>Выберите замок:</h2>
						<?
							$lego_locks=mysql_query("SELECT title,img FROM lego_locks",$db);
							$locks_list=mysql_fetch_array($lego_locks);
							
							do
								printf('<img class="gallery_element gallery_locks" src="lego/small/locks/%s" model="%s">', $locks_list["img"], $locks_list["title"]);
							while($locks_list=mysql_fetch_array($lego_locks));
						?>
					</div>

					<div id="lich_window">
						<h2>Выберите личинку:</h2>
						<?
							$lego_lich=mysql_query("SELECT title,img FROM lego_lich",$db);
							$lich_list=mysql_fetch_array($lego_lich);
							
							do
								printf('<img class="gallery_element gallery_lich" src="lego/small/lich/%s" model="%s">', $lich_list["img"], $lich_list["title"]);
							while($lich_list=mysql_fetch_array($lego_lich));
						?>
					</div>

					<div id="nakl_window">
						<h2>Выберите броненакладку:</h2>
						<?
							$lego_nakl=mysql_query("SELECT title,img FROM lego_nakl",$db);
							$nakl_list=mysql_fetch_array($lego_nakl);
							
							do
								printf('<img class="gallery_element gallery_nakl" src="lego/small/nakl/%s" model="%s">', $nakl_list["img"], $nakl_list["title"]);
							while($nakl_list=mysql_fetch_array($lego_nakl));
						?>
					</div>
					<div id="bottom_space"></div>
				</div>
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
<script type="text/javascript" src="js/shuffle.js"></script>
<script type="text/javascript" src="js/jquery.slider.tooltip.js"></script>
<script type="text/javascript" src="js/slimbox.js"></script>
<script type="text/javascript" src="js/page.constructor.js"></script>