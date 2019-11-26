<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlobalSeoSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_seo_settings', function (Blueprint $table) {
            $codes =  [
                301 => 301,
                302 => 302,
                303 => 303,
                307 => 307,
                308 => 308,
            ];
            $table->bigIncrements('id');
//            $table->boolean('end_slesh_redirect')->default(false);
//            $table->enum('end_slesh_code', $codes)->nullable();
            $table->boolean('www_redirect')->default(false);
            $table->enum('www_code', $codes)->nullable();
            $table->boolean('index_php_redirect')->default(false);
            $table->enum('index_php_code', $codes)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('global_seo_settings');
    }
}
