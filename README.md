<h1 align="center">Laravel Zawgyi <=> Unicode Package</h1>

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tintnaingwin/myanfont.svg?style=flat-square)](https://packagist.org/packages/tintnaingwin/myanfont)
[![Laravel 8.x](https://img.shields.io/badge/Laravel-8.x-red.svg?style=flat-square)](http://laravel.com/docs/8.x)
[![Laravel 9.x](https://img.shields.io/badge/Laravel-9.x-red.svg?style=flat-square)](http://laravel.com/docs/9.x)
[![Laravel 10.x](https://img.shields.io/badge/Laravel-10.x-red.svg?style=flat-square)](http://laravel.com/docs/10.x)
[![Total Downloads](https://img.shields.io/packagist/dt/tintnaingwin/myanfont.svg?style=flat-square)](https://packagist.org/packages/tintnaingwin/myanfont)
[![License](https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square)](https://packagist.org/packages/tintnaingwin/myanfont)

## Requirements

#### version-3.*
- [PHP ^8.0|^8.1|^8.2](http://php.net/)
- [Laravel 8.x|9.x|^10.x](https://github.com/laravel/framework)

#### version-2.*
Unsupported since 27-4-2024
- [PHP ^7.1.3|^8.0](http://php.net/)
- [Laravel 5.6|5.7|5.8|6.x|7.x|8.x](https://github.com/laravel/framework)

#### version-1.*
Unsupported since 27-4-2024
- [PHP ^7.0](http://php.net/)
- [Laravel 5.5|5.6|5.7|5.8](https://github.com/laravel/framework)

#### version-0.*
Unsupported since 27-4-2024
- [PHP ^5.5.6](http://php.net/)

Read the extensive documentation [on version 0.x](https://github.com/tintnaingwinn/MyanFont/tree/v0.x) and [on version 1.x](https://github.com/tintnaingwinn/MyanFont/tree/v1).

## Installation
You can install this package via composer using this command:

```bash
composer require tintnaingwin/myanfont:"~3.0"
```

The package will automatically register itself.

## Usage
#### Using the facade

- Unicode to Zawgyi

```php
MyanFont::uni2zg('ဥုံတလဲလဲဖွတလဲလဲ'); // ဥဳံတလဲလဲဖြတလဲလဲ
MyanFont::uni2zg('ဥုံတလဲလဲဖွတလဲလဲ'); // ဥဳံတလဲလဲဖြတလဲလဲ
```

- Zawgyi to Unicode

```php
MyanFont::zg2uni('ဥဳံတလဲလဲဖြတလဲလဲ'); // ဥုံတလဲလဲဖွတလဲလဲ
MyanFont::zg2uni('ဥဳံတလဲလဲဖြတလဲလဲ'); // ဥုံတလဲလဲဖွတလဲလဲ
```
- Detect Font

```php
// zawgyi
MyanFont::isZgOrUni('ခ်ယ္ရီ'); // output - zawgyi

// unicode
MyanFont::isZgOrUni('ချယ်ရီ'); // output - unicode
```

### Using with Helpers

- Unicode to Zawgyi
```php
uni2zg('ဥုံတလဲလဲဖွတလဲလဲ'); // ဥဳံတလဲလဲဖြတလဲလဲ
```

- Zawgyi to Unicode
```php
zg2uni('ဥဳံတလဲလဲဖြတလဲလဲ'); // ဥုံတလဲလဲဖွတလဲလဲ
```

- Detect Font
```php
isZgOrUni('ခ်ယ္ရီ'); // output - zawgyi
```

## Testing

You can run the tests with:

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Rabbit Converter](https://github.com/Rabbit-Converter/Rabbit-PHP)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
