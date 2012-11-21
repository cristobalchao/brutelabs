/** DONATE **/
// JavaScript I wrote to limit what types of input are allowed to be keyed into a textbox
var allowedSpecialCharKeyCodes = [46,8,37,39,35,36,9];
var numberKeyCodes = [44, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105];
var commaKeyCode = [188];
var decimalKeyCode = [190,110];

function numbersOnly(event) {
    var legalKeyCode =
        (!event.shiftKey && !event.ctrlKey && !event.altKey)
            &&
        (jQuery.inArray(event.keyCode, allowedSpecialCharKeyCodes) >= 0
            ||
        jQuery.inArray(event.keyCode, numberKeyCodes) >= 0);

    if (legalKeyCode === false)
        event.preventDefault();
}

function numbersAndCommasOnly(event) {
    var legalKeyCode =
        (!event.shiftKey && !event.ctrlKey && !event.altKey)
            &&
        (jQuery.inArray(event.keyCode, allowedSpecialCharKeyCodes) >= 0
            ||
        jQuery.inArray(event.keyCode, numberKeyCodes) >= 0
            ||
        jQuery.inArray(event.keyCode, commaKeyCode) >= 0);

    if (legalKeyCode === false)
        event.preventDefault();
}

function decimalsOnly(event) {
    var legalKeyCode =
        (!event.shiftKey && !event.ctrlKey && !event.altKey)
            &&
        (jQuery.inArray(event.keyCode, allowedSpecialCharKeyCodes) >= 0
            ||
        jQuery.inArray(event.keyCode, numberKeyCodes) >= 0
            ||
        jQuery.inArray(event.keyCode, commaKeyCode) >= 0
            ||
        jQuery.inArray(event.keyCode, decimalKeyCode) >= 0);

    if (legalKeyCode === false)
        event.preventDefault();
}


function currenciesOnly(event) {
    var legalKeyCode =
        (!event.shiftKey && !event.ctrlKey && !event.altKey)
            &&
        (jQuery.inArray(event.keyCode, allowedSpecialCharKeyCodes) >= 0
            ||
        jQuery.inArray(event.keyCode, numberKeyCodes) >= 0
            ||
        jQuery.inArray(event.keyCode, commaKeyCode) >= 0
            ||
        jQuery.inArray(event.keyCode, decimalKeyCode) >= 0);

    if (legalKeyCode === false)
        event.preventDefault();
}

