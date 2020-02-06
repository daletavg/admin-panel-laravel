<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedirectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('redirects', function (Blueprint $table) {
            $codes =  [
                301 => 301,
                302 => 302,
                303 => 303,
                307 => 307,
                308 => 308,
            ];
            $table->bigIncrements('id');

            $table->string('from', 191)->unique()->nullable();
            $table->string('to', 191)->unique()->nullable();
            $table->enum('code', $codes);
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('redirects');
    }
}
