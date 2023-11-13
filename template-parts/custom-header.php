<!-- Bloc d'affichage d'une photo de la liste pour page accueil -->

<section>
    <?php 
    $the_query = new WP_Query(array( 
        'orderby' => 'rand',
        'posts_per_page' => 1 ,
        'post_type' => 'photos'
    ));
    
    if($the_query -> have_posts()):

    // Boucle
    
    while ($the_query -> have_posts()) {
        $the_query -> the_post();
        the_post_thumbnail(); 
    } 

    // Restore original Post Data.
    wp_reset_postdata();
    ?>
    <?php else : ?>
	<p><?php esc_html_e( 'Désolé, il n\'y a aucun post qui correspond à vos critères.' ); ?></p>
    <?php endif; ?>
        
        

</section>