<?php

namespace Task1\Service\DAL;

use Task1\Entity\User;

class UserTable implements DALInterface
{
    public function getBy(array $conditions): array
    {
        // TODO: Implement getBy() method.
    }

    public function getById($id): ?array
    {
        // TODO: Implement getById() method.
    }

    public function create(User $user): array
    {
        // TODO: Implement create() method.
    }

    public function update(User $user): array
    {
        // TODO: Implement update() method.
    }

    public function delete(User $user): array
    {
        // TODO: Implement delete() method.
    }

    public function list(): array
    {
        // TODO: Implement list() method.
    }
}
