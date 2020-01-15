<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Book extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book1', function (Blueprint $table) {
            $table->bigIncrements('book_id');
            $table->string('book_name', 20);
            $table->string('book_publisher', 20);
            $table->string('book_language', 20);
            $table->date('book_publish_time')->nullable();
            $table->string('book_summary', 2000)->nullable();
            $table->string('book_image', 30)->nullable();
            $table->string('book_dynamic', 3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book1');
    }
}
