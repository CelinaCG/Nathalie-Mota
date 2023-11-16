<!-- Fermeture du container -->
</main>
<footer class="site__footer">
    <!-- Lightbox -->
    <div class="lightbox"></div>
    
    <?php wp_nav_menu( array('theme_location' => 'footer')); ?>
    
    <p class="droits-reserves">Tous droits réservés</p>
  
    <?php get_template_part('template-parts/modale', '');?>
</footer>
<?php wp_footer(); ?>

</div>
