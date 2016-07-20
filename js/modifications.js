$('.modif-nav-a').on('click',function(){
	$('.modif-nav').toggleClass('hidden');
})

$('#test5').on('click',function(){
	
	var notEditable = $('#icon_telephone').val();

	if($('#test5').is(':checked')){
		$('#icon_telephone').removeAttr('disabled');
		$('#icon_telephone').val('08');
	}
	else {
		$('#icon_telephone').attr('disabled','disabled');
		$('#icon_telephone').val('/');
		
	};

	
	
	
})