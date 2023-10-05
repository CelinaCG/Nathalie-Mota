// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.querySelector('.contact');

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Menu burger

var sidenav = document.querySelector('#side-nav');
var openburger = document.querySelector('.menu_burger');
var closeburger = document.querySelector('.croix_burger');

openburger.addEventListener('click', function(){
    document.querySelector('.m-burger').style.display="block";
    // Disparition du menu burger
    document.querySelector('.menu_burger').style.display="none";
    // Apparition de la croix
    document.querySelector('.croix_burger').style.display="block";
});

closeburger.addEventListener('click', function(){
    document.querySelector('.m-burger').style.display="none";
    document.querySelector('.croix_burger').style.display="none";
    document.querySelector('.menu_burger').style.display="block";
});

var btnContact = document.querySelector('.btn-contact');
btnContact.onclick = function() {
    modal.style.display = "block";
}

// Images

// récupération de l'id l'article photo -->
$thumbnail_id = get_post_thumbnail_id();
// récupération de l'url de la photo -->
$thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'custom-size');
// Récupération de l'attribut ALT de l'image mise en avant pour une meilleure accessibilité
$thumbnail_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);

// Evènement flèches

// Flèche gauche

let flecheGauche = document.querySelector(".flechegauche");
let clickFleche = 0;
flecheGauche.addEventListener("click", function() {
	// Décrémentation de la position de l'image/slide
	clickFleche--;
	// Condition if pour définir position de la slide après incrémentation
	if (clickFleche < 0) {
	
		clickFleche = slides.length -1;
	}


});
	

// Flèche droite

let flecheDroite = document.querySelector(".flechedroite");
flecheDroite.addEventListener("click", function() {

	// Incrémentation de la position de l'image
	clickFleche++;
	if (clickFleche > slides.length -1) {
		clickFleche = 0;
	}
	
});

// Carrousel

const imageElement = document.querySelector(".image-slider");

// Flèche gauche
let flechegauche = document.querySelector(".flechegauche");
// Ce gestionnaire ne sera exécuté qu'une fois
// lorsque le curseur se déplace sur la liste
flechegauche.addEventListener(
    "mouseenter",
    function (event) {
        // on met l'accent sur la cible de mouseenter
        // event.target.style.color = "purple";
        event.target.imageElement.src = "<?php echo get_the_post_thumbnail_url($previous) ?>";

    },
    false,
);

// Ce gestionnaire sera exécuté à chaque fois que le curseur
// se déplacera sur un autre élément de la liste
flechegauche.addEventListener(
    "mouseover",
    function (event) {
        // on met l'accent sur la cible de mouseover
        // event.target.style.color = "orange";
        event.target.imageElement.src = "<?php echo get_the_post_thumbnail_url($next) ?>";

    },
    false,
);

// Flèche droite
let flechedroite = document.querySelector(".flechedroite");
flechedroite.addEventListener(
    "mouseenter",
    function (event) {
        // on met l'accent sur la cible de mouseenter
        // event.target.style.color = "purple";
        event.target.imageElement.src = "<?php echo get_the_post_thumbnail_url($next) ?>";

    },
    false,
);

// Ce gestionnaire sera exécuté à chaque fois que le curseur
// se déplacera sur un autre élément de la liste
flechedroite.addEventListener(
    "mouseover",
    function (event) {
        // on met l'accent sur la cible de mouseover
        // event.target.style.color = "orange";
        event.target.imageElement.src = "<?php echo get_the_post_thumbnail_url($previous) ?>";

    },
    false,
);


// Ajout référence photo dans le formulaire

$(document).ready(function(){
    $(".wpcf7-text").val(get_the_ID('reference'));
});
