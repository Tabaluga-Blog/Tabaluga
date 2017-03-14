<?php

namespace Services;

interface MessageServiceInterface
{
    public function getChatUsers($user_id);

    public function getUserMessages($receiver_id, $loggedUser_id);

    public function sendMessage($sender_id, $receiver_id, $content);
}