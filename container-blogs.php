<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<div class="blog_entry">
	<div class="blog_entry_header">
		<div class="blog_entry_title">
			<a href="#"><?php the_title(); ?></a>
		</div>
		<div class="blog_entry_subtitle">
			<?php the_time('l, F j, Y'); ?> / posted by <a href="#"><?php the_author(); ?></a> / <a href="#"><?php comments_number( '0 Comments', '1 Comments', '% Comments' ); ?></a>
		</div>
	</div>
	<div class="blog_entry_content">
		 <?php the_content(); ?> 
		<div class="posted-by">
			Posted by <?php the_author(); ?>
		</div>
	</div>
	<div class="blog_entry_categories">FILED IN:  <a href="#"><?php the_tags('<a>','</a>, '); ?></a></div>
</div>