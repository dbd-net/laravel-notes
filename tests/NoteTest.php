<?php

declare(strict_types=1);

namespace AlphaOlomi\Notes\Tests;

class NoteTest extends TestCase
{
    public function test_can_be_created()
    {
        $project = $this->projectClass::create();
        $note = $project->addNote('Hello, world!');

        $this->assertDatabaseHas('notes', [
            'id' => $note->getKey(),
            'note' => 'Hello, world!',
        ]);
    }
}
