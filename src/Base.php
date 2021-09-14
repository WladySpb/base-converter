<?php

declare(strict_types=1);

namespace WladySpb\BaseConverter;

use Exception;
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
     * @var string
     */
    protected $negateSymbol;

    /**
     * @var string
     */
    protected $delimiter;

    /**
     * @var bool
     */
    protected $defaultCharset = false;

    /**
     * Base constructor.
     * @param int $base
     * @param string|null $characters
     * @param string $delimiter
     * @param string $negateSymbol
     * @throws InvalidNumberBaseException
     * @throws Exception
     */
    public function __construct(int $base, string $characters = null, string $delimiter = '.', string $negateSymbol = '-')
    {
        if (null === $characters) {
            $characters = Defaults::base($base);
            $this->defaultCharset = true;
        }

        $this->validate($base, $characters);
        $this->base = $base;
        $this->characters = str_split($characters, 1);
        $this->delimiter = $delimiter;
        $this->negateSymbol = $negateSymbol;
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

    /**
     * @return array
     */
    public function charset(): array
    {
        return $this->characters;
    }

    /**
     * @return string
     */
    public function delimiter():string
    {
        return $this->delimiter;
    }

    public function negateSymbol():string
    {
        return $this->negateSymbol;
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