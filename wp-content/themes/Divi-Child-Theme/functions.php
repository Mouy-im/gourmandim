<?php 
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
	//add bootstrap
	wp_enqueue_style( 'bootstrap-css',  get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ),'',true );
	//add datetimepicker
	wp_enqueue_style( 'datetimepicker-css',  get_stylesheet_directory_uri() . '/css/jquery.datetimepicker.min.css' );
	wp_enqueue_script( 'datetimepicker-js', get_stylesheet_directory_uri() . '/js/jquery.datetimepicker.full.min.js', array( 'jquery' ),'',true );
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
add_action( 'wp_enqueue_scripts', 'prefix_enqueue_awesome' );

 
function custom_remove_downloads_my_account( $items ) {
unset($items['downloads']);
return $items;
}
add_filter( 'woocommerce_account_menu_items', 'custom_remove_downloads_my_account', 999 );

//add custom_tab_signle_product_page

function grmd_add_ingredient_tab($tabs) {
	
	$tabs['ingredient_tab'] = array(
		'title' 	=> __('Ingrédients', 'grmd'),
		'priority' 	=> 15,
		'callback' 	=> 'grmd_add_ingredient_tab_content'
	);

	return $tabs;

}
add_filter('woocommerce_product_tabs', 'grmd_add_ingredient_tab');

function grmd_add_ingredient_tab_content() {
	wc_get_template('woocommerce/ingredient.php');
}

function hide_shipping_when_free_is_available( $rates, $package ) {
	$new_rates = array();
	foreach ( $rates as $rate_id => $rate ) {
	// Only modify rates if free_shipping is present.
		if ( 'free_shipping' === $rate->method_id ) {
			$new_rates[ $rate_id ] = $rate;
			break;
		}
	}
	
	if ( ! empty( $new_rates ) ) {
	//Save local pickup if it’s present.
	foreach ( $rates as $rate_id => $rate ) {
		if ('local_pickup' === $rate->method_id ) {
			$new_rates[ $rate_id ] = $rate;
			break;
		}
	}
	return $new_rates;
	}
	
	return $rates;
	}
	
	add_filter( 'woocommerce_package_rates', 'hide_shipping_when_free_is_available', 10, 2 );

function get_shipping_method() {
    $names = array();
    foreach ( $this->get_shipping_methods() as $shipping_method ) {
      $names[] = $shipping_method->get_name();
    }
    return apply_filters( 'woocommerce_order_shipping_method', implode( ', ', $names ), $this );
  }

/*add date-pickup to bdd wc_order_itemmeta and to checkout*/

if ( !function_exists( 'wdm_add_values_to_order_item_meta' )) {
	function  wdm_add_values_to_order_item_meta ($item_id, $values) {
		  global $woocommerce, $wpdb;
			$order_item = wp_unslash( $_POST ); // WPCS: CSRF ok.
		  if ( !empty($order_item['date_pickup']))
		  {
			wc_add_order_item_meta( $item_id, '_date_pickup', $order_item['date_pickup'] );
		  }
	}
  }
  add_action ( 'woocommerce_add_order_item_meta' , 'wdm_add_values_to_order_item_meta' , 1,2);