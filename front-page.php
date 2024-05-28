<?
/*
Template Name: front-page
*/
?>
<?php get_header(); ?>
  <main class="site-main">
    <section class="c-section">
      <div class="p-fv">
        <div id="particles-js" class="p-fv__particle"></div>
        <div class="p-fv__wrapper">
          <div class="p-fv__flex p-fv__inner">
            <div class="p-fv__text">
              <h2 class="p-fv__title"><span>コーディング</span><br><span>Web制作</span><br><span>ECサイト構築</span></h2>
              <p class="p-fv__description">バックエンドからフロントエンドまで経験した<br>幅広い知識で、本当に必要なホームページを<br>素早く構築いたします。</p>
              <div class="p-fv__btn">
                <a href="<?php echo esc_url( get_the_permalink( 2173 ) ); ?>" class="p-fv__link">お問い合わせ</a>
              </div>
            </div>
            <div class="p-fv__img">
              <img src="<?= get_template_directory_uri(); ?>/img/fv-image.png" alt="メインイメージ">
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="wave"></div> -->
    </section>
  
    <section id="service" class="section snap-start container">
      <div class="section__header">
        <h2 class="section__title section__title--ja">サービス</h2>
        <p class="section__title section__title--en">SERVICE</p>
      </div>
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
          <div class="section__body service-post">
            <div class="service-post__wrapper service-post__grid">
              <span class="service-post__number"><?= sprintf('%02d', $service_count); ?></span>
              <div class="service-post__img js__slide-in">
                <img class="service-post__img-slide" src="<?= $img[0]; ?>" alt="" loading="lazy">
              </div>
              <div class="service-post__text js__slide-in">
                <div class="service-post__text-slide">
                  <h3 class="service-post__title"><?php the_title(); ?></h3>
                  <p class="service-post__description"><?= get_the_excerpt(); ?></p>
                  <div class="service-post__btn">
                    <p class="service-post__btn--copy">料金・納品までの流れをチェック</p>
                    <a href="<?php echo get_the_permalink(); ?>" class="service-post__btn--link"><span>詳しく見る</span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php $service_count += 1; endwhile; ?>
      <?php endif; ?>
    </section>
  
    <div id="work" class="snap-start section--bg">
      <section class="container section section__border-title section__border-title--work">
        <div class="section__header">
          <h2 class="section__title section__title--ja">実績</h2>
          <p class="section__title section__title--en">WORKS</p>
        </div>
        <div class="section__body section__body--work">
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
            <div class="work-post card js__rotate work-post__rotate">
              <div class="card__img">
                <a class="card__link" href="<?php the_permalink(); ?>">
                  <img class="object-cover" src="<?= $img[0]; ?>" alt="" loading="lazy">
                </a>
              </div>
              <div class="card__body">
                <?php if ($categories) : ?>
                <div class="card__tag">
                  <?php foreach ($categories as $category) : ?>
                    <a href="<?= esc_url(get_category_link($category->term_id)); ?>" class="tag"><?= esc_html($category->name); ?></a>
                  <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <a class="card__link" href="<?php the_permalink(); ?>">
                  <h3 class="card__title"><?php the_title() ?></h3>
                </a>
                <div class="card__btn">
                  <a href="<?php the_permalink(); ?>" class="card__link">詳しく見る</a>
                  <!-- /.card__link -->
                </div>
                <!-- /.card__btn -->
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
        </div>
        <div class="work__link">
          <a href="<?= esc_url(get_post_type_archive_link('work')); ?>" class="work__btn"><span>実績一覧へ</span></a>
        </div>
      </section>
    </div>
  
    <section id="skill" class="snap-start container section section__border-title section__border-title--skill">
      <div class="section__header">
        <h2 class="section__title section__title--ja">スキル</h2>
        <p class="section__title section__title--en">SKILL</p>
      </div>
      <div class="section__body section__body--skill">
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
            <div class="skill-post js__slide-in skill-post__slide">
              <div class="skill-post__header">
                <img src="<?= esc_url($img[0]); ?>" alt="" class="skill-post__img" loading="lazy">
                <h3 class="skill-post__title"><?php the_title(); ?></h3>
              </div>
              <div class="skill-post__body">
                <p class="skill-post__item">経験年数：<?= $experience ?>年</p>
                <p class="skill-post__item skill-post__level">
                  技術レベル：
                  <?php for ($i=0; $i < $level; $i++): ?>
                    <i class="fa-solid fa-star skill-post__level--star"></i>
                  <?php endfor; ?>
                </p>
                <p class="skill-post__item"><?= $content; ?></p>
                <?php foreach ($fws as $key => $value): ?>
                  <?php if($value): ?>
                    <p class="skill-post__item skill-post__fw">フレームワーク：
                    <?php foreach ($value as $key => $fw): ?>
                      <img class="" src="<?= get_template_directory_uri() . '/img/' . $value[$key] . '.png' ?>" alt="" loading="lazy">
                    <?php endforeach; ?>
                    </p>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
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
