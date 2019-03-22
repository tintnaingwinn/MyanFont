Laravel MyanFont
=================

[![License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://tldrlegal.com/license/mit-license)

## Installation
You can install this package via composer using this command:

```bash
composer require tintnaingwin/myanfont
```
The package will automatically register itself.

You can publish the config-file with:

```bash
php artisan vendor:publish --provider="Tintnaingwin\MyanFont\MyanFontServiceProvider"
```

This is the contents of the published config file:
```php
return [
    
    'myanmar_tools' => [
        /*
         * If enabled, will use Myanmar-Tools.
         */
        'enabled' => false,

        /*
         * If over-predicting Zawgyi is bad (e.g., when conversion will take place automatically), set a high threshold like 0.95.
         * This threshold guarantees that fewer than 1% of Unicode strings will be wrongly flagged.
         */
        'zawgyi_score' => 0.95,


        /*
         * If under-predicting Zawgyi is bad (e.g., when a human gets to evaluate the result), set a low threshold like 0.05.
         * This threshold guarantees that fewer than 1% of Zawgyi strings will go undetected.
         */
        'unicode_score' => 0.05,
    ],
    
];

```

## Usage
### Using the facade

You can choose to detect the font [Myanmar Toots](https://github.com/googlei18n/myanmar-tools/tree/master/clients/php) or Regular Expression.
 By default, using Regular Expression. You can change at config file.
 
- Unicode to Zawgyi

```php
// using myanmar tools
MyanFont::uni2zg('ဥုံတလဲလဲဖွတလဲလဲ', ture); // ဥဳံတလဲလဲဖြတလဲလဲ

// using regular expression
MyanFont::uni2zg('ဥုံတလဲလဲဖွတလဲလဲ', false); // ဥဳံတလဲလဲဖြတလဲလဲ

// By Default (regular expression)
MyanFont::uni2zg('ဥုံတလဲလဲဖွတလဲလဲ'); // ဥဳံတလဲလဲဖြတလဲလဲ
```

- Zawgyi to Unicode

```php
// using myanmar tools
MyanFont::zg2uni('ဥဳံတလဲလဲဖြတလဲလဲ', ture); // ဥုံတလဲလဲဖွတလဲလဲ

// using regular expression
MyanFont::zg2uni('ဥဳံတလဲလဲဖြတလဲလဲ', false); // ဥုံတလဲလဲဖွတလဲလဲ

// By Default (regular expression)
MyanFont::zg2uni('ဥဳံတလဲလဲဖြတလဲလဲ'); // ဥုံတလဲလဲဖွတလဲလဲ
```
- Detect Font

```php
// using myanmar tools
MyanFont::isZgOrUni('ချယ်ရီ', ture); // output - unicode

// using regular expression
MyanFont::isZgOrUni('ခ်ယ္ရီ', false); // output - zawgyi

// By Default (regular expression)
MyanFont::isZgOrUni('ချယ်ရီ'); // output - unicode
```

### Using with Helpers

- Unicode to Zawgyi
```php
// using myanmar tools
uni2zg('ဥုံတလဲလဲဖွတလဲလဲ', ture); // ဥဳံတလဲလဲဖြတလဲလဲ

// By Default (regular expression)
uni2zg('ဥုံတလဲလဲဖွတလဲလဲ'); // ဥဳံတလဲလဲဖြတလဲလဲ
```

- Zawgyi to Unicode
```php
// using myanmar tools
zg2uni('ဥဳံတလဲလဲဖြတလဲလဲ', true); // ဥုံတလဲလဲဖွတလဲလဲ

// By Default (regular expression)
zg2uni('ဥဳံတလဲလဲဖြတလဲလဲ'); // ဥုံတလဲလဲဖွတလဲလဲ
```

- Detect Font
```php
// using myanmar tools
isZgOrUni('ချယ်ရီ', true); // output - unicode

// By Default (regular expression)
isZgOrUni('ခ်ယ္ရီ'); // output - zawgyi
```

## Testing

You can run the tests with:

```bash
vendor/bin/phpunit
```

## Credits
- [Rabbit Converter](https://github.com/Rabbit-Converter/Rabbit-PHP)
- [Myanmar Toots](https://github.com/googlei18n/myanmar-tools/tree/master/clients/php)

### License

The MIT License (MIT). Please see [License File](https://github.com/tintnaingwinn/email-checker/blob/master/LICENSE.txt) for more information.
