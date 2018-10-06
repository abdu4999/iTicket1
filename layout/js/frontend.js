$(function(){

	'use strict';

	// Switch Between Login And Signup
	/*$('.login-page span').click(function(){

		$(this).addClass('selected').siblings().removeClass('selected');
		$('.login-page form').hide();
		$( '.' + $(this).data('class')).fadeIn(350);

	});*/

	// Js to login & signin
	$('.e_slideclientC h1 span').on("click", function(){
	    $(this).addClass('selected').siblings().removeClass('selected');
	    $('.e_slideclientC h1 span i.selected').removeClass('selected').siblings().addClass('selected');
	    $('.e_slideclientC h2 span').addClass('selected').siblings().removeClass('selected');
	    $('.e_slideclientC h2 span').hide(250);
	    $('.e_slideclientC form').hide(250);
	    $('.'+ $(this).data('class')).fadeIn(500);
	 });

	$('.e_slideclientC h2 span').on("click", function(){
	    $(this).addClass('selected').siblings().removeClass('selected');
	    $('.e_slideclientC form').hide(250);
	    $('.errorLog').fadeOut();
	    $('.'+ $(this).data('class')).fadeIn(500);
	});

	// Tigger The Selectboxit
	$('select').selectBoxIt({

		autoWidth: false

	});

	// Hide Placeholder On Form Focus
	$('[placeholder]').focus(function(){

		$(this).attr('data-text', $(this).attr('placeholder'));

		$(this).attr('placeholder', '');

	}).blur(function(){

		$(this).attr('placeholder', $(this).attr('data-text'));

	});

	// Add Asterisk On Required Field
	$('input').each(function(){
		if ($(this).attr('required') === 'required') {
			$(this).after('<span class="asterisk">*</span>');
		}
	});


	// Confirmation Message On Button
	$('.confirm').click(function(){
		return confirm("Are You Sure..?");
	});

	//
	/*$('.live-name').keyup(function(){
		$('.live-preview .caption h3').text($(this).val());
	});

	$('.live-desc').keyup(function(){
		$('.live-preview .caption p').text($(this).val());
	});

	$('.live-price').keyup(function(){
		$('.live-preview .price-tag').text('$ '+$(this).val());
	});*/
	$('.live').keyup(function(){

		$($(this).data('class')).text($(this).val());

	});

	$(".e_eplainingsa li").click(function() {
		var myeID = $(this).attr("id");

		$(this).removeClass("notactive").siblings().addClass("notactive");

		$(".e_aboutC div").hide();

		$("#" + myeID + "-content").fadeIn(1000);

	});

	$('.myImg').on("click", function(){
		$('.showDet').fadeIn(200);
		$('.ticketShow').fadeIn(200);

	});

	$('.exit').on("click", function(){
		$('.showDet').fadeOut(200);
		$('.ticketMsg').fadeOut(200);
	});

	$('.myTicket').on("click", function(){
		$('.ticketShow').fadeOut(200);
		$('.ticketMsg').fadeIn(200);
		$('.showDet').fadout(200);
	});

	//

});
