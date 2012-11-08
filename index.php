<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */
get_header(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/index.js" type="text/javascript"></script>

<div id="entry">
	<div class="left-col">
		<ul>
			<li class="featured_project">
				<div class="featured_project_image"> </div>
				<div class="featured_project_description">
					<span class="feature_project_name"></span>
					<span class="feature_project_text"></span>
				</div>
			</li>
		</ul>
	</div>
	<div class="right-col">
		<div class="bordered_box" id="updates">
			<div class="bordered_title_box">
				<div class="box_title col_box">
					<span>updates</span>
				</div>
				<div id="rss_feed">
					<a href="http://api.twitter.com/1/statuses/user_timeline/brutelabs.rss" target="_blank">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/rss.png">
					</a>
				</div>
			</div>
			<div id="updates_feeds">
				<ul id="update_feeds_list"></ul>
			</div>
		</div>
	</div>
	<div id="brute_banner">
		<div id="banner" class="banner"><div><div class="banner_text"><span class="banner_prefix">BRUTE LABS IS</span><span class="banner_text_after_prefix"> Well done in Ghana</span></div></div><div style="clear:both; width: 100%; height: 10px;"></div></div>
	</div>
</div>
<div class="right-col bot-col">
	<div id="stay_connected" class="bordered_box">
		<div class="title_box">
			<div class="box_title col_box">
				<span>stay connected</span>
			</div>
		</div> 
		<div id="stay_connected_list">
			<ul>
				<li>
					<a href="http://twitter.com/brutelabs" target="_blank">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/twitter.png">
					</a>
				</li>
				<li>
					<a href="http://www.facebook.com/brutelabs" target="_blank">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/facebook.png">
					</a>
				</li>
				<li>
					<a href="http://www.brutelabs.org/blog/feed/atom.xml" target="_blank">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/rss.png">
					</a>
				</li>
				<li>
					<a href="#" target="_blank">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/digg.png">
					</a>
				</li>
				<li>
					<a href="mailto:content@brutelabs.org?subject=Stay Connected" target="_blank">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/mail.png">
					</a>
				</li>
			</ul>
			<div class="more_button large" style="margin-top:0">
				<a href="#" target="_blank">
					<img src="http://3.brutelabs2.appspot.com/media/image/buttons/more_+.gif" style="height:30px">
				</a>
			</div>
		</div>  
	</div>
	<div id="donate">
		<div class="title_box">
			<div class="box_title col_box">
				<span>donate</span>
			</div>
		</div>
		<div class="content">
			Make a tax-deductible donation to BRUTE LABS and help make an impact right away.
		</div>
		<div class="donate_button">
			<img src="http://3.brutelabs2.appspot.com/media/image/buttons/donate_+.gif">
		</div>
	</div>
	<div id="brute_goods" class="bordered_box">
		<div class="bordered_title_box">
			<div class="box_title col_box">
				<span>brute goods</span>
			</div>
		</div>
		<div class="content">
			<img src="http://www.brutelabs.org/img/water_is_life_1.jpg">
		</div>
		<div class="brute_descr">
			<div class="buy_button">
				<a href="#" target="_blank">
					<img src="http://3.brutelabs2.appspot.com/media/image/buttons/more_+.gif" style="height:30px">
				</a>
			</div>
			<p class="title"> Water is Life Tshirt $18.00 </p>
			<p> Support Well Done.</p>
		</div>
	</div>
</div>

<?php get_template_part( 'content', get_post_format() ); ?>

<?php get_footer(); ?>
</div><!-- #wrapper -->