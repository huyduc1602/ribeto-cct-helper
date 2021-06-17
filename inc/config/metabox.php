<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 10/29/2020
 * Time: 11:27 AM
 */



CSF::createMetabox(CCT_PRODUCT_OPTIONS, array(
    'title'        => esc_html__('Custom Product Options', 'cct-helper'),
    'post_type'    => 'product',
    'data_type' => 'unserialize',
    'priority' => 'low',
    'context' => 'normal',
) );
CSF::createSection(CCT_PRODUCT_OPTIONS, array(
    'title'  => esc_html__('Product Detail', 'cct-helper'),
    'fields' => array(

        array(
            'id'      => 'link-demo',
            'type'    => 'text',
            'title'   => esc_html__('Link Demo', 'cct-helper'),
            'default' => '#',
        ),
    ),


));
CSF::createSection(CCT_PRODUCT_OPTIONS, array(
    'title'  => esc_html__('Product Document', 'cct-helper'),
    'fields' => array(

        array(
            'id'      => 'link-detail-document',
            'type'    => 'text',
            'title'   => esc_html__('Link Detail Document', 'cct-helper'),
            'default' => '#',
        ),
        array(
            'id'      => 'link-video-tutorials',
            'type'    => 'text',
            'title'   => esc_html__('Link Video Tutorials', 'cct-helper'),
            'default' => '#',
        ),
    ),
));

