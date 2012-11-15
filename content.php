<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="http://www.ocharisma.com/wp-content/themes/ocharisma/js/flowslider.jquery.js"></script>
<?php if (basename( $_SERVER[REQUEST_URI]) == '/') {?>
<div id="anim" style="width:633px">
	<?}else{?>
	<div id="anim">
		<?}?>
		<nav id="submenu">
			<div class="smelem">
				<div class="sbtitle">PROJECTS</div>
				<div class="sbcontent"><nav id="filter" class="option-set clearfix" data-option-key="filter"></nav></div>
			</div>
		</nav>
	</div>

	<div  id="container">
		<?php /* Start the Loop */ ?>
		<?php query_posts('category_name=Projects&showposts=15'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php echo get_post_format(); ?>
		<?php get_template_part( 'container-articles', get_post_format() ); ?>
	<?php endwhile; ?>
</div>