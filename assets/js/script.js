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
// $thumbnail_id = get_post_thumbnail_id();
// récupération de l'url de la photo -->
// $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'custom-size');
// Récupération de l'attribut ALT de l'image mise en avant pour une meilleure accessibilité
// $thumbnail_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);



// Carrousel

// let imageElement = document.querySelector(".image-slider");
let flechegauche = document.querySelector(".flechegauche");
let flechedroite = document.querySelector(".flechedroite");
// // Ce gestionnaire ne sera exécuté qu'une fois
// // lorsque le curseur se déplace sur la liste
// flechegauche.addEventListener("mouseenter", function (event){
//         // on met l'accent sur la cible de mouseenter
//         // event.target.style.color = "purple";
//         event.target.imageElement.src = "<?php echo get_the_post_thumbnail_url($previous) ?>";

//     },
//     false,
// );

// Test relier l'image aux flèches

let clickFleche = 0;


flechegauche.addEventListener("click", function() {
    clickFleche--;
    if(clickFleche < 0){
        console.log("Bouton gauche cliqué !")
        clickFleche = imageElement.length -1;
    }
    // Changer l'image
    let imageElement = document.querySelector(".image-slider");
    // let imageElement.src ="<?php echo get_the_post_thumbnail_url($previous) ?>";

});
flechedroite.addEventListener("click", function() {
    clickFleche++;
    if(clickFleche = imageElement.length -1){
        console.log("Bouton droit cliqué !")
        clickFleche = 0;
    }
    // Changer l'image
    let imageElement = document.querySelector(".image-slider");
    // let imageElement.src ="<?php echo get_the_post_thumbnail_url($next) ?>";

});

// // Ce gestionnaire sera exécuté à chaque fois que le curseur
// // se déplacera sur un autre élément de la liste
// flechegauche.addEventListener("mouseover", function (event){
//         // on met l'accent sur la cible de mouseover
//         // event.target.style.color = "orange";
//         event.target.imageElement.src = "<?php echo get_the_post_thumbnail_url($next) ?>";

//     },
//     false,
// );

// Flèche droite

// flechedroite.addEventListener("mouseenter", function (event){
//         // on met l'accent sur la cible de mouseenter
//         // event.target.style.color = "purple";
//         event.target.imageElement.src = "<?php echo get_the_post_thumbnail_url($next) ?>";

//     },
//     false,
// );

// flechedroite.addEventListener("mouseover", function (event){
//         // on met l'accent sur la cible de mouseover
//         // event.target.style.color = "orange";
//         event.target.imageElement.src = "<?php echo get_the_post_thumbnail_url($previous) ?>";

//     },
//     false,
// );


// Ajout référence photo dans le formulaire

var refPhoto = document.querySelector('.ref').innerText;
var btnCon = document.querySelector('.btn-contact');
var inputRef = document.querySelector('#reference');
btnCon.addEventListener('click', function(){
    inputRef.setAttribute('value', refPhoto);
});

