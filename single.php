<?php get_header(); ?>
	<h2><?php the_field('title') ?></h2>
	<p class="description-photo">RÉFÉRENCE : <?php the_field('reference') ?></p>
	<!-- Catégorie -->
	<p class="description-photo"><?php get_the_terms(get_the_ID(),'categorie')[0]->name ?></p>
	<!-- Format -->
	<p class="description-photo"><?php get_the_terms(get_the_ID(),'format')?></p>
	<p class="description-photo">TYPE : <?php the_field('type') ?></p>
	<!-- Année -->
	<p class="description-photo"><?php get_the_date('Y') ?></p>
<?php get_footer(); ?>