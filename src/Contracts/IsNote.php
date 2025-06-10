<?php

namespace AlphaOlomi\Notes\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
interface IsNote
{
    public function notes(): MorphTo;
}
