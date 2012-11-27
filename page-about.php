<?php
/*
Template Name: About page template
*/
?>
<?php
/**
 */
get_header(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/about.js" type="text/javascript"></script>
<style>
#animenu{
	font-family: "DIN-Regular",helvetica,arial,sans-serif;
}

#submenu{
	height: 53px;
}

#submenu .smelem{
	height: 25px;
	padding:10px;
	position: relative;
}

.sbmstitle{
	float: left;
	margin: 0 30px;
	vertical-align: bottom;
	width: 15px;
}

.sbmstitle:hover{
	cursor: pointer;
}

.sbmstitle:hover:after{
	border-bottom: 10px solid #F1F1F1;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
	content: "";
	position: absolute;
	bottom: -1px;
	z-index: 9999;
}

nav#submenu .sbmstitle.active:after {
	border-bottom: 10px solid #F1F1F1;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
	content: "";
	position: absolute;
	bottom: -1px;
	z-index: 9999;
}

.arrow-down-border {
	border-bottom: 11px solid #D8D8D8;
    border-left: 11px solid transparent;
    border-right: 11px solid transparent;
    bottom: 0;
    height: 0;
    position: absolute;
    width: 0;
    opacity: 0;
}

#ab-vision .sbmstitle:hover:after, #ab-vision .sbmstitle.active:after {
	left: 55px;
}

#ab-people .sbmstitle:hover:after, #ab-people .sbmstitle.active:after {
	left: 135px;
}

#ab-vision .arrow-down-border {
	left: 54px;
}

#ab-people .arrow-down-border {
	left: 134px;
}

.banner{
	display: block;
	position: relative;
	left: 9px;
	font-family: 'DIN-Light', serif;
}

#main-people{
	display:none;
}

#main-vision	{
	height: 100%;
	width: 100%;
	display: block;
}

.box{
	background: none repeat scroll 0 0 #FFFFFF;
	border: 1px solid #D8D8D8;
	font-size: 0.8em;
	padding: 1em;
}

#vision_statement {
	margin-top: 0.5em;
	padding: 1em;
	color: #909090;
	font-family: helvetica,arial,sans-serif !important;
	font-weight: lighter;
	line-height: 1.5em;
}

#vision_statement #title {
	color: #000000;
	font-weight: bolder;
}

#vision_statement a {
	color: #00B5E5;
	text-decoration: underline;
}

.principle {
	margin: 1em 0;
	padding: 1.5em;
	color: #909090;
	font-family: 'DIN-Light';
}

.principle .title {
	color: #000000;
	font-size: 2em;
	font-weight: lighter;
	text-transform: uppercase;
}

.principle.active .title  {
	opacity: 1;
}

.principle:hover .title {
	opacity: 1;
}

.principle .title .number {
	font-weight: bold;
	margin-right: 0.5em;
}

.principle .content {
	margin-left: 29px;
	margin-top: 1em;
}

.banner_text .people_link {
	color:#FFF;
}

.banner_text .people_link:hover {
	color:#00ADEF;
}

.banner {
	display: block;
}

.info-people {
	display:none;
	width: 100%;
	font-family: helvetica,arial,sans-serif;
	font-weight: lighter;
	color : #909090;
}

.info-people .bio_section{
	background: none repeat scroll 0 0 #FFFFFF;
	border: 1px solid #D8D8D8;
	padding: 0.5em;
	width : 625px;
	float: left;
	position: absolute;
}

.bio_picture {
	height:305px;
}

.bio_picture img {
	display: none;
}


.bio_picture .bio_image {
	background-repeat: no-repeat;
	background-size: cover;
	width: 100%;
	height: 100%;
}

.loading {
	background-image: url("http://dynatree.googlecode.com/svn-history/r433/trunk/src/skin-xp/loading.gif");
	position: absolute;
	background-repeat: no-repeat;
	float: right;
	height: 15px;
	width: 15px;
	top: 15px;
	right: 15px;
	display:none;
}

.bio_text {
	padding: 1em 0.25em;
}

.bio_text .title {
	color: #000000;
	margin-bottom: 0.5em;
	text-transform: capitalize;
	font-weight: bold;
}

.bio_text .content {
	font-size: 0.8em;
	line-height: 1.25em;
}

.info-people .banner {
	height: 80px;
}

.info-people .banner-absolute {
	position: absolute;
	width: 100%;
}

.info-people .banner_text {
	position: relative !important;
}

.info-people .bio_sidebar {
	margin-left: 0.75em;
	position:relative;
	float:right;
	width:305px;
}

.bordered_box{
	margin-bottom: 10px;
}

.bordered_box:before {
	background-color: #000000;
	content: "";

	height: 0.5em;
	width: 100%;
	z-index: 5;
}

.personal_info .bordered_box {
	position: absolute;
	width:100%;
}

.subsection_box {
	border-top: 1px solid;
	font-size: 0.8em;
	padding: 1em;
}

.personal_info {
	position: relative;
	height: 280px;
	width: 100%;
}


.subsection_box .title {
	color: #000000;
	margin-bottom: 0.5em;
	text-transform: capitalize;
	font-weight: bold;
}

.subsection_box .content {
	font-size: 13px;
	line-height: 15px;
}

.list .link {
	margin-bottom: 0.25em;
}

.link a {
	color: #909090;
}

.link a.active {
	font-weight: bold;
}

.link a:hover {
	font-weight: bold;
}

