<div id="navi">
	<div class="widget-top"></div>
	<div class="widget-middle" id="money">
		Курс валют:<br>
		<?
			$content = get_content();
			$pattern = "#<Valute ID=\"([^\"]+)[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>([^<]+)#i";
			preg_match_all($pattern, $content, $out, PREG_SET_ORDER);
			$dollar = "";
			$euro = "";
			
			foreach($out as $cur) 
			{
				if($cur[2] == 840)
					$dollar = str_replace(",",".",$cur[4]); 
				if($cur[2] == 978)
					$euro   = str_replace(",",".",$cur[4]);
			}
			
			echo"$ = ".$dollar."<br>";
			echo"€ = ".$euro."<br>";
			
			function get_content()
			{
				$date = date("d/m/Y");
				$link = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=$date";
				$fd = fopen($link, "r");
				$text="";
				if(!$fd)
					echo"Запрашиваемая страница не найдена";
				else
					while(!feof($fd))
						$text .= fgets($fd, 4096);
				fclose($fd);
				return $text;
			}
		?>
	</div>
	<div class="widget-bottom"></div>

	<div class="widget-top"></div>
	<div class="widget-middle">
		<span class="order">
			<a href="contacts.php">
				Наша Выставка:<br>
				г.&nbsp;Смоленск, ул.<br>
				Кирова, д.&nbsp;23
			</a>
		</span><br><br>
		
		Работает по будням<br>
		с 10:00 до 19:00<br>
		в субботу<br>
		с 10:00 до 18:00<br>
		и в воскресенье:<br>
		с 10:00 до 16:00<br><br>
		
		<span class="consult">
			Консультант досупен<br>
			на месте по будням:<br>
			с 10:00 до 17:00<br>
			и в субботу:<br>
			с 10:00 до 15:00
		</span><br><br>
		
		Или по телефонам:<br>
		+7 (4812) 40&ndash;19&ndash;28<br>
		+7 (920) 304&ndash;48&ndash;07<br><br>
		
		E-mail:<br>
		<a href="mailto:nicky_man@rambler.ru" class="info">nicky_man@rambler.ru</a>
	</div>
	<div class="widget-bottom"></div>
</div>