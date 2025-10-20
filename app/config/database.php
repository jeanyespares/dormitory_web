<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| DATABASE CONFIGURATION
| -------------------------------------------------------------------
| Supported drivers: mysql, sqlite, sqlsrv
| Example DSN for MySQL: mysql:host=localhost;dbname=your_dbname
*/

$config['database'] = array(
    'default' => array(
        'driver'   => 'mysql',          // ✅ use 'mysql'
        'host'     => 'localhost',      // local server
        'username' => 'jeany',          // ✅ your MySQL username
        'password' => 'jeany',          // ✅ your MySQL password
        'dbname'   => 'dormitory_db',   // ✅ your database name
        'charset'  => 'utf8',
        'port'     => 3306
    )
);
?>
