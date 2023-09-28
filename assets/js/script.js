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
    document.querySelector('.menu_burger').display="block";
});

// Images

// récupération de l'id l'article photo -->
$thumbnail_id = get_post_thumbnail_id();
// récupération de l'url de la photo -->
$thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'custom-size');
// Récupération de l'attribut ALT de l'image mise en avant pour une meilleure accessibilité
$thumbnail_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);

// Evènement flèches

// Flèche gauche

let flecheGauche = document.querySelector(".arrow-left");
// Clickflèche désigne la variable commune aux deux flèches pour permettre l'incrémentation ou la décrémentation de la valeur numérique du contenu de la table "slides".
let clickFleche = 0;
flecheGauche.addEventListener("click", function() {
	// Décrémentation de la position de l'image/slide
	clickFleche--;
	// Condition if pour définir position de la slide après incrémentation
	if (clickFleche < 0) {
		// Définir le défilement et retour vers l'image initiale via -1 pour aller vers la dernière image de la liste du tableau et pas au-delà car le rang ne va que jusqu'à 3 (0 à 3)
		clickFleche = slides.length -1;
	}

	// Changer l'image
	const imageElement = document.querySelector(".banner-img");
	console.log(clickFleche);
	// + est une concaténation et pointe la propriété image à la position de sa valeur via "clickflèche"
	imageElement.src = "./assets/images/slideshow/" + slides[clickFleche].image;

});
	

// Flèche droite

let flecheDroite = document.querySelector(".arrow-right");
flecheDroite.addEventListener("click", function() {
	console.log("Bouton droit cliqué !")
	// Incrémentation de la position de l'image
	clickFleche++;
	if (clickFleche > slides.length -1) {
		clickFleche = 0;
	}

	// Changer l'image
	const imageElement = document.querySelector(".banner-img");
	imageElement.src = "./assets/images/slideshow/" + slides[clickFleche].image;
	
});
