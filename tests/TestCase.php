<?php

declare(strict_types=1);

namespace AlphaOlomi\Notes\Tests;

use AlphaOlomi\Notes\NotesServiceProvider;
use AlphaOlomi\Notes\Traits\HasNotes;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestCase extends Orchestra
{
    use RefreshDatabase;

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
            protected $table = 'projects';
        };
    }

    protected function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }

    protected function getPackageProviders($app)
    {
        return [
            NotesServiceProvider::class,
        ];
    }


}
