<div id="header">
	<a id="index" href="index.php"></a>
</div>
<div id="subheader">
	<div id="menu">
		<ul id="topnav">
			<li>
				<a href="#" class="menu">Menu</a>
				<div class="sub">
					<ul>
						<li><h2>Распродажа</h2></li>
						<li><a href='add_sale.php'>Добавить</a></li>
						<form method="post" action="edit_sale.php">
							<input class="change_menu" type="submit" value="Изменить">
							<select name="id" type="select">
								<?
									$result=mysql_query("SELECT id,title FROM sale",$db);
									$myrow=mysql_fetch_array($result);
									
									do
										printf("<option value='%s'>%s</option>", $myrow['id'], $myrow['title']);
									while($myrow=mysql_fetch_array($result))
								?>
							</select><br>
						</form>
						<li><a href='delete_sale.php'>Удалить</a></li>

						<li><h2 id="secondtitle">Эксклюзив</h2></li>
						<li><a href="add_special.php">Добавить</a></li>
						<form method="post" action="edit_special.php">
							<input class="change_menu" type="submit" value="Изменить">
							<select name="id">
								<?
									$result=mysql_query("SELECT id,title FROM special",$db);
									$myrow=mysql_fetch_array($result);
									
									do
										printf("<option value='%s'>%s</option>",$myrow['id'],$myrow['title']);
									while($myrow=mysql_fetch_array($result))
								?>
							</select>
						</form>
						<li><a href="delete_special.php">Удалить</a></li>
					</ul>

					<ul>
						<li><h2>Каталог</h2></li>
						<li><a href='add_door.php'>Добавить</a></li>
						<form method="post" action="edit_door.php">
							<input class="change_menu" type="submit" value="Изменить">
							<select name="id" type="select">
								<?
									$result=mysql_query("SELECT id,model,firm FROM china ORDER BY firm,model",$db);
									$myrow=mysql_fetch_array($result);
									
									do
										printf("<option value='%s'>%s %s</option>",$myrow['id'],$myrow['firm'],$myrow['model']);
									while($myrow=mysql_fetch_array($result))
								?>
							</select><br>
						</form>
						<li><a href='delete_door.php'>Удалить</a></li>

						<li><h2 id="secondtitle">F.A.Q.</h2></li>
						<li><a href="add_faq.php">Добавить</a></li>
						<form method="post" action="edit_faq.php">
							<input class="change_menu" type="submit" value="Изменить">
							<select name="id">
								<?
									$result=mysql_query("SELECT id,question FROM faq",$db);
									$myrow=mysql_fetch_array($result);
									
									do
										printf("<option value='%s'>%s</option>",$myrow['id'],$myrow['question']);
									while($myrow=mysql_fetch_array($result))
								?>
							</select>
						</form>
						<li><a href="delete_faq.php">Удалить</a></li>
					</ul>
					
					<ul>
						<li><h2>Конструктор</h2></li>
						<li><a href="price_list.php">Изменить ценники</a></li>
						<li><div id="legoadd_menu"></div></li>
						<form method="post" action="add_lego.php">
							<input class="change_menu" type="submit" value="Добавить">
							<select name="i">
								<option value='Тип Конструкции'>Тип Конструкции</option>
								<option value='Отделку'>Отделку</option>
								<option value='Рисунок'>Рисунок</option>
								<option value='Глазок'>Глазок</option>
								<option value='Задвижку'>Задвижку</option>
								<option value='Замок'>Замок</option>
								<option value='Ручку'>Ручку</option>
								<option value='Накладку'>Накладку</option>
								<option value='Личинку'>Личинку</option>
							</select>
						</form><br>

						<form method="post" action="delete_lego.php">
							<input class="change_menu" type="submit" value="Удалить">
							<select name="i">
								<option value='Тип Конструкции'>Тип Конструкции</option>
								<option value='Отделку'>Отделку</option>
								<option value='Рисунок'>Рисунок</option>
								<option value='Глазок'>Глазок</option>
								<option value='Задвижку'>Задвижку</option>
								<option value='Замок'>Замок</option>
								<option value='Ручку'>Ручку</option>
								<option value='Накладку'>Накладку</option>
								<option value='Личинку'>Личинку</option>
							</select>
						</form>
					</ul>

					<ul>
						<li><h2>Страницы</h2></li>
						<li><a href='edit_text.php?a=1'>Главная</a></li>
						<li><a href='edit_text.php?a=2'>Каталог</a></li>
						<li><a href='edit_text.php?a=7'>Эксклюзив</a></li>
						<li><a href='edit_text.php?a=6'>Конструктор</a></li>
						<li><a href='edit_text.php?a=11'>Наши проекты</a></li>
						<li><a href='edit_text.php?a=10'>Распродажа</a></li>
						<li><a href='edit_text.php?a=3'>Заказ</a></li>
						<li><a href='edit_text.php?a=4'>Контакты</a></li>
						<li><a href='edit_text.php?a=9'>F.A.Q.</a></li>
					</ul>
				</div>
			</li>
		</ul>
	</div>
</div>