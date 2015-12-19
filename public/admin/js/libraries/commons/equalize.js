; var equalize = function(selector)
{
	var maxHeight = 0;
	$(selector).each(function(i){
		console.log(i, $(this).height() )
	   if ($(this).height() > maxHeight){maxHeight = $(this).height();}
	});
	console.log(selector, maxHeight);
	$(selector).height(maxHeight);
}