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

}
add_action( 'wp_enqueue_scripts', 'ajout_CSS_script' );

// Menus

register_nav_menus( array(
    'main' => 'Menu principal',
    'footer' => 'Bas de page',
    )
);

// Ajax


// function featured_pictures_request_mariage() {
// 	$args = array('post_type' => 'mariage', 'posts_per_page' => 2 );
// 	$query = new WP_Query($args);
// 	if($query->have_posts()) {
// 	$response = $query;
// 	} else {
// 	$response = false;
// 	}
	
// 	wp_send_json($response);
// 	wp_die();
// }
// add_action('wp_ajax_request_mariage', 'featured_pictures_request_mariage');
// add_action('wp_ajax_nopriv_request_mariage', 'featured_pictures_request_mariage');

// function featured_pictures_scripts() {
// 	wp_enqueue_script('featured-pictures', get_template_directory_uri() . '/assets/js/ajax.js', array('jquery'), '1.0.0', true);
// 	wp_localize_script('featured-pictures', 'script', array('ajax_url' => admin_url('admin-ajax.php')));
// }
	
// add_action('wp_enqueue_scripts', 'featured_pictures_scripts');


// Images apparentées

// Function to get the related images
function get_related_images($post_id) {
	// Prendre la taxonomie de l'image du post par son ID
    $taxonomies = get_object_taxonomies($post_id);
    $args = array(
		// Je récupère les images avec 'attachement'
        'post_type' => 'attachment',
        'post__not_in' => array($post_id),
		'posts_per_page' => 2,
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomies[0],
                'field'    => 'slug',
                'terms'    => get_the_terms($post_id, $taxonomies[0]),
            ),
        ),
    );
    $query = new WP_Query($args);
    return $query;
}

// Affichage gallerie des images apparentéeés

function display_gallery($post_id) {
	// Appel de la fonction précédente pour récupérer les images liées
    $query = get_related_images($post_id);
    if ($query->have_posts()) {
        echo '<ul>';
        while ($query->have_posts()) {
            $query->the_post();
            echo '<li><a href="' . wp_get_attachment_url($query->post->ID) . '"><img src="' . wp_get_attachment_metadata($query->post->ID, 'thumb') . '" /></a></li>';
        }
        echo '</ul>';
    } else {
        echo '<p>' . __('No related images were found.', 'your-theme-textdomain') . '</p>';
    }
}

