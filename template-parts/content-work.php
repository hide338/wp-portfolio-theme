
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

<div class="p-archive__item">

  <div class="c-card">

    <a href="<?php the_permalink(); ?>" class="c-card__link">
      <div class="c-card__img">
        <img class="" src="<?= $img[0]; ?>" alt="">
      </div>
      <div class="c-card__body">
        <h3 class="c-card__title"><?php the_title() ?></h3>
        <?php if ($categories) : ?>
          <div class="c-card__tag">
            <?php foreach ($categories as $category) : ?>
              <span class="c-card__tag-item"><?= esc_html($category->name); ?></span>
              <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </a>

  </div>


</div>



