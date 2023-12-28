<?php if ( post_password_required() ) { return; } ?>

<?php if ( have_comments() ) : ?>

		<?php comments_number(esc_html__('No Comments','lovetravel'),esc_html__('One Comment','lovetravel'),esc_html__( '% Comments','lovetravel') );?>
		
		<?php wp_list_comments(); ?>
		
		<?php previous_comments_link() ?>
		<?php next_comments_link() ?>


		<?php if ( comments_open() ) : ?>
			<?php comment_form(); ?>
		<?php endif; ?>

<?php else : ?>
	
	<?php if ( comments_open() ) : ?>
		<?php comment_form(); ?>
	<?php endif;

endif; ?>

