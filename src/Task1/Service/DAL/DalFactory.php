<?php

namespace Task1\Service\DAL;

use Task1\Entity\User;

class DalFactory
{
    public function create(string $class): CommonDALInterface
    {
        if ($class instanceof User) {
            return new UserTable();
        } else {
            throw new \Exception('Invalid class');
        }
    }
}
