<?php

namespace Task1\Service\CRUD;

use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Task1\Helper\EntityComparator;
use Task1\Service\DAL\DALInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Task1\Service\DataMapper\DataMapperInterface;

abstract class AbstractCrudService
{
    protected $logPrefix = '';
    protected DALInterface $dal;
    protected ValidatorInterface $validator;
    protected LoggerInterface $logger;
    protected DataMapperInterface $dataMapper;
    protected EntityComparator $comparator;

    public function __construct(
        ValidatorInterface $validator,
        DALInterface $dal,
        LoggerInterface $logger,
        DataMapperInterface $dataMapper,
        EntityComparator $comparator
    )
    {
        $this->dal = $dal;
        $this->validator = $validator;
        $this->logger = $logger;
        $this->dataMapper = $dataMapper;
        $this->comparator = $comparator;
    }

    protected function getErrorsAsArray(ConstraintViolationListInterface $errors): array
    {
        $result = [];

        foreach ($errors as $error) {
            $result[$error->getPropertyPath()] = $error->getMessage();
        }

        return $result;
    }

    protected function logChanges(array $changes, int $entityId)
    {
        $message = sprintf('[%s] Fields %s are changed for entity with id %d', $this->logPrefix, implode(',', $changes), $entityId);

        $this->logger->info($message);
    }
}
