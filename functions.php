<?php
add_action('init', function() {
  add_theme_support('post-thumbnails');

  register_nav_menus([
    'global_nav' => 'グローバルナビゲーション',
    'sub_nav' => 'サブナビゲーション',
    'footer_nav' => 'フッターナビゲーション',
  ]);

  register_post_type('work', [
    'label' => '実績',
    'public' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-portfolio',
    'supports' => [
      'title',
      'editor',
      'thumbnail',
      'custom-fields',
      'excerpt',
      'author',
      'trackbacks',
      'comments',
      'revisions',
      'page-attributes'
    ],
    'hierarchical' => false,
    'has_archive' => true,
    'show_in_rest'=> true,
  ]);
  register_taxonomy(
    'work-cat',
    'work',
    [
      'label' => '実績カテゴリー',
      'hierarchical' => true,
      'public' => true,
      'show_in_rest' => true,
    ]
  );
  register_taxonomy(
    'work-tag',
    'work',
    [
      'label' => '実績タグ',
      'hierarchical' => false,
      'public' => true,
      'show_in_rest' => true,
      'update_count_callback' => '_update_post_term_count',
      ]
    );

  register_post_type('service', [
    'label' => 'サービス',
    'public' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-heart',
    'supports' => [
      'title',
      'editor',
      'thumbnail',
      'custom-fields',
      'excerpt',
      'author',
      'trackbacks',
      'comments',
      'revisions',
      'page-attributes'
    ],
    'hierarchical' => true,
    'has_archive' => true,
    'show_in_rest'=> true,
  ]);
  register_taxonomy(
    'service-cat',
    'service',
    [
      'label' => 'サービスカテゴリー',
      'hierarchical' => true,
      'public' => true,
      'show_in_rest' => true,
    ]
  );
  register_taxonomy(
    'service-tag',
    'service',
    [
      'label' => 'サービスタグ',
      'hierarchical' => false,
      'public' => true,
      'show_in_rest' => true,
      'update_count_callback' => '_update_post_term_count',
      ]
    );
    
    register_post_type('skill', [
      'label' => 'スキル',
      'public' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-desktop',
    'supports' => [
      'title',
      'editor',
      'thumbnail',
      'custom-fields',
      'excerpt',
      'author',
      'trackbacks',
      'comments',
      'revisions',
      'page-attributes'
    ],
    'hierarchical' => true,
    'has_archive' => true,
    'show_in_rest'=> true,
  ]);
  register_taxonomy(
    'skill-cat',
    'skill',
    [
      'label' => 'スキルカテゴリー',
      'hierarchical' => true,
      'public' => true,
      'show_in_rest' => true,
    ]
  );
});

/* スタイルシート・JSファイル読み込み設定 */
function add_link_files() {
  // CSSの読み込み
  wp_enqueue_style( 'style', get_stylesheet_directory_uri().'/style.css' );
  wp_enqueue_style( 'front-page', get_stylesheet_directory_uri().'/front-page.css', array('style'));
  wp_enqueue_style( 'archive', get_stylesheet_directory_uri().'/archive.css', array('style'));
  wp_enqueue_style( 'article', get_stylesheet_directory_uri().'/article.css', array('style'));

  // JavaScriptの読み込み
  // wp_enqueue_script( 'my-script', get_template_directory_uri().'/js/script.js', array('jquery'), false, true );
}
function add_style() {
    // 共通
    add_link_files();
    wp_enqueue_style( 'style' );

    // トップページ 
    if ( is_page( array('front') ) ) {
      wp_enqueue_style( 'front-page' );
    }
    // アーカイブページ
    elseif ( is_archive() ) {
      wp_enqueue_style( 'archive' );
    }
    elseif ( is_single() || is_page() ) {
      wp_enqueue_style( 'article' );
    }
    // // 固定ページ
    // elseif ( is_page( ) ) {
    //   wp_enqueue_style( 'page-style' );
    // }
    // // 投稿ページ
    // elseif ( is_post( ) ) {
    //   wp_enqueue_style( 'post-style' );
    // }
}
add_action( 'wp_print_styles', 'add_link_files' );

/* the_archive_title 余計な文字を削除 */
add_filter( 'get_the_archive_title', function ($title) {
  if (is_category()) {
      $title = single_cat_title('',false);
  } elseif (is_tag()) {
      $title = single_tag_title('',false);
} elseif (is_tax()) {
    $title = single_term_title('',false);
} elseif (is_post_type_archive() ){
  $title = post_type_archive_title('',false);
} elseif (is_date()) {
    $title = get_the_time('Y年n月');
} elseif (is_search()) {
    $title = '検索結果：'.esc_html( get_search_query(false) );
} elseif (is_404()) {
    $title = '「404」ページが見つかりません';
} else {

}
  return $title;
});

