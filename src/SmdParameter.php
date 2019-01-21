<?php

namespace Tochka\JsonRpcSmd;

/**
 * Class SmdParameter
 *
 * @property string $name
 * @property string $description
 * @property array $types
 * @property bool $optional
 * @property mixed $default
 * @property bool $array
 * @property mixed $example
 * @property SmdParameter[] $parameters
 * @property string $typeFormat
 * @property string $typeAdditional
 * @property array $typeVariants
 * @property bool $is_root
 *
 * @package Tochka\JsonRpcSmd
 */
class SmdParameter implements SmdItem
{
    use Helpers;

    public function __construct()
    {
        $this->types = [];
        $this->typeVariants = [];
        $this->parameters = [];
    }

    public static function fromArray(array $value): self
    {

    }

    public function toArray(): array
    {
        $result = [
            'name' => $this->name,
            'type' => implode('|', $this->types),
        ];

        $result = $this->setParameterIfIsSet($result, 'description');
        $result = $this->setParameterIfNotEmpty($result, 'types');
        $result = $this->setParameterIfIsSet($result, 'optional');
        $result = $this->setParameterIfIsSet($result, 'default');
        $result = $this->setParameterIfIsSet($result, 'array');
        $result = $this->setParameterIfIsSet($result, 'example');
        $result = $this->setParameterIfIsSet($result, 'typeFormat');
        $result = $this->setParameterIfIsSet($result, 'typeAdditional');
        $result = $this->setParameterIfNotEmpty($result, 'typeVariants');
        $result = $this->setParameterIfIsSet($result, 'is_root');

        if (!empty($this->parameters)) {
            $result['parameters'] = $this->setSmdItemsParameter($this->parameters);
        }

        return $result;
    }

}