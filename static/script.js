$(document).ready(function(){
// Executed once all the page elements are loaded

	var preventClick=false;

	$(".pic a").bind("click",function(e){
		/* This function stops the drag from firing a click event and showing the lightbox */
		if(preventClick)
		{
			e.stopImmediatePropagation();
			e.preventDefault();
		}
	});

	$(".pic").draggable({
		/* Converting the images into draggable objects */
		containment: 'parent',
		start: function(e,ui){
			/* This will stop clicks from occuring while dragging */
			preventClick=true;
		},

		stop: function(e, ui) {
			/* Wait for 250 milliseconds before re-enabling the clicks */
			setTimeout(function(){ preventClick=false; }, 250);
		}
	});


	$('.pic').mousedown(function(e){

		/* Executed on image click */

		var maxZ = 0;

		/* Find the max z-index property: */

		$('.pic').each(function(){
			var thisZ = parseInt($(this).css('zIndex'))
			if(thisZ>maxZ) maxZ=thisZ;
		});

		/* Clicks can occur in the picture container (with class pic) and in the link inside it */
		if($(e.target).hasClass("pic"))
		{
			/* Show the clicked image on top of all the others: */
			$(e.target).css({zIndex:maxZ+1});
		}
		else $(e.target).closest('.pic').css({zIndex:maxZ+1});
	});

});
