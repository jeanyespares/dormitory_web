<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/*
|-------------------------------------------------------------------------- 
| DATABASE CONFIGURATION
|-------------------------------------------------------------------------- 
*/

return [
    'main' => [
        'driver'   => 'mysql',
        'hostname' => 'localhost',
        'username' => 'jeany',         // your MySQL username
        'password' => 'jeany',         // your MySQL password
        'database' => 'lognstay_db',   // ✅ your actual database name
        'charset'  => 'utf8',
        'port'     => 3306,
        'dbprefix' => ''
    ]
];
