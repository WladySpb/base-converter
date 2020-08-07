<?php

namespace WladySpb\BaseConverter;


class Defaults
{
    public static function base(int $base):string
    {
        if (!defined(self::class . "::BASE_($base)")) {
            throw new \Exception();
        }
        
        return constant(self::class . "::BASE_($base)");
    }

    const BASE_2    = '01';
    const BASE_3    = '012';
    const BASE_4    = '0123';
    const BASE_5    = '01234';
    const BASE_6    = '012345';
    const BASE_7    = '0123456';
    const BASE_8    = '01234567';
    const BASE_9    = '012345678';
    const BASE_10   = '0123456789';
    const BASE_11   = '0123456789a';
    const BASE_12   = '0123456789ab';
    const BASE_13   = '0123456789abc';
    const BASE_14   = '0123456789abcd';
    const BASE_15   = '0123456789abcde';
    const BASE_16   = '0123456789abcdef';
    const BASE_17   = '0123456789abcdefj';
    const BASE_18   = '0123456789abcdefjh';
    const BASE_19   = '0123456789abcdefjhi';
    const BASE_20   = '0123456789abcdefjhij';
    const BASE_21   = '0123456789abcdefjhijk';
    const BASE_22   = '0123456789abcdefjhijkl';
    const BASE_23   = '0123456789abcdefjhijklm';
    const BASE_24   = '0123456789abcdefjhijklmn';
    const BASE_25   = '0123456789abcdefjhijklmno';
    const BASE_26   = '0123456789abcdefjhijklmnop';
    const BASE_27   = '0123456789abcdefjhijklmnopq';
    const BASE_28   = '0123456789abcdefjhijklmnopqr';
    const BASE_29   = '0123456789abcdefjhijklmnopqrs';
    const BASE_30   = '0123456789abcdefjhijklmnopqrst';
    const BASE_31   = '0123456789abcdefjhijklmnopqrstu';
    const BASE_32   = '0123456789abcdefjhijklmnopqrstuv';
    const BASE_33   = '0123456789abcdefjhijklmnopqrstuvw';
    const BASE_34   = '0123456789abcdefjhijklmnopqrstuvwx';
    const BASE_35   = '0123456789abcdefjhijklmnopqrstuvwxy';
    const BASE_36   = '0123456789abcdefjhijklmnopqrstuvwxyz';
}