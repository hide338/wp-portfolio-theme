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

    <section id="service" class="l-section">
      <div class="l-section__wrapper">
        <div class="l-section__header">
          <h2 class="l-section__title l-section__title--ja">サービス</h2>
          <p class="l-section__title l-section__title--en">SERVICE</p>
        </div>
        <div class="l-section__body l-section__grid">
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
              <div class="p-service">
                <!-- <div class="p-service__grid"> -->
                  <!-- <span class="p-service__number"><?= sprintf('%02d', $service_count); ?></span> -->
                <div class="p-service__img-area js-scroll">
                  <img class="" src="<?= $img[0]; ?>" alt="" loading="lazy">
                </div>
                <div class="p-service__text-area js-scroll">
                  <div class="p-service__text">
                    <h3 class="p-service__title"><?php the_title(); ?></h3>
                    <p class="p-service__description"><?= get_the_excerpt(); ?></p>
                    <!-- <div class="p-service__btn">
                      <p class="p-service__btn--copy">料金・納品までの流れをチェック</p>
                      <a href="<?php echo get_the_permalink(); ?>" class="c-btn"><span>詳しく見る</span></a>
                    </div> -->
                  </div>
                </div>
                <!-- </div> -->
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
        <span class="l-section__sepa-title u-position-right">SKILL</span>
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
                    <p class="p-skill-card__year">経験年数：<?= $experience ?>年</p>
                    <p class="p-skill-card__level">
                      技術レベル：
                      <?php for ($i=0; $i < $level; $i++): ?>
                        <i class="fa-solid fa-star p-skill-card__level--star"></i>
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
    
    <section id="profile" class="snap-start section--bg">
      <div class="container section section__border-title section__border-title--profile">
        <div class="section__header">
          <h2 class="section__title section__title--ja">プロフィール</h2>
          <p class="section__title section__title--en">PROFILE</p>
        </div>
        <div class="container section__body">
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
            <div class="profile">
              <!-- <div class="profile__img col-span-1">
                <img src="<?= esc_url($img); ?>" alt="" class="">
              </div> -->
              <div class="profile__text col-span-1">
                <p><?= $page_include; ?></p>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
  
    <section id="contact" class="snap-start container section section__border-title section__border-title--contact">
      <div class="section__header">
        <h2 class="section__title section__title--ja">お問い合わせ</h2>
        <p class="section__title section__title--en">CONTACT</p>
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
        <div class="section__body contact">
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
          <p class="contact__comment">
            お問い合わせは、メールもしくはX(旧:Twitter)のDMから、お問い合わせください。
          </p>
        </div>
      <?php endif; ?>
    </section>
  </main>
<?php get_footer(); ?>
