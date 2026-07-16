<?php

namespace App\Filament\Resources\CountryResource\Pages;

use App\Filament\Resources\CountryResource;
use Filament\Actions\DeleteAction;
use App\Filament\Resources\Pages\BaseEditRecord;
use Spatie\Translatable\HasTranslations;

class EditCountry extends BaseEditRecord
{
    protected static string $resource = CountryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data = parent::mutateFormDataBeforeFill($data);

        $record = $this->record;

        if (! ($record instanceof HasTranslations)) {
            return $data;
        }

        $locales = ['en', 'fr'];

        foreach ($record->getTranslatableAttributes() as $attribute) {
            if (array_key_exists($attribute, $data)) {
                $translations = is_array($data[$attribute])
                    ? $data[$attribute]
                    : (is_string($data[$attribute]) ? (json_decode($data[$attribute], true) ?? []) : []);

                foreach ($locales as $locale) {
                    $data["{$attribute}_{$locale}"] = $translations[$locale] ?? '';
                }

                unset($data[$attribute]);
            }
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data = parent::mutateFormDataBeforeSave($data);

        return $this->encodeTranslatableFields($data);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data = parent::mutateFormDataBeforeCreate($data);

        return $this->encodeTranslatableFields($data);
    }

    protected function encodeTranslatableFields(array $data): array
    {
        $record = $this->record;
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
                if ($record) {
                    $existing = $record->getTranslations($attribute) ?? [];
                    $data[$attribute] = array_merge($existing, $translations);
                } else {
                    $data[$attribute] = $translations;
                }
            }
        }

        return $data;
    }
}
