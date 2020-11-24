<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Paragon';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

			//=================//
			//===== Admin =====//
			//=================//

$route['admin-login'] = 'Admin/index';
$route['dashboard'] = 'Admin/dashboard';
$route['logout'] = 'Admin/logout';
$route['setting'] = 'Admin/setting';
$route['add-brand'] = 'Admin/add_brand';
$route['manage-brands'] = 'Admin/manage_brand';
$route['delete-record/(:any)/(:any)'] = 'Admin/delete/$2/$3';
$route['edit/(:any)/(:any)'] = "Admin/edit/$2/$3";
$route['add-model'] = 'Admin/add_model';
$route['manage-models'] = 'Admin/manage_model';
$route['models-edit/(:any)/(:any)'] = 'Admin/models_edit/$2/$3';
$route['add-access'] = 'Admin/add_access';
$route['manage-access'] = 'Admin/manage_access';
$route['edit-access/(:any)/(:any)'] = 'Admin/edit_access/$2/$3';
$route['update-tax'] = 'Admin/update_tax';
$route['manage-orders'] = 'Admin/manage_orders';
$route['add-user'] = 'Admin/add_user';
$route['manage-users'] = 'Admin/manage_users';
$route['edit-userdetail/(:any)/(:any)'] = 'Admin/edit_user_details/$2/$3';
$route['manage-subscribers'] = 'Admin/manage_subscribers';
$route['admin-ajax'] = 'Admin/admin_ajax';

			//=================//
			//===== USER ======//
			//=================//


// route for index.php
//-----------------------------------------------------//
$route['paragon'] = 'Paragon/index';

// route for login.php
//-----------------------------------------------------//
$route['login'] = 'Paragon/login';

// route for login.php
//-----------------------------------------------------//
$route['logout'] = 'Paragon/logout';

// route for register.php
//-----------------------------------------------------//
$route['registration'] = 'Paragon/register';

// route for brand-new.php
//-----------------------------------------------------//
$route['brands'] = 'Paragon/brand';

// route for brand-company.php
//-----------------------------------------------------//
$route['brand/(:any)'] = 'Paragon/all_brand/$2';

// route for product-details.php
//-----------------------------------------------------//
$route['product/(:any)'] = 'Paragon/product/$2';

// route for ajax.inx.php
//-----------------------------------------------------//
$route['ajax'] = 'Paragon/ajax';

// route for cart.php
//-----------------------------------------------------//
$route['cart'] = 'Paragon/cart';

// route for checkout.php.php
//-----------------------------------------------------//
$route['checkout'] = 'Paragon/checkout';

// route for brand-details-new.php
//-----------------------------------------------------//
$route['model_new/(:any)'] = 'Paragon/brands_new';

// route for search.php
//-----------------------------------------------------//
$route['search'] = 'Paragon/search';

// route for About-Us.php
//-----------------------------------------------------//
$route['about-us'] = 'Paragon/about_us';

// route for FAQ.php
//-----------------------------------------------------//
$route['faq'] = 'Paragon/faq';

// route for FAQ.php
//-----------------------------------------------------//
$route['contact-us'] = 'Paragon/contact_us';

// route for Profile.php
//-----------------------------------------------------//
$route['profile'] = 'Paragon/profile';

// route for ccavResponseHandler.php
//-----------------------------------------------------//
$route['ccavResponseHandler'] = 'Paragon/ccavResponseHandler';

// route for do-payment.php
//-----------------------------------------------------//
$route['do-payment'] = 'Paragon/do_payment';

// route for ccavRequestHandler.php
//-----------------------------------------------------//
$route['ccavRequestHandler'] = 'Paragon/ccavRequestHandler';

// route for setOrder.php
//-----------------------------------------------------//
$route['setOrder'] = 'Paragon/setOrder';

// route for order-history.php
//-----------------------------------------------------//
$route['order-history'] = 'Paragon/order_history';

// route for invoices.php
//-----------------------------------------------------//
$route['invoices/(:any)'] = 'Paragon/invoices/$2';

// route for shipping-delivery.php
//-----------------------------------------------------//
$route['shipping-delivery'] = 'Paragon/shipping_delivery';

// route for Payment.php
//-----------------------------------------------------//
$route['payment'] = 'Paragon/payment';

// route for Terms.php
//-----------------------------------------------------//
$route['terms'] = 'Paragon/terms';
