<!-- Bloc d'affichage d'une photo de la liste pour page accueil -->

<section class="hero-header">
    <?php query_posts('showposts=1&orderby=rand'); ?>
    <a href="<?php the_permalink(); ?>">
    <?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail('large'); ?>
    
    <?php endif;  ?>

    
	<!-- // Create WordPress Query with 'orderby' set to 'rand' (Random) --> 
    <?php $the_query = new WP_Query( array ( 'orderby' => 'rand', 'posts_per_page' => '1' ) );
    // output the random post
    while ( $the_query->have_posts() ) : $the_query->the_post();
        // echo '<li>';
        // the_title();
        // echo '</li>';   
        // echo <a href="<?php the_permalink(); ?>
        ">
        <?php 
        // echo the_post_thumbnail('large'); 
     
    endwhile;

    // // Reset Post Data
    // wp_reset_postdata(); 
    ?>

</section>