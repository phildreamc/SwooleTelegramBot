<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

$bot_api_key  = '1123523945:AAGtPOSx1S8EcbKH_TtFQPXc_cDYLMBgZfc';
$bot_username = 'PhilInfoBot';
$hook_url     = 'https://phil.761286.cn/philinfobot-hook';

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    // Set webhook
    $result = $telegram->setWebhook($hook_url);
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    // echo $e->getMessage();
}