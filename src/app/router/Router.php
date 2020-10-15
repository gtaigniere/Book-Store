<?php


namespace App\router;


use App\Controller\BookController;

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
                default:
                    $this->index();
            }
        } else {
            $this->index();
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

}