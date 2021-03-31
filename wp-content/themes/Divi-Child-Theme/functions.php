<?php 
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

// Changer le nombre de produits par ligne 3
add_action('after_setup_theme','remove_fonction_parent');
function remove_fonction_parent() {
   remove_action('loop_shop_columns','et_modify_shop_page_columns_num');
   add_action('loop_shop_columns','et_modify_shop_page_columns_num2');
}

function et_modify_shop_page_columns_num2( $columns_num ) {
	if ( ! et_is_woocommerce_plugin_active() ) {
		return $columns_num;
	}

	// WooCommerce plugin active check ensures that archive function can be used.
	$is_archive_page = is_shop() || is_product_category() || is_product_tag();

	if ( ! $is_archive_page ) {
		return $columns_num;
	}

	$default_sidebar_class  = is_rtl() ? 'et_left_sidebar' : 'et_right_sidebar';
	$divi_shop_page_sidebar = et_get_option( 'divi_shop_page_sidebar', $default_sidebar_class );

	// Assignment is intentional for readability.
	$columns_num = 'et_full_width_page' === $divi_shop_page_sidebar ? 3 : 3;

	return $columns_num;
}

//zone widget perso
add_action( 'widgets_init', 'zone_filtre' );

function zone_filtre() {

    register_sidebar( array(
        'name'          => 'affiner_recherche',
        'id'            => 'id_search_form',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
        'class'         => 'class_search_form',
    ) );
}

//utiliser fontawesome
add_action( 'wp_enqueue_scripts', 'prefix_enqueue_awesome' );
/**
 * Register and load font awesome CSS files using a CDN.
 */
function prefix_enqueue_awesome() {
	wp_enqueue_style( 
		'font-awesome-5', 
		'https://use.fontawesome.com/releases/v5.3.0/css/all.css', 
		array(), 
		'5.3.0' 
	);
}