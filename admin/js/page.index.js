$(document).ready(function(){
	$("#setCounterToZero").click(function()
	{
		if(confirm("Точно?"))
			location="index.php?setCounterToZero=1";
		else
			alert("Ну слава Богу!");
	});
});