<?php

namespace Task1\Validator\Annotation;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class DeprecatedDomainsListConstraint extends Constraint
{
    public $message = 'The string "{{ string }}" contains a deprecated domain';
}
