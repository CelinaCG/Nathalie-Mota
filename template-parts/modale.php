<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">
    
    <!-- Modal content -->
    <div class="modal-content">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Contact-header.png">
        <span class="close">x</span>
        <?php echo do_shortcode('[contact-form-7 id="bf60a67" title="Formulaire de contact"]'); ?>
    </div>

</div>
