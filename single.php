<?php get_header(); ?>
<div>
	<div class="detail-photo">

		<section class="bordure-description">
		<h2><?php echo the_title() ?></h2>
		<p class="description-photo">RÉFÉRENCE : <?php echo get_field('reference') ?></p>
		<p class="description-photo">CATÉGORIE : <?php echo get_the_terms(get_the_ID(),'categorie')[0]->name ?></p>
		<p class="description-photo">FORMAT : <?php echo get_the_terms(get_the_ID(),'format')[0]->name ?></p>
		<p class="description-photo">TYPE : <?php echo get_field('type') ?></p>
		<p class="description-photo">ANNÉE : <?php echo get_the_date('Y') ?></p>
		</section>

		<section>
			<!-- Affichage de la photo -->
			<img class="photo" src="<?php echo get_the_post_thumbnail(); ?>">
		</section>
	</div>	

	<div class="contact-carrousel">
		<section class="contact-photo">
		<p class="poppins">Cette photo vous intéresse ?</p>
		<p class="contact btn-contact">Contact</p>
		</section>
		<section class="carrousel">
			<div></div>
			
			
			<!-- Slide -->
			<div>
			<?php 
				$previous = get_previous_post();
				$next = get_next_post();
			?>

			<?php if(get_previous_post()){?>
				<a href="<?php echo get_the_permalink($previous) ?>">
				<img class="image-slider" src="<?php echo get_the_post_thumbnail_url($previous) ?>">
				
					<div>
						<img class="flechegauche" src="<?php echo get_stylesheet_directory_uri($previous) . '/assets/images/arrow-left.png' ?>">
					</div>
				</a>
			<?php }?>
			<?php if ( get_next_post() ) {?>
				<a href="<?php echo get_the_permalink($next) ?>">
					<img class="image-slider" src="<?php echo get_the_post_thumbnail_url($next) ?>">
					
					<div>
						<img class="flechedroite" src="<?php echo get_stylesheet_directory_uri($next) . '/assets/images/arrow-right.png' ?>">
					</div>
				</a>
				<?php }?>
			</div><!-- #slider-window -->

		</section>
	</div>
	<section>
		<h3>Vous aimerez aussi</h3>

		<!-- Boucle photos apparentées -->
		<?php
		// Appel tableau de la catégorie
		$featured_image_query = new WP_Query(array(
			'taxonomy' => 'category',
			'posts_per_page' => 2
		));
		
		if($featured_image_query->have_posts()):
			// Si catégorie existe, afficher la photo
			$thumbnail_id = get_post_thumbnail_id();
			$image_src = wp_get_attachment_image_src( $thumbnail_id );
			  
					
					
					
				
		endif; ?>
	


	</section>

</div>

	
<?php get_footer(); ?>