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