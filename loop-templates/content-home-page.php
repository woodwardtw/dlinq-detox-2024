<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-content contain-fluid">
		<div class="row">
			
			<div class="left-long col-md-5">
			<div class="internal-left-block yellow">
			<h2>AI EVERYWHERE?</h2>
			<p>Get past the hype and get hands on with generative AI in the 2024 DLINQ Digital Detox.</p>
			<p>
				This Detox will be a little different from previous Detoxes. Rather than writing articles on topics related to generative AI, we will be guiding YOU through activities that help you explore and understand these tools. You’ll be encouraged to try the activities, reflect on them, and share what you did with others.
			</p>
			<a href="#" class="btn btn-signup">Sign Up</a>
			</div>
		</div>
		<?php detox_homepage_posts();?>
		
	</div>
		<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
