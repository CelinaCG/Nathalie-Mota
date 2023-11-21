<?php get_header(); ?>
	<section class="container">
	
		<!-- Appel template-part du hero header -->
		<!-- <div class="banner-style"> -->
			<?php get_template_part('template-parts/custom' , 'header'); ?>
			<h1 class="title"><?php the_title(); ?></h1>

		
	
		
		<!-- </div> -->

    
    	<?php 
		the_content(); 
		?>
	
		<!-- Section filtres pour page d'acceuil -->

		<!-- Affichage catégories -->


		
	

	
	
	

 
	</section>



<?php get_footer(); ?>