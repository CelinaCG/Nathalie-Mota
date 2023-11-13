<?php get_header(); ?>
	<section class="container">
	
		<!-- Appel template-part du hero header -->
		<div class="banner-style">
			<?php get_template_part('template-parts/custom' , 'header'); ?>
			<h1 class="title"><?php the_title(); ?></h1>

			<!-- <img src=" -->
			<?php 
			// echo get_template_directory_uri() . '/assets/images/photoevent.jpeg'; 
			?> 
			<!-- " alt="bannière"> -->
		</div>

    
    	<?php 
		the_content(); 
		?>
	

	
	

	<!-- Section filtres pour page d'acceuil -->

	<!-- Affichage catégories -->

	<?php $categories = get_categories(); ?>
	<ul class="cat-list">
	<li><a class="cat-list_item active" href="#!" data-slug="">Toutes les photos</a></li>

	<?php foreach($categories as $category) : ?>
		<li>
		<a class="cat-list_item" href="#!" data-slug="<?= $category->slug; ?>">
			<?= $category->name; ?>
		</a>
		</li>
	<?php endforeach; ?>
	</ul>
		
	

	
	
	

 
	</section>



<?php get_footer(); ?>