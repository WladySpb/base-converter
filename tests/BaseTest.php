<?php

namespace WladySpb\BaseConverter\Test;

use WladySpb\BaseConverter\Base;

class BaseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider validOptions
     * @param int $base
     * @param string $characters
     * @throws \WladySpb\BaseConverter\Exceptions\InvalidNumberBaseException
     * @return array
     */
    public function test__construct(int $base, string $characters)
    {
        $object = new Base($base, $characters);

        /** Assert case with NO throw Exceptions */
        $this->assertTrue(true);

        return [$object, $base, $characters];
    }


    /**
     * @depends test__construct
     * @param array $data
     */
    public function testBase(array $data)
    {
        /** @var Base $object */
        $object = $data[0];
        $base = $data[1];

        self::assertEquals($base, $object->base());
    }

    /**
     * @depends test__construct
     * @param array $data
     * @throws \WladySpb\BaseConverter\Exceptions\IndexOutOfBondException
     */
    public function testChar(array $data)
    {
        /** @var Base $object */
        $object = $data[0];
        $characters = $data[2];
        $count = strlen($characters);
        for ($i = 0; $i < $count; $i++) {
            self::assertEquals($characters[$i], $object->char($i));
        }
    }

    public function validOptions()
    {
        return [
            [2, '01'],
            [8, '01234567'],
            [10, '0123456789'],
            [16, '0123456789abcdif'],
            [36, '0123456789abcdifghijklmnopqrstuvwxyz'],
        ];
    }
}
