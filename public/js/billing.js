(function () {
	var StripeBilling = {
		init: function () {
			this.form = $('#billing-form');
			this.submitButton = this.form.find('input[type=submit]');
			this.submitButtonValue = this.submitButton.val();

			var stripeKey = $('#publishable-key').val();

			Stripe.setPublishableKey(stripeKey);

			this.bindEvents();		
		},

		bindEvents: function () {
			this.form.on('submit', $.proxy(this.sendToken, this));
		},

		sendToken: function (event) {
			event.preventDefault();

			this.submitButton.val('One Moment').prop('disabled', true);

			Stripe.createToken(this.form, $.proxy(this.stripeResponseHandler, this));
		},

		stripeResponseHandler: function (status, response) {	

			if (response.error) {
				this.form.find('.payment-errors').show().text(response.error.message);
				return this.submitButton.prop('disabled', false).val(this.submitButtonValue);
			}

			$('<input>',{
				type: 'hidden',
				name: 'stripeToken',
				value: response.id
			}).appendTo(this.form);

			this.form[0].submit();
		}

	};

	StripeBilling.init();
})();