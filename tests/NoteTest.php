<?php

namespace AlphaOlomi\Notes\Tests;

use AlphaOlomi\Notes\Database\Factories\NoteFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function test_cannot_create_note_without_notable()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Notable model is required');

        NoteFactory::new()->create([
            'notable_type' => null,
            'notable_id' => null
        ]);
    }

    public function test_cannot_create_note_with_invalid_notable_type()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid notable type');

        NoteFactory::new()->create([
            'notable_type' => 'InvalidClass',
            'notable_id' => 1
        ]);
    }

    public function test_cannot_create_note_with_empty_content()
    {
        $project = $this->projectClass::create();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Note content cannot be empty');

        $project->addNote('');
    }

    public function test_cannot_create_note_with_too_long_content()
    {
        $project = $this->projectClass::create();
        $longContent = str_repeat('a', 1001); // Assuming max length is 1000

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Note content is too long');

        $project->addNote($longContent);
    }

    public function test_cannot_create_note_for_non_existent_model()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Notable model does not exist');

        NoteFactory::new()->create([
            'notable_type' => get_class($this->projectClass),
            'notable_id' => 999999 // Non-existent ID
        ]);
    }

    public function test_cannot_create_note_with_invalid_notable_relationship()
    {
        $invalidModel = new class extends Model {};

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Model does not use HasNotes trait');

        $invalidModel->addNote('Test note');
    }
}
