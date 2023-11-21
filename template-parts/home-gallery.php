<!-- Affichage galerie photos -->
<div class="col-photo">

    <?php 
        $current_category = get_the_terms(get_the_ID(), 'categorie');
        $the_query = new WP_Query(array(
            'post_type' => 'photos',
            'posts_per_page' => 12,
        ));

        if($the_query->have_posts()):
        while ($the_query -> have_posts()) {
            $the_query -> the_post();
            // Variables de stockage
            $refPhoto = get_field("reference");
            $cat = get_the_terms($post, "categorie");
            $catname = $cat[0]->name;	

            // Mise en place du hover
            echo '<div class="hover-photo">';
            the_post_thumbnail(); 
            echo '<div class="lightbox-hover">';
            // Récupération de l'image + titre + catégorie
            echo '<img class="zoom lightbox-open" data-category='. $catname .' data-reference='. $refPhoto .' data-image='. get_the_post_thumbnail_url() .'  src="' . get_template_directory_uri() . '/assets/images/Icon_fullscreen.png" >';
            echo '<a href="<?php the_permalink(); ?>"><img class="oeil" src="' . get_template_directory_uri() . '/assets/images/Icon_eye.png" ></a>';
            echo '<div class="legend-align">';
            echo '<div class="legend ref-photo">' . get_the_title() . '</div>';
            echo '<div class="legend cat">' . $catname . '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } 
        wp_reset_postdata();
    ?>
    <?php else : ?>
    <p><?php esc_html_e( 'Désolé, il n\'y a aucun post qui correspond à vos critères.' ); ?></p>
    <?php endif; ?>
</div>
