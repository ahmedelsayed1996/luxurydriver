<?php

//TGMPA required plugin
require_once get_template_directory() . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'nicdark_register_required_plugins' );
function nicdark_register_required_plugins() {

    $nicdark_plugins = array(

        //cf7
        array(
            'name'      => esc_html__( 'Contact Form 7', 'lovetravel' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),

        //wp import
        array(
            'name'      => esc_html__( 'Wordpress Importer', 'lovetravel' ),
            'slug'      => 'wordpress-importer',
            'required'  => true,
        ),

        //nd elements
        array(
            'name'      => esc_html__( 'ND Elements', 'lovetravel' ),
            'slug'      => 'nd-elements',
            'source'    => get_template_directory().'/plugins/nd-elements.zip',
            'required'  => true,
        ),

        //nd travel
        array(
            'name'      => esc_html__( 'ND Travel', 'lovetravel' ),
            'slug'      => 'nd-travel',
            'source'    => get_template_directory().'/plugins/nd-travel.zip',
            'required'  => true,
        ),

        //nd shortcodes
        array(
            'name'      => esc_html__( 'ND Shortcodes', 'lovetravel' ),
            'slug'      => 'nd-shortcodes',
            'source'    => get_template_directory().'/plugins/nd-shortcodes.zip',
            'required'  => true,
        ),

        //elementor
        array(
            'name'      => esc_html__( 'Elementor', 'lovetravel' ),
            'slug'      => 'elementor',
            'required'  => true,
        ),

        //elementor pro
        array(
            'name'               => esc_html__( 'Elementor Pro', 'lovetravel' ),
            'slug'               => 'elementor-pro', // The plugin slug (typically the folder name).
            'source'             => get_template_directory().'/plugins/elementor-pro.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),

        //woocommerce
        array(
            'name'      => esc_html__( 'Woo Commerce', 'lovetravel' ),
            'slug'      => 'woocommerce',
            'required'  => true,
        ),

        

    );


    $nicdark_config = array(
        'id'           => 'lovetravel',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table. 
    );

    tgmpa( $nicdark_plugins, $nicdark_config );
}
//END tgmpa

//translation
load_theme_textdomain( 'lovetravel', get_template_directory().'/languages' );

//register my menus
function nicdark_register_my_menus() {
  register_nav_menu( 'main-menu', esc_html__( 'ND Menu', 'lovetravel' ) );  
}
add_action( 'init', 'nicdark_register_my_menus' );

//Content_width
if (!isset($content_width )) $content_width  = 1180;

//automatic-feed-links
add_theme_support( 'automatic-feed-links' );

//post-thumbnails
add_theme_support( "post-thumbnails" );

//title tag
add_theme_support( 'title-tag' );

// Sidebar
function nicdark_add_sidebars() {

    // Sidebar Main
    register_sidebar(array(
        'name' =>  esc_html__('Sidebar','lovetravel'),
        'id' => 'nicdark_sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

}
add_action( 'widgets_init', 'nicdark_add_sidebars' );

//add css 
function nicdark_enqueue_scripts()
{
    //css
    wp_enqueue_style( 'nicdark-style', get_stylesheet_uri() );

    //comment-reply
    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action("wp_enqueue_scripts", "nicdark_enqueue_scripts");
//end css

function nicdark_admin_enqueue_scripts() {
  
  wp_enqueue_style( 'nicdark-admin-style', get_template_directory_uri() . '/admin-style.css', array(), false, false );
  
}
add_action( 'admin_enqueue_scripts', 'nicdark_admin_enqueue_scripts' );

//woocommerce support
add_theme_support( 'woocommerce' );

//define nicdark theme option
function nicdark_theme_setup(){
    add_option( 'nicdark_theme_author', 1, '', 'yes' );
    update_option( 'nicdark_theme_author', 1 );
}
add_action( 'after_setup_theme', 'nicdark_theme_setup' );

//START create welcome page on activation

//create transient
add_action( 'after_switch_theme','nicdark_welcome_set_trans');
function nicdark_welcome_set_trans(){ if ( ! is_network_admin() ) { set_transient( 'nicdark_welcome_page_redirect', 1, 30 ); } }


//create page
add_action('admin_menu', 'nicdark_create_welcome_page');
function nicdark_create_welcome_page() {
    add_menu_page(esc_html__( 'Love Travel Theme', 'lovetravel' ), esc_html__( 'Love Travel Theme', 'lovetravel' ), 'manage_options', 'nicdark-welcome-theme-page', 'nicdark_welcome_page_content', 'dashicons-admin-settings' );
}


//set redirect
add_action( 'admin_init', 'nicdark_welcome_theme_page_redirect' );
function nicdark_welcome_theme_page_redirect() {

    if ( ! get_transient( 'nicdark_welcome_page_redirect' ) ) { return; }
    delete_transient( 'nicdark_welcome_page_redirect' );
    if ( is_network_admin() ) { return; }
    wp_safe_redirect( add_query_arg( array( 'page' => 'nicdark-welcome-theme-page' ), esc_url( admin_url( 'themes.php' ) ) ) );
    exit;

}

//page content
function nicdark_welcome_page_content(){
    
    $nicdark_welcome_title = 'Love Travel';
    $nicdark_theme = wp_get_theme();
    $nicdark_theme_version = $nicdark_theme->get( 'Version' );

    //theme plugins required
    $nicdark_plugins_required = array('nd-shortcodes','nd-elements','nd-travel','wordpress-importer','contact-form-7','elementor','elementor-pro','woocommerce');


    //start check if all plugins are activated
    $nicdark_all_plugins_required = 0;
    foreach( $nicdark_plugins_required as $nicdark_plugin_required ){


        $nicdark_plugin_required_file = $nicdark_plugin_required;

        //exceptions
        if ( $nicdark_plugin_required == 'contact-form-7' ) { $nicdark_plugin_required_file = 'wp-contact-form-7'; }

        $nicdark_plugin_required_path = $nicdark_plugin_required.'/'.$nicdark_plugin_required_file.'.php';


        if ( is_plugin_active($nicdark_plugin_required_path) ) { 
            $nicdark_all_plugins_required = 1; 

        }else{
            $nicdark_all_plugins_required = 0;
            break; 

        }

    }
    //end check if all plugins are activated


    ?>

    <style>
        #setting-error-tgmpa { display:none !important; }
    </style>

    <div class="nicdark_section nicdark_padding_right_20 nicdark_padding_left_2 nicdark_margin_top_25">

        

        <!--start THEME TITLE-->
        <div class="nicdark_section nicdark_background_color_1d2327 nicdark_padding_20 nicdark_border_bottom_3_solid_2271b1">
            <h2 class="nicdark_display_inline_block nicdark_color_ffffff">
                <?php esc_html_e($nicdark_welcome_title); ?>    
            </h2>
            <span class="nicdark_color_a0a5aa nicdark_margin_left_10">
                <?php esc_html_e($nicdark_theme_version); ?>
            </span>
        </div>
        <!--end THEME TITLE-->

    


        <div class="nicdark_section nicdark_box_shadow_0_1_1_000_4 nicdark_background_color_ffffff nicdark_border_1_solid_e5e5e5 nicdark_border_1_solid_e5e5e5 nicdark_border_top_width_0 nicdark_border_left_width_0 nicdark_overflow_hidden nicdark_position_relative">
    
          


          <!--START menu-->
          <div class="nicdark_position_absolute nicdark_box_sizing_border_box nicdark_float_left nicdark_background_color_2c3338 nicdark_width_20_percentage nicdark_min_height_3000">

            <ul class="nicdark_demo_navigation nicdark_padding_0 nicdark_margin_0 nicdark_list_style_none">
              
                <li class="nicdark_padding_0 nicdark_margin_0">
                    <a class="nicdark_import_demo_nav  nicdark_background_color_2271b1 nicdark_display_block nicdark_text_decoration_none nicdark_color_ffffff nicdark_font_size_14px nicdark_padding_8_20" target="_blank" href="#">
                        <?php esc_html_e('1 - Install Required Plugins','lovetravel'); ?>
                    </a>
                </li>
                
                <li class="nicdark_padding_0 nicdark_margin_0">
                    <p class="nicdark_import_demo_nav nicdark_font_size_14px nicdark_text_decoration_none nicdark_color_ffffff nicdark_padding_8_20 nicdark_display_block nicdark_margin_0">
                        <?php esc_html_e('2 - Choose the Demo','lovetravel'); ?>        
                    </p>
                </li>

                <li class="nicdark_padding_0 nicdark_margin_0">
                    <p class="nicdark_import_demo_nav nicdark_font_size_14px nicdark_text_decoration_none nicdark_color_ffffff nicdark_padding_8_20 nicdark_display_block nicdark_margin_0">
                        <?php esc_html_e('3 - Import Content and Style','lovetravel'); ?>
                    </p>
                </li>

                <li class="nicdark_padding_0 nicdark_margin_0">
                    <p class="nicdark_import_demo_nav nicdark_font_size_14px nicdark_text_decoration_none nicdark_color_ffffff nicdark_padding_8_20 nicdark_display_block nicdark_margin_0">
                        <?php esc_html_e('4 - Enjoy your Theme','lovetravel'); ?>
                    </p>
                </li>


                <?php 

                if ( $nicdark_all_plugins_required == 1 ) {
                    if ( function_exists('nicdark_import_demo_nav') ){ do_action("nicdark_import_demo_nav_nd"); } 
                }

                ?>

                
            </ul>

          </div>
          <!--END menu-->




      <!--START content-->
      <div class="nicdark_padding_20 nicdark_box_sizing_border_box nicdark_margin_left_20_percentage nicdark_float_left nicdark_width_80_percentage">


        <!--START-->
        <div class="nicdark_section">
          
            

            <!--START 1-->
            <div class="nicdark_import_demo_1_step nicdark_padding_20 nicdark_box_sizing_border_box nicdark_width_100_percentage">


              	<div class="nicdark_section">
                    <div class="nicdark_width_40_percentage nicdark_padding_20 nicdark_box_sizing_border_box nicdark_float_left">
                        <h1 class="nicdark_section nicdark_margin_0">
                            <?php esc_html_e('Love Travel Theme','lovetravel'); ?>
                        </h1>
                        <p class="nicdark_color_666666 nicdark_section nicdark_margin_0 nicdark_margin_top_20">
                            <?php esc_html_e('Thanks for choosing our theme. If you want check also our site','lovetravel'); ?>
                            <a target="_blank" href="https://www.nicdark.com"><?php esc_html_e('Nicdark.com','lovetravel'); ?></a>
                        </p>
                    </div>
                </div>

                
                <div class="nicdark_section nicdark_height_1 nicdark_background_color_E7E7E7 nicdark_margin_top_10 nicdark_margin_bottom_10"></div>

                
                <div class="nicdark_section">
                    
                    <div class="nicdark_width_50_percentage nicdark_padding_20 nicdark_box_sizing_border_box nicdark_float_left">
                        <h2 class="nicdark_section nicdark_margin_0">
                            <?php esc_html_e('How do I import the sample demo ?','lovetravel'); ?>
                        </h2>
                        <p class="nicdark_color_666666 nicdark_section nicdark_margin_0 nicdark_margin_top_10">
                            <?php esc_html_e('Start by installing and activating the plugins required by the theme','lovetravel'); ?>
                        </p>
                        <a class="button button-primary nicdark_margin_top_15_important" target="_blank" href="<?php echo esc_url(admin_url('themes.php?page=tgmpa-install-plugins')); ?>">
                            <?php esc_html_e('Go to plugins page','lovetravel'); ?>
                        </a>


                        <!--plugins notice-->
                        <div class="nicdark_box_sizing_border_box nicdark_float_left nicdark_width_100_percentage">
                          <div class="notice notice-error nicdark_padding_20 nicdark_margin_top_30 nicdark_margin_0">
                            <p><?php esc_html_e('If all the plugins are not installed and active it will not be possible to reach the second step, if you having trouble installing plugins check out our article below','lovetravel'); ?></p>
                            <a target="blank" href="https://documentations.nicdark.com/themes/plugin-installation-problems/"><?php esc_html_e('Check the article','lovetravel'); ?></p></a>
                          </div>
                        </div>
                        <!--plugins notice-->


                    </div>


                    <div class="nicdark_width_50_percentage nicdark_padding_20 nicdark_text_align_center nicdark_box_sizing_border_box nicdark_float_left">
                        <img id="nicdark_theme_image" src="<?php  echo esc_url(get_template_directory_uri()); ?>/screenshot.jpg">
                        <a target="_blank" class="button" href="https://www.nicdark.com/wordpress-themes/"><?php esc_html_e('All Nicdark WordPress Themes','lovetravel'); ?></a>
                    </div>


                </div>

                
                <div class="nicdark_section nicdark_height_1 nicdark_background_color_E7E7E7 nicdark_margin_top_10 nicdark_margin_bottom_10"></div>


                <div class="nicdark_section">
                    <div class="nicdark_width_50_percentage nicdark_padding_20 nicdark_box_sizing_border_box nicdark_float_left">
                        <p class="nicdark_color_666666 nicdark_section nicdark_margin_0 nicdark_margin_top_10">
                            <?php esc_html_e('Once all plugins are installed and activated, return and refresh this page for go to the second step.','lovetravel'); ?>
                        </p>
                    </div>
                </div>


          </div>
          <!--END 1-->


          <?php 


          if ( $nicdark_all_plugins_required == 1 ) {
            if ( function_exists('nicdark_import_demo') ){ do_action("nicdark_import_demo_nd"); } 
          }

          ?>


        </div>
        <!--END-->

      
      </div>
      <!--END content-->


    </div>

  </div>





<?php


}
//END create welcome page on activation
