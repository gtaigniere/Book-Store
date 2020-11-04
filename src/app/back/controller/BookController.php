<?php


namespace App\Back\Controller;


use App\App;
use App\Back\Manager\BookManager;

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
        $this->render('back/view/list.php', compact('books'));
    }

    /**
     * @param array $params
     */
    public function add(array $params): void
    {
        $book = new Book();
        array_key_exists('bookId', $params) ? $book->setId((int)$params['bookId']) : $book->setId(null);
        $book->setName($params['bookName']);
        $book->setPublisher($params['bookPublisher']);
        $book->setPrice((float)$params['bookPrice']);
        $this->bookManager->insert($book);
        $this->all();
    }

    /**
     * Affiche la liste des livres du résultat de la recherche
     * @param array $criteria Tableau associatif dont les clefs et valeurs (si présentent)
     * correspondent respectivement aux champs "name" et "value" du formulaire de recherche
     */
    public function search(array $criteria): void
    {
        $books = $this->bookManager->search($criteria);
        $this->render('back/view/list.php', compact('books', 'criteria'));
    }

}
