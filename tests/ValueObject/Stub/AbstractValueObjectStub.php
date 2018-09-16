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

namespace Gears\ValueObject\Tests\Stub;

use Gears\ValueObject\AbstractValueObject;
use Gears\ValueObject\ValueObject;

/**
 * Abstract value object stub class.
 */
final class AbstractValueObjectStub extends AbstractValueObject
{
    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     *
     * @return self
     */
    public static function fromString(string $value): self
    {
        $valueObject = new self();
        $valueObject->value = $value;

        return $valueObject;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function isEqualTo(ValueObject $valueObject): bool
    {
        return \get_class($valueObject) === self::class && $valueObject->getValue() === $this->value;
    }
}
