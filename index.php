<?php
/*
Template Name: Articles
*/
get_header();
?>
	<main id="main" class="site-main">
    <div class="container">
      <div class="wrapper">
        <div class="post-header">
          <h1 class="post__title">お知らせ一覧</h1>
        </div>
          <dl class="post-list__list">
          <?php 
            if (have_posts()): 
              while(have_posts()):
                the_post();
                $terms = get_the_terms($post->ID, 'category');
          ?>
            <div class="news-list__item">
              <dt class="news-list__item-date">
                <time datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time(get_option('date_format')); ?></time>
              </dt>
              <!-- /.news-list__item-date -->
              <dd class="news-list__item-label">
                <?php foreach ( $terms as $term ): ?>
                  <span class="news-list__item-category"><?php echo $term->name; ?></span>
                <?php endforeach; ?>
              </dd>
              <!-- /.news-list__item-label -->
              <dd class="news-list__item-text">
                <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
              </dd>
              <!-- /.news-list__item-title -->
            </div>
            <!-- /.news-list__item -->
            <hr>
            <?php endwhile; ?>
          </dl>
          <?php else: ?>
            <p>記事が見つかりませんでした</p>
          <?php endif; ?>
        <!-- PageNavi -->
        <div class="content-space">
          <?php wp_pagenavi(); ?>
        </div>
        <!-- /.content-space -->
      </div>
      <!-- /.wrapper -->
    </div>
    <!-- /.container -->

	</main><!-- #main -->

<?php
get_footer();