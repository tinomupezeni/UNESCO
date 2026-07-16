<?php

namespace App\Filament\Resources\CountryResource\Pages;

use App\Filament\Resources\CountryResource;
use App\Filament\Resources\Pages\BaseCreateRecord;
use Spatie\Translatable\HasTranslations;

class CreateCountry extends BaseCreateRecord
{
    protected static string $resource = CountryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data = parent::mutateFormDataBeforeCreate($data);

        $modelClass = static::getResource()::getModel();
        $instance = new $modelClass();

        if (! ($instance instanceof HasTranslations)) {
            return $data;
        }

        $locales = ['en', 'fr'];

        foreach ($instance->getTranslatableAttributes() as $attribute) {
            $translations = [];

            foreach ($locales as $locale) {
                $key = "{$attribute}_{$locale}";
                if (array_key_exists($key, $data)) {
                    $translations[$locale] = $data[$key] ?? '';
                    unset($data[$key]);
                }
            }

            if (count($translations) > 0) {
                $data[$attribute] = $translations;
            }
        }

        return $data;
    }
}
