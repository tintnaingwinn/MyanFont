Laravel MyanFont
=================
[![Laravel 5.x](https://img.shields.io/badge/Laravel-5.x-orange.svg?style=flat-square)](http://laravel.com)
[![License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://tldrlegal.com/license/mit-license)

Version 0.2.x is used Regular Expression for font detection.

Read the extensive documentation [on version 1.x](https://github.com/tintnaingwinn/MyanFont/tree/v1) and [on version 2.x](https://github.com/tintnaingwinn/MyanFont).

### Quick Installation

```
composer require tintnaingwin/myanfont:"~0.2"
```

Once this operation is complete, simply add the service provider class to your project's `config/app.php` file:

#### Facade

To use facade you have to add this line in `config/app.php` in aliases array

```php
'MyanFont' => Tintnaingwin\MyanFont\Facades\MyanFont::class,
```

### Unicode to Zawgyi

```php
MyanFont::uni2zg($value);
```

### Zawgyi to Unicode

```php
MyanFont::zg2uni($value);
```

### Check Font

```php
MyanFont::checkFont($value);

MyanFont::isZgOrUni($value);
```

### Testing

Run the tests with:

``` bash
composer test
```

### Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Credits
- [Rabbit Converter](https://github.com/Rabbit-Converter/Rabbit-PHP)

### License

The MIT License (MIT). Please see [License File](https://github.com/tintnaingwinn/email-checker/blob/master/LICENSE.txt) for more information.
