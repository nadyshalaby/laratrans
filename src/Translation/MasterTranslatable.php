<?php

namespace CoreCave\Laratrans\Translation;

use CoreCave\Laratrans\Models\Locale;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

trait MasterTranslatable
{

    /**
     * Magic translation helper.
     *
     * @param null|string $locale
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function trans($locale = null)
    {
        $locale = Locale::whereCode(
            $locale ?: app()->getLocale()
        )->first();

        return $this->details()
            ->whereLocaleId($locale ? $locale->id : 0)
            ->firstOrNew([
                'locale_id' => $locale->id
            ]);
    }

    /**
     * Relation to details table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details(): HasMany
    {
        return $this->hasMany($this->getDetailsClassName(), $this->getForeignKeyName());
    }

    /**
     * get master class foreign key name.
     *
     * @return string
     */
    protected function getForeignKeyName()
    {
        return null;
    }

    /**
     * get details class short name.
     *
     * @return string
     */
    protected function getDetailsClassName()
    {
        return Str::replaceLast('\\', '\\_', __CLASS__);
    }

    /**
     * completely delete the model and its details.
     */
    public function trash()
    {
        $this->details()->delete();
        $this->destroy($this->id);
    }
}
