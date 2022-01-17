<?php

namespace Task1\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Task1\Service\DAL\DeprecatedDomainsTable;

class DeprecatedDomainsListValidator extends ConstraintValidator
{
    protected DeprecatedDomainsTable $dal;

    public function __construct(DeprecatedDomainsTable $dal)
    {
        $this->dal = $dal;
    }

    public function validate($value, Constraint $constraint)
    {
        $deprecatedDomains = $this->dal->list();

        foreach ($deprecatedDomains as $domain) {
            if (strpos($value, $domain) !== false) {
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{ string }}', $value)
                    ->addViolation();
                break;
            }
        }
    }
}
