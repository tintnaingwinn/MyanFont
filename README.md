<h1 align="center">Laravel MyanFont</h1>

[![Laravel 5.x](https://img.shields.io/badge/Laravel-5.x-red.svg)](http://laravel.com)
[![Total Downloads](https://poser.pugx.org/tintnaingwin/myanfont/downloads)](https://packagist.org/packages/tintnaingwin/myanfont)
[![License](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/tintnaingwin/myanfont)

Version 1.x is used [Myanmar Tools](https://github.com/google/myanmar-tools/tree/master/clients/php) for font detection.

Read the extensive documentation [on version 0.x](https://github.com/tintnaingwinn/MyanFont/tree/v0.x) and [on version 2.x](https://github.com/tintnaingwinn/MyanFont).

### Quick Installation

```
composer require tintnaingwin/myanfont:"~1.0"
```

Once this operation is complete, simply add the service provider class to your project's `config/app.php` file:

#### Facade

For laravel >=5.5 that's all. This package supports Laravel new [Package Discovery](https://laravel.com/docs/5.6/packages#package-discovery).

If you are using Laravel < 5.5, To use facade you have to add this line in `config/app.php` in aliases array:

```php
'MyanFont' => Tintnaingwin\MyanFont\Facades\MyanFont::class,
```

### Unicode to Zawgyi

```php
MyanFont::uni2zg($text);
```

### Zawgyi to Unicode

```php
MyanFont::zg2uni($text);
```

### Check Font

```php
MyanFont::checkFont($text);

MyanFont::isZgOrUni($text);
```

## Credits

- [Rabbit Converter](https://github.com/Rabbit-Converter/Rabbit-PHP)
- [Myanmar Toots](https://github.com/googlei18n/myanmar-tools/tree/master/clients/php)

### License

The MIT License (MIT). Please see [License File](https://github.com/tintnaingwinn/email-checker/blob/master/LICENSE.txt) for more information.
