<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

?>

<div class="blog_entry" date="<?php the_time('Y/m'); ?>" id="<? echo get_the_ID(); ?>">
	<div class="blog_entry_header">
		<div class="blog_entry_title">
			<a href="#"><?php the_title(); ?></a>
		</div>
		<div class="blog_entry_subtitle">
			<?php the_time('l, F j, Y'); ?> / posted by <a href="#"><?php the_author(); ?></a> / <a class="comments" href="#"><?php comments_number( '0 Comments', '1 Comments', '% Comments' ); ?></a>
		</div>
	</div>
	<div class="blog_entry_content">
		 <?php the_content(); ?> 
		<!--<div class="posted-by">
			Posted by <?php the_author(); ?>
		</div>-->
	</div>
	<div class="blog_entry_categories">FILED IN:  <a href="#"><?php the_tags('<a>','</a>, '); ?></a></div>
	<div class="blog_entry_footer">
		<div class="blog_entry_subtitle">
			<?php the_time('l, F j, Y'); ?> / posted by <a href="#"><?php the_author(); ?></a> / <a class="comments" href="#"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a>
		</div>
	</div>
	<div class="blog_comments">
		<div class="post-comment">
			<?php 
				$args = array(
					'post_id' => get_the_ID()
				);

				$comments = get_comments($args);

			 	foreach($comments as $comment){ ?>
				<div class="comment">
					<div class="comment-header">
						<a href="mailto:<?  echo $comment->comment_author_email ?>"><span class="comment-author"><? echo $comment->comment_author;  ?></span></a> says : <span class="comment-date"><? echo get_comment_date( 'l F j, Y h:iA', $comment->comment_ID );?></span>
					</div>
					<div class="content-comment"><? echo $comment->comment_content ?></div>
				</div>
			<?php } ?>

			<span class="post-title">Post a Comment</span>
			
			<div class="box-post">
				<input type="text" placeholder="Name" class="post-name">
				<input type="email" placeholder="E-Mail" class="post-email" size="40">
				<br>
				<textarea placeholder="Content" cols="83" rows="10"></textarea>
				<br>
				<input type="submit" value="Publish" class="publish-button">
			</div>
		</div>
	</div>
</div>