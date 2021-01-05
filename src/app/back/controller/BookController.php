<?php


namespace App\Back\Controller;


use App\{
    App,
    Back\Manager\BookManager,
    Back\Model\Book,
    Back\Util\ErrorManager,
    Back\Util\Form
};
use Exception;

class BookController
{
    /**
     * @var BookManager
     */
    private $bookManager;

    /**
     * BookController constructor.
     */
    public function __construct()
    {
        $this->bookManager = new BookManager(App::getInstance()->getDb());
    }

    /**
     * Affiche la maquette
     */
    public function index(): void
    {
        require_once ROOT_DIR . 'index.html';
    }

    /**
     * Affiche le template avec la section HTML passée en paramètre et lui transmet les paramètres sous forme de tableau
     * @param string $view Section HTML à afficher avec le template
     * @param array $parameters Paramètres à transmettre à la vue
     */
    public function render(string $view, array $parameters): void
    {
        extract($parameters);
        ob_start();
        require_once ROOT_DIR . $view;
        $section = ob_get_clean();
        require_once ROOT_DIR . 'back/view/template.php';
    }

    /**
     * Affiche la liste de tous les livres
     */
    public function all(): void
    {
        $books = $this->bookManager->all();
        $form = new Form();
        $this->render('back/view/list.php', compact('books', 'form'));
    }

    /**
     * Affiche le livre dont l'id est passé en paramètre
     * @param int $id
     */
    public function one(int $id)
    {
        $criteria = [];
        try {
            $book = $this->bookManager->one($id);
            $criteria['bookId'] = $book->getId();
            $criteria['bookName'] = $book->getName();
            $criteria['bookPublisher'] = $book->getPublisher();
            $criteria['bookPrice'] = $book->getPrice();
            // ToDo : Passer par un objet Form par la suite
        } catch (Exception $e) {
            ErrorManager::add($e->getMessage());
        } finally {
            $books = $this->bookManager->all();
            $form = new Form($criteria);
            $this->render('back/view/list.php', compact('books', 'form',  'criteria'));
        }
    }

    /**
     * Crée un livre avec les paramètres reçus
     * Si l'id n'est pas précisé, il sera créé automatiquement
     * @param array $params Tableau associatif dont les clefs et valeurs
     * correspondent respectivement aux champs "name" et "value" du formulaire
     */
    public function add(array $params): void
    {
        try {
            $book = new Book();
            $book->setId(array_key_exists('bookId', $params) ? (int)$params['bookId'] : null);
            $book->setName($params['bookName']);
            $book->setPublisher($params['bookPublisher']);
            $book->setPrice((float)$params['bookPrice']);
            $this->bookManager->insert($book);
        } catch (Exception $e) {
            ErrorManager::add($e->getMessage());
        } finally {
            $this->all();
        }
    }

    /**
     * Modifie un livre avec les paramètres reçus
     * @param array $params Tableau associatif dont les clefs et valeurs
     * correspondent respectivement aux champs "name" et "value" du formulaire
     */
    public function modify(array $params): void
    {
        try {
            $book = new Book();
            $book->setId($params['bookId']);
            $book->setName($params['bookName']);
            $book->setPublisher($params['bookPublisher']);
            $book->setPrice(!empty($params['bookPrice']) ? (float)$params['bookPrice'] : null);
            $this->bookManager->update($book);
            $this->all();
        } catch (Exception $e) {
            ErrorManager::add($e->getMessage());
        } finally {
            $this->all();
        }
    }

    /**
     * Supprime le livre dont l'id est passé en paramètre
     * @param int $id
     * @throws Exception
     */
    public function delete(int $id): void
    {
        try {
            $this->bookManager->delete($id);
            $this->all();
        } catch (Exception $e) {
            ErrorManager::add($e->getMessage());
        } finally {
            $this->all();
        }
    }

    /**
     * Affiche la liste des livres du résultat de la recherche
     * @param array $criteria Tableau associatif dont les clefs et valeurs (si présentent)
     * correspondent respectivement aux champs "name" et "value" du formulaire de recherche
     * @throws Exception
     */
    public function search(array $criteria): void
    {
        $books = $this->bookManager->search($criteria);
        $form = new Form($criteria);
        $this->render('back/view/list.php', compact('books', 'form', 'criteria'));
    }

}
