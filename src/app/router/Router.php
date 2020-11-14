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
     * @var BookController
     */
    private $bookController;

    /**
     * Router constructor.
     * @param array $getParams
     * @param array $postParams
     */
    public function __construct(array $getParams, array $postParams)
    {
        $this->getParams = $getParams;
        $this->postParams = $postParams;
        $this->bookController = new BookController();
    }

    public function route()
    {
        if (isset($this->getParams['target'])) {
            switch ($this->getParams['target']) {
                case 'all':
                    $this->all();
                    break;
                case 'one':
                    $this->one();
                    break;
                case 'add':
                    $this->add();
                    break;
                case 'modify':
                    $this->modify();
                    break;
                case 'delete':
                    $this->delete();
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
        $this->bookController->index();
    }

    public function all()
    {
        $this->bookController->all();
    }

    public function one()
    {
        $this->bookController->one($this->getParams['id']);
    }

    public function add()
    {
        $this->bookController->add($this->postParams);
    }

    public function modify()
    {
        $this->bookController->modify($this->postParams);
    }

    public function delete()
    {
        $this->bookController->delete((int)$this->getParams['id']);
    }

    public function search()
    {
        $this->bookController->search($this->getParams);
    }

}
