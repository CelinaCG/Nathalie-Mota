<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class('site'); ?>>

    <header class="site__header">
        <a href="<?php echo home_url('/'); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.png" alt='Logo'>
        </a>
        <nav role="navigation" aria-label="<?php _e('Menu principal', 'text-domain'); ?>">
            <?php wp_nav_menu( array(
                'theme_location' => 'main',
                'container' => 'ul', // éviter d'avoir une div autour
                'menu_class' => 'site__header__menu',
            )); ?>
        </nav>
      
    </header>
    
    <?php wp_body_open(); ?>