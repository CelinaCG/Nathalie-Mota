<!-- Variables de stockage -->
<?php
	$refPic = get_field("reference");
	$catego = get_the_terms($post, "categorie");
	$categoname = $catego[0]->name;	
?>

<!-- Lightbox -->
<div id="myLightbox" class="lightbox-overlay">
    
    <!-- Contenu lightbox -->
    <div class="lightbox-content">
        <div class="zoom-image">
        <img src="<?php echo get_the_post_thumbnail_url(); ?>">
        </div>
        <img class="exit-lightbox" src="<?php echo get_template_directory_uri() . '/assets/images/white-cross.png' ?>">
        <div class="fleches">
            <!-- Flèche gauche -->
            <p class="previous-lightbox">Précédente<img class="flechegauche-overlay-inactive" src="<?php echo get_template_directory_uri() . '/assets/images/short-arrow-left.png' ?>">
            <img class="flechegauche-overlay-active" src="<?php echo get_template_directory_uri() . '/assets/images/long-arrow-left.png' ?>"></p>

            <!-- Flèche droite -->
            <p class="next-lightbox">Suivante<img class="flechedroite-overlay-inactive" src="<?php echo get_template_directory_uri() . '/assets/images/short-arrow-right.png' ?>">
            <img class="flechedroite-overlay-active"  src="<?php echo get_template_directory_uri() . '/assets/images/long-arrow-right.png' ?>"></p>
        </div>
        <div class="legend-lb-align">
            <div>
                <p class="legend">RÉFÉRENCE : <?php echo $refPic ?></p>
            </div>
            <div>
            <p class="legend">CATÉGORIE : <?php echo $categoname ?></p>
            </div>       
      
        </div>
       
        
        
    </div>

</div>