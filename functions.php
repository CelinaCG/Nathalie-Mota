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
    wp_enqueue_script('script-lightbox', get_template_directory_uri() . '/assets/js/lightbox.js', array('jquery'), '1.0', true);

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

echo '<a id="contact" href="' . esc_url($template_part) .'">Contact</a>';
}

// Ajax

// Filtre Pagination

function filtre() {
	// Boucle de requète pour filtrer éléments en fonction des paramètres POST
	$filtre = new WP_Query([
	  'post_type' => 'photos',
	  'posts_per_page' => 12,
	  'orderby' => 'date',
	  'order' => $_POST['post_ordre'],
	  'paged' => $_POST['paged'],
	  'tax_query' => array(
		$_POST['category'] != "all" ?
			array(
				'taxonomy' => 'categorie',
				'field'    => 'slug',
				'terms'    => $_POST['category'],
			)
			: '',
		$_POST['post_format'] != "all" ?
			array(
				'taxonomy' => 'format',
				'field'    => 'slug',
				'terms'    => $_POST['post_format'],
			)
			: '',
		)
	]);
		
	if ($filtre->have_posts()) :
		while ($filtre->have_posts()) :
			$filtre->the_post();
			$post = get_post();
		
	?>
			<div class="hover-photo">
				<?php the_content(); ?>
				<div class="lightbox-hover">
					<a href="#">
						<img class="zoom lightbox-open" data-category="<?php echo strip_tags(get_the_term_list(get_the_ID(), 'categorie')); ?>" data-reference="<?php echo get_field('reference', get_the_ID()); ?>" data-image="<?php echo get_the_post_thumbnail_url(); ?>" src="<?php echo get_template_directory_uri(); ?>/assets/images/Icon_fullscreen.png" alt="full_screen">
					</a> <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
						<img class="oeil" src="<?php echo get_template_directory_uri(); ?>/assets/images/Icon_eye.png" alt="eye">
					</a>
					<div class="legend-align">
						<div class="legend ref-photo"><?php echo get_field('reference', $post->ID); ?></div>
						<div class="legend cat"><?php 
						echo 
						strip_tags(get_the_term_list($post->ID, 'categorie')); ?></div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif;
		wp_reset_postdata();
		exit();
	}
	add_action('wp_ajax_filtre', 'filtre');
	add_action('wp_ajax_nopriv_filtre', 'filtre');

	
/** Fonction pour afficher les options de catégorie pour le filtrage **/
function filtreCategorie()
{
	if ($terms = get_terms(array(
		'taxonomy' => 'categorie',
		'field'    => 'slug',
		'terms'    => $_POST['category'],
	)))
		foreach ($terms as $term) {
			echo '<option  value="' . $term->slug . '">' . $term->name . '</option>';
		}
}
/** Fonction pour afficher les options de format pour le filtrage **/
function filtreFormat()
{
	if ($terms = get_terms(array(
		'taxonomy' => 'format',
		'field'    => 'slug',
		'terms'    => $_POST['post_format'],
	)))
		foreach ($terms as $term) {
			echo '<option  value="' . $term->slug . '">' . $term->name . '</option>';
		}
}
/** Fonction pour afficher les options de tri pour le filtrage **/
function filtreOrderDirection()
{
	if ($order_options = (array(
		'DESC' => 'Les plus récents au plus anciens',
		'ASC' => 'Les plus anciens au plus récents',
	)))
		foreach ($order_options as $value => $label) {
			echo "<option " . selected($_POST['tri'], $value) . " value='$value'>$label</option>";
		}
}
?>
