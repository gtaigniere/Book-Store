<?php


namespace App\Manager;


use App\Model\Book;

class BookManager
{
    public const BOOKS = [
        [1, "Le mage", "Mister Fantasy", 9.90],
        [2, "Gagner la guerre", "Les moutons électriques", 28],
        [3, "La novice", "France loisirs", 25.99],
        [4, "Le roi des Murgos", "Pocket", 8.70],
        [5, "Le vaisseau elfique", "Payot & Rivages", 20.65]
    ];

    /**
     * BookManager constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return Book[]
     */
    public function all(): array
    {
        $books = [];
        foreach (self::BOOKS as $i => $book) {
            $book = new Book(
                self::BOOKS[$i][0],
                self::BOOKS[$i][1],
                self::BOOKS[$i][2],
                self::BOOKS[$i][3]
            );
            $books[] = $book;
        }
        return $books;
    }

}