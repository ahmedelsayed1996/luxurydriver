<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
 
    <meta charset="<?php bloginfo('charset'); ?>"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        	
<?php wp_head(); ?>	  
</head>  
<body id="nicdark_body" <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!--START page-->
<div class="nicdark_start_page">

	<?php if ( get_option('nicdark_elementor_active') == 1 ) { }else{ ?>

	<!--nicdark navigation-->
	<div class="nicdark_section nicdark_padding_20 nicdark_background_color_1bbc9b nicdark_navigation">

		<?php 

			if ( has_nav_menu( 'main-menu' ) ) { 
					wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); 
			} 

		?>

	</div>
	<!--nicdark navigation-->


	<!--header-->
	<div class="nicdark_section nicdark_padding_top_120 nicdark_padding_bottom_120 nicdark_text_align_center nicdark_border_bottom_1_solid_cccccc">

		<?php if ( is_page() ) { ?> <h1><?php the_title(); ?></h1><?php } ?>
		<?php if ( is_single() ) { ?> <h1><?php the_title(); ?></h1><?php } ?>
		<?php if ( is_archive() ) { ?> <h1><?php esc_html_e('Archive','lovetravel'); ?></h1><?php } ?>
		<?php if ( is_front_page() ) { ?> <h1><?php esc_html_e('Home','lovetravel'); ?></h1><?php } ?>

	</div>
	<!--header-->

	<?php } ?>

