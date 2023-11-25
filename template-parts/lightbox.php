<!-- Variables de stockage -->
<?php
	// $refPic = get_field("reference");
	// $catego = get_the_terms($post, "categorie");
	// $categoname = $catego[0]->name;	
?>

<!-- Lightbox -->
<div id="myLightbox" class="lightbox-overlay">
    <!-- Mise en place des posts précédents et suivants -->
    <?php 
        $previousLightbox = get_previous_post();
        $nextLightbox = get_next_post();
    ?>
    <!-- Mise en place des liens des images précédentes et suivantes -->
    <?php if(get_previous_post()){?>
        <img class="" src="<?php echo get_the_post_thumbnail_url($previousLightbox) ?>" alt="photo précédente">
        <img class="" src="<?php echo get_the_post_thumbnail_url($nextLightbox) ?>" alt="photo suivante">			

    <?php }
    elseif(get_next_post() ) {?>
        <img class="zoom-image" src="<?php echo get_the_post_thumbnail_url($nextLightbox) ?>" alt="photo suivante">
        <img class="zoom-image" src="<?php echo get_the_post_thumbnail_url($previousLightbox) ?>" alt="photo précédente">			
    <?php }?>

    <!-- Contenu lightbox. Le lien de la photo précédente ou suivante doit être cliquable via les flèches -->
    <div>
        <div class="lightbox-content">
            <div class="zoom-image">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>">
            </div>
            <img class="exit-lightbox" src="<?php echo get_template_directory_uri() . '/assets/images/white-cross.png' ?>">
            <div class="fleches">

                <?php if(get_previous_post()): ?>
                    <a href="<?php echo get_the_post_thumbnail_url($previousLightbox) ?>">

                        <!-- Flèche gauche -->
                        <p class="previous-lightbox">Précédente<img class="flechegauche-overlay-inactive" src="<?php echo get_template_directory_uri() . '/assets/images/short-arrow-left.png' ?>">
                        </p>
                    </a>
                <?php endif; ?>

                <!-- Flèche droite -->
                <?php if(get_next_post()): ?>
                    <a href="<?php echo get_the_post_thumbnail_url($nextLightbox) ?>">
                        <p class="next-lightbox">Suivante<img class="flechedroite-overlay-inactive" src="<?php echo get_template_directory_uri() . '/assets/images/short-arrow-right.png' ?>">
                       </p>
                    </a>
                <?php endif; ?>
            </div>
            <div class="legend-lb-align">
                <div>
                    <p class="legend"> <?php echo get_field("reference") ?></p>
                </div>
                <div>
                    <p class="legend"> <?php echo get_term(get_the_ID(), "categorie")->name; ?></p>
                </div>       
      
            </div>
        </div>
   
  
       
        
        
    </div>

</div>

<!-- ..................................... -->
<!-- Essai lightbox -->

<!-- <div id="custom-lightbox"> -->
    <!-- <span class="close-lightbox">&times;</span> -->
    <!-- <img class="exit-lightbox" src=" -->
    <?php 
    // echo get_template_directory_uri() . '/assets/images/white-cross.png' 
    ?>
    <!-- "> -->
    <!-- <div class="lightbox-content">
        <img src="" alt="image en lightbox" id="lightbox-image">

        <div class="legend-lb-align"> -->
            <!-- <div class="legend"> -->
                <?php 
                // echo get_field('reference', get_the_ID()); 
                ?>
                <!-- </div> -->
            <!-- <div class="legend"> -->
                <?php 
                // echo strip_tags(get_the_term_list(get_the_ID(), 'categorie')); 
                ?>
                <!-- </div> -->

        </div>
    </div>
    <!-- <div class="navigation">
        <span class="prev_span previous-lightbox">Précédente<img class="prev flechegauche-overlay-inactive" src="<?php 
        // echo get_template_directory_uri(); 
        ?>/assets/images/short-arrow-left.png">  -->
            
        <!-- </span> -->
        <!-- <span class="next_span next-lightbox">
            Suivante
            <img class="next flechedroite-overlay-inactive" src=" -->
            <?php 
            // echo get_template_directory_uri(); 
            ?>
            <!-- /assets/images/short-arrow-right.png">
        </span> -->
    </div>
</div>