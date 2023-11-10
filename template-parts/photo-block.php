<!-- Affichage photos accueil -->

<?php 
    $photos = new WP_Query([
        'post_type' => 'photo',
        'posts_per_page' => -1,
        'order_by' => 'date',
        'order' => 'desc',
    ]);
?>

<?php if($photos->have_posts()): ?>
    <ul class="photo-tiles">
        <?php
            while($photos->have_posts()) : $photos->the_post();
            endwhile;
        ?>
    </ul>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>