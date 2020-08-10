<?php

namespace WladySpb\BaseConverter;


use WladySpb\BaseConverter\Exceptions\IndexOutOfBondException;
use WladySpb\BaseConverter\Exceptions\InvalidNumberBaseException;

class Base
{
    /**
     * @var int
     */
    protected $base;

    /**
     * @var array
     */
    protected $characters;

    /**
     * @var bool
     */
    protected $defaultCharset = false;

    /**
     * Base constructor.
     * @param int $base
     * @param string $characters
     * @throws InvalidNumberBaseException
     * @throws \Exception
     */
    public function __construct(int $base, string $characters = null)
    {
        if (null === $characters) {
            $characters = Defaults::base($base);
            $this->defaultCharset = true;
        }

        $this->validate($base, $characters);
        $this->base = $base;
        $this->characters = str_split($characters, 1);
    }

    /**
     * @return bool
     */
    public function isDefault():bool
    {
        return $this->defaultCharset;
    }

    /**
     * @return int
     */
    public function base():int
    {
        return $this->base;
    }

    /**
     * @param int $index
     * @return string
     * @throws IndexOutOfBondException
     */
    public function char(int $index):string
    {
        if (!isset($this->characters[$index])) {
            throw new IndexOutOfBondException();
        }

        return $this->characters[$index];
    }

    public function charset(): array
    {
        return $this->characters;
    }

    /**
     * @param int $base
     * @param string $characters
     * @throws InvalidNumberBaseException
     */
    private function validate(int $base, string $characters)
    {
        if ($base !== strlen($characters)) {
            throw new InvalidNumberBaseException($base, $characters);
        }
    }
}