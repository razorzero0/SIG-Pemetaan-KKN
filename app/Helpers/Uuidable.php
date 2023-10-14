<?php

namespace App\Helpers;

use Illuminate\Support\Str;

trait Uuidable
{
    /**
     * Summary of Uuidable
     * @return void
     */
    public static function bootUuidable(): void
    {
        static::creating(function ($model) {
            $model->{$model->getUuidColumnName()} = Str::uuid()->toString();
        });
    }
    /**
     * getUuidColumnName
     *
     * @return string
     */
    protected function getUuidColumnName(): string
    {
        return property_exists($this, 'primaryKey') ? $this->primaryKey : 'id';
    }
}
