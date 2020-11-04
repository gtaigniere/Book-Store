<?php


namespace App\Back\Manager;


use App\Back\Model\Book;
use PDO;

class BookManager
{
    /**
     * @var Book[]
     */
    private $books;

    /**
     * @var PDO
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
        return $stmt->fetchAll(PDO::FETCH_CLASS, Book::class);
    }

    /**
     * @param int $id
     * @return Book|null
     */
    public function one(int $id): ?Book
    {
        $stmt = $this->db->prepare('SELECT * FROM book WHERE id = :id');
        var_dump($id);
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Book::class);
        return $stmt->fetch();
    }

    /**
     * @param Book $book
     * @return Book|null
     */
    public function insert(Book $book): ?Book
    {
        $stmt = $this->db->prepare('INSERT INTO book VALUES (:id, :name, :publisher, :price)');
        $result = $stmt->execute([
            ':id' => $book->getId(),
            ':name' => $book->getName(),
            ':publisher' => $book->getPublisher(),
            ':price' => $book->getPrice()]);
        return $result ? $this->one((int)$this->db->lastInsertId()) : null;
    }

}
