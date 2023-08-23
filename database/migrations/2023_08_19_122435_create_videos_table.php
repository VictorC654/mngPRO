<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('theme');
            $table->foreignId('client_id');
            $table->string('client');
            $table->integer('profit');
            $table->integer('duration_in_minutes');
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
        Schema::dropIfExists('videos');
    }
}

//INSERT INTO videos (title, client, profit, created_at, duration_in_minutes)
//VALUES ('Economics', 'Alexandru Bordea', 250, NOW(), 60)
