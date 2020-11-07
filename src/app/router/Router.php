<?php


namespace App\router;


use App\Back\Controller\BookController;

class Router
{
    /**
     * @var array
     */
    private $getParams;

    /**
     * @var array
     */
    private $postParams;

    /**
     * Router constructor.
     * @param array $getParams
     * @param array $postParams
     */
    public function __construct(array $getParams, array $postParams)
    {
        $this->getParams = $getParams;
        $this->postParams = $postParams;
    }

    public function route()
    {
        if (isset($this->getParams['target'])) {
            switch ($this->getParams['target']) {
                case 'all':
                    $this->all();
                    break;
                case 'add':
                    $this->add();
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

    public function add()
    {
        $ctrl = new BookController();
        $ctrl->add($this->postParams);
    }

    public function search()
    {
        $ctrl = new BookController();
        $ctrl->search($this->getParams);
    }

}
