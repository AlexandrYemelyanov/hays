$(function(){
	var clicked = false;
	$('#meet-our-team-content .glyphicons').click(function(){
		$('.meet-container').addClass('height-setter');
		$('#meet-our-team-content').velocity("transition.slideRightOut");
		$('.people-card, .people-panel').delay(600).velocity("transition.slideLeftIn", {
			stagger: 100, display: "block"
		});
		clicked = false;

	});
	$('.people-card').click(function(){
		if(clicked) return false;
		clicked = true;
		$('.person-profile').hide();
		var id = $(this).attr('id');
		$('.person-profile#' + id).show();
		$('.people-card, .people-panel').velocity("transition.slideLeftOut", {
			stagger: 100, display: "none"
		});
		$('#meet-our-team-content').delay(600).velocity("transition.slideRightIn");

		$('html, body').delay(1000).animate({
			scrollTop: $("#meet-our-people").offset().top-120
		}, 1500 , function(){
			$('.meet-container').removeClass('height-setter');
		});
		
	});

});