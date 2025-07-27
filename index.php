<?php
// index.php — Telegram webhook bot

$token = getenv("TELEGRAM_TOKEN");
$apiURL = "https://api.telegram.org/bot$token/";

$update = json_decode(file_get_contents("php://input"), true);

if (!$update || !isset($update["message"])) {
    http_response_code(200);
    exit("No message received");
}

$chatId = $update["message"]["chat"]["id"];
$text = $update["message"]["text"];

$responseText = "👋 You said: " . $text;

// Send message back to user
file_get_contents($apiURL . "sendMessage?chat_id=" . $chatId . "&text=" . urlencode($responseText));

echo "OK";
