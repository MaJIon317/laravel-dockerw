<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\News;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class UploadingNews extends Command
{
    private $path = 'https://million-otkrytok.ru/';
    private $url = 'https://million-otkrytok.ru/exportNEWS.php';
    private $dir = 'news';

    private $login = 'OIjruein34';
    private $password = 'KJu23hh&*231hj43';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uploading-news';

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
                if (!News::where('bitrix', $item['ID'])->exists()) {
                    $ext = strtolower(substr(strrchr($item['DETAIL_PICTURE'], '.'), 1));
 
                    if (in_array($ext, array('jpg', 'jpeg', 'png', 'gif'))) {
                        $image = basename(md5($item['DETAIL_PICTURE'])) . '.' . $ext;

                        Storage::put('public/image/' . $this->dir . '/' . $image, @file_get_contents($item['DETAIL_PICTURE']));

                        $image = $this->dir . '/' . $image;
                    } else {
                        $image = null;
                    }
      
                    // Detail text
                    preg_match_all('/<img.*?src=["\'](.*?)["\'].*?>/i', $item['DETAIL_TEXT'], $detail_images, PREG_SET_ORDER);

                    foreach ($detail_images as $detail_image) {
                        if (strpos($detail_image[1], 'data:image/') !== false) {
                            continue;
                        }

                        if (substr($detail_image[1], 0, 2) == '//') {
                            $detail_image[1] = 'http:' . $detail_image[1];
                        }
                    
                        $ext = strtolower(substr(strrchr($detail_image[1], '.'), 1));

                        if (in_array($ext, array('jpg', 'jpeg', 'png', 'gif'))) {
                            $detail_image_new = basename(md5($detail_image[1])) . '.' . $ext;

                            Storage::put('public/image/editor/' . $detail_image_new, @file_get_contents($this->path . $detail_image[1]));

                            $detail_image_new = 'storage/image/editor/' . $detail_image_new;

                            $item['DETAIL_TEXT'] = str_replace($detail_image[1], $detail_image_new, $item['DETAIL_TEXT']);
                        }
                    }

                    News::create([
                        'image' => $image,
                        'banner' => $item['ELEMENT'] ?? null,
                        'title' => $item['NAME'] ?? null,
                        'description' => $item['DETAIL_TEXT'] ?? null,
                        'meta_title' => $item['NAME'] ?? null,
                        'meta_description' => $item['ELEMENT'] ?? null,
                        'meta_keywords' => $item['ELEMENT'] ?? null,
                        'publish_date' => Carbon::parse($item['SHOW_COUNTER_START'] ?? $item['DATE_CREATE'] ?? null),
                        'status' => 1,
                        'bitrix' => $item['ID']
                    ]);
                } 
  
            }
        }

    }
}
