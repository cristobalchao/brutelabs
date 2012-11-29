$(document).ready(function(){
	$('.archive-month a.active').live('click', function() {
		return false;
	});

	$('.archive-month a,.archive-year a').live('click', function() {
		_date = $(this).attr('date');

		if ($('.blog_entry[date="'+_date+'"]').length != 0) {
			$('.blog_entry').animate({'opacity':.5},500);
			$('html, body').animate({scrollTop: $('.blog_entry[date="'+_date+'"]').offset().top}, 1000,
				function(){
					$('.blog_entry').animate({'opacity':1},500);
				});
			return false;
		}
	});

	$('.archive-month a[href="'+ window.location.href +'"]').addClass('active');
	$('.archive-year a[href*="'+ window.location.pathname.split('/')[1] +'"]').addClass('active');
	$('#menu-blog').addClass('active');

	var halfWay = ($(document).height()/2);
	(halfWay - 600 > 0)?halfWay -= 600:null;
	var offset = 0;

	var inAction = false;
	var archive_top = $('#archive').position().top - 10;
	var stp = false;
	var pathname = window.location.pathname;
	var year="", month="";
	(!!window.location.search)?(
		year = pathname.split("/")[1],
		month = pathname.split("/")[2]
		):offset = 10;

	$(document).scroll(function(){
		if (!stp && $(document).scrollTop() > archive_top) {
			$('#archive').css({'position':'fixed','top':'10px'});
			stp = true;
		} else if (stp && $(document).scrollTop() < archive_top){
			$('#archive').css({'position':'relative','top':'0'});
			stp = false;
		}

		if($(document).scrollTop() > halfWay && inAction == false){
			inAction = true;
			$.ajax({
				url: ajaxurl,
				data: {
					'action':'get_ajax_posts',
					'n_posts':'2',
					'offset': offset.toString(),
					'month' : month,
					'year' : year,
					'tag' : window.location.href.split('/tag/')[1].split('/')[0]
				},
				success:function(data){
					if (data != '') {
						$('img',$(data)).each(function(){
							var _w = parseInt($(this).attr('width'));
							var _h = parseInt($(this).attr('height'));
							var val = (((800 - _w)*100)/_w)*_h;
							$(this).attr('height',val).attr('width',800);
						});

						$('.feed_entries').append(data);
						halfWay = ($(document).height()/2);
						inAction=false;
						offset+=2;



					}
				}, error: function (errorMessage){
					console.log(errorMessage);
					return false;
				}
			})
		} 
	});

$('.archive_box li a').live('click',function(){
	$('.archive_box li a').removeClass('active');
	$(this).addClass('active');

});

$('.feed_entries img').each(function(){
	var _w = parseInt($(this).attr('width'));
	var _h = parseInt($(this).attr('height'));
	var val = (((800 - _w)*100)/_w)*_h;
	$(this).attr('height',val).attr('width',800);
});
});