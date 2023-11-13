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
		?>

    
    	<?php 
		the_content(); 
		?>
	

	
	
		
		
	

	
	
	

 
	</section>



<?php get_footer(); ?>