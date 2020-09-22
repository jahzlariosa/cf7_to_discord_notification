<?php

class CFDiscordNotification {
	private $cf7_discord_notification_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'cf7_discord_notification_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'cf7_discord_notification_page_init' ) );
	}

	public function cf7_discord_notification_add_plugin_page() {
		add_plugins_page(
			'CF7 Discord Notification', // page_title
			'CF7 Discord Notification', // menu_title
			'manage_options', // capability
			'cf7-discord-notification', // menu_slug
			array( $this, 'cf7_discord_notification_create_admin_page' ) // function
		);
	}

	public function cf7_discord_notification_create_admin_page() {
		$this->cf7_discord_notification_options = get_option( 'cf7_discord_notification_option_name' ); ?>

		<div class="wrap">
			<h2>CF7 Discord Notification</h2>
			<p>CF7DN Settings </p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'cf7_discord_notification_option_group' );
					do_settings_sections( 'cf7-discord-notification-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function cf7_discord_notification_page_init() {
		register_setting(
			'cf7_discord_notification_option_group', // option_group
			'cf7_discord_notification_option_name', // option_name
			array( $this, 'cf7_discord_notification_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'cf7_discord_notification_setting_section', // id
			'Settings', // title
			array( $this, 'cf7_discord_notification_section_info' ), // callback
			'cf7-discord-notification-admin' // page
		);

		add_settings_field(
			'webhook_url_0', // id
			'Webhook URL', // title
			array( $this, 'webhook_url_0_callback' ), // callback
			'cf7-discord-notification-admin', // page
			'cf7_discord_notification_setting_section' // section
		);

		add_settings_field(
			'username_1', // id
			'Username', // title
			array( $this, 'username_1_callback' ), // callback
			'cf7-discord-notification-admin', // page
			'cf7_discord_notification_setting_section' // section
		);

		add_settings_field(
			'color_2', // id
			'Color', // title
			array( $this, 'color_2_callback' ), // callback
			'cf7-discord-notification-admin', // page
			'cf7_discord_notification_setting_section' // section
		);

		add_settings_field(
			'avatar_url_3', // id
			'Avatar URL', // title
			array( $this, 'avatar_url_3_callback' ), // callback
			'cf7-discord-notification-admin', // page
			'cf7_discord_notification_setting_section' // section
		);
	}

	public function cf7_discord_notification_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['webhook_url_0'] ) ) {
			$sanitary_values['webhook_url_0'] = sanitize_text_field( $input['webhook_url_0'] );
		}

		if ( isset( $input['username_1'] ) ) {
			$sanitary_values['username_1'] = sanitize_text_field( $input['username_1'] );
		}

		if ( isset( $input['color_2'] ) ) {
			$sanitary_values['color_2'] = sanitize_text_field( $input['color_2'] );
		}

		if ( isset( $input['avatar_url_3'] ) ) {
			$sanitary_values['avatar_url_3'] = sanitize_text_field( $input['avatar_url_3'] );
		}

		return $sanitary_values;
	}

	public function cf7_discord_notification_section_info() {
		
	}

	public function webhook_url_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="cf7_discord_notification_option_name[webhook_url_0]" id="webhook_url_0" value="%s">',
			isset( $this->cf7_discord_notification_options['webhook_url_0'] ) ? esc_attr( $this->cf7_discord_notification_options['webhook_url_0']) : ''
		);
	}

	public function username_1_callback() {
		printf(
			'<input class="regular-text" type="text" name="cf7_discord_notification_option_name[username_1]" id="username_1" value="%s">',
			isset( $this->cf7_discord_notification_options['username_1'] ) ? esc_attr( $this->cf7_discord_notification_options['username_1']) : ''
		);
	}

	public function color_2_callback() {
		printf(
			'<input class="regular-text" type="text" name="cf7_discord_notification_option_name[color_2]" id="color_2" value="%s">',
			isset( $this->cf7_discord_notification_options['color_2'] ) ? esc_attr( $this->cf7_discord_notification_options['color_2']) : ''
		);
	}

	public function avatar_url_3_callback() {
		printf(
			'<input class="regular-text" type="text" name="cf7_discord_notification_option_name[avatar_url_3]" id="avatar_url_3" value="%s">',
			isset( $this->cf7_discord_notification_options['avatar_url_3'] ) ? esc_attr( $this->cf7_discord_notification_options['avatar_url_3']) : ''
		);
	}

}
if ( is_admin() )
	$cf7_discord_notification = new CFDiscordNotification();

/* 
 * Retrieve this value with:
 * $cf7_discord_notification_options = get_option( 'cf7_discord_notification_option_name' ); // Array of All Options
 * $webhook_url_0 = $cf7_discord_notification_options['webhook_url_0']; // Webhook URL
 * $username_1 = $cf7_discord_notification_options['username_1']; // Username
 * $color_2 = $cf7_discord_notification_options['color_2']; // Color
 * $avatar_url_3 = $cf7_discord_notification_options['avatar_url_3']; // Avatar URL
 */
