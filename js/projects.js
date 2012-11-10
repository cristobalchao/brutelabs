$(document).ready(function(){

	$('.more_button').live('click', function(){
		alert('Project Spotlight : Coming very soon...');
		return false;
	});

	$('#menu-projects').addClass('active');
	$('#sbmcontent').css({'width':'840px'});
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
					href:'#'+value
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
});