<?php

namespace AlphaOlomi\Notes\Tests;

use AlphaOlomi\Notes\Concerns\HasNotes;
use AlphaOlomi\Notes\NotesServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestCase extends Orchestra
{
    use RefreshDatabase;

    /**
     * @var Model|__anonymous@912
     */
    protected $projectClass;

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'AlphaOlomi\\Notes\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );

        Schema::dropIfExists('projects');
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        $this->projectClass = new class extends Model
        {
            use HasNotes;
        };
    }

    protected function getPackageProviders($app)
    {
        return [
            NotesServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        $migration = require __DIR__ . '/../database/migrations/create_notes_table.php';
        $migration->up();
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();
    }
}
