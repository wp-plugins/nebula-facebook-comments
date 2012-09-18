<?php
/*
Plugin Name: Nebula Facebook Comments
Plugin URI: http://www.andromeda-media.de/
Description: Replaces the default comments functionality by Facebook's Comments social plugin. Find more information here: <a href="http://developers.facebook.com/docs/reference/plugins/comments/" title="Find more information">http://developers.facebook.com/docs/reference/plugins/comments/</a>.
Author: andromeda_media
Version: 1.5
Author URI: http://www.andromeda-media.de/
License: GPL v3

Nebula Facebook Comments
Copyright (C) 2012, andromeda media - info@andromeda-media.de

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

if( !function_exists('add_action') ) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1. 403 Forbidden');
	exit();
}

if( !defined('NBFC_NAME') )
	define( 'NBFC_NAME', 'Facebook Comments' );
if( !defined('NBFC_SLUG') )
	define( 'NBFC_SLUG', 'nebula-facebook-comments' );

global $nbfc_defaults;
$nbfc_defaults = array(
	'width'		=> 699,
	'rows'		=> 10,
	'scheme'	=> 'light',
);

if( !class_exists('NebulaFacebookComments') ) {
	
	class NebulaFacebookComments {
		
		private $comments_template;
		private $options;
		
		function __construct() {
			global $nbfc_defaults;
			
			$this->options = get_option( NBFC_SLUG, $nbfc_defaults );
			$this->comments_template = '/comments.php';
			
			add_filter( 'comments_template', array(&$this,'facebook_comments'), 700 );
			add_action( 'admin_menu', array(&$this, 'add_options_page') );
			add_action( 'admin_init', array(&$this, 'add_settings') );
			add_action( 'plugins_loaded', array(&$this, 'load_text_domain') );
		}
		
		function load_text_domain() {
			load_plugin_textdomain( 'nebula-facebook-comments', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}
		
		function facebook_comments() {
			if( file_exists( dirname(__FILE__) . $this->comments_template ) )
				return dirname(__FILE__) . $this->comments_template;
		}
		
		function add_options_page() {
			add_options_page( sprintf( __('%s Setting', 'nebula-facebook-comments' ), NBFC_NAME ) , NBFC_NAME, 'manage_options', NBFC_SLUG, array(&$this, 'options_page'));
		}
		
		function options_page() {
			?>
			<div class="wrap">
				
				<?php screen_icon(); ?>
				
				<?php settings_errors(); ?>
				
				<h2><?php esc_html( printf( __('%s Setting', 'nebula-facebook-comments' ), NBFC_NAME ) ); ?></h2>
				<p><?php _e( 'Here you can define the width of the plugin and the number of comments to show.' , NBFC_SLUG); ?></p>
				<form action="options.php" method="post">
					
				<?php settings_fields( NBFC_SLUG ); ?>
				<?php do_settings_sections( NBFC_SLUG ); ?>
				<?php submit_button(); ?>
				
				</form>
			</div>
			<?php
		}
		
		function add_settings() {
			register_setting( NBFC_SLUG, NBFC_SLUG, array(&$this, 'validate_options') );
			add_settings_section( NBFC_SLUG, __('General'), array(&$this, 'settings_section'), NBFC_SLUG);
			add_settings_field( 'nbfc_width', __( 'Width of the Plugin', 'nebula-facebook-comments' ), array(&$this, 'width_field'), NBFC_SLUG, NBFC_SLUG );
			add_settings_field( 'nbfc_rows', __( 'How many comments to show?', 'nebula-facebook-comments' ), array(&$this, 'rows_field'), NBFC_SLUG, NBFC_SLUG );
			add_settings_field( 'nbfc_scheme', __( 'Plugin color scheme', 'nebula-facebook-comments' ), array(&$this, 'scheme_field'), NBFC_SLUG, NBFC_SLUG );
		}
		
		function settings_section() {
			echo '<p>' . __( 'Please define width and height of the plugin', 'nebula-facebook-comments' ) . ':</p>';
		}
		
		function width_field() {
			echo "<input name='" . NBFC_SLUG . "[width]' type='text' value='{$this->options['width']}' class='small-text' /> "
				. "<span class='description'>" . __( '(The width in pixel)', 'nebula-facebook-comments' ) . "</span>";
		}
		
		function rows_field() {
			echo "<input name='" . NBFC_SLUG . "[rows]' type='text' value='{$this->options['rows']}' class='small-text' />";
		}
		
		function scheme_field() {
			$default = 'light';
			echo "<select name='" . NBFC_SLUG . "[scheme]'>";
			echo "<option value='light'" . selected($this->options['scheme'], 'light') . ">" . __( 'light', 'nebula-facebook-comments' ) . "</option>";
			echo "<option value='dark'" . selected($this->options['scheme'], 'dark') . ">" . __( 'dark', 'nebula-facebook-comments' ) . "</option>";
			echo "</select>";
		}
		
		function validate_options( $input ) {
			global $nbfc_defaults;
			$output = $defaults = $nbfc_defaults;
			
			if( isset( $input['width'] ) )
				$output['width'] = $input['width'];
				
			if( isset( $input['rows'] ) )
				$output['rows'] = $input['rows'];
			
			if( isset( $input['scheme'] ) )
				$output['scheme'] = $input['scheme'];
			
			return $output;
		}
	}
	
	$NebulaFacebookComments = new NebulaFacebookComments;
}

?>