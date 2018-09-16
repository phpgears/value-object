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

/**
 * Value object interface.
 */
interface ValueObject
{
    /**
     * Check value object equality.
     *
     * @param self $valueObject
     *
     * @return bool
     */
    public function isEqualTo(self $valueObject): bool;
}
