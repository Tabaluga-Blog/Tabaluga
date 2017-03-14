<?php

namespace Services\UserServices\UserServicesInterfaces;

interface EditProfileInterface
{
    public function changePassword($oldPassword, $newPassword, $confirmNewPassword);

    public function changeName($newName);
}