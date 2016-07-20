<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usergroups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->index();
            $table->string('name', 255);
            $table->string('handle', 255);
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
        Schema::drop('usergroups');
    }
}
