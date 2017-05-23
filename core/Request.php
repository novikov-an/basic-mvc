<?php
namespace App\Core;

/**copyright**/
class Request
{
    public static function uri()
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = str_replace('index.php', '', $url);

        if (!empty($uri)) {
            $uri = str_replace('/', '', $uri);
        }
        $uri = trim($uri, '/');

        return $uri;
    }

    /**
     * Return request type
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}