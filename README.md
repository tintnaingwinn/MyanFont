Laravel MyanFont
=================

[![License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://tldrlegal.com/license/mit-license)

### Quick Installation

```
composer require tintnaingwin/myanfont
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
MyanFont::uni2zg($value);
```
### Zawgyi to Unicode
```php
MyanFont::zg2uni($value);
```
### Check Font
```php
MyanFont::checkFont($value);
```


## Credits
- [Rabbit Converter](https://github.com/Rabbit-Converter/Rabbit-PHP)
- [Myanmar Toots](https://github.com/googlei18n/myanmar-tools/tree/master/clients/php)

### License

The MIT License (MIT). Please see [License File](https://github.com/tintnaingwinn/email-checker/blob/master/LICENSE.txt) for more information.
