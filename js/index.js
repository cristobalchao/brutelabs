$(document).ready(function(){

	$('#anim').css({'width':'633px'});

	$('.featured_project, .more_button, .buy_button a, .donate_button img').live('click', function(){
		alert('Coming very soon...');
		return false;
	});

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

	$('#container').css({'width':'654px','margin-left':'0','margin-right':'0'});
	$('#container').kaotope($element); 

	$('#brute_logo_box').click(function(){
		if ($('#menu li a').hasClass('active')){
			$('#entry,.bot-col').animate({ height: 'toggle', opacity: 'toggle' }, 800);
			$('#menu li a').removeClass('active');

			$('#anim').animate({'width':'633px'},400,
				function(){
					var height = $("#submenu").height();
					$('#anim').animate({height:height},400);
				});
			$('#container').css({'width':'654px'});
			$('#container').kaotope($element);
		}
		return false;
	}); 

	$('#menu-projects').live('click',function(){
		if (!$(this).hasClass('active')) {
			$('#entry,.bot-col').animate({ height: 'toggle', opacity: 'toggle' }, 800);
			$(this).addClass('active');
			var height = $("#submenu").height();
			$('#anim').animate({'width':'100%'},400,
				function(){
					var height = $("#submenu").height();
					$('#anim').css({height:height},400);
				});
			$('#container').css({'width':'976px'});
			$('#container').kaotope($element);
		}

		return false;
	});

	//Custom function which use the fadeElements function to make the changes
	function switchProjects(newElem) {
		newElem.children('.mark_project_image').children('.featured_project_image').attr('src',$('article[data-id="'+arr[cnt]+'"] .large-image',$container).attr('src'));
		var ftitle = $('article[data-id="'+arr[cnt]+'"] .elem-title',$container).html();
		var fcontent = $('article[data-id="'+arr[cnt]+'"] .elem-content',$container).html();
		newElem.children('.featured_project_description').children('.feature_project_name').html(ftitle);
		var tot = 290-ftitle.length;
		(fcontent.length > tot)?st = fcontent.substr(0,tot)+'...':st = fcontent.substr(0,tot);
		newElem.children('.featured_project_description').children('.feature_project_text').html(st);
	}
	                                                                                
	//Elements must be declared with fixed/absolute position
	function fadeElements() {
		$fprj = $('.featured_project');
		$clone = $fprj.clone();
		$clone.css({'opacity':'0'});
		$('#banner .banner_text .banner_text_after_prefix').html($('article[data-id="'+arr[cnt]+'"] .banner .banner_text .banner_text_after_prefix',$container).html())

		var url_img = $('article[data-id="'+arr[cnt]+'"] .elem-image .large-image',$container).css('background-image');
		$clone.children('.mark_project_image').children('.featured_project_image').css({'background-image':url_img});
		var ftitle = $('article[data-id="'+arr[cnt]+'"] .elem-title',$container).html();
		var fcontent = $('article[data-id="'+arr[cnt]+'"] .elem-content',$container).html();
		$clone.children('.featured_project_description').children('.feature_project_name').html(ftitle);
		var tot = 210-ftitle.length;
		(fcontent.length > tot)?st = fcontent.substr(0,tot)+'...':st = fcontent.substr(0,tot);
		$clone.children('.featured_project_description').children('.feature_project_text').html(st);
	
		$fprj.after($clone);
		$fprj.animate({opacity:0},2000,function(){
			$fprj.remove();
		});
		$clone.animate({opacity:1},2000);
	};
			
	function timer() {
		(cnt < art_len-1)?cnt++:cnt=0;
		fadeElements();
	}
	
	var art_len = $('#container article').length;
	
	var numRand = 0;
	var ant = 0;
	shuffle = function(o){ 
		for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
		return o;
	};
	
	var arr = [];
	
	for(var i = 0; i < art_len; i++) {
	    arr.push(i);
	}
	
	window.setInterval(timer, 5000);
	
	var cnt = -1;
	var $container = $('#container').clone();
	arr = shuffle(arr);
	timer();
});