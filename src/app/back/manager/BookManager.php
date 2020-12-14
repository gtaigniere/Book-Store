<?php


namespace App\Back\Manager;


use App\Back\Model\Book;
use Exception;
use PDO;

class BookManager
{
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
     * Renvoie le livre dont l'id est passé en paramètre
     * @param int $id
     * @return Book|null
     * @throws Exception Si l'accès au livre a échoué
     */
    public function one(int $id): ?Book
    {
        $stmt = $this->db->prepare('SELECT * FROM book WHERE id = :id');
        if (!$stmt->execute([':id' => $id])) {
            throw new Exception('Une erreur est survenue lors de l\'accès au livre d\'id : ' . $id);
        }
        $stmt->setFetchMode(PDO::FETCH_CLASS, Book::class);
        $result = $stmt->fetch();
//        return $result ? $result : null;
        if (!$result) {
            throw new Exception('Aucun livre n\'a été trouvé avec l\'id : ' . $id);
        }
        return $result;
    }

    /**
     * Ajoute le livre passé en paramètre
     * Renvoie celui-ci s'il a bien été ajouté, sinon null
     * @param Book $book
     * @return Book
     * @throws Exception Si l'ajout a échoué
     */
    public function insert(Book $book): Book
    {
        $stmt = $this->db->prepare( 'INSERT INTO book VALUES (:id, :name, :publisher, :price)');
        $result = $stmt->execute([
            ':id' => $book->getId(),
            ':name' => $book->getName(),
            ':publisher' => $book->getPublisher(),
            ':price' => $book->getPrice()
        ]);
        if ($result) {
            return $this->one((int)$this->db->lastInsertId());
        }
        throw new Exception('Une erreur est survenue lors de l\'ajout du livre');
    }

    /**
     * Modify le livre passé en paramètre
     * Renvoie celui-ci s'il a bien été modifié
     * @param Book $book
     * @return Book
     * @throws Exception
     * <li>si la mise à jour a échoué</li>
     * <li>si le livre n'existe pas en base de données</li>
     */
    public function update(Book $book): Book
    {
        if ($this->one($book->getId())) {
            $stmt = $this->db->prepare('UPDATE book SET id = :id, name = :name, publisher = :publisher, price = :price WHERE id = :id');
            $result = $stmt->execute([
                ':id' => $book->getId(),
                ':name' => $book->getName(),
                ':publisher' => $book->getPublisher(),
                ':price' => $book->getPrice()
            ]);
            if ($result) {
                return $this->one($book->getId());
            }
            throw new Exception('Une erreur est survenue lors de la mise à jour du livre d\'id : ' . $book->getId());
        }
        throw new Exception('Aucun livre n\'a été trouvé avec l\'id : ' . $book->getId());
    }

    /**
     * Supprime le livre dont l'id est passé en paramètre
     * @param int $id
     * @throws Exception
     * <li>si la suppression a échoué</li>
     * <li>si le livre n'existe pas en base de données</li>
     */
    public function delete(int $id)
    {
        if ($this->one($id)) {
            $stmt = $this->db->prepare('DELETE FROM book WHERE id = :id');
            if (!$stmt->execute([':id' => $id])) {
                throw new Exception('Une erreur est survenue lors de la suppression du livre d\'id : ' . $id);
            }
        } else {
            throw new Exception('Aucun livre n\'a été trouvé avec l\'id : ' . $id);
        }
    }

    /**
     * Renvoie les livres du résultat de la recherche
     * @param array $criteria
     * @return Book[]
     * @throws Exception
     */
    public function search(array $criteria): array
    {
        $extractParams = $this->extractParameters($criteria);
        $request = $this->generateRequest($extractParams);
        $params = $this->generateFilterParameters($extractParams, ['book']);

        $stmt = $this->db->prepare($request);
        if (!$stmt->execute($params)) {
            throw new Exception('Une erreur est survenue lors de la recherche');
        }
        return $stmt->fetchAll(PDO::FETCH_CLASS, Book::class);
    }

    /**
     * Supprime les parties vides du tableau de critères
     * @param array $criteria
     * @return array
     */
    private function extractParameters(array $criteria): array
    {
        $params = [];
        foreach ($criteria as $key => $criterion) {
            if (!empty($criterion)) {
                $params[$key] = $criterion;
            }
        }
        return $params;
    }

    /**
     * Génère la requête en fonction des paramètres
     * @param array $params
     * @return string
     */
    private function generateRequest(array $params): string
    {
        $startReq = 'SELECT * FROM book';
        $reqParts = [];
        foreach ($params as $key => $value) {
            if (is_numeric($value)) {
                $reqParts[$key] = $key . ' = :' . $key;
            } else {
                $reqParts[$key] = $key . ' like :' . $key;
            }
        }
        return $startReq . join(' AND ', $reqParts);
    }

    /**
     * Filtre le tableau de critères et en renomme les clés,
     * par exemple si le filtre est 'book', comme ceci :
     * 'bookId' = > 'id', 'bookName' => 'name', etc...
     * @param array $criteria
     * @param array $filters
     * @return array
     */
    private function generateFilterParameters(array $criteria, array $filters): array
    {
        $params = [];
        foreach ($criteria as $key => $criterion) {
            $key = strtolower(preg_replace($filters, '', $key));
            if (is_numeric($criterion)) {
                $params[':' . $key] = $criterion;
            } else {
                $params[':' . $key] = '%' . $criterion . '%';
            }
        }
        return $params;
    }

    /**
     * Compare deux livres
     * S'ils sont identiques renvoie true, sinon false
     * @param Book $oldBook
     * @param Book $newBook
     * @return bool
     */
    public function compareTwoBooks(Book $oldBook, Book $newBook): bool
    {
        foreach ((array)$oldBook as $key) {
            $getter = 'get' . substr($key, 4);
            if ($oldBook->$getter() !== $newBook->$getter()) {
                return false;
            }
        }
        return true;
    }

}
