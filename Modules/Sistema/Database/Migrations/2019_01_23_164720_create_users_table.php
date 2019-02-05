<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Users Table
     *
     * @var string
     */
    private $table = 'users';

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

            $table->string('first_name')
                ->nullable(false);

            $table->string('last_name')
                ->nullable(false);

            $table->string('email')
                ->unique();

            $table->text('password')
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
