<?php


namespace App\Back\Manager;


use App\Back\Model\Book;
use PDO;

class BookManager
{
    /**
     * @var PDO $db
     */
    private $db;

    /**
     * BookManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Renvoie tous les livres
     * @return Book[]
     */
    public function all(): array
    {
        $stmt = $this->db->query('SELECT * FROM book');
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, Book::class);
        $objs = [];
        foreach ($results as $obj) {
            $objs[] = $obj;
        }
        return $objs;
    }

    /**
     * Renvoie les livres du résultat de la recherche
     * @param array $criteria Tableau associatif dont les clefs et valeurs (si présentent)
     * correspondent respectivement aux champs "name" et "value" du formulaire de recherche
     * @return Book[]
     */
    public function search(array $criteria): array
    {
    }

}
