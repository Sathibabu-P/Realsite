<?php
defined('BASEPATH') OR exit('No direct script access allowed');




$route['admins'] = 'admin/admins/index';
$route['admins/login'] = 'admin/admins/login';

// City Resources
$route['admins/cities'] = 'admin/cities/index';
$route['admins/cities/create'] = 'admin/cities/create';
$route['admins/cities/edit'] = 'admin/cities/edit';
$route['admins/cities/edit/(:any)'] = 'admin/cities/edit';
$route['admins/cities/delete/(:any)'] = 'admin/cities/delete';

// Area Resources
$route['admins/areas'] = 'admin/areas/index';
$route['admins/areas/create'] = 'admin/areas/create';
$route['admins/areas/edit'] = 'admin/areas/edit';
$route['admins/areas/edit/(:any)'] = 'admin/areas/edit';
$route['admins/areas/delete/(:any)'] = 'admin/areas/delete';



// Property Types Resources
$route['admins/property_types'] = 'admin/property_types/index';
$route['admins/property_types/create'] = 'admin/property_types/create';
$route['admins/property_types/edit'] = 'admin/property_types/edit';
$route['admins/property_types/edit/(:any)'] = 'admin/property_types/edit';
$route['admins/property_types/delete/(:any)'] = 'admin/property_types/delete';


// Amenity Types Resources
$route['admins/amenities'] = 'admin/amenities/index';
$route['admins/amenities/create'] = 'admin/amenities/create';
$route['admins/amenities/edit'] = 'admin/amenities/edit';
$route['admins/amenities/edit/(:any)'] = 'admin/amenities/edit';
$route['admins/amenities/delete/(:any)'] = 'admin/amenities/delete';

// Properity  Resources
$route['admins/properties'] = 'admin/properties/index';
$route['admins/properties/create'] = 'admin/properties/create';
$route['admins/properties/edit'] = 'admin/properties/edit';
$route['admins/properties/edit/(:any)'] = 'admin/properties/edit/$1';
$route['admins/properties/delete/(:any)'] = 'admin/properties/delete/$1';




$route['properties'] = 'properties/index';
$route['property/(:any)'] = 'property/$1';

$route['properties/enquiry'] = 'properties/enquiry';


$route['properties/view'] = 'properties/view';
$route['properties/view/(:any)'] = 'properties/view/$1';

$route['properties/search'] = 'properties/index';
$route['properties/page'] = 'properties/index';
$route['properties/page/(:any)'] = 'properties/index';





$route['users'] = 'users/dashboard';
$route['users/index'] = 'users/index';
$route['users/facebook'] = 'users/facebook';
$route['users/login'] = 'users/login';
$route['users/register'] = 'users/register';
$route['users/dashboard'] = 'users/dashboard';
$route['users/profile'] = 'users/profile';
$route['users/changepassword'] = 'users/changepassword';
$route['users/properties'] = 'users/properties';
$route['users/property/create'] = 'users/property_create';
$route['users/property/edit'] = 'users/property_edit';
$route['users/property/edit/(:any)'] = 'users/property_edit/$1';
$route['users/property/(:any)/delimg/(:any)'] = 'users/delimg/$1';



$route['default_controller'] = 'properties';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
