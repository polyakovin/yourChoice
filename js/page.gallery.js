$(document).ready(function(){
	var $mybook=$('#mybook');
	var $bttn_next=$('#next_page_button');
	var $bttn_prev=$('#prev_page_button');
	var $loading=$('#loading');
	var $mybook_images=$mybook.find('img');
	var cnt_images=$mybook_images.length;
	var loaded=0;

	//Рукописный шрифт
	Cufon.replace('.book_wrapper p,.book_wrapper h4,.b-counter');
	Cufon.replace('.book_wrapper a', {hover:true});
	Cufon.replace('.title', {textShadow: '1px 1px #C59471', fontFamily:'RodeoExtraBold'});
	Cufon.replace('.reference a', {textShadow: '1px 1px #C59471', fontFamily:'RodeoExtraBold'});
	Cufon.replace('.loading', {textShadow: '1px 1px #000', fontFamily:'RodeoExtraBold'});
	
	$mybook.booklet();
	$mybook_images.each(function(){
		var $img=$(this);
		var source=$img.attr('src');
		
		$('<img/>').load(function(){
		++loaded;
		if(loaded==cnt_images)
		{
			$loading.hide();
			$bttn_next.show();
			$bttn_prev.show();
			$mybook.show().booklet(
			{
				width:713,
				height:444,
				speed:750,
				startingPage:1,
				pagePadding:0,
				manual:true,
				hovers:true,
				auto:false,
				delay:4000,
				pause:'.book_wrapper',
				overlays:false,
				arrows:true,
				arrowsHide:true,
				hash:false,
				keyboard:true,
				menu:'#tab',
				chapterSelector:false,
				pageSelector:false,
				shadows:true,
				shadowTopFwdWidth:166,
				shadowTopBackWidth:166,
				shadowBtmWidth:50
			});
			Cufon.refresh()
		}
		}).attr('src',source)
	})
	
	/*//Появление иконки при наведении на изображение
	$("#mybook div a[rel='lightbox1']").hover
	(
		function(){$(this).children("div").stop(true,true).fadeOut(0).fadeIn(400);},
		function(){$(this).children("div").fadeOut(400);}
	);*/
});