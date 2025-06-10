<?php

declare(strict_types=1);

namespace AlphaOlomi\Notes\Models;

use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory;
    use SoftDeletes;
    use GeneratesUuid;

    protected $guarded = [];

    public function notes(): MorphTo
    {
        return $this->morphTo();
    }
}
