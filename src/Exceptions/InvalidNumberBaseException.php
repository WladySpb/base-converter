<?php

namespace SmartLib\BaseConverter\Exceptions;


class InvalidNumberBaseException extends \Exception
{
    public function __construct(int $base, string $characters)
    {
        $message = 'Base must be equal to the number of characters - ';
        $message .= "Base: {$base}, characters: '{$characters}'";

        parent::__construct($message, 0, null);
    }
}