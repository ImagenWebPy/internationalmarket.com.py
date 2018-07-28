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
//        define('DB_PASS', 'cThoNTJ0cy9tVU5lQ3JnTDgrbXZxdz09');
        define('DB_PASS', '');
        define('DB_NAME', 'international_market');
        define('DB_HOST', 'localhost');
        break;
    case 'internationalmarket.com.py':
        define('URL', 'http://internationalmarket.com.py/v2/');
        define('DB_USER', 'inter_user');
        define('DB_PASS', 'Y201dXhBWWxNZVpKOXZsNVIyZ1JydDhmc3R3WG1NSExMQTFjZ2NYT3MyMD0=');
        define('DB_NAME', 'inter_nationalmarket');
        define('DB_HOST', 'localhost');
        break;
    case 'www.internationalmarket.com.py':
        define('URL', 'http://www.internationalmarket.com.py/v2/');
        define('DB_USER', 'inter_user');
        define('DB_PASS', 'Y201dXhBWWxNZVpKOXZsNVIyZ1JydDhmc3R3WG1NSExMQTFjZ2NYT3MyMD0=');
        define('DB_NAME', 'inter_nationalmarket');
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

define('KEY_FILE_LOCATION', 'public/json/International Market-d215e30f9ba1.json');

function getHost() {
    $host = $_SERVER['HTTP_HOST'];
    return $host;
}
