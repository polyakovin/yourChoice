<?
	include("../blocks/db.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?
			include("blocks/style.php");
		?>
		<title>Редактор сайта &laquo;ВашВыбор67.рф&raquo;</title>
	</head>
	<body>
		<?
			include('blocks/header.php');
		?>
		<div id="main" class="leftalign">
			<h1>
				<?
					if(date(md)=="0726")
						echo"С Днём Рождения, Папик!";
					else
						echo"Приятной тебе работы, Папик!";
				?>
			</h1>
			<h2>Краткая статистика</h2>
			<p>
				Посещаемость страниц за всё время (можно <a id='setCounterToZero' href='#'>обнулить</a> счётчик):
				<table id="mycounter">
					<?
						$result=mysql_query("SELECT title,page,view FROM page",$db);
						$myrow=mysql_fetch_array($result);
						
						if($_GET["setCounterToZero"]=="1")
							mysql_query("UPDATE page SET view='0'",$db);
						
						do
							echo
							"
								<tr>
									<td class='l'>".$myrow['title']." (<i>/".$myrow['page'].".php</i>):</td>
									<td class='r'><strong>".$myrow['view']."</strong></td>
								</tr>
							";
						while($myrow=mysql_fetch_array($result));
						
						$result=mysql_query("SELECT COUNT(*) FROM china",$db);
						$sum=mysql_fetch_array($result);
					?>
				</table>
			</p>
			
			<?//Счётчик?>
			<a id="yacounter" href="https://metrika.yandex.ru/stat/?id=10235383&amp;from=informer"
			target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/10235383/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
			style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:10235383,lang:'ru'});return false}catch(e){}"/></a>

			<!-- Yandex.Metrika counter -->
			<script type="text/javascript">
			(function (d, w, c) {
				(w[c] = w[c] || []).push(function() {
					try {
						w.yaCounter10235383 = new Ya.Metrika({id:10235383,
								clickmap:true,
								trackLinks:true,
								accurateTrackBounce:true});
					} catch(e) { }
				});

				var n = d.getElementsByTagName("script")[0],
					s = d.createElement("script"),
					f = function () { n.parentNode.insertBefore(s, n); };
				s.type = "text/javascript";
				s.async = true;
				s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

				if (w.opera == "[object Opera]") {
					d.addEventListener("DOMContentLoaded", f, false);
				} else { f(); }
			})(document, window, "yandex_metrika_callbacks");
			</script>
			<noscript><div><img src="//mc.yandex.ru/watch/10235383" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
			<!-- /Yandex.Metrika counter -->
			
			<br>
			<p>В каталоге находится <strong><?=$sum[0]?></strong> дверей.</p>
			
			<p>Скоро тут будет кнопочка для создания резервной копии всего сайта. Ожидайте ближайших обновлений!</p>
			
			<h2>Краткое руководство по редакции текстов на сайте:</h2>
			<p>В основе сайта лежит язык разметки документов HTML, структура которго состоит из &lt;тегов&gt;. Они и придают Вашему сайту такой структурированный и красивый вид. Поэтому, если возникнет желание отредактировать страницы собственного сайта, следует ознакомиться с основными понятиями<br>о HTML-разметке.</p>
			<h3>Основные &lt;теги&gt;:</h3>
			<p>&lt;p&gt;Текст, заключённый в тег <strong>&lt;p&gt;</strong>, обозначает абзац, который <strong>всегда</strong> будет начинаться с красной строки. Но если нужно <strong>перенести строку</strong> прямо внутри абзаца, используйте тег&lt;/br&gt;.<br><strong>В конце</strong> тег абзаца <strong>должен</strong> закрываться таким образом.&lt;/p&gt;</p>
			<h2>&lt;h2&gt;Заголовок 2го уровня.&lt;/h2&gt;</h2>
			<h3>&lt;h3&gt;Заголовок 3го уровня.&lt;/h3&gt;</h3>
			<p>Заголовки первого уровня сайт печатает автоматически.</p>
			<ul>&lt;ul&gt;<br>
			<li>&lt;li&gt;Списки заключаются в тег <strong>&lt;ul&gt;</strong>&lt;/li&gt;</li>
			<li>&lt;li&gt;Каждый элемент списка должен быть заключён в тег <strong>&lt;li&gt;</strong>&lt;/li&gt;</li>
			&lt;/ul&gt;</li></ul><br>
			&lt;a href=&quot;http://ссылка, по которой надо перейти.ru&quot;&gt;Текст ссылки&lt;/a&gt;<br><br>
			<strong>&lt;strong&gt;Так текст станет ЖИРНЫМ&lt;/strong&gt;</strong><br><br>
			<em>&lt;em&gt;А так курсивным и, где надо, <strong>&lt;strong&gt;ЖИРНЫМ&lt;/strong&gt;</strong>&lt;/em&gt;</em>
			<br><br>
		</div>
	</body>
</html>
<?
	include('blocks/javascripts.php');
?>
<script src="js/page.index.js"></script>