<?php

declare(strict_types=1);

namespace WladySpb\BaseConverter;

use WladySpb\BaseConverter\Exceptions\InvalidNumberBaseException;

class Converter
{
    public const BASE_2 = 2;
    public const BASE_8 = 8;
    public const BASE_10 = 10;
    public const BASE_16 = 16;
    public const BASE_32 = 32;
    public const BASE_36 = 36;
    public const BASE_62 = 62;
    public const BASE_64 = 64;

    private $fromBase = 10;
    private $toBase = 16;

    /**
     * @var Base[]
     */
    private $bases = [];

    /**
     * @param int $base
     * @param string|null $customCharset
     * @param string $delimiter
     * @param string $negateSymbol
     * @return $this
     * @throws InvalidNumberBaseException
     */
    public function from(
        int $base,
        string $customCharset = null,
        string $delimiter = '.',
        string $negateSymbol = '-'
    ): self {
        $this->fromBase = $base;
        $this->setBase($base, $customCharset, $delimiter, $negateSymbol);
        return $this;
    }

    /**
     * @param int $base
     * @param string|null $customCharset
     * @param string $delimiter
     * @param string $negateSymbol
     * @return $this
     * @throws InvalidNumberBaseException
     */
    public function to(
        int $base,
        string $customCharset = null,
        string $delimiter = '.',
        string $negateSymbol = '-'
    ): self {
        $this->toBase = $base;
        $this->setBase($base, $customCharset, $delimiter, $negateSymbol);
        return $this;
    }

    /**
     * @param string $number
     * @param int|null $from
     * @param int|null $to
     * @return string
     * @throws InvalidNumberBaseException
     */
    public function convert(string $number, int $from = null, int $to = null): string
    {
        $from && $this->from($from);
        $to && $this->to($to);

        return $this->negateNumber($number);
    }

    private function negateNumber(string $number): string
    {
        return (strpos($number, $this->bases[$this->fromBase]->negateSymbol()) === 0)
            ? $this->bases[$this->toBase]->negateSymbol() . $this->floatingPointNumbers(substr($number, 1))
            : $this->floatingPointNumbers($number);
    }

    private function floatingPointNumbers(string $number): string
    {
        return implode(
            $this->bases[$this->toBase]->delimiter(),
            array_map(
                [$this, 'convertNumber'],
                explode(
                    $this->bases[$this->fromBase]->delimiter(),
                    $number
                )
            )
        );
    }

    /**
     * @param string $number
     * @return float|int|string
     * @throws Exceptions\IndexOutOfBondException
     */
    private function convertNumber(string $number): string
    {
        if ($this->canSimpleConvert() ) {
            return base_convert($number, $this->fromBase, $this->toBase);
        }

        return $this->baseConvert($number, $this->bases[$this->fromBase], $this->bases[$this->toBase]);
    }

    private function canSimpleConvert() : bool
    {
        return (
                $this->bases[$this->fromBase]->isDefault()
            &&  $this->bases[$this->toBase]->isDefault()
            &&  $this->fromBase <= 36
            &&  $this->toBase <= 36
        );
    }

    /**
     * @param int $base
     * @param string|null $customCharset
     * @param string $delimiter
     * @param string $negateSymbol
     * @throws InvalidNumberBaseException
     */
    private function setBase(
        int $base,
        string $customCharset = null,
        string $delimiter = '.',
        string $negateSymbol = '-'
    ): void {
        $this->bases[$base] = new Base($base, $customCharset, $delimiter, $negateSymbol);
    }

    /**
     * @param $numberInput
     * @param Base $fromBase
     * @param Base $toBase
     * @return float|int|string
     * @throws Exceptions\IndexOutOfBondException
     */
    private function baseConvert($numberInput, Base $fromBase, Base $toBase)
    {
        if ($fromBase->charset() == $toBase->charset()) {
            return $numberInput;
        }

        $number = str_split($numberInput,1);

        /** Если приводим к десятичному - каждую цифру умножаем на исходную базу в степени кол-ва символов с конца */
        if ($toBase->charset() == '0123456789')
        {
            return $this->convertToBaseTen($number, $fromBase->charset());
        }

        /** Если исходная база - не десятичная, сначала приводим к десятичной (видимо, это самый быстрый вариант) */
        if ($fromBase->charset() != '0123456789')
            $numberInput = $this->convertToBaseTen($number, $fromBase->charset());


        /** Если число меньше, чем длина желаемой базы - просто возвращаем одну цифру из желаемой базы */
        if ($numberInput < $toBase->base())
            return $toBase->char($numberInput);

        return $this->convertTenToBase((string)$numberInput, $toBase->charset());
    }

    private function convertToBaseTen(array $number, array $fromBase)
    {
        $numberLength = count($number);
        $fromLen = count($fromBase);
        $value=0;
        for ($i = 0, $e = $numberLength-1; $i < $numberLength; $i++, $e--) {
            $value += (array_search($number[$i], $fromBase) * pow($fromLen, $e));
        }
        return $value;
    }

    private function convertTenToBase(string $number, array $toBase)
    {
        $value = '';
        $toLen=count($toBase);
        /** Начиная с конца, заполняем строку цифрами */
        while($number != '0')
        {
            /** Остаток от деления цифры на длину целевой базы - номер нужного символа в целевой базе */
            $value = $toBase[$number%$toLen].$value;
            /** Цифру на каждой итерации делим на длину целевой базы */
            $number = floor($number/$toLen);
        }
        return $value;
    }
}
