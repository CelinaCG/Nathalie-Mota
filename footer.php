<footer class="site__footer">
    <?php wp_nav_menu( array('theme_location' => 'footer')); ?>
    <ul>
        <!-- <li><a href="#">Mentions Légales</a></li>
        <li><a href="#">Vie privée</a></li> -->
        <li><p>Tous droits réservés</p></li>
    </ul>
    <?php get_template_part('template-parts/modale', '');?>
</footer>
<?php wp_footer(); ?>