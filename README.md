# PHP Telegram Bot Api

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tgbot/api.svg?style=flat-square)](https://packagist.org/packages/tgbot/api)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/tgbot/api/master.svg?style=flat-square)](https://travis-ci.org/tgbot/api)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/tgbot/api.svg?style=flat-square)](https://scrutinizer-ci.com/g/tgbot/api/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/tgbot/api.svg?style=flat-square)](https://scrutinizer-ci.com/g/tgbot/api)
[![Total Downloads](https://img.shields.io/packagist/dt/tgbot/api.svg?style=flat-square)](https://packagist.org/packages/tgbot/api)

An extended php wrapper for telegram bot api

## Install

Via Composer

``` bash
$ composer require tgbot/api
```

## Usage

``` php
$skeleton = new tgbot\Api\BotApi();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email mail@igusev.ru instead of using the issue tracker.

## Credits

- [Ilya Gusev](https://github.com/iGusev)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
