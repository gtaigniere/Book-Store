<?php


namespace App\router;


use App\Back\Controller\BookController;

class Router
{
    /**
     * @var array
     */
    private $params;

    /**
     * Router constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
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
        $ctrl = new BookController();
        $ctrl->index();
    }

    public function all()
    {
        $ctrl = new BookController();
        $ctrl->all();
    }

    public function search()
    {
        $ctrl = new BookController();
        $ctrl->search($_POST);
    }

}