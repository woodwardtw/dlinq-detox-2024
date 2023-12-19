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
		<div class="top-right col-md-7">
			<div class="internal-top-block">
			<div class="content">
				<h2>It's not magic, it's math!</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lorem dui, tempor ac est vel, iaculis lacinia ipsum. Suspendisse magna lectus, cursus eget metus sit amet, sollicitudin porta purus. Donec eleifend magna mi, a sagittis ex sodales a. Nam convallis orci sapien, ac pretium ex pretium in. Pellentesque ullamcorper dapibus felis. Donec aliquet nibh sed dolor tincidunt fringilla. Etiam sit amet consectetur purus. Sed semper, dolor eu semper ornare, urna justo euismod velit, e</p>
				<a class="btn btn-more" href="#">Explore</a>
			</div>
				<img src="http://experiments.middcreate.net/images/wp-content/uploads/sites/18/2023/12/comic.jpeg" width="400px" class="img-fluid">
			</div>
		</div>
		<div class="center">
			<div class="center-block">
			<div class="content">
			<h2>It's not friendship, it's programming</h2>
			<p>Suspendisse magna lectus, cursus eget metus sit amet, sollicitudin porta purus. Donec eleifend magna mi, a sagittis ex sodales a. Nam convallis orci sapien, ac pretium ex pretium in. Pellentesque ullamcorper dapibus felis. Donec aliquet nibh sed dolor tincidunt fringilla. Etiam sit amet consectetur purus. Sed semper, dolor eu semper </p>
			<a class="btn btn-more" href="#">Explore</a>
			</div>     
			<img src="http://experiments.middcreate.net/images/wp-content/uploads/sites/18/2023/12/robot.jpeg" class="img-fluid">
			</div>     
		</div>
		<div class="bottom-left">
			<div class="bl-block">
			<img src="http://experiments.middcreate.net/images/wp-content/uploads/sites/18/2023/12/head_profile.png" class="img-fluid">
			<div class="content">
				<h2>It's not art, it's data</h2>
				<p></p>
			</div>
			</div>
		</div>
		<div class="right-long"></div>
		<div class="footer"></div>	
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
