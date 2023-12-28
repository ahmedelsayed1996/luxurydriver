<?php get_header(); ?>

<?php if ( get_option('nicdark_elementor_active') == 1 ) { the_content(); }else{ ?>

<div class="nicdark_section">
	<div class="nicdark_container nicdark_padding_top_120 nicdark_padding_bottom_50">


		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>

				<div class="nicdark_archive_post_preview">

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					

						<?php if (has_post_thumbnail()): ?>
							<?php the_post_thumbnail(); ?>
						<?php endif ?>

						<p><?php the_time(get_option('date_format')) ?></p>
						<a class="nicdark_text_decoration_none" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
						<p><?php the_excerpt(); ?></p>
						<a class="nicdark_text_decoration_none" href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','lovetravel'); ?></a>

					</div>

				</div>


			<?php endwhile; ?>
		<?php endif; ?>


		<?php

    	the_posts_pagination( array(
			'prev_text'          => esc_html__( 'Prev', 'lovetravel' ),
			'next_text'          => esc_html__( 'Next', 'lovetravel' ),
			'before_page_number' => esc_html__( 'Page', 'lovetravel' ),
		) );

		?>


	</div>
</div>

<?php } ?>

<?php get_footer(); ?>