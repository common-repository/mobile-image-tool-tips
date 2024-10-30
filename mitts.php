<?php
/*
Plugin Name: Mobile Image Tool Tips (The MITTs plugin)
Plugin URI: http://TheCodeCave.com/plugins/mobile-image-tool-tips
Description: Display an image's tool tip/title/alt text below the image. Great when important information or punchlines can be seen on a desktop via a mouseover, but not on a mobile device.  Comic blogs may find this plugin very useful.
Version: 0.1
Author: Brian Layman
Author URI: http://eHermitsInc.com
License: GPLv2
Requires: 3.1.0
*/
class mobileImageToolTips {
	function __construct() {
		add_action('wp_head', array($this, 'action_header'));
	}

	function action_header() {
		echo 
		<<<EOF
				<script type="text/javascript">


				jQuery(document).ready(function($){
					var isMobile = {
						Android: function() {
							return navigator.userAgent.match(/Android/i);
						},
						BlackBerry: function() {
							return navigator.userAgent.match(/BlackBerry/i);
						},
						iOS: function() {
							return navigator.userAgent.match(/iPhone|iPad|iPod/i);
						},
						Opera: function() {
							return navigator.userAgent.match(/Opera Mini/i);
						},
						Windows: function() {
							return navigator.userAgent.match(/IEMobile/i);
						},
						any: function() {
							return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
						}
					};				
					
					var firstIMG = $('.post:first img');
					if(typeof firstIMG != 'undefined'){
						if(isMobile.any()){
							title = $(firstIMG).attr('title');
							if(typeof title != 'undefined'){
								$(firstIMG).parent(':first').after('<div class="aligncenter">Hover Text: ' +  title + '</div>');
							}
						};
					}
				});
				</script>

EOF;
	}
}

new mobileImageToolTips();