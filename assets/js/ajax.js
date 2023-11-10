// Ajax

// document.addEventListener('DOMContentLoaded', function() {
// 	document.querySelector('#ajax_call').addEventListener('click', function() {
// 		let formData = new FormData();
// 		formData.append('action', 'request_mariage');
   
   
// 		fetch(script_js.ajax_url, {
// 			method: 'POST',
// 			body: formData,
// 		}).then(function(response) {
// 			if (!response.ok) {
// 			throw new Error('Network response error.');
// 		}
   
	
// 		return response.json();
// 		}).then(function(data) {
// 			data.posts.forEach(function(post) {
// 			document.querySelector('#ajax_return').insertAdjacentHTML('beforeend', '<div class="col-12 mb-5">' + post.post_title + '</div>');
// 		});
// 		}).catch(function(error) {
// 			console.error('There was a problem with the fetch operation: ', error);
// 		});
// 	});
// });

$('.cat-list_item').on('click', function() {
	$('.cat-list_item').removeClass('active');
	$(this).addClass('active');
  
	$.ajax({
		type: 'POST',
		url: '/wp-admin/admin-ajax.php',
		dataType: 'html',
		data: {
		action: 'filter_photos',
		category: $(this).data('slug'),
	  	},
	  	success: function(res) {
		$('.photo-tiles').html(res);
		}
	})
});

