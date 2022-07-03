<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('eng_name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('link')->nullable();
            $table->integer('view');
            $table->enum('typeFilm', ['phim-bo', 'phim-le'])->default('phim-bo');
            $table->boolean('status')->default(true);
            $table->bigInteger('category_id');
            $table->string('image');
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
        Schema::dropIfExists('products');
    }
};
