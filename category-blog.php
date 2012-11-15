
<?php
/**
 */
get_header(); ?>
<style>
.blog_entries{
	width:625px;
	float:left;
}

.bordered_box:before {
	background-color: #000000;
    content: "";
    display: block;
    height: 0.5em;
    width: 100%;
    z-index: 5;
}

.bordered_box {
    background-color: #FFFFFF;
    border-bottom: 1px solid #D8D8D8;
    border-left: 1px solid #D8D8D8;
    border-right: 1px solid #D8D8D8;
}

.box_title {
    color: #000000;
    font-family: "DIN-Regular";
    font-weight: bold;
    height: 1em;
    margin: 4px;
    text-transform: uppercase;
    font-size: 1em;
    display:block !important;
}

.blog_entries > .box_title {
	margin: 8px;
	padding-left: 8px;
	height: 20px;
}

.blog_entry {
    color: #909090;
    font-size: 0.8em;
    padding-bottom: 1em;
}

a {
	color: #000;
}

a:hover {
	color: #555555;
}

.blog_entry .blog_entry_header {
    border-top: 1px solid #D8D8D8;
    padding: 1.5em 1.25em 0.5em;
}

.blog_entry .blog_entry_header .blog_entry_title {
    color: #000000;
    font-size: 1.5em;
    font-weight: normal;
    text-transform: uppercase;
}

.blog_entry .blog_entry_header .blog_entry_subtitle {
    float: left;
    margin-top: 0.5em;
}

.blog_entry .blog_entry_content {
    font-size: 1em;
    line-height: 1.5em;
    margin-top: 1.5em;
    padding: 1em 1.25em 0.5em;
}

.blog_entry_categories {
    margin-top: 1em;
    padding-left: 1.5em;
    text-transform: uppercase;
}

.right-col {
    float: right;
    margin-left: 0;
    width: 20em;
}

.bordered_box{
	margin-bottom: 10px;
}

.blog_entry img{
	display:block;
	margin:15px auto;
	text-align:center;
	cursor:pointer; 
	cursor:hand;
	max-width: 580px;
	max-height: 500px;
}

.wp-caption {
	width: 100% !important;
}

.wp-caption .wp-caption-text{
	text-align:center;
	font-style: italic;
}

#archive {
	width: 318px;
}

.archive_box{padding: 0 0 10px 0; width: 100% }
.archive_box ul {margin: 0;}
.archive_box li {margin: 0; padding: 0;}
.archive_box li.archive-year{float: left; padding: 5px 0 3px 10px; }
.archive_box li.archive-year a{color:#555555; margin: 0; border: 0px; padding: 0;}
.archive_box li a{ border-left: 1px solid #d6d7d7; padding: 5px 0 3px 10px; margin: 0 0 0 55px; display: block;color:#909090;}
.archive_box li a:hover, .archive_box li a.active {
	color :#000;
}


</style>
<script>
	$(document).ready(function(){

		$('.blog_entry_categories a').live('click',function(){
			alert('Coming very soon...');
			return false;
		});

		$('.archive-month a.active').live('click', function() {
			return false;
		});


		$('.archive-month a[href="'+ window.location.href +'"]').addClass('active');
		$('.archive-year a[href*="'+ window.location.pathname.split('/')[1] +'"]').addClass('active');
		$('#menu-blog').addClass('active');
		
		var halfWay = ($(document).height()/2);
		var offset = 2;
		var inAction = false;
		var archive_top = $('#archive').position().top - 10;
		var stp = false;
		var pathname = window.location.pathname;
		var year="", month="";
		(!!window.location.search)?(
			year = pathname.split("/")[1],
			month = pathname.split("/")[2]
		):null;

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
						'year' : year
					},
					success:function(data){
						if (data != '') {
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
	});


</script>
<div class="blog_entries bordered_box">
	<div class="box_title">
		blog
	</div>
	<div class="feed_entries">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php echo get_post_format(); ?>
			<?php get_template_part( 'container-blogs', get_post_format() ); ?>
		<?php endwhile; ?>
	</div>
</div>
<div class="right-col">
	<div class="bordered_box" id="updates">
		<div class="bordered_title_box">
			<div class="box_title col_box">
				<span>updates</span>	
			</div>
			<div id="rss_feed">
				<a target="_blank" href="http://api.twitter.com/1/statuses/user_timeline/brutelabs.rss">
					<img src="http://3.brutelabs2.appspot.com/media/image/buttons/rss.png">
				</a>
			</div>
		</div>
		<div id="updates_feeds">
			<ul id="update_feeds_list"><ul></ul>
		</div>
	</div>
	<div class="bordered_box" id="stay_connected">
		<div class="title_box">
			<div class="box_title col_box">
				<span>stay connected</span>
			</div>
		</div>
		<div id="stay_connected_list">
			<ul>
				<li>
					<a href="http://twitter.com/brutelabs">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/twitter.png">
					</a>
				</li>
				<li>
					<a href="http://www.facebook.com/brutelabs">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/facebook.png">
					</a>
				</li>
				<li>
					<a href="http://www.youtube.com/brutelabs">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/youtube.png">
					</a>
				</li>
				<li>
					<a href="http://www.flickr.com/photos/brutelabs">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/flickr.png">
					</a>
				</li>
				<li>
					<a href="http://www.brutelabs.org/blog/feed/atom.xml">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/rss.png">
					</a>
				</li>
				<li>
					<a href="mailto:content@brutelabs.org?subject=Stay Connected">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/mail.png">
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="bordered_box" id="site_links">
		<div class="bordered_title_box">
			<div class="box_title col_box">
				<span>site links</span>
			</div>
		</div>
		<div class="site_link">
			<a href="#">
				<div>
					Volunteer with BRUTE LABS
				</div>
			</a>
		</div>
		<div class="site_link">
			<a href="mailto:info@brutelabs.org">
				<div>
					Contact Brute Labs
				</div>
			</a>
		</div>
	</div>

	<div class="bordered_box" id="archive">
		<div class="bordered_title_box">
			<div class="box_title col_box">
				<span>Archive</span>
			</div>
		</div>
		<div class="archive_box">
			<ul>
			<?php
				global $wpdb;
				$limit = 0;
				$year_prev = null;
				$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,	YEAR( post_date ) AS year, COUNT( id ) FROM $wpdb->posts WHERE ID IN (SELECT object_id FROM wp_term_relationships WHERE TERM_TAXONOMY_ID = 5) AND post_status = 'publish' GROUP BY month , year ORDER BY post_date DESC");
				foreach($months as $month) : $year_current = $month->year;

				if ($year_current != $year_prev){
					if ($year_prev != null){?>

					<?php } ?>

					<li class="archive-year"><a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/?cat=5"><?php echo $month->year; ?></a></li>

					<?php } ?>
				<li class="archive-month"><a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>/?cat=5"><span class="archive-month"><?php echo date("F", mktime(0, 0, 0, $month->month, 1, $month->year)); ?></span></a></li>
				<?php $year_prev = $year_current;

				endforeach; ?>
				</ul>
		</div>
	</div>
	</div>
<?php get_footer(); ?>
</div><!-- #wrapper -->

</div>