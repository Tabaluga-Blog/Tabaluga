<?php
namespace Models;
use DB\Database;
use Exception;

/**
 * @property  getName
 */
class User
{
    private $id;
    private $email;
    private $name;
    private $password;
    private $registerDate;

    public function __construct($email, $name, $password)
    {
        $this->setEmail($email);
        $this->setName($name);
        $this->setPassword($password);
        $this->setRegisterDate(date("Y-m-d H:i:s"));
    }
    
    public function getId()
   {
       return Database::getUser($this->getEmail(), $this->getPassword())['id'];
   }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
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
        $this->password = md5($password);
    }

    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;
    }
}