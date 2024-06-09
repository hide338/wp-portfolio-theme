<?php
get_header();
?>

  <main class="l-site-main">

    <section id="archive" class="p-archive">
      <div class="l-container">

        <?php if ( have_posts() ) : ?>
    
          <header class="p-archive__header">
            <?php
              $title = get_the_archive_title().'一覧';
            ?>
            <h1 class="p-archive__title"><?= $title ?></h1>
          </header>
          <!-- .archive__header -->
    
          <div class="p-archive__body">
  
            <section class="p-archive__grid">

              <!-- <div class="p-archive__grid-item"> -->

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

              <!-- </div> -->
      
            </section>
  
          </div>
  
    
          <?php
          the_posts_navigation();
    
        else :
    
          get_template_part( 'template-parts/content', 'none' );
    
        endif;
        ?>
        <!-- WP-PageNavi -->
        <footer class="p-archive__footer">
          <?php wp_pagenavi(); ?>
        </footer>

      </div>

    </section>
  
  </main><!-- #main -->

<?php
get_footer();
