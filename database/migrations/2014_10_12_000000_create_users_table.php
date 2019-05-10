<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => "Sendi Dian",
            'email' => "sendi@sendi.com",
            'password' => bcrypt('888888')
        ]);

        DB::table('users')->insert([
            'name' => "M. Isa",
            'email' => "isa@isa.com",
            'password' => bcrypt('888888')
        ]);

        DB::table('users')->insert([
            'name' => "Raihan Anubhawa",
            'email' => "raihan@raihan.com",
            'password' => bcrypt('888888')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
