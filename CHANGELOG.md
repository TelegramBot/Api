# Changelog

All Notable changes to `PHP Telegram Bot Api` will be documented in this file

## [Unreleased] - [YYYY-MM-DD]

### Added
- Add `\TelegramBot\Api\Types\Venue` mapping (`foursquare_type`, `google_place_id`, `google_place_type`)

### Fixed
- Fix `\TelegramBot\Api\Collection\Collection::addItem` max count constraint (#333)
- Fix `\TelegramBot\Api\Types\StickerSet` mapping
- Fix `\TelegramBot\Api\BotApi::copyMessage` not returning `\TelegramBot\Api\Types\MessageId`

### Deprecated
- Deprecate `\TelegramBot\Api\Botan` class
- Deprecate `$trackerToken` parameter in `\TelegramBot\Api\BotApi::__construct`
- Deprecate `$trackerToken` parameter in `\TelegramBot\Api\Events\EventCollection::__construct`
- Deprecate `\TelegramBot\Api\Types\PollAnswer::getFrom` use `\TelegramBot\Api\Types\PollAnswer::getUser`
