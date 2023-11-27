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
            			<option value=""></option>
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
	
</div>

<?php get_footer(); ?>	