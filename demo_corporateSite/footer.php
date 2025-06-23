<!-- CTA -->
<section class="ly_cont bl_contBg_cta">
    <div class="bl_cont_inner bl_cont_inner__70 bl_cta">

        <!-- パソコン画像 -->
        <div class="bl_cta_imgWrapper">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/cta_img.png" alt="">
        </div>


        <!-- テキストグループ -->
        <div class="bl_cta_txtGroup">
            <!-- タイトル・ロゴ -->
            <h2 class="bl_cta_ttl_hidden">模写修行</h2>
            <div class="bl_cta_ttlLogo">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/cta_logo.png" alt="模写修行">
            </div>

            <!-- テキスト -->
            <p class="bl_cta_txt">駆け出しエンジニアのためのコーディング練習教材</p>

            <!-- ボタン -->
            <div class="ly_btn">
                <a href="#" class="el_btn el_btn__white">詳しくはこちら</a>
            </div>
        </div>
    </div>
</section>


<!-- フッター -->
<footer class="ly_footer bl_contBg_primaryLight">
    <div class="bl_footer_inner">

        <!-- ロゴ -->
        <div class="bl_footer_logo">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo.png" alt="模写修行">
        </div>

        <!-- テキスト -->
        <p class="bl_footer_txt">武者への道は駆け出しデザイナー・エンジニアを応援するメディアです。</p>

        <!-- pc時横並び -->
        <div class="bl_footer_under">

            <!-- フッターSNS -->
            <div class="bl_footer_logoGroup">
                <a href="#">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/twitter_logo.png" alt="Twitter">
                </a>
                <a href="#">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/facebook_logo.png" alt="Facebook">
                </a>
            </div>
            <!-- フッターナビゲーションメニュー -->
            <nav class="bl_footer_nav">
                <ul class="bl_footer_nav_list">
                    <li class="bl_footer_nav_listItem">
                        <a href="<?php echo esc_url(home_url()); ?>/?page_id=9">武者への道とは</a>
                    </li>
                    <li class="bl_footer_nav_list_line"></li>
                    <li class="bl_footer_nav_listItem">
                        <a href="#">会社概要</a>
                    </li>
                    <li class="bl_footer_nav_list_line"></li>
                    <li class="bl_footer_nav_listItem">
                        <a href="#">プライバシーポリシー</a>
                    </li>
                    <li class="bl_footer_nav_list_line"></li>
                    <li class="bl_footer_nav_listItem">
                        <a href="<?php echo esc_url(home_url()); ?>/?page_id=11">お問い合わせ</a>
                    </li>
                </ul>
            </nav>

        </div>

        <!-- 区切り線 -->
        <span class="bl_footer_line"></span>

        <!-- コピーライト -->
        <div class="bl_footer_copyRight_wrapper">
            <small class="bl_footer_copyRight">&copy;Road to MUSHA, inc.</small>
        </div>

    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>