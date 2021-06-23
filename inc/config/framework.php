<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 10/29/2020
 * Time: 11:27 AM
 */

CSF::createOptions(CCT_OPTIONS, array(
    'framework_title' => esc_html__('Site Options', 'cct-helper'),
    'menu_title' => esc_html__('Theme Options', 'cct-helper'),
    'menu_slug' => 'cct-options',
));


CSF::createSection(CCT_OPTIONS, [
    'title' => esc_html__('Header CCT', 'cct-helper'),
    'icon' => 'fa fa-bars',
    'id' => 'fields_header',
    'fields' => [
        [
            'id' => 'cct_logo_white',
            'type' => 'media',
            'title' => esc_html__('Logo White Header', 'cct-helper'),
        ],
        [
            'id' => 'cct_logo_dark',
            'type' => 'media',
            'title' => esc_html__('Logo Dark Header', 'cct-helper'),
        ],
        [
            'id' => 'cct_logo_mobile',
            'type' => 'media',
            'title' => esc_html__('Logo Header Mobile', 'cct-helper'),
        ],
        [
            'id' => 'cct_logo_phone',
            'type' => 'media',
            'title' => esc_html__('Logo Dark Phone', 'cct-helper'),
        ],
        array(
            'id' => 'text_logo_phone',
            'type' => 'text',
            'title' => esc_html__('Text phone', 'cct-helper'),
            'default' => '伊勢崎本店:',
        ),
        array(
            'id' => 'number_logo_phone',
            'type' => 'text',
            'title' => esc_html__('Number phone', 'cct-helper'),
            'default' => '0270-61-9899',
        ),
        [
            'id' => 'cct_logo_time',
            'type' => 'media',
            'title' => esc_html__('Logo Dark Time', 'cct-helper'),
        ],
        array(
            'id' => 'text_logo_time',
            'type' => 'text',
            'title' => esc_html__('Text time', 'cct-helper'),
            'default' => '受付時間:',
        ),
        array(
            'id' => 'number_logo_time',
            'type' => 'text',
            'title' => esc_html__('Number time', 'cct-helper'),
            'default' => '9:00～17:00(平日):',
        ),
        array(
            'id' => 'placeholder_search',
            'type' => 'text',
            'title' => esc_html__('Placeholder search', 'cct-helper'),
            'default' => '検索キーワードを入力',
        ),
        array(
            'id' => 'text_support_update',
            'type' => 'text',
            'title' => esc_html__('Text Support & Update', 'cct-helper'),
        ),
        array(
            'id' => 'placeholder_category',
            'type' => 'text',
            'title' => esc_html__('Placeholder category', 'cct-helper'),
            'default' => '全カテゴリー',
        ),

        [
            'id' => 'cct_icon_cate1',
            'type' => 'media',
            'title' => esc_html__('Icon cate 1', 'cct-helper'),
        ],
        array(
            'id' => 'icon-group-cate',
            'type' => 'group',
            'title' => 'Icon Category group',
            'fields' => array(
                [
                    'id' => 'cct_icon_cate',
                    'type' => 'media',
                    'title' => esc_html__('Icon category', 'cct-helper'),
                ],
            ),
        ),
        [
            'id' => 'cct_img_breadcrumb',
            'type' => 'media',
            'title' => esc_html__('Img breadcrumb', 'cct-helper'),
        ],
        [
            'id' => 'cct_header_sticky',
            'type' => 'switcher',
            'title' => 'Header fixed',
        ],
    ]
]);

