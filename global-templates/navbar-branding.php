<?php
/**
 * Navbar branding
 *
 * @package Understrap
 * @since 1.2.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! has_custom_logo() ) { ?>
 <div class="main-title">
    <h1 id="mag-title"><a href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo('name')?></a></h1>
    <div class="sub-title"><?php echo get_bloginfo('description')?></div>
</div>

	<?php
} else {
	the_custom_logo();
}
