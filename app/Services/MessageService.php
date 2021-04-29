<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Services\PalindromeService;

class MessageService
{
    private $baseUrl;
    private $token;
    private $client;
    private $PalindromeCheck = False;
    private $chatId;
    private $string;

    function __construct()
    {
        $this->baseUrl = env('TELEGRAM_API_URL');
        $this->token = env('TELEGRAM_BOT_TOKEN');

        $this->client = new Client(
            ['base_uri' => $this->baseUrl . 'bot'. $this->token. '/']
        );
    }

    public function getMessage()
    {
        $response = $this->client->request('GET', 'getUpdates', [
            'query' => [
                'offset' => -1
            ]
        ]);

        if($response->getStatusCode() === 200){
            $messages = json_decode($response->getBody()->getContents(), true);

            if(array_key_exists('edited_message', $messages['result'][0])) {
                $this->chatId = $messages['result'][0]['edited_message']['chat']['id'];
                $this->string = $messages['result'][0]['edited_message']['text'];
            } else {
                $this->chatId = $messages['result'][0]['message']['chat']['id'];
                $this->string = $messages['result'][0]['message']['text'];
            }
            
            $this->PalindromeCheck = PalindromeService::PalindromeCheck($this->string);

            $this->sendMessage();
        }
    }

    public function sendMessage()
    {
        if($this->PalindromeCheck) {
            $this->client->request('GET', 'sendMessage', ['query' => [
                'chat_id' => $this->chatId,
                'text' => 'Палиндром!'
            ]]);
        } else {
            $this->client->request('GET', 'sendMessage', ['query' => [
                'chat_id' => $this->chatId,
                'text' => 'Не палиндром!'
            ]]);
        }
    }
}
