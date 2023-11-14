<!-- Variables de stockage -->
<?php
	$refPhoto = get_field("reference");
	$post = get_the_ID();
	$cat = get_the_terms($post, "categorie");
	$catname = $cat[0]->name;
	$refType = get_field("type");
	$refDate = get_the_date("Y");
	$term = get_the_terms($post, "format");
	$termname = $term[0]->name;
		
?>
<?php get_header(); ?>

<div class="section-single">
	<div class="detail-photo">

		<section class="bordure-description">
			<h2><?php echo the_title() ?></h2>
			<p class="description-photo">RÉFÉRENCE : <span class="ref"><?php echo $refPhoto ?></span></p>
			<p class="description-photo">CATÉGORIE : <?php echo $catname ?></p>
			<p class="description-photo">FORMAT : <?php echo $termname ?></p>
			<p class="description-photo">TYPE : <?php echo $refType ?></p>
			<p class="description-photo">ANNÉE : <?php echo $refDate ?></p>
		</section>

		<section class="affichage-photo">
			<img src="<?php echo get_the_post_thumbnail_url(); ?>">
		</section>
	</div>	

	<div class="contact-carrousel">
		<section class="contact-photo">
		<p class="poppins">Cette photo vous intéresse ?</p>
		<p class="contact btn-contact">Contact</p>
		</section>
		<section class="carrousel">
			<div>

				<!-- Diaporama des images -->
				<!-- Mise en place de la fonction pour mettre un élement précédent ou suivant -->
				<?php 
					$previous = get_previous_post();
					$next = get_next_post();
				?>
		
				<!-- Mise en place des liens des pages single.php correspondant aux images -->
				<?php if(get_previous_post()){?>
					<img class="image-slider display-image" src="<?php echo get_the_post_thumbnail_url($previous) ?>" alt="photo précédente">
					<img class="image-slider display-slider" src="<?php echo get_the_post_thumbnail_url($next) ?>" alt="photo suivante">			

				<?php }
				elseif(get_next_post() ) {?>
					<img class="image-slider display-image" src="<?php echo get_the_post_thumbnail_url($next) ?>" alt="photo suivante">
					<img class="image-slider display-slider" src="<?php echo get_the_post_thumbnail_url($previous) ?>" alt="photo précédente">			
				<?php }?>

				<!-- Le lien de la single.php correspondant à l'image précédente ou suivante doit être cliquable via chacune des flèches. L'image du diaporama ne doit pas être cliquable. -->
				<div class="align-arrows">
					<div>
						<!-- Lien de la single.php précédente doit englober la flèche gauche pour la rendre cliquable -->
						<?php if(get_previous_post()): ?>
						<a href="<?php echo get_the_permalink($previous) ?>">
							<img class="flechegauche" src="<?php echo get_stylesheet_directory_uri($previous) . '/assets/images/arrow-left.png' ?>">
						</a>
						<?php endif; ?>
					</div>
					<div>
						<!-- Lien de la single.php suivante doit englober la flèche droite pour la rendre cliquable -->
						<?php if(get_next_post()): ?>
						<a href="<?php echo get_the_permalink($next) ?>">
							<img class="flechedroite" src="<?php echo get_stylesheet_directory_uri($next) . '/assets/images/arrow-right.png' ?>">
						</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="related-pictures">
		<h3>Vous aimerez aussi</h3>

		<!-- Boucle photos apparentées -->
		<div class="">
		<?php get_template_part('template-parts/photo' , 'block'); ?>
		</div>
		

		<!-- Test 1 -->

		<!-- <div class="gallery-block">
    		<?php 
			// display_gallery(get_the_ID());
			?>
		</div>

		<-- Test 2 -->
		<!-- <div class="gallery-block"> -->
    		<?php 
			// get_related_images(get_the_ID());
			 ?>
		<!-- </div> -->
	
	
		
	
	
	


		
	
	


	</div>


	

</div>

	
<?php get_footer(); ?>