<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| AUTO-LOADER CONFIGURATION
|--------------------------------------------------------------------------
| Specifies which systems should be loaded by default.
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Auto-load Libraries
|--------------------------------------------------------------------------
| Load essential libraries automatically
*/
$autoload['libraries'] = array('database');

/*
|--------------------------------------------------------------------------
| Auto-load Helper Files
|--------------------------------------------------------------------------
| Common helper files used in the app
*/
$autoload['helpers'] = array('url', 'form');

/*
|--------------------------------------------------------------------------
| Auto-load Models
|--------------------------------------------------------------------------
| Models that will always be available
*/
$autoload['models'] = array('');

/*
|--------------------------------------------------------------------------
| Auto-load Config Files
|--------------------------------------------------------------------------
| Add custom config files if needed
*/
$autoload['configs'] = array();
?>
