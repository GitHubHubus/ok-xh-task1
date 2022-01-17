<?php

namespace Task1\Helper;

class EntityComparator
{
    public function getDifference($old, $new): array
    {
        $result = [];

        $reflection = new \ReflectionClass(get_class($old));

        foreach ($reflection->getProperties() as $property) {
            $name = $property->getName();

            if ($property->isPrivate()) {
                $oldPropertyValue = $this->makeCallableProperty($old, $name)->getValue($old);
                $newPropertyValue = $this->makeCallableProperty($new, $name)->getValue($new);
            } else {
                $oldPropertyValue = $old->$name;
                $newPropertyValue = $new->$name;
            }

            if ($oldPropertyValue !== $newPropertyValue) {
                $result[] = $name;
            }
        }

        return $result;
    }

    protected function makeCallableProperty($object, $property)
    {
        $property = new \ReflectionProperty($object, $property);
        $property->setAccessible(true);

        return $property;
    }
}
