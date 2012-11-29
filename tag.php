
<?php
/**
 */
get_header(); ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/style-blog.css" />
<script src="<?php echo get_template_directory_uri(); ?>/js/blog.js" type="text/javascript"></script>

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

					<li class="archive-year"><a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/?cat=5" date="<?php echo $month->year; ?>"><?php echo $month->year; ?></a></li>

					<?php } ?>
				<li class="archive-month"><a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>/?cat=5" date="<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>"><span class="archive-month"><?php echo date("F", mktime(0, 0, 0, $month->month, 1, $month->year)); ?></span></a></li>
				<?php $year_prev = $year_current;

				endforeach; ?>
				</ul>
		</div>
	</div>
	</div>
<?php get_footer(); ?>
</div><!-- #wrapper -->

</div>