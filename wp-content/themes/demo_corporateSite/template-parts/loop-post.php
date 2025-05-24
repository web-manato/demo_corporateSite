<li class="bl_post_card js-fadeIn">
    <!-- 投稿メタ情報 -->
    <div class="bl_post_card_info">
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
        <div class="el_category<?php echo $category_classes; ?>"><?php the_category(','); ?></div>
        <time class="bl_post_card_info_date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
    </div>
    <a href="<?php the_permalink(); ?>">
        <figure>
            <!-- サムネイル -->
            <div class="bl_post_card_thumbnailWrapper">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(array(344, 199), array('class'=>'thumbnail_image')); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/post_thumbnail.jpg" alt="サムネイル">
                <?php endif; ?>
            </div>
            <!-- タイトル -->
            <figcaption class="bl_post_card_ttlWrapper">
                <h2 class="bl_post_card_ttl"><?php the_title(); ?></h2>
            </figcaption>
        </figure>
    </a>
</li>