// jQuery formatCurrency plugin... see http://code.google.com/p/jquery-formatcurrency/
(function($){$.formatCurrency={};$.formatCurrency.regions=[];$.formatCurrency.regions[""]={symbol:"",positiveFormat:"%s%n",negativeFormat:"(%s%n)",decimalSymbol:".",digitGroupSymbol:",",groupDigits:true};
$.fn.formatCurrency=function(destination,settings){if(arguments.length==1&&typeof destination!=="string"){settings=destination;destination=false
}var defaults={name:"formatCurrency",colorize:false,region:"",global:true,roundToDecimalPlace:2,eventOnDecimalsEntered:false};defaults=$.extend(defaults,$.formatCurrency.regions[""]);
settings=$.extend(defaults,settings);if(settings.region.length>0){settings=$.extend(settings,getRegionOrCulture(settings.region))}settings.regex=generateRegex(settings);
return this.each(function(){$this=$(this);var num="0";num=$this[$this.is("input, select, textarea")?"val":"html"]();if(num.search("\\(")>=0){num="-"+num
}if(num===""||(num==="-"&&settings.roundToDecimalPlace===-1)){return}if(isNaN(num)){num=num.replace(settings.regex,"");if(num===""||(num==="-"&&settings.roundToDecimalPlace===-1)){return
}if(settings.decimalSymbol!="."){num=num.replace(settings.decimalSymbol,".")}if(isNaN(num)){num="0"}}var numParts=String(num).split(".");var isPositive=(num==Math.abs(num));
var hasDecimals=(numParts.length>1);var decimals=(hasDecimals?numParts[1].toString():"0");var originalDecimals=decimals;num=Math.abs(numParts[0]);
num=isNaN(num)?0:num;if(settings.roundToDecimalPlace>=0){decimals=parseFloat("1."+decimals);decimals=decimals.toFixed(settings.roundToDecimalPlace);
if(decimals.substring(0,1)=="2"){num=Number(num)+1}decimals=decimals.substring(2)}num=String(num);if(settings.groupDigits){for(var i=0;i<Math.floor((num.length-(1+i))/3);
i++){num=num.substring(0,num.length-(4*i+3))+settings.digitGroupSymbol+num.substring(num.length-(4*i+3))}}if((hasDecimals&&settings.roundToDecimalPlace==-1)||settings.roundToDecimalPlace>0){num+=settings.decimalSymbol+decimals
}var format=isPositive?settings.positiveFormat:settings.negativeFormat;var money=format.replace(/%s/g,settings.symbol);money=money.replace(/%n/g,num);
var $destination=$([]);if(!destination){$destination=$this}else{$destination=$(destination)}$destination[$destination.is("input, select, textarea")?"val":"html"](money);
if(hasDecimals&&settings.eventOnDecimalsEntered&&originalDecimals.length>settings.roundToDecimalPlace){$destination.trigger("decimalsEntered",originalDecimals)
}if(settings.colorize){$destination.css("color",isPositive?"black":"red")}})};$.fn.toNumber=function(settings){var defaults=$.extend({name:"toNumber",region:"",global:true},$.formatCurrency.regions[""]);
settings=jQuery.extend(defaults,settings);if(settings.region.length>0){settings=$.extend(settings,getRegionOrCulture(settings.region))}settings.regex=generateRegex(settings);
return this.each(function(){var method=$(this).is("input, select, textarea")?"val":"html";$(this)[method]($(this)[method]().replace("(","(-").replace(settings.regex,""))
})};$.fn.asNumber=function(settings){var defaults=$.extend({name:"asNumber",region:"",parse:true,parseType:"Float",global:true},$.formatCurrency.regions[""]);
settings=jQuery.extend(defaults,settings);if(settings.region.length>0){settings=$.extend(settings,getRegionOrCulture(settings.region))}settings.regex=generateRegex(settings);
settings.parseType=validateParseType(settings.parseType);var method=$(this).is("input, select, textarea")?"val":"html";var num=$(this)[method]();
num=num?num:"";num=num.replace("(","(-");num=num.replace(settings.regex,"");if(!settings.parse){return num}if(num.length==0){num="0"}if(settings.decimalSymbol!="."){num=num.replace(settings.decimalSymbol,".")
}return window["parse"+settings.parseType](num)};function getRegionOrCulture(region){var regionInfo=$.formatCurrency.regions[region];if(regionInfo){return regionInfo
}else{if(/(\w+)-(\w+)/g.test(region)){var culture=region.replace(/(\w+)-(\w+)/g,"$1");return $.formatCurrency.regions[culture]}}return null}function validateParseType(parseType){switch(parseType.toLowerCase()){case"int":return"Int";
case"float":return"Float";default:throw"invalid parseType"}}function generateRegex(settings){if(settings.symbol===""){return new RegExp("[^\\d"+settings.decimalSymbol+"-]","g")
}else{var symbol=settings.symbol.replace("$","\\$").replace(".","\\.");return new RegExp(symbol+"|[^\\d"+settings.decimalSymbol+"-]","g")}}})(jQuery);


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

	$('.slider > div').css({'left':0});

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
	$('#container, .base_elem, #anim' ).animate({ height: 'toggle', opacity: 'toggle' }, 800);
	
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
		$('#container, #anim, .base_elem' ).animate({ height: 'toggle', opacity: 'toggle' }, 800)
		):null;
}

