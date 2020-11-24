<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Stripe API Configuration
| -------------------------------------------------------------------
|
| You will get the API keys from Developers panel of the Stripe account
| Login to Stripe account (https://dashboard.stripe.com/)
| and navigate to the Developers » API keys page
|
|  stripe_api_key        	string   Your Stripe API Secret key.
|  stripe_publishable_key	string   Your Stripe API Publishable key.
|  stripe_currency   		string   Currency code.
*/
$config['stripe_publishable_key']   = 'pk_test_51Hh6ZIL6hSzqOO7QgUjBxdczPmADIfysQKshV2OMGhacweaB62ZGSaCYU9gKiUCmBLeO87RMlQOn3JJKe2kNQjCn00bjnhuwL0'; 
$config['stripe_api_key']           = 'sk_test_51Hh6ZIL6hSzqOO7QJxTK0AyXU2W8SP1V8nZqFuiExmCfYDlGyzV14aPYNqGefhTqzmeGhpvbp0yYseZCrIIWG8HM00LpfYIBB9'; 
$config['stripe_currency']          = 'inr';