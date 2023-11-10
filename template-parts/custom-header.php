<!-- Bloc d'affichage d'une photo de la liste pour page accueil -->

<section class="hero-header">
    <?php 
    $the_query = new WP_Query(array( 
        'orderby' => 'rand',
        'posts_per_page' => 1 ,
        'post_type' => 'photo'
    ));
    
    
    if($the_query -> have_posts()):

    // <!-- Boucle -->
    
        while ($the_query -> have_posts()) {
            $the_query -> the_post();
            the_post_thumbnail(); 
            wp_reset_postdata();
            exit;
        } 

        
        // endwhile; 
        // Restore original Post Data.
        wp_reset_postdata();

        // endif; 
        ?>
        <?php else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>


    <!-- <img class="photoevent" src="<?php 
    // echo get_template_directory_uri() . '/assets/images/photoevent.jpeg' 
    ?> " alt="photoevent"> -->
        
        

</section>