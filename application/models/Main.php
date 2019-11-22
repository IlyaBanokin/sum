<?php

namespace models;

use core\Model;


class Main extends Model
{
    public function Validate($post)
    {
        $nameLen = iconv_strlen($post['name']);
        $addressLen = iconv_strlen($post['address']);
        $phone = iconv_strlen($post['phone']);
        $email = iconv_strlen($post['email']);
        if($nameLen < 5 or $nameLen > 50)
        {
            $this->error = 'Поле ФИО должно содержать от 5 до 50 символов';
            return false;
        }elseif ($addressLen < 3 or $addressLen > 255)
        {
            $this->error = 'Адрес должнен содержать от 3 до 150 символов';
            return false;
        }elseif ($phone < 4 or $phone > 20)
        {
            $this->error = 'Телефон должен содержать от 4 до 20 символов';
            return false;
        }elseif ($email < 10 or $email > 40)
        {
            $this->error = 'Длинна Email от 10 до 40 символов';
            return false;
        }
        return true;
    }

    public function add($post)
    {
        $params = [
            'name' => $post['name'],
            'address' => $post['address'],
            'phone' => $post['phone'],
            'email' => $post['email'],
            'person' => $post['person'],
        ];

        $this->db->query("INSERT INTO `client`(`name`,`address`,`phone`,`email`,`person`) VALUES (:name,:address,:phone,:email,:person)",$params);

        return $this->db->lastInsertId();
    }
}