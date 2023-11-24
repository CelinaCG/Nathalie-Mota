// Ajax

const ajaxFilter = document.getElementById( 'ajax-filter' )
const siteContent = document.getElementById( 'site-content' )

ajaxFilter.querySelector( 'select' ).addEventListener( 'change', event => {
	
	// .is-loading{ opacity: 0.5 } creates that opacity-like effect
	siteContent.classList.add( 'is-loading' )
	
	fetch( ajaxurl + '?action=ajaxfilter', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify( { 
			'cat' : event.target.value 
		} ),
	}).then( response => {
		return response.text()
	}).then( response => {

		if( response ) {
			siteContent.innerHTML = response;
		}
		siteContent.classList.remove( 'is-loading' )
		// console.log( response );

	}).catch( error => {
		console.log( error )
	})

} )

// Essai 2

var taxonomies = wp_get_available_taxonomies();
var selectElement = document.querySelector('select#my-filter');


// Add an event listener to the change event
selectElement.addEventListener('change', function() {
	var selectedTaxonomy = selectElement.value;
	// Your filter logic goes here
  });


