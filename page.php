<?php get_header(); ?>
<div class="container">

	<!-- Appel template-part du hero header -->

	<?php get_template_part('template-parts/custom' , 'header'); ?>

	<!-- Section filtres pour page d'acceuil -->
	<div class="filters-gallery">
		<!-- Catégories -->
		<section class="main-filters">
			<div class="ajax-filters">
				<form id="ajax-filter">
					<?php
						$categories = get_terms(
							array(
								'taxonomy' => 'categorie',
								'orderby' => 'rand',
							) 
						);
						if( $categories ) :
							?>
								<select>
									<option value="">CATÉGORIES</option>
									<?php
										foreach ( $categories as $category ) :
											?><option value="<?php echo $category->term_id ?>"><?php echo $category->name ?></option><?php
										endforeach;
									?>
								</select>
							<?php
						endif;
					?>
				</form>
		

				<!-- Formats -->
			
			
				<form id="ajax-filter">
					<?php
						$categories = get_terms(
							array(
								'taxonomy' => 'format',
								'orderby' => 'rand',
							) 
						);
						if( $categories ) :
							?>
								<select>
									<option value="">FORMATS</option>
									<?php
										foreach ( $categories as $category ) :
											?><option value="<?php echo $category->term_id ?>"><?php echo $category->name ?></option><?php
										endforeach;
									?>
								</select>
							<?php
						endif;
					?>
				</form>
			</div>

			<!-- Tri par date -->

			<div class="ajax-filters">
				<form id="ajax-filter">
					
					<select>
						<option value="">TRIER PAR</option>
						<option>Les plus anciennes au plus récentes</option>
						<option>Les plus récentes au plus anciennes</option>
					
					</select>
				</form>
			</div>
		</section>
		<?php 

		// Gallerie
		
		get_template_part('template-parts/home' , 'gallery');

		?>
		
		<!-- Charger plus de posts (pagination) -->

		<!-- Montrer 8 premières photos par défaut -->
		<?php 
		$publications = new WP_Query([
		'post_type' => 'photos',
		'posts_per_page' => 8,
		'orderby' => 'date',
		'order' => 'DESC',
		'paged' => 1,
		]);
		?>
		<!-- Boucle sur les résultats de la requète $publications -->
		<?php if($publications->have_posts()): ?>
		<ul class="publication-list">
			<?php 
			while ($publications->have_posts()): $publications->the_post();
				get_template_part('parts/card', 'publication');
			endwhile;
			?>
		</ul>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>

		
		<!-- Bouton "Charger plus" -->
		<div class="center-btn charge-more">
		<a href="#" class="btn-photos btn-contact" id="load-more">Charger plus</a>
		</div>
	</div>
		
	<!-- Section filtres pour page d'acceuil -->
	<!-- <div class="filters-gallery"> -->
		<!-- Catégories -->
		<!-- <section class="main-filters">
			<div class="ajax-filters"> -->
				<!-- <form id="ajax-filter">
					<select name="cat" id="catFilter">
						<option value="all">CATÉGORIES</option> -->
						<?php 
						// echo filtreCategorie();
							?>
					<!-- </select>
		
				</form>
		-->
				<!-- Formats -->
			
				<!-- <form id="ajax-filter">
					<select name="form" id="formFilter">
						<option value="all">FORMATS</option> -->
						<?php 
						// echo filtreFormat();
							?>
					<!-- </select>
				</form> 
			</div> -->

			<!-- Tri par date -->

			<!-- <div class="ajax-filters">
				<form id="ajax-filter">
					
				<select name="tri" id="triFilter">
					<option value="">TRIER PAR</option> -->
					<?php 
					// echo filtreOrderDirection(); 
					?>
				<!-- </select>
				</form>
			</div> -->
		<!-- </section> -->

		<!-- <div class="col-photo"> -->

		<?php 
			// $args = array(
			// 	'post_type' => 'photos',
			// 	'posts_per_page' => 12,
			// 	'post__not_in' => array(get_the_ID()),
			// 	'paged' => 1
			// );
			// $query = new WP_Query($args);

			// if ($query->have_posts()) :
			// while ($query->have_posts()) :
			// $query->the_post();
		?>
		<!-- <div class="hover-photo">
			<a href="#">
				<img class="p-ecran lightbox-hover zoom-image" data-category="<?php 
			
				// echo strip_tags(get_the_term_list(get_the_ID(), 'categorie')); 
				?> 
				"data-reference="
				<?php 
				// echo get_field('reference', get_the_ID()); 
				?>" data-image="
				<?php 
				// echo get_the_post_thumbnail_url();
					?>" src="<?php 
				//  echo get_template_directory_uri();
					?>/assets/images/Icon_fullscreen.png" alt="image en plein écran">
			</a>
			<a href="<?php 
			// echo get_the_permalink(get_the_ID()); 
			?>">
				<img class="oeil" src="<?php 
				// echo get_template_directory_uri();
					?>/assets/images/Icon_eye.png" alt="oeil">
			</a>
			<div class="legend-align">
				<div class="legend ref-photo">
					<?php 
					// echo get_field('reference', $post->ID); 
					?>
					</div>
				<div class="legend cat"><?php 
				// echo strip_tags(get_the_term_list($post->ID, 'categorie')); 
				?></div>
			</div>

		</div>
		<?php
			// endwhile;
			// endif;
			// wp_reset_postdata();
		
		?>


			

		</div> -->
		<?php 

		// Gallerie
		
		// get_template_part('template-parts/home' , 'gallery');

		?>
		
		
		<?php 
		// endif; 
		?>
		<?php 
		// wp_reset_postdata();
			?>

		
		<!-- // Bouton "Charger plus"
		<div class="btn__wrapper">
		<input type="button" Value="Charger plus" class="btn btn_loadMore" id="load-more">
		</div> -->
	<!-- </div> -->
	
</div>

<?php get_footer(); ?>	