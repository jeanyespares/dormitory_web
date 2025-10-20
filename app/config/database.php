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
        'driver'   => 'mysql',          // ✅ use 'mysql' not 'mysqli'
        'host'     => 'localhost',
        'username' => 'jeany',           // default WAMP username
        'password' => 'jeany',               // default WAMP password is empty
        'dbname'   => 'dormitory_db',   // ✅ change this to your database name
        'charset'  => 'utf8',
        'port'     => 3306
    )
);
?>
