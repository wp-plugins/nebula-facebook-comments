<?php
/*
Plugin Name: Nebula Facebook Comments
Plugin URI: http://www.andromeda-media.de/
Description: Replaces the default comments functionality by Facebook's Comments social plugin. Find more information here: <a href="http://developers.facebook.com/docs/reference/plugins/comments/" title="Find more information">http://developers.facebook.com/docs/reference/plugins/comments/</a>.
Author: andromeda_media
Version: 1.1
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

if( !class_exists('NebulaFacebookComments') ) {
	class NebulaFacebookComments {
		private $comments_template;
		function __construct() {
			$this->comments_template = '/comments.php';
			add_filter( 'comments_template', array(&$this,'facebook_comments'), 700 );
		}
		
		function facebook_comments() {
			if( file_exists( dirname(__FILE__) . $this->comments_template ) )
				return dirname(__FILE__) . $this->comments_template;
		}
	}
	
	$NebulaFacebookComments = new NebulaFacebookComments;
}



?>