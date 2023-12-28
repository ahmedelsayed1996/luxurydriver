	</div>
	<!--END page-->

	<?php if ( get_option('nicdark_elementor_active') == 1 ) { }else{ ?>

		<!--nicdark footer-->
		<div class="nicdark_section nicdark_padding_20 nicdark_background_color_1bbc9b nicdark_text_align_center">

			<p class="nicdark_color_ffffff"><?php echo esc_html(get_bloginfo('name')); ?></p>		

		</div>
		<!--nicdark footer-->

	<?php } ?>
	
<?php wp_footer(); ?>

</body>  
</html>