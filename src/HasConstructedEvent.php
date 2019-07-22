<?php
declare(strict_types=1);

namespace AdamTheHutt\EloquentConstructedEvent;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Model
 */
trait HasConstructedEvent
{
    public function __construct($attributes = [])
    {
        Model::__construct($attributes);

        $this->fireModelEvent("constructed");
    }

    public static function bootHasConstructedEvent()
    {
        app('events')->listen('eloquent.booted: '.static::class, function(Model $model){
            $model->addObservableEvents('constructed');
        });
    }
}
