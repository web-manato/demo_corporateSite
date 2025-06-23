<?php get_header(); ?>

<main>
    <section class="ly_cont">
        <article class="bl_cont_inner">
            <!-- 投稿情報 -->
            <?php
            // カテゴリー情報を取得
            $categories = get_the_category();
            $category_classes = '';

            // カテゴリーが存在する場合、スラッグをクラス名として追加
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    $category_classes .= ' el_category--' . $category->slug;
                }
            }
            ?>
            <div class="bl_post_infoGroup">
                <div class="el_category<?php echo $category_classes; ?>"><?php the_category(','); ?></div>
                <time class="bl_post_info_date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
            </div>
            <!-- 投稿タイトル -->
            <h1 class="bl_post_ttl">
                <?php the_title(); ?>
            </h1>
            <!-- サムネイル -->
            <div class="bl_post_thumbnailWrapper">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(array(344, 199), array('class'=>'thumbnail_image')); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/post_thumbnail.jpg" alt="サムネイル">
                <?php endif; ?>
            </div>

            <!-- 投稿コンテンツ -->
            <div class="bl_post_cont">
                <?php the_content(); ?>
            </div>
        </article>

        <!-- バナー画像 -->
        <div class="bl_cont_inner">
            <a href="#">
                <picture class="bl_single_bannerWrapper">
                    <source media="(max-width: 1080px)" srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/sp_single_banner.png">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/pc_single_banner.png" alt="コーディング練習教材">
                </picture>
            </a>
        </div>
    </section>


    <!-- おすすめ記事 -->
    <section class="ly_cont">
        <div class="bl_cont_inner">

            <!-- おすすめ記事タイトル -->
            <div class="ly_single_relationTtl">
                <div class="bl_single_relationTtl_imgWrapper">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/moshashugyou_logo.png" alt="">
                </div>
                <h2 class="bl_single_relationTtl">
                    おすすめ記事
                </h2>
            </div>

            <!-- おすすめ記事ループ -->
            <ul class="bl_postGroup bl_postGroup__single" id="post-<?php the_ID();?>" <?php post_class(); ?>>
                <?php
                    // 現在の投稿IDを取得
                    $current_post_id = get_the_ID();

                    // 現在の投稿のカテゴリーを取得
                    $categories = get_the_category($current_post_id);

                    if (!empty($categories)) {
                        // カテゴリーIDの配列を作成
                        $category_ids = array();
                        foreach ($categories as $category) {
                            $category_ids[] = $category->term_id;
                        }

                        // WP_Queryの引数を設定
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 6,
                            'post__not_in' => array($current_post_id), // 現在の投稿を除外
                            'category__in' => $category_ids, // 同じカテゴリーの投稿を取得
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post_status' => 'publish'
                        );

                        // カスタムクエリを実行
                        $related_posts = new WP_Query($args);

                        if ($related_posts->have_posts()) : ?>
                                <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                                    <?php get_template_part('template-parts/loop', 'post'); ?>
                                <?php endwhile; ?>
                            <?php
                            // クエリをリセット
                            wp_reset_postdata();
                        endif;
                    }
                    ?>
            </ul>
        </div>
    </section>
</main>

<?php get_footer(); ?>