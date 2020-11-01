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
     * @return Book[]
     */
    public function search(array $criteria): array
    {
        $books = [];
        foreach ($this->books as $book) {
            $criteriaId = !array_key_exists('bookId', $criteria) || empty($criteria['bookId']) || (int)$criteria['bookId'] === $book->getId();
            $criteriaName = !array_key_exists('bookName', $criteria) || empty($criteria['bookName']) || is_int(strpos(strtolower($book->getName()), strtolower($criteria['bookName'])));
            $criteriaPublisher = !array_key_exists('bookPublisher', $criteria) || empty($criteria['bookPublisher']) || is_int(strpos(strtolower($book->getPublisher()), strtolower($criteria['bookPublisher'])));
            $criteriaPrice = !array_key_exists('bookPrice', $criteria) || empty($criteria['bookPrice']) || (float)$criteria['bookPrice'] === $book->getPrice();
            if ($criteriaId && $criteriaName && $criteriaPublisher && $criteriaPrice) {
                $books[] = $book;
            }
        }
        return $books;
    }

}
