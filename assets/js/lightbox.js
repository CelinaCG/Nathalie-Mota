// Prendre le lightbox et les éléments de l'overlay
var lightbox = document.querySelector('#myLightbox');
jQuery(document).ready(function() {
    // Activation du lightbox par l'image zoom
    var zoomLightbox = document.querySelectorAll('.lightbox-open');

    // Ouverture de la lightbox au clic sur l'image zoom
    zoomLightbox.forEach(function(zoom, index) {
        zoom.addEventListener('click', function(e) {
            // Eviter le comportement par défaut de l'évènement (ex: éviter que le navigateur accède à une autre page que la page actuelle )
            e.preventDefault();
            // Affichage du lightbox
            lightbox.style.display = "block";
        });
    });
});

// Fermeture de la lightbox au clic sur la croix
document.querySelector('.exit-lightbox').addEventListener('click', function(e) {
    e.preventDefault();
    lightbox.style.display="none";
});


// Essai

// Déclarer les photos
// let images; 

// $(document).ready(function() {
//     var currentIndex = 0;
//     const lightbox = $('#custom-lightbox');
//     const lightboxImage = $('#lightbox-image');
//     const closeLightboxButton = $('.exit-lightbox');
//     const lightboxTextDiv = $('.legend-lb-align');
    

    // Initialisation des images avec la classe 'full screen'
    // images = $('.zoom-image');




    // MAJ du contenu de la lightbox avec l'image actuelle
    // function updateLightboxContent() {
    //     const currentImage = images.eq(currentIndex);
    //     const imageUrl = currentImage.attr('data-image');
    //     lightboxImage.attr('src', imageUrl);
    // }

    // MAJ du contenu de la div avec la catégorie et la référence
    // function updatelightboxTextContent() {
    //     const currentImage = images.eq(currentIndex);
    //     const category = currentImage.attr('data-category');
    //     const reference = currentImage.attr('data-reference');

    //     console.log('Category:', category);
    //     console.log('Reference:', reference);

    //     const categoryText = category ? `<p> ${category}</p>` : '';
    //     const referenceText = reference ? `<p> ${reference}</p>` : '';

    //     lightboxTextDiv.html(categoryText + referenceText);
    // }

    // Change l'image dans la lightbox en fonction de la direction (gauche ou droite)
    // function changeImage(direction) {
    //     currentIndex = (currentIndex + direction + images.length) % images.length;
    //     updateLightboxContent();
    //     updatelightboxTextContent();
    // }

    // Événements - utilise la délégation d'événements
//     $(document).on('click', '.zoom-image', function () {
//         openLightbox(images.index(this));
//     });

//     closeLightboxButton.on('click', closeLightbox);

//     // Gérer l'événement du bouton "précédent"
//     $('.flechegauche-overlay-inactive').on('click', function () {
//         changeImage(-1);
//     });

//     // Gérer l'événement du bouton "suivant"
//     $('.flechedroite-overlay-inactive').on('click', function () {
//         changeImage(1);
//     });

// });

