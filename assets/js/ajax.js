// Ajax
// Gestion de la pagination selon filtre

// Garder en mémoire la 1ère page
let currentPage = 1;
// Fonction de chargement des pages

jQuery(document).ready(function($) {
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

	// Gestion du clic sur le bouton "charger plus"
	$('#load-more').on('click', ChargerPosts);
});

// Fonction de chargement du contenu en utilisant AJAX avec des filtres

jQuery(document).ready(function($) {
  function applyFilters() {
    // Réinitialisation de la page actuelle lorsque les filtres changent
    currentPage = 1;
    // Chargement du contenu avec les filtres actuels
    loadContent(currentPage, $('#catFilter').val(), $('#formFilter').val(), $('#triFilter').val());
  }

  // Gestion des changements dans les sélecteurs de filtre
  $('#catFilter, #formFilter, #triFilter').on('change', applyFilters);
  
  // loadContent pour charger le contenu
  function loadContent(page, category, postFormat, postOrder) {
    // Effectuer une requête AJAX pour avoir le contenu filtré
    jQuery.ajax({
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
		    console.log('application du filtre');
        // Filtrer le nouveau contenu pour extraire les images
        const imageFilter = jQuery(res).filter('.lightbox-open');
        // Remplacer le contenu de la classe .col-photo par la réponse AJAX
        jQuery('.col-photo').html(res);
        // Réinitialiser la liste d'images avec les nouvelles images ajoutées
        images = jQuery('.col-photo .lightbox-open');
      }
    });
  }
});
