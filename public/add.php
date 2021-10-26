<?php
require_once dirname(__DIR__) . '/public/heading.php';

$resultMSG = RESULT_MESSAGE_DEFAULT;

if (isset($_POST["url"]) && strlen($_POST["url"]) > 0) {
    $postData = [
        'url' => preg_replace("#/$#", "", $_POST["url"]),
    ];
    $resultDB = $db->insert($postData);
    if ($resultDB) {
        $resultMSG = RESULT_MESSAGE_SHORT_URL
            . PHP_EOL
            . $redirect->getUrl()
            . "/"
            . $shortUrl->coder($db->getLastInsertId());
    }
}

echo $resultMSG;
