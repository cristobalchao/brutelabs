$(document).ready(function(){
	$('#menu-about').addClass('active');

	/*$('.principle').click(function(){
		if (!$(this).hasClass('active')){
			$('.principle .content').slideUp();
			$('.content',$(this)).slideDown();
			$('.principle').removeClass('active');
			$(this).addClass('active');
		}
	});*/

	function refreshSubMenu() {
		($('#ab-vision').children('.sbmstitle').hasClass('active'))?$('#ab-vision').children('.arrow-down-border').css({'opacity':1}):$('#ab-vision').children('.arrow-down-border').css({'opacity':0});
		($('#ab-people').children('.sbmstitle').hasClass('active'))?$('#ab-people').children('.arrow-down-border').css({'opacity':1}):$('#ab-people').children('.arrow-down-border').css({'opacity':0});
	}

	$('.smelem > div').mouseover(function(){
		(!$(this).children('.sbmstitle').hasClass('active'))?$(this).children('.arrow-down-border').css({'opacity':1}):null;
	});

	$('.smelem > div').mouseout(function(){
		(!$(this).children('.sbmstitle').hasClass('active'))?$(this).children('.arrow-down-border').css({'opacity':0}):null;
	});

	$('.sbmstitle').click(function(){
		if (!$(this).hasClass('active')){
			var section = $(this).attr('section');

			($(this).attr('id') =='ab-vision')?_timer = window.setInterval(timer, 5000):null;
			$('.about-section').animate({ height: 'toggle', opacity: 'toggle' }, 800);
			$('#main-'+section).slideDown();

			$('.sbmstitle').removeClass('active');
			$(this).addClass('active');
			refreshSubMenu();
		}
	});
	
	$('.get_people_ajax').unbind('click').click(function(event){
		event.preventDefault();
		clearTimeout(_timer);
		if(! $('.info-people .bio_section').is(':animated') && !$(this).hasClass('active') ) {
			var op = 0;
			($(this).hasClass("get_person"))?op=1:null;
			$('.loading ,.loading-small').show();
			doAjaxRequest(getURLParameter($(this).attr('href'),'id'),op,$(this).html());
		}
		return false;
	});

	function setAndFadePersonalInfo(data,name){
		$banner = $('.info-people .banner .banner-absolute');
		$bio = $('.info-people .bio_section');
		$pers = $('.personal_info .bordered_box');
		$clone_bio = $bio.clone();
		$clone_pers = $pers.clone();
		$clone_banner = $banner.clone();

		$banner.addClass("remove");
		$bio.addClass("remove");
		$pers.addClass("remove");
		$clone_bio.css({'opacity':'0'});
		$clone_pers.css({'opacity':'0'});
		$clone_banner.css({'opacity':'0'});

		var $back_img = $('.bio_picture .bio_image', $clone_bio);
		var $img = $('.bio_picture img', $clone_bio);

		$img.attr('src',data.url_image);
		$back_img.css({'background-image':'url("'+data.url_image+'")'});

		$('.bio_text .content',$clone_bio).html(data.bio);
		$('.subsection_box #bio_location span',$clone_pers).html(data.location);
		$('.subsection_box #bio_work span',$clone_pers).html(data.work);
		$('.subsection_box #bio_brute span',$clone_pers).html(data.brutew);
		$('.subsection_box #bio_more span',$clone_pers).html(data.more_info);
		$('.banner_text .banner_text_after_prefix',$clone_banner).html(name);

		$img.load(function(){
			$bio.after($clone_bio).animate({opacity:0},1000,function(){
				$bio.parent().children('.remove').remove();
			});
			$pers.after($clone_pers).animate({opacity:0},1000,function(){
				$pers.parent().children('.remove').remove();
			});
			$banner.after($clone_banner).animate({opacity:0},1000,function(){
				$banner.parent().children('.remove').remove();
			});
			
			$clone_bio.animate({opacity:1},1000);
			$clone_pers.animate({opacity:1},1000);
			$clone_banner.animate({opacity:1},1000);
			$('.loading ,.loading-small').hide();
		});	
	}

	function doAjaxRequest(_id,option,name){
		(!_id)?_id=null:null;

		$.ajax({
			url: ajaxurl,
			data: {
				'action':'view_people',
				'id':_id
			},
			success:function(data){
				obj = $.parseJSON(data);
				$('.link a').removeClass('active');
				$('.link[id_people="'+ _id +'"] a').addClass('active');
				setAndFadePersonalInfo(obj,name);
				if (!option) {
					$('#main-people .banner').hide();
					$('.info-people .banner, .info-people').fadeIn("slow");
				}
			}, error: function (errorMessage){
				console.log(errorMessage);
				return false;
			}
		})
	}

	function getURLParameter(url,name) {
		return decodeURI(
			(RegExp(name + '=' + '(.+?)(&|$)').exec(url)||[,null])[1]
			);
	}

	shuffle = function(o){ 
		for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
		return o;
	};

	var art_len = $('#banners .banner_text_hide').length; 

	function timer() {
		(cnt < art_len-1)?cnt++:cnt=0;
		$('#banner .banner_text .banner_text_after_prefix').html($('#banners .banner_text_hide[data-id="'+arr[cnt]+'"]').html())
	}

	var arr = [];
	
	for(var i = 0; i < art_len; i++) {
	    arr.push(i);
	}

	var _timer = window.setInterval(timer, 5000);
	
	var cnt = -1;
	arr = shuffle(arr);

	timer();

	refreshSubMenu();
});