<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <!-- GSAP -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <!-- WordPressの管理バーと被らないようにする -->
    <?php if( is_user_logged_in() ) : ?>
        <style type="text/css">
        .ly_header {
        margin-top: 46px;
        }
        @media(min-width:768px){
            .ly_header {
            margin-top: 32px;
            }
        }
        </style>
    <?php endif; ?>

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="ly_header bl_header">
        <div class="bl_header_inner">
            <div class="bl_header_group">
                <!-- ヘッダーロゴ -->
                <h1 class="bl_header_logo">
                    <a href="<?php echo esc_url(home_url()); ?>">
                        <picture>
                            <source media="(max-width: 1080px)" srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/sp_header_logo.png">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo.png" alt="武者への道">
                        </picture>
                    </a>
                </h1>
                <div class="bl_header_logoGroup">
                    <a href="#">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/twitter_logo.png" alt="Twitter">
                    </a>
                    <a href="#">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/facebook_logo.png" alt="Facebook">
                    </a>
                </div>
            </div>
        </div>

        <!-- spナビゲーション -->
        <nav class="bl_header_nav">
            <div class="bl_header_nav_inner">
                <ul class="bl_header_nav_list">
                    <?php
                    // 表示したいカテゴリーIDを配列で指定
                    $category_ids = array(3, 2, 5, 6, 4);
                    $category_count = count($category_ids);

                    foreach ($category_ids as $index => $cat_id) {
                        $category = get_category($cat_id);
                        if ($category && !is_wp_error($category)) {
                            echo '<li class="bl_header_nav_listItem">';
                            echo '<a href="' . esc_url(get_category_link($cat_id)) . '">' . esc_html($category->name) . '</a>';
                            echo '</li>';

                            // 最後の要素以外は区切り線を表示
                            if ($index < $category_count - 1) {
                                echo '<li class="bl_header_nav_list_line"></li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </header>