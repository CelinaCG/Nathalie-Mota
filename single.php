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

			<!-- Diaporama des images -->
			<!-- Mise en place de la fonction pour mettre un élement précédent ou suivant -->
			<?php 
				$previous = get_previous_post();
				$next = get_next_post();
			?>

			<!-- Mise en place des liens des pages single.php correspondant aux images -->
			<?php if(get_previous_post()){?>
				<img class="image-slider" src="<?php echo get_the_post_thumbnail_url($previous) ?>">
			<?php }
			elseif(get_next_post() ) {?>
				<img class="image-slider" src="<?php echo get_the_post_thumbnail_url($next) ?>">			
			<?php }?>

			<!-- Le lien de la single.php correspondant à l'image précédente ou suivante doit être cliquable via chacune des flèches. L'image du diaporama ne doit pas être cliquable. -->
			<div class="align-arrows">
				<div>
					<!-- Lien de la single.php précédente doit englober la flèche gauche pour la rendre cliquable -->
					<a href="<?php echo get_the_permalink($previous) ?>">
						<img class="flechegauche" src="<?php echo get_stylesheet_directory_uri($previous) . '/assets/images/arrow-left.png' ?>">
					</a>
				</div>
				<div>
					<!-- Lien de la single.php suivante doit englober la flèche droite pour la rendre cliquable -->
					<a href="<?php echo get_the_permalink($next) ?>">
						<img class="flechedroite" src="<?php echo get_stylesheet_directory_uri($next) . '/assets/images/arrow-right.png' ?>">
					</a>
				</div>
			</div>

		</section>
	</div>
	<section>
		<h3>Vous aimerez aussi</h3>

		<!-- Boucle photos apparentées -->
		<?php
	
		// Create the variable for the large image src link
		// $medium_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
		
		// ?>
		
	
		<!-- // <a href="<?php 
		// echo the_permalink(); $medium_image_url[0]; 
		?>" title="<?php 
		// the_title_attribute();
		?>"> -->
		
		<!-- // <?php 
		// the_post_thumbnail('medium'); 
		?></a> -->
		
		
	
	


	</section>

</div>

	
<?php get_footer(); ?>