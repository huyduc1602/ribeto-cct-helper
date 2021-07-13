<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 10/29/2020
 * Time: 11:27 AM
 */

CSF::createMetabox(CCT_PRODUCT_OPTIONS, array(
    'title'        => esc_html__('商品データ', 'cct-helper'),
    'post_type'    => 'product',
    'data_type' => 'unserialize',
    'priority' => 'low',
    'context' => 'normal',
) );
CSF::createSection(CCT_PRODUCT_OPTIONS, array(
    'fields' => array(

        array(
            'id'      => '_regular_price',
            'type'    => 'text',
            'title'   => esc_html__('標準価格 ', 'cct-helper') .get_woocommerce_currency_symbol(),

        ),
        array(
            'id'      => '_sku',
            'type'    => 'text',
            'title'   => esc_html__('SKU', 'cct-helper'),

        ),
        array(
            'id'      => '_manage_stock',
            'type'    => 'checkbox',
            'title'   => esc_html__('在庫を管理しますか ?', 'cct-helper'),
            'label'   => esc_html__('商品単位での在庫管理を有効にする', 'cct-helper'),
            'default' => true // or false
        ),
        array(
            'id'      => '_stock',
            'type'    => 'number',
            'title'   => esc_html__('在庫数', 'cct-helper'),

        ),
    ),

));


