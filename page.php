<?php
get_header();
?>

	<main id="primary" class="site-main single">

    <div class="l-container">

      <article class="p-article">
  
        <?php while ( have_posts() ) : the_post(); ?>
  
          <!-- 記事のタイトルを表示 -->
          <div class="p-article__header">

            <p class="p-article__meta"><?php the_time('Y/m/d'); ?> (更新日:<?php the_modified_date('Y/m/d'); ?>)</p>

            <h1 class="p-article__title"><?php the_title(); ?></h1>


          </div>
    
          <!-- サムネイル画像を表示させる -->
          <div class="p-article__thumbnail">
          <?php if(has_post_thumbnail()): ?>
            <img class="p-article__thumbnail--img" src="<?php the_post_thumbnail_url('full'); ?>" alt="サムネイル画像">
          <?php endif; ?>
          </div>
    
          <!-- 記事のボディー -->
          <div class="p-article__body">

            <!-- 記事の本文を表示させる -->
            <?php the_content(); ?>
    
          </div>
        <?php endwhile; ?>
  
      </article>

    </div>
    <!-- /.content-area -->



	</main>

<?php
get_footer();