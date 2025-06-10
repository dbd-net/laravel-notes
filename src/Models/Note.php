<?php

namespace AlphaOlomi\Notes\Models;

use AlphaOlomi\Notes\Contracts\IsNote;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model implements IsNote
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function notes(): MorphTo
    {
        return $this->morphTo();
    }
}
