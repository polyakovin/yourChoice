$(document).ready(function(){
	//Вежливое приветствие
	var greetings="Добрый вечер!";
	var hours=new Date().getHours();
	
	if(hours<18)
	{
		if(hours<12)
		{
			if(hours<6)
				greetings="Доброй ночи!";
			else
				greetings="Доброе утро!";
		}
		else
			greetings="Добрый день!";
	}
	
	$("#title").html(greetings);
	
	//Стрелочка, которая показывает, где меню
	var pp = $('#menu').pointPoint();
	$('#menu').hover(function(){pp.destroyPointPoint();}) 	
});