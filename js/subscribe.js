function hsInitializeSubscribeForm() {
	var $alert = $('.save-job-alert-container');
	var $form = $('.save-job-alert-form');
	var subscribeData = window.subscribeData;
	var $emailField = $('#jobAlertEmail');
	var $submitBtn = $form.find('.alert-submit');
	var $responeMessage = $form.find('.alert-message');
	var messages = {
		btnSuccess: 'Готово'
	};
	// console.log("subscribe: ссылка на subscribeData: " + window.subscribeData);
	// console.log(window);
	
	
	
	
	$form.on('submit', function (e) {

		e.preventDefault();
		var $searchText = $('#vacancy-search-text');
		var $location = $('#vacancy-search-location');
		var email = $emailField.val();
		
		console.log("searchText = " + $searchText.val() );
		console.log("search-location = " + $location.val() );
		console.log("email = " + email );
		
		if (email) {
			$.post({
				url: window.subscribeData.ajax,
				data: {
					email: email,
					action: 'job_alert_subscribe',
					nonce: window.subscribeData.nonce,
					location: $location.val(),
					searchQuery: $searchText.val()
				}
			})
				.then(function (responseBody) {
					console.log(responseBody);
					if (responseBody.success) {
						$submitBtn.text(messages.btnSuccess);
						$submitBtn.addClass('success');
						$responeMessage.addClass('success');
						$form[0].reset();
						$submitBtn.attr('disabled', true);
					} else {
						$responeMessage.addClass('fail');
						// handle error
					}

					$responeMessage.show();
					$responeMessage.text(responseBody.data.message);

				}, function (response) {
					// handle error
					console.log(response);
				});
			console.log("subscribe: email ушел по ajax");
		}else{
			console.log("subscribe: пустой email");
		}
	});
}

document.addEventListener('vueready', hsInitializeSubscribeForm);