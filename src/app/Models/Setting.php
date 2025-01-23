<?php

namespace App\Models;

use Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Setting extends Model
{
    use HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'key', 
        'value'
    ];

    protected static function booted()
    {
        static::saved(function () {
            static::export();
        });
    }

    public static function export()
    {
        $contents = array();

        $settings = static::all();

        foreach ($settings as $setting) {
            $unserialize = @unserialize($setting->value);

            $contents[$setting->key] = $unserialize !== false ? $unserialize : $setting->value;
        }

        $parsable_string = var_export($contents, true);

        $parsable_string = preg_replace('#(?:\A|\n)([ ]*)array \(#i', '[', $parsable_string); // Starts
        $parsable_string = preg_replace('#\n([ ]*)\),#', "\n$1],", $parsable_string); // Ends
        $parsable_string = preg_replace('#=> \[\n\s+\],\n#', "=> [],\n", $parsable_string); // Empties

        if (gettype($contents) == 'object') { // Deal with object states
            $parsable_string = str_replace('__set_state(array(', '__set_state([', $parsable_string);
            $parsable_string = preg_replace('#\)\)$#', "])", $parsable_string);
        } else { 
            $parsable_string = preg_replace('#\)$#', "]", $parsable_string);
        }

        $content = "<?php return {$parsable_string};";

        File::put(config_path('settings.php'), $content);

        Artisan::call('config:clear');
        
        Log::notice(__('The general settings have been changed'));
    
        return true;
    }
}