CSF::createSection(CCT_OPTIONS, [
    'title' => esc_html__('Product Category CCT', 'cct-helper'),
    'icon' => 'fa fa-bars',
    'id' => 'fields_product_category',
    'fields' => [
        [
            'id' => 'cct_product_category_load_more',
            'type' => 'text',
            'title' => esc_html__('Load More', 'cct-helper'),
            'default' => esc_html__('Load More', 'cct-helper'),
        ],
    ]
]);
CSF::createSection(CCT_OPTIONS, array(
    'id' => 'content',
    'title' => esc_html__('Content', 'cct-helper'),
    'icon' => 'fa fa-home',
));
CSF::createSection(CCT_OPTIONS, array(
    'parent' => 'content',
    'title' => esc_html__('Content Single Product', 'cct-helper'),
    'fields' => array(
        array(
            'id' => 'cct_single_product_title_sidebar',
            'type' => 'text',
            'title' => esc_html__('Single Product Title Sidebar', 'cct-helper'),
        ),

        array(
            'id'        => 'cct_single_product_buy',
            'type'      => 'group',
            'title'     => esc_html__('Single Product Step Sidebar', 'cct-helper'),
            'fields'    => array(
                array(
                    'id'    => 'cct_single_product_title',
                    'type'  => 'text',
                    'title' => esc_html__('Single Product Title', 'cct-helper'),
                ),

                array(
                    'id'    => 'cct_single_product_image',
                    'type'  => 'media',
                    'title' => esc_html__('Single Product Image', 'cct-helper'),
                ),

                array(
                    'id'    => 'cct_single_product_description',
                    'type'  => 'wp_editor',
                    'title' => esc_html__('Single Product Description', 'cct-helper'),
                ),
            ),
        ),


//        array(
//            'id' => 'background-linkdemo-color',
//            'type' => 'color',
//            'title' => esc_html__('Background-linkdemo-color', 'cct-helper'),
//        ),
//        array(
//            'id' => 'background-linkdownload-color',
//            'type' => 'color',
//            'title' => esc_html__('Background-linkdownload-color', 'cct-helper'),
//        ),
//
//        array(
//            'id' => 'background-buynow-color',
//            'type' => 'color',
//            'title' => esc_html__('Background-buynow-color', 'cct-helper'),
//        ),
//        array(
//            'id' => 'background-purchasenow-color',
//            'type' => 'color',
//            'title' => esc_html__('Background-purchasenow-color', 'cct-helper'),
//        ),
//        array(
//            'id' => 'icon-detail-document',
//            'type' => 'icon',
//            'title' => esc_html__('Icon Detail Document', 'cct-helper'),
//        ),
//        array(
//            'id' => 'icon-tutorials',
//            'type' => 'icon',
//            'title' => esc_html__('Icon Tutorials', 'cct-helper'),
//        ),
//        array(
//            'id' => 'icon-support-update',
//            'type' => 'icon',
//            'title' => esc_html__('Icon Support & Update', 'cct-helper'),
//        ),
//        array(
//            'id' => 'link-support-update',
//            'type' => 'text',
//            'title' => esc_html__('Link Support & Update', 'cct-helper'),
//        ),
//        array(
//            'id' => 'text_detail_document',
//            'type' => 'text',
//            'title' => esc_html__('Text Detail Document', 'cct-helper'),
//        ),
//        array(
//            'id' => 'text_support_update',
//            'type' => 'text',
//            'title' => esc_html__('Text Support & Update', 'cct-helper'),
//        ),
//        array(
//            'id' => 'text_tutorials',
//            'type' => 'text',
//            'title' => esc_html__('Text Tutorials', 'cct-helper'),
//        ),
    ),
));
CSF::createSection(CCT_OPTIONS, [
    'title' => esc_html__('Footer CCT', 'cct-helper'),
    'icon' => 'fa fa-bars',
    'id' => 'fields_footer',
    'fields' => [
        [
            'id' => 'cct_footer_background',
            'type' => 'color',
            'title' => 'Background Main Footer',
        ],

        [
            'id' => 'cct_footer_title_col_1',
            'type' => 'text',
            'title' => esc_html__('Title Col 1', 'cct-helper'),
        ],
        [
            'id' => 'cct_footer_location',
            'type' => 'text',
            'title' => esc_html__('Location', 'cct-helper'),
        ],
        [
            'id' => 'cct_footer_location_de1',
            'type' => 'text',
            'title' => esc_html__('Location description 1', 'cct-helper'),
        ],
        [
            'id' => 'cct_footer_location_de2',
            'type' => 'text',
            'title' => esc_html__('Location description 2', 'cct-helper'),
        ],

        [
            'id' => 'cct_footer_phone',
            'type' => 'text',
            'title' => esc_html__('Phone', 'cct-helper'),
        ],

        [
            'id' => 'cct_footer_phone_de',
            'type' => 'text',
            'title' => esc_html__('Phone description', 'cct-helper'),
        ],

        [
            'id' => 'cct_footer_mail',
            'type' => 'text',
            'title' => esc_html__('Mail', 'cct-helper'),
        ],

        [
            'id' => 'cct_footer_mail_de',
            'type' => 'text',
            'title' => esc_html__('Mail description', 'cct-helper'),
        ],
        [
            'id' => 'cct_footer_follow_us',
            'type' => 'text',
            'title' => esc_html__('Follow Us', 'cct-helper'),
        ],
        array(
            'id' => 'cct_footer_icon_fb',
            'type' => 'icon',
            'title' => 'Icon Facebook',
        ),
        array(
            'id' => 'cct_footer_icon_tw',
            'type' => 'icon',
            'title' => 'Icon twitter',
        ),

        [
            'id' => 'cct_footer_title_col_2',
            'type' => 'text',
            'title' => esc_html__('Title Col 2', 'cct-helper'),
        ],
        [
            'id' => 'cct_footer_title_col_3',
            'type' => 'text',
            'title' => esc_html__('Title Col 3', 'cct-helper'),
        ],


        [
            'id' => 'cct_footer_title_col_4',
            'type' => 'text',
            'title' => esc_html__('Title Col 4', 'cct-helper'),
        ],
        array(
            'id' => 'opt-group-footer-col-4-info',
            'type' => 'group',
            'title' => 'Group link info',
            'fields' => array(
                array(
                    'id' => 'opt-link-footer',
                    'type' => 'link',
                    'title' => 'Link',
                ),
            ),
        ),

        [
            'id' => 'cct_logo_phone1',
            'type' => 'media',
            'title' => esc_html__('Logo phone 1', 'cct-helper'),
        ],
        [
            'id' => 'cct_logo_time1',
            'type' => 'media',
            'title' => esc_html__('Logo time 1', 'cct-helper'),
        ],

        [
            'id' => 'cct_logo_email1',
            'type' => 'media',
            'title' => esc_html__('Logo email 1', 'cct-helper'),
        ],

        array(
            'id' => 'text_title_mail1',
            'type' => 'text',
            'title' => esc_html__('Text title mail', 'cct-helper'),
        ),
        array(
            'id' => 'placeholder_mail1',
            'type' => 'text',
            'title' => esc_html__('Placeholder mail', 'cct-helper'),
        ),


        [
            'id' => 'cct_footer_select_menu_col_2',
            'type' => 'select',
            'title' => 'Userful Links',
            'placeholder' => 'Select menu',
            'options' => array(
                'primary' => 'Primary',
                'mobile-menu' => 'Mobile Menu',
                'footer-menu' => 'Footer Menu',
            ),
            'default' => 'footer-menu'
        ],
        [
            'id' => 'cct_footer_background_absolute',
            'type' => 'color',
            'title' => 'Background Absolute Footer',
        ],
        [
            'id' => 'cct_footer_absolute',
            'type' => 'wp_editor',
            'title' => esc_html__('Footer Absolute text', 'cct-helper'),
        ],
    ]
]);
CSF::createSection(CCT_OPTIONS, [
    'title' => esc_html__('Language', 'cct-helper'),
    'icon' => 'fa fa-bars',
    'id' => 'fields_language',
    'fields' => [
        [
            'id' => 'home_language',
            'type' => 'text',
            'title' => esc_html__('Home', 'cct-helper'),
            'default' => 'ホーム'
        ],
        [
            'id' => 'items_language',
            'type' => 'text',
            'title' => esc_html__('Items', 'cct-helper'),
            'default' => '商品の数'
        ],
        [
            'id' => 'dashboard_language',
            'type' => 'text',
            'title' => esc_html__('Dashboard', 'cct-helper'),
            'default' => 'ダッシュボード'
        ],
        [
            'id' => 'orders_language',
            'type' => 'text',
            'title' => esc_html__('Orders', 'cct-helper'),
            'default' => 'オーダー'
        ],
        [
            'id' => 'downloads_language',
            'type' => 'text',
            'title' => esc_html__('Downloads', 'cct-helper'),
            'default' => 'ダウンロード'
        ],
        [
            'id' => 'address_language',
            'type' => 'text',
            'title' => esc_html__('Address', 'cct-helper'),
            'default' => '住所'
        ],
        [
            'id' => 'account-details_language',
            'type' => 'text',
            'title' => esc_html__('Account details', 'cct-helper'),
            'default' => 'アカウントの詳細'
        ],
        [
            'id' => 'logout_language',
            'type' => 'text',
            'title' => esc_html__('Logout', 'cct-helper'),
            'default' => 'ログアウト'
        ],
        [
            'id' => 'hello_language',
            'type' => 'text',
            'title' => esc_html__('Hello', 'cct-helper'),
            'default' => '様、いつもご利用いただきありがとうございます。（admin_theme様ではない場合、ログアウトしてください）'
        ],
        [
            'id' => 'description_language',
            'type' => 'text',
            'title' => esc_html__('Description Dashboard', 'cct-helper'),
            'default' => 'ご注文履歴確認及び請求先管理、パスワード・アカウントの詳細情報の変更、はマイアカウントのダッシュボードからしていただきます。'
        ],
        [
            'id' => 'recent_orders_language',
            'type' => 'text',
            'title' => esc_html__('Recent Orders', 'cct-helper'),
            'default' => 'ご注文履歴'
        ],
        [
            'id' => 'billing_address_language',
            'type' => 'text',
            'title' => esc_html__('Billing address', 'cct-helper'),
            'default' => '請求先'
        ],
        [
            'id' => 'edit_info_language',
            'type' => 'text',
            'title' => esc_html__('Edit info', 'cct-helper'),
            'default' => 'パスワード・アカウントの詳細情報の変更'
        ],
        [
            'id' => 'first_name_language',
            'type' => 'text',
            'title' => esc_html__('First Name', 'cct-helper'),
            'default' => '名前'
        ],
        [
            'id' => 'last_name_language',
            'type' => 'text',
            'title' => esc_html__('Home', 'cct-helper'),
            'default' => '苗字'
        ],
        [
            'id' => 'display_name_language',
            'type' => 'text',
            'title' => esc_html__('Display name', 'cct-helper'),
            'default' => '表示名'
        ],
        [
            'id' => 'text_1_language',
            'type' => 'text',
            'title' => esc_html__('Text 1', 'cct-helper'),
            'default' => 'これは、アカウントセクションおよび口コミ・レビューのところに表示される。'
        ],
        [
            'id' => 'email_language',
            'type' => 'text',
            'title' => esc_html__('Email', 'cct-helper'),
            'default' => 'メールアドレス
'
        ],
        [
            'id' => 'password_change_language',
            'type' => 'text',
            'title' => esc_html__('Password change', 'cct-helper'),
            'default' => 'パスワード変更'
        ],
        [
            'id' => 'current_password_language',
            'type' => 'text',
            'title' => esc_html__('Current password', 'cct-helper'),
            'default' => '現在のパスワード'
        ],
        [
            'id' => 'new_password_language',
            'type' => 'text',
            'title' => esc_html__('New password', 'cct-helper'),
            'default' => '新しいパスワード'
        ],
        [
            'id' => 'confirm_new_password_language',
            'type' => 'text',
            'title' => esc_html__('Confirm new password', 'cct-helper'),
            'default' => '新しいパスワード確認'
        ],
        [
            'id' => 'save_change_language',
            'type' => 'text',
            'title' => esc_html__('Save change', 'cct-helper'),
            'default' => '保存'
        ],
        [
            'id' => 'blank_leave_language',
            'type' => 'text',
            'title' => esc_html__('Blank leave', 'cct-helper'),
            'default' => '変更しない場合は空白のままにししてください。'
        ],
        [
            'id' => 'username_email_language',
            'type' => 'text',
            'title' => esc_html__('Username or email address', 'cct-helper'),
            'default' => 'ユーザー名又はメールアドレス'
        ],
        [
            'id' => 'password_language',
            'type' => 'text',
            'title' => esc_html__('Password', 'cct-helper'),
            'default' => 'パスワード'
        ],
        [
            'id' => 'remember_me_language',
            'type' => 'text',
            'title' => esc_html__('Remember me', 'cct-helper'),
            'default' => 'ログイン情報を保持する'
        ],
        [
            'id' => 'lost_your_password_language',
            'type' => 'text',
            'title' => esc_html__('Lost your password', 'cct-helper'),
            'default' => 'パスワードを忘れた場合'
        ],
        [
            'id' => 'empty_cart_language',
            'type' => 'text',
            'title' => esc_html__('Empty Cart', 'cct-helper'),
            'default' => 'お客様のカートに商品はありません。'
        ],
        [
            'id' => 'order_no_language',
            'type' => 'text',
            'title' => esc_html__('Order no', 'cct-helper'),
            'default' => '注文番号'
        ],
        [
            'id' => 'date_language',
            'type' => 'text',
            'title' => esc_html__('Date', 'cct-helper'),
            'default' => '日付'
        ],
        [
            'id' => 'order_status_language',
            'type' => 'text',
            'title' => esc_html__('Order status', 'cct-helper'),
            'default' => '注文状況'
        ],
        [
            'id' => 'total_language',
            'type' => 'text',
            'title' => esc_html__('Total', 'cct-helper'),
            'default' => '合計'
        ],
        [
            'id' => 'actions_language',
            'type' => 'text',
            'title' => esc_html__('Actions', 'cct-helper'),
            'default' => 'アクション'
        ],
        [
            'id' => 'view_details_language',
            'type' => 'text',
            'title' => esc_html__('View details', 'cct-helper'),
            'default' => '詳細表示'
        ],
        [
            'id' => 'order_details_language',
            'type' => 'text',
            'title' => esc_html__('Order details', 'cct-helper'),
            'default' => '注文詳細'
        ],
        [
            'id' => 'product_name_language',
            'type' => 'text',
            'title' => esc_html__('Product name', 'cct-helper'),
            'default' => '商品名'
        ],
        [
            'id' => 'subtotal_language',
            'type' => 'text',
            'title' => esc_html__('Subtotal', 'cct-helper'),
            'default' => '小合計'
        ],
        [
            'id' => 'payment_method_language',
            'type' => 'text',
            'title' => esc_html__('Payment method', 'cct-helper'),
            'default' => '決済方法'
        ],
        [
            'id' => 'text_2_language',
            'type' => 'text',
            'title' => esc_html__('Text 2', 'cct-helper'),
            'default' => '2021年05月19日に発注されたご注文No.#2700 は処理中です。'
        ],
        array(
            'id' => 'opt-link-1000',
            'type' => 'link',
            'title' => 'Link kkkk',
        ),

    ]
]);