$(document).ready(function(){
	$("#other_options").hide(0);
	$(".type_unit").click(function(){$("#choose_type").slideUp(1000);$("#other_options").slideDown(1000);});//Выбор типа конструкции
	$("#change_type").click(function(){$("#choose_type").slideDown(1000);$("#other_options").slideUp(1000);$("#type").val("0");});//Смена типа конструкции
	$("#img").click(function(){$("#inner_side").toggle();});//Открывание/закрывание двери

									//***Калькулятор***//
	var price;
	var constructor=$("#constructor");
	changeSum=0;
	result=0;
	cp=$("#changeprice");
	
	$("input[name^='type']").change(function(){price=parseInt($(this).attr("price"));});
	$("#summ span").text(price);
	
	constructor.change(function(){
		var totalSum=price;
		
		$("label[id^='lego'] input").each(function()//Для чекбоксов
		{
			var countField=parseInt($(this).val());
			if($(this).is(':checked'))totalSum+=countField;
		});
		
		$("select[id^='lego']").each(function()//Для списков
		{
			var countField=parseInt($(this).val());
			totalSum+=countField;
		});
		
		result=totalSum-changeSum;
		
		if(result>0)
			result="+"+result;
			
		if(result!=0)
			cp.stop(true,true).text(result+" рублей").fadeOut(0).fadeIn(700).fadeOut(700);
		
		changeSum=totalSum;
		$("#summ span").text(totalSum);
		
											//Дополнительные параметры
		//Зеркало
		if($('#lego_zerkalo input').is(':checked'))
			$('#lego_zerkalo').css("background-image","url(lego/basic/zerkalo.png)");
		else
			$('#lego_zerkalo').css("background-image","url(lego/basic/zerkalo_bw.png)");

		//Декоративное окно
		if($('#lego_hole input').is(':checked'))
			$('#lego_hole').css("background-image","url(lego/basic/hole.png)");
		else
			$('#lego_hole').css("background-image","url(lego/basic/hole_bw.png)");

		//Доводчик
		if($('#lego_dovod input').is(':checked'))
			$('#lego_dovod').css("background-image","url(lego/basic/dovod.png)");
		else
			$('#lego_dovod').css("background-image","url(lego/basic/dovod_bw.png)");

		//Полимерное защитное покрытие под порошок
		if($('#lego_polim input').is(':checked'))
			$('#lego_polim').css("background-image","url(lego/basic/polim.png)");
		else
			$('#lego_polim').css("background-image","url(lego/basic/polim_bw.png)");

		//Глазок
		if($('#lego_glaz input').is(':checked'))
		{
			$('#lego_glaz').css("background-image","url(lego/basic/glaz.png)");
			$('#eye').show();
			$('#inner_eye').show();
		}
		else
		{
			$('#lego_glaz').css("background-image","url(lego/basic/glaz_bw.png)");
			$('#eye').hide();
			$('#inner_eye').hide();
		}

		//Задвижка
		if($('#lego_zadv input').is(':checked'))
			$('#lego_zadv').css("background-image","url(lego/basic/zadv.png)");
		else
			$('#lego_zadv').css("background-image","url(lego/basic/zadv_bw.png)");

		//Утеплитель
		if($('#lego_warm input').is(':checked'))
			$('#lego_warm').css("background-image","url(lego/basic/warm.png)");
		else
			$('#lego_warm').css("background-image","url(lego/basic/warm_bw.png)");

		//Демонтаж старой двери
		if($('#lego_demont input').is(':checked'))
			$('#lego_demont').css("background-image","url(lego/basic/demont.png)");
		else
			$('#lego_demont').css("background-image","url(lego/basic/demont_bw.png)");

		//Доставка и Установка
		if($('#lego_service input').is(':checked'))
			$('#lego_service').css("background-image","url(lego/basic/service.png)");
		else
			$('#lego_service').css("background-image","url(lego/basic/service_bw.png)");
	});

									//*****Визуальное отображение конструктора*****//
	$('#lego_nalich').change(function(){//Наличник
		var cals=$("#lego_nalich option:selected").html();
		
		if(cals=="Отсутствует")
		{
			$('#nalinone').show(0);
			$('#nalifrez').hide(0);
		}
		
		if(cals=="Декоративный")
		{
			$('#nalinone').hide(0);
			$('#nalifrez').hide(0);
		}
		if(cals=="Фрезерованный")
		{
			$('#nalinone').hide(0);
			$('#nalifrez').show(0);
		}
	});
														//Условия для внешних отделок
	var imgName;
	var oldName;
	$("#lego_out_otd").change(function()
	{
		var calss=$("#lego_out_otd option:selected").html();	
		$("#out_otd_POST").val(calss);
		
		if(calss=="ПВХ на МДФ(10мм)" || calss=="ПВХ на МДФ(16мм)" || calss=="Пластик на МДФ(10мм)" || calss=="Пластик на МДФ(16мм)" || calss=="Шпон на МДФ(10мм)" || calss=="Шпон на МДФ(16мм)")
		{
			$("#out_frez_show").show(0);
			
			if($("#out_frez option:selected").html()=="Присутствует")
				$("#frez").show(0);
				
			$("#out_frez").change(function()
			{
				if($("#out_frez option:selected").html()=="Присутствует")
					$("#frez").show(0);
				else
					$("#frez").hide(0);
			});
			
			$("#inner_por").prop('disabled',true);
			$("#lego_zerkalo input").removeAttr('disabled','disabled');
		}
		else
		{
			$("#out_frez_show").hide(0);
			$("#frez").hide(0);
			$("#inner_por").prop('disabled',false);
			$("#lego_zerkalo input").attr('disabled','disabled');
		}
		
		if(calss=="ПВХ на МДФ(10мм)" || calss=="ПВХ на МДФ(16мм)")
		{
			$("#out_otd_button").show(0);
			imgName=$("#out_otd_button").css('background-image');
		}
		else
			$("#out_otd_button").hide(0);
		
		if(calss=="Шпон на МДФ(10мм)" || calss=="Шпон на МДФ(16мм)")
		{
			$("#out_otd_shpon_button").show(0);
			imgName=$("#out_otd_shpon_button").css('background-image');
		}
		else
			$("#out_otd_shpon_button").hide(0);
		
		if(calss=="Пластик на МДФ(10мм)" || calss=="Пластик на МДФ(16мм)")
		{
			$("#out_otd_plastic_button").show(0);
			imgName=$("#out_otd_plastic_button").css('background-image');
		}
		else
			$("#out_otd_plastic_button").hide(0);
		
		if(calss=="Порошковое напыление")
		{
			$("#out_otd_por_button").show(0);
			$("#frez_nali").prop('disabled',true);
			
			if($("#lego_nalich option:selected").html()=="Фрезерованный")
				$("#decor_nali").attr("selected","selected");
			
			imgName=$("#out_otd_por_button").css('background-image');
		}
		else
		{
			$("#out_otd_por_button").hide(0);
			$("#frez_nali").prop('disabled',false);
		}
		
		if(calss=="Молотковая эмаль")
		{
			$("#out_otd_mol_button").show(0);
			$("#frez_nali").prop('disabled',true);
			
			if($("#lego_nalich option:selected").html()=="Фрезерованный")
				$("#decor_nali").attr("selected","selected");
				
			imgName=$("#out_otd_mol_button").css('background-image');
		}
		else
		{
			$("#out_otd_mol_button").hide(0);
			$("#frez_nali").prop('disabled',false);
		}
		
		imgName=imgName.substr(imgName.lastIndexOf("/")+1);//После смены типа внешней отделки обновляем эскиз
		oldName=$("#pokr").css('background-image');
		imgName=oldName.substr(0,oldName.lastIndexOf("/")+1)+imgName;
		$("#pokr").css('background-image',imgName);
	});
	
													//Условия для внутренних отделок
	$("#lego_in_otd").change(function()
	{
		var cals=$("#lego_in_otd option:selected").html();	
		$("#in_otd_POST").val(cals);
		
		if(cals=="ПВХ на МДФ(10мм)" || cals=="ПВХ на МДФ(16мм)" || cals=="Пластик на МДФ(10мм)" || cals=="Пластик на МДФ(16мм)" || cals=="Шпон на МДФ(10мм)" || cals=="Шпон на МДФ(16мм)")
		{
			$("#in_frez_show").show(0);
			
			if($("#in_frez option:selected").html()=="Присутствует")
				$("#inner_frez").show(0);
				
			$("#in_frez").change(function()
			{
				if($("#in_frez option:selected").html()=="Присутствует")
					$("#inner_frez").show(0);
				else
					$("#inner_frez").hide(0);
			});
			
			$("#inner_por").prop('disabled',true);
			$("#lego_zerkalo input").removeAttr('disabled','disabled');
		}
		else
		{
			$("#in_frez_show").hide(0);
			$("#inner_frez").hide(0);
			$("#inner_por").prop('disabled',false);
			$("#lego_zerkalo input").attr('disabled','disabled');
		}
		
		if(cals=="ПВХ на МДФ(10мм)" || cals=="ПВХ на МДФ(16мм)")
		{
			$("#in_otd_button").show(0);
			imgName=$("#in_otd_button").css('background-image');
		}
		else
			$("#in_otd_button").hide(0);
		
		if(cals=="Шпон на МДФ(10мм)" || cals=="Шпон на МДФ(16мм)")
		{
			$("#in_otd_shpon_button").show(0);
			imgName=$("#in_otd_shpon_button").css('background-image');
		}
		else
			$("#in_otd_shpon_button").hide(0);
		
		if(cals=="Пластик на МДФ(10мм)" || cals=="Пластик на МДФ(16мм)")
		{
			$("#in_otd_plastic_button").show(0);
			imgName=$("#in_otd_plastic_button").css('background-image');
		}
		else
			$("#in_otd_plastic_button").hide(0);
		
		if(cals=="ХДФ покрытие")
		{
			$("#in_otd_hdf_button").show(0);
			imgName=$("#in_otd_hdf_button").css('background-image');
		}
		else
			$("#in_otd_hdf_button").hide(0);
		
		if(cals=="Порошковое напыление")
		{
			$("#in_otd_por_button").show(0);
			imgName=$("#in_otd_por_button").css('background-image');
		}
		else
			$("#in_otd_por_button").hide(0);
		
		if(cals=="Молотковая эмаль")
		{
			$("#in_otd_mol_button").show(0);
			imgName=$("#in_otd_mol_button").css('background-image');
		}
		else
			$("#in_otd_mol_button").hide(0);
		
		imgName=imgName.substr(imgName.lastIndexOf("/")+1);//После смены типа внутренней отделки обновляем эскиз
		oldName=$("#inner_side").css('background-image');
		imgName=oldName.substr(0,oldName.lastIndexOf("/")+1)+imgName;
		$("#inner_side").css('background-image',imgName);
	});

	//Зеркало и окно не могут стоять вместе одновременно
	$("#lego_zerkalo input").change(function()
	{
		if($(this).is(':checked'))
			$("#lego_hole input").removeAttr("checked");
	});
	
	$("#lego_hole input").change(function()
	{
		if($(this).is(':checked'))
			$("#lego_zerkalo input").removeAttr("checked");
	});

	//Ползунок оставки за город
	$("#slider-range").slider(
	{
		range:"min",value:50,min:10,max:200,slide:function(event,ui)
		{
			$("#amount").html(ui.value+"км");
			$("#delivery").val(ui.value);
		}
	});
	$("#amount").html($("#slider-range").slider("value")+"км");
	$("#delivery").val($("#slider-range").slider("value"));

	
	//Прятки
	$("#lego_service input").change(function()
	{
		var del="#hide_deliv";
		
		if($(this).is(':checked'))
			$(del).show(0);
		else
			$(del).hide(0).val(0);
	});
	
	$("#checkdel").change(function()
	{
		var fardel=".hide_fardeliv";
		
		if($(this).is(':checked'))
			$(fardel).show(0);
		else
			$(fardel).hide(0).val(0);
	});
	
	$("#out_frez").change(function()
	{
		if(parseInt($(this).val()))
			$("#out_frez_button").show();
		else
			$("#out_frez_button").hide();
	});
	
	$("#in_frez").change(function()
	{
		if(parseInt($(this).val()))
			$("#in_frez_button").show();
		else
			$("#in_frez_button").hide();
	});
																/*Модальное окно*/
	var model;
	$("#out_otd_button").click(function(){$("#select_window").show(0);$("#out_otd_window").show(0);})//Для внешней отделки (МДФ-ПВХ)
	$(".gallery_out_otd").click(function(){$("#select_window").hide(0);$("#out_otd_window").hide(0);model=$(this).attr("model");
	$("#out_otd_model").val(model);$("#pokr").css('background-image','url(lego/big/otd/'+model+'.jpg)');
	$("#out_otd_button").css('background-image','url(lego/medium/otd/'+model+'.jpg)');});

	$("#out_otd_shpon_button").click(function(){$("#select_window").show(0);$("#out_otd_shpon_window").show(0);})//Для внешней отделки (МДФ-Шпон)
	$(".gallery_out_otd_shpon").click(function(){$("#select_window").hide(0);$("#out_otd_shpon_window").hide(0);model=$(this).attr("model");
	$("#out_otd_model").val(model);$("#pokr").css('background-image','url(lego/big/otd/'+model+'.jpg)');
	$("#out_otd_shpon_button").css('background-image','url(lego/medium/otd/'+model+'.jpg)');});

	$("#out_otd_plastic_button").click(function(){$("#select_window").show(0);$("#out_otd_plastic_window").show(0);})//Для внешней отделки (МДФ-Пластик)
	$(".gallery_out_otd_plastic").click(function(){$("#select_window").hide(0);$("#out_otd_plastic_window").hide(0);model=$(this).attr("model");
	$("#out_otd_model").val(model);$("#pokr").css('background-image','url(lego/big/otd/'+model+'.jpg)');
	$("#out_otd_plastic_button").css('background-image','url(lego/medium/otd/'+model+'.jpg)');});

	$("#out_otd_por_button").click(function(){$("#select_window").show(0);$("#out_otd_por_window").show(0);})//Для внешней отделки (порошок)
	$(".gallery_out_otd_por").click(function(){$("#select_window").hide(0);$("#out_otd_por_window").hide(0);model=$(this).attr("model");
	$("#out_otd_model").val(model);$("#pokr").css('background-image','url(lego/big/otd/'+model+'.jpg)');
	$("#out_otd_por_button").css('background-image','url(lego/medium/otd/'+model+'.jpg)');});

	$("#out_otd_mol_button").click(function(){$("#select_window").show(0);$("#out_otd_mol_window").show(0);})//Для внешней отделки (молоток)
	$(".gallery_out_otd_mol").click(function(){$("#select_window").hide(0);$("#out_otd_mol_window").hide(0);model=$(this).attr("model");
	$("#out_otd_model").val(model);$("#pokr").css('background-image','url(lego/big/otd/'+model+'.jpg)');
	$("#out_otd_mol_button").css('background-image','url(lego/medium/otd/'+model+'.jpg)');});

	$("#out_frez_button").click(function(){$("#select_window").show(0);$("#out_frez_window").show(0);})//Для внешней фрезеровки
	$(".gallery_out_otd_col").click(function(){$("#select_window").hide(0);$("#out_frez_window").hide(0);model=$(this).attr("model");
	$("#out_otd_col_model").val(model);$("#frez").css('background-image','url(lego/big/frez/'+model+'.png)');
	$("#out_frez_button").css('background-image','url(lego/medium/frez/'+model+'.jpg)');});

	$("#in_otd_button").click(function(){$("#select_window").show(0);$("#in_otd_window").show(0);})//Для внутренней отделки (МДФ-ПВХ)
	$(".gallery_in_otd").click(function(){$("#select_window").hide(0);$("#in_otd_window").hide(0);model=$(this).attr("model");
	$("#in_otd_model").val(model);$("#inner_side").css('background-image','url(lego/big/otd/'+model+'.jpg)');
	$("#in_otd_button").css('background-image','url(lego/medium/otd/'+model+'.jpg)');});

	$("#in_otd_shpon_button").click(function(){$("#select_window").show(0);$("#in_otd_shpon_window").show(0);})//Для внутренней отделки (МДФ-Шпон)
	$(".gallery_in_otd_shpon").click(function(){$("#select_window").hide(0);$("#in_otd_shpon_window").hide(0);model=$(this).attr("model");
	$("#in_otd_model").val(model);$("#inner_side").css('background-image','url(lego/big/otd/'+model+'.jpg)');
	$("#in_otd_shpon_button").css('background-image','url(lego/medium/otd/'+model+'.jpg)');});

	$("#in_otd_plastic_button").click(function(){$("#select_window").show(0);$("#in_otd_plastic_window").show(0);})//Для внутренней отделки (МДФ-Пластик)
	$(".gallery_in_otd_plastic").click(function(){$("#select_window").hide(0);$("#in_otd_plastic_window").hide(0);model=$(this).attr("model");
	$("#in_otd_model").val(model);$("#inner_side").css('background-image','url(lego/big/otd/'+model+'.jpg)');
	$("#in_otd_plastic_button").css('background-image','url(lego/medium/otd/'+model+'.jpg)');});

	$("#in_otd_hdf_button").click(function(){$("#select_window").show(0);$("#in_otd_hdf_window").show(0);})//Для внутренней отделки (ХДФ)
	$(".gallery_in_otd_hdf").click(function(){$("#select_window").hide(0);$("#in_otd_hdf_window").hide(0);model=$(this).attr("model");
	$("#in_otd_model").val(model);$("#inner_side").css('background-image','url(lego/big/otd/'+model+'.jpg)');
	$("#in_otd_hdf_button").css('background-image','url(lego/medium/otd/'+model+'.jpg)');});

	$("#in_otd_por_button").click(function(){$("#select_window").show(0);$("#in_otd_por_window").show(0);})//Для внутренней отделки (порошок)
	$(".gallery_in_otd_por").click(function(){$("#select_window").hide(0);$("#in_otd_por_window").hide(0);model=$(this).attr("model");
	$("#in_otd_model").val(model);$("#inner_side").css('background-image','url(lego/big/otd/'+model+'.jpg)');
	$("#in_otd_por_button").css('background-image','url(lego/medium/otd/'+model+'.jpg)');});

	$("#in_otd_mol_button").click(function(){$("#select_window").show(0);$("#in_otd_mol_window").show(0);})//Для внутренней отделки (молоток)
	$(".gallery_in_otd_mol").click(function(){$("#select_window").hide(0);$("#in_otd_mol_window").hide(0);model=$(this).attr("model");
	$("#in_otd_model").val(model);$("#inner_side").css('background-image','url(lego/big/otd/'+model+'.jpg)');
	$("#in_otd_mol_button").css('background-image','url(lego/medium/otd/'+model+'.jpg)');});

	$("#in_frez_button").click(function(){$("#select_window").show(0);$("#in_frez_window").show(0);})//Для внутренней фрезеровки
	$(".gallery_in_otd_col").click(function(){$("#select_window").hide(0);$("#in_frez_window").hide(0);model=$(this).attr("model");
	$("#in_otd_col_model").val(model);$("#inner_frez").css('background-image','url(lego/big/frez/'+model+'.png)');
	$("#in_frez_button").css('background-image','url(lego/medium/frez/'+model+'.jpg)');});

	$("#handles_button").click(function(){$("#select_window").show(0);$("#handles_window").show(0);})//Для ручек
	$(".gallery_handles").click(function(){$("#select_window").hide(0);$("#handles_window").hide(0);model=$(this).attr("model");
	$("#handles_model").val(model);
	$("#handle").css('background-image','url(lego/big/handles/'+model+'.png)');
	$("#inner_handle").css('background-image','url(lego/big/handles/inner/'+model+'.png)');
	$("#handles_button").css('background-image','url(lego/small/handles/'+model+'.png)');});

	var lock1,lock2;
	$("#locks_button").click(function(){$("#select_window").show(0);$("#locks_window").show(0);lock1=1;lock2=0;})//Для основного замка
	$(".gallery_locks").click(function(){if(lock1==1){$("#select_window").hide(0);$("#locks_window").hide(0);model=$(this).attr("model");
	$("#locks_model").val(model);
	$("#locks_button").css('background-image','url(lego/small/locks/'+model+'.png)');}});

	$("#locks2_button").click(function(){$("#select_window").show(0);$("#locks_window").show(0);lock1=0;lock2=1;})//Для второго замка
	$(".gallery_locks").click(function(){if(lock2==1){$("#select_window").hide(0);$("#locks_window").hide(0);model=$(this).attr("model");
	$("#locks2_model").val(model);
	$("#locks2_button").css('background-image','url(lego/small/locks/'+model+'.png)');}});

	$("#lich_button").click(function(){$("#select_window").show(0);$("#lich_window").show(0);})//Для личинок
	$(".gallery_lich").click(function(){$("#select_window").hide(0);$("#lich_window").hide(0);model=$(this).attr("model");
	$("#lich_model").val(model);
	$("#lich_button").css('background-image','url(lego/small/lich/'+model+'.png)');});

	$("#nakl_button").click(function(){$("#select_window").show(0);$("#nakl_window").show(0);})//Для накладок
	$(".gallery_nakl").click(function(){$("#select_window").hide(0);$("#nakl_window").hide(0);model=$(this).attr("model");
	$("#nakl_model").val(model);//$("#nakll").attr('src','lego/big/otd_col/'+model+'.png');
	$("#nakl_button").css('background-image','url(lego/small/nakl/'+model+'.png)');});

	//Закрытие окна
	$("#cross").click(function(){$("#select_window").hide(0);$("#out_otd_window").hide(0);$("#out_otd_por_window").hide(0);$("#out_otd_mol_window").hide(0);$("#out_otd_shpon_window").hide(0);$("#out_otd_plastic_window").hide(0);$("#out_frez_window").hide(0);$("#in_otd_window").hide(0);$("#in_otd_hdf_window").hide(0);$("#in_otd_por_window").hide(0);$("#in_otd_mol_window").hide(0);$("#in_otd_shpon_window").hide(0);$("#in_otd_plastic_window").hide(0);$("#in_frez_window").hide(0);$("#handles_window").hide(0);$("#locks_window").hide(0);$("#lich_window").hide(0);$("#nakl_window").hide(0);});
	$("#shadow").click(function(){$("#select_window").hide(0);$("#out_otd_window").hide(0);$("#out_otd_por_window").hide(0);$("#out_otd_mol_window").hide(0);$("#out_otd_shpon_window").hide(0);$("#out_otd_plastic_window").hide(0);$("#out_frez_window").hide(0);$("#in_otd_window").hide(0);$("#in_otd_hdf_window").hide(0);$("#in_otd_por_window").hide(0);$("#in_otd_mol_window").hide(0);$("#in_otd_shpon_window").hide(0);$("#in_otd_plastic_window").hide(0);$("#in_frez_window").hide(0);$("#handles_window").hide(0);$("#locks_window").hide(0);$("#lich_window").hide(0);$("#nakl_window").hide(0);});

	//Tooltips
	$(function(){$(document).tooltip({position:{my:"center bottom-20",at:"center top",using:function(position,feedback){$(this).css(position);$("<div>").addClass("arrow").addClass(feedback.vertical).addClass(feedback.horizontal).appendTo(this);}}});});
});