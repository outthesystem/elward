<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('posts', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('category_id');
           $table->string('title');
           $table->longText('description');
           $table->string('content')->nullable();
           $table->date('date_init')->nullable();
           $table->date('date_end')->nullable();
           $table->string('hour')->nullable();
           $table->string('hour_end')->nullable();
           $table->string('place')->nullable();
           $table->string('entrytype')->nullable();
           $table->double('price', 8, 2)->nullable();
           $table->string('webfacebook')->nullable();
           $table->string('email')->nullable();
           $table->string('image')->nullable();
           $table->boolean('approved')->nullable();
           $table->boolean('sticky')->nullable();
           $table->boolean('note')->nullable();
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
         Schema::dropIfExists('posts');
     }
}
