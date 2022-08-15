README
======

This is a simple utility run after the Composer init command, that creates the essential starter files for a project, namely, the Class.php, README.md, LICENSE.md, CONTRIBUTING.md and CHANGELOG.md.

## Compatibility

Tested up to PHP 7, should be compatible with PHP 5.3 or above

## Installation

### Composer
Add these lines to your composer.json:
```json
    {
        "require": {
            "ianl28/starter-files": "*"
        }
    }
```
or run the following command:

    php composer.phar require ianl28/starter-files

## Usage Example

This utility is designed to be run as a script from within Composer, as follows:

   composer.phar run-script post-status-cmd

In order to do so, the following setting must be included in composer.json

```php
    "scripts": {
      "post-status-cmd": "Ianl28\\StarterFiles\\StarterFiles::run"
    }
```

A sanity check utility to call the class programmatically can be coded in PHP as follows:

```php

$obj1 = new Ianl28\StarterFiles\StarterFiles();

$obj1->testrun();

```

## Change Log

Please see [CHANGELOG](CHANGELOG.md) for more information on the recent changes.

## Contribute

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- Ian Low (ianlow28@gmail.com)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
