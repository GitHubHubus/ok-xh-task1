<?php

namespace Task1\Service\DAL;

use Task1\Entity\User;

interface DALInterface extends CommonDALInterface
{
    public function getById($id): ?array;
    public function create(User $user): array;
    public function update(User $user): array;
    public function delete(User $user): array;
}
