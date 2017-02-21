<?php
namespace Models;


use Exception;

class User
{
    private $id;
    private $email;
    private $name;
    private $password;


    public function __construct($email, $name, $password)
    {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
        $this->setRegisterDate(date("Y-m-d H:i:s"));
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            throw new Exception("Invalid email address.");
        }

        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if (strlen($name) < 2){
            throw new Exception("Your name must be at least 2 characters long.");
        }
        $this->name = $name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        if (strlen($password) < 5){
            throw new Exception("Your password must be at least 5 characters long.");
        }
        $this->password = $password;
    }

    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;
    }




    public function editProfile(){}



}
