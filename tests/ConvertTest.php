<?php

namespace SmartLib\BaseConverter\Test;


use PHPUnit\Framework\TestCase;
use SmartLib\BaseConverter\Converter;

class ConvertTest extends TestCase
{
    /**
     * @dataProvider positiveNumbersProvider
     * @param $value
     * @throws \SmartLib\BaseConverter\Exceptions\InvalidNumberBaseException
     */
    public function testSimpleConversion($value)
    {
        $converter = new Converter();
        $result = $converter->convert($value, 10, 36);
        $this->assertSame(base_convert($value, 10, 36), $result);
    }

    /**
     * @dataProvider numbersProvider
     * @param $value
     * @throws \SmartLib\BaseConverter\Exceptions\InvalidNumberBaseException
     */
    public function testReversibleConversion($value)
    {
        $converter = new Converter();
        $result = $converter->convert($value, 10, 36);
        $revert = $converter->convert($result, 36, 10);
        $this->assertSame($value, $revert);
    }

    /**
     * @dataProvider numbersProvider
     * @param $value
     * @throws \SmartLib\BaseConverter\Exceptions\InvalidNumberBaseException
     */
    public function testChainConversion($value)
    {
        $converter = new Converter();
        $next = $converter->convert($value, 10, 36);
        $next = $converter->convert($next, 36, 64);
        $next = $converter->convert($next, 64, 16);
        $next = $converter->convert($next, 16, 2);
        $next = $converter->convert($next, 2, 10);
        $this->assertSame($value, $next);
    }

    public function numbersProvider()
    {
        return array_merge(
            $this->positiveNumbersProvider(),
            $this->negativeNumbersProvider(),
            $this->floatNumbersProvider()
        );
    }

    public function positiveNumbersProvider()
    {
        return [
            ['0'],
            ['1'],
            ['10'],
            ['15'],
            ['48'],
            ['256'],
            ['2999'],
            ['100500'],
            ['999999999'],
        ];
    }

    public function negativeNumbersProvider()
    {
        return [
            ['-1'],
            ['-256'],
            ['-100500'],
            ['-999999999'],
        ];
    }

    public function floatNumbersProvider()
    {
        return [
            ['1.99999'],
            ['-1.5'],
            ['100.500'],
            ['-100.500'],
            ['999999999.9'],
            ['-9.9999.9999.9'],
        ];
    }
}