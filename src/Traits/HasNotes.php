<?php

declare(strict_types=1);

namespace AlphaOlomi\Notes\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait HasNotes
{
    public function notes(): MorphMany
    {
        return $this->morphMany(config('notes.model'), 'noteable');
    }

    public function addNote(string $note): Model
    {
        return $this->notes()->create([
            'note' => $note,
        ]);
    }
}