.loading-small{
	background-image: url("http://dynatree.googlecode.com/svn-history/r433/trunk/src/skin-xp/loading.gif");
	display: none;
	background-repeat: no-repeat;
	float: right;
	height: 15px;
	width: 16px;
}

#banners {
	display :none;
}
</style>

<div id="animenu">
	<nav id="submenu">
		<div class="smelem">
			<div id="ab-vision">
				<div class="arrow-down-border"></div>
				<div class="sbmstitle active" section="vision">VISION</div>
			</div>
			<div id="ab-people">
				<div class="arrow-down-border"></div>
				<div class="sbmstitle" section="people">PEOPLE</div>
			</div>
		</div>
	</nav>
</div>
<div id="main-vision" class="about-section">
	<div id="banner" class="banner">
		<div>
			<div class="banner_text">
				<span class="banner_prefix">BRUTE LABS IS</span>
				<span class="banner_text_after_prefix">Water is life shirt</span>
			</div>
		</div>
		<div style="clear:both; width: 100%; height: .25em;">
		</div>
	</div>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
</div>
<div id="main-people"  class="about-section">
	<div class="banner">
		<div>
			<div class="banner_text">
				<span class="banner_prefix">BRUTE CORE:</span>
		<?php 

			$coreusers = get_users(array( 'role' => 'Editor', 'orderby' => 'registered' ));
			$stp = 0;
			$i=1;
			foreach ($coreusers as $usr) {
				if ($i == 3) {
					$i = 0;
					?>
					</div></div><div><div class="banner_text"><?
				}
				$i++;?>
				<a class="people_link get_people_ajax" href="/about?id=<? echo $usr->ID  ?>"><? echo $usr->user_login ?></a><? if ($usr != end($coreusers)) {?>,<?}?>
				<? } ?>
			</div></div></div>

			<div class="banner">
				<div>
					<div class="banner_text">
						<span class="banner_prefix">BRUTE CONTRIBUTORS:</span>

						<?php 
						$contrusers = get_users(array( 'role' => 'Contributor', 'orderby' => 'registered' ));

						$i=1;
						foreach ($contrusers as $usr) {
							if ($i == 3) {
								$i = 0;
								?>
								</div></div><div><div class="banner_text"><?
							}
							$i++;?>
							<a class="people_link get_people_ajax" href="/about?id=<? echo $usr->ID  ?>" class="people_link"><? echo $usr->user_login ?></a><? if ($usr != end($contrusers)) {?>,<?}?>
							<? } ?>
	</div></div></div>

	<div class="info-people">
		<div id="banner" class="banner">
			<div class="banner-absolute">
				<div class="banner_text">
					<span class="banner_prefix">BRUTE LABS IS</span>
					<span class="banner_text_after_prefix"></span>
				</div>
			</div>
			<div style="clear:both; width: 100%; height: .25em;">
			</div>
		</div>
		<div class="bio_section">
			<div class="bio_picture">
				<div class="bio_image"></div>
				<img src="" />
				<span class="loading"></span>
			</div>
			<div class="bio_text">
				<div class="title">BIO</div>
				<div class="content"></div>
			</div>
		</div>

		<div class="bio_sidebar">
			<div class="personal_info">
				<div class="bordered_box">	
					<div class="subsection_box">
						<div class="title">LOCATION<span class="loading-small"></span></div>
						<div class="content" id="bio_location"><span></span></div>
					</div>
					<div class="subsection_box">
						<div class="title">WORK<span class="loading-small"></span></div>
						<div class="content" id="bio_work"><span></span></div>
					</div>
					<div class="subsection_box">
						<div class="title">BRUTE WORK<span class="loading-small"></span></div>
						<div class="content" id="bio_brute"><span></span></div>
					</div>
					<div class="subsection_box">
						<div class="title">MORE<span class="loading-small"></span></div>
						<div class="content" id="bio_more"><span></span></div>
					</div>
				</div>
			</div>

			<div class="bordered_box team_info">
				<div class="subsection_box core">
					<div class="title">BRUTE CORE TEAM</div>
					<div class="list">
						<? 
							foreach ($coreusers as $usr) {?>
								<div class="link" id_people="<? echo $usr->ID  ?>"><a class="get_people_ajax get_person" href="/about?id=<? echo $usr->ID  ?>"><? echo $usr->user_login ?></a></div>
							<?
						}?>
					</div>
				</div>
				<div class="subsection_box contributors">
					<div class="title">BRUTE CONTRIBUTORS</div>
					<div class="list">
						<? 
							foreach ($contrusers as $usr) {?>
								<div class="link" id_people="<? echo $usr->ID  ?>"><a class="get_people_ajax get_person" href="/about?id=<? echo $usr->ID  ?>"><? echo $usr->user_login ?></a></div>
							<?
						}?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="clear:both; width: 100%; height: 10px;"></div>
</div>
<?php get_footer(); ?>
</div><!-- #wrapper -->


<?php /* Start the Loop */ ?>
<?php query_posts(array('category_name' => 'Projects', 'posts_per_page' => -1 )); ?>
<div id="banners">
<?php $cnt = 0;
	while ( have_posts() ) : the_post(); ?>
	<?php echo get_post_format(); ?>
			<div class="banner_text_hide" data-id="<? echo $cnt; $cnt++?>"><? the_field('large_banner'); ?></div>
<?php endwhile; ?>
</div>