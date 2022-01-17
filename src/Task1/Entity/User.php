<?php

namespace Task1\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Task1\Validator\Annotation as CustomAssert;

class User
{
    private $id;

    /**
     * @Assert\Length(min = 8)
     * @Assert\Regex(pattern="/^[a-z0-9]+$/i")
     * @CustomAssert\DeprecatedWordsListConstraint()
     * @CustomAssert\UniqueConstraint(class="Task1\Entity\User", field="name")
     */
    private $name;

    /**
     * @Assert\Email()
     * @CustomAssert\DeprecatedDomainsListConstraint()
     * @CustomAssert\UniqueConstraint(class="Task1\Entity\User", field="email")
     */
    protected $email;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var \DateTime|null
     *
     * @Assert\GreaterThan(propertyPath="created")
     */
    protected $deleted;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getCreated(): ?\DateTime
    {
        return $this->created;
    }

    public function setCreated(\DateTime $created): void
    {
        $this->created = $created;
    }

    public function getDeleted(): ?\DateTime
    {
        return $this->deleted;
    }

    public function setDeleted(?\DateTime $deleted): void
    {
        $this->deleted = $deleted;
    }

    public function getDifference(User $user): array
    {
        $result = [];

        $reflection = new \ReflectionClass(self::class);

        foreach ($reflection->getMethods() as $method) {
            $name = $method->getName();
            if ($this->$name() !== $user->$name()) {
                $result[] = $name;
            }
        }

        return $result;
    }
}
