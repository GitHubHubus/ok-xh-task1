<?php

namespace Task1\Validator\Annotation;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class DeprecatedWordsListConstraint extends Constraint
{
    public $message = 'The string "{{ string }}" contains a deprecated word';
}
