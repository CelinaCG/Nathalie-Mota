<?php get_header(); ?>

	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
		<!-- Appel template-part du hero header -->
		<?php get_template_part('template-parts/photo' , 'block'); ?>
    
    	<h1><?php the_title(); ?></h1>
    
    	<?php the_content(); ?>
	

	<?php endwhile; endif; ?>



<?php get_footer(); ?>