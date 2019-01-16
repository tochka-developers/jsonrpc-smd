<?php

namespace Tochka\JsonRpcSmd;

use RuntimeException;

class SmdDescription implements SmdItem
{
    protected const ENVELOPE = 'JSON-RPC-2.0';
    protected const SMD_VERSION = '2.0';

    public $transport = 'POST';
    public $envelope = self::ENVELOPE;
    public $SMDVersion = self::SMD_VERSION;
    public $contentType = 'application/json';
    public $generator = 'Tochka/JsonRpc';

    public $target;
    public $description;
    public $additionalHeaders;
    public $namedParameters;
    public $acl;

    public $services = [];
    public $enumObjects = [];
    public $objects = [];

    public static function fromArray(array $value): self
    {
        $instance = new self();

        if ($value['envelope'] ?? null !== self::ENVELOPE || $value['MDVersion'] ?? null !== self::SMD_VERSION) {
            throw new RuntimeException('Invalid SMD-scheme');
        }

        $instance->transport = $value['transport'] ?? 'POST';
        $instance->contentType = $value['contentType'] ?? 'application/json';
        $instance->generator = $value['generator'] ?? 'Tochka/JsonRpc';

        $instance->target = $value['target'] ?? null;
        $instance->description = $value['description'] ?? null;
        $instance->additionalHeaders = $value['additionalHeaders'] ?? [];
        $instance->namedParameters = $value['namedParameters'] ?? true;
        $instance->acl = $value['acl'] ?? false;

        $instance->services = array_map(function ($service) {
            return SmdService::fromArray($service);
        }, $value['services'] ?? []);

        return $instance;
    }

    public function toArray(): array
    {
        return [
            'transport'         => $this->transport,
            'envelope'          => $this->envelope,
            'SMDVersion'        => $this->SMDVersion,
            'contentType'       => $this->contentType,
            'generator'         => $this->generator,
            'target'            => $this->target,
            'description'       => $this->description,
            'additionalHeaders' => $this->additionalHeaders,
            'namedParameters'   => $this->namedParameters,
            'acl'               => $this->acl,
            'services'          => array_map(function ($item) {
                /** @var $item SmdService */
                return $item->toArray();
            }, $this->services),
        ];
    }

}