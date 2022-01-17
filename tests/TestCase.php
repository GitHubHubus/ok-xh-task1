<?php

namespace Tests;

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Make private and protected function callable
     *
     * @param mixed $object
     * @param string $function
     * @return \ReflectionMethod
     */
    protected function makeCallable($object, $function)
    {
        $method = new \ReflectionMethod($object, $function);
        $method->setAccessible(true);

        return $method;
    }

    /**
     * Make private and protected property callable
     *
     * @param mixed $object
     * @param string $property
     * @return \ReflectionProperty
     */
    protected function makeCallableProperty($object, $property)
    {
        $property = new \ReflectionProperty($object, $property);
        $property->setAccessible(true);

        return $property;
    }
}
