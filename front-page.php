<?
/*
Template Name: front-page
*/
?>
<?php get_header(); ?>
  <main class="site-main">
    <section class="p-fv">
      <div id="particles-js" class="p-fv__particle"></div>
      <div class="p-fv__wrapper">
        <div class="p-fv__text">
          <h2 class="p-fv__title"><span>視力2.0エンジニア</span><br><span><span class="u-text-blue">"中原 利秀"</span>を<br class="u-sp-active">知ってもらうための</span><br><span>ポートフォリオサイト<br class="u-sp-active">です！</span></h2>
          <p class="p-fv__description">バックエンドからフロントエンドまでの開発経験を活かし<br>幅広い知識でWeb制作業務をサポートします。</p>
          <div class="p-fv__btn">
            <a href="<?php echo esc_url( get_the_permalink( 2173 ) ); ?>" class="p-fv__link c-cta">お問い合わせ</a>
          </div>
        </div>
          <!-- <div class="p-fv__img">
            <img src="<?= get_template_directory_uri(); ?>/img/fv-image.png" alt="メインイメージ">
          </div> -->
      </div>
    </section>

    <section id="service" class="l-section u-bg-none">
      <div class="l-section__wrapper">
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
              <div class="p-service-item">
                <div class="p-service-item__flex">
                  <!-- <span class="p-service-item__number"><?= sprintf('%02d', $service_count); ?></span> -->
                <div class="p-service-item__img-area js-scroll">
                  <img class="" src="<?= $img[0]; ?>" alt="" loading="lazy">
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
      <div class="l-section__wrapper">
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
                    <div class="p-work__grid-item">
                      <a class="p-work__link" href="<?php the_permalink(); ?>">
                        <div class="p-work__img-area">
                          <img src="<?= $img[0]; ?>" alt="" loading="lazy">
                        </div>
                        <div class="p-work__text-area">
                        <?php if ($categories) : ?>
                          <h3 class="p-work__title"><?php the_title() ?></h3>
                          <div class="p-work__tag">
                            <?php foreach ($categories as $category) : ?>
                            <span><?= esc_html($category->name); ?></span>
                            <?php endforeach; ?>
                          </div>
                          <?php endif; ?>
                          <!-- /.card__btn -->
                        </div>
                      </a>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="work__link">
          <a href="<?= esc_url(get_post_type_archive_link('work')); ?>" class="work__btn"><span>実績一覧へ</span></a>
        </div>
      </div>
    </section>
  
    <section id="skill" class="l-section">
      <div class="l-section__wrapper">
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
                  <div class="p-skill-card">
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

    <section class="l-section">
      <div class="l-section__wrapper">
        <span class="l-section__sepa-title">PRICE</span>
        <div class="l-section__header">
          <h2 class="l-section__title section__title--ja">料金目安</h2>
          <p class="l-section__title section__title--en">PRICE</p>
        </div>
        <div class="l-section__body">
          <div class="p-price">
            <div class="p-price__title-area">
              <h3 class="p-price__title">コーディング</h3>
              <h3 class="p-price__title">Web制作</h3>
            </div>
            <div class="p-coding">
              <table class="p-coding__table">
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
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="l-section">
      <div class="l-section__wrapper">
        <span class="l-section__sepa-title">FLOW</span>
        <div class="l-section__header">
          <h2 class="l-section__title section__title--ja">納品までの流れ</h2>
          <p class="l-section__title section__title--en">FLOW</p>
        </div>
        <div class="l-section__body">
          <div class="p-flow flow_design07">
            <ul class="p-flow__list flow07">
              <li>
                <p class="icon07">STEP&nbsp;1</p>
                <dl>
                  <dt>お申し込み</dt>
                  <dd>SEOコンテンツ無料相談フォームから調査内容を記入いただき送信をお願いします。</dd>
                </dl>
              </li>

              <li>
                <p class="icon07">STEP&nbsp;2</p>
                <dl>
                  <dt>調査</dt>
                  <dd>調査結果をお伝えするため、事前に日程調整のご連絡を差し上げます。</dd>
                </dl>
              </li>

              <li>
                <p class="icon07">STEP&nbsp;3</p>
                <dl>
                  <dt>結果報告</dt>
                  <dd>お約束した日時にzoomにて調査結果をお伝えします。</dd>
                </dl>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="l-section">
      <div class="l-section__wrapper">
        <span class="l-section__sepa-title">FAQ</span>
        <div class="l-section__header">
          <h2 class="l-section__title section__title--ja">よくある質問</h2>
          <p class="l-section__title section__title--en">FAQ</p>
        </div>
        <div class="l-section__body">

        </div>
      </div>
    </section>
    
    <section id="profile" class="l-section">
      <div class="l-section__wrapper">
        <span class="l-section__sepa-title">PROFILE</span>
        <div class="l-section__header">
          <h2 class="l-section__title section__title--ja">プロフィール</h2>
          <p class="l-section__title section__title--en">PROFILE</p>
        </div>
        <div class="l-section__body">
        <?php if ( is_home() || is_front_page() ) : ?>
          <?php
            $page_id = 8;//ページIDを指定
            $page = get_post($page_id, 'OBJECT', 'raw'); //指定のページIDから情報を取得
            $page_include = apply_filters( 'the_content',$page->post_content); //ページの本文をフィルターフックで整形
            // サムネイル画像を取得
            if (has_post_thumbnail()):
              $img = get_the_post_thumbnail_url($page_id);
            else:
              $img = array(get_template_directory_uri() . '/img/post-bg.jpg');
            endif;
          ?>
            <div class="p-profile">
              <!-- <div class="profile__img col-span-1">
                <img src="<?= esc_url($img); ?>" alt="" class="">
              </div> -->
              <div class="p-profile__text">
                <p><?= $page_include; ?></p>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
  
    <section id="contact" class="l-section">
      <span class="l-section__sepa-title">CONTACT</span>
      <div class="l-section__header">
        <h2 class="l-section__title l-section__title--ja">お問い合わせ</h2>
        <p class="l-section__title l-section__title--en">CONTACT</p>
      </div>
      <?php if ( is_home() || is_front_page() ) : ?>
        <?php
          $page_id = 2173;//ページIDを指定
          $page = get_post($page_id, 'OBJECT', 'raw'); //指定のページIDから情報を取得
          $page_include = apply_filters( 'the_content',$page->post_content); //ページの本文をフィルターフックで整形
          // サムネイル画像を取得
          if (has_post_thumbnail()):
            $img = get_the_post_thumbnail_url($page_id);
          else:
            $img = array(get_template_directory_uri() . '/img/post-bg.jpg');
          endif;
        ?>
        <div class="l-section__body">
          <div class="p-contact">
            <ul class="contact__list">
              <li class="contact__item">
                <a href="<?php echo esc_url( get_the_permalink( 2173 ) ); ?>">
                  <img src="<?= get_template_directory_uri(); ?>/img/mail.png" alt="">
                </a>
              </li>
              <li class="contact__item">
                <a href="https://twitter.com/hide64980862">
                  <img src="<?= get_template_directory_uri(); ?>/img/twitter-x.png" alt="">
                </a>
              </li>
            </ul>
          </div>
          <p class="contact__comment">
            お問い合わせは、メールもしくはX(旧:Twitter)のDMから、お問い合わせください。
          </p>
        </div>
      <?php endif; ?>
    </section>
  </main>
<?php get_footer(); ?>
