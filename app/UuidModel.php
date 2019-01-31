<?php
/**
 * Created by PhpStorm.
 * User: ezbur_000
 * Date: 1/8/15
 * Time: 4:56 PM
 */

namespace App;

use Nathanmac\GUID\Facades\GUID;

class UuidModel extends BaseModel {

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        /**
         * Attach to the 'creating' Model Event to provide a UUID
         * for the `id` field (provided by $model->getKeyName())
         */
        static::creating(function (UuidModel $model) {
            $model->{$model->getKeyName()} = (string)$model->generateNewId();
        });
    }

    /**
     * Get a new version 4 (random) UUID.
     *
     * @return string
     */
    public function generateNewId()
    {
        return GUID::generate();
    }

}