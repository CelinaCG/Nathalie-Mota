<!-- Ouverture modale
<button id="myBtn">Open Modal</button> -->

<!-- Modale -->
<div id="myModal" class="modal">
    
    <!-- Contenu modale -->
    <div class="modal-content">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact.png">
        <?php echo do_shortcode('[contact-form-7 id="bf60a67" title="Formulaire de contact"]'); ?>
    </div>

</div>
