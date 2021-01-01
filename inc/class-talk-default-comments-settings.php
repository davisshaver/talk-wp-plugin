<?php
/**
 * Adjust WordPress comments settings display in WP Admin while Coral Talk is active
 *
 * @package Talk_Plugin
 */
class Talk_Default_Comments_Settings {
	/**
	 * Just the constructor
	 */
	public function __construct() {
		add_action( 'admin_notices', array( $this, 'options_discussion_notice' ) );
		add_filter( 'admin_menu', function() {
			remove_menu_page( 'edit-comments.php' );
		} );
		add_action( 'post_comment_status_meta_box-options', function() {
			printf( '<p><em>%s</em></p>',
				esc_html__( 'Comments managed by Coral Project', 'coral-project-talk' )
			);
		} );
	}

	/**
	 * Print admin notice in Discussion settings page so people don't get confused
	 *
	 * @since 0.0.2
	 */
	public function options_discussion_notice() {
		$screen = get_current_screen();
		if ( 'options-discussion' === $screen->base ) {
			coral_talk_print_admin_notice(
				'success',
				__( 'Comments are managed by Coral Project. (%ssettings%s)', 'coral-project-talk' )
			);
		}
	}
}

new Talk_Default_Comments_Settings;
