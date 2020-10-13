<?php
namespace Tradebyte\Product;

/**
 * @package Tradebyte
 */
class Model
{
    /**
     * @var mixed[]
     */
    private $data;

    /**
     * @param mixed[]
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->data['number'];
    }

    /**
     * @return mixed[]
     */
    public function getData(): array
    {
        return $this->data;
    }
}