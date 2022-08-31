<?php
session_start();

 $env_path=substr($_SERVER['DOCUMENT_ROOT'],0,-7);
 
require_once 'autoload.php';
require_once $env_path.'/Packages/PHPDOTENV/vendor/autoload.php';
require_once $env_path.'/Packages/SYMFONY/vendor/autoload.php';

use Dotenv\Dotenv;

//$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv = Dotenv::createImmutable($env_path);
$dotenv->load();



require_once 'config.php';

require_once $env_path.'/classes/Functions.php';

require_once 'routes.php';


?>