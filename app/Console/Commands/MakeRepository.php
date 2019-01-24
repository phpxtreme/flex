<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Facades\File;
use Nwidart\Modules\Support\Config\GenerateConfigReader;

class MakeRepository extends GeneratorCommand
{
    /**
     * Store information.
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
     * @return bool|null
     */
    public function handle()
    {
        $module = $this->choice('In which module will the repository be generated?', $this->getModules());

        $this->data = [
            'module'     => $module,
            'modulePath' => $this->laravel['modules']->getModulePath($module)
        ];

        $entity = $this->choice('For what entity will the repository be generated?', $this->getEntities());

        $this->data['entity'] = $entity;

        // Check if parents class exists inside repository directory
        $this->buildParent(['_Base', '_Interface']);

        // Check if the repository already exists
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
        return __DIR__ . '/Stubs/Repository/Repository.stub';
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

    /**
     * Return module entities
     *
     * @return array
     */
    protected function getEntities()
    {
        /** @var array $entities */
        $entities = [];

        /** @var File $allFiles */
        $allFiles = File::glob($this->data['modulePath'] . '/Entities/*.php');

        foreach ($allFiles as $entity) {
            $entities[] = pathinfo($entity, PATHINFO_FILENAME);
        }

        if (sizeof($entities) == 0) {
            die($this->error('The selected module does not contain entities. Exiting...'));
        }

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
     * Build the class with the given name.
     *
     * @param  string $name
     *
     * @return string
     */
    protected function buildClass($name)
    {
        return str_replace(
            [
                'DummyEntity',
                'DummyModule',
                'DummyRepository',
            ],
            [
                $this->data['entity'],
                $this->data['module'],
                $this->data['entity'] . 'Repository'
            ],
            parent::buildClass($name)
        );
    }

    /**
     * Check if parents class exists inside repository directory
     *
     * @param array $array
     */
    protected function buildParent($array)
    {
        foreach ($array as $class) {
            if (!File::exists($this->data['modulePath'] . '/Repositories/' . $class . '.php')) {
                file_put_contents($this->data['modulePath'] . '/Repositories/' . $class . '.php', str_replace(
                    ['DummyModule'],
                    [$this->data['module']],
                    file_get_contents(__DIR__ . '/Stubs/Repository/' . $class . '.stub')
                ));
            }
        }
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
        $modulePath = $this->data['modulePath'];
        $repository = GenerateConfigReader::read('repository');

        $repositoryPath = $modulePath . $repository->getPath() . '/';
        $repositoryPath .= studly_case($this->data['entity']) . 'Repository.php';

        return $repositoryPath;
    }
}
