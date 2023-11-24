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