<?php


namespace App\Back\Controller;


use App\Back\Manager\BookManager;
use PDO;

class BookController
{
    /**
     * @var BookManager
     */
    private $bookManager;

    /**
     * BookController constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->bookManager = new BookManager($db);
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

}
