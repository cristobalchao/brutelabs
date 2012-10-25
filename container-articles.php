<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" class="element" data-filter="<?php the_field('tags'); ?>">
	<div class="box_title">
		<div class="title_text"><?php the_field('large_title'); ?></div>
		<div class="collapse_button">
			<img src="http://3.brutelabs2.appspot.com/media/image/buttons/x.png">
		</div>
	</div>
	<div id="banner_1" class="banner">
		<div>
			<div class="banner_text">
				<span class="banner_prefix"></span>
				<span class="banner_text_after_prefix"><?php the_field('large_banner'); ?></span>
			</div>
		</div>
		<div style="clear:both; width: 100%; height: 15px;"></div>
	</div>
	<div class="elem-image">
		<?  $small_image = get_field('small_image');
		$large_image = get_field('large_image'); ?>
		<img class="small-image" src="<?php echo $small_image['url']; ?>">
		<img class="large-image" src="<?php echo $large_image['url']; ?>">
	</div>
	<div class="elem-descr">
		<div class="elem-title"><?php the_field('small_title'); ?></div>
		<div class="elem-content"><?php the_field('content'); ?></div>
	</div>
	<div class="action">
		<div class="action-title"><?php the_field('action_title'); ?></div>
		<div class="action-subtitle"><?php the_field('action_subtitle'); ?></div>				
		<div class="action-expand"></div>			
	</div>
	<div class="efooter">
		<div class="eupdated">
			<div class="efoot-title">Last Updated:</div>
			<div class="efoot-content"><?php the_modified_time('m/j/Y'); ?></div>
		</div>
		<div class="etags">
			<div class="efoot-title">Tags:</div>
			<div class="efoot-content"><?php the_field('tags'); ?></div>
		</div>
		<div class="more_button">
			<a href="#">
				<img src="http://3.brutelabs2.appspot.com/media/image/buttons/more_+.gif">
			</a>
		</div>
	</div>
</article>