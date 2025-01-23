<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class UploadingProductImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uploading-product-images';

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
        $products = Product::select('id', 'barcode', 'images')
                            ->where('uploading_images', null)
                            ->where('status', true)
                            ->where('barcode', '!=', '')
                            ->limit(100)
                            ->get();

        if (count($products) > 0) {
            $storage_disc = Storage::disk('images');

            foreach ($products as $product) {
                $images = array();

                $count_missing = 0;

                for ($i=0; $i < 10; $i++) {
                    if ($count_missing >= 2) {
                        break;
                    }

                    $filename = $product->barcode . ($i != 0 ? '_' . $i : '');
                    $dir = substr($product->barcode, 0, 2);
                    
                    switch ($variable = true) {
                        case $storage_disc->exists($filename . '.jpg'):
                            $extension = 'jpg';
                            break;
                        case $storage_disc->exists($filename . '.jpeg'):
                            $extension = 'jpeg';
                            break;
                        case $storage_disc->exists($filename . '.png'):
                            $extension = 'png';
                            break;
                        default:
                            $extension = null;
                    }

                    if ($extension) {
                        $file = $storage_disc->get($filename . '.' . $extension);
                        $last_modified = $storage_disc->lastModified($filename . '.' . $extension);

                        $new_image = 'public/image/products/' . $dir . '/' . $filename . '.' . $extension;

                        $new_image_exists = Storage::exists($new_image);
                
                        if (!$new_image_exists || ($new_image_exists && (Storage::lastModified($new_image) != $last_modified))) {
                            Storage::put($new_image, $file);

                            @touch(storage_path('app/' . $new_image), $last_modified, $last_modified);
                        }

                        $images[] = str_replace('public/image/', '', $new_image);
                    } else {
                        $count_missing++;
                    }
                }

                if (!$images) {
                    $product->status = 0;
                }

                $product->images = $images;
                $product->uploading_images = true;
                $product->save();
            }
        }
    }
}