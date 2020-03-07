[![PHP version](https://img.shields.io/badge/PHP-%3E%3D7.1-8892BF.svg?style=flat-square)](http://php.net)
[![Latest Version](https://img.shields.io/packagist/v/phpgears/value-object.svg?style=flat-square)](https://packagist.org/packages/phpgears/value-object)
[![License](https://img.shields.io/github/license/phpgears/value-object.svg?style=flat-square)](https://github.com/phpgears/value-object/blob/master/LICENSE)

[![Build Status](https://img.shields.io/travis/phpgears/value-object.svg?style=flat-square)](https://travis-ci.org/phpgears/value-object)
[![Style Check](https://styleci.io/repos/149037500/shield)](https://styleci.io/repos/149037500)
[![Code Quality](https://img.shields.io/scrutinizer/g/phpgears/value-object.svg?style=flat-square)](https://scrutinizer-ci.com/g/phpgears/value-object)
[![Code Coverage](https://img.shields.io/coveralls/phpgears/value-object.svg?style=flat-square)](https://coveralls.io/github/phpgears/value-object)

[![Total Downloads](https://img.shields.io/packagist/dt/phpgears/value-object.svg?style=flat-square)](https://packagist.org/packages/phpgears/value-object/stats)
[![Monthly Downloads](https://img.shields.io/packagist/dm/phpgears/value-object.svg?style=flat-square)](https://packagist.org/packages/phpgears/value-object/stats)

# value-object

Immutable Value Objects for PHP

## Installation

### Composer

```
composer require phpgears/value-object
```

## Usage

Require composer autoload file

```php
require './vendor/autoload.php';
```

Extend from `Gears\value-object\AbstractValueObject`. Make your class final, value objects should always be final

Be aware of the protected constructor, you should create a "named constructor" for your value object

```php
use Gears\ValueObject\AbstractValueObject;

final class CustomStringValueObject extends AbstractValueObject
{
    private $value;

    public static function fromString(string $value)
    {
        $stringObject = new self();
        $stringObject->value = $value;

        return $stringObject;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isEqualTo($valueObject): bool
    {
        return \get_class($valueObject) === self::class && $valueObject->getValue() === $this->value;
    }
}
```

### Serialization

Extending AbstractValueObject does not automatically define serialization mechanisms in your value objects because value objects can be composed of several values, other value objects and even other objects such as enums

For this consider adding serialization methods in your value objects to control how serialization takes place

```php
use Gears\ValueObject\AbstractValueObject;

final class Money extends AbstractValueObject implements \Serializable
{
    private const CURRENCY_EUR = 'eur';

    private $value;
    private $precision;
    private $currency;

    public static function fromEuro(int $value, int $precision)
    {
        $money = new self();
        $money->value = $value;
        $money->precision = $precision;
        $money->currency = static::CURRENCY_EUR; // Should be an enum

        return $money;
    }

    // [...]

    final public function serialize(): string
    {
        return serialize([
            $this->value,
            $this->precision,
            $this->currency,
        ]);
    }

    public function unserialize($serialized): void 
    {
        list(
            $this->value,
            $this->precision,
            $this->currency
        ) = \unserialize($serialized, ['allowed_classes' => false]);
    }
}
```

Enums and Value Objects get along perfectly, consider using [phpgears/enum](https://github.com/phpgears/enum) for enumerations

## Contributing

Found a bug or have a feature request? [Please open a new issue](https://github.com/phpgears/value-object/issues). Have a look at existing issues before.

See file [CONTRIBUTING.md](https://github.com/phpgears/value-object/blob/master/CONTRIBUTING.md)

## License

See file [LICENSE](https://github.com/phpgears/value-object/blob/master/LICENSE) included with the source code for a copy of the license terms.
