<?php get_header(); ?>
	<section>
	<?php 
	// if( have_posts() ) : while( have_posts() ) : the_post(); 
	?>
		<!-- Appel template-part du hero header -->
		<?php 
		// get_template_part('template-parts/custom' , 'header');
		?>
	
		<!-- Bannière accueil -->
		<div class="section-single banner-style">
			<h1 class="title"><?php the_title(); ?></h1>

			<img src="<?php echo get_template_directory_uri() . '/assets/images/photoevent.jpeg'; ?> " alt="bannière">
		</div>
    	
    
    	<?php 
		the_content(); 
		?>
		<!-- Boucle principale -->

	
	
		<?php 
		// new WP_Query( array( 'post_type' => 'post' ) );
	
	// Boucle personnalisée
	// if( have_posts() ) : while(have_posts() ) : 
	// 	the_post();
        
		// the_title(); // Titre de chaque article
        // the_content(); // Contenu de chaque article
		// the_post_thumbnail();
		// endwhile; endif;
		

		// the_content(); // Contenu de la page

	// endwhile; endif; wp_reset_postdata(); // On réinitialise les données
	?>
	

 
	</section>



<?php get_footer(); ?>