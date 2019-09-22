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

namespace Gears\ValueObject;

use Gears\Immutability\ImmutabilityBehaviour;

/**
 * Abstract immutable value object.
 */
abstract class AbstractValueObject implements ValueObject
{
    use ImmutabilityBehaviour;

    /**
     * AbstractValueObject constructor.
     */
    final protected function __construct()
    {
        $this->assertImmutable();
    }

    /**
     * {@inheritdoc}
     *
     * @return string[]
     */
    final protected function getAllowedInterfaces(): array
    {
        return [static::class];
    }
}