if ( ! function_exists( 'post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

/**
 * パンくずリスト作成
 */
function breadcrumb() {
  ?>
    <div class="breadcrumb">
      <ol class="breadcrumb__list" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a itemprop="item" href="<?php echo esc_url(home_url()); ?>">
            <span itemprop="name">HOME</span>
          </a>
          <meta itemprop="position" content="1">
        </li>

        <!-- 固定ページの子ページの場合 -->
        <?php if(is_page() && $post->post_parent): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_page_link($post->post_parent); ?>" href="<?php echo get_page_link($post->post_parent); ?>">
              <span itemprop="name"><?php echo get_the_title($post->post_parent); ?></span>
            </a>
            <meta itemprop="position" content="2">
          </li>

          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php echo get_the_title(); ?></span>
            <meta itemprop="position" content="3">
          </li>

        <!-- 固定ページの場合 -->
        <?php elseif(is_page()): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php echo get_the_title(); ?></span>
            <meta itemprop="position" content="2">
          </li>

        <!-- 年別アーカイブページの場合 -->
        <?php elseif(is_year()): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>">
              <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
            </a>
            <meta itemprop="position" content="2">
          </li>

          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php echo get_query_var('year'); ?>年</span>
            <meta itemprop="position" content="3">
          </li>

        <!-- 月別アーカイブページの場合 -->
        <?php elseif(is_month()): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>">
              <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
            </a>
            <meta itemprop="position" content="2">
          </li>

          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_year_link(get_query_var("year")); ?>?post_type=<?php echo esc_html(get_post_type_object(get_post_type())->name); ?>" href="<?php echo get_year_link(get_query_var("year")); ?>?post_type=<?php echo esc_html(get_post_type_object(get_post_type())->name); ?>">
              <span itemprop="name"><?php echo get_query_var('year');?>年</span>
            </a>
            <meta itemprop="position" content="3">
          </li>

          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php echo get_query_var('monthnum'); ?>月</span>
            <meta itemprop="position" content="4">
          </li>

        <!-- タクソノミーのアーカイブページの場合 -->
        <?php elseif(is_tax()): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>">
              <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
            </a>
            <meta itemprop="position" content="2">
          </li>

          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php single_term_title(); ?></span>
            <meta itemprop="position" content="3">
          </li>

        <!-- カスタム投稿のアーカイブページの場合 -->
        <?php elseif(is_post_type_archive()): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php post_type_archive_title(); ?></span>
            <meta itemprop="position" content="2">
          </li>

        <!-- 記事ページの場合 -->
        <?php elseif(is_single()): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>">
              <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
            </a>
            <meta itemprop="position" content="2">
          </li>

          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php single_post_title(); ?></span>
            <meta itemprop="position" content="3">
          </li>

        <!--  404エラーページの場合 -->
        <?php elseif(is_404()): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name">404</span>
            <meta itemprop="position" content="2">
          </li>

        <?php endif; ?>
      </ol>
    </div>
  <?php
}


/**
 * Pager
 */
function pager( $link = 'articles') {
  ?>
    <!-- Pager -->
    <div class="pager">
      <?php 
        $prev_post = get_previous_post();
        if (!empty($prev_post)):
          $url = get_permalink($prev_post->ID);
          $title = get_the_title($prev_post->ID);
      ?>
        <div class="pager__item post-pager__item--prev">
          <a href="<?php echo esc_url($url); ?>" class="pager__link">前の記事へ</a>
          <!-- /.post-pager__link -->
        </div>
        <!-- /.pager__item post-pager__item--prev -->
      <?php endif; ?>
      <div class="pager__item pager__item--return">
        <?php if ( $link === 'articles' ): ?>
            <a href="<?php echo esc_url( home_url() ); ?>/articles/" class="pager__link">一覧へ戻る</a>
          <?php else: ?>
            <a href="<?= esc_url(get_post_type_archive_link($link)); ?>" class="pager__link">一覧へ戻る</a>
        <?php endif; ?>
      </div>
      <!-- /.pager__return -->
      <?php 
        $next_post = get_next_post();
        if (!empty($next_post)):
          $url = get_permalink($next_post->ID);
          $title = get_the_title($next_post->ID);
      ?>
        <div class="pager__item pager__item--next">
          <a href="<?php echo esc_url($url); ?>" class="pager__link">次の記事へ</a>
          <!-- /.post-pager__link -->
        </div>
        <!-- /.pager__item post-pager__item--next -->
      <?php endif; ?>
    </div>
    <!-- /.pager -->
  <?php
}