<?php

namespace WladySpb\BaseConverter;


use WladySpb\BaseConverter\Exceptions\IndexOutOfBondException;
use WladySpb\BaseConverter\Exceptions\InvalidNumberBaseException;

class Base
{
    protected $base;

    protected $characters;

    /**
     * Base constructor.
     * @param int $base
     * @param string $characters
     * @throws InvalidNumberBaseException
     */
    public function __construct(int $base, string $characters)
    {
        $this->validate($base, $characters);
        $this->base = $base;
        $this->characters = str_split($characters, 1);
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