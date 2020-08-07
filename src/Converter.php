<?php

namespace WladySpb\BaseConverter;

use WladySpb\BaseConverter\Exceptions\InvalidNumberBaseException;

class Converter
{

    public const BASE_2 = 2;
    public const BASE_8 = 8;
    public const BASE_10 = 10;
    public const BASE_16 = 16;
    public const BASE_36 = 36;

    private $fromBase = 10;
    private $toBase = 16;
    private $negateSymbol = '-';
    private $delimiter = '.';

    private $bases = [
        self::BASE_2 => '01',
        self::BASE_8 => '01234567',
        self::BASE_10 => '0123456789',
        self::BASE_16 => '0123456789ABCDEF',
    ];

    /**
     * @param int $base
     * @param string|null $customSymbols
     * @return $this
     * @throws Exception
     */
    public function from(int $base, string $customSymbols = null)
    {
        $this->fromBase = $base;
        $this->setCustomSymbols($base, $customSymbols);
        return $this;
    }

    /**
     * @param int $base
     * @param string|null $customSymbols
     * @return $this
     * @throws Exception
     */
    public function to(int $base, string $customSymbols = null)
    {
        $this->toBase = $base;
        $this->setCustomSymbols($base, $customSymbols);
        return $this;
    }

    /**
     * @param string $number
     * @param int|null $from
     * @param int|null $to
     * @return string
     * @throws Exception
     */
    public function convert(string $number, int $from = null, int $to = null)
    {
        $from && $this->from($from);
        $to && $this->to($to);

        return $this->negateNumber($number);
    }

    private function negateNumber(string $number)
    {
        return (strpos($number, $this->negateSymbol) === 0)
            ? $this->negateSymbol . $this->floatingPointNumbers(substr($number, 1))
            : $this->floatingPointNumbers($number);
    }

    private function floatingPointNumbers(string $number)
    {
        return implode(
            $this->delimiter,
            array_map(
                [$this, 'convertNumber'],
                explode(
                    $this->delimiter,
                    $number
                )
            )
        );
    }

    private function convertNumber(string $number)
    {
//        return base_convert($number, $this->fromBase, $this->toBase);
        return $this->naiveImplementation($number, $this->bases[$this->fromBase], $this->bases[$this->toBase]);
    }

    /**
     * @param int $base
     * @param string|null $customSymbols
     * @throws InvalidNumberBaseException
     */
    private function setCustomSymbols(int $base, string $customSymbols = null)
    {
        if (!$customSymbols) {
            $this->bases[$base] = Defaults::base($base);
            return;
        }

        if (strlen($customSymbols) != $base) {
            throw new InvalidNumberBaseException($base, $customSymbols);
        }

        $this->bases[$base] = $customSymbols;
    }

    private function naiveImplementation($numberInput, $fromBaseInput, $toBaseInput)
    {
        if ($fromBaseInput==$toBaseInput) return $numberInput;

        $fromBase = str_split($fromBaseInput,1);
        $toBase = str_split($toBaseInput,1);
        $number = str_split($numberInput,1);

        /** Если приводим к десятичному - каждую цифру умножаем на исходную базу в степени кол-ва символов с конца */
        if ($toBaseInput == '0123456789')
        {
            return $this->convertToBaseTen($number, $fromBase);
        }

        /** Если исходная база - не десятичная, сначала приводим к десятичной (видимо, это самый быстрый вариант) */
        if ($fromBaseInput != '0123456789')
            $numberInput = $this->convertToBaseTen($number, $fromBase);


        /** Если число меньше, чем длина желаемой базы - просто возвращаем одну цифру из желаемой базы */
        if ($numberInput < strlen($toBaseInput))
            return $toBase[$numberInput];

        return $this->convertTenToBase($numberInput, $toBase);
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
