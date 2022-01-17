<?php

namespace Task1\Service\DataMapper;

interface DataMapperInterface
{
    /**
     * @return mixed
     */
    public function mapping(array $data);
}
