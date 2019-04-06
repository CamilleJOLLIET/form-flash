<?php 

class Http
{
    /**
     * Permet de rediriger l'utilisateur vers une URL
     *
     * @param string $url
     * @return void
     */
    public static function redirect(string $url)
    {
        header("Location: $url");
        exit();
    }

    /**
     * Permet de rediriger l'utilisateur vers la page précédente
     *
     * @return void
     */
    public static function redirectBack()
    {
        self::redirect($_SERVER['HTTP_REFERER']);
    }

}

?>