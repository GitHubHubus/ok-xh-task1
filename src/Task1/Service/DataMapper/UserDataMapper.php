<?php

namespace Task1\Service\DataMapper;

use Task1\Entity\User;

class UserDataMapper implements DataMapperInterface
{
    public function mapping(array $data)
    {
        $user = new User();
        $user->setName($data['name']);
        $user->setCreated($data['created']);
        $user->setDeleted($data['deleted']);
        $user->setId($data['id']);
        $user->setEmail($data['email']);

        return $user;
    }
}
