<?php get_header(); ?>

<?php if ( get_option('nicdark_elementor_active') == 1 ) { the_content(); }else{ ?>

<div class="nicdark_section nicdark_single_page">
	<div class="nicdark_container nicdark_padding_top_120 nicdark_padding_bottom_120">

		<!--START content-->
		<?php the_content(); ?>
		<!--END content--> 

	</div>
</div>

<?php } ?>

<?php get_footer(); ?>