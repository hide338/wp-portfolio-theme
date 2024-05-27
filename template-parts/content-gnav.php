<?php
  if ( is_front_page() && is_home() ) {
    $menu_name = 'global_nav';
  } else {
    $menu_name = 'sub_nav';
  }
  $location = get_nav_menu_locations();
  $menu = wp_get_nav_menu_object($location[$menu_name]);
  $menu_items = wp_get_nav_menu_items($menu->term_id);
?>
<nav class="c-gnav">
  <ul class="c-gnav__list">
    <?php foreach($menu_items as $item): ?>
    <li class="c-gnav__item">
      <a class="c-gnav__link" href="<?= esc_attr($item->url) ?>"><?= esc_html($item->title) ?></a>
    </li>
    <?php endforeach; ?>
  </ul>
</nav><!-- #site-navigation -->

<!-- ハンバーガーメニュー -->
<div id="hamburger" class="c-hamburger js-hamburger">
  <span></span>
  <span></span>
  <span></span>
</div>

<!-- モバイルナビゲーション -->
<nav class="c-gnavSp">
  <div class="c-gnavSp__mask js-mask"></div>
  <ul class="c-gnavSp__list js-navList">
    <?php foreach($menu_items as $item): ?>
    <li class="c-gnavSp__item">
      <a class="c-gnavSp__link js-navLink" href="<?= esc_attr($item->url) ?>"><?= esc_html($item->title) ?></a>
    </li>
    <?php endforeach; ?>
  </ul>
</nav>