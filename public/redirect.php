<?php
require_once dirname(__DIR__) . '/public/heading.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

if (strlen($uri) > 0) {
    $record = $db->getRecordById($shortUrl->decoder($uri));
    if ($record) {
        $redirect->httpRedirect($record['url']);
    } else {
        $redirect->httpRedirectMainPage();
    }
}


