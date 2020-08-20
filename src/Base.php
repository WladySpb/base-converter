<?php

namespace SmartLib\BaseConverter;


use SmartLib\BaseConverter\Exceptions\IndexOutOfBondException;
use SmartLib\BaseConverter\Exceptions\InvalidDelimiterException;
use SmartLib\BaseConverter\Exceptions\InvalidNegateSymbolException;
use SmartLib\BaseConverter\Exceptions\InvalidNumberBaseException;

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
     * @param string $characters
     * @param string $delimiter
     * @param string $negateSymbol
     * @throws InvalidNumberBaseException
     * @throws \Exception
     */
    public function __construct(
        int $base,
        string $characters = null,
        string $delimiter = '.',
        string $negateSymbol = '-'
    ) {
        if (null === $characters) {
            $characters = Defaults::base($base);
            $this->defaultCharset = true;
        } elseif (Defaults::base($base) === $characters) {
            $this->defaultCharset = true;
        }

        $this->validateBase($base, $characters);
        $this->validateDelimiter($delimiter, $characters);
        $this->validateNegateSymbol($negateSymbol, $characters);

        $this->base = $base;
        $this->characters = str_split($characters, 1);
        $this->delimiter = $delimiter;
        $this->negateSymbol = $negateSymbol;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->defaultCharset;
    }

    /**
     * @return int
     */
    public function base(): int
    {
        return $this->base;
    }

    /**
     * @param int $index
     * @return string
     * @throws IndexOutOfBondException
     */
    public function char(int $index): string
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
    public function delimiter(): string
    {
        return $this->delimiter;
    }

    public function negateSymbol(): string
    {
        return $this->negateSymbol;
    }

    /**
     * @param int $base
     * @param string $characters
     * @throws InvalidNumberBaseException
     */
    private function validateBase(int $base, string $characters)
    {
        if ($base !== strlen($characters)) {
            throw new InvalidNumberBaseException($base, $characters);
        }
    }

    /**
     * @param string $delimiter
     * @param string $characters
     * @throws InvalidDelimiterException
     */
    private function validateDelimiter(string $delimiter, string $characters)
    {
        if (strpos($characters, $delimiter) !== false) {
            throw new InvalidDelimiterException('Characters can\'t contains delimiter');
        }
    }

    /**
     * @param string $negateSymbol
     * @param string $characters
     * @throws InvalidNegateSymbolException
     */
    private function validateNegateSymbol(string $negateSymbol, string $characters)
    {
        if (strpos($characters, $negateSymbol) !== false) {
            throw new InvalidNegateSymbolException('Characters can\'t contains negate symbol');
        }
    }
}