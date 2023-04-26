# Changelog

All Notable changes to `PHP Telegram Bot Api` will be documented in this file

## [Unreleased] - [YYYY-MM-DD]

### Added
- Add `\TelegramBot\Api\Types\Venue` mapping (`foursquare_type`, `google_place_id`, `google_place_type`)
- Add `scope` and `languageCode` parameters to `\TelegramBot\Api\BotApi::setMyCommands`

### Fixed
- Fix `\TelegramBot\Api\Collection\Collection::addItem` max count constraint (#333)
- Fix `\TelegramBot\Api\Types\StickerSet` mapping

### Changed
- `\TelegramBot\Api\BotApi::getMyCommands` now returns instance `\TelegramBot\Api\Types\ArrayOfBotCommand` instead of `\TelegramBot\Api\Types\BotCommand` array
- `\TelegramBot\Api\BotApi::setMyCommands` now accepts instance of `\TelegramBot\Api\Types\ArrayOfBotCommand` instead of `\TelegramBot\Api\Types\BotCommand` array

### Deprecated
- Deprecate `\TelegramBot\Api\Botan` class
- Deprecate `$trackerToken` parameter in `\TelegramBot\Api\BotApi::__construct`
- Deprecate `$trackerToken` parameter in `\TelegramBot\Api\Events\EventCollection::__construct`
- Deprecate `\TelegramBot\Api\Types\PollAnswer::getFrom` use `\TelegramBot\Api\Types\PollAnswer::getUser` instead
- Deprecate passing array of BotCommand to `\TelegramBot\Api\BotApi::setMyCommands`. Use `\TelegramBot\Api\Types\ArrayOfBotCommand` instead
