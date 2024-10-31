=== Real IP and Geo for Cloudflare ===
Contributors: rammichael
Donate link: http://rammichael.com/donate
Tags: cloudflare, ip, geo, location
Requires at least: 4.6
Tested up to: 5.0
Stable tag: 1.0
Requires PHP: 5.2.4
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

The plugin saves and displays visitors' real IP and location, instead of Cloudflare's.

== Description ==

From the Cloudflare Support website:

Q: Why do my server logs show Cloudflare's IPs using Cloudflare?

A: When you sign on to Cloudflare the way your logs are displayed will change because Cloudflare 
   acts as a proxy. This means that your visitors are routed through the Cloudflare network. This 
   allows Cloudflare to stop attacks before they reach your network. It also allows Cloudflare to 
   speed up page load time by more efficiently routing packets and, more importantly, caching 
   static resources (images, javascript, css, etc.) on a very fast connection. However, as a 
   result, the connecting IP will always come from the Cloudflare network.

As a result, commenters' IP will also be masked by Cloudflare. Luckily, Cloudflare sends the real
user's IP in a separate header. This plugin saves it, as well as the user's geo-location (also
provided by Cloudflare), and displays this information in the admin panel.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/real-ip-and-geo-for-cloudflare` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==

= Searching by clicking on the IP stopped working =

That's a known limitation.

== Screenshots ==

1. The admin panel with the plugin activated

== Changelog ==

= 1.0 =
* The first version of the plugin.
