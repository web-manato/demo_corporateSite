<?php get_header(); ?>

    <main>

        <!-- ページキービジュアル -->
        <section class="ly_pageKv bl_pageKv">
            <div class="bl_cont_inner">
                <h2 class="bl_pageKv_ttl">
                    『<?php the_archive_title(); ?>』の記事一覧
                </h2>
            </div>
        </section>


        <!-- 投稿ループ -->
        <section class="ly_cont">
            <div class="bl_cont_inner">
                <ul class="bl_postGroup" id="post-<?php the_ID();?>" <?php post_class(); ?>>
                    <!-- ポストのループ関数 -->
                    <?php if(have_posts()): ?>
                    <?php
                        while(have_posts()):
                            the_post();
                    ?>
                        <?php get_template_part('template-parts/loop','post'); ?>
                    <!-- ポストのループ関数 -->
                    <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- ページネーション -->
            <div class="ly_pagiNation">
                <?php get_template_part('template-parts/pagination'); ?>
            </div>
        </section>

    </main>

<?php get_footer(); ?>