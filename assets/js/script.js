// Apparition modale
var modal = document.getElementById('myModal');

// Activation bouton de la modale
var btn = document.querySelector('.contact');

// Ouverture de la modale au clic
btn.onclick = function() {
    modal.style.display = "block";
}

// Fermeture de la modale au clic n'importe où à l'extérieur
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

// Hover diaporama single page

var diapo = document.querySelector('.display-slider');
var arrowleft = document.querySelector('.flechegauche');
var arrowright = document.querySelector('.flechedroite');

// Flèche gauche
arrowleft.addEventListener('mouseenter', function(){
    // Non affichage de l'image au survol
    document.querySelector('.display-slider').style.display="none"; 
    // Affichage de l'image au survol
    document.querySelector('.display-image').style.display="block";
});

// Flèche droite
arrowright.addEventListener('mouseenter', function(){
    // Affichage de l'image au survol
    document.querySelector('.display-slider').style.display="block";
    // Non affichage de l'image au survol
    document.querySelector('.display-image').style.display="none";
});

// Ajout référence photo dans le formulaire

var refPhoto = document.querySelector('.ref').innerText;
var btnCon = document.querySelector('.btn-contact');
var inputRef = document.querySelector('#reference');
btnCon.addEventListener('click', function(){
    inputRef.setAttribute('value', refPhoto);
});

