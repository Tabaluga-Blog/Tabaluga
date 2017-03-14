<?php

namespace Services\UserServices\UserServicesInterfaces;

interface LoginServiceInterface
{
    public function login($email, $password);
}