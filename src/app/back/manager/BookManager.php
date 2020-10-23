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
     * @param array $criteria
     * @return array|null
     */
    public function search(array $criteria): ?array
    {
        $results = [];
        // Recherche de l'id
        if (array_key_exists('Id', $criteria)) {
            foreach ($this->books as $book) {
                if ($criteria['Id'] == $book->getId()) {
                    $results[] = $book->getId();
                }
            }
        }
        // Recherche dans le nom
        if (array_key_exists('Name', $criteria)) {
            foreach ($this->books as $book) {
                $search = '/' . $criteria['Name'] . '/i';
                if (preg_match($search, $book->getName())) {
                    $results[] = $book->getId();
                }
            }
        }
        // Recherche dans l'editeur
        if (array_key_exists('Publisher', $criteria)) {
            foreach ($this->books as $book) {
                if (is_int(strpos(strtolower($book->getPublisher()), strtolower($criteria['Publisher'])))) {
                    $results[] = $book->getId();
                }
            }
        }
        // Recherche dont le prix est inférieur
        if (array_key_exists('Price', $criteria)) {
            foreach ($this->books as $book) {
                if ($criteria['Price'] >= $book->getPrice()) {
                    $results[] = $book->getId();
                }
            }
        }
        $results = array_unique($results);
        $books = [];
        foreach ($results as $id) {
            foreach ($this->books as $book) {
                if ($id == $book->getId()) {
                    $books[] = $book;
                }
            }
        }
        return $books;
    }

}