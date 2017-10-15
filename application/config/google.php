<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '824834782099-3tvqqqispu2db0da3637me69b2ki100b.apps.googleusercontent.com';
$config['google']['client_secret']    = 'mRHQ6kOpcvxQ5r2lalN2I3ie';
$config['google']['redirect_uri']     = 'http://localhost/realsite/users/google';
$config['google']['application_name'] = 'codeIgniter';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array('email','profile');