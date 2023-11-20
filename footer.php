<!-- Fermeture du container -->
</main>
<footer class="site__footer">
    
    <?php wp_nav_menu( array('theme_location' => 'footer')); ?>
    
    <p class="droits-reserves">Tous droits réservés</p>
  
    <?php get_template_part('template-parts/modale', '');?>

    <?php get_template_part('template-parts/lightbox', '');?>
</footer>
<?php wp_footer(); ?>

</div>
