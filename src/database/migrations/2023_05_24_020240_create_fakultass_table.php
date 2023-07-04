<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakultassTable extends Migration
{
    public function up()
    {
        Schema::create('fakultass', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fakultasname');
            $table->string('nama')->default('default_value');
            $table->string('nim');
            $table->string('prodi');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
