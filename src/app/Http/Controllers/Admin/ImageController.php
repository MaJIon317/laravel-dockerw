<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $json = [];

        // Validate (size is in KB)
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);

        if ($validator->fails()) {
            $json['error'] = implode(', ', $validator->errors()->all());
        } else {
            $path = $request->input('path', 'demo');

            $file = $request->file('file');

            $validated = $validator->validated();

            $filenamewithextension = $file->getClientOriginalName();

            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            $extension = $file->getClientOriginalExtension();
 
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            $directories = preg_replace('|([/]+)|s', '/', $path . '/');

            if (!File::isDirectory(storage_path('app/public/image/') . $directories)) {
                mkdir(storage_path('app/public/image/') . $directories, 0755, true);

                // Почему-то создает директории с правами 700, поэтому mkdir
                //Storage::makeDirectory(Str::of($setting['root_cache'] . $directories)->after('app/'));
            }

            $file->storeAs('public/image/' . $path, $filenametostore);
 
            /*
            if (in_array($extension, ['jpg', 'png', 'jpeg'])) {
                $image = resize($path . '/' . $filenametostore, 100, 100);
            } else {
                $image = asset('storage/image/' . $path . '/' . $filenametostore);
            }
                */

            $image = resize($path . '/' . $filenametostore, 100, 100);

            $json['success'] = [
                'path' => $path . '/' . $filenametostore,
                'image' => $image,
                'thumb' => asset('storage/image/' . $path . '/' . $filenametostore),
                'default' => asset('storage/image/' . $path . '/' . $filenametostore),

            ];
        }

        return response()->json($json);
    }

}
