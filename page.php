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
		
		<!-- Bouton "Charger plus" -->
		<div class="center-btn charge-more">
			<button class="hover-btn btn-photos btn-charge" id="load-more">Charger plus</button>
		</div>
	</div>
	
</div>

<?php get_footer(); ?>	