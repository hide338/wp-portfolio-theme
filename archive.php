<?php
get_header();
?>

  <main class="site-main">

    <section id="archive" class="content-area archive">

      <?php if ( have_posts() ) : ?>
  
        <header class="archive__header">
          <?php
            $title = get_the_archive_title().'一覧';
          ?>
          <h1 class="archive__title"><?= $title ?></h1>
        </header>
        <!-- .archive__header -->
  
        <div class="archive__body">

          <section class="archive-posts">
          <?php
            while ( have_posts() ) :
              the_post();

              if ( get_post_type() === 'work' ) {
                get_template_part( 'template-parts/content', get_post_type() );
              } else {
                get_template_part( 'template-parts/content', 'archive' );
              }
              
              
            endwhile;
          ?>
    
          </section>

        </div>

  
        <?php
        the_posts_navigation();
  
      else :
  
        get_template_part( 'template-parts/content', 'none' );
  
      endif;
      ?>
      <!-- WP-PageNavi -->
      <footer class="archive__footer">
        <?php wp_pagenavi(); ?>
      </footer>

    </section>
  
  </main><!-- #main -->

<?php
get_footer();
