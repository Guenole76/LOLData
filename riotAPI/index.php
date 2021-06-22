<?php

// on se situe dans le dossier RioterAPI/www, donc on remonte d'un dossier et c'est la base
define('BASE_PATH', realpath(__DIR__ . '/..'));




// /!\

// dossier de base (pour les chemins)
define('DIR_BASE', rtrim(str_replace(str_replace('\\', DIRECTORY_SEPARATOR, $_SERVER['DOCUMENT_ROOT']), '', BASE_PATH), DIRECTORY_SEPARATOR));
// url relative de base (rajoute un / a la fin)
define('URL_BASE_REL', str_replace('\\', '/', DIR_BASE).'/');
// protocol utilisé
define("URL_PROTOCOL", strpos($_SERVER['SERVER_PROTOCOL'], 'HTTPS')===0 ? 'https' : 'http');
// url absolue
define('URL_BASE_ABS', URL_PROTOCOL.'://'.$_SERVER['HTTP_HOST'].DIR_BASE);

//















// dossiers dans le dossier racine du projet RiotAPI/
define('VIEWS_PATH', realpath(BASE_PATH . '/riotAPI/views'));
define('WWW_PATH', realpath(BASE_PATH . '/www'));

// dossiers dans le dossier www/
define('THEME_PATH', realpath(BASE_PATH . '/riotAPI/theme'));
define('SRC_PATH', realpath(BASE_PATH . '/riotAPI/src'));
define('DATA_PATH', realpath(BASE_PATH . '/riotAPI/data'));


//var_dump(scandir(BASE_PATH)); 

// Nouveau site
require(SRC_PATH . '/Site.php');

$oSite = new Site();

$oSite->createContent();




require(THEME_PATH . '/php/template.php');