<?php

namespace Services\UserServices\UserServicesInterfaces;

use Data\User;

interface UserServiceInterface
{
    public function getEmail($email);

    public function addUser(User $user);

    public function getUser($email, $password);

    public function changeName($newName, $userId);

    public function changePassword($password, $userId);

    public function deleteProfile($userId);

    public function getUserNameByID($id);
}