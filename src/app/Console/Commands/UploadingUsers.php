<?php

/*
    Экспорт данных клиентов с основы
    URL: https://million-otkrytok.ru/exportUSERS.php
    Login: OIjruein34
    Password: KJu23hh&*231hj43
*/

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UploadingUsers extends Command
{
    private $url = 'https://million-otkrytok.ru/exportUSERS.php';
    private $login = 'OIjruein34';
    private $password = 'KJu23hh&*231hj43';
 
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uploading-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::acceptJson()->withBasicAuth($this->login, $this->password)->post($this->url)->json();
         
        if (isset($response['error']) && !empty($response['error'])) {
            \Log::info($response['error']);
        }

        if (isset($response['data']) && !empty($response['data'])) {
            foreach($response['data'] as $item) {
               // if ($item['email'] != 'kashpyrenkovasiliu@gmail.com') { continue; } php artisan uploading-users
            
                $this->user($item);
            }
        }

        // Отправляем данные пользователей на старый сайт
        $users = User::where('bitrix', null)->get();

        if (count($users)) {
            $response = Http::acceptJson()->withBasicAuth($this->login, $this->password)->asForm()->post($this->url, [
                'users' => $users->toArray()
            ])->json();
   
            if ($response['data']) {
                foreach($response['data'] as $item) {
                    $this->user($item);
                }
            }
        }

    }

    private function user($user)
    {
        $bitrix = md5(implode('-', [
            $user['email'],
            $user['updated_at']
        ]));

        if (!User::where('bitrix', $bitrix)->exists()) {
            User::updateOrCreate([
                    'email' => $user['email'],
                ], [
                    'inn' => null,
                    'name' => str_replace('  ', ' ', implode(' ', [
                        $user['name'],
                        $user['last_name'],
                        $user['second_name']
                    ])),
                    'phone' => $user['phone'],
                    'city' => $user['city'] ?? null,
                    'address' => $user['address'] ?? null,
                    'send_welcome' => true,
                    'email' => $user['email'],
                    'city' => $user['city'] ?? null,
                    'email_verified_at' => $user['created_at'] ?? null,
                    'password' => $user['password'],
                    
                    'bitrix' => $bitrix,
            ]);
        }
    }
}
