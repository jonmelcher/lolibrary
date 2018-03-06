<?php

namespace App\Models;

use App\Model;

trait HasUuid
{
    /**
     * Boot models with HasUuid so they'll auto-add an ID.
     *
     * @return void
     */
    protected static function bootHasUuid()
    {
        static::creating(function (Model $model) {
            $id = $model->getAttribute('id');

            if (! $id) {
                $model->setAttribute('id', uuid4());
            }
        });
    }
}
