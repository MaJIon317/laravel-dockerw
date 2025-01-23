<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

trait AttributeTrait
{
    protected function metaTitle(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($value ? $value : $this->title)
        );
    }

    protected function banner(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Storage::exists('/public/image/' . $value) ? $value : null
        );
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => (!empty($value) ? $value : 'no-image.png')
        );
    }

    protected function publishDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => (is_null($value) ? $this->created_at : $value)
        );
    }

    public function name(): Attribute
    {
        return new Attribute(
            get: fn($value) => $this->translation->name ?? $value,
        );
    }

    public function translation(): HasOne
    {
        return $this->translations()->one()->where('locale', app()->getLocale());
    }
}
