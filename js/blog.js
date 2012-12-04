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
			(!!window.location.href.split('/tag/')[1])?
				_tag=window.location.href.split('/tag/')[1].split('/')[0]:_tag="";

			(!$('.loading-blog').hasClass('active'))?$('.loading-blog').addClass('active'):null;

			$.ajax({
				url: ajaxurl,
				data: {
					'action':'get_ajax_posts',
					'n_posts':'2',
					'offset': offset.toString(),
					'month' : month,
					'year' : year,
					'tag' : _tag
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

					$('.loading-blog').removeClass('active');
				}, error: function (errorMessage){
					console.log(errorMessage);
					$('.loading-blog').removeClass('active');
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

$('.comments').unbind('click').bind('click',function(event){
	$this = $(this);
	$this_comment = $this.parent().parent().parent().children('.blog_comments');
	var stp = false;


	if (!$this_comment.hasClass('active')) {
		$this_comment.addClass('active');
		$('html, body').animate({scrollTop: $(this).parent().parent().parent().children('.blog_entry_footer').offset().top}, 500,
			function(){
				(!stp)?(
					$this_comment.animate({ height: 'toggle', opacity: 'toggle' }, 800),
					stp = true):null;
			});
	} else {
		$('html, body').animate({scrollTop: $(this).parent().parent().parent().children('.blog_entry_footer').offset().top}, 500);
	}
	return false;
});

$('.post-comment .post-title').live('click',function(){
	$(this).parent().children('.box-post').animate({ height: 'toggle', opacity: 'toggle' }, 800);
	return false;
});

$('.publish-button').click(function(){
	var $loading = $(this).siblings('.loading-small');
	$loading.css({'display':'block'});

	var $name = $(this).siblings('.post-name');
	var $email = $(this).siblings('.post-email');
	var $id = $(this).parent().parent().parent().parent().attr('id');

	var $content = $(this).siblings('textarea');
	var $post_box = $(this).parent().parent();

	if ( $name.val() == '' || $email.val() == '' || $content.val() == '') {
		($name.val() == '')?$name.addClass('error'):null;
		($email.val() == '')?$email.addClass('error'):null;
		($content.val() == '')?$content.addClass('error'):null;
		return false;
	} else {
		$.ajax({
			url: ajaxurl,
			type: 'POST',
			dataType: 'json',
			data: {
				'action':'set_ajax_comment',
				'id':$id,
				'name':$name.val(),
				'email':$email.val(),
				'content':$content.val()
			},
			success:function(data){
				if (data) {
					$new_comment = '<div class="comment newComment"><div class="comment-header"><a href="mailto:'+data['email']+'"><span class="comment-author">'+data['name']+'</span></a> says : <span class="comment-date">'+data['time']+'</span></div><div class="content-comment">'+data['content']+'</div></div>';
					$post_box.prepend($new_comment);
					var _hNew = $('.newComment').offset().top;

					$('.newComment').animate({ height: 'toggle', opacity: 'toggle' }, 800, function(){
						$('html, body').animate({scrollTop: _hNew}, 500);
						$(this).removeClass('newComment');
						clearPostBox();
						$loading.css({'display':'none'});
					});
					$post_box.children('.box-post').animate({ height: 'toggle', opacity: 'toggle' }, 800);
				} else {
					console.log('Error in AJAX');
					$loading.css({'display':'none'});
				}
			}, error: function (errorMessage){
				console.log(errorMessage);
				$loading.css({'display':'none'});
				return false;
			}
		});
	}
});

$('.post-name, textarea').focus(function(){
	$(this).removeClass('error');
});

function clearPostBox(){
	$('.post-name, .post-email, textarea').val('');
}

clearPostBox();

});