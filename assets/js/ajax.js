// Ajax
// Chargement de la pagination

// garder en mémoire la 1ère page
let currentPage = 1;

// Fonction de chargement des pages
jQuery(document).ready(function($) {
	function ChargerPosts() {
		// +1 car chargement de la page suivante qui est incrémentée à la page actuelle 
		currentPage++;
    // Chargement du contenu avec les filtres actuels
    loadMore(currentPage, $('#catFilter').val(), $('#formFilter').val(), $('#triFilter').val());
  }
  
	// Gestion du clic sur le bouton "charger plus"
	$('#load-more').on('click', ChargerPosts);

  // Définir la fonction pour charger le contenu
  function loadMore(page, category, postFormat, postOrder) {
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
        // Ajouter le contenu à la liste existante par la réponse AJAX
        jQuery('.col-photo').append(res);
      }
    });
  }
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
        // Remplacer le contenu par la réponse AJAX
        jQuery('.col-photo').html(res);
      }
    });
  }
});
