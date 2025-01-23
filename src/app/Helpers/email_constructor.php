<?php
use Illuminate\Support\Facades\Crypt;

if (!function_exists('email_constructor_encrypt')) {
    function email_constructor_encrypt(string $string = ''): string|null 
    {
        try {
            $string = Crypt::encryptString($string);
        } catch (\Throwable $th) {
            //throw $th;
        };

        return (string)$string;
    }
}

if (!function_exists('email_constructor_decrypt')) {
    function email_constructor_decrypt(string $string = ''): array
    {
        try {
            $string = Crypt::decryptString($string);
        } catch (\Throwable $th) {
            //throw $th;
        }

        @parse_str($string, $string);

        return (array)$string;
    }
}

// Добавляем гет параметры в ссылки
if (!function_exists('email_constructor_utms')) {
    function email_constructor_utms(string $string = '', array $utms = [], array $skipped_hosts = ['laravel.com']): string|null 
    {
        $regex = '#(<a.*?href=")([^"]*)("[^>]*?>)|(<img.*?src=")([^"]*)("[^>]*?>)#i';

        $index = 0;

        $utms['key'] = 0;

        return @preg_replace_callback($regex, function ($match) use ($utms, $skipped_hosts, &$index) {
            $matchs = [];

            foreach($match as $matc) {
                if (!empty($matc)) {
                    $matchs[] = $matc;
                }
            }

            $match = $matchs;

            $url = $match[2];
 
            $index++;

            // Проверьте, есть ли URL-адрес href в skip link
            $aHrefLink = parse_url($url);

            if (isset($aHrefLink['host']) && ! empty($aHrefLink['host']) && in_array($aHrefLink['host'], $skipped_hosts)) {
                return $match[0];
            } else {
                // Проверьте, есть ли # в URL-адресе
                if (strpos($url, '#') !== false) {
                    return $match[0];
                } else {
                  
                    $message_get = [];

                    // Проверьте, есть ли уже ? в URL-адресе
                    $counter = (strpos($url, '?') === false) ? 0 : 1;

                    if ($counter) {
                        $parts = parse_url($url);
                        if (!empty($parts['query'])) {
                            parse_str($parts['query'], $query); 

                            if (!empty($query)) {
                                foreach($query as $query_key => $query_value) {
                                    $message_get[$query_key] = strtolower($query_key) . '=' . $query_value;
                                }
                            }
                        }
                    }

                    $url .= match ($counter) {
                        0 => '?',
                        default => '&',
                    };

                    $utms['key'] = $index;
                    
                    // Установите все значения utm
                    foreach ($utms as $utm => $value) {
                        if (!empty($value)) {
                            $message_get[$utm] = strtolower($utm) . '=' . $value;
                        }
                    }
                  
                    return implode('', [
                        $match[1],
                        $url,
                        'messageId=' . implode('&', $message_get),
                        $match[3]
                    ]);
                }
            }
        }, $string);
    }
}

// Кодируем все ссылки с добавленными гет параметрами
if (!function_exists('email_constructor_encrypt_utms')) {
    function email_constructor_encrypt_utms(string $string = ''): string|null
    {
        $regex = '#(<.*?messageId=)([^"]*)("[^>]*?>)#i';

        return @preg_replace_callback($regex, function ($match) {
            $url = $match[2];

            return implode('', [
                $match[1],
                email_constructor_encrypt($url),
                $match[3]
            ]);
        }, $string);
    }
}