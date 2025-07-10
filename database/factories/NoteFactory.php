<?php

namespace AlphaOlomi\Notes\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use AlphaOlomi\Notes\Models\Note;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\AlphaOlomi\Notes\Models\Note>
 */
class NoteFactory extends Factory
{
    protected $model = Note::class;

    public function definition()
    {
        return [
            'content' => fake()->words(rand(3, 10), asText: true),
        ];
    }
}
