<?php get_header(); ?>
	<section>
	<h2><?php echo the_title() ?></h2>
	<p class="description-photo">RÉFÉRENCE : <?php echo get_field('reference') ?></p>
	<!-- Catégorie -->
	<p class="description-photo">CATÉGORIE : <?php echo get_the_terms(get_the_ID(),'categorie')[0]->name ?></p>
	<!-- Format -->
	<p class="description-photo">FORMAT : <?php echo get_the_terms(get_the_ID(),'format')[0]->name ?></p>
	<p class="description-photo">TYPE : <?php echo get_field('type') ?></p>
	<!-- Année -->
	<p class="description-photo">ANNÉE : <?php echo get_the_date('Y') ?></p>
	</section>

	<section></section>
	
<?php get_footer(); ?>