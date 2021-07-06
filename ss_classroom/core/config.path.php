<?php

////////////////////////////////////////////////////////////////////////////////
// Configure the default time zone
////////////////////////////////////////////////////////////////////////////////
date_default_timezone_set('MST');

////////////////////////////////////////////////////////////////////////////////
// Configure the default currency
////////////////////////////////////////////////////////////////////////////////
setlocale(LC_MONETARY, 'en_US');

////////////////////////////////////////////////////////////////////////////////
// Define constants for database connectivty
////////////////////////////////////////////////////////////////////////////////
defined('DATABASE_HOST') ? NULL : define('DATABASE_HOST', 'localhost');
defined('DATABASE_NAME') ? NULL : define('DATABASE_NAME', 'ss_classroom');
defined('DATABASE_USER') ? NULL : define('DATABASE_USER', 'root');
defined('DATABASE_PASSWORD') ? NULL : define('DATABASE_PASSWORD', '');

////////////////////////////////////////////////////////////////////////////////
// Define absolute application paths
////////////////////////////////////////////////////////////////////////////////

// Use PHP's directory separator for windows/unix compatibility
defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);

// Define absolute path to server root
defined('SITE_ROOT') ? NULL : define('SITE_ROOT', dirname(dirname(__FILE__)).DS);

// Define absolute path to includes
defined('DIR_ROOT') ? NULL : define('DIR_ROOT','http://localhost/servicioSocial/ss_classroom'.DS);
defined('DIR_MODULES') ? NULL : define('DIR_MODULES',DIR_ROOT.'dev'.DS.'views'.DS.'modules'.DS);
defined('DEV_PATH') ? NULL : define('DEV_PATH', SITE_ROOT.'dev'.DS);
defined('MODEL_PATH') ? NULL : define('MODEL_PATH', DEV_PATH.'models'.DS);
defined('VIEW_PATH') ? NULL : define('VIEW_PATH', DEV_PATH.'views'.DS);
defined('CONTROLLER_PATH') ? NULL : define('CONTROLLER_PATH', DEV_PATH.'controllers'.DS);
defined('MODULES_PATH') ? NULL : define('MODULES_PATH',VIEW_PATH.'modules'.DS);
// echo MODEL_PATH;
defined('DIR_VIEWS') ? NULL : define('DIR_VIEWS','http://localhost/servicioSocial/ss_classroom/dev/views'.DS);

// BASE URL
$dir = "servicioSocial/ss_classroom/";
$base_url = "http://localhost/".$dir;