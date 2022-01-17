<?php

namespace Task1\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Task1\Service\DAL\DalFactory;

class UniqueValidator extends ConstraintValidator
{
    protected DalFactory $dalFactory;

    public function __construct(DalFactory $dalFactory)
    {
        $this->dalFactory = $dalFactory;
    }

    public function validate($value, Constraint $constraint)
    {
        $dal = $this->dalFactory->create($constraint->class);

        $data = $dal->getBy([$constraint->field => $value]);

        if (!empty($data)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}
