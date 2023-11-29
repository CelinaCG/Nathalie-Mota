<!-- Affichage galerie photos -->
<div class="col-photo gallery-container">

    <?php 
        $the_query = new WP_Query(array(
            'post_type' => 'photos',
            'posts_per_page' => 12,
            'post__not_in' => array(get_the_ID()),
            'paged' => 1
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
                echo '<img class="zoom lightbox-open" data-category='. strip_tags(get_the_term_list(get_the_ID(), 'categorie')) .' data-reference='. get_field('reference', get_the_ID()) .' data-image='. get_the_post_thumbnail_url() .'  src="' . get_template_directory_uri() . '/assets/images/Icon_fullscreen.png" >';
                echo '<a href=" '. get_the_permalink() .' "><img class="oeil" src="' . get_template_directory_uri() . '/assets/images/Icon_eye.png" ></a>';
                echo '<div class="legend-align">';
                // echo '<div class="legend ref-photo">' . get_the_title() . '</div>';
                echo '<div class="legend ref-photo">' . get_field("reference") . '</div>';
                echo '<div class="legend cat">' . strip_tags(get_the_term_list($post->ID, 'categorie')) . '</div>';
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






<!-- Essai -->

<!-- Affichage galerie photos -->
<!-- <div class="col-photo"> -->

    <?php 
        // $args = array(
        //     'post_type' => 'photos',
        //     'posts_per_page' => 12,
        //     'post__not_in' => array(get_the_ID()),
        //     'paged' => 1
        // );
        // $query = new WP_Query($args);

        // if ($query->have_posts()) :
        //     while ($query->have_posts()) :
        //         $query->the_post();
    ?>
    <!-- <div class="hover-photo"> -->
        <!-- <a href="#">
            <img class="lightbox-hover" data-category="<?php echo strip_tags(get_the_term_list(get_the_ID(), 'categorie')); ?>" data-reference="<?php echo get_field('reference', get_the_ID()); ?>" data-image="<?php echo get_the_post_thumbnail_url(); ?>" src="<?php echo get_template_directory_uri(); ?>/assets/images/Icon_fullscreen.png" alt="full_screen">
        </a> -->
        <!-- <a href="
        <?php 
        // echo get_the_permalink(get_the_ID()); 
        ?>">
            <img class="oeil" src="<?php 
            // echo get_template_directory_uri();
             ?>/assets/images/Icon_eye.png" alt="oeil">
        </a>
        <div class="legend-align">
            <div class="legend ref-photo"><?php 
            // echo get_field('reference', $post->ID); 
            ?></div>
            <div class="legend cat"><?php 
            // echo strip_tags(get_the_term_list($post->ID, 'categorie'));
             ?></div>
        </div>

    </div>
    <?php
        // endwhile;
        // endif;
        // wp_reset_postdata();
        // -->
    ?>
        

</div>