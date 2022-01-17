<?php

namespace Task1\Validator\Annotation;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class UniqueConstraint extends Constraint
{
    public $message = 'The "{{ string }}" already exist';
    public $class = '';
    public $field = '';
}
