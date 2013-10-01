<?php
/* Thumbnail support and custom image size for posts */
add_theme_support( 'post-thumbnails' );
add_image_size( 'jb_custom', 370, 490 );

function get_product_category() {
    /**
	 * Get product category for purpose of
	 * assigning active id for header nav bar
     */
    global $post;
    $category = get_the_category($post->ID); 
    $category_name =  $category[0]->cat_name;

    return $category_name;
}
?>