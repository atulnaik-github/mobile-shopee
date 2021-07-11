<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// adminarea routes
$route['admin'] = 'adminarea';
$route['admin-dashboard'] = 'adminarea/dashboard';
$route['admin-change-password'] = 'adminarea/change_password';

// staff-area routes
$route['system-logs'] = 'adminarea';
$route['forgot-password'] = 'forgot/forgot_password';
$route['forgot-password/otp'] = 'forgot/otp';
$route['reset-password'] = 'forgot/reset_password';
$route['dashboard'] = 'staffarea/dashboard';
$route['change-password'] = 'staffarea/change_password';

// login
$route['login-action'] = 'Login/login_action';
$route['logout-action'] = 'Login/logout_action';
// brands
$route['master/add-brands'] = 'adminarea/add_brands';
$route['master/edit-brands/(:num)'] = 'adminarea/edit_brands/$1';
$route['master/delete-brands/(:num)'] = 'adminarea/delete_brands/$1';

// staff
$route['add-staff'] = 'adminarea/add_staff';
$route['edit-staff/(:num)'] = 'adminarea/edit_staff/$1';
$route['delete-staff/(:num)'] = 'adminarea/delete_staff/$1';
$route['get-staff-list-data'] = 'Datatable/get_staff_table';

// repair
$route['repair-action'] = 'adminarea/repair_action';
$route['edit-repair/(:num)'] = 'adminarea/edit_repair/$1';
$route['delete-repair/(:num)'] = 'adminarea/delete_repair/$1';
//supplier
$route['edit-supplier/(:num)'] = 'adminarea/edit_supplier/$1';
$route['delete-supplier/(:num)'] = 'adminarea/delete_supplier/$1';
$route['get-supplier-list-data'] = 'Datatable/get_supplier_table';

// product
$route['edit-product/(:num)'] = 'adminarea/edit_product/$1';
$route['delete-product/(:num)'] = 'adminarea/delete_product/$1';
$route['get-product-list-data'] = 'Datatable/get_product_list_data';
