<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website:http://ogp.me/ns/website#">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

  <!-- OGPなど -->
  <title><?php bloginfo('name') ?></title>

  <!-- fontawesome -->
  <script src="https://kit.fontawesome.com/33b766862d.js" crossorigin="anonymous"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Protest+Guerrilla&family=Roboto:wght@400;700&family=Rubik+Dirt&display=swap" rel="stylesheet">

  <!-- スタイルシートの読み込み -->
  <!-- <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/style.css"> -->


  <!-- ファーストビューの画像を先に読み込む設定 -->
  <link rel="preload" as="image" href="<?= get_template_directory_uri(); ?>/img/hero.jpg">
  <link rel="preload" as="image" href="<?= get_template_directory_uri(); ?>/img/sp-hero.png">
  <link rel="preload" as="image" href="<?= get_template_directory_uri(); ?>/img/profile-imge.png">
  
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header id="header" class="header">
    <div class="header__inner container">
      <div class="branding">
        <?php
          the_custom_logo();
          if ( is_front_page() && is_home() ) :
        ?>
          <h1 class="branding__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php
          else :
        ?>
          <p class="branding__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php
          endif;
        ?>
      </div>
      <!-- .branding -->

      <?php get_template_part( 'template-parts/content', 'gnav' ); ?>
    </div>
  </header><!-- #masthead -->
  <div class="site-grid">
    
