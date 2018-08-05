<?
	$db=mysql_connect("localhost","admin","1234");
	mysql_select_db("noggatur_vashvybor",$db);

	mysql_query("SET NAMES utf8");
	
	if(isset($_POST['type']))
	{
		$type=$_POST['type'];
		switch($type)
		{
			case 1:
				$type="Стандарт";
				$sealing=1;
				break;
			case 2:
				$type="СуперКонтур Эконом (П2-эконом)";
				$sealing=2;
				break;
			case 3:
				$type="СуперКонтур (П2)";
				$sealing=2;
				break;
			case 4:
				$type="СуперКонтур Плюс (П3)";
				$sealing=4;
				break;
		}
		
		$price=(int)$_POST['price'];
		$nalich=$_POST['nalich_POST'];
		$out_otd=$_POST['out_otd_POST'];
		$out_otd_model=$_POST['out_otd_model'];
		
		$result=mysql_query("SELECT name,type FROM lego_otd WHERE title='$out_otd_model'",$db);
		$myrow=mysql_fetch_array($result);
		
		$out_otd_model=$myrow[0];
		$out_otd_type=$myrow[1];
		
		if(($_POST['out_frez']==1) && ($out_otd_type==1||$out_otd_type==5 || $out_otd_type==6))
		{
			$out_otd_col_model=$_POST['out_otd_col_model'];
			
			$result=mysql_query("SELECT name FROM lego_frez WHERE title='$out_otd_col_model'",$db);
			$myrow=mysql_fetch_array($result);
			
			$out_otd_col_model=' - '.$myrow[0];
		}
		else
			$out_otd_col_model='';
		
		$in_otd=$_POST['in_otd_POST'];
		$in_otd_model=$_POST['in_otd_model'];
		
		$result=mysql_query("SELECT name,type FROM lego_otd WHERE title='$in_otd_model'",$db);
		$myrow=mysql_fetch_array($result);
		
		$in_otd_model=$myrow[0];
		$in_otd_type=$myrow[1];
		
		if(($_POST['in_frez']==1) && ($in_otd_type==1 || $in_otd_type==5 || $in_otd_type==6))
		{
			$in_otd_col_model=$_POST['in_otd_col_model'];
			
			$result=mysql_query("SELECT name FROM lego_frez WHERE title='$in_otd_col_model'",$db);
			$myrow=mysql_fetch_array($result);
			
			$in_otd_col_model=' - '.$myrow[0];
		}
		else
			$in_otd_col_model='';
		
		$handles=$_POST['handles_model'];
		$locks=$_POST['locks_model'];
		$locks2=$_POST['locks2_model'];
		$lich=$_POST['lich_model'];
		$nakl=$_POST['nakl_model'];
		
		if(isset($_POST['zerkalo']))
			$zerkalo="+";
		else
			$zerkalo="&mdash;";
			
		if(isset($_POST['hole']))
			$hole="+";
		else
			$hole="&mdash;";
			
		if(isset($_POST['$grille']))
			$grille="+";
		else
			$grille="&mdash;";
			
		if(isset($_POST['dovod']))
			$dovod="+";
		else
			$dovod="&mdash;";
			
		if(isset($_POST['polim']))
			$polim="+";
		else
			$polim="&mdash;";
		
		if(isset($_POST['glaz']))
			$glaz="+";
		else
			$glaz="&mdash;";
		
		if(isset($_POST['zadv']))
			$zadv="+";
		else
			$zadv="&mdash;";
		
		if(isset($_POST['warm']))
			$warm="мин. Вата KNAUF";
		else
			$warm="&mdash;";
		
		if(isset($_POST['demont']))
			$demont="+";
		else
			$demont="&mdash;";
		
		if(isset($_POST['service']))
		{
			$service="+";
			$foam="+";
		}
		else
		{
			$service="&mdash;";
			$foam="&mdash;";
		}
		
		if(isset($_POST['city']))
			$city="За город";
		else
			$city="В черте города";
	}

	$surname="Иванов";
	$name="Пётр";
	$patronymic="Сидорович";
	$address="ул. Нахимова д. 15 кв. 36";
	$tel_1="+7 (920) 306-78-56";
	$tel_2="+7 (915) 365-45-78";
	
	if(isset($tel_2))
		$tel_2="; ".$tel_2;
	else
		$tel_2="";

	$nakl="Врезная";

	$width="95";
	$height="205";
	
	$opening="out";
	if($opening=="in")
	{
		$opening="Наружний";
		$view="лестничной<br><br>площадки";
	}
	else
	{
		$opening="Внутренний";
		$view="помещения";
	}
	
	$butts="Правые";
	$preorder=5000;
	$etage=7;
	$afterorder = $price - $preorder;
	$glaz_height=150;
	$dops="Упаковка";

	$html=
	'
		<body>
			<h2>
				Компания <strong>*Ваш Выбор*</strong>, ИП Поляков Н.&nbsp;А.<br>
				Адрес выставки: г. Смоленск, ул. Академика Петрова, д.2<br>
				Телефоны: +7&nbsp;(4812)&nbsp;40‒19‒28; +7&nbsp;(920)&nbsp;304‒48‒07<br>
				Сайт компании: http://вашвыбор67.рф<br>
				<br>
				ОГРН: 306673125400070<br>
				ИНН: 672901938100
			</h2>
			<br><br>

			<h1>
				Заказ №________<br>
				на изготовление металлической двери
			</h1>

			<table border="0">
				<tr>
					<td class="lefthalf">от:</td>
					<td class="righthalf">'.date(d).'.'.date(m).'.'.date(Y).'&nbsp;г.</td>
				</tr>
				<tr>
					<td class="lefthalf">Дата установки:</td>
					<td class="righthalf">_____________</td>
				</tr>
			</table>

			<table border="0">
				<tr>
					<td class="leftquarter">ФИО Заказчика:</td>
					<td class="right3quarters">'.$surname.' '.$name.' '.$patronymic.'</td>
				</tr>
				<tr>
					<td class="leftquarter">Адрес установки:</td>
					<td class="right3quarters">'.$address.'</td>
				</tr>
				<tr>
					<td class="leftquarter">Контактный телефон:</td>
					<td class="right3quarters">'.$tel_1.$tel_2.'</td>
				</tr>
			</table>
			<hr>

			<table border="0">
				<tr>
					<td class="left2thirds">
						<table border="0" class="parameter_table">
							<tr>
								<td class="first_third">Тип конструкции:</td>
								<td class="second_third">'.$type.'</td>
							</tr>
							<tr>
								<td class="first_third">Тип открывания:</td>
								<td class="second_third">'.$opening.'</td>
							</tr>
							<tr>
								<td class="first_third">Петли:</td>
								<td class="second_third">'.$butts.' (на подшипниках)</td>
							</tr>
							<tr>
								<td class="first_third">Резиновые уплотнители:</td>
								<td class="second_third">'.$sealing.'</td>
							</tr>
							<tr>
								<td class="first_third">Утепление коробки:</td>
								<td class="second_third">'.$warm.'</td>
							</tr>
							<tr>
								<td class="first_third">Наличник:</td>
								<td class="second_third">'.$nalich.' с 3х сторон</td>
							</tr>
							<tr>
								<td class="first_third">Внешняя отделка:</td>
								<td class="second_third">'.$out_otd.' ('.$out_otd_model.')'.$out_otd_col_model.'</td>
							</tr>
							<tr>
								<td class="first_third">Внутренняя отделка:</td>
								<td class="second_third">'.$in_otd.' ('.$in_otd_model.')'.$in_otd_col_model.'</td>
							</tr>
							<tr>
								<td class="first_third">Дверные ручки:</td>
								<td class="second_third" style="text-transform:capitalize">'.$handles.'</td>
							</tr>
							<tr>
								<td class="first_third">Верхний замок:</td>
								<td class="second_third" style="text-transform:capitalize">'.$locks.'</td>
							</tr>
							<tr>
								<td class="first_third">Нижний замок:</td>
								<td class="second_third" style="text-transform:capitalize">'.$locks2.'</td>
							</tr>
							<tr>
								<td class="first_third">Цилиндровый механизм:</td>
								<td class="second_third" style="text-transform:capitalize">'.$lich.'</td>
							</tr>
							<tr>
								<td class="first_third">Броненакладка:</td>
								<td class="second_third">'.$nakl.'</td><!
							</tr>
							<tr>
								<td class="first_third">Зеркало:</td>
								<td class="second_third">'.$zerkalo.'</td>декоративная решётка
							</tr>
							<tr>
								<td class="first_third">Декоративное окно:</td>
								<td class="second_third">'.$hole.'</td>
							</tr>
							<tr>
								<td class="first_third">Декоративная решётка:</td>
								<td class="second_third">'.$grille.'</td>
							</tr>
							<tr>
								<td class="first_third">Доводчик:</td>
								<td class="second_third">'.$dovod.'</td>
							</tr>
							<tr>
								<td class="first_third">Обработка полимером:</td>
								<td class="second_third">'.$polim.'</td>
							</tr>
							<tr>
								<td class="first_third">Глазок:</td>
								<td class="second_third">'.$glaz.'</td>
							</tr>
							<tr>
								<td class="first_third">Высота глазка от пола:</td>
								<td class="second_third" style="text-transform:lowercase">'.$glaz_height.' см</td>
							</tr>
							<tr>
								<td class="first_third">Задвижка:</td>
								<td class="second_third">'.$zadv.'</td>
							</tr>
							<tr>
								<td class="first_third">Дополнительные элементы:</td>
								<td class="second_third">'.$dops.'</td>
							</tr>
							<tr>
								<td class="first_third">Демонтаж:</td>
								<td class="second_third">'.$demont.'</td>
							</tr>
							<tr>
								<td class="first_third">Доставка и установка:</td>
								<td class="second_third">'.$service.'</td>
							</tr>
							<tr>
								<td class="first_third">Монтажная пена:</td>
								<td class="second_third">'.$foam.'</td>
							</tr>
							<tr>
								<td class="first_third">Доставка:</td>
								<td class="second_third">'.$city.'; '.$etage.' этаж</td>
							</tr>
						</table>
					</td>
					<td class="rightthird">
						<table border="0">
							<tr>
								<td class="door_left"></td>
								<td class="door_right" style="padding:0">'.$width.' см</td>
							</tr>
							<tr>
								<td class="door_left" style="padding:5px;text-rotate:90">'.$height.' см</td>
								<td class="door_right" id="door_bg">вид<br><br>конструкции<br><br>со стороны<br><br>'.$view.'<div id="eye">&deg;</div><div id="nalichnik"></div><div id="butt_1"><hr class="middle_butt"></div><div id="butt_2"><hr class="middle_butt"></div></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<br>

			<table border="0">
				<tr>
					<td class="leftprice">Общая стоимость заказа:</td>
					<td class="rightprice">'.$price.' руб.</td>
				</tr>
				<tr>
					<td class="leftprice">Предоплата:</td>
					<td class="rightprice">'.$preorder.' руб.</td>
				</tr>
				<tr>
					<td class="leftprice">Остаток:</td>
					<td class="rightprice">'.$afterorder.' руб.</td>
				</tr>
			</table>
			<br><br><br><br>

			<table border="0">
				<tr>
					<td class="leftsign" class="sign_name">Исполнитель:</td>
					<td class="rightsign" class="sign_name">Заказчик:</td>
				</tr>
				<tr>
					<td class="leftsign">_____________________________________</td>
					<td class="rightsign">_____________________________________</td>
				</tr>
				<tr>
					<td class="leftsign"><small><i>(подпись, расшифровка подписи)</i></small></td>
					<td class="rightsign"><small><i>(подпись, расшифровка подписи)</i></small></td>
				</tr>
				<tr>
					<td class="leftsign"><br>М.П.</td>
					<td class="rightsign"></td>
				</tr>
			</table>

			
			<h1>Договор</h1><br>

			<p><u>'.$surname.' '.$name.' '.$patronymic.'</u>, именуем______  в дальнейшем <b>&laquo;Заказчик&raquo;</b>, с одной стороны, и <u>ИП Поляков Н.&#160;А.</u>, именуемый в дальнейшем <b>&laquo;Исполнитель&raquo;</b>, с другой стороны, заключили настоящий договор о нижеследующем.</p>

			<p>Изделие изготавливается в соответствии с выставочными образцами, заявкой, договором, устным согласованием заказчика с особенностями конструкции (кроме тех случаев, когда изменения в конструкцию вносятся производителем и не ухудшают его эксплуатационных свойств). Изменения параметров конструкции <u>не возможны</u> после подписания этого документа обеими сторонами.</p>

			<p>Сроки изготовления, доставка и детали установки оговариваются при составлении заказа. Дата и время установки могут корректироваться и согласовываются между <b>Заказчиком</b> и <b>Исполнителем</b> до оговоренного времени установки. Детали конструкции могут отличаться от тех, что представлены на выставочных образцах ввиду модернизации продукции. Также <b>Исполнитель</b> оставляет за собой право отсрочить исполнение заказа, заранее предупредив об этом <b>Заказчика</b>.</p>

			<p class="list_title"><b>Заказчик</b> обязуется:</p>
			<div class="list">
				<ul>
					<li>в назначенное время установки обеспечить электропитанием инструмент <b>Исполнителя</b>;</li>
					<li>подготовить дверной проём к необходимым дополнительным работам.</li>
				</ul>
			</div>

			<p class="list_title"><b>Исполнитель</b> не несёт ответственности ни при каких условиях за:</p>
			<div class="list">
				<ul>
					<li>некачественно изготовленный дверной проем <b>Заказчика</b>;</li>
					<li>целостность демонтируемых изделий <b>Заказчика</b>;</li>
					<li>случайные косвенные убытки любого рода, связанные с установкой изделия.</li>
				</ul>
			</div>
			<p>В случае выявления в процессе монтажа дефектов, не позволяющих продолжать далее установку изделия, работы приостанавливаются до полного устранения данных недостатков <b>Заказчиком</b>.</p>

			<p>Срок службы изделия при условии установки его внутри помещения составляет 10 лет. Установку выполняют квалифицированные мастера-установщики. Гарантийный срок эксплуатации изделия составляет 12 месяцев.</p>

			<p class="list_title">Гарантийные обязательства не выполняются, если:</p>
			<div class="list">
				<ul>
					<li>изделие было деформировано в результате "усадки" дома;</li>
					<li>нарушены  правила  эксплуатации;</li>
					<li>фурнитура и замки предоставлялись заказчиком;</li>
					<li>корродировали элементы конструкции, а также деформированы декоративные накладки вследствие воздействия влаги;</li>
					<li>вышли из строя элементы конструкции вследствие грубого физического воздействия на них.</li>
				</ul>
			</div>
			<p>Обе стороны согласны с условиями Договора и обязуются их выполнять.</p>
			<br><br><br><br><br><br>

			<table border="0">
				<tr>
					<td class="leftsign" class="sign_name">Исполнитель:</td>
					<td class="rightsign" class="sign_name">Заказчик:</td>
				</tr>
				<tr>
					<td class="leftsign">_____________________________________</td>
					<td class="rightsign">_____________________________________</td>
				</tr>
				<tr>
					<td class="leftsign"><small><i>(подпись, расшифровка подписи)</i></small></td>
					<td class="rightsign"><small><i>(подпись, расшифровка подписи)</i></small></td>
				</tr>
				<tr>
					<td class="leftsign"><br>М.П.</td>
					<td class="rightsign"></td>
				</tr>
			</table>
		</body>
	';

	include("mpdf/mpdf.php");
	$mpdf = new mPDF('utf-8', 'A4', '8', '', 10, 10, 7, 7, 10, 10);
	$mpdf->charset_in='utf-8';
	$stylesheet=file_get_contents('css/page.order.pdf.css');
	$mpdf->WriteHTML($stylesheet,1);
	$mpdf->list_indent_first_level=0; 
	$mpdf->WriteHTML($html,2);/*формируем pdf*/
	$mpdf->Output('myOrder.pdf','I');
?>