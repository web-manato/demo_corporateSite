
<?php
// 抜粋の文字数を変更
function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length' , 'custom_excerpt_length' , 999 );

// 文末の[...]を変更
function new_excerpt_more( $more ) {
    return '...' ;
    }
    add_filter( 'excerpt_more' , 'new_excerpt_more' );
?>