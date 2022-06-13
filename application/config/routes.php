<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*dashboard*/
$route['login'] = 'backend/Auth/index';
$route['forgot-password'] = 'backend/Auth/forgotPassword';
$route['reset-password']="backend/Auth/resetPassword";
$route['change-password'] = 'backend/Auth/changePassword';
$route['logout']='backend/Auth/logout';
$route['dashboard'] = 'backend/Admin/index';

$route['admins'] = 'backend/Admin/admins';
$route['admin'] = 'backend/Admin/create';
$route['profile'] = 'backend/Admin/profile';
$route['admin/(:any)/delete'] = 'backend/Admin/delete/$1';

$route['certificates'] = 'backend/Certificate/index';
$route['certificate'] = 'backend/Certificate/create';
$route['(:any)/certificate'] = 'backend/Certificate/edit/$1';
$route['certificate/(:any)/delete'] = 'backend/Certificate/delete/$1';

$route['fire-extinguishers'] = 'backend/Fire/index';
$route['fire-extinguisher'] = 'backend/Fire/create';
$route['(:any)/fire-extinguisher'] = 'backend/Fire/edit/$1';
$route['fire-extinguisher/(:any)/delete'] = 'backend/Fire/delete/$1';
/*dashboard*/

/**api */
$route['api/certificates'] = "api/Certificate/certificates";
$route['api/search/certificate'] = "api/Certificate/certificates";
/**api */

$route['default_controller'] = 'welcome';
$route['404_override'] = 'Custom404';
$route['translate_uri_dashes'] = FALSE;
