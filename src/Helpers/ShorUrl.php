<?php

namespace src\Helpers;

/**
 * Class for creating a short site address
 */
class ShorUrl
{
    /**
     * Getting a short URL
     * @param string $url
     * @return string
     */
    public function coder(string $url)
    {
        return base_convert($url, 10, 36);
    }

    /**
     * Transformation short url to id record
     * @param string $shortUrl
     * @return string
     */
    public function decoder(string $shortUrl)
    {
        return base_convert($shortUrl, 36, 10);
    }
}