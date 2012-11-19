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

<div id="entry" class="base_elem">
	<div class="left-col">
		<ul>
			<li class="featured_project">
				<div class="mark_project_image">
					<a class="go_spot" href="#">
						<div class="featured_project_image"> </div>
					</a>
				</div>
				<div class="featured_project_description">
					<span class="feature_project_name"></span>
					<span class="feature_project_text"></span>
				</div>
			</li>
		</a>
	</ul>
</div>
<div class="right-col">
	<div class="bordered_box" id="updates">
		<div class="bordered_title_box">
			<div class="box_title col_box">
				<span>updates</span>
			</div>
		</div>
		<div id="updates_feeds">
			<ul id="update_feeds_list"></ul>
		</div>
	</div>
</div>

<div id="brute_banner">
	<div id="banner" class="banner"><div><a class="go_spot" href="#"><div class="banner_text"><span class="banner_prefix">BRUTE LABS IS</span><span class="banner_text_after_prefix"> Well done in Ghana</span></div></a></div><div style="clear:both; width: 100%; height: 10px;"></div></div>		
</div>
</div>
<div class="right-col bot-col base_elem">
	<div id="dynamic_col">
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
			</div>  
		</div>
		<div class="donate">
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
					<img src="http://3.brutelabs2.appspot.com/media/image/buttons/donate_+.gif" style="opacity:1">
				</div>
			</div>
			<div id="donate-more">
				<div class="content">
					<p> 
						BRUTE LABS is a 100% volunteer-run organization. Your donation goes directly to our projects addressing hunger, homelessness, clean water, education, poverty, health, and gender equality, to name a few. <a href="<?php echo get_site_url(); ?>/category/projects">Browse our projects </a>to learn more about what we're working on today. 
					</p>
					<div class="clear"></div>
					<form method="post" id="donate_form" action="https://checkout.google.com/api/checkout/v2/checkoutForm/Merchant/167836822673973"> 
						<input name="item_name_1" type="hidden" value="Donation to BRUTE LABS"/>
						<input name="item_description_1" type="hidden" value="Thank you for your tax-deductible donation to BRUTE LABS."/>
						<input name="item_quantity_1" type="hidden" value="1"/>
						<input name="item_currency_1" type="hidden" value="USD"/>
						<input name="analyticsdata" type="hidden" value="">
						<div id="checkout_form">
							<div class="prices">
								<input type="radio" name="item_price_1" id="item_price_1" value="10.00">
								<label for="item_price_1"><span></span>10$</label></br>
								<input type="radio" name="item_price_1" id="item_price_2" value="20.00">
								<label for="item_price_2"><span></span>20$</label></br>
								<input type="radio" name="item_price_1" id="item_price_3" value="50.00">
								<label for="item_price_3"><span></span>50$</label></br>
								<input type="radio" name="item_price_1" id="item_price_4" value="100.00">
								<label for="item_price_4"><span></span>100$</label></br>
								<input type="radio" name="item_price_1" id="item_price_5" value="200.00">
								<label for="item_price_5"><span></span>200$</label></br>
								<input type="radio" name="item_price_1" id="item_price_other" value="">
								<label for="item_price_other"><span></span>Other: $</label> <input class="custom_value" type="text" style="width:60px;"/>
							</div>
							<div id="checkout_button">
								<input type="image" src="https://checkout.google.com/buttons/donateNow.gif?merchant_id=167836822673973&amp;w=115&amp;h=50&amp;style=trans&amp;variant=text&amp;loc=en_US" alt="Donate">
							</div>
						</div>
					</form>
					<div class="clear"></div>
					<p>
						BRUTE LABS is a 501(c)(3) tax-exempt organization. All donations are tax-deductible with secure processing provided by Google Checkout. Do you have a question about donating? <a target="_blank" href="mailto:info@brutelabs.org?subject=Brute Labs Content">Contact us.</a> 
					</p>
				</div>
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
					<a href="http://welldone.org" target="_blank">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/more_+.gif" style="height:30px;margin-right:10px">
					</a>
				</div>
				<p class="title"> Water is Life Tshirt $18.00 </p>
				<p> Support Well Done.</p>
			</div>
		</div>
	</div>
</div>

<?php get_template_part( 'content', get_post_format() ); ?>

<?php get_footer(); ?>
</div><!-- #wrapper -->