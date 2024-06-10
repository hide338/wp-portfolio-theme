<?
/*
Template Name: front-page
*/
?>
<?php get_header(); ?>
  <div class="p-loader js-loader">
    <div class="p-loader__item"></div>
  </div>
  <main class="l-site-main">
    <section class="p-fv l-container">
      <div id="particles-js" class="p-fv__particle"></div>
      <div class="p-fv__wrapper l-container">
        <div class="p-fv__text">
          <h2 class="p-fv__title js-load"><span>視力2.0エンジニア</span><br><span><span class="u-text-blue">"中原 利秀"</span>を<br class="u-sp-active">知ってもらうための</span><br><span>ポートフォリオサイト<br class="u-sp-active">です！</span></h2>
          <p class="p-fv__description js-load">バックエンドからフロントエンドまでの<br class="-sp-active">開発経験を活かし<br>幅広い知識でWeb制作業務をサポートします。</p>
          <div class="p-fv__btn js-load">
            <a href="<?php echo esc_url( get_the_permalink( 2173 ) ); ?>" class="p-fv__link c-cta">お問い合わせ</a>
          </div>
        </div>
          <!-- <div class="p-fv__img">
            <img src="<?= get_template_directory_uri(); ?>/img/fv-image.png" alt="メインイメージ">
          </div> -->
      </div>
    </section>

    <section id="service" class="l-section u-bg-none">
      <div class="l-container l-section__wrapper">
        <div class="l-section__header">
          <h2 class="l-section__title l-section__title--ja u-text-blue">サービス</h2>
          <p class="l-section__title l-section__title--en u-text-blue">SERVICE</p>
        </div>
        <div class="l-section__body p-service__grid">
        <?php
          $args = [
            'post_type' => 'service',
            'order' => 'ASC',
            'orderby' => 'menu_order' 
          ];
          $service_posts = new WP_Query( $args );
          $service_count = 1;
        ?>
        <?php if ( $service_posts->have_posts()): ?>
          <?php while( $service_posts->have_posts() ): $service_posts->the_post(); ?>
            <?php
              if (has_post_thumbnail()):
                $id = get_post_thumbnail_id();
                $img = wp_get_attachment_image_src($id,'full');
              else:
                $img = array(get_template_directory_uri() . '/img/post-bg.jpg');
              endif;
            ?>
              <div class="p-service-item js-scroll">
                <div class="p-service-item__flex">
                  <span class="p-service-item__number"><?= sprintf('%02d', $service_count); ?></span>
                  <div class="p-service-item__img-area">
                    <span class="c-bg-extend js-scroll">
                      <span class="c-bg-appear">
                        <img class="" src="<?= $img[0]; ?>" alt="" loading="lazy">
                      </span>
                    </span>
                  </div>
                  <div class="p-service-item__text-area js-scroll">
                    <div class="p-service-item__text">
                      <h3 class="p-service-item__title"><?php the_title(); ?></h3>
                      <p class="p-service-item__description"><?= get_the_excerpt(); ?></p>
                      <!-- <div class="p-service-item__btn">
                        <p class="p-service-item__btn--copy">料金・納品までの流れをチェック</p>
                        <a href="<?php echo get_the_permalink(); ?>" class="c-btn"><span>詳しく見る</span></a>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
            <?php $service_count += 1; endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </section>
  
    <section id="work" class="l-section">
      <div class="l-container l-section__wrapper">
        <span class="l-section__sepa-title">WORKS</span>
        <div class="l-section__header">
          <h2 class="l-section__title l-section__title--ja">実績</h2>
          <p class="l-section__title l-section__title--en">WORKS</p>
        </div>
        <div class="l-section__body">
          <div class="p-work">
            <div class="p-work__grid">
                <?php
                  $args = [
                    'post_type' => 'work',
                    'posts_per_page' => 9,
                  ];
                  $service_posts = new WP_Query( $args );
                ?>
                <?php if ( $service_posts->have_posts()): ?>
                  <?php while( $service_posts->have_posts() ): $service_posts->the_post(); ?>
                    <?php
                      // サムネイル画像を取得
                      if (has_post_thumbnail()):
                        $id = get_post_thumbnail_id();
                        $img = wp_get_attachment_image_src($id,'full');
                      else:
                        $img = array(get_template_directory_uri() . '/img/post-bg.jpg');
                      endif;
                      // カテゴリーを取得
                      $categories = get_the_terms(get_the_ID(), 'work-cat');
                    ?>
                    <div class="p-work__grid-item js-scroll">
                      <div class="c-card">
                        <a class="c-card__link" href="<?php the_permalink(); ?>">
                          <div class="c-card__img">
                            <img src="<?= $img[0]; ?>" alt="" loading="lazy">
                          </div>
                          <div class="c-card__text">
                          <?php if ($categories) : ?>
                            <h3 class="c-card__title"><?php the_title() ?></h3>
                            <div class="c-card__tag">
                              <?php foreach ($categories as $category) : ?>
                              <span class="c-card__tag-item"><?= esc_html($category->name); ?></span>
                              <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            <!-- /.card__btn -->
                          </div>
                        </a>
                      </div>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="p-work__btn">
          <a class="c-btn" href="<?= esc_url(get_post_type_archive_link('work')); ?>"><span>実績一覧へ</span></a>
        </div>
      </div>
    </section>
  
    <section id="skill" class="l-section">
      <div class="l-container l-section__wrapper">
        <span class="l-section__sepa-title">SKILL</span>
        <div class="l-section__header">
          <h2 class="l-section__title l-section__title--ja">スキル</h2>
          <p class="l-section__title l-section__title--en">SKILL</p>
        </div>
        <div class="l-section__body">
          <div class="p-skill">
            <div class="p-skill__grid">
              <?php
                $args = [
                  'post_type' => 'skill',
                  'order' => 'ASC',
                  'orderby' => 'menu_order' 
                ];
                $skill_posts = new WP_Query( $args );
              ?>
              <?php if ( $skill_posts->have_posts()): ?>
                <?php while( $skill_posts->have_posts() ): $skill_posts->the_post(); ?>
                  <?php
                    // ポストIDの取得
                    $post_id = get_the_ID();
                    // スキルにセットされているカスタムフィールドの値を取得
                    $experience = get_post_meta($post_id, 'experience', true); // 経験年数
                    $level = get_post_meta($post_id, 'level', true); // レベル
                    $fws = get_post_meta($post_id, 'fw', false); // フレームワーク
                    // スキルページの本文を取得
                    $content = get_the_content();
                    $content = strip_tags( strip_shortcodes( $content ) );
                    // サムネイル画像を取得
                    if (has_post_thumbnail()):
                      $id = get_post_thumbnail_id();
                      $img = wp_get_attachment_image_src($id,'full');
                    else:
                      $img = array(get_template_directory_uri() . '/img/post-bg.jpg');
                    endif;
                  ?>
                  <div class="p-skill-card js-scroll">
                    <div class="p-skill-card__img">
                      <img src="<?= esc_url($img[0]); ?>" alt="" loading="lazy">
                    </div>
                    <h3 class="p-skill-card__title"><?php the_title(); ?></h3>
                    <p class="p-skill-card__year">経験年数<br><?= $experience ?>年</p>
                    <p class="p-skill-card__level">
                      技術レベル<br>
                      <?php for ($i=0; $i < $level; $i++): ?>
                        <i class="fa-solid fa-star p-skill-card__star"></i>
                      <?php endfor; ?>
                    </p>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="price" class="l-section">
      <div class="l-container l-section__wrapper">
        <span class="l-section__sepa-title">PRICE</span>
        <div class="l-section__header">
          <h2 class="l-section__title l-section__title--ja">料金目安</h2>
          <p class="l-section__title l-section__title--en">PRICE</p>
        </div>
        <div class="l-section__body">
          <div class="p-price">
            <div class="p-price__header">
              <h3 class="p-price__title js-price-tab is-active" data-target="coding">コーディング</h3>
              <h3 class="p-price__title js-price-tab" data-target="web">Web制作</h3>
            </div>
            <div class="p-price__body">
              <!-- コーディング料金表 -->
              <div class="p-coding js-price-table is-active" data-target="coding">
                <table class="p-coding__table">
                  <thead>
                    <tr>
                      <th>項目</th>
                      <th>料金</th>
                      <th>備考</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>TOPページ/LP</th>
                      <td>¥15,000〜</td>
                      <td>8,00pxを超える場合は、1,000pxごとに+¥1,000の追加料金がかかります。<br>※pxはPCレイアウトで計算します。</td>
                    </tr>
                    <tr>
                      <th>下層ページ</th>
                      <td>¥8,000〜</td>
                      <td>1ページあたりの金額です。<br>TOPページ同様に8,000pxを超える場合には追加料金が発生します。</td>
                    </tr>
                    <tr>
                      <th>フォーム設置</th>
                      <td>¥10,000〜</td>
                      <td>フォーム1カ所あたりの金額です。</td>
                    </tr>
                    <tr>
                      <th>アニメーション対応</th>
                      <td>¥3,000〜</td>
                      <td>アニメーション1つあたりの金額です。<br>複雑なアニメーションの場合には追加料金が発生する場合があります。<br>スムーススクロールは無料で対応いたします。</td>
                    </tr>
                    <tr>
                      <th>WordPress対応</th>
                      <td>ご相談ください</td>
                      <td>WordPress対応も柔軟に対応いたします。<br>ノーコードでの対応も可能ですので、ご相談ください。</td>
                    </tr>
                  </tbody>
                </table>
              </div>
  
              <!-- Web制作料金表 -->
              <div class="p-web js-price-table" data-target="web">
                <ul class="p-web__list">
                  <li class="p-web__item">
                    <div class="p-web__header">
                      <h4 class="p-web__title">ライト</h4>
                      <p class="p-web__text">WordPress</p>
                      <p class="p-web__text">テンプレート</p>
                    </div>
                    <div class="p-web__price">
                      <p class="p-web__price-title">費用</p>
                      <p class="p-web__price-price">12万円~</p>
                      <p class="p-web__price-title">月額保守費用</p>
                      <p class="p-web__price-price">2万円</p>
                    </div>
                    <div class="p-web__point">
                      <p class="p-web__point-title">POINT</p>
                      <p class="p-web__point-text">費用を抑えて<br>まずは自社サイトを持ちたい方向け</p>
                    </div>
                    <div class="p-web__production">
                      <p class="p-web__production-title">制作内容</p>
                      <ul class="p-web__production-list">
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>基本料金</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>トップページ</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>下層3ページ</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>お問い合わせフォーム設置</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>レスポンシブ対応(スマホ対応)</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>WordPress初期設定</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>内部SEO対策</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>セキュリティ対策</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>操作マニュアルお渡し</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>サーバー設置サポート</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>ドメイン取得サポート</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>SSL対応サポート</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>保守管理</li>
                      </ul>
                    </div>
                  </li>
                  <li class="p-web__item">
                    <div class="p-web__header">
                      <h4 class="p-web__title">セミオーダー</h4>
                      <p class="p-web__text">WordPress</p>
                      <p class="p-web__text">テンプレート</p>
                    </div>
                    <div class="p-web__price">
                      <p class="p-web__price-title">費用</p>
                      <p class="p-web__price-price">25万円~</p>
                      <p class="p-web__price-title">月額保守費用</p>
                      <p class="p-web__price-price">2万円</p>
                    </div>
                    <div class="p-web__point">
                      <p class="p-web__point-title">POINT</p>
                      <p class="p-web__point-text">一部カスタマイズを加えて<br>Web集客を見据えたサイトを<br>構築したい方向け</p>
                    </div>
                    <div class="p-web__production">
                      <p class="p-web__production-title">制作内容</p>
                      <ul class="p-web__production-list">
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>基本料金</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>トップページ</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>下層8ページ</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>投稿機能実装(お知らせ、ブログ)</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>お問い合わせフォーム設置</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>レスポンシブ対応(スマホ対応)</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>WordPress初期設定</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>内部SEO対策</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>セキュリティ対策</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>操作マニュアルお渡し</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>サーバー設置サポート</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>ドメイン取得サポート</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>SSL対応サポート</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>保守管理</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>MEO対策（Googleマイビジネス設置）</li>
                      </ul>
                    </div>
                  </li>
                  <li class="p-web__item">
                    <div class="p-web__header">
                      <h4 class="p-web__title">フルオーダー</h4>
                      <p class="p-web__text">WordPress</p>
                      <p class="p-web__text">オリジナルデザイン</p>
                    </div>
                    <div class="p-web__price">
                      <p class="p-web__price-title">費用</p>
                      <p class="p-web__price-price">50万円~</p>
                      <p class="p-web__price-title">月額保守費用</p>
                      <p class="p-web__price-price">2万円</p>
                    </div>
                    <div class="p-web__point">
                      <p class="p-web__point-title">POINT</p>
                      <p class="p-web__point-text">テンプレートではなく<br>オリジナルデザインのサイトが欲しい方向け</p>
                    </div>
                    <div class="p-web__production">
                      <p class="p-web__production-title">制作内容</p>
                      <ul class="p-web__production-list">
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>基本料金</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>トップページ</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>下層10ページ</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>投稿機能実装(お知らせ、ブログ)</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>お問い合わせフォーム設置</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>レスポンシブ対応(スマホ対応)</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>WordPress初期設定</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>内部SEO対策</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>セキュリティ対策</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>操作マニュアルお渡し</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>サーバー設置サポート</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>ドメイン取得サポート</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>SSL対応サポート</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>保守管理</li>
                        <li class="p-web__production-item"><i class="fa-regular fa-circle-check"></i>MEO対策(Googleマイビジネス設置)</li>
                      </ul>
                    </div>
                  </li>
                </ul>
                <div class="p-web__footer">
                  <ul class="p-web__footer-list">
                    <li class="p-web__footer-item">※基本料金には、ヒアリングやお打ち合わせ、企画・構成、動作確認作業などが含まれます。</li>
                    <li class="p-web__footer-item">※機能の追加やページ数の追加など、お客様のご要望に合わせて別途費用で対応いたします。</li>
                    <li class="p-web__footer-item">※上記プランでは、画像や文章はお客様にてご用意いただいております。文章等のサポートはご相談ください。</li>
                    <li class="p-web__footer-item">※ドメイン、サーバー料金は含まれておりません。契約のサポートはさせていただきますので、ホームページ制作が初めての場合もご安心下さい。</li>
                    <li class="p-web__footer-item">※料金・内容等は予告なく変更・改定となる場合がございますので、あらかじめご了承ください。</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="flow" class="l-section">
      <div class="l-container l-section__wrapper">
        <span class="l-section__sepa-title">FLOW</span>
        <div class="l-section__header">
          <h2 class="l-section__title l-section__title--ja">納品までの流れ</h2>
          <p class="l-section__title l-section__title--en">FLOW</p>
        </div>
        <div class="l-section__body">
          <?php
          $args = [
            'post_type' => 'flow',
            'order' => 'ASC',
            'orderby' => 'menu_order' 
          ];
          $flow_posts = new WP_Query( $args );
          $flow_count = 1;
          ?>
          <div class="p-flow">
            <ul class="p-flow__list">
              <?php if ( $flow_posts->have_posts()): ?>
                <?php while( $flow_posts->have_posts() ): $flow_posts->the_post(); ?>
                  <?php
                    if (has_post_thumbnail()):
                      $id = get_post_thumbnail_id();
                      $img = wp_get_attachment_image_src($id,'full');
                    else:
                      $img = array(get_template_directory_uri() . '/img/post-bg.jpg');
                    endif;
                  ?>
                  <li class="p-flow__item js-scroll">
                    <p class="p-flow__icon">STEP&nbsp;<?= $flow_count; ?></p>
                    <dl class="p-flow__data-list">
                      <dt class="p-flow__data-title"><?php the_title(); ?></dt>
                      <dd class="p-flow__data-text"><?php the_content(); ?></dd>
                    </dl>
                  </li>
                  <?php $flow_count += 1; ?>
                <?php endwhile; ?>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section id="faq" class="l-section">
      <div class="l-container l-section__wrapper">
        <span class="l-section__sepa-title">FAQ</span>
        <div class="l-section__header">
          <h2 class="l-section__title l-section__title--ja">よくある質問</h2>
          <p class="l-section__title l-section__title--en">FAQ</p>
        </div>
        
        <div class="l-section__body">
        <?php
          $args = [
            'post_type' => 'faq',
            'order' => 'ASC',
            'orderby' => 'menu_order' 
          ];
          $faq_posts = new WP_Query( $args );
          $faq_count = 1;
          ?>
          <div class="c-accordion">
            <ul class="c-accordion__list">
              <?php if ( $faq_posts->have_posts()): ?>
                <?php while( $faq_posts->have_posts() ): $faq_posts->the_post(); ?>
                  <?php
                    if (has_post_thumbnail()):
                      $id = get_post_thumbnail_id();
                      $img = wp_get_attachment_image_src($id,'full');
                    else:
                      $img = array(get_template_directory_uri() . '/img/post-bg.jpg');
                    endif;
                  ?>
                  <li class="c-accordion__item">
                    <div class="c-accordion__parent js-accordion" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                      <span>Q</span>
                      <p itemprop="name"><?php the_title(); ?></p>
                    </div>
                    <div class="c-accordion__child" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                      <span>A</span>
                      <p itemprop="text"><?php the_content(); ?></p>
                    </div>
                  </li>
                <?php endwhile; ?>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </section>
    
    <section id="profile" class="l-section">
      <div class="l-container l-section__wrapper">
        <span class="l-section__sepa-title">PROFILE</span>
        <div class="l-section__header">
          <h2 class="l-section__title l-section__title--ja">プロフィール</h2>
          <p class="l-section__title l-section__title--en">PROFILE</p>
        </div>
        <div class="l-section__body">
          <?php if ( is_home() || is_front_page() ) : ?>
            <?php
              $args = [
                'post_type' => 'page',
                'order' => 'ASC',
                'orderby' => 'menu_order' 
              ];
              $page_posts = new WP_Query( $args );
            ?>
            <?php if ( $page_posts->have_posts()): ?>
              <?php while( $page_posts->have_posts() ): $page_posts->the_post(); ?>
                <?php
                  // サムネイル画像を取得
                  if (has_post_thumbnail()):
                    $id = get_post_thumbnail_id();
                    $img = wp_get_attachment_image_src($id,'full');
                  else:
                    $img = array(get_template_directory_uri() . '/img/post-bg.jpg');
                  endif;
                ?>
                <?php if (get_the_ID() === 8): ?>
                  <div class="p-profile">
                    <div class="p-profile__text">
                      <p><?php the_content(); ?></p>
                    </div>
                  </div>
                <?php endif; ?>
              <?php endwhile; ?>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
    </section>
  
    <section id="contact" class="l-section">
      <div class="l-container">
        <span class="l-section__sepa-title">CONTACT</span>
        <div class="l-section__header">
          <h2 class="l-section__title l-section__title--ja">お問い合わせ</h2>
          <p class="l-section__title l-section__title--en">CONTACT</p>
        </div>
        <?php if ( is_home() || is_front_page() ) : ?>
          <div class="l-section__body">
            <div class="p-contact">
              <ul class="p-contact__list p-contact__flex">
                <li class="p-contact__item">

                  <div class="p-contact__btn">
                    <a class="c-btn c-btn--orange" href="<?php echo esc_url( get_the_permalink( 2173 ) ); ?>">
                      <span>お問い合わせ</span>
                    </a>
                  </div>
                </li>
                <li class="p-contact__item">
                  <div class="p-contact__btn">
                    <a class="c-btn c-btn--dark" href="https://x.com/toshihideN1">
                      <span>X(旧:Twitter)</span>
                    </a>
                  </div>
                </li>
              </ul>
            </div>
            <div class="p-contact__text">
              <p>お問い合わせフォームもしくはX(旧:Twitter)のDMどちらからも、お問い合わせ可能です。</p>
              <ul class="p-contact__text-list">
                <li>『話だけ聞いてみたい』</li>
                <li>『お見積もりを出してほしい』</li>
                <li>『お仕事の依頼をしたい』</li>
                <li>『Web制作の相談がしたい』</li>
              </ul>
              <p>など、お気軽にお問い合わせください！</p>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </section>
  </main>
<?php get_footer(); ?>
