// Ajax
// Chargement de la pagination

// garder en mémoire la 1ère page
let currentPage = 1;
// Fonction de chargement des pages
function ChargerPosts() {
	// +1 car chargement de la page suivante qui est incrémentée à la page actuelle 
	currentPage++; 

	$.ajax({
		type:'POST',
		url: '/wp-admin/admin-ajax.php',
		dataType: 'html',
		data: {
		action: 'gallery_load_more',
		paged: currentPage,
		category: $('#catFilter').val(),
		post_format: $('#formFilter').val(),
		post_ordre: $('#triFilter').val(),
	},
	success: function (res) {
		// Extraction des images par filtre
		const imageFilter = $(res).filter('.hover-photo');
		// Ajout contenu à la liste de images
		// classe à mettre dans 'functions'
		$('.albumPhoto').append(res);
		// MAJ liste d'images avec nouvelles images ajoutées précédement
		images = $('.albumPhoto .hover-photo');
		// MAJ lightbox pour ajout nouvelles images
		openLightbox();
		// MAJ filtres suite ajout nouveau contenu
		applyFilters();
	  	}
	});
}

// Gestion du clic sur le bouton "Load More"
$('#load-more').on('click', loadMorePosts);

// Fonction de chargement du contenu en utilisant AJAX avec des filtres
function loadContent(page, category, postFormat, postOrder) {
  // Effectuer une requête AJAX pour avoir le contenu filtré
  $.ajax({
    type: 'POST',
    url: 'wp-admin/admin-ajax.php',
    dataType: 'html',
    data: {
      action: 'gallery_load_more',
      paged: page,
      category: category,
      post_format: postFormat,
      post_ordre: postOrder,
    },
    success: function (res) {
      // Filtrer le nouveau contenu pour extraire les images
      const imageFilter = $(res).filter('.hover-photo');
      // Remplacer le contenu de .photos-acc par la réponse AJAX
      $('.albumPhoto').html(res);
      // Réinitialiser la liste d'images avec les nouvelles images ajoutées
      images = $('.albumPhoto .hover-photo');
    }
  });
}

// Fonction pour appliquer les filtres
function applyFilters() {
  // Réinitialisation de la page actuelle lorsque les filtres changent
  currentPage = 1;
  // Chargement du contenu avec les filtres actuels
  loadContent(currentPage, $('#catFilter').val(), $('#formFilter').val(), $('#triFilter').val());
}
// Géstion des changements dans les sélecteurs de filtre
$('#categFilter, #formFilter, #triFilter').on('change', applyFilters);

 
 



