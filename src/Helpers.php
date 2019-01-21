<?php

namespace Tochka\JsonRpcSmd;

trait Helpers
{
    protected $data = [];

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    public function __isset($name)
    {
        return array_key_exists($name, $this->data);
    }

    protected function setParameterIfIsSet($result, $name)
    {
        if (isset($this->$name)) {
            $result[$name] = $this->$name;
        }

        return $result;
    }

    protected function setParameterIfTrue($result, $name)
    {
        if ($this->$name) {
            $result[$name] = $this->$name;
        }

        return $result;
    }

    protected function setParameterIfNotEmpty($result, $name)
    {
        if (!empty($this->$name)) {
            $result[$name] = $this->$name;
        }

        return $result;
    }

    /**
     * @param SmdItem[] $value
     *
     * @return array
     */
    protected function setSmdItemsParameter($value)
    {
        return array_values(array_map(function ($parameter) {
            /** @var SmdItem $parameter */
            return $parameter->toArray();
        }, $value ?? []));
    }

    /**
     * @param string $class
     * @param array $value
     *
     * @return array
     */
    protected function getSmdItemsParameter($class, $value)
    {
        return array_map(function ($parameter) use ($class) {
            /** @var SmdItem $class */
            return $class::fromArray($parameter);
        }, $value ?? []);
    }
}