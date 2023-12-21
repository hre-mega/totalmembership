<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['register'] = 'registration/register';
$route['mechanics'] = 'registration/mechanics';
$route['policy'] = 'registration/policy';
$route['stations'] = 'registration/stations';
$route['success'] = 'registration/success';

$route['submit_entry'] = 'registration/submit_entry';

$route['default_controller'] = 'registration/index';
$route['(:any)'] = 'main/shortLinks/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


