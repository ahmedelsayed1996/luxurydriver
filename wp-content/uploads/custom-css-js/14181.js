/******* Do not edit this file *******
Simple Custom CSS and JS - by Silkypress.com
Saved: May 14 2023 | 17:40:13 */
jQuery(document).ready(function( $ ){
    if (window.location.href.indexOf("landing") > -1) {
      $("#menu-primary-menu, .elementor-social-icons-wrapper").addClass('d-none');
		$('a.navbar-brand').removeAttr('href')
    }
});
