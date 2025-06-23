<?php get_header(); ?>

    <!-- キービジュアル -->
    <section class="ly_top_kv bl_contBg_kv">
        <div class="bl_cont_inner bl_cont_inner__kv">

            <!-- ポスト -->
            <?php
                // 特定の投稿IDを指定（ランダムなIDを設定）
                $post_id = 38;

                // 特定の投稿を取得
                $specific_post = get_post($post_id);

                // 投稿が存在するかチェック
                if ($specific_post) {
                    // グローバル$postを一時的に保存
                    global $post;
                    $original_post = $post;

                    // $postを特定の投稿に設定
                    $post = $specific_post;
                    setup_postdata($post);
                    ?>

                    <a href="<?php the_permalink(); ?>" class="bl_top_kv_postLink">
                        <figure class="bl_top_kv_post">
                            <!-- サムネイル -->
                            <div class="bl_top_kv_post_thumbnailWrapper">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', array('class' => 'thumbnail_image')); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/post_thumbnail.jpg" alt="サムネイル">
                                <?php endif; ?>
                            </div>

                            <!-- ボディ部分 -->
                            <figcaption class="bl_top_kv_post_body">
                                <!-- カテゴリー -->
                                <?php
                                // カテゴリー情報を取得
                                $categories = get_the_category();
                                $category_classes = '';
                                $category_name = '';
                                
                                // カテゴリーが存在する場合、スラッグをクラス名として追加し、最初のカテゴリー名を取得
                                if (!empty($categories)) {
                                    $category_classes = ' el_category--' . $categories[0]->slug;
                                    $category_name = esc_html($categories[0]->name);
                                }
                                ?>
                                <span class="el_category<?php echo $category_classes; ?>">
                                    <?php echo $category_name; ?>
                                </span>
                                <h2 class="bl_top_kv_post_ttl"><?php the_title(); ?></h2>
                                <time class="bl_top_kv_post_date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
                            </figcaption>
                        </figure>
                    </a>

                    <?php
                    // 元の$postに戻す
                    $post = $original_post;
                    wp_reset_postdata();
                } else {
                    // 投稿が見つからない場合のエラーハンドリング
                    echo '<p>指定された投稿が見つかりません。</p>';
                }
                ?>

            <!-- キャラクター画像 -->
            <div class="bl_top_kv_character_imgWrapper">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/top_kv_character.png" alt="">
            </div>

            <!-- 木の枝装飾画像 -->
            <div class="bl_top_kv_decoImg_wrapper" aria-hidden="true">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/top_kv_decoImg.png" alt="">
            </div>
        </div>
    </section>


    <!-- 投稿 -->
    <section class="ly_cont">
        <div class="bl_cont_inner">
            <ul class="bl_postGroup" id="post-<?php the_ID();?>" <?php post_class(); ?>>
            <?php
                // ランダム順で投稿を取得するクエリ
                $random_posts = new WP_Query(array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 9, // 全ての投稿を取得（必要に応じて数値を変更）
                    'orderby' => 'rand'
                ));
                ?>

                <!-- ポストのループ関数 -->
                <?php if($random_posts->have_posts()): ?>
                <?php
                    while($random_posts->have_posts()):
                        $random_posts->the_post();
                ?>
                    <?php get_template_part('template-parts/loop','post'); ?>
                <!-- ポストのループ関数 -->
                <?php endwhile; ?>
                <?php endif; ?>

                <?php
                // クエリをリセット
                wp_reset_postdata();
            ?>
            </ul>
        </div>

        <!-- ページネーション -->
        <div class="ly_pagiNation">
            <?php get_template_part('template-parts/pagination'); ?>
        </div>
    </section>

<?php get_footer(); ?>