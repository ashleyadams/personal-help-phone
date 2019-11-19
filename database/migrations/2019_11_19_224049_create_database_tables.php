<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numbers', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('number', 20);
            $table->string('contact_name', 50);
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('role_name', 20);
        });

        Schema::create('numbers_roles', function (Blueprint $table) {
            $table->integer('number_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('number_id')->references('id')->on('numbers')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        DB::table('roles')->insert([
            // The phone number of the owner who will be given a choice of contacts to call
            ['role_name' => 'owner'], 

            // The phone numbers of contacts the owner or authenticated user can call
            ['role_name' => 'contact'],

            // The phone numbers of users allowed to reach the owner number
            ['role_name' => 'user']
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('numbers_roles');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('numbers');
    }
}
