<?php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Helpers\Classes\ImageResize;

if (!function_exists('resize')) {
    function resize($src = false, int $width = 0, int $height = 0, $watermark = false, $webp = true, $compression = 100) 
    {
		$setting = config('filesystems.disks.public');
		
		$path = config('settings.resize_image_path', 'image');

        $setting['root'] = ($setting['root'] ?? storage_path('app/public')) . '/' . $path . '/';
        $setting['url'] = ($setting['url'] ?? env('APP_URL') . '/storage') . '/' . $path . '/';
        $setting['root_cache'] = str_replace($path, 'cache', $setting['root']);
        $setting['url_cache'] = str_replace($path, 'cache', $setting['url']);
        
        $setting['watermark'] = config('settings.resize_wotemark', 'watermark.png');
        $setting['no_image'] = config('settings.resize_no_image', 'no-image.png');

		if($webp && !session()->get('webp')) {
			$webp = false;
		}

		if (!$src || !is_file($setting['root'] . $src) || substr(str_replace('\\', '/', realpath($setting['root'] . $src)), 0, strlen($setting['root'])) != str_replace('\\', '/', $setting['root']))  {
            $src = $setting['no_image'];
        }

		$pathinfo = pathinfo($src);

        if ($width && $height && is_file($setting['root'] . $src) && !in_array($pathinfo['extension'], ['svg'])) {
			$pathinfo['filename'] = Str::slug(mb_strtolower($pathinfo['filename']));
	
			$image_new = dirname($src) . '/' . mb_strlen($pathinfo['filename']) . '/' . $pathinfo['filename'] . '-' . ($watermark ? 'w-' : '') . $compression . '-' . (int)$width . 'x' . (int)$height . '.' . $pathinfo['extension'];
	 
			$image_webp = str_replace('.'. $pathinfo['extension'], '.webp', $image_new);

			$status = true;
 
			$filemtime = filemtime($setting['root'] . $src);

			if ($webp && (is_file($setting['root_cache'] . $image_webp) && $filemtime <= filemtime($setting['root_cache'] . $image_webp))) {
				$status = false;
			} elseif (!$webp && (is_file($setting['root_cache'] . $image_new) && $filemtime <= filemtime($setting['root_cache'] . $image_new))) {
				$status = false;
			}
		  
            if ($status) {
				$directories = preg_replace('|([/]+)|s', '/', dirname($image_new));
			 
                if (!File::isDirectory($setting['root_cache'] . $directories)) {
					mkdir($setting['root_cache'] . $directories, 0755, true);

                    // Почему-то создает директории с правами 700, поэтому mkdir
					//Storage::makeDirectory(Str::of($setting['root_cache'] . $directories)->after('app/'));
				}

                list($width_orig, $height_orig, $image_type) = getimagesize($setting['root'] . $src);
					
				if (!in_array($image_type, array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_WEBP)) && $image_type) { 
					return asset($setting['url'] . $src);
				}

                // Resize start 
				$image = new ImageResize($setting['root'] . $src);

				$image->resize($width, $height);
				
				if ($watermark && is_file($setting['root'] . $setting['watermark'])) {
					$image->watermark(new ImageResize($setting['root'] . $setting['watermark']));
				}

				$image->webp = $webp;
				 
				$image->save($setting['root_cache'] . ($webp ? $image_webp : $image_new), $compression);
            }

			if ($webp && is_file($setting['root_cache'] . $image_webp)) {
				$src = $setting['url_cache'] . $image_webp;
			} elseif (is_file($setting['root_cache'] . $image_new)) {
				$src = $setting['url_cache'] . $image_new;
			} else {
				$src = $setting['url'] . $src;
			}
        } else {
			$src = $setting['url'] . $src;
		}
       
        return asset($src);
    }
}