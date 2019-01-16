<?php

namespace Tochka\JsonRpcSmd;

class SmdParameter implements SmdItem
{
    public $name;
    public $description;
    public $types;
    public $optional;
    public $default;
    public $array;
    public $example;

    public static function fromArray(array $value): self
    {

    }

    public function toArray(): array
    {

    }

}