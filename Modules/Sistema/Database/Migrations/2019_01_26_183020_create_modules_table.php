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
            $table->increments('id');

            $table->string('name')
                ->nullable(false)
                ->unique();

            $table->text('description')
                ->default('Module Description')
                ->nullable(true);

            $table->string('thumb')
                ->default('default')
                ->nullable(false);

            $table->string('url')
                ->default('Default.Default')
                ->nullable(false)
                ->unique();

            $table->string('type')
                ->default('Application')
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
