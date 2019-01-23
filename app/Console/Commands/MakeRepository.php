<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Nwidart\Modules\Support\Config\GenerateConfigReader;

class MakeRepository extends GeneratorCommand
{
    /**
     * Store input information
     *
     * @var array
     */
    protected $data = [];

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
        $entity = $this->choice('For what entity will the repository be generated?', $this->getEntities());

        $this->data = [
            'module' => $module,
            'entity' => $entity
        ];

        if ($this->alreadyExists($this->getNameInput())) {
            $this->error($this->type . ' already exists!');
            return false;
        }

        /** @var string $name */
        $name = $this->qualifyClass($this->getNameInput());

        $this->files->put($this->getPath($name), $this->buildClass($name));
        $this->info($this->type . ' created successfully!');
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
        //TODO: This!

        /** @var array $entities */
        $entities = [1, 2, 3];

        return $entities;
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return trim($this->data['entity']) . 'Repository';
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string $stub
     * @param  string $name
     *
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        return parent::replaceClass($stub, $name);
    }

    /**
     * Get the destination class path.
     *
     * @param  string $name
     *
     * @return string
     */
    protected function getPath($name)
    {
        $repository = GenerateConfigReader::read('repository');
        $modulePath = $this->laravel['modules']->getModulePath($this->data['module']);

        return $modulePath . $repository->getPath() . '/' . studly_case($this->data['entity']) . 'Repository.php';
    }
}
