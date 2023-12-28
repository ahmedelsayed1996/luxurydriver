<?php get_header(); ?>

<?php if ( get_option('nicdark_elementor_active') == 1 ) { the_content(); }else{ ?>

<div class="nicdark_section nicdark_single_post">
	<div class="nicdark_container nicdark_padding_top_120 nicdark_padding_bottom_120">

		

		<?php if(have_posts()) :
        	while(have_posts()) : the_post(); ?>
            
		
	            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	                
	                <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); }  ?>

	                <!--start content-->
	                <?php the_content(); ?>
	                <!--end content-->

	            </div>


	            <div class="nicdark_section">

	            	<div class="nicdark_section">

		                <?php $args = array(
		                    'before'           => '',
		                    'after'            => '',
		                    'link_before'      => '',
		                    'link_after'       => '',
		                    'next_or_number'   => 'number',
		                    'nextpagelink'     => esc_html__('Next page', 'lovetravel'),
		                    'previouspagelink' => esc_html__('Previous page', 'lovetravel'),
		                    'pagelink'         => '%',
		                    'echo'             => 1
		                ); ?>
		                
		                <?php wp_link_pages( $args ); ?>

	            	</div>

	            	<div class="nicdark_section nicdark_single_post_tag_cat">
	            		<div class="nicdark_section nicdark_single_post_tag">
	            			<?php if(has_tag()) { ?><?php the_tags(''); ?><?php } ?>
	            		</div>
	            		<div class="nicdark_section nicdark_single_post_cat">
	            			<?php the_category(', '); ?>
	            		</div>
	            	</div>
	                   
	            	<div class="nicdark_section nicdark_single_post_comments">
		                <?php 

		                if ( comments_open() || get_comments_number() ) {
		                    comments_template();
		                }
		                     
		                ?>
	            	</div>
	                

	            </div>

        
        	<?php endwhile; ?>
    	<?php endif; ?>




	</div>
</div>

<?php } ?>

<?php get_footer(); ?>