<?php
    //関数の定義
    function demo_theme_setup(){
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
    }
    //定義した関数をアクションフックafter_setup_themeに実行させる
    add_action('after_setup_theme','demo_theme_setup')
?>

<?php
    //外部リソースに関する条件分岐やheadに出力するときの関数を定義

    function demo_enqueue_scripts(){
    //ページごとのタイトルを出力する 【サイトのタイトル - ページのタイトル】
    add_theme_support('title-tag');

    //googleフォントの読み込み
    wp_enqueue_style('googlefonts','https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap',array(),null);
    //テーマ独自のcssの読み込み
    wp_enqueue_style('demo-theme-reset-css',get_template_directory_uri().'/assets/sass/reset.css',array(),'1.0.0');
    wp_enqueue_style('demo-theme-css',get_template_directory_uri().'/assets/css/styles.css',array(),'1.0.0');
    //jQueryの読み込み
    wp_enqueue_script('jquery');
    }
    //定義した関数をアクションフックwp_enqueue_scriptsに実行させる
    add_action('wp_enqueue_scripts','demo_enqueue_scripts');
?>

<?php

// JavaScriptの読み込み
function demo_module_script() {
    wp_enqueue_script(
        'demo-theme-js',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/js/main.js'), // バージョン管理
        true
    );
}
add_action('wp_enqueue_scripts', 'demo_module_script');

// 生成されたscriptタグにtype=module属性をつける
function add_type_attribute($tag, $handle, $src) {
    // 対象のスクリプトハンドルでない場合は元のタグを返す
    if ('demo-theme-js' !== $handle) {
        return $tag;
    }

    // type="module"属性を持つscriptタグを生成
    // WordPressのバージョン管理パラメータも保持
    $version = '';
    if (strpos($src, '?ver=') !== false) {
        $version = '?ver=' . explode('?ver=', $src)[1];
    }

    $tag = '<script type="module" src="' . esc_url($src) . '"></script>' . "\n";

    return $tag;
}
add_filter('script_loader_tag', 'add_type_attribute', 10, 3);

?>

<?php
// アーカイブの有効化
function post_has_archive($args, $post_type){
    if ('post' == $post_type) {
    $args['rewrite'] = true;
    $args['has_archive'] = 'archive';
    $args['label'] = '投稿';
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);
?>

<?php
/* the_archive_title 余計な文字を削除 */
add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_tag()) {
        $title = single_tag_title('',false);
    } elseif (is_tax()) {
        $title = single_term_title('',false);
    } elseif (is_post_type_archive() ){
        $title = post_type_archive_title('',false);
    } elseif (is_date()) {
        $title = get_the_time('Y年n月');
    } elseif (is_search()) {
        $title = '検索結果：'.esc_html( get_search_query(false) );
    } elseif (is_404()) {
        $title = '「404」ページが見つかりません';
    } else {

    }
    return $title;
});
?>

<?php
    // カテゴリーの説明のpタグ削除
    remove_filter ('term_description', 'wpautop');

?>

<?php
    // Contact Form 7で自動挿入されるPタグ、brタグを削除
    add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
    function wpcf7_autop_return_false() {
    return false;
}
?>
