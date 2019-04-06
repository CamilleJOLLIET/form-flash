<?php
require_once('Http.php');

class Request
{
    /**
     * Constante qui représente FILTER_VALIDATE_EMAIL
     * On l'appelle en disant Request::EMAIL (et ça équivaut à dire FILTER_VALIDATE_EMAIL)
     */
    const EMAIL = FILTER_VALIDATE_EMAIL;

    /**
     * Constante qui représente FILTER_VALIDATE_INT
     * On l'appelle en disant Request::INT (et ça équivaut à dire FILTER_VALIDATE_INT)
     */
    const INT = FILTER_VALIDATE_INT;

    /**
     * Constante qui représente FILTER_SANITIZE_SPECIAL_CHARS
     * On l'appelle en disant Request::SAFE (et ça équivaut à dire FILTER_SANITIZE_SPECIAL_CHARS)
     */
    const SAFE = FILTER_SANITIZE_SPECIAL_CHARS;

    /**
     * Permet de récupérer une information dans la requête (POST ou GET) en donnant la priorité au POST
     *
     * @param string $name
     * @param integer $filter
     * @return void
     */
    public static function get(string $name, int $filter = FILTER_DEFAULT)
    {
        // On essaye d'extraire à partir du POST
        $value = filter_input(INPUT_POST, $name, $filter);

        // Si on ne la trouve pas dans le POST on essaye avec le GET
        if (!$value) {
            $value = filter_input(INPUT_GET, $name, $filter);
        }

        // On retourne la valeur
        return $value;
    }

    /**
     * Permet de rediriger vers une URL si POST est vide
     *
     * @param string $url
     * @return void
     */
    public static function redirectIfNotSubmitted(string $url)
    {
        if (empty($_POST)) {
            Http::redirect($url);
        }
    }
}

