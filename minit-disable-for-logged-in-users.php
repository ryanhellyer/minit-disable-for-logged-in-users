<?php
/*
Plugin Name: Minit disable for logged in users
Plugin URI: https://geek.hellyer.kiwi/plugins/
Description: Disables the Minit functionality when user is logged in and not in an admin page
Author: Ryan Hellyer
Version: 1.0
Author URI: https://geek.hellyer.kiwi/
*/


/**
 * Purge Minit cache via WP Cron job.
 */
class Minit_Disable_For_Logged_In_Users {

	/**
	 * Class constructor.
	 */
	public function __construct() {

		add_action( 'plugins_loaded', array( $this, 'disable' ), 1 );

	}

	/**
	 * Disable the Minit plugin when appropriate.
	 */
	public function disable() {

		if ( is_user_logged_in() && ! is_admin() ) {
			remove_action( 'plugins_loaded', array( 'Minit_Plugin', 'instance' ) );
		}

	}

}
new Minit_Disable_For_Logged_In_Users;
