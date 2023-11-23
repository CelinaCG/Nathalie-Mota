<?php 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

// Support logo

function montheme_customize_register($wp_customize)
{
	// Ajout d'une section pour le logo personnalisé
	$wp_customize->add_section('montheme_logo_section', array(
		'title'      => __('Logo personnalisé', 'montheme'),
		'priority'   => 30,
	));

	// Ajout de la fonctionnalité de logo personnalisé
	$wp_customize->add_setting('montheme_logo');

	// Ajout du contrôle pour téléverser le logo personnalisé
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'montheme_logo', array(
		'label'    => __('Téléverser votre logo', 'montheme'),
		'section'  => 'montheme_logo_section',
		'settings' => 'montheme_logo',
	)));
}
add_action('customize_register', 'montheme_customize_register');


// Ajout style CSS et script JQuery
function ajout_CSS_script() {
    // JQuery
    wp_enqueue_script('jquery');
    // JS
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);
    // CSS
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0');
    // Lightbox
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/lightbox.js', array('jquery'), '1.0', true);

}
add_action( 'wp_enqueue_scripts', 'ajout_CSS_script' );

// Menus

register_nav_menus( array(
    'main' => 'Menu principal',
    'footer' => 'Bas de page',
    )
);

// Ajout lien personnalisé de contact dans le menu header

function add_custom_link_to_admin_menu() {
	// Add a new top-level menu item
	add_menu_page(
	  'Contact', // menu title
	  'contact', // menu slug
	  'manage_options',
	  'my-custom-link',
	  'my_custom_link_callback', // callback function
	//   '5.0' // menu icon
	);
  }
  add_action('admin_menu', 'add_custom_link_to_admin_menu');

function my_custom_link_callback() {
// Render the custom link HTML
$template_part = get_template_part('template-parts/modale', '');

echo '<a href="' . esc_url($template_part) .'">Contact</a>';
}

// Ajax



