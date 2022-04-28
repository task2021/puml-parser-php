<?php
declare(strict_types=1);

namespace PumlParser\Lexer\Token\Implements;

use PumlParser\Lexer\Token\Token;
use PumlParser\Lexer\Token\TokenSupport;

class ImplementsToken implements Token
{
    use TokenSupport;

    public const SYMBOL   = 'implements';

    public function getValue(): string
    {
        return self::SYMBOL;
    }
}
