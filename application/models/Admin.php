<?php

namespace models;

use core\Model;

class Admin extends Model
{
    public $error;

    public function loginValidate($post)
    {
        $config = require_once 'application/config/admin.php';
        if($config['login'] != $post['login'] or $config['password'] != $post['password'])
        {
            $this->error = 'Логин или пароль указан неверно';
            return false;
        }else{
            return true;
        }
    }

    public function getClients()
    {
        return $this->db->row('SELECT * FROM `client`');
    }

    public function clientExists($id)
    {
        $params = [
            'id' => $id,
        ];

        return $this->db->row('SELECT * FROM `client` WHERE `id` = :id',$params);
    }

    public function editClient($post,$id)
    {
        $params = [
            'name' => $post['name'],
            'address' => $post['address'],
            'phone' => $post['phone'],
            'email' => $post['email'],
            'id' => $id,
        ];

        $this->db->query("UPDATE `client` SET `name` = :name,`address` = :address,`phone` = :phone,`email` = :email WHERE `id` = :id",$params);
    }

    public function clientDelete($id)
    {
        $params = [
            'id' => $id,
        ];

        return $this->db->query("DELETE FROM `client` WHERE `id` = :id",$params);
    }

    public function clientFilter($person)
    {
        $params = [
            'person' => $person,
        ];

        return $this->db->query('SELECT * FROM `client` WHERE `person` = :person',$params);
    }
}