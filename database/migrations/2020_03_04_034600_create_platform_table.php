<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('iframe_youtube', 1024);
            $table->string('app_name', 1024);
            $table->string('SMTP_SERVER', 64)->nullable();
            $table->string('SMTP_USER_SERVER', 64)->nullable();
            $table->string('SMTP_PASS_SERVER', 64)->nullable();
            $table->string('SMTP_PORT_SERVER', 64)->nullable();
            $table->string('SMTP_FROM', 64)->nullable();
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
        Schema::dropIfExists('platform');
    }
}
