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
					<?php
						$categories = get_terms(
							array(
								'taxonomy' => 'categorie',
								'orderby' => 'rand',
							) 
						);
						if( $categories ) :
							?>
								<select onfocus="this.size=5;" onblur="this.size=0;" onchange="this.size=1; this.blur()">
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
        <div class="btn__wrapper">
        <a href="#!" class="btn btn__primary" id="load-more">Charger plus</a>
        </div>
		</div>
	</section>



<?php get_footer(); ?>