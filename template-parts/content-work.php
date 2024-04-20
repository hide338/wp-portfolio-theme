
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

<div class="work-post card">

  <div class="card__img">
    <a href="<?php the_permalink(); ?>" class="card__link">
      <img class="" src="<?= $img[0]; ?>" alt="">
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
    
    <a href="<?php the_permalink(); ?>" class="card__link">
      <h3 class="card__title"><?php the_title() ?></h3>
    </a>

    <div class="card__btn">
      <a href="<?php the_permalink(); ?>" class="card__link">詳しく見る</a>
    </div>

  </div>
</div>



