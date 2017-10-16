<?php
/*
Plugin Name: Cleaner Post Lock
Plugin URI: https://www.vanpattenmedia.com/
Description: Move WordPress' post lock out of the way
Author: Van Patten Media
Version: 1.0.0
Author URI: https://www.vanpattenmedia.com/
*/

class VPM_Cleaner_Post_Lock {
	function __construct() {
		add_action( 'admin_init', array( $this, 'enqueue_style' ) );
	}

	public function enqueue_style() {
		$user   = wp_get_current_user();
		$screen = get_current_screen();
		$status = array_key_exists( 'administrator', $user->caps );

		/**
		 * Boolean that lets you determine whether or not to restyle the post-lock dialog
		 *
		 * @since 1.0.0
		 */
		$enqueue_style_status = apply_filters( 'vpm_should_clean_post_lock', $status, $user, $screen );

		if ( $enqueue_style_status ) {
			add_action( 'admin_print_footer_scripts', array( $this, 'post_lock_dialog_style' ) );
		}
	}

	public function post_lock_dialog_style() {
		echo '<style type="text/css">
		@media ( min-width: 500px ) {
			#post-lock-dialog > .notification-dialog-background {
				display: none;
			}

			#post-lock-dialog > .notification-dialog {
				top: auto;
				right: 1em;
				bottom: 1em;
				left: auto;
				opacity: 0.75;
			}

			#post-lock-dialog > .notification-dialog:hover {
				opacity: 1;
			}
		}
		</style>';
	}
}

new VPM_Cleaner_Post_Lock;
