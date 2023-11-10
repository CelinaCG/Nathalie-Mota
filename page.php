<?php get_header(); ?>

	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
		<!-- Appel template-part du hero header -->
		<?php 
		get_template_part('template-parts/custom' , 'header');
		?>
    
    	<h1><?php the_title(); ?></h1>
    
    	<?php the_content(); ?>
		<!-- Boucle principale -->

	
	
		<?php new WP_Query( array( 'post_type' => 'post' ) );
	
	// Boucle personnalisée
	if( have_posts() ) : while(have_posts() ) : 
		the_post();
        
		// the_title(); // Titre de chaque article
        // the_content(); // Contenu de chaque article
		the_post_thumbnail();
		endwhile; endif;
		

		// the_content(); // Contenu de la page

	endwhile; endif; wp_reset_postdata(); // On réinitialise les données
	?>
	

 




<?php get_footer(); ?>