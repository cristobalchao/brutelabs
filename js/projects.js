$(document).ready(function(){

	$('#menu-projects').addClass('active');

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

	// Outside the plugin
	var $element = {
		jqelement : $('.element'),
		action_expand : '.action-expand',
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
});