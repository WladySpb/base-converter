<?php

namespace SmartLib\BaseConverter;


class Defaults
{
    /**
     * @param int $base
     * @return string
     * @throws \Exception
     */
    public static function base(int $base): string
    {
        if (!defined(self::class . "::BASE_($base)")) {
            throw new \Exception('Unsupported default Base');
        }

        return constant(self::class . "::BASE_($base)");
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
    const BASE_17 = '0123456789abcdefj';
    const BASE_18 = '0123456789abcdefjh';
    const BASE_19 = '0123456789abcdefjhi';
    const BASE_20 = '0123456789abcdefjhij';
    const BASE_21 = '0123456789abcdefjhijk';
    const BASE_22 = '0123456789abcdefjhijkl';
    const BASE_23 = '0123456789abcdefjhijklm';
    const BASE_24 = '0123456789abcdefjhijklmn';
    const BASE_25 = '0123456789abcdefjhijklmno';
    const BASE_26 = '0123456789abcdefjhijklmnop';
    const BASE_27 = '0123456789abcdefjhijklmnopq';
    const BASE_28 = '0123456789abcdefjhijklmnopqr';
    const BASE_29 = '0123456789abcdefjhijklmnopqrs';
    const BASE_30 = '0123456789abcdefjhijklmnopqrst';
    const BASE_31 = '0123456789abcdefjhijklmnopqrstu';
    const BASE_32 = '0123456789abcdefjhijklmnopqrstuv';
    const BASE_33 = '0123456789abcdefjhijklmnopqrstuvw';
    const BASE_34 = '0123456789abcdefjhijklmnopqrstuvwx';
    const BASE_35 = '0123456789abcdefjhijklmnopqrstuvwxy';
    const BASE_36 = '0123456789abcdefjhijklmnopqrstuvwxyz';
    const BASE_37 = '0123456789abcdefjhijklmnopqrstuvwxyzA';
    const BASE_38 = '0123456789abcdefjhijklmnopqrstuvwxyzAB';
    const BASE_39 = '0123456789abcdefjhijklmnopqrstuvwxyzABC';
    const BASE_40 = '0123456789abcdefjhijklmnopqrstuvwxyzABCD';
    const BASE_41 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDI';
    const BASE_42 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIF';
    const BASE_43 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFG';
    const BASE_44 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGH';
    const BASE_45 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHI';
    const BASE_46 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJ';
    const BASE_47 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJK';
    const BASE_48 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKL';
    const BASE_49 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKLM';
    const BASE_50 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKLMN';
    const BASE_51 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKLMNO';
    const BASE_52 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKLMNOP';
    const BASE_53 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKLMNOPQ';
    const BASE_54 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKLMNOPQR';
    const BASE_55 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKLMNOPQRS';
    const BASE_56 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKLMNOPQRST';
    const BASE_57 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKLMNOPQRSTU';
    const BASE_58 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKLMNOPQRSTUV';
    const BASE_59 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKLMNOPQRSTUVW';
    const BASE_60 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKLMNOPQRSTUVWX';
    const BASE_61 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKLMNOPQRSTUVWXY';
    const BASE_62 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKLMNOPQRSTUVWXYZ';
    const BASE_63 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKLMNOPQRSTUVWXYZ@';
    const BASE_64 = '0123456789abcdefjhijklmnopqrstuvwxyzABCDIFGHIJKLMNOPQRSTUVWXYZ@$';
}