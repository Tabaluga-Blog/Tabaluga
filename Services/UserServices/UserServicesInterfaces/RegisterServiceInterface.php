<?php

namespace Services\UserServices\UserServicesInterfaces;

interface RegisterServiceInterface
{
    public function register($email, $name, $password, $confirmPassword);
}