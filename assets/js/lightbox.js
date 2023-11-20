// Prendre le lightbox et les éléments de l'overlay
var lightbox = document.getElementById('myLightbox');

// Activation du lightbox par l'image zoom
var zoomLightbox = document.querySelector('.lightbox-open');

// Ouverture de la lighbox au clic sur l'image zoom
zoomLightbox.onclick = function() {
    lightbox.style.display = "block";
}

// Fermeture de la modale au clic sur la croix
window.onclick = function(event) {
    if (event.target == lightbox) {
        lightbox.style.display = "none";
    }
}