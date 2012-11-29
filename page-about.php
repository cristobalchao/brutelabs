<?php
/*
Template Name: About page template
*/
?>
<?php
/**
 */
get_header(); ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/style-about.css" />
<script src="<?php echo get_template_directory_uri(); ?>/js/about.js" type="text/javascript"></script>

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