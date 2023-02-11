# Yoas-add-link-breadcrumbs-
Yoast Add link to the last item in the breadcrumbs 


<pre>
//Write By AmirJ
// Add link to the last item in the breadcrumbs
add_filter( 'wpseo_breadcrumb_single_link', 'jj_link_to_last_crumb' , 10, 2);
function jj_link_to_last_crumb( $output, $crumb){

	$output = '<a property="v:title" rel="v:url" href="'. $crumb['url']. '" >';
	$output.= $crumb['text'];
	$output.= '</a>';

	return $output;
}
//remove shop in breadcrumb
//Write By AmirJ
/* Remove "Products" from Yoast SEO breadcrumbs in WooCommerce */
add_filter( 'wpseo_breadcrumb_links', function( $links ) {

    // Check if we're on a WooCommerce page
    // Checks if key 'ptarchive' is set
    //Write By AmirJ
    // Checks if 'product' is the value of the key 'ptarchive', in position 1 in the links array
    if ( is_woocommerce() && isset( $links[1]['ptarchive'] ) && 'product' === $links[1]['ptarchive'] ) {

        // True, remove 'Products' archive from breadcrumb links
        unset( $links[1] );

    // Added by me to remove it on product single pages - doesn't work!
    //Write By AmirJ
    } elseif ( is_product() && isset( $links[1]['ptarchive'] ) && 'product' === $links[1]['ptarchive'] ) {

        // True, remove 'Products' archive from breadcrumb links
        unset( $links[1] );


    }

    // Rebase array keys
    //Write By AmirJ
    $links = array_values( $links );

    // Return modified array
    return $links;

});





</pre>
