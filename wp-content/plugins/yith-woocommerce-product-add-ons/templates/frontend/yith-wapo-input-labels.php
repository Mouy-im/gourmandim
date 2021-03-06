<?php
/**
 * Input field template
 *
 * @author  Yithemes
 * @package YITH WooCommerce Product Add-Ons Premium
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$input_classes = array( 'ywapo_input ywapo_input_' . $type, 'ywapo_price_'.esc_attr( $price_type ) );
$input_classes_string = 'ywapo_input ywapo_input_' . $type . ' ywapo_price_' . esc_attr( $price_type );

$value = ( $checked ? $key : '' );

$before_label .= $price_html . $yith_wapo_frontend->getTooltip( stripslashes( $tooltip ) );

echo '<div id="ywapo_ctrl_id_' . $type_id . '_' . $key . '" class="ywapo_input_container ywapo_input_container_'.$type.' '.( $checked ? 'ywapo_selected' : '' ).' ">';

echo sprintf( '%s<input data-typeid="%s" data-price="%s" data-pricetype="%s" data-index="%s" type="hidden" name="%s[%s]" value="%s" %s class="%s" %s %s %s/>%s',
	$before_label,
	esc_attr( $type_id ),
	esc_attr( $price_calculated ),
	esc_attr( $price_type ),
	$key,
	esc_attr( $name ),
	$key,
	esc_attr( $value ),
	( $checked ? 'checked' : '' ),
	$input_classes_string,
	$min_html,
	$max_html,
	$disabled,
	$after_label
);

if ( $description != '' ) {
	echo '<p class="wapo_option_description">' . $description . '</p>';
}

echo '</div>';