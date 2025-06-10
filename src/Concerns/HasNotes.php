<?php

namespace AlphaOlomi\Notes\Concerns;

use AlphaOlomi\Notes\Contracts\IsNote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Auth;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait HasNotes
{
    /** @return MorphMany<IsNote> */
    public function notes(): MorphMany
    {
        return $this->morphMany(config('notes.model'), 'noteable');
    }

    public function addNote(string $note): IsNote
    {
        return $this->notes()->create([
            'note' => $note,
        ]);
    }
}
