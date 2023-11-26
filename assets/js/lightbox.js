// Déclarer images utilisées dans le lightbox à l'extérieur et non dans la fonction car var doit être accessible à partir de cette fonction et pouvoir donner l'accessibilité aux évènements du click à intéragir avec cette var
let images;

jQuery(document).ready(function ($) {
    // index de l'image affichée dans lightbox
    let currentIndex = 0;
    // Element contenu dans l'ID container du lightbox
    const lightbox = $('#custom-lightbox');
    // Element de l'image affichée
    const lightboxImage = $('#lightbox-image');
    // Bouton croix
    const closeLightboxButton = $('.close-lightbox');
    // Légende
    const lightboxTextDiv = $('.lightboxText');

    // Initialisation des images avec les éléments .lightbox-open
    images = $('.lightbox-open');

    // Affiche la lightbox
    function openLightbox(index) {
        currentIndex = index;
        updateLightboxContent();
        updatelightboxTextContent();
        lightbox.show();
    }

    // Ferme la lightbox
    function closeLightbox() {
        lightbox.hide();
    }

    // Met à jour le contenu de la lightbox avec l'image actuelle
    function updateLightboxContent() {
        // Prendre image de l'objet Jquery "images" de l'index de l'image selectionnée
        const currentImage = images.eq(currentIndex);
        // Récup l'url de l'image actuelle dans 'data-image'
        const imageUrl = currentImage.attr('data-image');
        // Mise en place de l'url via le src pour afficher l'image
        lightboxImage.attr('src', imageUrl);
    }

    // Met à jour le contenu de la div avec la catégorie et la référence
    function updatelightboxTextContent() {
        // Prendre image de l'objet Jquery "images" de l'index de l'image selectionnée
        const currentImage = images.eq(currentIndex);
        // Valeur de la catégorie
        const category = currentImage.attr('data-category');
        // Valeur de la référence
        const reference = currentImage.attr('data-reference');

        // afficher les valeurs dans la console pour vérification
        console.log('Category:', category);
        console.log('Reference:', reference);
        // Affichage en texte des valeurs cat et ref
        const categoryText = category ? `<p> ${category}</p>` : '';
        const referenceText = reference ? `<p> ${reference}</p>` : '';
        // MAJ contenu texte de la lightbox
        lightboxTextDiv.html(categoryText + referenceText);
    }

    // Change l'image dans la lightbox en fonction de la direction (prev ou next)
    function changeImage(direction) {
        currentIndex = (currentIndex + direction + images.length) % images.length;
        updateLightboxContent();
        updatelightboxTextContent();
    }

    // Délégation d'événements : attachement évènements (event listener) à des éléments parent de la page. ici, élément image via classe lightbox-open
    $(document).on('click', '.lightbox-open', function () {
        openLightbox(images.index(this));
    });

    closeLightboxButton.on('click', closeLightbox);

    // Gérer l'événement du bouton "précédent"
    $('.prev').on('click', function () {
        changeImage(-1);
    });

    // Gérer l'événement du bouton "suivant"
    $('.next').on('click', function () {
        changeImage(1);
    });
});
