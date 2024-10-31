<?php

/**************************************************************************
Plugin Name: Real IP and Geo for Cloudflare
Plugin URI: http://wordpress.org/plugins/cloudflare-real-ip-and-geo/
Description: Saves and displays visitors' real IP and location, instead of Cloudflare's
Version: 1.0
Author: RaMMicHaeL
Author URI: http://rammichael.com/
**************************************************************************/

function ipgeo4cf_add_custom_comment_fields($comment_id) {
	if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
		add_comment_meta($comment_id, 'cf_connecting_ip', $_SERVER['HTTP_CF_CONNECTING_IP']);
	}
	if (isset($_SERVER['HTTP_CF_IPCOUNTRY'])) {
		add_comment_meta($comment_id, 'cf_ipcountry', $_SERVER['HTTP_CF_IPCOUNTRY']);
	}
}
add_action('comment_post', 'ipgeo4cf_add_custom_comment_fields');

// https://wordpress.stackexchange.com/a/261821
function ipgeo4cf_admin_comments_filter($objects) {
	global $current_screen;
	// Only on that screen within admin
	if (is_admin() && $current_screen->id == 'edit-comments') {
		foreach ($objects as $object) {
			$cf_connecting_ip = get_comment_meta($object->comment_ID, 'cf_connecting_ip', true);
			if ($cf_connecting_ip) {
				$cf_ipcountry = get_comment_meta($object->comment_ID, 'cf_ipcountry', true);
				if (!$cf_ipcountry) {
					$cf_ipcountry = '???';
				}
				$object->comment_author_IP = "[$cf_ipcountry] $cf_connecting_ip (cf:{$object->comment_author_IP})";
			}
		}
	}
	return $objects;
}
add_filter('the_comments', 'ipgeo4cf_admin_comments_filter');
