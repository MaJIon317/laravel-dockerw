<?php

namespace App\Services;

/**
 * Class TelegramService
 *
 */
class TelegramService
{
    /**
     * Telegram base API URL
     *
     * @var string
     */
    private string $telegramApiBaseUrl = 'https://api.telegram.org/bot';

    /**
     * Endpoint of send message in Telegram API
     *
     * @var string
     */
    private $telegramApiSendMessageEndpoint;

    /**
     * Token of your Telegram Bot that will send the messages
     *
     * @var string
     */
    private $telegramBotToken;

    /**
     * ID of your Telegram group that will receive the messages.
     *
     * @var string
     */
    private $telegramChats;

    public function __construct(string $telegramBotToken, array $telegramChats = [])
    {
        $this->telegramApiSendMessageEndpoint = 'sendMessage';
        $this->telegramBotToken = $telegramBotToken;
        $this->telegramChats = $telegramChats;
    }

    public function sendMessage(string $messageText, string $level)
    {
        $result = array();

        foreach ($this->telegramChats as $telegramChat) {
            $status = true;

            if (!isset($telegramChat['chat_id']) || empty($telegramChat['chat_id'])) {
                $status = false;
            }

            if ($status && (!isset($telegramChat['type'][$level]) || empty($telegramChat['type'][$level]))) {
                $status = false;
            }
            
            if ($status) {
                $telegramApiSendMessageFullUrl = $this->telegramApiBaseUrl . $this->telegramBotToken . '/' . $this->telegramApiSendMessageEndpoint;
                $requestQueryData = $this->prepareRequestQuery($messageText, $telegramChat['chat_id']);

                try {
                    $responseStatusCode = $this->getResponseStatusCode($telegramApiSendMessageFullUrl . '?' . $requestQueryData);

                    $result[] = $this->returnResponseOfApiByStatusCode($responseStatusCode);
                } catch (\Exception $exception) {}
            }
        }

        return $result;
    }

    private function prepareRequestQuery(string $messageText, string $chat_id)
    {
        return http_build_query([
            'text' => $messageText,
            'chat_id' => $chat_id,
            'parse_mode' => 'html',
        ]);
    }

    private function returnResponseOfApiByStatusCode($responseStatusCode)
    {
        $responseMessages = [
            '200' => 'Message has been sent.',
            '400' => 'Chat ID is not valid.',
            '401' => 'Bot Token is not valid.',
            '404' => 'Bot Token is not valid.',
        ];

        return $responseMessages[$responseStatusCode] ?? null;
    }

    private function getResponseStatusCode(string $url): string
    {
        $requestHeaders = get_headers($url);
        $requestStatusCode = substr($requestHeaders[0], 9, 3);
        return $requestStatusCode;
    }
}