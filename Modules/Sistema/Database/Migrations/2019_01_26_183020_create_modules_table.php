<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Modules Table
     *
     * @var string
     */
    private $table = 'modules';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {

            // Columns
            $table->increments('id');

            $table->string('name')
                ->nullable(false)
                ->unique();

            $table->text('description')
                ->default('Module Description')
                ->nullable(true);

            $table->string('thumb')
                ->default('icon.png')
                ->nullable(false);

            $table->string('url')
                ->nullable(false)
                ->unique();

            $table->string('type')
                ->default('Application')
                ->nullable(false);

            $table->integer('region')
                ->default(1)
                ->nullable(false);

            $table->boolean('active')
                ->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
