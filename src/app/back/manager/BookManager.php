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
        $counterCriteria = ['Id' => 0, 'Name' => 0, 'Publisher' => 0, 'Price' => 0];
        $counterGlobal = 0;
        $books = [];
        foreach ($this->books as $book) {
            foreach ($book as $key => $valeur) {
                if (array_key_exists($key, $criteria)) {
                    $counterGlobal++;
                    $chaine = 'get' . $key;
                    if ($key == 'Id') {
                        if (intval($criteria[$key]) === $book->$chaine()) {
                            $counterCriteria[$key]++;
                        }
                    }
                    if ($key == 'Name' || $key == 'Publisher') {
                        if (is_int(strpos(strtolower($book->$chaine()), strtolower($criteria[$key])))) {
                            $counterCriteria[$key]++;
                        }
                    }
                    if ($key == 'Price') {
                        if(floatval($criteria[$key]) >= $book->$chaine()) {
                            $counterCriteria[$key]++;
                        }
                    }
                }
            }
            foreach ($counterCriteria as $key => $counter) {
                if ($counter === $counterGlobal) {
                    $chaine = 'get' . $key;
                    $books[] = $book->$chaine();
                }
            }
        }
        return $books;
    }

}
