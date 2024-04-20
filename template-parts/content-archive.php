<article id="post-<?php the_ID(); ?>" <?php post_class('archive-post'); ?>>

  <a href="<?php the_permalink(); ?>" class="archive-post__link">

    <div class="archive-post__item">

      <?php if (has_post_thumbnail()) : ?>
      <div class="archive-post__thumbnail">
        <?php the_post_thumbnail(); ?>
      </div><!-- .archive-post__thumbnail -->
      <?php endif; ?>

      <div class="archive-post__text">

        <div class="archive-post__header">
          <h2 class="archive-post__title"><?php the_title(); ?></h2>
        </div><!-- .archive-post__header -->

        <div class="archive-post__content">
          <?php the_excerpt(); ?>
        </div>
        <!-- .archive-post__content -->

      </div>
      <!-- /.archive__text -->

    </div>
    <!-- /.archive-post__item -->

  </a>

</article><!-- .archive-post -->