<?php
/*
Template Name: About page template
*/
?>
<?php
/**
 */
get_header(); ?>
<style>
.blog_entries{
	width:625px;
	float:left;
}

.bordered_box:before {
	background-color: #000000;
    content: "";
    display: block;
    height: 0.5em;
    width: 100%;
    z-index: 5;
}

.bordered_box {
    background-color: #FFFFFF;
    border-bottom: 1px solid #D8D8D8;
    border-left: 1px solid #D8D8D8;
    border-right: 1px solid #D8D8D8;
}

.box_title {
    color: #000000;
    font-family: "DIN-Regular";
    font-weight: bold;
    height: 1em;
    margin: 4px;
    text-transform: uppercase;
    font-size: 1em;
    display:block !important;
}

.blog_entries > .box_title {
	margin: 8px;
	padding-left: 8px;
}

.blog_entry {
    color: #909090;
    font-size: 0.8em;
    padding-bottom: 1em;
}

a {
	color: #000;
}

a:hover {
	color: #555555;
}

.blog_entry .blog_entry_header {
    border-top: 1px solid #D8D8D8;
    padding: 1.5em 1.25em 0.5em;
}

.blog_entry .blog_entry_header .blog_entry_title {
    color: #000000;
    font-size: 1.5em;
    font-weight: normal;
    text-transform: uppercase;
}

.blog_entry .blog_entry_header .blog_entry_subtitle {
    float: left;
    margin-top: 0.5em;
}

.blog_entry .blog_entry_content {
    font-size: 1em;
    line-height: 1.5em;
    margin-top: 1.5em;
    padding: 1em 1.25em 0.5em;
}

.blog_entry_categories {
    margin-top: 1em;
    padding-left: 1.5em;
    text-transform: uppercase;
}

.right-col {
    float: right;
    margin-left: 0;
    width: 20em;
}

.bordered_box{
	margin-bottom: 10px;
}

.blog_entry img{
	display:block;
	margin:15px auto;
	text-align:center;
	cursor:pointer; 
	cursor:hand;
	width: 478px;
	height: 268px;
}

.wp-caption {
	width: 100% !important;
}

.wp-caption .wp-caption-text{
	text-align:center;
	font-style: italic;
}

</style>
<script>
	$(document).ready(function(){
		$('#menu-blog').addClass('active');

	});
