<?php
namespace controllers;

use core\Controller;
use models\Main;

class AdminController extends Controller
{
    public function loginAction()
    {
        if(isset($_SESSION['admin']))
        {
            $this->view->redirect('account');
        }

        if(!empty($_POST))
        {
            if(!$this->model->loginValidate($_POST))
            {
                $this->view->message('Error', $this->model->error);
            }

            $_SESSION['admin'] = true;
            $this->view->location('admin/account');
        }
        $this->view->getViews('Вход');
    }

    public function accountAction()
    {
        $vars = [
            'filter' => $this->model->clientFilter($this->route['id']),
            'list' => $this->model->getClients(),
        ];

        $this->view->getViews('Панель Администратора',$vars);
    }

    public function editAction()
    {
        $mainModel = new Main();

        if(!$this->model->clientExists($this->route['id']))
        {
            $this->view->errorCode(404);
        }
        if(!empty($_POST))
        {
            if(!$mainModel->Validate($_POST))
            {
                $this->view->message('Error', $this->model->error);
            }
            $this->model->editClient($_POST,$this->route['id']);

            $this->view->message('Success', 'Сохранено');
        }
        $vars = [
            'data' => $this->model->clientExists($this->route['id'])[0],
        ];
        $this->view->getViews('Редактировать запись',$vars);
    }

    public function deleteAction()
    {
        if(!$this->model->clientExists($this->route['id']))
        {
            $this->view->errorCode(404);
        }
        $this->model->clientDelete($this->route['id']);
        $this->view->redirect('/admin/account');
    }
}