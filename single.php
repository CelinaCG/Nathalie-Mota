<!-- Variables de stockage -->
<?php
	$refPhoto = get_field("reference");
	$post = get_post();
	$cat = get_the_terms($post->ID, "categorie");
	$catname = $cat[0]->name;
	$refType = get_field("type");
	$refDate = get_the_date("Y");
	$term = get_the_terms($post->ID, "format");
	$termname = $term[0]->name;
		
?>
<?php get_header(); ?>

<div class="section-single">
	<div class="detail-photo">

		<section class="bordure-description">
			<h2><?php echo the_title() ?></h2>
			<p class="description-photo">RÉFÉRENCE : <span class="ref"><?php $refPhoto ?></span></p>
			<p class="description-photo">CATÉGORIE : <?php $catname ?></p>
			<p class="description-photo">FORMAT : <?php $termname ?></p>
			<p class="description-photo">TYPE : <?php $refType ?></p>
			<p class="description-photo">ANNÉE : <?php $refDate ?></p>
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
				
				</a>
			<?php }
			elseif ( get_next_post() ) {?>
				<a href="<?php echo get_the_permalink($next) ?>">
					<img class="image-slider" src="<?php echo get_the_post_thumbnail_url($next) ?>">			
					
				</a>
			<?php }?>

			<div class="align-arrows">
				<div>
					<img class="flechegauche" src="<?php echo get_stylesheet_directory_uri($previous) . '/assets/images/arrow-left.png' ?>">
				</div>
				<div>
					<img class="flechedroite" src="<?php echo get_stylesheet_directory_uri($next) . '/assets/images/arrow-right.png' ?>">
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