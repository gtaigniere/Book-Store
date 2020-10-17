<?php


namespace App\Manager;


use App\Model\Book;

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

}