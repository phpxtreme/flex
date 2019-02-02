<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleControllersTable extends Migration
{
    /**
     * Controllers Table
     *
     * @var string
     */
    private $table = 'module_controllers';

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

            $table->integer('module_id')
                ->nullable(false);

            $table->string('path')
                ->nullable(false);

            $table->timestamps();

            // Relationships
            $table->foreign('module_id')
                ->references('id')->on('modules')
                ->onDelete('cascade');
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
