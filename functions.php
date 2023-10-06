<?php 

function load_styles_and_scripts() {
    // Register and enqueue styles
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('style_css', get_template_directory_uri() . '/style.css', array(), false, 'all');
    wp_enqueue_style('style_css');

    wp_register_style('owl', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.carousel.css', array(), false, 'all');


    wp_register_style('owl_green', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.theme.green.css', array(), false, 'all');
    wp_enqueue_style('owl_green');

    wp_register_style('owl_default', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.theme.default.css', array(), false, 'all');
    wp_enqueue_style('owl_default');

    wp_register_style('animate', get_template_directory_uri() . '/assets/lib/animate/animate.min.css', array(), false, 'all');
    wp_enqueue_style('animate');
    wp_enqueue_style('counter');
    wp_enqueue_style('easing');
    wp_enqueue_style('owl');

    // Register and enqueue scripts
    wp_enqueue_script('jquery');
    wp_register_script('owlcarousel', get_template_directory_uri() . '/assets/lib/owlcarousel/owl.carousel.js', 'jquery', true, true);

    wp_register_script('easing', get_template_directory_uri() . '/assets/lib/animate/easing.js');
    wp_register_script('counter', get_template_directory_uri() . '/assets/lib/counterup/counterup.min.js');
    wp_register_script('wow', get_template_directory_uri() . '/assets/lib/wow/wow.js');
    wp_register_script('waypoint', get_template_directory_uri() . '/assets/lib/waypoints/waypoints.min.js');

    wp_enqueue_script('owlcarousel');
    wp_enqueue_script('counter');
    wp_enqueue_script('waypoint');
    wp_enqueue_script('wow');


    wp_register_script('customjs', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'owlcarousel', 'counter', 'waypoint'), false, true);
    wp_enqueue_script('customjs');
}


add_action('wp_enqueue_scripts', 'load_styles_and_scripts');


//Theme options
add_theme_support('menus');
add_theme_support('custom-logo');

//Menus
register_nav_menus(
    array(
        'top-menu' => "Top Bar",
        'mobile-menu' => 'Mobile Menu Location',

    )
    );

function add_additional_class_on_li($classes, $item, $args) {
        if(isset($args->add_li_class)) {
            $classes[] = $args->add_li_class;
        }
        return $classes;
    }
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function baker_customizer_register($wp_customize){
// Post Section
$wp_customize->add_section(
    'color_settings', array(
        'title' => __( 'Colors', 'theme-name' ),
        'description' => esc_html__( 'Change your theme color' ),
        'priority' => 50,
        'capability' => 'edit_theme_options',
    )
);

// Add Title Text Support
$wp_customize->add_setting(
    'primary_color', array(
        'default' => '#EAA636',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'  )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
    'primary_color', array(
        'description' => __( 'Change Primary color', 'theme-name' ),
        'label' => __( 'Default Color Control' ),
        'section'     => 'color_settings',
        'settings'    => 'primary_color',
        'type'        => 'color',
        'capability' => 'edit_theme_options'
    )

    )
);

$wp_customize->add_setting(
    'secondary_color', array(
        'default' => '#545454',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'  )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
    'secondary_color', array(
        'description' => __( 'Change Secondary color', 'theme-name' ),
        'section'     => 'color_settings',
        'settings'    => 'secondary_color',
        'type'        => 'color',
        'capability' => 'edit_theme_options'
    )

    )
);

$wp_customize->add_setting(
    'light_color', array(
        'default' => '#FDF5EB',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'  )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
    'light_color', array(
        'description' => __( 'Change Light color', 'theme-name' ),
        'section'     => 'color_settings',
        'settings'    => 'light_color',
        'type'        => 'color',
        'capability' => 'edit_theme_options'
    )

    )
);

$wp_customize->add_setting(
    'dark_color', array(
        'default' => '#1E1916',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'  )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
    'dark_color', array(
        'description' => __( 'Change Dark color', 'theme-name' ),
        'section'     => 'color_settings',
        'settings'    => 'dark_color',
        'type'        => 'color',
        'capability' => 'edit_theme_options'
    )

    )
);

$wp_customize->add_setting(
    'text_color', array(
        'default' => '#1E1916',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'  )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
    'text_color', array(
        'description' => __( 'Change Text color', 'theme-name' ),
        'section'     => 'color_settings',
        'settings'    => 'text_color',
        'type'        => 'color',
        'capability' => 'edit_theme_options'
    )

    )
);
}
add_action( 'customize_register', 'baker_customizer_register' );

function mytheme_customize_css() {
    ?>
    <style type="text/css">
        .text-primary { color: <?php echo get_theme_mod( 'primary_color', '#545454 !important' ); ?>; }
        .bg-primary { background-color: <?php echo get_theme_mod( 'primary_color', '#545454 !important' ); ?>; }

        .btn-primary { background-color: <?php echo get_theme_mod( 'primary_color', '#545454 !important' ); ?>; 
            border-color: <?php echo get_theme_mod( 'primary_color', '#545454 !important' ); ?>;
         }
         .bg-light { background-color: <?php echo get_theme_mod( 'light_color', '#FDF5EB !important' ); ?>; }

         .img-twice::before { background: <?php echo get_theme_mod( 'primary_color', '#1E1916 !important' ); ?>;
                                border: 25px solid <?php echo get_theme_mod( 'light_color', '#FDF5EB !important' ); ?>; }
         .bg-dark { background-color: <?php echo get_theme_mod( 'dark_color', '#1E1916 !important' ) ;?>; }
         .nav-link a { color: <?php echo get_theme_mod( 'primary_color', '#545454 !important' ); ?>; }
         .product-item:hover {background: <?php echo get_theme_mod( 'primary_color', '#545454 ' ) , '!important'; ?>; }
         .testimonial-carousel .owl-item.center .testimonial-item {background: <?php echo get_theme_mod( 'primary_color', '#545454' ) ,'!important' ;  ?>; }
         .product-item:hover * {color: <?php echo get_theme_mod( 'light_color', '#545454 !important' ); ?>; }
         .team-item .team-social:hover {  background: <?php echo get_theme_mod( 'primary_color', '#1E1916' ), '!important'; ?>; }
         .team-item .team-title {  background: <?php echo get_theme_mod( 'light_color', '#1E1916' ), '!important'; ?>; }

    </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');


/**
 * 
 * Create Post types
 */

function create_product_post_type(){
    $args = array(
        'labels' => array(
            'name' => __( 'Products'), 
            'singular_name' => __( 'Product')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'products'),
        'show_in_rest' => true,
        'description' => 'Products availabe for sales in the bakery',
        'hierarchical' => true,
        'supports' => array('title', 'editor', 'comments', 'thumbnails', 'authors', 'excerpt')
    );
    register_post_type( 'products', $args);
}


add_action( 'init', 'create_product_post_type');
