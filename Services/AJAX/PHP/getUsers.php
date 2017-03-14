<?php 

use Services\UserServices\UserService;

class UserAndEmail 
{
    private $id;
    private $name;
    private $email;
    
    public function __construct(int $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }
    
    public function __toString()
    {
        return '<a class="find" href="./../../../Chat/chat.php?id=' . $this->id . '">' . $this->name . ' ( ' . $this->email . ') </a><br>';
    }
}

require_once './../../UserServices/UserService.php';

$suggest = $_POST['sugg'];

$us = new UserService();

$people = $us->getPeopleWithNames($suggest);

$found = [];

$responce = '';

while ($person = $people->fetch_assoc()) {
    $find = new UserAndEmail($person['id'], $person['name'], $person['email']);
    
    $found[] = $find;
}

foreach ($found as $find) {
    echo $find;
}