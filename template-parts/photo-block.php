<!-- Affichage photos apparentées -->

<?php 
    $the_query = new WP_Query(array(
        'post_type' => 'photos',
        'posts_per_page' => 2,
        'order_by' => 'date',
        'order' => 'desc',
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

