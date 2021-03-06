<?php

use Illuminate\Database\Migrations\Migration;

class ConfideSetupUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Creates the users table
        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('confirmation_code');
            $table->string('remember_token')->nullable();
            $table->boolean('confirmed')->default(false);

            # Profile
            $table->string('gender')->nullable();
            $table->integer('zip')->nullable();
            $table->integer('age')->nullable();
            $table->string('seeking_gender')->nullable();
            $table->integer('seeking_age_min')->nullable();
            $table->integer('seeking_age_max')->nullable();
            $table->integer('seeking_proximity')->nullable();
            
            $table->integer('created_at');
            $table->integer('updated_at');
        });

        // Creates password reminders table
        Schema::create('password_reminders', function ($table) {
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('password_reminders');
        Schema::drop('users');
    }
}
