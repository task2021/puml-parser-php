<?php
declare(strict_types=1);

namespace PumlParser\Node;

abstract class ClassLike implements Node
{
    protected Nodes $parents;
    protected Nodes $interfaces;

    public function __construct(protected string $name, protected string $package)
    {
        $this->parents    = Nodes::empty();
        $this->interfaces = Nodes::empty();
    }

    abstract public function getType(): string;

    public function getName(): string
    {
        return $this->name;
    }

    public function extends(ClassLike $class): void
    {
        $this->parents->add($class);
    }

    public function implements(ClassLike $class): void
    {
        $this->interfaces->add($class);
    }

    public function toArray(): array
    {
        return [
            $this->getType() => [
                'Name'       => $this->name,
                'Package'    => $this->package,
                'Parents'    => $this->parents->toArray(),
                'Interfaces' => $this->interfaces->toArray()
            ]
        ];
    }
}