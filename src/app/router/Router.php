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
        $target = array_key_exists('target', $this->getParams) ? $this->getParams['target'] : null;
        switch ($target) {
            case 'all':
                $this->bookController->all();
                break;
            case 'one':
                $this->bookController->one($this->getParams['id']);
                break;
            case 'add':
                $this->bookController->add($this->postParams);
                break;
            case 'modify':
                $this->bookController->modify($this->postParams);
                break;
            case 'search':
                $this->bookController->search($this->getParams);
                break;
            default:
                $this->bookController->all();
        }
    }

}
