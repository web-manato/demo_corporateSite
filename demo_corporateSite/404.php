<?php get_header(); ?>

<main>

    <!-- ページキービジュアル -->
    <section class="ly_pageKv bl_pageKv">
        <div class="bl_cont_inner">
            <h2 class="bl_pageKv_ttl bl_pageKv_ttl__404">
                404エラー
            </h2>
        </div>
    </section>


    <!-- 404メッセージ -->
    <section class="ly_cont">
        <div class="bl_cont_inner">

            <!-- テキスト -->
            <p class="bl_404_txt">
                申し訳ございません。お探しのページは見つかりませんでした。<br class="un_lb">
                入力したアドレスが間違っているか、ページが移動・削除された可能性があります
            </p>

            <div class="ly_btn ly_btn__contact">
                <a href="<?php echo esc_url(home_url()); ?>" class="el_btn">トップへ</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>