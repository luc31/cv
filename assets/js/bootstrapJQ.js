$(document).ready(function(){
	var val = [75,65,60,35,35,50,50,50,35];
	var circle ;
	var text =[];
  for(var i = 0 ; i<val.length; i++)
	{	
		
		circle = $('.bar'+i);
		if (isNaN(val[i])) {
		val[i] = 100; 
		}
		else{

		var r = circle.attr('r');
		var c = Math.PI*(r*2);

		if (val[i] < 0) { val[i] = 0;}
		if (val[i] > 100) { val[i] = 100;}

		var pct = ((100-val[i])/100)*c;

		circle.css({ strokeDashoffset: pct});
		/*$('.col-lg-4').append("<p class='col-lg-4'>"+val[i]+"</p>");*/
		text [i] =$("<p></p>").text(val[i]+"%");
		$('.compt'+i).append(text[i]);
		console.log($('.compt'+i));
			
	}	
  }
 
});

$('.navbar-nav').each(function() {
    $(this).css('margin-top', $('.container-fluid').height()-$(this).height()-45); //-2 est un réajustement car il y a un léger décalage
    
    return  console.log($(this).parent().height())+"" +console.log($(this).height()+250);
});


 