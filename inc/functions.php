<?php
/*
    Main Functions
*/

add_action('wp_head', 'splo_load_critical_css', 5);

add_filter( 'style_loader_tag', 'splo_change_style_attributes', 5, 2 );


function splo_change_style_attributes( $html, $handle ) {

    $attr = "media='print' onload=\"this.media='all'; this.onload = null\"";
    $html = str_replace( "media='all'", "$attr", $html );

    return $html;

}

function splo_load_critical_css() {

    $style = strip_tags(get_option('splo_critical_css', ''));

    echo '<style>';
    echo "\n /* Inlined critical styles */ \n";
    echo apply_filters('splo_load_critical_css', $style);
    echo "\n</style>";

}
