<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<?php
	$tags = get_the_tags();
	$tag_name = "";

	foreach ($tags as $tag) {
		
		($tag_name=="")?$tag_name = $tag->name:$tag_name .= ', '.$tag->name;
	} 
 ?>

<article id="post-<?php the_ID(); ?>" class="element" data-filter="<?php echo $tag_name;?>">
	<div class="box_title">
		<div class="title_text"><?php echo get_the_title(); ?></div>
		<div class="collapse_button">
			<img src="http://3.brutelabs2.appspot.com/media/image/buttons/x.png">
		</div>
	</div>
	<div class="banner">
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
		<div class="small-image" style="background-image:url('<?php echo $small_image['url']; ?>')"></div>
		<div class="large-image" style="background-image:url('<?php echo $large_image['url']; ?>')"></div>
	</div>
	<div class="elem-descr">
		<div class="elem-title"><?php echo get_the_title(); ?></div>
		<div class="elem-content"><?php the_content(); ?></div>
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
			<div class="efoot-content"><?php echo $tag_name;?></div>
		</div>
		<div class="more_button">
			<a href="#">
				<img src="http://3.brutelabs2.appspot.com/media/image/buttons/more_+.gif">
			</a>
		</div>
	</div>
</article>