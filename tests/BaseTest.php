<?php

namespace SmartLib\BaseConverter\Test;

use PHPUnit\Framework\TestCase;
use SmartLib\BaseConverter\Base;

class BaseTest extends TestCase
{

    /**
     * @dataProvider validOptions
     * @param int $base
     * @param string $characters
     * @param bool $default
     * @throws \SmartLib\BaseConverter\Exceptions\InvalidNumberBaseException
     * @throws \SmartLib\BaseConverter\Exceptions\IndexOutOfBondException
     */
    public function testCreateAndUseBase(int $base, string $characters, bool $default)
    {
        $object = new Base($base, $characters);

        $this->assertEquals($base, $object->base());
        $this->assertEquals($default, $object->isDefault());

        $count = strlen($characters);
        for ($i = 0; $i < $count; $i++) {
            $this->assertEquals($characters[$i], $object->char($i));
        }
    }

    public function validOptions()
    {
        return [
            [2, '01', true],
            [8, '01234567', true],
            [10, '0123456789', true],
            [16, '0123456789abcdef', true],
            [36, '0123456789abcdefghijklmnopqrstuvwxyz', true],
            [64, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@$', true],
            [4, 'CBAS', false],
            [10, 'abcdefghij', false],
        ];
    }
}
