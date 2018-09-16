<?php

/*
 * value-object (https://github.com/phpgears/value-object).
 * Value object for PHP.
 *
 * @license MIT
 * @link https://github.com/phpgears/value-object
 * @author Julián Gutiérrez <juliangut@gmail.com>
 */

declare(strict_types=1);

namespace Gears\ValueObject\Tests;

use Gears\ValueObject\Tests\Stub\AbstractValueObjectStub;
use PHPUnit\Framework\TestCase;

/**
 * Abstract value object test.
 */
class AbstractValueObjectTest extends TestCase
{
    public function testCreation(): void
    {
        $stub = AbstractValueObjectStub::fromString('thisIsMyValue');

        $this->assertSame('thisIsMyValue', $stub->getValue());
    }

    public function testEquality(): void
    {
        $stub = AbstractValueObjectStub::fromString('thisIsMyValue');

        $this->assertTrue($stub->isEqualTo(AbstractValueObjectStub::fromString('thisIsMyValue')));
        $this->assertFalse($stub->isEqualTo(AbstractValueObjectStub::fromString('thisIsNOTMyValue')));
    }
}
