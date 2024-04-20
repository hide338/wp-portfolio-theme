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
<nav class="gnav">
  <ul class="gnav__list">
    <?php foreach($menu_items as $item): ?>
    <li class="gnav__item">
      <a class="gnav__link" href="<?= esc_attr($item->url) ?>"><?= esc_html($item->title) ?></a>
    </li>
    <?php endforeach; ?>
  </ul>
</nav><!-- #site-navigation -->
<!-- モバイルナビゲーション -->
<nav class="sp-gnav">
  <button id="navbtn" type="button" class="sp-gnav__btn">
    <i id="bars" class="fa-solid fa-bars fa-2x"></i>
    <i id="xmark" class="fa-solid fa-x fa-2x hidden"></i>
  </button>
  <ul id="menu" class="sp-gnav__list translate-x-full">
    <?php foreach($menu_items as $item): ?>
    <li class="sp-gnav__item">
      <a class="sp-gnav__link" href="<?= esc_attr($item->url) ?>"><?= esc_html($item->title) ?></a>
    </li>
    <?php endforeach; ?>
  </ul>
</nav>