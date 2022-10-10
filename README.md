README
======

This is a simple utility run after the Composer init command, that creates the essential starter files for a project, namely, the ./src/Class.php, ./README.md, ./LICENSE.md (MIT), ./CONTRIBUTING.md, ./CHANGELOG.md, ./.gitignore, ./src/test.php and ./src/servephp.sh.

## Compatibility

Tested up to PHP 7, should be compatible with PHP 5.3 or above

## Installation

The following instructions are used to create a new PHP project from scratch using ianl28/starter-files:

1. Create a new folder for the new project by entering **mkdir newproj**
1. Navigate into the new folder **cd newproj**
1. Create a new composer.json file by entering **composer init**
1. Enter the necessary values. Ensure that the minimum stability is set to **dev**.
1. Ensure that the internet is connected
1. Run **composer require ianl28/starter-files**
1. Then add these lines to your composer.json:
```json
    "scripts": {
      "post-status-cmd": "Ianl28\\StarterFiles\\StarterFiles::run"
    },
```
1. Then run **composer status**
1. The following files should then be created: ./index.php, ./README.md, ./LICENSE.md, ./CONTRIBUTING.md, ./.gitignore, ./src/Newproj.php, ./src/test.sh, ./src/servephp.sh
1. Then add these lines to your composer.json:
```json
    "autoload": {
        "psr-4": {
            "Namespace\\Newproj\\": "src/"
        }
    },
```
1. Then run **composer update**
1. To start the PHP server and serve ./index.php on the browser, **cd ./src**, and then enter **servephp.sh**, and then point the browser to **localhost:3000**
1. Alternatively, the class Newproj may be run from ./ as **php index.php** or from ./src as **php test.php**

## Change Log

Please see [CHANGELOG](CHANGELOG.md) for more information on the recent changes.

## Contribute

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- Ian Low (ianlow28@gmail.com)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
