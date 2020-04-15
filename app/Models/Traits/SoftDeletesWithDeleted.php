<?php

namespace App\Models\Traits;

use App\Models\Scopes\SoftDeletingWithDeletesScope;
use Illuminate\Database\Eloquent\SoftDeletes;

trait SoftDeletesWithDeleted
{
    use SoftDeletes;

    public static function bootSoftDeletes()
    {
        static::addGlobalScope(new SoftDeletingWithDeletesScope);
    }
}
