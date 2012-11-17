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
			<img src="<?php echo get_template_directory_uri(); ?>/images/minimize.png" />
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
			<a href="#/spotlight/<?php the_ID(); ?>">
				<div class="large-image" style="background-image:url('<?php echo $large_image['url']; ?>')"></div>
			</a>
			<img class="expand-proj" src="<?php echo get_template_directory_uri(); ?>/images/expand.png" />
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
		<div class="more_button" spotlight="<?php the_ID(); ?>">
			<a href="#/spotlight/<?php the_ID(); ?>">
				<img src="http://3.brutelabs2.appspot.com/media/image/buttons/more_+.gif">
			</a>
		</div>
	</div>
</article>

	<?php $args = array (
		'post_type' => 'attachment',
		'orderby' => 'date',
		'status' => 'publish',
		'posts_per_page' => '-1',
		'post_parent' => $post->ID
	); ?>
	<?php $attachments = get_posts($args);?>

	<?php 
	if ( $attachments ) {
		$spot_downloads = "";
		$spot_images = "";
		$i = 0;
		foreach ( $attachments as $attachment ) {
			if (strpos($attachment->post_mime_type, "image") !== false) {
				$upload_dir = wp_upload_dir();
				if ($i == 0) $spot_images = '<img class="active item" src="" url="'.$upload_dir['baseurl'].'/'.get_post_meta($attachment->ID, '_wp_attached_file', true).'" />';
				else $spot_images .= '<img class="item" src="" url="'.$upload_dir['baseurl'].'/'.get_post_meta($attachment->ID, '_wp_attached_file', true).'" />';
				$i++;
			} else if (strpos($attachment->post_mime_type, "pdf") !== false) {
				$spot_downloads .= '<span class="download_link">→ <a href="'.$upload_dir['baseurl'].'/'.get_post_meta($attachment->ID, '_wp_attached_file', true).'">'.$attachment->post_title.' (PDF)</a></span>';
			}
       	}
	}?>

	<div class="spotlight hide" id="spot-<?php the_ID(); ?>">
		<div class="bordered_box" id="project_header">
			<div style="padding: .75em 1em;">
				<span class="title">PROJECT: </span>
				<span id="name" class="title project_info"><?php echo get_the_title(); ?></span>
				<span class="title">Last Updated:</span>
				<span id="last_updated" class="project_info"><?php the_modified_time('m/j/Y'); ?></span>
				<span class="title">Tags:</span>
				<span id="tags" class="project_info"><?php echo $tag_name;?></span>
			</div>
			<div class="spotlight_back">
				<a class="back" href="#"><img src="http://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/48x48/br_down.png" /></a>
			</div>
		</div>
		<div class="banner" style="opacity: 1;display:block">
			<div>
				<div class="banner_text" style="margin: 0 0">
					<span class="banner_prefix"><?php echo get_the_title(); ?> IS</span>
					<span class="banner_text_after_prefix"><?php the_field('large_banner'); ?></span>
				</div>
			</div>
			<div style="clear:both; width: 100%; height: 10px;"></div>
		</div>

		<div id="project_details_body">
			<div id="details">
				<div class="box" id="downloads">
					<span class="title">DOWNLOADS</span>
					<? echo $spot_downloads ?>
				</div>				
				<div class="bordered_box" id="media">
					<div style="padding: .75em;">
						<span class="title">MEDIA</span>
						<span class="share">
							<span class="title">Share</span>
							<a target="_blank" href="http://www.facebook.com/brutelabs">
								<img src="http://3.brutelabs2.appspot.com/media/image/buttons/facebook_f_small.gif">
							</a>
							<a target="_blank" href="http://twitter.com/BRUTELABS">
								<img src="http://3.brutelabs2.appspot.com/media/image/buttons/twitter_t_small.gif">
							</a>
						</span>
						<div class="image_container">
							<div id="image_selected_<?php the_ID(); ?>" class="image_selected">
							</div>
						</div>
						<div class="image_caption">
							<span class="title">Caption</span>
							<div id="slider_<?php the_ID(); ?>" class="slider">
								<? echo $spot_images ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="right-col bot-col">				
				<div class="box" id="project_description">
					<div class="title" style="margin-bottom:5px">PROJECT DESCRIPTION</div>
					<div>
						<?php the_content(); ?>
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
						<img style="opacity:1" src="http://3.brutelabs2.appspot.com/media/image/buttons/donate_+.gif">
					</div>
				</div>
				<div id="map_container_<?php the_ID(); ?>" class="box map_container">
					<div class="title">Map</div>
					<div class="map_canvas" id="map_canvas_<?php the_ID(); ?>" address="<? the_field('address_map'); ?>"></div>
				</div>
				<!--<div id="resources">
					<div class="list_item_box_head">
						<div class="title">resources</div>
					</div>
					<div class="list_item_box">
						<div>Awesome People</div>
						<div><a href="http://www.google.com">http://www.google.com</a></div>
					</div>
					<div class="list_item_box">
						<div>Awesome People</div>
						<div><a href="http://www.google.com">http://www.google.com</a></div>
					</div>
				</div>-->
				<div id="share"></div>
			</div>
		</div>
	</div>