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

function thisIsProjects() {
	return ($('.more_button a').attr('href').indexOf('#/projects/') > -1);
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
    (thisIsProjects())?
    	($('#container, #anim').animate({ height: 'toggle', opacity: 'toggle' }, 800))
		:($('#container, #anim, .base_elem' ).animate({ height: 'toggle', opacity: 'toggle' }, 800));
		
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
	($('#container').css('display') == 'none')?(
		(thisIsProjects())?
			($('#container, #anim' ).animate({ height: 'toggle', opacity: 'toggle' }, 800),
				$('.element').css({opacity:1,scale:1})
				)
			:($('#container, #anim, .base_elem' ).animate({ height: 'toggle', opacity: 'toggle' }, 800))
		):null;
}

$(document).ready(function(){

	//SPOTLIGHT
	$(window).on('hashchange',function() {
		var stateSpot = window.location.href.split('#/spotlight/')[1];
		var stateProj = window.location.href.split(window.location.host+'/')[1];
		if (stateProj.indexOf('#/main/') == -1) {
			(!!stateSpot)?activeSpotlight(stateSpot):(stateProj == "#" || stateProj == "" || stateProj.indexOf("#/filter/") > -1 || stateProj.indexOf("#/projects/") > -1)?hideSpotlight():null;
		}
	});

	/* $('.more_button').unbind('click').click(function(){
		_url = $('a',this).attr('href').split('#/spotlight/')[0];
		(!_url)?_url='#':null;
		$('#menu-projects').attr('href',_url).addClass('effect');
		$('.back').attr('href',_url).addClass('effect');
	}); */

	/* $('#menu-projects').unbind('click').click(function(){
		_url = $('.more_button a').attr('href');
		$('.more_button a').attr('href', '#/projects/'+_url);

		if (!$(this).hasClass('active')) {
			$('#entry,.bot-col').animate({ height: 'toggle', opacity: 'toggle' }, 800);
			$(this).addClass('active');
			var height = $("#submenu").height();
			$('.sbcontent').css({'width':'840px'});

			$('#anim').animate({'width':'100%'},400,
				function(){
					var height = $("#submenu").height();
					$('#anim').css({height:height},400);
				});
			$('#container').css({'width':'976px'});
			$('#container').kaotope($element);
		}

		return false;
	});*/

	//$('#menu-main').attr('href',$('#menu-main').attr('href')+'#/main/');

	$('#anim').css({'width':'633px'});

	$('.buy_button a, .donate_button img').live('click', function(){
		alert('Coming very soon...');
		return false;
	});

	//MENU PROJECTS
	var items = $('#container article'),
	itemsByTags = {};

	$("<a id='.*' class='elem' href='#/filter/all'>All</a>").appendTo('#filter');

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
		action_expand : '.elem-image .small-image, .action',
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
			$('.sbcontent').css({'width':'520px'});
			$('#anim').animate({'width':'633px'},400,
				function(){
					var height = $("#submenu").height();
					$('#anim').animate({height:height},400);
				});
			$('#container').css({'width':'654px'});
			$('#container').kaotope($element);
		}
	});

	//Custom function which use the fadeElements function to make the changes
	function switchProjects(newElem) {
		newElem.children('.mark_project_image').children('.go_spot').children('.featured_project_image').attr('src',$('article[data-id="'+arr[cnt]+'"] .large-image',$container).attr('src'));
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
		$clone.children('.mark_project_image').children('.go_spot').children('.featured_project_image').css({'background-image':url_img});
		var ftitle = $('article[data-id="'+arr[cnt]+'"] .elem-title',$container).html();
		var fcontent = $('article[data-id="'+arr[cnt]+'"] .elem-content',$container).html();
		var url_spotlight = '#/spotlight/'+$('article[data-id="'+arr[cnt]+'"]').attr('id').split('-')[1];	
		$clone.children('.mark_project_image').children('.go_spot').attr('href',url_spotlight);
		$clone.children('.featured_project_description').children('.feature_project_name').html(ftitle);
		$clone.children('.featured_project_description').children('.feature_project_text').html(fcontent);

		$fprj.after($clone);
		$fprj.animate({opacity:0},1000,function(){
			$fprj.remove();
		});
		$clone.animate({opacity:1},1000);
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

	$("#slider").FlowSlider({
		controllerOptions: [{
			mouseStart: 0,
			mouseEnd: 0
		}]
	});

	$('#slider .item').live('click',function(){

		if(!$('#image_selected').is(':animated')) {
			$('#slider .item').removeClass('active');
			$(this).addClass('active');

			$clone = $('#image_selected').clone();
			$clone.css({'opacity':'0'});


			$clone.css({'background-image':'url("'+ $(this).attr('src')+'")'});

			$('#image_selected').after($clone);

			$('#image_selected').animate({opacity:0},800,function(){
				$('#image_selected').remove();
			});
			$clone.animate({opacity:1},800);
		}
	});
});