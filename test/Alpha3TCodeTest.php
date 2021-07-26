<?php

declare(strict_types=1);

namespace Iso639Test\Part2;

use Iso639\Part2\Alpha3TCode;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

use function ctype_lower;
use function ctype_upper;
use function str_replace;

class Alpha3TCodeTest extends TestCase
{
    /**
     * @test
     */
    public function constantValuesAreLowercase()
    {
        $reflectionClass = new ReflectionClass(Alpha3TCode::class);
        $values          = $reflectionClass->getConstants();

        foreach ($values as $value) {
            $this->assertTrue(ctype_lower($value));
        }
    }

    /**
     * @test
     */
    public function constantKeysAreUpperCase()
    {
        $reflectionClass = new ReflectionClass(Alpha3TCode::class);
        $values          = $reflectionClass->getConstants();

        foreach ($values as $key => $value) {
            $keyWithoutUnderscore = str_replace('_', '', $key);

            $this->assertTrue(ctype_upper($keyWithoutUnderscore));
        }
    }
}
