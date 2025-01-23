<?php
use Illuminate\Support\Str;

if (!function_exists('set_utm_urls')) {
    function set_utm_urls(string $string = '', array $utms = [], array $skipped_hosts = ['laravel.com']): string|null 
    {
		$regex = '#(<a.*?href=")([^"]*)("[^>]*?>)#i';

        $index = 0;

        return @preg_replace_callback($regex, function ($match) use ($utms, $skipped_hosts, &$index) {
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
                  
                    // Проверьте, есть ли уже ? в URL-адресе
                    $counter = (strpos($url, '?') === false) ? 0 : 1;

                    if (isset($utms['term']) && (!isset($utms['content']) || empty($utms['content']))) {
                        $utms['content'] = $index;
                    }
                    
                    // Установите все значения utm
                    foreach ($utms as $utm => $value) {
                        if (!empty($value)) {
                            $url .= match ($counter) {
                                0 => '?',
                                default => '&',
                            };

                            $url .= 'utm_'.  Str::slug(strtolower($utm)).'='.$value;

                            $counter++;
                        }
                    }
        
                    return "$match[1]$url$match[3]";
                }
            }
        }, $string);
    }
}