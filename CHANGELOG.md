# Changelog

All Notable changes to `PHP Telegram Bot Api` will be documented in this file

## 2.5.0 - 2023-08-09

### Added
- Add missing `protect_content` and `allow_sending_without_reply` parameters to `\TelegramBot\Api\BotApi` methods
- Add support `attach://<file_attach_name>` in `\TelegramBot\Api\BotApi` methods `sendMediaGroup`, `createNewStickerSet`, `addStickerToSet`, `editMessageMedia`
- Rename `thumb` to `thumbnail` parameter in `Animation`, `Document`, `Sticker`, `StickerSet`, `Video`, `VideoNote` types
- Rename `thumb_*` to `thumbnail_*` parameter in `Inline/QueryResult` types
- Add missing phpDoc for `$replyMarkup` parameters
- Fix phpDoc for `\TelegramBot\Api\BotApi::setWebhook` `$allowedUpdates` parameter. Automatically serialize if array passed
- Fix phpDoc for `\TelegramBot\Api\Types\Message::$newChatMembers`
- Add `\TelegramBot\Api\BotApi::getChatMemberCount` method
- Add `\TelegramBot\Api\BotApi::banChatMember` method
- Add `$messageId` to `\TelegramBot\Api\BotApi::unpinChatMessage`
- Add `\TelegramBot\Api\Types\ForceReply::$inputFieldPlaceholder` property

### Deprecated
- Deprecate using `thumb*` methods in `\TelegramBot\Api\BotApi`
- Deprecate method `\TelegramBot\Api\BotApi::setStickerSetThumb`. Use `\TelegramBot\Api\BotApi::setStickerSetThumbnail` instead
- Deprecate `\TelegramBot\Api\Types\ReplyKeyboardHide` class
- Deprecate `\TelegramBot\Api\BotApi::getChatMembersCount`. Use `\TelegramBot\Api\BotApi::getChatMemberCount` instead
- Deprecate `\TelegramBot\Api\BotApi::kickChatMember`. Use `\TelegramBot\Api\BotApi::banChatMember` instead 

## 2.4.0 - 2023-05-11

### Added
- Add `\TelegramBot\Api\Types\Venue` mapping (`foursquare_type`, `google_place_id`, `google_place_type`)
- Add `scope` and `languageCode` parameters to `\TelegramBot\Api\BotApi::setMyCommands`
- Add WebApp support: `\TelegramBot\Api\BotApi::answerWebAppQuery` method and `\TelegramBot\Api\Types\Message::$webAppData` property
- Add `\TelegramBot\Api\Types\ReplyKeyboardMarkup::$isPersistent` property
- Add `\TelegramBot\Api\Types\ReplyKeyboardMarkup::$inputFieldPlaceholder` property

### Fixed
- Fix `\TelegramBot\Api\Collection\Collection::addItem` max count constraint (#333)
- Fix `\TelegramBot\Api\Types\StickerSet` mapping
- Fix `\TelegramBot\Api\BotApi::copyMessage` not returning `\TelegramBot\Api\Types\MessageId`
- Fix new `$messageThreadId` parameter in `\TelegramBot\Api\BotApi` methods placed not in the end of the list of parameters

### Changed
- `\TelegramBot\Api\BotApi::getMyCommands` now returns instance `\TelegramBot\Api\Types\ArrayOfBotCommand` instead of `\TelegramBot\Api\Types\BotCommand` array
- `\TelegramBot\Api\BotApi::setMyCommands` now accepts instance of `\TelegramBot\Api\Types\ArrayOfBotCommand` instead of `\TelegramBot\Api\Types\BotCommand` array

### Deprecated
- Deprecate `\TelegramBot\Api\Botan` class
- Deprecate `$trackerToken` parameter in `\TelegramBot\Api\BotApi::__construct`
- Deprecate `$trackerToken` parameter in `\TelegramBot\Api\Events\EventCollection::__construct`
- Deprecate `\TelegramBot\Api\Types\PollAnswer::getFrom` use `\TelegramBot\Api\Types\PollAnswer::getUser` instead
- Deprecate passing array of BotCommand to `\TelegramBot\Api\BotApi::setMyCommands`. Use `\TelegramBot\Api\Types\ArrayOfBotCommand` instead
