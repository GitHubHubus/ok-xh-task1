<?php

namespace Task1\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Task1\Service\DAL\DeprecatedWordsTable;

class DeprecatedWordsListValidator extends ConstraintValidator
{
    protected DeprecatedWordsTable $dal;

    public function __construct(DeprecatedWordsTable $dal)
    {
        $this->dal = $dal;
    }

    public function validate($value, Constraint $constraint)
    {
        $deprecatedWords = $this->dal->list();

        foreach ($deprecatedWords as $word) {
            if (strpos($value, $word) !== false) {
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{ string }}', $value)
                    ->addViolation();
                break;
            }
        }
    }
}
