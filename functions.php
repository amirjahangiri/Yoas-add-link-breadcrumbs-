<?php 
// Write By Amirj.
// www.example.com/wp-content/theme/Theme-name/functions.php
// Open Functions.php in root template 

// Add link to the last item in the breadcrumbs
add_filter( 'wpseo_breadcrumb_single_link', 'jj_link_to_last_crumb' , 10, 2);
function jj_link_to_last_crumb( $output, $crumb){

	$output = '<a property="v:title" rel="v:url" href="'. $crumb['url']. '" >';
	$output.= $crumb['text'];
	$output.= '</a>';

	return $output;
}
//remove shop in breadcrumb
/* Remove "Products" from Yoast SEO breadcrumbs in WooCommerce */
add_filter( 'wpseo_breadcrumb_links', function( $links ) {

    // Check if we're on a WooCommerce page
    // Checks if key 'ptarchive' is set
    // Checks if 'product' is the value of the key 'ptarchive', in position 1 in the links array
    if ( is_woocommerce() && isset( $links[1]['ptarchive'] ) && 'product' === $links[1]['ptarchive'] ) {

        // True, remove 'Products' archive from breadcrumb links
        unset( $links[1] );

    // Added by me to remove it on product single pages - doesn't work!
    } elseif ( is_product() && isset( $links[1]['ptarchive'] ) && 'product' === $links[1]['ptarchive'] ) {

        // True, remove 'Products' archive from breadcrumb links
        unset( $links[1] );


    }

    // Rebase array keys
    $links = array_values( $links );

    // Return modified array
    return $links;

});
