<?php
//Xử lí logic
class HomeController
{
    public $modelStudent;

    public function __construct()
    {
        $this->modelStudent = new Student();
    }

    public function home()
    {
        $listStudent = $this->modelStudent->getAll();

        require_once './views/home.php';
    }
}
