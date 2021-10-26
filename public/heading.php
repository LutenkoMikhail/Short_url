<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once '..\vendor\autoload.php';
require_once dirname(__DIR__) . '/Config/constants.php';
require_once dirname(__DIR__) . '/Config/database.php';

use src\Helpers\Redirect, src\Helpers\ShorUrl, src\Helpers\DB;

$shortUrl = new ShorUrl();
$redirect = new Redirect();
$db = new DB(DB_TABLE, DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);