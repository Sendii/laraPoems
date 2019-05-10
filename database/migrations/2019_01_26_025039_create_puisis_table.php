<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puisis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('isi');
            $table->timestamps();
        });

        DB::table('puisis')->insert([
            'user_id' => 1,
            'isi' => "puisi sendi gann"
        ]);
        DB::table('puisis')->insert([
            'user_id' => 2,
            'isi' => "puisi isa gann"
        ]);
        DB::table('puisis')->insert([
            'user_id' => 3,
            'isi' => "puisi raihan gann"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puisis');
    }
}
