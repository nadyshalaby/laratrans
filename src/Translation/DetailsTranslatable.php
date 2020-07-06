<?php

namespace CoreCave\Laratrans\Translation;

use CoreCave\Laratrans\Models\Locale;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

trait DetailsTranslatable
{

    /**
     * Relation to master model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function master(): BelongsTo
    {
        return $this->belongsTo($this->getMasterClassName(), $this->getForeignKeyName());
    }

    /**
     * get master class short name.
     *
     * @return string
     */
    protected function getMasterClassName()
    {
        return Str::replaceLast('_', '', __CLASS__);
    }

    /**
     * get master class foreign key name.
     *
     * @return string
     */
    protected function getForeignKeyName()
    {
        $path = explode('\\', __CLASS__);
        return strtolower(ltrim(array_pop($path), '_')) . "_id";
    }

    /**
     * Relation to locale model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }
}
