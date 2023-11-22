<?php get_header(); ?>
	<section class="container">
	
		<!-- Appel template-part du hero header -->
	
		<?php get_template_part('template-parts/custom' , 'header'); ?>
			
		<!-- Section filtres pour page d'acceuil -->

		<!-- Catégories -->

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
								<option value="">Catégories</option>
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

		<!-- Formats -->
		
		<div class="ajax-filters">
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
								<option value="">Formats</option>
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
					<option value="">Trier par</option>
					<option>Les plus anciennes au plus récentes</option>
					<option>Les plus recentes au plus anciennes</option>
				
				</select>
			</form>
		</div>
    
    	<?php 

		// Gallerie
		
		get_template_part('template-parts/home' , 'gallery');

		?>

	</section>



<?php get_footer(); ?>