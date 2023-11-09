<!-- Bloc d'affichage d'une photo de la liste pour page accueil -->

<section class="hero-header">
    <?php query_posts(array(
        'post_type' => 'photo',
        'showposts' => '1',
        'orderby' => 'rand',
    )); ?>
    
    <?php if(have_posts()):
        while (have_posts()): 
            the_post(); ?>
            <img class="photo-aleatoire" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" 
        <?php endwhile; 
        endif; ?> >
    <img class="photoevent" src="<?php echo get_template_directory_uri(); ?> '/assets/images/photoevent.jpeg' " alt="photoevent">
        
        

</section>