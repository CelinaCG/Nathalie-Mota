<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class('site'); ?>>
<div class="container">
    <header class="site__header">
        <div class="logo" id="logo">
        <a href="<?php echo home_url('/'); ?>" rel="home"><img src="<?php echo get_theme_mod('montheme_logo'); ?>" alt="logo"></a>
        </div>
       
        <nav id="nav-items" role="navigation" aria-label="<?php _e('Menu principal', 'text-domain'); ?>">
            <?php wp_nav_menu( array(
                'theme_location' => 'main',
                'container' => 'ul', // éviter d'avoir une div autour
                'menu_class' => 'site__header__menu', // Classe CSS
            )); ?>
        
            <div class="burger">
                <img class="menu_burger" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/burger.png' ?>">
                <img class="croix_burger" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/cross.png' ?>">
            </div>
        </nav>
        <?php 
        get_template_part('template-parts/menu', '');
         ?>
    </header>
    
    <?php wp_body_open(); ?>
    <main>