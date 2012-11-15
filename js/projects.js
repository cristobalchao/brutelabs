function setMapAddress(elem) {
	var geocoder = new google.maps.Geocoder();
	var address = $('#'+elem).attr('address');
	geocoder.geocode( { address : address }, function( results, status ) {
		if( status == google.maps.GeocoderStatus.OK ) {
			var latlng = results[0].geometry.location;
			
			var options = {
				zoom: 13,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			var map = new google.maps.Map( document.getElementById(elem), options );

			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(latlng.lat(), latlng.lng()), 
				map: map
			});

		}
	} );
}

function activeSlider(slide_id){
	$('#image_selected_'+slide_id).css({'background-image':'url("'+ $("#slider_"+slide_id+' .active').attr('src')+'")'}); 

	$("#slider_"+slide_id).FlowSlider({
		controllerOptions: [{
			mouseStart: 0,
			mouseEnd: 0
		}]
	});

	$("#slider_"+slide_id+' .item').live('click',function(){
		if(!$('#image_selected_'+slide_id).is(':animated')) {
			$("#slider_"+slide_id+" .item").removeClass('active');
			$(this).addClass('active');

			$clone = $('#image_selected_'+slide_id).clone();
			$clone.css({'opacity':'0'});

			$clone.css({'background-image':'url("'+ $(this).attr('src')+'")'});

			$('#image_selected_'+slide_id).after($clone);

			$('#image_selected_'+slide_id).animate({opacity:0},800,function(){
				$('#image_selected_'+slide_id).remove();
			});
			$clone.animate({opacity:1},800);
		}
	});
}

function activeSpotlight(id){
	$('#container, #anim').animate({ height: 'toggle', opacity: 'toggle' }, 800);
	$('html, body').animate({scrollTop:0}, 1000);
	$move_elem = $('#spot-'+id);
	$('#container').after($move_elem);

	($('#map_canvas_'+id).attr('address') != "")?setMapAddress('map_canvas_'+id):$('#map_container_'+id).hide();
	$('#slider_'+id+' img').each(function (){
		$(this).attr('src',$(this).attr('url'));
	});

	activeSlider(id);
	$move_elem.removeClass('hide');
}

function hideSpotlight(){
	$('.spotlight').addClass('hide');
	($('#container').css('display') == 'none')?$('#container, #anim').animate({ height: 'toggle', opacity: 'toggle' }, 800):null;
}

$(document).ready(function(){

	$('.more_button').unbind('click').click(function(){
			_url = window.location.href.split('/projects/')[1];
			(!_url)?_url='#':null;
			$('#menu-projects').attr('href',_url).addClass('effect');
	});

	$('#menu-projects').addClass('active');
	$('.sbcontent').css({'width':'840px'});
	//MENU PROJECTS
	var items = $('#container article'),
	itemsByTags = {};

	$("<a id='.*' class='elem' href='#all'>All</a>").appendTo('#filter');

	items.each(function(i){
		var elem = $(this),
		tags = elem.data('filter').split(',');

		$.each(tags,function(key,value){
			// Removing extra whitespace:
			value = $.trim(value);

			value = value.replace(/\s/g,"-"); 
			elem.addClass(value);

			if(!(value in itemsByTags)){
				// Create an empty array to hold this item:
				itemsByTags[value] = [];
				var text = value.replace(/-/g," ");
				var a = $('<a>',{
					id: '.'+value,
					class: 'elem',
					html: text,
					href:'#/filter/'+value
				}).appendTo('#filter');
			}

			// Each item is added to one array per tag:
			itemsByTags[value].push(elem);
		});
	});
	var height = $("#submenu").height();
	$("#anim").css({ height : height }).show();
	var _action = '.elem-image, .action';

	$(_action).mouseover(function(){
		if (!$(this).parent('.element').hasClass('large')) {
			$(this).parent('.element').children('.elem-image').children('.small-image').css({'opacity':.7});
			$(this).parent('.element').children('.action').css({'opacity':'.6'});
			$(this).parent('.element').addClass('shadow');
			$(this).parent('.element').children('.elem-image').children('.expand-proj').css({'display':'block'});
		}
	});

	$(_action).mouseout(function(){
		$('.element').removeClass('shadow');
		$('.expand-proj').hide();
		$(this).parent('.element').children('.elem-image').children('.small-image').css({'opacity':1});
		$(this).parent('.element').children('.action').css({'opacity':1});
	});
	
	// Outside the plugin
	var $element = {
		jqelement : $('.element'),
		action_expand : '.elem-image, .action',
		action_collapse : '.collapse_button',
		subelements_toExpand : '.elem-image div, .box_title, .banner, .action, .elem-descr, .efooter, .more_button, .elem-image .small-image, .elem-image .large-image',
		subelements_effects : '.elem-descr, .elem-image, .efooter, .banner',
		filter : '#filter a',
		options : {
			time_effect : 1000,
			scroll:true
		}
	};


	
	$('#container').kaotope($element);

	var stp_resize = false;

	$(window).resize(function() {
		if ($(window).width() < 950) {
			if (!stp_resize) {
				$('#sbmcontent').css({'width':'520px'});
				$('nav#menu').animate({'width':'635px'},400);
				$('#anim').animate({'width':'633px'},400,
				function(){
					var height = $("#submenu").height();
					$('#anim').animate({height:height},400);
				});
				$('#container').css({'margin-left':0,'margin-right':0});
				$('#container').css({'width':'654px'});
				$('#container').kaotope($element);
				stp_resize=true;
			} 
		} else if ($(window).width() > 950) {
			if (stp_resize) {
				$('nav#menu').animate({'width':'962px'},400);
				$('#sbmcontent').css({'width':'840px'});
				$('#anim').animate({'width':'100%'},400,
					function(){
						var height = $("#submenu").height();
						$('#anim').animate({height:height},400);
					});
				$('#container').css({'margin-left':'auto','margin-right':'auto'});
				$('#container').css({'width':'976px'});
				$('#container').kaotope($element);
				stp_resize=false;
			}
		}
	});

	//SPOTLIGHT
	$(window).on('hashchange',function() {
		var stateSpot = window.location.href.split('#/spotlight/')[1];
		var stateProj = window.location.href.split('/projects/')[1];
		(!!stateSpot)?activeSpotlight(stateSpot):null;
		(stateProj == "#" || stateProj == "" || stateProj.indexOf("#/filter/") > -1)?hideSpotlight():null;
	});

	var stateSpot = window.location.href.split('#/spotlight/')[1];
	var stateProj = window.location.href.split('/projects/')[1];
	(!!stateSpot)?activeSpotlight(stateSpot):null;
	(stateProj == "#" || stateProj == "" || stateProj.indexOf("#/filter/") > -1)?hideSpotlight():null;
});