$(document).ready(function(){

	//TWITTER
	$('.share .twitter', this).bind('click', function(e){
		e.preventDefault();
		var loc = $(this).attr('href');
		var title  = $(this).attr('title');
		window.open('http://twitter.com/share?url=' + loc + '&text=' + title, 'twitterwindow', 'height=450, width=550, top='+($(window).height()/2 - 225) +', left='+$(window).width()/2 +', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
	});

	//FACEBOOK
	$('.share .facebook', this).bind('click', function(e){
		e.preventDefault();
		var loc = $(this).attr('href');
		var title  = $(this).attr('title');
		window.open('https://www.facebook.com/sharer/sharer.php?u=http://brutelabs.org/'+title);
	});

	//DONATE
	 $('.custom_value').val('');
	 $("input[type=radio]").attr('checked',false);

	 $("input[type=text].custom_value").live('keydown', currenciesOnly)
                             .live('blur', function () { $(this).formatCurrency(); });

    $('.custom_value').change(function() {
      $(this).parent().children('input[id^="item_price_other"]').val(this.value).attr('checked',true);
    });

    $('.donate_button img').click(function(){
    	$(this).parent().parent().animate({ height: 'toggle', opacity: 'toggle' }, 800);
		$(this).parent().parent().parent().children('#donate-more').slideDown();
    });

    $('#donate-more .collapse_button').click(function(){
    	$(this).parent().parent().animate({ height: 'toggle', opacity: 'toggle' }, 800);
		$(this).parent().parent().parent().children('#donate').slideDown();
    });

	//SPOTLIGHT
	$('.go-spot').unbind('click').click('click',function(){
		if(history.pushState && history.replaceState) {
			var _tit = $(this).attr('title');
			var _id = $(this).attr('spot_id');
			history.pushState({"id":_id}, _tit, "/"+_tit);
			activeSpotlight(_id);
			return false;
		}
	});

	$('.go_spot').live('click',function(){
		console.log($(this).attr('title'));
		if(history.pushState && history.replaceState) {
			var _tit = $(this).attr('title');
			var _id = $(this).attr('spot_id');
			history.pushState({"id":_id}, _tit, "/"+_tit);
			activeSpotlight(_id);
			return false;
		}
	});

	$('.spotlight_back .back').unbind('click').click('click',function(){
		if(history.pushState && history.replaceState) {
			var _id = $(this).attr('spot_id')+1;
			history.pushState({"id":_id}, "", "/");
			hideSpotlight();
			return false;
		}

	});

	if(history.pushState && history.replaceState) {
		_project = unescape(location.pathname.split('/')[location.pathname.split('/').length-1]).toLowerCase();
		$('.go-spot').each(function(){
			if (_project == $(this).attr('title').toLowerCase()){
				var _tit = $(this).attr('title');
				var _id = $(this).attr('spot_id');
				history.pushState({"id":_id}, _tit, "/"+_tit);
				activeSpotlight(_id);
				return false;
			}
		});
	}

/*
	$(window).on('hashchange',function() {
		var stateSpot = window.location.href.split('#/spotlight/')[1];
		var stateProj = window.location.href.split(window.location.host+'/')[1];

		if (stateProj.indexOf('#/main/') == -1) {
			(!!stateSpot)?activeSpotlight(stateSpot):(stateProj == "#" || stateProj == "" || stateProj.indexOf("#/filter/") > -1 || stateProj.indexOf("#/projects/") > -1 || stateProj == "brutepress/#" || stateProj == "brutepress" || stateProj.indexOf("#/filter/") > -1 || stateProj.indexOf("brutepress/#/projects/") > -1)?hideSpotlight():null;
		}
	});


/*
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

	var dynamic_col = $('#dynamic_col').position().top;
	var stp = false;
	$(document).scroll(function(){
		if (!stp && $(document).scrollTop() > dynamic_col) {
			$('#dynamic_col').css({'position':'fixed','top':'0'});
			stp = true;
		} else if (stp && $(document).scrollTop() < dynamic_col){
			$('#dynamic_col').css({'position':'relative','top':'0'});
			stp = false;
		}
	});


	$('#anim').css({'width':'633px'});

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

	$('.large-image').mouseover(function(){
		$(this).parent().parent().parent('.element').children('.spotlight-go').css({'opacity':.7});
	});

	$('.large-image').mouseout(function(){
		$(this).parent().parent().parent('.element').children('.spotlight-go').css({'opacity':0});
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
		var id_spot = $('article[data-id="'+arr[cnt]+'"]').attr('id').split('-')[1];
		var url_spotlight = '#/spotlight/'+id_spot;
		var ftitle = $('article[data-id="'+arr[cnt]+'"] .elem-title',$container).html();
		newElem.children('.mark_project_image').children('.go_spot').attr('href',url_spotlight).attr('spot_id',id_spot).attr('title',ftitle);
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
		var id_spot = $('article[data-id="'+arr[cnt]+'"]').attr('id').split('-')[1];
		var url_spotlight = '#/spotlight/'+id_spot;
		$clone.children('.mark_project_image').children('.go_spot').attr('href',url_spotlight).attr('spot_id',id_spot).attr('title',ftitle);
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