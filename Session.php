<?php

session_start();

class Session {

/**
     * Permet de mettre en place la session d'un utilisateur qui se connecte
     *
     * @param array $user
     * @return void
     */
    public static function connect()
    {
        if (empty($_SESSION['messages'])) {
            $_SESSION['messages'] = [
                'errors' => [],
                'success' => []
            ];
        }
    }

/**
     * Permet d'ajouter un message FLASH au FlashBag
     *
     * @param string $type
     * @param string $message
     * @return void
     */
    public static function addFlash(string $type, string $message)
    {
        $_SESSION['messages'][$type][] = $message;
    }

    /**
     * Permet de récupérer les messages d'un certain type puis de les supprimer
     *
     * @param string $type
     * @return array
     */
    public static function getFlashes(string $type) : array
    {
        if (empty($_SESSION['messages'])) {
            return [];
        }

        $messages = $_SESSION['messages'][$type];

        $_SESSION['messages'][$type] = [];

        return $messages;
    }

    /**
     * Permet de verifier s'il des messages d'erreur sont remontés
     *
     * @param string $type
     * @return boolean
     */
    public static function hasFlashes(string $type) : bool
    {
        if (empty($_SESSION['messages'])) {
            return false;
        }

        return !empty($_SESSION['messages'][$type]);
    }
}

    ?>