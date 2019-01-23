<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeRepository extends GeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * Execute the console command.
     *
     * @return bool|null|void
     */
    public function handle()
    {
        $module = $this->choice('In which module will the repository be generated?', $this->getModules());
        $entity = $this->ask('For what entity will the repository be generated?');
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/Stubs/Repository.stub';
    }

    /**
     * Return application modules
     *
     * @return array
     */
    protected function getModules()
    {
        /** @var array $modules */
        $modules = [];

        foreach ($this->laravel['modules']->all() as $module) {
            $modules[] = $module->getName();
        }

        return $modules;
    }

    protected function getEntities()
    {
        /** @var array $entities */
        $entities = [];

        return $entities;
    }
}
