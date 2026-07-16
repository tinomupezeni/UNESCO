<?php

namespace App\Filament\Resources\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BaseCreateRecord extends CreateRecord
{
    protected static array $locales = ['en', 'fr'];

    protected function handleRecordCreation(array $data): Model
    {
        $modelClass = static::getResource()::getModel();
        $instance = new $modelClass();

        if (in_array(HasTranslations::class, class_uses_recursive($instance), true)) {
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
                    $data[$attribute] = $translations;
                }
            }
        }

        $record = new $modelClass($data);

        if ($parentRecord = $this->getParentRecord()) {
            return $this->associateRecordWithParent($record, $parentRecord);
        }

        $record->save();

        return $record;
    }
}
