<?php namespace Acme\Billing;

use Stripe;
use Stripe_Charge;
use Stripe_CardError;
use Stripe_InvalidRequestError;
use Exception;
use Config;
use Redirect;

/**
* Stripe Billing
*/
class StripeBilling implements BillingInterface
{
	
	function __construct()
	{
		Stripe::setApiKey(Config::get('stripe.secret_key'));
	}

	public function charge(array $data)
	{

		try
		{
			return Stripe_Charge::create([
				'amount' => 1200,
				'currency' => 'usd',
				'description' => $data['email'],
				'card' => $data['token']
			]);
	
		} catch (Stripe_InvalidRequestError $e) {
		  throw new Exception($e->getMessage());

		} catch (Stripe_AuthenticationError $e) {
		  throw new Exception($e->getMessage());

		} catch (Stripe_ApiConnectionError $e) {
		  throw new Exception($e->getMessage());

		} catch (Stripe_Error $e) {
		  throw new Exception($e->getMessage());

		} catch (Exception $e) {
		  throw new Exception($e->getMessage());
		}
	}


}