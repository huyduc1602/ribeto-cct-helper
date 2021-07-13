<?php
function query_product(){
    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
    );
    $query = new WP_Query($args);
    $posts = $query->posts;
    $datas = [];
    if( !empty( $posts ) ) {
        foreach ($posts as $post) {
            $datas[$post->ID] = $post->post_title;
        }
    }
    return $datas;
}
add_filter( 'woocommerce_products_admin_list_table_filters', 'remove_products_admin_list_table_filters', 10, 1 );
function remove_products_admin_list_table_filters( $filters ){
    // Remove "Product type" dropdown filter
    if( isset($filters['product_type']))
        unset($filters['product_type']);

    // Remove "Product stock status" dropdown filter
    if( isset($filters['stock_status']))
        unset($filters['stock_status']);

    return $filters;
}

add_filter('manage_product_posts_columns', 'misha_hide_product_tags_column', 999 );

function misha_hide_product_tags_column( $product_columns ) {
    unset( $product_columns['product_tag'] );
    unset( $product_columns['featured']);
    unset( $product_columns['price']);
    return $product_columns;
}
