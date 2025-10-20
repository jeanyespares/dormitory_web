<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DATABASE CONFIGURATION
|--------------------------------------------------------------------------
| Supported drivers: mysql, sqlite, sqlsrv
| Example DSN for MySQL: mysql:host=localhost;dbname=your_dbname
*/

$config['database'] = [
    'main' => [
        'driver'   => 'mysql',
        'hostname' => 'localhost',
        'username' => 'jeany',
        'password' => 'jeany',
        'database' => 'dormitory_db',
        'charset'  => 'utf8',
        'port'     => 3306,
        'dbprefix' => ''
    ]
];
?>
