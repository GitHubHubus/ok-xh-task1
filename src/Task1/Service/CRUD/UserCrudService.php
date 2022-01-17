<?php

namespace Task1\Service\CRUD;

use Task1\Entity\User;

class UserCrudService extends AbstractCrudService
{
    protected $logPrefix = 'USERS';

    public function getById(int $id): User
    {
        $data = $this->dal->getById($id);

        return $this->dataMapper->mapping($data);
    }

    public function createUser(User $user): array
    {
        $errors = $this->validator->validate($user);

        if ($errors->count() > 0) {
            return $this->getErrorsAsArray($errors);
        }

        $this->dal->create($user);

        return [];
    }

    public function updateUser(User $user): array
    {
        $errors = $this->validator->validate($user);

        if ($errors->count() > 0) {
            return $this->getErrorsAsArray($errors);
        }

        $old = $this->getById($user->getId());
        $difference = $this->comparator->getDifference($old, $user);

        $this->dal->update($user);

        if (!empty($difference)) {
            $this->logChanges($difference, $user->getId());
        }

        return [];
    }
}
