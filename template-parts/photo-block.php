<!-- Affichage photos apparentées -->
<div class="col-photo">

<?php 
    $the_query = new WP_Query(array(
        'post_type' => 'photos',
        'posts_per_page' => 2,
        'tax_query' => array(
            array(
                // Prendre les images de la taxonomie de "catégorie"
                'taxonomy' => 'categorie',
                // Prendre l'ID de la photo affichée sur le single.php
                'terms' => array(get_queried_object()->term_id),
                'field' => 'term_id',
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
