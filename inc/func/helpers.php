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