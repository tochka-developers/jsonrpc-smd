<?php

namespace Tochka\JsonRpcSmd;

class SmdService implements SmdItem
{
    public $name;
    public $description;
    public $group;
    public $groupName;
    public $parameters;
    public $return;
    public $returnParameters;
    public $acl;
    public $endpoint;
    public $deprecated;
    public $note;
    public $warning;
    public $requestExample;
    public $responseExample;
    public $enumObjects;
    public $objects;
    public $tags;

    public static function fromArray(array $value): self
    {

    }

    public function toArray(): array
    {

    }

}