<?php get_header(); ?>
	<section class="container">
	
		<!-- Appel template-part du hero header -->
	
		<?php get_template_part('template-parts/custom' , 'header'); ?>
			
		<!-- Section filtres pour page d'acceuil -->
		<div class="filters-gallery">
			<!-- Catégories -->
			<section class="main-filters">
				<div class="ajax-filters">
					<form id="ajax-filter">
						<select name="cat" id="catFilter">
							<option value="all">CATÉGORIES</option>
							<?php echo filtreCategorie(); ?>
						</select>
			
					</form>
		
					<!-- Formats -->
				
					<form id="ajax-filter">
						<select name="form" id="formFilter">
							<option value="all">FORMATS</option>
							<?php echo filtreFormat(); ?>
						</select>
					</form>
				</div>

				<!-- Tri par date -->

				<div class="ajax-filters">
					<form id="ajax-filter">
						
					<select name="tri" id="triFilter">
						<option value="">TRIER PAR</option>
						<?php echo filtreOrderDirection(); ?>
					</select>
					</form>
				</div>
			</section>

			<div class="col-photo">

			<?php 
				$args = array(
					'post_type' => 'photos',
					'posts_per_page' => 12,
					'post__not_in' => array(get_the_ID()),
					'paged' => 1
				);
				$query = new WP_Query($args);

				if ($query->have_posts()) :
				while ($query->have_posts()) :
				$query->the_post();
			?>
			<div class="hover-photo">
				<a href="#">
					<img class="lightbox-hover" data-category="<?php echo strip_tags(get_the_term_list(get_the_ID(), 'categorie')); ?>" data-reference="<?php echo get_field('reference', get_the_ID()); ?>" data-image="<?php echo get_the_post_thumbnail_url(); ?>" src="<?php echo get_template_directory_uri(); ?>/assets/images/Icon_fullscreen.png" alt="full_screen">
				</a>
				<a href="<?php echo get_the_permalink(get_the_ID()); ?>">
					<img class="oeil" src="<?php echo get_template_directory_uri(); ?>/assets/images/Icon_eye.png" alt="oeil">
				</a>
				<div class="legend-align">
					<div class="legend ref-photo"><?php echo get_field('reference', $post->ID); ?></div>
					<div class="legend cat"><?php echo strip_tags(get_the_term_list($post->ID, 'categorie')); ?></div>
				</div>

			</div>
			<?php
				endwhile;
				endif;
				wp_reset_postdata();
				// if($the_query->have_posts()):
				// while ($the_query -> have_posts()) {
				//     $the_query -> the_post();
				//     // Variables de stockage
				//     $refPhoto = get_field("reference");
				//     $cat = get_the_terms($post, "categorie");
				//     $catname = $cat[0]->name;	

				//     // Mise en place du hover
				//     echo '<div class="hover-photo">';
				//     the_post_thumbnail(); 
				//     echo '<div class="lightbox-hover">';
				//     // Récupération de l'image + titre + catégorie
				//     echo '<img class="zoom lightbox-open" data-category='. $catname .' data-reference='. $refPhoto .' data-image='. get_the_post_thumbnail_url() .'  src="' . get_template_directory_uri() . '/assets/images/Icon_fullscreen.png" >';
				//     echo '<a href=" '. get_the_permalink() .' "><img class="oeil" src="' . get_template_directory_uri() . '/assets/images/Icon_eye.png" ></a>';
				//     echo '<div class="legend-align">';
				//     echo '<div class="legend ref-photo">' . get_the_title() . '</div>';
				//     echo '<div class="legend cat">' . $catname . '</div>';
				//     echo '</div>';
				//     echo '</div>';
				//     echo '</div>';
				// // } 
				// wp_reset_postdata();
			?>
				

			</div>
			<?php 

			// Gallerie
			
			// get_template_part('template-parts/home' , 'gallery');

			?>
			
			<!-- Charger plus de posts (pagination) -->

			<!-- Montrer 8 premières photos par défaut -->
			<?php  ?>
			

			
			<!-- Bouton "Charger plus" -->
			<div class="btn__wrapper">
			<input type="button" Value="Charger plus" class="btn btn_loadMore" id="load-more">
			</div>
		</div>
	</section>



<?php get_footer(); ?>