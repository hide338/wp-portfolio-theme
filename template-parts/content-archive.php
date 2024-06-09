<article id="post-<?php the_ID(); ?>" <?php post_class('archive-post'); ?>>

  <a href="<?php the_permalink(); ?>" class="p-archive__link">

    <div class="p-archive__item">

      <?php if (has_post_thumbnail()) : ?>
      <div class="p-archive__thumbnail">
        <?php the_post_thumbnail(); ?>
      </div><!-- .archive-post__thumbnail -->
      <?php endif; ?>

      <div class="p-archive__text">

        <div class="p-archive__header">
          <h2 class="p-archive__title"><?php the_title(); ?></h2>
        </div><!-- .archive-post__header -->

        <div class="p-archive__content">
          <?php the_excerpt(); ?>
        </div>
        <!-- .archive-post__content -->

      </div>
      <!-- /.archive__text -->

    </div>
    <!-- /.archive-post__item -->

  </a>

</article><!-- .archive-post -->