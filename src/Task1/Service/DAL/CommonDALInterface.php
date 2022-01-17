<?php

namespace Task1\Service\DAL;

interface CommonDALInterface
{
    public function list(): array;
    public function getBy(array $conditions): array;
}
