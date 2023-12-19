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
    <h1 id="mag-title"><a href="#">DEMYSTIFYING AI</a></h1>
    <div class="sub-title">Digital Detox: 2024</div>
</div>

	<?php
} else {
	the_custom_logo();
}
