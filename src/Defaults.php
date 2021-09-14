<?php

namespace SmartLib\BaseConverter;


use SmartLib\BaseConverter\Exceptions\UnsupportedDefaultBaseException;

class Defaults
{
    /**
     * @param int $base
     * @return bool
     */
    public static function exists(int $base): bool
    {
        return defined(self::class . "::BASE_{$base}");
    }

    /**
     * @param int $base
     * @return string
     * @throws UnsupportedDefaultBaseException
     */
    public static function base(int $base): string
    {
        if (!defined(self::class . "::BASE_{$base}")) {
            throw new UnsupportedDefaultBaseException('Unsupported default Base');
        }

        return constant(self::class . "::BASE_{$base}");
    }

    const BASE_2 = '01';
    const BASE_3 = '012';
    const BASE_4 = '0123';
    const BASE_5 = '01234';
    const BASE_6 = '012345';
    const BASE_7 = '0123456';
    const BASE_8 = '01234567';
    const BASE_9 = '012345678';
    const BASE_10 = '0123456789';
    const BASE_11 = '0123456789a';
    const BASE_12 = '0123456789ab';
    const BASE_13 = '0123456789abc';
    const BASE_14 = '0123456789abcd';
    const BASE_15 = '0123456789abcde';
    const BASE_16 = '0123456789abcdef';
    const BASE_17 = '0123456789abcdefg';
    const BASE_18 = '0123456789abcdefgh';
    const BASE_19 = '0123456789abcdefghi';
    const BASE_20 = '0123456789abcdefghij';
    const BASE_21 = '0123456789abcdefghijk';
    const BASE_22 = '0123456789abcdefghijkl';
    const BASE_23 = '0123456789abcdefghijklm';
    const BASE_24 = '0123456789abcdefghijklmn';
    const BASE_25 = '0123456789abcdefghijklmno';
    const BASE_26 = '0123456789abcdefghijklmnop';
    const BASE_27 = '0123456789abcdefghijklmnopq';
    const BASE_28 = '0123456789abcdefghijklmnopqr';
    const BASE_29 = '0123456789abcdefghijklmnopqrs';
    const BASE_30 = '0123456789abcdefghijklmnopqrst';
    const BASE_31 = '0123456789abcdefghijklmnopqrstu';
    const BASE_32 = '0123456789abcdefghijklmnopqrstuv';
    const BASE_33 = '0123456789abcdefghijklmnopqrstuvw';
    const BASE_34 = '0123456789abcdefghijklmnopqrstuvwx';
    const BASE_35 = '0123456789abcdefghijklmnopqrstuvwxy';
    const BASE_36 = '0123456789abcdefghijklmnopqrstuvwxyz';
    const BASE_37 = '0123456789abcdefghijklmnopqrstuvwxyzA';
    const BASE_38 = '0123456789abcdefghijklmnopqrstuvwxyzAB';
    const BASE_39 = '0123456789abcdefghijklmnopqrstuvwxyzABC';
    const BASE_40 = '0123456789abcdefghijklmnopqrstuvwxyzABCD';
    const BASE_41 = '0123456789abcdefghijklmnopqrstuvwxyzABCDE';
    const BASE_42 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEF';
    const BASE_43 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFG';
    const BASE_44 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGH';
    const BASE_45 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHI';
    const BASE_46 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJ';
    const BASE_47 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJK';
    const BASE_48 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKL';
    const BASE_49 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLM';
    const BASE_50 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMN';
    const BASE_51 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNO';
    const BASE_52 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOP';
    const BASE_53 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQ';
    const BASE_54 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQR';
    const BASE_55 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRS';
    const BASE_56 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRST';
    const BASE_57 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTU';
    const BASE_58 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUV';
    const BASE_59 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVW';
    const BASE_60 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWX';
    const BASE_61 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXY';
    const BASE_62 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const BASE_63 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@';
    const BASE_64 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@$';
}