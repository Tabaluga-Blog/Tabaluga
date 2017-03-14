<?php

namespace Services;


class MessageService
{


    public function getChatUsers($user_id)
    {
        $sql = "SELECT DISTINCT u.id, u.name
	              FROM messages as m
	              JOIN users as u on u.id = m.receiver_id
	              WHERE sender_id =" .$user_id ."
                UNION
                SELECT DISTINCT u.id, u.name
	              FROM messages as m
	              JOIN users as u on u.id = m.sender_id
	              WHERE receiver_id = " . $user_id;

        $query = $this->mysqli->query($sql);

        $users = [];

        while ($result = $query->fetch_assoc())
        {
            $users[] = $result;
        }

        return $users;
    }

    public function getUserMessages($receiver_id, $loggedUser_id)
    {
        $sql = "SELECT u.name, m.content, m.date
                    FROM messages as m
                    JOIN users as u on u.id = ". $receiver_id ."
                    WHERE sender_id = ". $receiver_id ." AND receiver_id = ". $loggedUser_id ."
                UNION
                SELECT u.name, m.content, m.date
                    FROM messages as m
                    JOIN users as u on u.id = ". $loggedUser_id ."
                    WHERE sender_id = ". $loggedUser_id ." AND receiver_id = ". $receiver_id ."
                ORDER BY date";

        $query = $this->mysqli->query($sql);

        $messages = [];

        while ($result = $query->fetch_assoc())
        {
            $messages[] = $result;
        }

        return $messages;
    }

    public function sendMessage($sender_id, $receiver_id, $content)
    {
        $stmt = $this->mysqli->prepare('INSERT INTO messages (sender_id, receiver_id, content) VALUES (?, ?, ?)');

        $stmt->bind_param("iis", $sender_id, $receiver_id, $content);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }



}

// ../ &class . 'Services/' . $class . 'se'