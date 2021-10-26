<?php

namespace src\Helpers;

/**
 * Class for navigating to another site
 */
class Redirect
{
    /**
     * Redirect to URL
     * @param string $URL
     */
    public function httpRedirect(string $URL = '')
    {
        header("Location:" . $URL);
        exit();
    }

    /**
     * Redirect to Main Page
     */
    public function httpRedirectMainPage()
    {
        $this->httpRedirect(MAIN_PAGE);
    }

    /**
     * Getting the site URL
     * @return string
     */
    public function getUrl()
    {
        $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
        $url = explode('?', $url);

        return $url[0];
    }

}