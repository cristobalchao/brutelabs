<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>BRUTE LABS - Design and Technology Non-Profit Addressing Global Challenges</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="image_src" href="http://www.brutelabs.org/img/donate_like_follow.jpg"/>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<?php include_once("analyticstracking.php") ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/kaotope.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/twitter.js" type="text/javascript"></script>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed">
	<div id="wrapper">
		<header>
			<a id="menu-main" href="<?php echo get_site_url(); ?>"><div id="brute_logo_box"></div></a>
			<nav id="menu">	
				<ul>
					<li style="width:10px"></li>
					<li>
						<a href="<?php echo get_site_url(); ?>/category/projects" class="title" id="menu-projects">PROJECTS</a>
					</li>
					<li>
						<nav>
							<a href="<?php echo get_site_url(); ?>/category/blog" class="title" id="menu-blog">BLOG</a>
							<a class="smenu-link" href="#">BLOG 1</a>
							<a class="smenu-link" href="#">BLOG 2</a>
						</nav>
					</li>
					<li>
						<a href="<?php echo get_site_url(); ?>/about" class="title" id="menu-about">ABOUT</a>
					</li>
				</ul>
			</nav>
		</header>