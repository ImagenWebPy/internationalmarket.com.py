<?php

/**
 * ARCHIVO DE CONFIGURACIONES
 * @author "Raul Ramirez" <raul.chuky@gmail.com>
 * @version 1 2018-07-06
 */
// Always provide a TRAILING SLASH (/) AFTER A PATH
//header('Content-type: text/plain; charset=utf-8');
$host = getHost();
switch ($host) {
    case 'localhost':
        define('URL', 'http://localhost/internationalmarket.com.py/');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'international_market');
        define('DB_HOST', 'localhost');
        break;
}
define('LIBS', 'libs/');

define('DB_TYPE', 'mysql');


// This is for database passwords only
define('HASH_PASSWORD_KEY', '!@123456789ABCDEFGHIJKLMNOPRSTWYZ[¿]{?}<->::abcdefghijklmnopqrstwyxz;');

//Constantes varias
define('SITE_TITLE', 'International Market - ');
define('TITLE', 'Administrador IM - ');
define('CANT_REG', 12);

function getHost() {
    $host = $_SERVER['HTTP_HOST'];
    return $host;
}
