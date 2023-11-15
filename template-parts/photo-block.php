<!-- Affichage photos apparentées -->
<div class="col-photo">

<?php 
    $current_category = get_the_terms(get_the_ID(), 'categorie');
    $the_query = new WP_Query(array(
        'post_type' => 'photos',
        'posts_per_page' => 2,
        'orderby' => 'rand',
        'tax_query' => array(
            array(
                // Prendre les images de la taxonomie de "catégorie"
                'taxonomy' => 'categorie',
                // Prendre l'ID de la photo affichée sur le single.php
                'field' => 'term_id',
                // Utiliser la catégorie actuelle
                'terms' => $current_category[0]->term_id,
            ),
        ),
    ));

    if($the_query->have_posts()):
    while ($the_query -> have_posts()) {
        $the_query -> the_post();
        the_post_thumbnail(); 
    } 
    wp_reset_postdata();
?>
<?php else : ?>
<p><?php esc_html_e( 'Désolé, il n\'y a aucun post qui correspond à vos critères.' ); ?></p>
<?php endif; ?>
</div>
