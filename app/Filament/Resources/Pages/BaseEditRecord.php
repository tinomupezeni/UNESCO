<?php

namespace App\Filament\Resources\Pages;

use Filament\Resources\Pages\EditRecord;
use Spatie\Translatable\HasTranslations;

class BaseEditRecord extends EditRecord
{
    protected static array $locales = ['en', 'fr'];

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data = parent::mutateFormDataBeforeFill($data);

        $record = $this->record;

        if (! in_array(HasTranslations::class, class_uses_recursive($record), true)) {
            return $data;
        }

        foreach ($record->getTranslatableAttributes() as $attribute) {
            if (! array_key_exists($attribute, $data)) {
                continue;
            }

            $value = $data[$attribute];

            $translations = is_array($value)
                ? $value
                : (is_string($value) ? (json_decode($value, true) ?? []) : []);

            foreach (static::$locales as $locale) {
                $data["{$attribute}_{$locale}"] = $translations[$locale] ?? '';
            }

            unset($data[$attribute]);
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data = parent::mutateFormDataBeforeSave($data);

        return $this->encodeTranslatableFields($data);
    }

    protected function encodeTranslatableFields(array $data): array
    {
        $record = $this->record;
        $modelClass = static::getResource()::getModel();
        $instance = new $modelClass();

        if (! in_array(HasTranslations::class, class_uses_recursive($instance), true)) {
            return $data;
        }

        foreach ($instance->getTranslatableAttributes() as $attribute) {
            $translations = [];

            foreach (static::$locales as $locale) {
                $key = "{$attribute}_{$locale}";
                if (array_key_exists($key, $data)) {
                    $translations[$locale] = $data[$key] ?? '';
                    unset($data[$key]);
                }
            }

            if (count($translations) > 0) {
                $existing = $record?->getTranslations($attribute) ?? [];
                $data[$attribute] = array_merge($existing, $translations);
            }
        }

        return $data;
    }
}
