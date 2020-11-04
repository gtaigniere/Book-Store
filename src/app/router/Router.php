<?php


namespace App\router;


use App\Back\Controller\BookController;
use PDO;

class Router
{
    /**
     * @var array
     */
    private $params;

    /**
     * @var PDO
     */
    private $db;

    /**
     * Router constructor.
     * @param array $params
     * @param PDO $db
     */
    public function __construct(array $params, PDO $db)
    {
        $this->params = $params;
        $this->db = $db;
    }

    public function route()
    {
        if (isset($this->params['target'])) {
            switch ($this->params['target']) {
                case 'all':
                    $this->all();
                    break;
                case 'search':
                    $this->search();
                    break;
                default:
                    $this->all();
            }
        } else {
            $this->all();
        }
    }

    public function index()
    {
        $ctrl = new BookController($this->db);
        $ctrl->index();
    }

    public function all()
    {
        $ctrl = new BookController($this->db);
        $ctrl->all();
    }

    public function search()
    {
        $ctrl = new BookController($this->db);
        $ctrl->search($_POST);
    }

}
