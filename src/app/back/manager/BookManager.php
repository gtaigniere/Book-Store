<?php


namespace App\Back\Manager;


use App\Back\Model\Book;

class BookManager
{
    /**
     * @var Book[]
     */
    private $books;

    /**
     * BookManager constructor.
     */
    public function __construct()
    {
        $this->books = [
            new Book(1, "Le mage", "Mister Fantasy", 9.90),
            new Book(2, "Gagner la guerre", "Les moutons électriques", 28),
            new Book(3, "La novice", "France loisirs", 25.99),
            new Book(4, "Le roi des Murgos", "Pocket", 8.70),
            new Book(5, "Le vaisseau elfique", "Payot & Rivages", 20.6)
            ];
    }

    /**
     * Renvoie tous les livres
     * @return Book[]
     */
    public function all(): array
    {
        return $this->books;
    }

    /**
     * Renvoie les livres du résultat de la recherche
     * @param array $criteria Tableau associatif dont les clefs et valeurs (si présentent)
     * correspondent respectivement aux champs "name" et "value" du formulaire de recherche
     * @return array
     */
    public function search(array $criteria): array
    {
        $counter = 0;
        $result = [];
        foreach ($this->books as $book) {
            // Recherche de l'id
            if (array_key_exists('Id', $criteria)) {
                $counter++;
                if (intval($criteria['Id']) === $book->getId()) {
                    $result[] = $book->getId();
                }
            }
            // Recherche dans le nom
            if (array_key_exists('Name', $criteria)) {
                $counter++;
                if (is_int(strpos(strtolower($book->getName()), strtolower($criteria['Name'])))) {
                    $result[] = $book->getId();
                }
            }
            // Recherche dans l'editeur
            if (array_key_exists('Publisher', $criteria)) {
                $counter++;
                if (is_int(strpos(strtolower($book->getPublisher()), strtolower($criteria['Publisher'])))) {
                    $result[] = $book->getId();
                }
            }
            // Recherche dont le prix est inférieur ou égal
            if (array_key_exists('Price', $criteria)) {
                $counter++;
                if(floatval($criteria['Price']) >= $book->getPrice())) {
                    $result[] = $book->getId();
                }
            }
        }

        if ($counter === count($result)) {

        }
        $result = array_unique($result);
        $books = [];
        foreach ($result as $id) {
            foreach ($this->books as $book) {
                if (intval($id) === $book->getId()) {
                    $books[] = $book;
                }
            }
        }
        return $books;
    }

}
