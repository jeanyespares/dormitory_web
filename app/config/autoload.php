<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 * AUTO-LOADER CONFIGURATION FILE
 * ------------------------------------------------------------------
 * This file specifies which systems should be loaded by default.
 * ------------------------------------------------------------------
 */

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| Example:
|   $autoload['libraries'] = array('database', 'session', 'email');
*/
$autoload['libraries'] = array('database');

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Example:
|   $autoload['helpers'] = array('url', 'form');
*/
$autoload['helpers'] = array('url', 'form');

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Example:
|   $autoload['models'] = array('User_model', 'Tenant_model');
|
| Add all models you want to be available globally.
*/
$autoload['models'] = array('Tenant_model');

/*
| -------------------------------------------------------------------
|  Auto-load Config Files
| -------------------------------------------------------------------
| Example:
|   $autoload['configs'] = array('custom_config');
|
| Only use this if you have your own custom config files.
*/
$autoload['configs'] = array();
?>
