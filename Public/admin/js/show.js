    
    $(".sp").toggle(function(){
     //$(".d1").show();
	$(this).parent().parent().parent().next().find(".d1").show();
	
    },function(){
     $(this).parent().parent().parent().next().find(".d1").hide();
    })