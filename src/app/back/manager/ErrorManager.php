<?php

namespace App\Back\Manager;

/**
 * Permet de créer des messages d'erreur et de les supprimer
 * @package Manager
 */
class ErrorManager
{

    /**
     * @return array
     */
    public static function getMessages(): array
    {
        return isset($_SESSION['error']) ? $_SESSION['error'] : [];
    }

    /**
     * Ajoute un message au tableau de messages
     * @param string $message
     * @return void
     */
    public static function add(string $message): void
    {
        if (!isset($_SESSION['error'])) {
            $_SESSION['error'] = [];
        }
        $_SESSION['error'][] = $message;
    }

    /**
     * Détruit le tableau de messages
     * @return void
     */
    public static function destroy(): void
    {
        unset($_SESSION['error']);
    }

}
