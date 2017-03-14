<?php

namespace Services\UserServices\UserServicesInterfaces;

interface DeleteProfileInterface
{
    public function deleteProfile($email, $password);
}