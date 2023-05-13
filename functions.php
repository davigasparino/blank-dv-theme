<?php
require 'plugins/index.php';
function dv_get_title_page(){
    $output = '';
    if( is_page() || is_single() ){
        $output .= get_the_title();
    }else if(is_category() ){
        $output .= single_cat_title();
    }else if( is_tag() ){
        echo single_tag_title();
    }else if( is_404() ){
        $output .= 'Página não encontrada';
    }else if( is_tax() ){
        $get_tax = get_query_var('taxonomy');
        $get_term_slug = get_query_var($get_tax);
        $get_taxonomy = get_term_by('slug', $get_term_slug, $get_tax);

        $output .= $get_taxonomy->name;
    }else if( is_archive() ){
        $output .= post_type_archive_title();
    }else if( is_search() ){
        $output .= 'Resultados encotrados para: '.sanitize_text_field( get_search_query() );
    }

    return $output;
}

function get_bootstrap_menu(){
    $args_options = array(
        'echo'              => true,
        'theme_location'    => 'header',
        'depth'             => 2,
        'container'         => 'ul',
        'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'bs-example-navbar-collapse-1',
        'menu_class'        => 'navbar-nav me-auto mb-2 mb-lg-0',
        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        'walker'            => new WP_Bootstrap_Navwalker(),
    );
    return wp_nav_menu( $args_options );
}
add_action('dv_blank_navbar_coll', 'get_bootstrap_menu', 1, 1);

add_action('dv_blank_navbar_coll', 'search_element_nav', 10, 1);

function search_element_nav(){
    get_search_form();
}

function dv_theme_settings_theme(){
    register_nav_menu( 'header', 'Header' );
    register_nav_menu( 'footer', 'Footer' );

    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
}
add_action( 'after_setup_theme', 'dv_theme_settings_theme' );

function dv_theme_load_js(){
    wp_enqueue_script( 'bootstrap-js-popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js', array('jquery'), 1, true );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), 1, true );
    wp_enqueue_script( 'theme-scripts-js', get_template_directory_uri().'/assets/js/scripts.js', array(), 1, true );
}
add_action( 'wp_footer', 'dv_theme_load_js' );

function dv_theme_load_css(){
    wp_enqueue_style( 'google-symbols-css', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@200', array() );
    wp_enqueue_style( 'google-symbols-Rounded-css', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20,100,1,200', array() );
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css', array() );
}
add_action( 'wp_enqueue_scripts', 'dv_theme_load_css' );


function dv_theme_load_admin_css(){
    wp_enqueue_style( 'dv_theme_style_admin', get_template_directory_uri().'/assets/css/style-admin.css', array() );
}
add_action( 'admin_enqueue_scripts', 'dv_theme_load_admin_css' );

function dv_get_bootstrap_paginate_links() {
    ob_start();
    ?>
    <div class="pages clearfix">
        <?php
        global $wp_query;
        $current = max( 1, absint( get_query_var( 'paged' ) ) );
        $pagination = paginate_links( array(
            'base' => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
            'format' => '?paged=%#%',
            'current' => $current,
            'total' => $wp_query->max_num_pages,
            'type' => 'array',
            'prev_text' => '<span class="material-symbols-outlined">chevron_left</span>',
            'next_text' => '<span class="material-symbols-outlined">chevron_right</span>',
        ) ); ?>
        <?php if ( ! empty( $pagination ) ) : ?>
            <ul class="pagination">
                <?php foreach ( $pagination as $key => $page_link ) : ?>
                    <li class="page-item <?php if ( strpos( $page_link, 'current' ) !== false ) { echo ' active'; } ?>">
                        <span class="page-link"><?php echo $page_link ?></span>
                    </li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
    </div>
    <?php
    $links = ob_get_clean();
    return apply_filters( 'sa_bootstap_paginate_links', $links );
}
function dv_bootstrap_paginate_links() {
    echo dv_get_bootstrap_paginate_links();
}

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_menu_link_class( $atts, $item, $args ) {
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

add_action( 'widgets_init', 'dv_widgets_init');
function dv_widgets_init() {

    register_sidebar( array(
        'name' => 'Listagens',
        'id' => 'list-widgets',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => 'Artigos',
        'id' => 'article-widgets',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => 'Páginas',
        'id' => 'page-widgets',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => 'Posts',
        'id' => 'posts-widgets',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ) );

}



function myFileUploader()
{
    if (isset($_POST['submit'])) {
        require_once (ABSPATH . 'wp-admin/includes/image.php');
        require_once (ABSPATH . 'wp-admin/includes/file.php');
        require_once (ABSPATH . 'wp-admin/includes/media.php');

        echo '<pre>'.print_r( $_FILES,true).'</pre>';
        media_handle_upload('fileToUpload', 0);
        //wp_upload_bits($_FILES['fileToUpload']['name'], null, file_get_contents($_FILES['fileToUpload']['tmp_name']));
    }
    echo '
    <form action="" method="post" enctype="multipart/form-data">
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
    </form>
  ';
}

function myFileUploaderRenderer()
{
    ob_start();
    myFileUploader();
    return ob_get_clean();
}

add_shortcode('custom_file_uploader', 'myFileUploaderRenderer');

// Disable Gutenberg on the back end.
add_filter( 'use_block_editor_for_post', '__return_false' );

// Disable Gutenberg for widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

add_action( 'wp_enqueue_scripts', function() {
    // Remove CSS on the front end.
    wp_dequeue_style( 'wp-block-library' );

    // Remove Gutenberg theme.
    wp_dequeue_style( 'wp-block-library-theme' );

    // Remove inline global CSS on the front end.
    wp_dequeue_style( 'global-styles' );
}, 20 );

add_action('dv_blank_brand_logo', 'add_brand_logo', 10, 1);
function add_brand_logo(){
    if(!empty(get_custom_logo())):?>
        <a class="navbar-brand" href="/"><?php echo get_custom_logo(); ?></a>
    <?php else: ?>
        <a class="navbar-brand" href="/"><?php echo get_bloginfo(); ?></a>
    <?php endif;
}