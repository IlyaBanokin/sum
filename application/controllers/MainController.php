<?php
namespace controllers;

use core\Controller;

class MainController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
    }

    public function indexAction()
    {
        if(!empty($_POST))
        {
            if(!$this->model->Validate($_POST))
            {
                $this->view->message('Error', $this->model->error);
            }
            $id = $this->model->add($_POST);
            if(!$id)
            {
                $this->view->message('Error', 'Ошибка обработки запроса');
            }
            $this->view->message('Success', 'Заявка успешно добавлена');
        }
        $this->view->getViews('Главная страница');
    }
}