<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('artist_id');
            $table->unsignedBigInteger('album_id');
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('spotifyUrl_id');
            $table->text('lyrics')->nullable();
            $table->string('key')->nullable();
            $table->string('tempo')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();

            //foreign key constraints
            $table->foreign('artist_id')->references('id')->on('artists');
            $table->foreign('album_id')->references('id')->on('albums');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('spotifyUrl_id')->references('id')->on('spotify_urls');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