</script>
<div class="blog_entries bordered_box">
	<div class="box_title">
		blog
	</div>
	<div class="feed_entries">
		<?php query_posts('category_name=Blog'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php echo get_post_format(); ?>
			<?php get_template_part( 'container-blogs', get_post_format() ); ?>
		<?php endwhile; ?>

		<!-- ENTRIES 
		<div class="blog_entry">
			<div class="blog_entry_header">
				<div class="blog_entry_title">
					<a href="http://blog.brutelabs.org/2011/10/what-is-social-design.html">What is Social Design?</a>
				</div>
				<div class="blog_entry_subtitle">
					Tuesday, October 04, 2011 / posted by <a href="">BRUTE LABS</a> / <a href="http://blog.brutelabs.org/2011/10/what-is-social-design.html#comment-form">0 Comments</a>
				</div>
			</div>
			<div class="blog_entry_content">
				I graduated this past May from the Maryland Institute College of Art with a degree in Graphic Design. Before I left MICA I was awarded the honor of "Excellence in Social Design." For many graphic designers, "Social Design" is a term that is used quite often without ever specifically being defined. We all know what we mean when we say "Social Designer," right? As I stood in MICA's design department auditorium &ndash; receiving the kind words of my professors, a flower necklace, and a copy of Cradle to Cradle &ndash; I couldn't help but wonder, "what exactly does it mean and what are its implications?"<br><br>Before my senior year at MICA, I had the opportunity to work for John Bielenberg in Greensboro, Alabama. There, I co-directed the M Lab with my partner, Megan Deal. M Lab was the permanent manifestation of Project M, an annual month long workshop in which designers and other creatives apply their talents to "saving the world." Our job &ndash; which was never actually perfectly clear &ndash; involved being a youthful creative resource in a small rural town. I was optimistic, but struggled to imagine how graphic design could help.<br><br>After my first few months, I was approached by Tom Callos of the Ultimate Black Belt Test. He explained the UBBT; an annual group of karate black belt volunteers traveling to Greensboro to build a home for a resident in need. He then asked me to help them raise donations and awareness for their 2011 build. Finally, after months of trying to think of a "project" that could help Greensboro, reality had struck &ndash; people were already doing amazing things for the town and they needed graphic design. The website I built for Tom eventually raised over $16,000, and while obviously my website wasn't the sole reason for those donations, it felt good to know that I had helped.<br><br>In December, my sixth month living, working, and cycling in Greensboro, a young man asked me and my friend, Dan Gavin, where we got our bikes. The idea for BikeLab suddenly hit me. Hale County &ndash; of which Greensboro is the county seat &ndash; is one of the poorest in the nation and many of its citizens lack access to transportation. Hale County also happens to have very little car traffic, is relatively flat, and spread out just enough to make walking impractical; basically, it is perfect for bicycling. With the advice of several other bicycle co-ops and Dan's maintenance skills, we founded BikeLab as a non-profit under Hero Housing (a local housing resource center) to begin to address this issue. Within the next six months we had helped three local youths build their own bikes out of donated parts &ndash; admittedly a small impact, but a measurable one.<br><br>After M Lab, I re-enrolled at MICA to finish my senior year. REBU!LD, my thesis, began after a walk through West Baltimore. Surrounded on either side by abandoned rowhomes, I found myself on what seemed to be an entirely empty block. However, as I continued, I noticed a child on the opposite side of the street stop in front of one of the homes. I suddenly realized that he lived there, on a block that was otherwise completely vacant and crumbling. Soon after, I learned of "New East Baltimore," and came to find that the 88-acre redevelopment was not too different from the block I had visited in the west. However here, the causes for displacement were much more obvious. For four months, I documented the redevelopment, through audio interviews &ndash; with residents (current and former), development employees, and local activists &ndash; and photography.<br><br>Not that I thought it could directly help the boy or one in his position, REBU!LD took the form of a website and an installation. For the website, I compiled both my audio and photographs to create a narrative to tell the story of the redevelopment. For the installation, which took place within the development footprint, I wheatpasted large-format photographs onto the boarded façades of an entirely vacant block. The installation and subsequent opening was meant to celebrate the remaining community, invite people to see the footprint for themselves, and provide a poignant contrast to the crumbling buildings my photographs appeared on.<br><br>As far as I understand it, any one of these projects could be considered "social design"; they typify criteria like working with ethical clientele and design entrepreneurship. However, I can't help but wonder why such a distinction is necessary, why shouldn't these criteria be implicit in every graphic designer's practice? This is not to say that graphic design is devoid of such projects or that they are completely unique. I can happily say that work like this is becoming more and more common. The website I completed for the UBBT is an example of working with an ethical organization and was a chance to utilize my skill set to complement and augment their good work. Designers like Silas Munro, the design director at the non-profit Housing Works, exemplify this idea by working in a sector where graphic design can rarely be afforded. The founding of BikeLab and REBU!LD represent examples of design entrepreneurship; first-hand experience, research, and most importantly, multi-disciplinary collaboration made their success possible. BikeLab could easily have been a Brute Labs project, where ideas are founded on extensive research into social ills and then funded by generous donors (grants and awards). REBU!LD, though it may be harder to classify under this criterion, is not unlike the work of The Center for Urban Pedagogy where graphic design, utilizing research and collaboration, decodes our urban environment and solicits participation.<br><br>By labeling these kinds of efforts as part of an emerging field called "social design", one that increasingly requires a Master's degree, do we risk deterring "non-social designers" from pursuing similar efforts? By lumping the diverse approaches by graphic designers, architects, artists, computer developers etc… towards social good into a single "job" are we fostering an oxymoronic profession; a specialized jack-of-all-trades? Furthermore, in a world where the "triple bottom line" is rightly gaining momentum and the "greater good" is recognized as the common good, could "social design" be an oversimplification for young creatives working towards a future that requires collaboration and optimism?<br><br><a href="http://3.bp.blogspot.com/-Bd5Nkd6WB2E/Tou_Kx6SOcI/AAAAAAAAAEo/G1206eoMcLI/s1600/rlecluyse_ubbt.jpg" onblur="try {parent.deselectBloggerImageGracefully();} catch(e) {}"><img border="0" id="BLOGGER_PHOTO_ID_5659827548638558658" alt="" src="http://3.bp.blogspot.com/-Bd5Nkd6WB2E/Tou_Kx6SOcI/AAAAAAAAAEo/G1206eoMcLI/s320/rlecluyse_ubbt.jpg" style="display:block; margin:0px auto 10px; text-align:center;cursor:pointer; cursor:hand;width: 478px;"></a><br><a href="http://3.bp.blogspot.com/-rfFtVRsjan0/Tou_KmszGuI/AAAAAAAAAEg/xM0q1lqDgNM/s1600/rlecluyse_rb.jpg" onblur="try {parent.deselectBloggerImageGracefully();} catch(e) {}"><img border="0" id="BLOGGER_PHOTO_ID_5659827545629203170" alt="" src="http://3.bp.blogspot.com/-rfFtVRsjan0/Tou_KmszGuI/AAAAAAAAAEg/xM0q1lqDgNM/s320/rlecluyse_rb.jpg" style="display:block; margin:0px auto 10px; text-align:center;cursor:pointer; cursor:hand;width: 478px;"></a><br><a href="http://3.bp.blogspot.com/-dngY9suQrd8/Tou_KofjyLI/AAAAAAAAAEY/6_UdwZ5nbR8/s1600/rlecluyse_in_2.jpg" onblur="try {parent.deselectBloggerImageGracefully();} catch(e) {}"><img border="0" id="BLOGGER_PHOTO_ID_5659827546110544050" alt="" src="http://3.bp.blogspot.com/-dngY9suQrd8/Tou_KofjyLI/AAAAAAAAAEY/6_UdwZ5nbR8/s320/rlecluyse_in_2.jpg" style="display:block; margin:0px auto 10px; text-align:center;cursor:pointer; cursor:hand;width: 478px;"></a><br><a href="http://3.bp.blogspot.com/-M74EcjcPONk/Tou_KUaAwcI/AAAAAAAAAEQ/sd8i_XcCesc/s1600/rlecluyse_in_1.jpg" onblur="try {parent.deselectBloggerImageGracefully();} catch(e) {}"><img border="0" id="BLOGGER_PHOTO_ID_5659827540718567874" alt="" src="http://3.bp.blogspot.com/-M74EcjcPONk/Tou_KUaAwcI/AAAAAAAAAEQ/sd8i_XcCesc/s320/rlecluyse_in_1.jpg" style="display:block; margin:0px auto 10px; text-align:center;cursor:pointer; cursor:hand;width: 478px;"></a><br><br>
				<div class="posted-by">
					Posted by Ryan LeCluyse, BRUTE Contributor
				</div>
				<div class="blogger-post-footer">
					<img width="1" height="1" alt="" src="https://blogger.googleusercontent.com/tracker/8361741419744270858-663287256077399965?l=blog.brutelabs.org">
				</div>
			</div>
			<div class="blog_entry_categories">FILED IN:  <a href="/blog?category=Haiti School Project">Haiti School Project</a></div>
		</div>
		<!-- END ENTRIES -->
	</div>
	<div class="navigation"><p><?php posts_nav_link(); ?></p></div>
</div>
<div class="right-col">
	<div class="bordered_box" id="updates">
		<div class="bordered_title_box">
			<div class="box_title col_box">
				<span>updates</span>	
			</div>
			<div id="rss_feed">
				<a target="_blank" href="http://twitter.com/statuses/user_timeline/21542173.rss">
					<img src="http://3.brutelabs2.appspot.com/media/image/buttons/rss.png">
				</a>
			</div>
		</div>
		<div id="updates_feeds">
			<ul id="update_feeds_list"><ul><li><li class="update_entry"><div class="update_text">Which nations consume the most water? <a href="http://t.co/ZY2u59l6" target="_blank">http://t.co/ZY2u59l6</a></div><div class="update_time">about 8 hours ago</div></li></li><li><li class="update_entry"><div class="update_text">Poor penmanship on that envelope? No problem! <a href="http://t.co/Vw9NN3je" target="_blank">http://t.co/Vw9NN3je</a></div><div class="update_time">11:41 AM Sep 25th</div></li></li><li><li class="update_entry"><div class="update_text">Decorated Japanese manhole covers: <a href="http://t.co/D0JCu2Qa" target="_blank">http://t.co/D0JCu2Qa</a></div><div class="update_time">5:26 PM Sep 24th</div></li></li><li><li class="update_entry"><div class="update_text">The Rules of Flying: <a href="http://t.co/pnV6f8Vz" target="_blank">http://t.co/pnV6f8Vz</a></div><div class="update_time">11:37 AM Sep 24th</div></li></li><li><li class="update_entry"><div class="update_text">Millions of people still use dial-up? <a href="http://t.co/CBa7A0lq" target="_blank">http://t.co/CBa7A0lq</a></div><div class="update_time">11:41 AM Sep 21st</div></li></li></ul></ul>
		</div>
	</div>
	<div class="bordered_box" id="stay_connected">
		<div class="title_box">
			<div class="box_title col_box">
				<span>stay connected</span>
			</div>
		</div>
		<div id="stay_connected_list">
			<ul>
				<li>
					<a href="http://twitter.com/brutelabs">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/twitter.png">
					</a>
				</li>
				<li>
					<a href="http://www.facebook.com/brutelabs">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/facebook.png">
					</a>
				</li>
				<li>
					<a href="http://www.youtube.com/brutelabs">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/youtube.png">
					</a>
				</li>
				<li>
					<a href="http://www.flickr.com/photos/brutelabs">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/flickr.png">
					</a>
				</li>
				<li>
					<a href="http://www.brutelabs.org/blog/feed/atom.xml">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/rss.png">
					</a>
				</li>
				<li>
					<a href="mailto:content@brutelabs.org?subject=Stay Connected">
						<img src="http://3.brutelabs2.appspot.com/media/image/buttons/mail.png">
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="bordered_box" id="site_links">
		<div class="bordered_title_box">
			<div class="box_title col_box">
				<span>site links</span>
			</div>
		</div>
		<div class="site_link">
			<a href="#">
				<div>
					Volunteer with BRUTE LABS
				</div>
			</a>
		</div>
		<div class="site_link">
			<a href="mailto:info@brutelabs.org">
				<div>
					Contact Brute Labs
				</div>
			</a>
		</div>
	</div>

</div>
<?php get_footer(); ?>
</div><!-- #wrapper -->