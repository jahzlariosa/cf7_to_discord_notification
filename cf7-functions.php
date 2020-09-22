<?php
   /*
   Plugin Name: Contact Form 7 - Discord Notification Bot
   Plugin URI: https://josephlariosa.com/wordpress/plugins/cf7-to-discord-notification
   description: A plugin that will send notification from CF7 to any Discord Channel
   Version: 0.0.1
   Author: Joseph Lariosa
   Author URI: http://github.com/jahzlariosa/cf7dn-song-request-bot
   License: GPLv3

   * @package         Cf7dn_Settings_Api
   */

include( plugin_dir_path( __FILE__ ) . '/admin/settings.php');
include( plugin_dir_path( __FILE__ ) . '/inc/discord.php');

 //$plugin_data = get_plugin_data( __FILE__ ) . 'cf7-discord-notification.php';
  
  $plugin_name = $plugin_data['Name'];
  $plugin_version = $plugin_data['Version'];
  $plugin_uri = $plugin_data['PluginURI'];
  $plugin_author = 'Joseph Lariosa';
  $plugin_avatar = 'https://josephlariosa.com/wp-content/themes/understrap-child/images/me/me3.jpg';
